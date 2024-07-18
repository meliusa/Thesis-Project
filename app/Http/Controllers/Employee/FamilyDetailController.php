<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Family;
use App\Models\FamilyDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class FamilyDetailController extends Controller
{
    public function store(Request $request)
    {
        $families = Family::latest()->first();
        $request['id_keluarga'] = $families->id;

        foreach ($request['group-a'] as $value) {
            $value['id_keluarga'] = $families->id;
            $value['tanggal_lahir'] = Carbon::parse($value['tanggal_lahir'])->toDateString();
            $validated = Validator::make($value, [
                'id_keluarga'   => 'required|string',
                'nama_lengkap'  => 'required|string',
                'nik'   => 'required|min:16|max:16',
                'jenis_kelamin' => 'required|string',
                'tempat_lahir'  => 'required|string',
                'tanggal_lahir' => 'required',
                'agama' => 'required|string',
                'pendidikan'    => 'required|string',
                'id_pekerjaan'  => 'required|string',
                'status_pernikahan' => 'required|string',
                'hubungan_keluarga' => 'required|string',
                'kewarganegaraan'   => 'required|string',
                // 'no_passport'   => 'required|numeric',
                // 'no_kitas'  => 'required|numeric',
                'nama_ayah' => 'required|string',
                'nama_ibu'  => 'required|string'
            ]);

            if ($validated->fails()) {
                $employee = Employee::latest()->first();
                $employee->delete();
                Alert::error('Error Title', 'Data Detail Keluarga Tidak Valid');
                return redirect()->back();
            }

            FamilyDetail::create($value);
        }
        $employmentHistory = new EmploymentHistoryController;
        return $employmentHistory->store($request);
    }

    public function edit(FamilyDetail $familyDetail)
    {
        return response()->json($familyDetail);
    }
}
