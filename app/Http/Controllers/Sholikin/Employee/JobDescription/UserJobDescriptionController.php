<?php

namespace App\Http\Controllers\Sholikin\Employee\JobDescription;

use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobDescription;
use App\Models\JobResult;
use Carbon\Carbon;
use DB;
use ZipArchive;
use Illuminate\Support\Facades\Storage;

class UserJobDescriptionController extends Controller
{
    public function jobDesc()
    {
        $data = auth()->user()->employee;
        $jobDesc = JobDescription::where('id_divisi', $data->id_divisi)
                                    ->where('id_posisi', $data->id_posisi)
                                    ->orderBy('created_at', 'desc')
                                    ->get();

        return view('sholikin.employee.job-description.user-job-description', compact('data', 'jobDesc'));
    }

    public function index()
    {
        $data = auth()->user()->employee;
        $jobRes = JobResult::where('id_karyawan', $data->id)
                            ->orderBy('created_at', 'desc')
                            ->get();

        return view('sholikin.employee.job-description.user-upload-job-description', compact('data', 'jobRes'));
    }

    public function create()
    {
        $data = auth()->user()->employee;
        $jobDesc = JobDescription::join('tasks', 'job_descriptions.id', '=', 'tasks.id_jobdesc')
                                    ->where('id_divisi', $data->id_divisi)
                                    ->where('id_posisi', $data->id_posisi)
                                    ->select('job_descriptions.id', 'job_descriptions.id_divisi', 'job_descriptions.id_posisi', 'job_descriptions.periode_mulai', 'job_descriptions.periode_selesai')
                                    ->selectRaw('job_descriptions.id, job_descriptions.id_divisi, job_descriptions.id_posisi, job_descriptions.periode_mulai, job_descriptions.periode_selesai, GROUP_CONCAT(tasks.tugas) as tugas')
                                    ->groupBy('job_descriptions.id', 'job_descriptions.id_divisi', 'job_descriptions.id_posisi', 'job_descriptions.periode_mulai', 'job_descriptions.periode_selesai')
                                    ->get();

        $jobDesc->transform(function ($item) {
            $item->tugas = explode(',', $item->tugas);
            return $item;
        });

        $allDates = [];
        $now = Carbon::now();
        $formatNow = $now->isoFormat('dddd, D MMMM YYYY');

        foreach ($jobDesc as $jd) {
            $id_jobdesc = $jd->id;
            $periodemulai = $jd->periode_mulai;
            $periodeselesai = $jd->periode_selesai;
            $tugas = $jd->tugas;
            
            $formatStartDate = Carbon::parse($periodemulai);
            $formatEndDate = Carbon::parse($periodeselesai);

            foreach ($formatStartDate->toPeriod($formatEndDate) as $date) {
                if($date->isWeekend()) {
                    continue;
                }

                $dateYmd = $date->isoFormat('dddd, D MMMM YYYY');
                $allDates[] = [
                    'id_jobdesc' => $id_jobdesc,
                    'date' => $dateYmd,
                    'tugas' => $tugas
                ];
            }
        }

        // return response()->json([
        //     'user' => $data,
        //     'jobDesc' => $jobDesc,
        //     'allDates' => $allDates,
        //     // 'now' => $now,
        //     // 'frmtNow' => $formatNow,
        //     // 'allDates' => $allDates
        // ]);

        return view('sholikin.employee.job-description.user-create-upload-job-description', compact('data', 'allDates', 'formatNow'));
    }

    public function store(Request $request)
    {
        // return response()->json($request->file('foto'));
        // return response()->json($request->foto);
        $validate = Validator::make($request->all(), [
            'id_karyawan' => 'required',
            'id_jobdesc' => 'required',
            'foto' => 'required',
            'keterangan' => ''
        ]);

        if($validate->fails()) {
            Alert::error('Gagal', 'Data tidak valid');
            return redirect()->back();
        }

        $now = Carbon::now();
        $existingJobRes = JobResult::where('id_karyawan', $request->id_karyawan)
                                    ->where('id_jobdesc', $request->id_jobdesc)
                                    ->whereDate('created_at', $now->toDateString())
                                    ->exists();

        if($existingJobRes) {
            Alert::error('Gagal', 'Tidak dapat mengupload bukti pekerjaan pada tanggal yang sama lebih dari sekali');
            return redirect()->route('user-upload-job-description.index');
        }

        $foto = json_encode($request->foto);
       // dd($foto);
        //foreach($request->foto as $f) {
          //  $response = $this->uploadTugas($f);
          //  $foto[] = $response['name'];

        $jobResult = new JobResult;
        $jobResult->id_karyawan = $request->id_karyawan;
        $jobResult->id_jobdesc = $request->id_jobdesc;
        $jobResult->foto = $foto;
        $jobResult->keterangan = $request->keterangan;
        $jobResult->save();
        //}

        Alert::success('Upload bukti pekerjaan berhasil dibuat, Mohon menunggu disetujui');
        return redirect()->route('user-upload-job-description.index');
    }

