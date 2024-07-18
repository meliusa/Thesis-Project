<?php

namespace App\Http\Controllers\Sholikin\Admin\JobDescription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobResult;
use App\Models\JobDescription;
use App\Models\Task;
use App\Models\TaskApproval;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use DB;
use ZipArchive;
use Illuminate\Support\Facades\Storage;

class AdminVerifyJobDescriptionController extends Controller
{
    public function index()
    {
        $jobRes = JobResult::all()->sortByDesc('created_at');

        return view('sholikin.admin.job-description.admin-verify-job-description', compact('jobRes'));
    }

    public function edit($id)
    {
        $jobRes = JobResult::find($id);
        $task = Task::where('id_jobdesc', $jobRes->id_jobdesc)->get();
        $taskApproval = TaskApproval::where('id_jobresult', $jobRes->id)->get();
        $foto = [];
        $foto = json_decode($jobRes->foto,true);
        // return response()->json([
        //     'jobRes' => $jobRes,
        //     // 'foto' => $foto,
        //     'task' => $task,
        //     'taskApprv' => $taskApproval,
        // ]);

        return view('sholikin.admin.job-description.admin-edit-verify-job-description', compact('jobRes', 'task', 'taskApproval', 'foto'));
    }

    public function update(Request $request, $id)
    {
        // return response()->json($request->all());
        $jobRes = JobResult::find($id);
        $status = $request->status;
        if($id_task = $request->tugas_acc) {
            $id_task = $request->tugas_acc;
            $id_task = array_map('intval', $id_task);
        } else {
            $id_task = null;
        }
        $haveTask = TaskApproval::where('id_jobresult', $jobRes->id)->get();
        $haveTaskId = $haveTask->pluck('id_task')->toArray();
        // return response()->json([
        //     // 'jobRes' => $jobRes,
        //     // 'haveTask' => $haveTask,
        //     'haveTaskId' => $haveTaskId,
        //     'id_task' => $id_task,
        // ]);

        $validate = Validator::make($request->all(), [
            'id_karyawan' => 'required',
            'id_jobdesc' => 'required',
            'keterangan' => 'required',
            'status' => 'required',
            'pemeriksa' => 'required'
        ]);

        if ($validate->fails()) {
            Alert::error('Gagal', 'Data tidak valid');
            return redirect()->back()->withInput()->withErrors($validate);
        }

        if($status == 'disetujui') {
            if ($haveTask->isEmpty()) {
                if($id_task == null) {
                    Alert::error('Gagal', 'Jika di setujui tidak ada tugas yang di checklist');
                    return redirect()->back();
                }
                // 1. Jika tidak ada task approval, simpan id_task ke database
                foreach ($id_task as $value) {
                    $taskApproval = new TaskApproval();
                    $taskApproval->id_task = $value;
                    $taskApproval->id_jobresult = $request->id_jobresult;
                    $taskApproval->save();
                }
            }
            else {
                //Cek perubahan checklist
                if($id_task == null) {
                    Alert::error('Gagal', 'Jika di setujui tidak dapat unchecklist tugas');
                    return redirect()->back();
                }

                // Cek perubahan unchecklist
                $removedTasks = array_diff($haveTaskId, $id_task);
                if ($status == 'disetujui' && count($removedTasks) > 0) {
                    foreach ($haveTask as $task) {
                        if (in_array($task->id_task, $removedTasks)) {
                            $task->delete();
                        }
                    }
                }
            
                // Cek penambahan checklist
                $addedTasks = array_diff($id_task, $haveTaskId);
                if ($status == 'disetujui' && count($addedTasks) > 0) {
                    foreach ($addedTasks as $taskId) {
                        $taskApproval = new TaskApproval();
                        $taskApproval->id_task = $taskId;
                        $taskApproval->id_jobresult = $request->id_jobresult;
                        $taskApproval->save();
                    }
                }
            }            

            $jobRes->id_karyawan = $request->id_karyawan;
            $jobRes->id_jobdesc = $request->id_jobdesc;
            $foto = json_encode($request->foto);
            $jobRes->foto = $foto;
            $jobRes->keterangan = $request->keterangan;
            $jobRes->status = $status;
            $jobRes->pemeriksa = $request->pemeriksa;
            $jobRes->save();
            toast('Data berhasil disetujui', 'success');
        } else {
            if($id_task != null) {
                Alert::error('Gagal', 'Jika di Tolak tidak dapat checklist tugas');
                return redirect()->back();
            }

            if($haveTask->count() > 0) {
                foreach($haveTask as $key => $value) {
                    $value->delete();
                }
            }

            $jobRes->id_karyawan = $request->id_karyawan;
            $jobRes->id_jobdesc = $request->id_jobdesc;
            $foto = json_encode($request->foto);
            $jobRes->foto = $foto;
            $jobRes->keterangan = $request->keterangan;
            $jobRes->status = $status;
            $jobRes->pemeriksa = $request->pemeriksa;
            $jobRes->save();
            toast('Data berhasil ditolak', 'success');
        }

        return redirect()->route('verify-job-description.index');
    }

    public function destroy($id)
    {
        $jobRes = JobResult::find($id);
        $jobRes->delete();

        toast('Data berhasil dihapus', 'success');
        return redirect()->route('verify-job-description.index');
    }

    public function downloadFiles($id)
    {
        // Daftar nama file yang akan di-zip (dari array)
        $jobRes = JobResult::find($id);
        $foto = [];
        $foto = json_decode($jobRes->foto,true);
        //dd($foto);
        // Path tempat file-file tersebut berada
        $basePath = 'storage/uploads/karyawan/tugas/';

        // Nama file zip yang akan dihasilkan
        $createdAt = date('d-m-Y', strtotime($jobRes->created_at));
        $zipFileName = $createdAt.'-'.$jobRes->employee->division->nama_divisi.'-'.$jobRes->employee->job_position->nama_posisi.'-'.$jobRes->employee->nama_lengkap.'.zip';

        // Buat instance ZipArchive
        $zip = new ZipArchive;
        if ($zip->open(storage_path('app/' . $zipFileName), ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($foto as $fileName) {
                // Pastikan file ada sebelum menambahkannya ke dalam zip
                if (file_exists($basePath . $fileName)) {
                    $zip->addFile($basePath . $fileName, $fileName);
                }
            }
            $zip->close();
        } else {
            return response()->json(['message' => 'Gagal membuat file zip'], 500);
        }

        // Berikan respons untuk mengunduh file zip
        return response()->download(storage_path('app/' . $zipFileName))->deleteFileAfterSend(true);
    }
}
