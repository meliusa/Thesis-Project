<?php

namespace App\Http\Controllers\Employee;

use App\Models\Role;
use App\Models\User;
use App\Models\JobType;
use App\Models\Division;
use App\Models\JobPosition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Employee\EmployeeController;

class AccountController extends Controller
{
    public function create()
    {
        $division = Division::orderBy('nama_divisi', 'ASC')->get();
        $positions = JobPosition::orderBy('nama_posisi', 'ASC')->get();
        $types = JobType::orderBy('nama_pekerjaan', 'ASC')->get();
        $roles = Role::orderBy('nama_role', 'ASC')->get();
        
        return view('employee.create-employee', compact('division', 'positions', 'types', 'roles'));
    }

    public function store(Request $request)
    {
        $division = Division::orderBy('nama_divisi', 'ASC')->get();

        $filename = $request->file('avatar')->getClientOriginalName();
        $name = trim($filename);

        $request->file('avatar')->storeAs('public/uploads/karyawan/foto-karyawan', $name);
        $request['foto'] = $name;

        $validatedData = Validator::make($request->all(), [
            'username'  =>  'required|string',
            'password'  =>  'required|string',
            'foto' =>  'required'
        ]);

        if ($validatedData->fails()) {
            $pathavatar = 'public/uploads/karyawan/foto_karyawan' . $request['foto'];
            if (file_exists($pathavatar)) {
                unlink($pathavatar);
            }

            Alert::error('Error Title', 'Data Pribadi Karyawan Tidak Valid');
            return redirect()->back();
        }
        User::create($request->all());

        $employee = new EmployeeController;
        return $employee->store($request);
    }
}
