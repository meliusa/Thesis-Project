<?php

namespace App\Http\Controllers\Sholikin\Employee\Schedule;

use Carbon\Carbon;
use App\Models\Holiday;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Models\EmployeeSchedule;
use App\Http\Controllers\Controller;

class UserScheduleController extends Controller
{
    public function index()
    {
        $data = auth()->user()->employee;
        $employeeSchedule = EmployeeSchedule::select('employee_schedule.*')
                                ->join('schedules', 'employee_schedule.id_jadwal', '=', 'schedules.id')
                                ->where('id_karyawan', $data->id)
                                ->orderBy('created_at', 'desc')
                                ->get();

        return view('sholikin.employee.schedule.user-schedule', compact('data', 'employeeSchedule'));
    }

    public function show($id)
    {
        $data = EmployeeSchedule::find($id);
        $employeeSchedule = EmployeeSchedule::join('schedules', 'employee_schedule.id_jadwal', '=', 'schedules.id')
                                ->where('id_jadwal', $data->id_jadwal)
                                ->get();
        $holidays = Holiday::orderBy('year')->orderByRaw('MONTH(date)')->orderBy('date')->get();
        $allDatesYmd = [];
        $allDates = [];

        foreach ($employeeSchedule as $schedule) {
            $periodeMulai = Carbon::parse($schedule->periode_mulai);
            $periodeSelesai = Carbon::parse($schedule->periode_selesai);

            //cek hari libur dan keterangan
            foreach ($periodeMulai->toPeriod($periodeSelesai) as $date) {
                if ($date->isWeekend()) {
                    continue;
                }
        
                $dateYmd = $date->format('Y-m-d');
                $holidayData = $holidays->where('date', $dateYmd)->first();
        
                if ($holidayData) {
                    $isHoliday = true;
                    $holidayDesc = $holidayData->name;
                    $jam_masuk = null;
                    $jam_pulang = null;
                } else {
                    $isHoliday = false;
                    $holidayDesc = null;
                    $jam_masuk = $schedule->jam_masuk;
                    $jam_pulang = $schedule->jam_pulang;
                }

                $allDatesYmd[] = [
                    'date' => $dateYmd,
                    'is_holiday' => $isHoliday,
                    'description' => $holidayDesc,
                    'jam_masuk' => $jam_masuk,
                    'jam_pulang' => $jam_pulang
                ];
            }

            foreach ($allDatesYmd as $key => $item) {
                $date = Carbon::createFromFormat('Y-m-d', $item['date']);
                
                $allDates[] = [
                    'date' => $date->isoFormat('dddd, D MMMM YYYY'),
                    'jam_masuk' => $item['jam_masuk'],
                    'jam_pulang' => $item['jam_pulang'],
                    'is_holiday' => $item['is_holiday'],
                    'description' => $item['description']
                ];
            }

            $filter = [];
            foreach ($allDates as $value)
            {
                $filter[$value['date']] = $value;
            }

            $allDates = array_values($filter);
        }

        // return response()->json([
        //     // 'holiday' => $holidays,
        //     'data' => $data,
        //     'employeeSch' => $employeeSchedule,
        //     'formatStartDate' => $formatStartDate,
        //     'formatEndDate' => $formatEndDate,
        //     'allDatesYmd' => $allDatesYmd,
        //     'allDates' => $allDates,
        // ]);

        return view('sholikin.employee.schedule.user-detail-schedule', compact('data', 'employeeSchedule', 'allDates'));
    }
}
