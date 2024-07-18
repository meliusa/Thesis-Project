<?php

namespace App\Http\Controllers\Mely;

use Illuminate\Http\Request;
use App\Models\MeetingRequest;
use App\Http\Controllers\Controller;
use App\Models\User;

class MeetingRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $meetingRequests = MeetingRequest::all();
        return view('mely.meeting.meeting-request.meeting-request-table', compact('meetingRequests'));
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
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        // 'priority' => 'required|in:Low,Medium,High',
    ]);

     // Check if priority is not selected or invalid
    if ($request->priority == null) {
        toast('Prioritas harus dipilih.', 'error');
        return redirect()->back()->withInput();
    }

    // Create a new meeting request in the database
    MeetingRequest::create([
        'user_id' => auth()->id(),
        'title' => $validated['title'],
        'description' => $validated['description'],
        'priority' => $request->priority,
        'status' => 'Menunggu Analisis',
    ]);

    // Notify user about successful creation
    toast('Data Berhasil Ditambahkan', 'success');
    return redirect()->route('meeting-requests.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(MeetingRequest $meetingRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MeetingRequest $meetingRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Temukan MeetingRequest berdasarkan ID
        $meetingRequest = MeetingRequest::findOrFail($id);
    
        // Validasi input jika diperlukan
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required|in:Low,Medium,High',
        ]);
    
        // Update data berdasarkan input dari request
        $meetingRequest->update([
            'user_id' => auth()->id(),
            'title' => $validated['title'],
            'description' => $validated['description'],
            'priority' => $validated['priority'],
            'status' => 'Menunggu Analisis',
        ]);
    
        // Menambahkan pesan kilat untuk memberi tahu pengguna bahwa data berhasil diperbarui
        toast('Data Berhasil Diubah', 'success');
    
        // Redirect pengguna kembali ke halaman yang sesuai
        return redirect()->route('meeting-requests.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MeetingRequest $meetingRequest)
    {
        $meetingRequest->delete();
        
        toast('Data Berhasil Dihapus', 'success');
        return redirect()->route('meeting-requests.index');
    }

    public function details($id){
        $meetingRequest = MeetingRequest::findOrFail($id);
        return view('mely.meeting.meeting-request.meeting-request-details', compact('meetingRequest'));
    }

    public function updateStatus(Request $request, $id)
    {
    // Temukan MeetingRequest berdasarkan ID
    $meetingRequest = MeetingRequest::findOrFail($id);

    // Validasi input jika diperlukan
    $validated = $request->validate([
        'status' => 'required|in:Menunggu Analisis,Diterima,Ditolak',
        'rejection_reason' => 'nullable|string'
    ]);

    // Cek jika status adalah 'Ditolak' dan rejection_reason kosong
    if ($validated['status'] === 'Ditolak' && empty($validated['rejection_reason'])) {
        toast('Alasan penolakan harus diisi', 'error');
        return redirect()->back()->withInput();
    }

    // Update status berdasarkan input dari request
    $meetingRequest->update([
        'status' => $validated['status'],
        'rejection_reason' => $validated['rejection_reason'],
    ]);

    toast('Status Pertemuan Berhasil Diperbarui', 'success');
    return redirect()->route('meeting-requests.index');
    }

}
