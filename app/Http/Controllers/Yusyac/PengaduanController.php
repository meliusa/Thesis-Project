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

class PengaduanController extends Controller
{   
    
    public function index(Request $r)
    {   
       
        $user       = Auth::user();
        $employee   = Employee::where('id_user', $user->id)->first();
        $tipe       = TipeTiket::all();
        $pengaduan  = Pengaduan::where('id_employee', $employee->id)->orderBy('nomor_tiket', 'desc')->get();
        $menunggu   = Pengaduan::where('id_employee', $employee->id)->where('status', 'menunggu')->count();
        $diproses   = Pengaduan::where('id_employee', $employee->id)->where('status', 'diproses')->count();
        $ditolak    = Pengaduan::where('id_employee', $employee->id)->where('status', 'ditolak')->count();
        $selesai    = Pengaduan::where('id_employee', $employee->id)->where('status', 'selesai')->count();
        if($r->update != null)
        {
            toast('Pengaduan updated successfully.', 'success');
        }

        if($r->delete != null)
        {
            toast('Pengaduan deleted successfully.', 'success');
        }
        return view('yusyac.pengaduan', compact('pengaduan', 'tipe', 'user', 'employee', 'menunggu', 'diproses', 'ditolak', 'selesai',));
    }

    // public function store(Request $request)
    // {   
    //     // return response()->json($request->all());
    //     $validated = Validator::make($request->all(), [
    //         'subjek_tiket'      => 'required',
    //         'id_tipe'           => 'required',
    //         'deskripsi'         => 'required',
    //         'dokumen_pendukung' => 'required|mimes:.pdf,.zip,.rar|max:5000',
    //         'prioritas'         => 'required|in:minor,major,critical'
    //     ]);

    //     // if ($validated->fails()) {
    //     //     return $validated->errors();
    //     //     Alert::error('Error Title', 'Data Pengaduan Tidak Valid');
    //     //     return redirect()->back();
    //     // }

    //     if ($validated->fails()) {
    //         for ($i = 0; $i < count($request['dokumen_pendukung']); $i++) {
    //             $path = 'public/uploads/pengaduan' . $request['dokumen_pendukung'][$i];
    //             if (file_exists($path)) {
    //                 unlink($path);
    //             }
    //         }
    //     }

    //     $user = Auth::user();
    //     $employee = Employee::where('id_user', $user->id)->first();

    //     $pengaduan = new Pengaduan();

    //     $pengaduan->id_employee         = $employee->id;
    //     $pengaduan->nomor_tiket         = $this->nomorTiket();
    //     $pengaduan->subjek_tiket        = $request->get('subjek_tiket');
    //     $pengaduan->id_tipe             = $request->get('id_tipe');
    //     $pengaduan->deskripsi           = $request->get('deskripsi');
    //     $pengaduan->dokumen_pendukung   = $this->storeImage($request);
    //     $pengaduan->status              = "menunggu";
    //     $pengaduan->prioritas           = $request->get('prioritas');
    //     $pengaduan->save();

    //     toast('Pengaduan created successfully.', 'success');
    //     return redirect()->route('pengaduan.index');
    // }

    public function store(Request $request)
	{
		try {
            $validated = Validator::make($request->all(), [
                'subjek_tiket'      => 'required',
                'id_tipe'           => 'required',
                'deskripsi'         => 'required',
                'dokumen_pendukung' => 'required',
                'prioritas'         => 'required|in:minor,major,critical'
            ]);
            
            if($validated->fails()) {
                $pathFoto = 'public/uploads/pengaduan' . $request['dokumen_pendukung'];
                if (file_exists($pathFoto)) {
                    unlink($pathFoto);
                }
                
                return $validated->errors();
                Alert::error('Error Title', 'Data Tidak Valid');
                return redirect()->back();
            }

            $user = Auth::user();
            $employee = Employee::where('id_user', $user->id)->first();
			$pengaduan = new Pengaduan();
            $pengaduan->id_user             = $user->id;
            $pengaduan->id_employee         = $employee->id;
            $pengaduan->nomor_tiket         = $this->nomorTiket();
            $pengaduan->subjek_tiket        = $request->get('subjek_tiket');
            $pengaduan->id_tipe             = $request->get('id_tipe');
            $pengaduan->deskripsi           = $request->get('deskripsi');
            $pengaduan->dokumen_pendukung   = $request->get('dokumen_pendukung');
            $pengaduan->status              = "menunggu";
            $pengaduan->prioritas           = $request->get('prioritas');
            $pengaduan->save();

		}
		catch (\Exception $e) {
            Alert::error('Error Title', 'Data Tidak Valid');
            return redirect()->back();
		}

        toast('Pengaduan created successfully.', 'success');
        return redirect()->route('pengaduan.index');
	}

