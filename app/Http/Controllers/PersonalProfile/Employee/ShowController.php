<?php

namespace App\Http\Controllers\PersonalProfile\Employee;

use Illuminate\Http\Request;
use App\Models\SalaryAdvance;
use App\Models\EmployeeSalary;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    public function contract()
    {
        $user = Auth::user()->employee;
        $employeeContract = $user->employee_contract;
        $contract = $employeeContract->contract;
        return view('contract.show-contract-for-employee', compact('user', 'employeeContract', 'contract'));
    }

    
    public function salary()
    {
        $user = Auth::user()->employee;
        $employeeSalary = EmployeeSalary::join('employees', 'employee_salaries.id_karyawan', '=', 'employees.id')
        ->join('salary_advances', 'salary_advances.id_gaji', '=', 'employee_salaries.id')
        ->where('employee_salaries.id_karyawan', $user->id)  // Tambahkan kondisi untuk filter berdasarkan user login
        ->select('employee_salaries.id AS es_id', 'employee_salaries.id_karyawan', 'employees.nama_lengkap', 'salary_advances.id AS sa_id', 'salary_advances.bulan', 'salary_advances.tahun')
        ->groupBy('salary_advances.id_gaji', 'salary_advances.bulan')
        ->orderBy('bulan', 'ASC')
        ->get();
        // return response()->json($employeeSalary);
        return view('payroll.show-salary-for-employee', compact('user', 'employeeSalary'));
    }
    
    public function slipGaji(EmployeeSalary $employeeSalary, Request $request)
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

        // return response()->json([
        //     'employee salary' => $employeeSalary,
        //     'id' => $id,
        //     'detail' => $detail,
        //     'oneMonthSalaries' => $oneMonthSalaries,
        //     'ketBonus' => $ketBonus,
        //     'ketPotongan' => $ketPotongan
        // ]);

        return view('payroll.show-payslip-for-employee', compact('employeeSalary', 'detail', 'ketBonus', 'ketPotongan', 'bonus', 'potongan'));
    } 
}
