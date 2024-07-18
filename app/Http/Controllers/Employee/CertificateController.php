<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Payroll\EmployeeSalaryController;
use App\Models\Certificate;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class CertificateController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'id_karyawan'   =>  'required|string',
            'file_sertifikat'   =>  'required'
        ]);

        if ($validatedData->fails()) {
            for ($i = 0; $i < count($request['file_sertifikat']); $i++) {
                $path = 'public/uploads/karyawan/sertifikat' . $request['file_sertifikat'][$i];
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            $employee = Employee::latest()->first();
            $employee->delete();
            Alert::error('Error Title', 'Data Sertifikat Tidak Valid');
            return redirect()->back();
        }

        for ($i = 0; $i < count($request['file_sertifikat']); $i++) {
            $sertifikats[] = [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'id_karyawan'   =>  $request['id_karyawan'],
                'file_sertifikat'   =>  $request['file_sertifikat'][$i],
                'created_at'    =>  Carbon::now(),
                'updated_at'    =>  Carbon::now()
            ];
        }
        Certificate::insert($sertifikats);

        $family = new EmployeeSalaryController;
        return $family->store($request);
        toast('Sertifikat created successfully', 'success');
        return redirect()->route('gaji-karyawan.create');
    }

    public function edit(Certificate $certificate)
    {
        return response()->json($certificate);
    }

    public function uploadsertif(Request $request)
    {
        foreach ($request->file('file') as  $file) {
            $filename = $file->getClientOriginalName();
            $name = trim($filename);

            $file->storeAs('public/uploads/karyawan/sertifikat', $name);
        }

        return response()->json([
            'name'          => $name,
            'original_name' => $filename,
        ]);
    }
}
