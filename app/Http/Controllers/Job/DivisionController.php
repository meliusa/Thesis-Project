<?php

namespace App\Http\Controllers\Job;

use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class DivisionController extends Controller
{
    public function index()
    {
        $division = Division::orderBy('nama_divisi', 'ASC')->get();
        return view('job.division-table', compact('division'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'nama_divisi' => 'required|string'
        ]);
        
        if ($validated->fails()) {
            Alert::error('Error Title', 'Error Message');
            return redirect()->back();
        };

        Division::create($request->all());

        toast('Data Berhasil Ditambahkan', 'success');
        return redirect()->route('division.index');
    }

    public function destroy(string $id)
    {
        $division = Division::find($id);
        $division->delete();

        toast('Data Berhasil Dihapus', 'success');
        return redirect()->route('division.index');
    }
}
