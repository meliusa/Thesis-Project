<?php

namespace App\Http\Controllers\Payroll;

use App\Exports\ExportAdvanceSalary;
use PDF;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\SalaryAdvance;
use App\Models\EmployeeSalary;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Exports\ExportEmployeeSalary;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeSalaryController extends Controller
{
    public function index()
    {
        $employeeSalaries = DB::select(
            'SELECT es.id AS es_id, es.id_karyawan, e.nama_lengkap, sa.id AS sa_id, sa.bulan, sa.tahun 
            FROM employee_salaries AS es JOIN salary_advances AS sa ON sa.id_gaji = es.id JOIN employees AS e 
            ON e.id = es.id_karyawan GROUP BY sa.id_gaji, sa.bulan ORDER BY bulan ASC'
        );
        return view('payroll.salary-table', compact('employeeSalaries'));
    }

    public function create()
    {
        $employees = Employee::latest()->first();
        return view('payroll.salary-payslip-report', compact('employees'));
    }

    public function store(Request $request)
    {
        $employee = Employee::latest()->first();
        $gajiPokok = $request->input('gaji_pokok');
        $PPH21 = $request->input('PPH21');
        $asuransi = $request->input('asuransi');

        $request['gaji_bersih'] = $gajiPokok - $PPH21 - $asuransi;
        $request['nik_karyawan'] = $employee->nik;

        $validatedData = Validator::make($request->all(), [
            'id_karyawan' => 'required|string',
            'nik_karyawan' => 'required|min:16|max:16',
            'gaji_pokok' => 'required',
            'PPH21' => 'required',
            'asuransi' => 'required'
        ]);

        if ($validatedData->fails()) {
            $employee->delete();
            Alert::error('Error Title', 'Data Gaji Tidak Valid');
            return redirect()->back();
        }

        EmployeeSalary::create($request->all());

        toast('Berhasil Menambahkan Data Karyawan', 'success');
        return redirect()->route('employee.index');
    }

    public function show(EmployeeSalary $employeeSalary, Request $request)
    {
        $id = SalaryAdvance::where([
            ['id_gaji', '=', $employeeSalary->id],
            ['bulan', '=', $request->month]
        ])->max('id');
        $detail = SalaryAdvance::where('id', $id)->get(['bulan', 'tahun', 'total_gaji']);

        $oneMonthSalaries = SalaryAdvance::where([
            ['id_gaji', '=', $employeeSalary->id],
            ['bulan', '=', $request->month]
        ])->get();

        $ketBonus = [];
        $ketPotongan = [];
        $bonus = 0;
        $potongan = 0;
        foreach ($oneMonthSalaries as $s) {
            if ($s->kategori == "bonus") {
                array_push($ketBonus, $s->keterangan);
                $bonus = $bonus + $s->jumlah;
            } else {
                array_push($ketPotongan, $s->keterangan);
                $potongan = $potongan + $s->jumlah;
            }
        }

        return view('payroll.salary-payslip', compact('employeeSalary', 'detail', 'ketBonus', 'ketPotongan', 'bonus', 'potongan'));
    }

    public function edit(EmployeeSalary $employeeSalary)
    {
        return view('profile.edit-data-gaji', compact('employeeSalary'));
    }

    public function update(EmployeeSalary $employeeSalary, Request $request)
    {
        $employee = Employee::find($employeeSalary->id_karyawan);

        $gajiPokok = $request->input('gaji_pokok');
        $PPH21 = $request->input('PPH21');
        $asuransi = $request->input('asuransi');
        $request['gaji_bersih'] = $gajiPokok - $PPH21 - $asuransi;

        if ($request['bank'] != $employeeSalary->employee->bank || $request['nomor_rekening'] != $employeeSalary->employee->nomor_rekening) {
            $employee->update([
                'bank' => $request['bank'],
                'nomor_rekening' => $request['nomor_rekening']
            ]);
        }

        $validatedData = Validator::make($request->all(), [
            'gaji_pokok' => 'required',
            'PPH21' => 'required',
            'asuransi' => 'required'
        ]);

        if ($validatedData->fails()) {
            Alert::error('Error Title', 'Data Gaji Tidak Valid');
            return redirect()->back();
        }
        $employeeSalary->update($request->all());

        toast('Berhasil Edit Data Gaji', 'success');
        return redirect()->route('profile.salary', ['id' => $employee->id]);
    }

    public function getSalary(Request $request)
    {
        $gajiKaryawan = EmployeeSalary::where('id_karyawan', $request->id)->get();
        return response()->json($gajiKaryawan);
    }

    public function printPaySlip(Request $request)
    {
        $employeeSalary = EmployeeSalary::where('id', $request->id)->first();

        $id = SalaryAdvance::where([
            ['id_gaji', '=', $employeeSalary->id],
            ['bulan', '=', $request->month]
        ])->max('id');
        $detail = SalaryAdvance::where('id', $id)->get(['bulan', 'tahun', 'total_gaji']);

        $oneMonthSalaries = SalaryAdvance::where([
            ['id_gaji', '=', $employeeSalary->id],
            ['bulan', '=', $request->month]
        ])->get();

        $ketBonus = [];
        $ketPot = [];
        $bonus = 0;
        $potongan = 0;

        foreach ($oneMonthSalaries as $s) {
            if ($s->kategori == "bonus") {
                array_push($ketBonus, $s->keterangan);
                $bonus = $bonus + $s->jumlah;
            } else {
                array_push($ketPot, $s->keterangan);
                $potongan = $potongan + $s->jumlah;
            }
        }

        $path = public_path('src/media/logos/logo.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $img = "data:image/" . $type . ";base64," . base64_encode($data);

        $pdf = PDF::loadview('payroll.salary-payslip-report', compact('employeeSalary', 'detail', 'img', 'bonus', 'potongan', 'ketBonus', 'ketPot'));
        return $pdf->download('laporan-slip-gaji.pdf');
    }

    public function excelEmployeeSalary()
    {
        return Excel::download(new ExportEmployeeSalary, 'daftar-gaji-karyawan.xlsx');
    }

    public function excelSalaryAdvance()
    {
        return Excel::download(new ExportAdvanceSalary, 'daftar-generate-gaji.xlsx');
    }
}
