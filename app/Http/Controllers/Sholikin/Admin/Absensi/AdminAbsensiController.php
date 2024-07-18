<?php

namespace App\Http\Controllers\Sholikin\Admin\Absensi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;

class AdminAbsensiController extends Controller
{
    public function index()
    {
        $absensi = Attendance::all()->sortByDesc('created_at');

        return view('sholikin.admin.absensi.admin-attendance-report', compact('absensi'));
    }
}
