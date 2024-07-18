<?php

namespace App\Http\Controllers\Mely;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\Polling;
use App\Models\PollingDetail;
use App\Models\SubmissionModule;
use Illuminate\Support\Str;

class PollingController extends Controller
{

    public function index()
    {
        $pollings = Polling::orderBy('updated_at', 'desc')->get();
        $submissionModules = SubmissionModule::all();
    
        // Filter polling berdasarkan status "Proses" atau "Selesai" jika id_role adalah 1 atau 2
        if(auth()->user()->id_role == 1 || auth()->user()->id_role == 2){
            $pollings = $pollings->filter(function ($polling) {
                return $polling->status == 'Proses' || $polling->status == 'Selesai';
            });
        }
    
        return view('mely.polling.polling-table', compact('pollings', 'submissionModules'));
    }

    public function create()
    {
        $submissionModules = SubmissionModule::where('status', 'Undangan Didistribusikan')
                            ->orWhere('status', 'Telah Dilaksanakan')
                            ->get();
        return view('mely.polling.create-polling', compact('submissionModules'));
    }

    public function store(Request $request)
    {
         // Validasi data jika diperlukan
        $request->validate([
            'agenda_id' => 'required|exists:submission_modules,id',
            'question' => 'required|string',
            'option.*' => 'required|string',
        ]);

        if ($request->agenda_id == null) {
            toast('Agenda harus dipilih.', 'error');
            return redirect()->back()->withInput();
        }

        // Validasi jumlah opsi minimal 2
        if (count($request->option) < 2) {
            toast('Minimal harus ada 2 opsi.', 'error');
            return redirect()->back()->withInput();
        }
        
        // Simpan data polling
        $polling = new Polling();
        $polling->agenda_id = $request->agenda_id;
        $polling->question = $request->question;
        $polling->status = 'Baru Ditambahkan';
        $polling->save();

        // Simpan detail opsi polling
        foreach ($request->option as $option) {
            $detail = new PollingDetail();
            $detail->poll_id = $polling->id;
            $detail->option = $option;
            $detail->save();
        }

        toast('Data Berhasil Ditambahkan', 'success');
        return redirect()->route('pollings.index');
    }

    public function showPolling($id)
    {
        $polling = Polling::FindOrFail($id);
        $submissionModule = SubmissionModule::where('id', $polling->agenda_id)->first();
        $pollingDetails = PollingDetail::where('poll_id', $id)
        ->orderBy('id', 'desc')
        ->get();
        return view('mely.polling.polling', compact('polling','submissionModule','pollingDetails'));
    }

    public function destroy(Polling $polling)
    {
        $polling->delete();
        
        toast('Data Berhasil Dihapus', 'success');
        return redirect()->route('pollings.index');
    }

    public function edit($id)
    {
        $polling = Polling::FindorFail($id);
        $submissionModule = SubmissionModule::where('id', $polling->agenda_id)->first();
        $pollingDetails = PollingDetail::where('poll_id', $id)
        ->orderBy('id', 'asc')
        ->get();
        return view('mely.polling.edit-polling', compact('polling','submissionModule','pollingDetails'));
    }

    public function update(Request $request, $id)
{
    // Validasi data
    $request->validate([
        'question' => 'required|string',
        'option.*' => 'required|string',
    ]);

    try {
        // Cari polling yang akan diupdate
        $polling = Polling::findOrFail($id);

        // Update data polling
        $polling->question = $request->question;
        $polling->save();

        // Hapus semua detail polling yang terkait dengan polling ini
        PollingDetail::where('poll_id', $polling->id)->delete();

        // Simpan ulang detail opsi polling yang baru
        foreach ($request->option as $option) {
            $detail = new PollingDetail();
            $detail->poll_id = $polling->id;
            $detail->option = $option;
            $detail->save();
        }

        PollingDetail::where('option', 'auto_delete')->delete();

        toast('Data Berhasil Diubah', 'success');
        return redirect()->route('pollings.index');
    } catch (\Exception $e) {
        // Tangani jika terjadi error
        return redirect()->back()->with('error', 'Gagal memperbarui data. Silakan coba lagi.');
    }
}

    public function updateStatus(Request $request, $id)
        {
        $polling = Polling::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:Baru Ditambahkan,Proses,Selesai',
        ]);

        $polling->update([
            'status' => $validated['status'],
        ]);

        toast('Status Berhasil Diperbarui', 'success');
        return redirect()->route('pollings.index');
        }

        public function showChart($id)
        {
            $polling = Polling::findOrFail($id);
            $pollingDetails = PollingDetail::where('poll_id', $id)->get();
        
            // Prepare the data in the format needed for JavaScript
            $dataFromBackend = [];
            foreach ($pollingDetails as $detail) {
                $dataFromBackend[] = [
                    'option_name' => $detail->option,
                    'vote_count' => $detail->votes
                ];
            }
        
            return view('mely.polling.chart', compact('polling', 'dataFromBackend'));
        }
        

}
