<?php

namespace App\Http\Controllers\Mely\Mely;

use App\Http\Controllers\Controller;
use App\Mail\docMinuteEmail;
use App\Mail\docMinuteStatusChangedEmail;
use App\Models\DocMinute;
use App\Models\DocMinuteQnaDetails;
use App\Models\MeetingParticipant;
use App\Models\SubmissionModule;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DocMinuteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $docMinutes = DocMinute::orderBy('updated_at', 'desc')->get();
        
        $submissionModules = SubmissionModule::all();
    
        // Filter dokumen menit berdasarkan status "Telah Didistribusikan" jika id_role adalah 1 dan 2
        if(auth()->user()->id_role == 1 || auth()->user()->id_role == 2){
            $docMinutes = $docMinutes->filter(function ($docMinute) {
                return $docMinute->status == 'Telah Didistribusikan';
            });
        }
    
        return view('mely.mely.meeting.documentation-and-minute.index', compact('docMinutes','submissionModules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $submissionModules = SubmissionModule::where('status','Telah Dilaksanakan')->get();
        return view('mely.mely.meeting.documentation-and-minute.create', compact('submissionModules'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        // $request->validate([
        //     'agenda_id' => 'required',
        //     'events' => 'required',
        //     'decisions' => 'required',
        //     'asker.*' => 'required',
        //     'question.*' => 'required',
        //     'answer.*' => 'required',
        // ]);

        if($request->agenda_id == ""){
            toast('Agenda Rapat Belum Diisikan.', 'error');
            return redirect()->back()->withInput();
        }

        // Simpan data ke dalam tabel 'doc_minutes'
        $docMinute = new DocMinute();
        $docMinute->agenda_id = $request->agenda_id;
        $docMinute->user_id = Auth::id(); // Menyimpan ID user yang sedang login
        $docMinute->events = $request->events;
        $docMinute->decisions = $request->decisions;
        $docMinute->status = 'Baru Ditambahkan'; // Atur status sesuai kebutuhan
        $docMinute->created_at = now();
        $docMinute->save();

        // Simpan data Q&A ke dalam tabel 'doc_minute_qna_details'
        $numItems = count($request->asker);
        for ($i = 0; $i < $numItems; $i++) {
            $qnaDetail = new DocMinuteQnaDetails();
            $qnaDetail->doc_minute_id = $docMinute->id;
            $qnaDetail->asker = $request->asker[$i];
            $qnaDetail->question = $request->question[$i];
            $qnaDetail->answer = $request->answer[$i];
            $qnaDetail->created_at = now();
            $qnaDetail->save();
        }

        // Show success message and redirect
        toast('Data Berhasil Ditambahkan', 'success');
        return redirect()->route('doc-minutes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(DocMinute $documentationMinute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $docMinute = DocMinute::FindorFail($id);
        $submissionModules = SubmissionModule::all();
        $docMinuteQnaDetails = DocMinuteQnaDetails::where('doc_minute_id', $id)
        ->orderBy('id', 'desc')                       
        ->get();
        return view('mely.mely.meeting.documentation-and-minute.edit', compact('docMinute','submissionModules','docMinuteQnaDetails'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    $request->validate([
        'events' => 'required',
        'decisions' => 'required',
        'asker.*' => 'required',
        'question.*' => 'required',
        'answer.*' => 'required',
    ]);

        $docMinute = DocMinute::findOrFail($id);

        $docMinute->user_id = Auth::id(); // Menyimpan ID user yang sedang login
        $docMinute->events = $request->events;
        $docMinute->decisions = $request->decisions;
        $docMinute->status = 'Baru Ditambahkan'; // Atur status sesuai kebutuhan
        $docMinute->updated_at = now();
        $docMinute->save();
        
        // Hapus semua detail polling yang terkait dengan polling ini
        DocMinuteQnaDetails::where('doc_minute_id', $id)->delete();

        // Simpan data Q&A ke dalam tabel 'doc_minute_qna_details'
        $numItems = count($request->asker);
        for ($i = 0; $i < $numItems; $i++) {
            $qnaDetail = new DocMinuteQnaDetails();
            $qnaDetail->doc_minute_id = $docMinute->id;
            $qnaDetail->asker = $request->asker[$i];
            $qnaDetail->question = $request->question[$i];
            $qnaDetail->answer = $request->answer[$i];
            $qnaDetail->updated_at = now();
            $qnaDetail->save();
    }

    // Hapus semua detail polling yang terkait dengan polling ini
    DocMinuteQnaDetails::where('asker', 'auto_delete')->delete();

        toast('Data Berhasil Diubah', 'success');
        return redirect()->route('doc-minutes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        DocMinute::findOrFail($id)->delete();
        
        toast('Data Berhasil Dihapus', 'success');
        return redirect()->route('doc-minutes.index');
    }

    public function details($id)
    {
        $docMinute = DocMinute::FindOrFail($id);
        $docMinuteQnaDetails = DocMinuteQnaDetails::where('doc_minute_id', $id)
        ->orderBy('id', 'desc')                       
        ->get();
        $submissionModule = SubmissionModule::where('id', $docMinute->agenda_id)->first();
        return view('mely.mely.meeting.documentation-and-minute.detail', compact('docMinute','docMinuteQnaDetails', 'submissionModule'));
    }

    public function generatePDF($id){
        
        $docMinute = DocMinute::FindOrFail($id);
        $docMinuteQnaDetails = DocMinuteQnaDetails::where('doc_minute_id', $id)->get();
        $submissionModule = SubmissionModule::where('id', $docMinute->agenda_id)->first();

        $pdf = Pdf::loadView('mely.mely.meeting.documentation-and-minute.pdf', compact('docMinute','docMinuteQnaDetails', 'submissionModule'));
        return $pdf->download('export-'.Carbon::now()->timestamp);
    }

    public function updateStatus($id)
    {
        $docMinute = DocMinute::findOrFail($id);
        $docMinute->status = 'Telah Didistribusikan'; // Atur status sesuai kebutuhan
        $docMinute->updated_at = now();
        $docMinute->save();
        
        Mail::to($docMinute->user->email)->send(new docMinuteStatusChangedEmail());

        $docMinuteQnaDetails = DocMinuteQnaDetails::where('doc_minute_id', $id)->get();
        $submissionModule = SubmissionModule::where('id', $docMinute->agenda_id)->first();
        
        $participants = MeetingParticipant::where('agenda_id', $docMinute->agenda_id)->get();
        foreach ($participants as $participant) {
            $user = User::find($participant->participant_id); // Ambil data user berdasarkan participant_id
            if ($user) {
                Mail::to($user->email)->send(new docMinuteEmail($docMinute, $docMinuteQnaDetails, $submissionModule));
            }
        }

        $submissionModule = SubmissionModule::where('id', $docMinute->agenda_id)->first();

        $submissionModule->status = 'Notula Tersedia';
        $submissionModule->provided_at = Carbon::now();
        $submissionModule->updated_at = now();
        $submissionModule->save();

        toast('Dokumen Berhasil Didistribusikan', 'success');
    
        return redirect()->route('doc-minutes.index');
    }
    
}
