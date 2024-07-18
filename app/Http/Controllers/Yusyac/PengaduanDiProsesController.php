<?php

namespace App\Http\Controllers\Yusyac;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\TipeTiket;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengaduanDiProsesController extends Controller
{   
    
    public function index(Request $r)
    {   
        $user = Auth::user();
        $tipe = TipeTiket::all();
        $pengaduan = Pengaduan::where('disetujui_oleh', $user->id)->where('status', 'diproses')->orderBy('nomor_tiket', 'desc')->get();
        if($r->update != null)
        {
            toast('Pengaduan updated successfully.', 'success');
        }

        if($r->delete != null)
        {
            toast('Pengaduan deleted successfully.', 'success');
        }

      
        return view('yusyac.sedang-diproses', compact('pengaduan', 'tipe',));
    }

    public function show($id){
        //return response

        $data = Pengaduan::find($id);
        $file = url('storage/uploads/pengaduan/', $data->dokumen_pendukung);
        $employee = Employee::where('id', $data->id_employee)->value('nama_lengkap');
        $admin = User::where('id', $data->disetujui_oleh)->value('nama');

        return response()->json([
            'success'   => true,
            'data'      => $data,
            'admin'     => $admin,
            'employee'  => $employee,
            'tipe'      => TipeTiket::where('id', $data->id_tipe)->value('tipe_tiket'),
            'file'      => $file,
        ]);
    }

    public function updateStatus(Request $request){
        //return $request->all();
        
        try {
            $pengaduan = Pengaduan::find($request->id);
            $pengaduan->status  = $request->status;
            // if($pengaduan->disetujui_oleh != null){
            //     if($request->disetujui_oleh == Auth::user()->id){
            //         $pengaduan->disetujui_oleh = Auth::user()->id;
            //     } else {
            //         toast('Pengaduan Update failed.', 'danger');
            //         return redirect()->back();
            //     }
            // }
            $pengaduan->disetujui_oleh  = Auth::user()->id;
            $pengaduan->save();
		}
		catch (\Exception $e) {
            //Alert::error('Error Title', 'Data Tidak Valid');
            toast('Pengaduan approved failed.', 'danger');
            return redirect()->back();
		}

        if($request->status == 'diproses')
        {
            toast('Pengaduan approved successfully.', 'success');
        }elseif($request->status == 'selesai'){
            toast('Pengaduan updated successfully.', 'success');
        } else {
            toast('Pengaduan declined successfully.', 'success');
        }
        return redirect()->back();
    }

}
