<?php

namespace App\Http\Controllers\Sholikin\Admin\Pengajuan;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Employee;
use App\Models\Schedule;
use App\Models\Submission;
use App\Models\Attendance;
use App\Models\EmployeeSchedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class AdminPengajuanController extends Controller
{
    public function index()
    {
        $submissions = Submission::all();
        // return response()->json([
        //     'employee' => $submissions
        // ]);
        return view('sholikin.admin.submission.admin-submission-index', compact('submissions'));
    }

    public function edit($id)
    {
        $submission = Submission::find($id);
        $tanggal_mulai = Carbon::parse($submission->tanggal_mulai)->format('m/d/Y');
        $tanggal_selesai = Carbon::parse($submission->tanggal_selesai)->format('m/d/Y');
        $periode = $tanggal_mulai . ' - ' . $tanggal_selesai;
        // return response()->json([
        //     'submission' => $submission,
        //     'tanggal_mulai' => $tanggal_mulai,
        //     'tanggal_selesai' => $tanggal_selesai,
        //     'periode' => $periode
        // ]);

        return view('sholikin.admin.submission.admin-edit-submission', compact('submission', 'periode'));
    }

    public function update(Request $request, $id)
    {
        $submission = Submission::find($id);
        $employeeSchedule = EmployeeSchedule::where('id_karyawan', $submission->id_karyawan)->with('schedule')->get();
        $absensi = Attendance::where('id_karyawan', $submission->id_karyawan)->get();
        return response()->json([
            'submission' => $submission,
            'employeeSchedule' => $employeeSchedule,
            // 'schedule' => $schedule,
            'absensi' => $absensi
        ]);
        
        $status =$request->status;
        // return response()->json($status);
        
        $periode = $request->periode;
        $now = Carbon::now();
        $dateRange = explode(' - ', $request['periode']);

        $start = Carbon::parse(substr($dateRange[0], 0, 10), 'UTC');
        $end = Carbon::parse(substr($dateRange[1], 0, 10), 'UTC');
        $isPastSubmission = $start->isPast($now);

        $startFrmt = $start->format('d M Y');
        $endFrmt = $end->format('d M Y');
        return response()->json([
            'dateRange' => $dateRange,
            'start' => $start,
            'end' => $end,
            'isPastSubmission' => $isPastSubmission,
            'startFrmt' => $startFrmt,
            'endFrmt' => $endFrmt
        ]);

        $validator = Validator::make($request->all(), [
            'id_karyawan' => 'required',
            'jenis_pengajuan' => 'required',
            'periode' => 'required',
            'keterangan' => 'required',
            // 'surat_izin' => 'required',
            'status' => 'required'
        ]);
        return response()->json($validator->errors());

        if($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ]);
        }

        if($status == 'ditolak') {
            $submission->update([
                'status' => $status
            ]);
        } else {
            $submission->update([
                'id_karyawan' => $request->id_karyawan,
                'jenis_pengajuan' => $request->jenis_pengajuan,
                'tanggal_mulai' => $start,
                'tanggal_selesai' => $end,
                'keterangan' => $request->keterangan,
                'surat_izin' => $request->surat_izin,
                'status' => $status
            ]);
        }

        $responseData = [
            'submission' => $submission,
            'employeeSchedule' => $employeeSchedule,
            'absensi' => $absensi
        ];

        return response()->json($responseData);

        return redirect()->route('admin.submission.index');
    }

    public function cekTanggalPengajuan(Request $request)
    {
        $id_karyawan = $request->id_karyawan;
        $periode = $request->periode;
        $now = Carbon::now();
        $dateRange = explode(' - ', $request['periode']);

        $start = Carbon::parse(substr($dateRange[0], 0, 10), 'UTC');
        $end = Carbon::parse(substr($dateRange[1], 0, 10), 'UTC');
        $isPastSubmission = $start->isPast($now);

        $startFrmt = $start->format('d M Y');
        $endFrmt = $end->format('d M Y');
        return response()->json([
            'dateRange' => $dateRange,
            'start' => $start,
            'end' => $end,
            'isPastSubmission' => $isPastSubmission,
            'startFrmt' => $startFrmt,
            'endFrmt' => $endFrmt
        ]);

        $employeeSchedule = EmployeeSchedule::where('id_karyawan', $id_karyawan)->with('schedule')->get();
        $absensi = Attendance::where('id_karyawan', $id_karyawan)->get();
        return response()->json([
            'employeeSchedule' => $employeeSchedule,
            'absensi' => $absensi
        ]);
    }
}
