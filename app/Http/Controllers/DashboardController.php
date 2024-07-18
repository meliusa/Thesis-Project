<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\JobType;
use App\Models\Division;
use App\Models\Employee;
use App\Models\JobPosition;
use Illuminate\Http\Request;
use App\Models\SalaryAdvance;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        SalaryAdvance::where([
            ['bulan', '=', Carbon::now()->isoFormat('MMMM')],
            ['tahun', '<', Carbon::now()->year]
        ])->delete();

        $division = Division::count();
        $employees = Employee::all();
        $operatorCount = 0;
        $helperCount = 0;

        foreach ($employees as $employee) {
            $employee->job_position->nama_posisi == "Operator" ? $operatorCount++ : $helperCount++;
        }

        return view('dashboard', compact('division', 'operatorCount', 'helperCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
