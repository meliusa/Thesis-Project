<?php

namespace App\Http\Controllers\Sholikin\Employee\Pengajuan;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Submission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class UserPengajuanController extends Controller
{
    public function index()
    {
        $user = auth()->user()->employee['id'];
        $submissions = Submission::where('id_karyawan', $user)->get();

        return view('sholikin.employee.submission.user-submission-index', compact('user', 'submissions'));
    }

    public function create()
    {
        $user = auth()->user()->employee['id'];

        return view('sholikin.employee.submission.user-create-submission', compact('user'));
    }

    public function store(Request $request)
    {
        $dateRange = explode(' - ', $request['periode']);

        $start = Carbon::createFromFormat('m/d/Y', substr($dateRange[0], 0, 10))->format('d M Y');
        $end = Carbon::createFromFormat('m/d/Y', substr($dateRange[1], 0, 10))->format('d M Y');

        $validator = Validator::make($request->all(), [
            'id_karyawan' => 'required',
            'jenis_pengajuan' => 'required',
            'periode' => 'required',
            'keterangan' => 'required',
            'surat_izin' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ]);
        }

        $data= [
            'id_karyawan' => $request->id_karyawan,
            'jenis_pengajuan' => $request->jenis_pengajuan,
            'tanggal_mulai' => $start,
            'tanggal_selesai' => $end,
            'keterangan' => $request->keterangan,
            'surat_izin' => $request->surat_izin
        ];

        Submission::create($data);

        Alert::success('Pengajuan berhasil dibuat, Mohon menunggu disetujui');
        return redirect()->route('user-submission.index')->with('success', 'Pengajuan berhasil dibuat');
    }

    public function edit($id)
    {
        $submission = Submission::find($id);
        $user = auth()->user()->employee['id'];

        $tanggal_mulai = Carbon::parse($submission->tanggal_mulai)->format('m/d/Y');
        $tanggal_selesai = Carbon::parse($submission->tanggal_selesai)->format('m/d/Y');
        $periode = $tanggal_mulai . ' - ' . $tanggal_selesai;

        return view('sholikin.employee.submission.user-edit-submission', compact('submission', 'user', 'periode'));
    }

    public function update(Request $request, $id)
    {
        $submission = Submission::find($id);
    }

    public function destroy($id)
    {
        $submission = Submission::find($id);
        $submission->delete();

        Alert::success('Pengajuan berhasil dihapus');
        return redirect()->route('user-submission.index')->with('success', 'Pengajuan berhasil dihapus');
    }

    public function uploadPengajuan(Request $request)
    {
        $filename = $request->file('file')->getClientOriginalName();
        $name = trim($filename);

        $request->file('file')->storeAs('public/uploads/karyawan/pengajuan', $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $filename
        ]);
    }
}
