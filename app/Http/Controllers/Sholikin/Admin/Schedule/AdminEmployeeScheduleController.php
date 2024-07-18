<?php

namespace App\Http\Controllers\Sholikin\Admin\Schedule;

use Carbon\Carbon;
use App\Models\Holiday;
use App\Models\Division;
use App\Models\Employee;
use App\Models\Schedule;
use App\Models\JobPosition;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\EmployeeSchedule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class AdminEmployeeScheduleController extends Controller
{
    public function index()
    {
        $divisions = Division::all();
        $employeeSch = EmployeeSchedule::orderBy('created_at', 'desc')->get();

        return view('sholikin.admin.employee-schedule.admin-employee-schedule', compact('divisions', 'employeeSch'));
    }

    public function create()
    {
        $divisions = Division::all();

        return view('sholikin.admin.employee-schedule.admin-create-employee-schedule', compact('divisions'));
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'id_jadwal' => 'required',
            'id_karyawan' => 'required|array'
        ]);

        if($validate->fails()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Data Invalid!'
            ], 400);
        }

        $id_jadwal = $request->id_jadwal;
        $id_karyawan = $request->id_karyawan;

        foreach ($id_karyawan as $id) {
            EmployeeSchedule::create([
                'id_jadwal' => $id_jadwal,
                'id_karyawan' => $id,
            ]);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Employee schedule created successfully'
        ], 200);
    }

    public function show(Request $request, $id)
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

        // return response()->json($allDates);

        return view('sholikin.admin.employee-schedule.admin-show-employee-schedule', compact('data', 'allDates'));
    }

    public function edit($id)
    {
        $employeeSchedule = EmployeeSchedule::find($id);
        $schedules = Schedule::where('id_divisi', $employeeSchedule->employee->id_divisi)
                        ->where('id_posisi', $employeeSchedule->employee->id_posisi)
                        ->get();

        return view('sholikin.admin.employee-schedule.admin-edit-employee-schedule', compact('employeeSchedule', 'schedules'));
    }

    public function update(Request $request, $id)
    {
        $employeeSchedule = EmployeeSchedule::find($id);
        $id_jadwal = $request->id_jadwal;
        $validate = Validator::make($request->all(), [
            'id_jadwal' => 'required',
            'id_karyawan' => 'required'
        ]);

        if($validate->fails()) {
            Alert::error('Error', 'Data tidak valid');
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $employeeSchedule->update([
            'id_jadwal' => $request->id_karyawan,
            'id_jadwal' => $id_jadwal
        ]);

        toast('Jadwal Karyawan Berhasil Diubah', 'success');
        return redirect()->route('employee-schedule.index');
    }

    public function destroy($id)
    {
        $employeeSchedule = EmployeeSchedule::find($id);
        $employeeSchedule->delete();

        toast('Jadwal Karyawan Berhasil Dihapus', 'success');
        return redirect()->route('employee-schedule.index');
    }

    public function getSchedule(Request $request)
    {
        $id_divisi = $request->id_divisi;
        $id_posisi = $request->id_posisi;

        $schedules = Schedule::where('id_divisi', $id_divisi)
                        ->where('id_posisi', $id_posisi)
                        ->get();

        return response()->json($schedules);
    }

    public function getScheduleDetail(Request $request)
    {
        $schedule = Schedule::find($request->id_jadwal);
        $employeeHaveBeenAssign = EmployeeSchedule::where('id_jadwal',$request->id_jadwal)->get();
        $arrEmmpAsg = [];
        foreach($employeeHaveBeenAssign as $key => $item) {
            $arrEmmpAsg[$key] = $item->id_karyawan;
        }

        return response()->json([
            'jam_masuk' => $schedule->jam_masuk,
            'jam_pulang' => $schedule->jam_pulang,
            'karyawan' => $arrEmmpAsg
        ]);
    }

    public function getEmployee(Request $request)
    {
        $id_divisi = $request->id_divisi;
        $id_posisi = $request->id_posisi;

        $employees = Employee::where('id_divisi', $id_divisi)
                    ->where('id_posisi', $id_posisi)
                    ->get();

        $employees = $employees->map(function($employee) {
            return [
                'id' => $employee->id,
                'foto' => $employee->user->foto,
                'nama_lengkap' => $employee->nama_lengkap,
                'divisi' => $employee->division->nama_divisi,
                'posisi' => $employee->job_position->nama_posisi,
            ];
        });

        return response()->json($employees);
    }
}
