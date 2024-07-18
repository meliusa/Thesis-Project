<?php

namespace App\Http\Controllers\Contract;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Employee;
use App\Models\EmployeeContract;
use App\Models\JobType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeeContractController extends Controller
{
    public function index()
    {
        $employees = Employee::orderBy('nama_lengkap', 'ASC')->get();
        $contracts = Contract::orderBy('durasi', 'ASC')->get();
        $employeeContracts = EmployeeContract::all();
        return view('contract.employee-contract-table', compact('employees', 'contracts', 'employeeContracts'));
    }

    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'id_karyawan'  =>  'required',
            'id_kontrak' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required'
        ]);

        $request['tanggal_mulai'] = Carbon::parse($request['tanggal_mulai']);
        $request['tanggal_selesai'] = Carbon::parse($request['tanggal_selesai']);

        if ($validated->fails()) {
            Alert::error('Error Title', 'Data Kontrak Karyawan Tidak Valid');
            return redirect()->back();
        }

        EmployeeContract::create($request->all());

        toast('Kontrak created successfully.', 'success');
        return redirect()->route('employee-contract.index');
    }

    public function show(EmployeeContract $employeeContract)
    {
        return response()->json([
            'success' => true,
            'dataEmployeeContract'  => $employeeContract,
            'dataContract' => Contract::all(),
            'dataEmployee' => Employee::where('id', $employeeContract->id_karyawan)->get('nama_lengkap')
        ]);
    }

    public function update(Request $request, EmployeeContract $employeeContract)
    {
        $validated = Validator::make($request->all(), [
            'id_kontrak' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required'
        ]);

        $request['tanggal_mulai'] = Carbon::parse($request['tanggal_mulai']);
        $request['tanggal_selesai'] = Carbon::parse($request['tanggal_selesai']);

        if ($validated->fails()) {
            Alert::error('Error Title', 'Data Kontrak Karyawan Tidak Valid');
            return redirect()->back();
        }

        $employeeContract->update($request->all());

        toast('Kontrak Karyawan Berhasil Diupdate', 'success');
        return redirect()->route('employee-contract.index');
    }

    public function destroy(EmployeeContract $employeeContract)
    {
        $employeeContract->delete();

        toast('Kontrak Karyawan Berhasil Dihapus', 'success');
        return redirect()->route('employee-contract.index');
    }
}
