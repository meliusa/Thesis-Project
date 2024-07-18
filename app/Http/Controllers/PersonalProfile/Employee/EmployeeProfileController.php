<?php

namespace App\Http\Controllers\PersonalProfile\Employee;

use App\Models\Employee;
use App\Models\Certificate;
use App\Models\FamilyDetail;
use Illuminate\Http\Request;
use App\Models\EmployeeSalary;
use App\Models\EmploymentHistory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmployeeProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $employee = $user->employee;

        return view('profile-employee.data-diri', compact('employee'));
    }

    public function family(Request $request)
    {
        $user = Auth::user()->employee;
        $jobPositions = $user->job_position;
        $employee = $user->family;
        $familyDetails = FamilyDetail::where('id_keluarga', $employee->id)->get();
        return view('profile-employee.data-keluarga', compact('user', 'jobPositions', 'employee', 'familyDetails'));
    }

    public function history(Request $request)
    {
        $user = Auth::user()->employee;
        $jobPositions = $user->job_position;
        $employmentHistories = $user->employment_histories;
        return view('profile-employee.riwayat-pekerjaan', compact('user', 'jobPositions', 'employmentHistories'));
    }

    public function certificate(Request $request)
    {
        $user = Auth::user()->employee;
        $jobPositions = $user->job_position;
        $certificates = $user->certificates;
        return view('profile-employee.sertifikat', compact('user', 'jobPositions', 'certificates'));
    }

    public function salary(Request $request)
    {
        $user = Auth::user()->employee;
        $salary = $user->employee_salary;
        return view('profile-employee.data-gaji', compact('user', 'salary'));
    }
}
