<?php

namespace App\Http\Controllers\Sholikin\Admin\JobDescription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobDescription;
use App\Models\Task;
use App\Models\Division;
use App\Models\JobPosition;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use DB;

class AdminJobDescriptionController extends Controller
{
    public function index()
    {
        $jobDesc = JobDescription::orderBy('created_at', 'desc')->get();
        $division = Division::all();

        return view('sholikin.admin.job-description.admin-job-description', compact('jobDesc', 'division'));
    }

    public function create()
    {
        $division = Division::all();

        return view('sholikin.admin.job-description.admin-job-description-create', compact('division'));
    }

    public function store(Request $request)
    {
        // return response()->json($request->all());
        $daterange = explode(' - ', $request['periode']);
        $periodeMulai = Carbon::parse($daterange[0])->format('Y-m-d');
        $periodeSelesai = Carbon::parse($daterange[1])->format('Y-m-d');

        $validate = Validator::make($request->all(), [
            'id_divisi' => 'required',
            'id_posisi' => 'required',
            'periode' => 'required'
        ]);

        if($validate->fails()){
            Alert::error('Gagal', 'Data tidak valid');
            return redirect()->back();
        }

        $existingJobDesc = JobDescription::where(function ($query) use ($periodeMulai, $periodeSelesai) {
                                    $query->where('periode_mulai', '>=', $periodeSelesai)
                                        ->where('periode_selesai', '<=', $periodeMulai);
                                    })
                                    ->where('id_divisi', $request->id_divisi)
                                    ->where('id_posisi', $request->id_posisi)
                                    ->exists();

        // return response()->json($existingJobDesc);
        if ($existingJobDesc) {
            $divisi = Division::findOrFail($request->id_divisi)->nama_divisi;
            $posisi = JobPosition::findOrFail($request->id_posisi)->nama_posisi;
            Alert::error('Gagal', "Pekerjaan untuk Divisi $divisi dan Posisi $posisi sudah ada pada periode tersebut");

            $jobDescription->delete();
            return redirect()->back();
        }

        $jobDescription = new JobDescription();
        $jobDescription->id_divisi = $request->id_divisi;
        $jobDescription->id_posisi = $request->id_posisi;
        $jobDescription->periode_mulai = $periodeMulai;
        $jobDescription->periode_selesai = $periodeSelesai;
        
        $existingJobDesc = JobDescription::where(function ($query) use ($periodeMulai, $periodeSelesai) {
                                    $query->where('periode_mulai', '<=', $periodeSelesai)
                                        ->where('periode_selesai', '>=', $periodeMulai);
                                    })
                                    ->where('id_divisi', $request->id_divisi)
                                    ->where('id_posisi', $request->id_posisi)
                                    ->exists();

        if ($existingJobDesc) {
        $divisi = Division::findOrFail($request->id_divisi)->nama_divisi;
        $posisi = JobPosition::findOrFail($request->id_posisi)->nama_posisi;
        Alert::error('Gagal', "Pekerjaan untuk Divisi $divisi dan Posisi $posisi sudah ada pada periode tersebut");

        return redirect()->back();
        }

        $jobDescription->save();

        $result = [];
        foreach($request['kt_docs_repeater_advanced'] as $task){
            $newTask  = new Task();
            $newTask ->id_jobdesc = $jobDescription->id;
            $newTask ->tugas = $task['tugas'];
            $newTask ->save();
            $result[] = $newTask;
        }

        // return response()->json($result);

        // $existingJobDesc = JobDescription::where(function ($query) use ($periodeMulai, $periodeSelesai) {
        //                             $query->where('periode_mulai', '>=', $periodeSelesai)
        //                                 ->where('periode_selesai', '<=', $periodeMulai);
        //                             })
        //                             ->where('id_divisi', $request->id_divisi)
        //                             ->where('id_posisi', $request->id_posisi)
        //                             ->exists();

        toast('Berhasil Menambahkan Pekerjaan','success');
        return redirect()->route('job-description.index');
    }

    public function edit($id)
    {
        $jobDesc = JobDescription::find($id);
        $taskData = $jobDesc->task;
        $division = Division::all();
        $position = JobPosition::all();
        // return response()->json([
        //     'jobDesc' => $jobDesc,
        //     'taskData' => $taskData
        // ]);

        return view('sholikin.admin.job-description.admin-job-description-edit', compact('jobDesc', 'taskData', 'division', 'position'));
    }

    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'id_divisi' => 'required',
            'id_posisi' => 'required',
            'periode' => 'required'
        ]);

        if($validate->fails()){
            Alert::error('Gagal', 'Data tidak valid');
            return redirect()->back();
        }

        $jobDescription = JobDescription::findOrFail($id);
        
        $daterange = explode(' - ', $request['periode']);
        $periodeMulai = Carbon::parse($daterange[0])->format('Y-m-d');
        $periodeSelesai = Carbon::parse($daterange[1])->format('Y-m-d');

        if(isset($request['kt_docs_repeater_advanced'])) {
            DB::table('tasks')->where('id_jobdesc', $jobDescription->id)->delete();
            foreach($request['kt_docs_repeater_advanced'] as $taskData){
                DB::table('tasks')->insertGetId([
                    'id_jobdesc' => $jobDescription->id,
                    'tugas' => $taskData['tugas']
                ]);
            }
        }

        $jobDescription->update([
            'id_divisi' => $request->id_divisi,
            'id_posisi' => $request->id_posisi,
            'periode_mulai' => $periodeMulai,
            'periode_selesai' => $periodeSelesai
        ]);

        toast('Berhasil Mengubah Data Pekerjaan','success');
        return redirect()->route('job-description.index');
    }

    public function destroy($id)
    {
        $JobDescription = JobDescription::find($id);
        $JobDescription->delete();
    
        toast('Data berhasil dihapus','success');
        return redirect()->route('job-description.index');
    }
}
