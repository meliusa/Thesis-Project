<?php

namespace App\Http\Controllers\Mely;

use App\Models\Material;
use App\Models\Agenda;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user(); 
        
    if ($user->id_role == 3 || $user->id_role == 4) {
        $materials = Material::whereIn('status', ['Disetujui'])->get();
    }else{
        $materials = Material::all();
    }
        $agendas = Agenda::all();
        return view('mely.meeting.material.material-table', compact('materials','agendas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request data
        $validated = $request->validate([
            'file_link' => 'required|string|max:255',
        ]);

        // Check if request_id already exists in the topics table
        $existingAgenda = Material::where('agenda_id', $request->agenda_id)->first();

        if ($existingAgenda) {
            // If exists, display a toast message and redirect back
            toast('Agenda sudah terdaftar', 'error');
            return redirect()->back()->withInput();
        }else if($request->agenda_id == null){
            toast('Agenda harus dipilih.', 'error');
            return redirect()->back()->withInput();
        }

        // Create a new meeting request in the database
        Material::create([
            'user_id' => auth()->id(),
            'agenda_id' => $request->agenda_id,
            'file_link' => $validated['file_link'],
            'status' => 'Menunggu Review',
        ]);

        // Notify user about successful creation
        toast('Data Berhasil Ditambahkan', 'success');
        return redirect()->route('materials.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $material)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $material = Material::findOrFail($id);

        $validated = $request->validate([
             // 'meeting_type' => 'required|in:Daring,Tatap Muka',
             // 'date' => 'required|date',
             // 'time' => 'required|date_format:H:i',
            'file_link' => 'required|string|max:255',
        ]);

        $material->update([
            'user_id' => auth()->id(),
            'file_link' => $validated['file_link'],
            'status' => 'Menunggu Review',
        ]);

        toast('Data Berhasil Diubah', 'success');
        return redirect()->route('materials.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material)
    {
        $material->delete();
        
        toast('Data Berhasil Dihapus', 'success');
        return redirect()->route('materials.index');
    }

    public function details($id)
    {
        $material = Material::findOrFail($id);

        $file_link = $material->file_link;

        // Periksa apakah tautan sudah memuat protokol http atau https
        if (!preg_match("~^(?:f|ht)tps?://~i", $file_link)) {
            // Tambahkan http sebagai default jika protokol tidak ada
            $file_link = 'http://' . $file_link;
        }
        
        return view('mely.meeting.material.material-details', compact('material', 'file_link'));
    }

    public function updateStatus(Request $request, $id)
    {
        $material = Material::findOrFail($id);

        // Validasi input jika diperlukan
        $validated = $request->validate([
            'status' => 'required|in:Menunggu Review,Disetujui,Ditolak',
            'rejection_reason' => 'nullable|string'
        ]);
    
        // Cek jika status adalah 'Ditolak' dan rejection_reason kosong
        if ($validated['status'] === 'Ditolak' && empty($validated['rejection_reason'])) {
            toast('Alasan penolakan harus diisi', 'error');
            return redirect()->back()->withInput();
        }
    
        // Update status berdasarkan input dari request
        $material->update([
            'status' => $validated['status'],
            'rejection_reason' => $validated['rejection_reason'],
        ]);
    
        toast('Status Pertemuan Berhasil Diperbarui', 'success');
        return redirect()->route('materials.index');
        }
    }
