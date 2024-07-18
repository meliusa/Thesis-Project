<?php

namespace App\Exports;

use App\Models\EmployeeSalary;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportEmployeeSalary implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        return view('payroll.export-salary', [
            'employeeSalaries' => EmployeeSalary::all()
        ]);
    }
}
