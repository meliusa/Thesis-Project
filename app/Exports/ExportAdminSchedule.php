<?php

namespace App\Exports;

use App\Models\Schedule;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportAdminSchedule implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        return view('sholikin.admin.schedule.admin-export-schedule', [
            'schedule' => Schedule::all()
        ]);
    }
}
