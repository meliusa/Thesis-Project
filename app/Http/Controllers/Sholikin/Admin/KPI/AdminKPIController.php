<?php

namespace App\Http\Controllers\Sholikin\Admin\KPI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Employee;
use App\Models\JobResult;

class AdminKPIController extends Controller
{
    public function attendance()
    {
        $employee = Employee::select('id', 'id_user', 'nama_lengkap', 'id_divisi', 'id_posisi')->get();
        // return response()->json($employee);

        $absensiBulanIni = Attendance::whereYear('tanggal', '=', now()->year)
                            ->whereMonth('tanggal', '=', now()->month)
                            ->get();
        // return response()->json($absensiBulanIni);

        $totalKehadiran = $absensiBulanIni->where('status', 'Hadir')->count();
        $totalTerlambat = $absensiBulanIni->where('status', 'Terlambat')->count();
        $totalIzin = $absensiBulanIni->where('status', 'Izin')->count();
        $totalSakit = $absensiBulanIni->where('status', 'Sakit')->count();
        $totalCuti = $absensiBulanIni->where('status', 'Cuti')->count();

        $totalHariKerja = $absensiBulanIni->groupBy('tanggal')->count();
        $poinKehadiran = ($totalKehadiran / $totalHariKerja) * 100;
        $poinTerlambat = ($totalTerlambat / $totalHariKerja) * 100;
        $poinIzin = ($totalIzin / $totalHariKerja) * 100;
        $poinSakit = ($totalSakit / $totalHariKerja) * 100;
        $poinCuti = ($totalCuti / $totalHariKerja) * 100;

        // return response()->json([
        //     'totalKehadiran' => $totalKehadiran,
        //     'totalTerlambat' => $totalTerlambat,
        //     'totalIzin' => $totalIzin,
        //     'totalSakit' => $totalSakit,
        //     'totalCuti' => $totalCuti,
        //     'poinKehadiran' => $poinKehadiran,
        //     'poinTerlambat' => $poinTerlambat,
        //     'poinIzin' => $poinIzin,
        //     'poinSakit' => $poinSakit,
        //     'poinCuti' => $poinCuti
        // ]);
    
        return view('sholikin.admin.kpi.admin-kpi-attendance', compact('employee', 'absensiBulanIni', 'totalKehadiran', 'totalTerlambat', 'totalIzin', 'totalSakit', 'totalCuti', 'totalHariKerja', 'poinKehadiran', 'poinTerlambat', 'poinIzin', 'poinSakit', 'poinCuti'));
    }

    public function jobDescription()
    {
        $employee = Employee::select('id', 'id_user', 'nama_lengkap', 'id_divisi', 'id_posisi')->get();
        $jobResult = [];
        foreach ($employee as $emp) {
            $jobResult[$emp->id] = JobResult::join('employees', 'job_results.id_karyawan', '=', 'employees.id')
                                    ->join('job_descriptions', 'job_results.id_jobdesc', '=', 'job_descriptions.id')
                                    ->where('job_results.id_karyawan', $emp->id)
                                    ->get();
        }
        return response()->json([
            'employee' => $employee,
            'jobResult' => $jobResult
        ]);
        return view('sholikin.admin.kpi.admin-kpi-jobdescription');
    }
}
