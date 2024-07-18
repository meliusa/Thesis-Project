<?php

namespace App\Http\Controllers\Mely;

use App\Models\Minute;
use App\Models\Agenda;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Presence;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;

class MinuteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $minutes = Minute::all();
        return view('mely.meeting.minute.minute-table', compact('minutes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $agendas = Agenda::all();
        return view('mely.meeting.minute.create-minute', compact('agendas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            // 'agenda_id' => 'required|exists:agendas,id',
            'series_of_event' => 'required|string',
            'decision' => 'required|string',
            'q_n_a' => 'required|string',
        ]);

        $existingAgenda = Minute::where('agenda_id', $request->agenda_id)->first();

        if ($existingAgenda) {
            // If exists, display a toast message and redirect back
            toast('Agenda sudah terdaftar', 'error');
            return redirect()->back()->withInput();
        }else if($request->agenda_id == null){
            toast('Agenda harus dipilih.', 'error');
            return redirect()->back()->withInput();
        }

        $minute = new Minute();
        $minute->user_id = auth()->user()->id;
        $minute->agenda_id = $request->agenda_id;
        $minute->series_of_event = $request->series_of_event;
        $minute->decision = $request->decision;
        $minute->q_n_a = $request->q_n_a;
        $minute->status = 'Menunggu Persetujuan';
        $minute->save();
    
        toast('Data Berhasil Ditambahkan', 'success');
        return redirect()->route('minutes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Minute $minute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $minute = Minute::findOrFail($id);
        $agenda = Agenda::where('id', $minute->agenda_id)->first(); // Menggunakan first() untuk mengambil satu objek Agenda
        return view('mely.meeting.minute.edit-minute', compact('minute', 'agenda'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $minute = Minute::findOrFail($id);

        $validated = $request->validate([
             // 'meeting_type' => 'required|in:Daring,Tatap Muka',
             // 'date' => 'required|date',
             // 'time' => 'required|date_format:H:i',
            'series_of_event' => 'required|string',
            'decision' => 'required|string',
            'q_n_a' => 'required|string',
        ]);

        $minute->update([
            'user_id' => auth()->id(),
            'series_of_event' => $validated['series_of_event'],
            'decision' => $validated['decision'],
            'q_n_a' => $validated['q_n_a'],
            'status' => 'Menunggu Persetujuan',
        ]);

        toast('Data Berhasil Diubah', 'success');
        return redirect()->route('minutes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Minute $minute)
    {
        $minute->delete();
        
        toast('Data Berhasil Dihapus', 'success');
        return redirect()->route('minutes.index');
    }

    public function details($id)
    {
        $minute = Minute::FindOrFail($id);
        return view('mely.meeting.minute.minute-details', compact('minute'));
    }

    public function presenceDetails($id){
        $minute = Minute::FindorFail($id);
        // // Mengambil semua presences yang memiliki agenda_id yang sama dengan $presence->agenda_id
        $presences = Presence::where('agenda_id', $minute->agenda_id)->get();
        return view('mely.meeting.minute.minute-presence-details', compact('minute', 'presences'));
    }

    public function updateStatus(Request $request, $id)
    {
        $minute = Minute::findOrFail($id);

        // Validasi input jika diperlukan
        $validated = $request->validate([
            'status' => 'required|in:Menunggu Persetujuan,Diterima,Ditolak',
            'rejection_reason' => 'nullable|string'
        ]);
    
        // Cek jika status adalah 'Ditolak' dan rejection_reason kosong
        if ($validated['status'] === 'Ditolak' && empty($validated['rejection_reason'])) {
            toast('Alasan penolakan harus diisi', 'error');
            return redirect()->back()->withInput();
        }
    
        // Update status berdasarkan input dari request
        $minute->update([
            'status' => $validated['status'],
            'rejection_reason' => $validated['rejection_reason'],
        ]);
    
        toast('Status Pertemuan Berhasil Diperbarui', 'success');
        return redirect()->route('minutes.index');
        }
}
