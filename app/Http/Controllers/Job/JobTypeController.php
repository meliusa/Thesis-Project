<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use App\Models\JobType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class JobTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobTypes = JobType::orderBy('nama_pekerjaan', 'ASC')->get();
        return view('job.job-type-table', compact('jobTypes'));
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
        $validated = Validator::make($request->all(), [
            'nama_pekerjaan' => 'required|string'
        ]);

        if ($validated->fails()) {
            Alert::error('Error Title', 'Error Message');
            return redirect()->back();
        }

        JobType::create($request->all());

        toast('Data Berhasil Ditambahkan', 'success');
        return redirect()->route('job-type.index');
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
        $job = JobType::find($id);
        $job->delete();

        toast('Data Berhasil Dihapus', 'success');
        return redirect()->route('job-type.index');
    }
}