    public function show($id){
        //return response

        $data = Pengaduan::find($id);
        $file = url('storage/uploads/pengaduan/', $data->dokumen_pendukung);
        $user = Auth::user();
        $employee = Employee::where('id_user', $user->id)->value('nama_lengkap');
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

    public function edit($id){
        //return response

        $data = Pengaduan::findOrFail($id);
        // $file = Storage::files(storage_path('public/uploads/pengaduan', $data));

        return response()->json([
            'success'   => true,
            'data'      => $data,
            'tipe'      => TipeTiket::all(),
            'file'      => url('storage/uploads/pengaduan/'.$data->dokumen_pendukung),
        ]); 
    }

    public function update(Request $request, $id){
       //return $request->all();
        try {
            $validated = Validator::make($request->all(), [
                'subjek_tiket'      => 'required',
                'id_tipe'           => 'required',
                'deskripsi'         => 'required',
                //'dokumen_pendukung' => 'required',
                'prioritas'         => 'required|in:minor,major,critical'
            ]);
            
            if($validated->fails()) {
                $pathFoto = 'public/uploads/pengaduan' . $request['dokumen_pendukung'];
                if (file_exists($pathFoto)) {
                    unlink($pathFoto);
                }
                
                return response()->json(['message'=>$validated->errors()],400);
                Alert::error('Error Title', 'Data Tidak Valid');
                return redirect()->back();
            }

            $pengaduan = Pengaduan::find($request->id);
            $tipe = TipeTiket::find($request->get('id_tipe'));
    
            // $user = Auth::user();
            // $employee = Employee::where('id_user', $user->id)->first();
            $pengaduan->subjek_tiket        = $request->get('subjek_tiket');
            $pengaduan->id_tipe             = $tipe->id;
            $pengaduan->deskripsi           = $request->get('deskripsi');
            // if ($pengaduan->dokumen_pendukung && file_exists(storage_path('public/uploads/pengaduan' . $pengaduan->dokumen_pendukung))) {
            //     Storage::delete('public/uploads/pengaduan' . $pengaduan->dokumen_pendukung);
            // }
            if($request->dokumen_pendukung != null)
            {
                $pengaduan->dokumen_pendukung   = $request->get('dokumen_pendukung');
            }
            $pengaduan->status              = "menunggu";
            $pengaduan->prioritas           = $request->get('prioritas');
            $pengaduan->save();
		}
		catch (\Exception $e) {
            //Alert::error('Error Title', 'Data Tidak Valid');
            return response()->json(['message'=>'Data Tidak Valid'],400);
		}

        //toast('Pengaduan Updated successfully.', 'success');
        return response()->json(['message'=>'Pengaduan Updated successfully']);
    }

    public function storeImage(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'file' => 'required|mimes:pdf,zip,rar|max:5000',
        ]);

        if($validated->fails()) {
            return response()->json([
                'status'        => 'error',
                'name'          => null,
                'original_name' => null,
            ]);
        }

        $image = $request->file('file')->getClientOriginalExtension();
        $filename = $request->file('file')->getClientOriginalName();
        if($request->nomor_tiket!=null) // update
        {
            $name = $request->nomor_tiket .  '.'  . $image;
        }else
        {
            $name = $this->nomorTiket() .  '.'  . $image;
        }
        

        $request->file('file')->storeAs('public/uploads/pengaduan', $name);

        return response()->json([
            'status'        => 'success',
            'name'          => $name,
            'original_name' => $filename,
        ]);
    }

    public function nomorTiket(){

        $lastTicketNumber = Pengaduan::whereYear('created_at', Carbon::now())->whereMonth('created_at', Carbon::now())->orderBy('nomor_tiket', 'desc')->first();
        if ($lastTicketNumber) {
            $nomor_tiket = ++$lastTicketNumber->nomor_tiket;
        } else {
            //Format Nomor Tiket Jika Belom Ada Tiket
            $nomor_tiket = 'T' . substr(Carbon::now()->format('Y'), 2) . Carbon::now()->format('m') . '0001';
        }
        return $nomor_tiket;
    }

    public function destroy(Request $request){
        $pengaduan = Pengaduan::find($request->id);
        if($pengaduan){
            if (file_exists( public_path().'/storage/uploads/pengaduan/'.$pengaduan->dokumen_pendukung )) {
               // Storage::delete('public/uploads/pengaduan' . $pengaduan->dokumen_pendukung);
               unlink(public_path().'/storage/uploads/pengaduan/'.$pengaduan->dokumen_pendukung);
            }
           $pengaduan->delete();
        }
        return response()->json(['message'=>'Pengaduan Deleted successfully']);
    }

}