    public function edit($id)
    {
        $jobRes = JobResult::find($id);
        $foto = [];
        $foto = json_decode($jobRes->foto,true);
        $data = auth()->user()->employee;
        $jobDesc = JobDescription::join('tasks', 'job_descriptions.id', '=', 'tasks.id_jobdesc')
                                    ->where('id_divisi', $data->id_divisi)
                                    ->where('id_posisi', $data->id_posisi)
                                    ->select('job_descriptions.id', 'job_descriptions.id_divisi', 'job_descriptions.id_posisi', 'job_descriptions.periode_mulai', 'job_descriptions.periode_selesai')
                                    ->selectRaw('job_descriptions.id, job_descriptions.id_divisi, job_descriptions.id_posisi, job_descriptions.periode_mulai, job_descriptions.periode_selesai, GROUP_CONCAT(tasks.tugas) as tugas')
                                    ->groupBy('job_descriptions.id', 'job_descriptions.id_divisi', 'job_descriptions.id_posisi', 'job_descriptions.periode_mulai', 'job_descriptions.periode_selesai')
                                    ->get();
        $jobDesc->transform(function ($item) {
            $item->tugas = explode(',', $item->tugas);
            return $item;
        });

        $allDates = [];
        $now = Carbon::now();
        $formatNow = $now->isoFormat('dddd, D MMMM YYYY');

        foreach ($jobDesc as $jd) {
            $id_jobdesc = $jd->id;
            $periodemulai = $jd->periode_mulai;
            $periodeselesai = $jd->periode_selesai;
            $tugas = $jd->tugas;
            
            $formatStartDate = Carbon::parse($periodemulai);
            $formatEndDate = Carbon::parse($periodeselesai);

            foreach ($formatStartDate->toPeriod($formatEndDate) as $date) {
                if($date->isWeekend()) {
                    continue;
                }

                $dateYmd = $date->isoFormat('dddd, D MMMM YYYY');
                $allDates[] = [
                    'id_jobdesc' => $id_jobdesc,
                    'date' => $dateYmd,
                    'tugas' => $tugas
                ];
            }
        }

        // return response()->json([
        //     // 'jobRes' => $jobRes,
        //     // 'user' => $data,
        //     // 'jobDesc' => $jobDesc,
        //     // 'allDates' => $allDates,
        //     // 'now' => $now,
        //     // 'frmtNow' => $formatNow,
        //     // 'allDates' => $allDates.
        //     'foto' => $foto,
        // ]);

        return view('sholikin.employee.job-description.user-edit-upload-job-description', compact('jobRes', 'data', 'allDates', 'formatNow','foto'));
    }

    public function update(Request $request, $id)
    {
        //  return response()->json($request->all());
        $validate = Validator::make($request->all(), [
            'id_karyawan' => 'required',
            'id_jobdesc' => 'required',
            'keterangan' => ''
        ]);

        if($validate->fails()) {
            Alert::error('Gagal', 'Data tidak valid');
            return redirect()->back();
        }

        $jobRes = JobResult::find($id);
        $jobRes->id_karyawan = $request->id_karyawan;
        $jobRes->id_jobdesc = $request->id_jobdesc;
        if($request->foto != null)
        {
            $foto = json_encode($request->foto);
            $jobRes->foto = $foto;
        }
        $jobRes->keterangan = $request->keterangan;
        $jobRes->save();

        toast('Data berhasil diubah', 'success');
        return redirect()->route('user-upload-job-description.index');
    }

    public function destroy($id)
    {
        $jobRes = JobResult::find($id);
        $jobRes->delete();

        toast('Data berhasil dihapus', 'success');
        return redirect()->route('user-upload-job-description.index');
    }

    public function uploadTugas(Request $request)
    {
        $filename = $request->file('file')->getClientOriginalName();
        $name = trim($filename);

        $request->file('file')->storeAs('public/uploads/karyawan/tugas', $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $filename
        ]);
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
