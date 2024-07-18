<?php

namespace App\Http\Controllers\Sholikin\Employee\Absensi;

use Carbon\Carbon;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\EmployeeSchedule;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class UserAbsensiController extends Controller
{
    public function index()
    {
        $data = auth()->user()->employee;
        $schedule = EmployeeSchedule::join('schedules', 'employee_schedule.id_jadwal', '=', 'schedules.id')
                                ->where('id_karyawan', $data->id)
                                ->get();
        $allDates = [];
        $formatNow = Carbon::now()->isoFormat('dddd, D MMMM YYYY');

        foreach ($schedule as $sch) {
            $id_jadwal_karyawan = $sch->id;
            $periodeMulai = Carbon::parse($sch->periode_mulai);
            $periodeSelesai = Carbon::parse($sch->periode_selesai);
            $jam_masuk = $sch->jam_masuk;
            $jam_pulang = $sch->jam_pulang;

            $formatJamMasuk = Carbon::createFromFormat('H:i', $jam_masuk)->format('H:i:s');
            $formatJamPulang = Carbon::createFromFormat('H:i', $jam_pulang)->format('H:i:s');

            foreach ($periodeMulai->toPeriod($periodeSelesai) as $date) {
                if ($date->isWeekend()) {
                    continue;
                }

                $dateYmd = $date->isoFormat('dddd, D MMMM YYYY');
                $allDates[] = [
                    'id_jadwal_karyawan' => $id_jadwal_karyawan,
                    'date' => $dateYmd,
                    'jam_masuk' => $jam_masuk,
                    'jam_pulang' => $jam_pulang,
                    'format_masuk' => $formatJamMasuk,
                    'format_pulang' => $formatJamPulang
                ];
            }
        }
        // return response()->json([
        //     'formatStartDate' => $periodeMulai,
        //     'formatEndDate' => $periodeSelesai,
        //     'schedule' => $schedule,
        //     'formatNow' => $formatNow,
        //     'allDates' => $allDates
        // ]);

        return view('sholikin.employee.absensi.user-absensi', compact('data', 'schedule', 'allDates', 'formatNow'));
    }

    public function absenMasuk(Request $request)
    {
        $data = auth()->user()->employee;
        $now = Carbon::now();
        $jam_sekarang = $now->format('H:i:s');
        $periode = Carbon::now()->isoFormat('MMMM YYYY');
        $toleransi = 15;

        $jam_masuk = $request->jam_masuk;
        $jam_masuk_toleransi = Carbon::createFromFormat('H:i:s', $jam_masuk)->addMinutes($toleransi)->format('H:i:s');
        $jam_pulang = $request->jam_pulang;

        $existingAttendance = $this->cekAbsensiMasuk($request);
        $existingAttendance = json_decode($existingAttendance->getContent());

        if($existingAttendance->status == 'success') {
            return response()->json([
                'status' => 'error',
                'message' => 'Anda sudah absen masuk hari ini'
            ], 422);
        }

        if ($jam_sekarang >= $jam_pulang) {
            return response()->json([
                'status' => 'error',
                'message' => 'Anda tidak dapat absen setelah jam pulang'
            ], 422);
        } elseif ($jam_sekarang >= $jam_masuk && $jam_sekarang <= $jam_masuk_toleransi) {
            $status = 'Hadir';
        } elseif ($jam_sekarang > $jam_masuk_toleransi) {
            $status = 'Terlambat';
        } elseif ($jam_sekarang) {
            return response()->json([
                'status' => 'error',
                'message' => 'Anda tidak dapat absen masuk sebelum waktunya'
            ], 420);
        }

        $absensi = new Attendance;
        $absensi->id_karyawan = $data->id;
        $absensi->periode = $periode;
        $absensi->tanggal = $now->format('Y-m-d');
        $absensi->jam_masuk = $jam_sekarang;
        $absensi->status = $status;
        $absensi->save();

        if ($status == 'Hadir') {
            return response()->json([
                'status' => 'hadir',
                'message' => 'Absensi masuk berhasil!'
            ]);
        } elseif ($status == 'Terlambat') {
            return response()->json([
                'status' => 'terlambat',
                'message' => 'Absensi masuk berhasil! (terlambat)'
            ]);
        }
    }

    public function absenPulang(Request $request)
    {
        $data = auth()->user()->employee;
        $now = Carbon::now();
        $jam_sekarang = $now->format('H:i:s');
        $periode = Carbon::now()->isoFormat('MMMM YYYY');

        $response = $this->cekAbsensiMasuk($request);
        $responseData = json_decode($response->getContent());

        if($responseData->status == 'error') {
            return response()->json([
                'status' => 'error',
                'message' => 'Anda belum absen masuk hari ini!'
            ], 422);
        } elseif($responseData->status == 'success') {
            $response = $this->cekAbsensiPulang($request);
            $responseData = json_decode($response->getContent());

            if($responseData->status == 'success') {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Anda sudah absen pulang hari ini!'
                ], 422);
            }
        }

        $jam_masuk = $request->jam_masuk;
        $jam_pulang = $request->jam_pulang;

        if($jam_sekarang === $jam_pulang) {
            $jam_pulang = $jam_sekarang;
        } elseif ($jam_sekarang > $jam_pulang) {
            $jam_pulang = $jam_sekarang;
        } else{
            return response()->json([
                'status' => 'error',
                'message' => 'Anda tidak dapat absen pulang sebelum waktunya!'
            ], 420);
        }

        $absensi = Attendance::where('id_karyawan', $data->id)
                            ->where('periode', $periode)
                            ->where('tanggal', $now->format('Y-m-d'))
                            ->first();
        $absensi->jam_pulang = $jam_pulang;
        $absensi->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Absensi pulang berhasil!',
        ], 200);
    }

    public function cekAbsensiMasuk(Request $request)
    {
        $data = auth()->user()->employee;
        $now = Carbon::now();
        $absensi = Attendance::where('id_karyawan', $data->id)
                            ->where('tanggal', $now->format('Y-m-d'))
                            ->first();

        if($absensi) {
            return response()->json([
                'status' => 'success',
                'message' => 'Anda sudah absen masuk hari ini',
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Anda belum absen hari ini'
            ]);
        }
    }

    public function cekAbsensiPulang(Request $request)
    {
        $data = auth()->user()->employee;
        $now = Carbon::now();
        $absensi = Attendance::where('id_karyawan', $data->id)
                            ->where('tanggal', $now->format('Y-m-d'))
                            ->first();

        if($absensi) {
            if($absensi->jam_pulang) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Anda sudah absen pulang hari ini',
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Anda belum absen pulang hari ini'
                ]);
            }
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Anda belum absen hari ini'
            ]);
        }
    }

    public function laporanAbsensi(Request $request)
    {
        $data = auth()->user()->employee['id'];
        $absensi = Attendance::where('id_karyawan', $data)
                            ->orderBy('tanggal', 'desc')
                            ->get();

        return view('sholikin.employee.absensi.user-attendance-report', compact('absensi'));
    }
}
