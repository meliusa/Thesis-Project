<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Employee;
use App\Models\EmployeeSalary;
use App\Models\EmploymentHistory;
use App\Models\FamilyDetail;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function employee(Request $request)
    {
        $employee = Employee::find($request->id);
        return view('profile.data-diri', compact('employee'));
    }

    public function family(Request $request)
    {
        $employee = Employee::find($request->id);
        $familyDetails = FamilyDetail::where('id_keluarga', $employee->family->id)->get();
        // return response()->json($familyDetails);
        return view('profile.data-keluarga', compact('employee', 'familyDetails'));
    }

    public function history(Request $request)
    {
        $employee = Employee::find($request->id);
        $employmentHistories = EmploymentHistory::where('id_karyawan', $employee->id)->get();
        return view('profile.riwayat-pekerjaan', compact('employee', 'employmentHistories'));
    }

    public function certificate(Request $request)
    {
        $employee = Employee::find($request->id);
        $certificates = Certificate::where('id_karyawan', $employee->id)->get();
        return view('profile.sertifikat', compact('employee', 'certificates'));
    }

    public function salary(Request $request)
    {
        $employee = Employee::find($request->id);
        $salary = EmployeeSalary::where('id_karyawan', $employee->id)->first();
        return view('profile.data-gaji', compact('employee', 'salary'));
    }
}
