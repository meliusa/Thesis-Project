<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use App\Models\JobPosition;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class JobPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $division = Division::orderBy('nama_divisi', 'ASC')->get();
        $jobPositions = JobPosition::orderBy('nama_posisi', 'ASC')->get();
        return view('job.job-position-table', compact('division', 'jobPositions'));
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
            'id_divisi' => 'required|string',
            'nama_posisi' => 'required|string'
        ]);

        if ($validated->fails()) {
            Alert::error('Error Title', 'Error Message');
            return redirect()->back();
        }

        JobPosition::create($request->all());

        toast('Data Berhasil Ditambahkan', 'success');
        return redirect()->route('job-position.index');
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
        $posisi = JobPosition::find($id);
        $posisi->delete();

        toast('Data Berhasil Dihapus', 'success');
        return redirect()->route('job-position.index');
    }
}
