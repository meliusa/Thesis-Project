<?php

namespace App\Exports;

use App\Models\SalaryAdvance;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportAdvanceSalary implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        return view('payroll.export-advance-salary', [
            'advanceSalaries' => SalaryAdvance::all()
        ]);
    }
}
