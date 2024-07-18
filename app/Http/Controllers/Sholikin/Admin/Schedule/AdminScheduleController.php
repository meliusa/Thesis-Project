<?php

namespace App\Http\Controllers\Sholikin\Admin\Schedule;

use App\Exports\ExportAdminSchedule;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use App\Models\Holiday;
use App\Models\Division;
use App\Models\Schedule;
use App\Models\JobPosition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class AdminScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::orderBy('created_at', 'desc')->get();
        $division = Division::all();
        $position = JobPosition::all();

        return view('sholikin.admin.schedule.admin-schedule', compact('schedules', 'division', 'position'));
    }

    public function store(Request $request)
    {
        $dateRange = explode(' - ', $request['periode']);
        
        $startDate = Carbon::parse($dateRange[0])->format('Y-m-d');  
        $endDate = Carbon::parse($dateRange[1])->format('Y-m-d');

        $validate = Validator::make($request->all(), [
            'id_divisi' => 'required',
            'id_posisi' => 'required',
            'periode' => 'required',
            'jam_masuk' => 'required',
            'jam_pulang' => 'required'
        ]);

        if($validate->fails()){
            Alert::error('Gagal', 'Data tidak valid');
            return redirect()->back();
        }

        $existingSchedule = Schedule::where('id_divisi', $request['id_divisi'])
                                ->where('id_posisi', $request['id_posisi'])
                                ->whereDate('periode_mulai', '<=', $endDate)
                                ->whereDate('periode_selesai', '>=', $startDate)
                                ->exists();

        if($existingSchedule) {
            $divisi = Division::findOrFail($request['id_divisi'])->nama_divisi;
            $posisi = JobPosition::findOrFail($request['id_posisi'])->nama_posisi;
            Alert::error('Gagal', "Jadwal untuk Divisi $divisi dan Posisi $posisi sudah ada pada periode tersebut");
            return redirect()->back();
        }

        $scheduleData = [
            'id_divisi' => $request['id_divisi'],
            'id_posisi' => $request['id_posisi'],
            'periode_mulai' => $startDate,
            'periode_selesai' => $endDate,
            'jam_masuk' => $request['jam_masuk'],
            'jam_pulang' => $request['jam_pulang']
        ];

        Schedule::create($scheduleData);

        toast('Berhasil Menambahkan Jadwal', 'success');
        return redirect()->route('schedule.index');
    }

    public function show(Schedule $schedule)
    {
        return response()->json([
            'success' => true,
            'dataJadwal' => $schedule,
            'dataDivisi' => Division::all(),
            'dataPosisi' => JobPosition::all()
        ]);
    }

    public function detail($id)
    {
        // return response()->json('halo');
        // $data = EmployeeSchedule::find($id);
        // $employeeSchedule = EmployeeSchedule::join('schedules', 'employee_schedule.id_jadwal', '=', 'schedules.id')
        //                         ->where('id_jadwal', $data->id_jadwal)
        //                         ->get();
        $data = Schedule::find($id);
        $schedules = Schedule::where('schedules.id', $id)->get();
        // return response()->json($schedules);
        $holidays = Holiday::orderBy('year')->orderByRaw('MONTH(date)')->orderBy('date')->get();
        $allDatesYmd = [];
        $allDates = [];

        foreach ($schedules as $schedule) {
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

        return view('sholikin.admin.schedule.admin-detail-schedule', compact('data', 'schedules', 'allDates'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $dateRange = explode(' - ', $request['periode']);

        $startDate = Carbon::parse($dateRange[0])->format('Y-m-d');  
        $endDate = Carbon::parse($dateRange[1])->format('Y-m-d');

        $validate = Validator::make($request->all(), [
            'id_divisi' => 'required',
            'id_posisi' => 'required',
            'periode' => 'required',
            'jam_masuk' => 'required',
            'jam_pulang' => 'required'
        ]);

        if($validate->fails()){
            Alert::error('Gagal', 'Data tidak valid');
            return redirect()->back();
        }

        $scheduleData = [
            'id_divisi' => $request['id_divisi'],
            'id_posisi' => $request['id_posisi'],
            'periode_mulai' => $startDate,
            'periode_selesai' => $endDate,
            'jam_masuk' => $request['jam_masuk'],
            'jam_pulang' => $request['jam_pulang']
        ];

        $schedule->update($scheduleData);

        toast('Berhasil Mengubah Data Jadwal', 'success');
        return redirect()->route('schedule.index');
    }

    public function destroy($id)
    {
        $schedule = Schedule::find($id);
        $schedule->delete();

        toast('Berhasil Menghapus Jadwal', 'success');
        return redirect()->route('schedule.index');
    }

    public function getPositionForSchedule(Request $request)
    {
        $id_division = $request->id_division;

        $positions = JobPosition::where('id_divisi', $id_division)->get();

        return response()->json([
            'success' => true,
            'dataPosisi' => $positions
        ]);
    }

    public function excelAdminSchedule()
    {
        return Excel::download(new ExportAdminSchedule, 'jadwal.xlsx');
    }
}
