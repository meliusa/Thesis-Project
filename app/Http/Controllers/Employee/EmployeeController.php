<?php

namespace App\Http\Controllers\Employee;

use Carbon\Carbon;
use App\Models\User;
use App\Models\JobType;
use App\Models\Division;
use App\Models\Employee;
use App\Models\JobPosition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Employee\FamilyController;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::orderBy('nama_lengkap', 'ASC')->get();
        return view('employee.employee-table', compact('employees'));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::latest()->first();
        $request['id_user'] = $user->id;
        $request['nama_lengkap'] = $user->nama;

        $request['tanggal_lahir'] = Carbon::parse($request['tanggal_lahir'])->toDateString();
        $request['alamat_ktp'] = "{$request['alamat_ktp_jalan']}, {$request['alamat_ktp_rt']}/{$request['alamat_ktp_rw']}, {$request['alamat_ktp_kelurahan']}, {$request['alamat_ktp_kecamatan']}, {$request['alamat_ktp_kota_kabupaten']}, {$request['alamat_ktp_provinsi']}";
        $request['tempat_tinggal'] = "{$request['alamat_tt_jalan']}, {$request['alamat_tt_rt']}/{$request['alamat_tt_rw']}, {$request['alamat_tt_kelurahan']}, {$request['alamat_tt_kecamatan']}, {$request['alamat_tt_kota_kabupaten']}, {$request['alamat_tt_provinsi']}";

        $validatedData = Validator::make($request->all(), [
            'id_user' => 'required|string',
            'nama_lengkap' => 'required|string',
            'email' => 'required|email',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required',
            'id_divisi' => 'required|string',
            'id_posisi' => 'required|string',
            'no_hp' => 'required|min:10|max:13',
            'alamat_ktp' => 'required|string',
            'tempat_tinggal' => 'required|string',
            'agama' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'status_pernikahan' => 'required|string',
            'golongan_darah' => 'required|string',
            'kewarganegaraan' => 'required|string',
            'nik' => 'required|min:16|max:16',
            'foto_ktp' => 'required',
            'id_pekerjaan' => 'required|string',
            'bank' => 'required|string|min:3',
            'nomor_rekening' => 'required|min:8'
        ]);

        if ($validatedData->fails()) {
            $pathktp = 'public/uploads/karyawan/ktp' . $request['foto_ktp'];
            if (file_exists($pathktp)) {
                unlink($pathktp);
            }

            Alert::error('Error Title', 'Data Pribadi Karyawan Tidak Valid');
            return redirect()->back();
        }
        Employee::create($request->all());

        $family = new FamilyController;
        return $family->store($request);
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
    public function edit(Employee $employee)
    {
        $division = Division::orderBy('nama_divisi', 'ASC')->get();
        $positions = JobPosition::orderBy('nama_posisi', 'ASC')->get();
        $types = JobType::all();
        $alamatktp = explode(', ', $employee->alamat_ktp);
        $jalank = $alamatktp[0];
        $rtrwk = explode('/', $alamatktp[1]);
        $rtk = $rtrwk[0];
        $rwk = $rtrwk[1];
        $desak = $alamatktp[2];
        $keck = $alamatktp[3];
        $kabk = $alamatktp[4];
        $provk = $alamatktp[5];
        $alamat = explode(', ', $employee->tempat_tinggal);
        $jalan = $alamat[0];
        $rtrw = explode('/', $alamat[1]);
        $rt = $rtrw[0];
        $rw = $rtrw[1];
        $desa = $alamat[2];
        $kec = $alamat[3];
        $kab = $alamat[4];
        $prov = $alamat[5];

        return view(
            'profile.edit-data-diri',
            compact(
                'employee',
                'division',
                'positions',
                'types',
                'jalank',
                'rtk',
                'rwk',
                'desak',
                'keck',
                'kabk',
                'provk',
                'jalan',
                'rt',
                'rw',
                'desa',
                'kec',
                'kab',
                'prov',
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $request['id_user'] = $employee->id_user;

        $request['tanggal_lahir'] = Carbon::parse($request['tanggal_lahir'])->toDateString();
        $request['alamat_ktp'] = "{$request['alamat_ktp_jalan']}, {$request['alamat_ktp_rt']}/{$request['alamat_ktp_rw']}, {$request['alamat_ktp_kelurahan']}, {$request['alamat_ktp_kecamatan']}, {$request['alamat_ktp_kota_kabupaten']}, {$request['alamat_ktp_provinsi']}";
        $request['tempat_tinggal'] = "{$request['alamat_tt_jalan']}, {$request['alamat_tt_rt']}/{$request['alamat_tt_rw']}, {$request['alamat_tt_kelurahan']}, {$request['alamat_tt_kecamatan']}, {$request['alamat_tt_kota_kabupaten']}, {$request['alamat_tt_provinsi']}";
        // $filename = $request->file('avatar')->getClientOriginalName();
        // $name = uniqid() . '_' . trim($filename);

        // $request->file('avatar')->storeAs('public/uploads/karyawan/foto-karyawan', $name);
        // $request['foto_karyawan'] = $name;

        $validatedData = Validator::make($request->all(), [
            'id_user' => 'required|string',
            'nama_lengkap' => 'required|string',
            'email' => 'required|email',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required',
            'id_divisi' => 'required|string',
            'id_posisi' => 'required|string',
            'alamat_ktp' => 'required|string',
            'tempat_tinggal' => 'required|string',
            'agama' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'status_pernikahan' => 'required|string',
            'golongan_darah' => 'required|string',
            'kewarganegaraan' => 'required|string',
            'nik' => 'required|min:16|max:16',
            'id_pekerjaan' => 'required|string',
        ]);

        if ($validatedData->fails()) {
            $pathktp = 'public/uploads/karyawan/ktp' . $request['foto_ktp'];
            if (file_exists($pathktp)) {
                unlink($pathktp);
            }

            // $pathavatar = 'public/uploads/karyawan/foto_karyawan' . $request['foto_karyawan'];
            // if (file_exists($pathavatar)) {
            //     unlink($pathavatar);
            // }

            Alert::error('Error Title', 'Data Pribadi Karyawan Tidak Valid');
            return redirect()->back();
        }
        $employee->update($request->all());

        toast('Data Diri updated successfully', 'success');
        return redirect()->route('profile.employee', ['id' => $employee->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        toast('Data Berhasil Dihapus', 'success');
        return redirect()->route('employee.index');
    }

    public function uploadktp(Request $request)
    {
        $filename = $request->file('file')->getClientOriginalName();
        $name = trim($filename);

        $request->file('file')->storeAs('public/uploads/karyawan/ktp', $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $filename,
        ]);
    }

    public function getPosition(Request $request)
    {
        $id_divisi = $request->id_divisi;

        $positions = JobPosition::where('id_divisi', $id_divisi)->get();

        foreach($positions as $posisi) {
            echo "<option value='$posisi->id'>$posisi->nama_posisi</option>";
        }
    }
}
