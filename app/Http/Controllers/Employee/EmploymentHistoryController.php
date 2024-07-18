<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\EmploymentHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class EmploymentHistoryController extends Controller
{
    public function store(Request $request)
    {
        foreach ($request['group-b'] as $value) {
            $value['id_karyawan'] = $request['id_karyawan'];
            $value['tgl_masuk'] = Carbon::parse($value['tgl_masuk'])->toDateString();
            $value['tgl_keluar'] = Carbon::parse($value['tgl_keluar'])->toDateString();

            $validatedData = Validator::make($value, [
                'id_karyawan' => 'required|string',
                'nama_perusahaan' => 'required|string',
                'tgl_masuk' => 'required',
                'tgl_keluar' => 'required',
                'posisi' => 'required|string',
            ]);

            if ($validatedData->fails()) {
                $employee = Employee::latest()->first();
                $employee->delete();
                Alert::error('Error Title', 'Data Riwayat Pekerjaan Tidak Valid');
                return redirect()->back();
            }
            EmploymentHistory::create($value);
        }

        $certificate = new CertificateController;
        return $certificate->store($request);
    }

    public function edit(EmploymentHistory $employmentHistory)
    {
        return view('profile.edit-riwayat-pekerjaan', compact('employmentHistory'));
    }

    public function update(EmploymentHistory $employmentHistory, Request $request)
    {
        $request['tgl_masuk'] = Carbon::parse($request['tgl_masuk'])->toDateString();
        $request['tgl_keluar'] = Carbon::parse($request['tgl_keluar'])->toDateString();

        $validatedData = Validator::make($request->all(), [
            'nama_perusahaan' => 'required|string',
            'tgl_masuk' => 'required',
            'tgl_keluar' => 'required',
            'posisi' => 'required|string',
        ]);

        if ($validatedData->fails()) {
            Alert::error('Error Title', 'Data Riwayat Pekerjaan Tidak Valid');
            return redirect()->back();
        }

        $employmentHistory->update($request->all());

        toast('Berhasil Edit Data Pekerjaan', 'success');
        return redirect()->route('profile.history', ['id' => $employmentHistory->id_karyawan]);
    }
}
