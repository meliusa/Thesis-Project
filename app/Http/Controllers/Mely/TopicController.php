<?php

namespace App\Http\Controllers\Mely;

use App\Models\Topic;
use App\Models\MeetingRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $topics = Topic::all();
        $meetingRequests = MeetingRequest::all();
        return view('mely.meeting.topic.topic-table', compact('topics','meetingRequests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            // 'request_id' => 'required|exists:meeting_requests,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'supporting_file' => 'required|string|max:255',
        ]);

        // Check if request_id already exists in the topics table
        $existingTopic = Topic::where('request_id', $request->request_id)->first();

        if ($existingTopic) {
            // If exists, display a toast message and redirect back
            toast('Permintaan sudah terdaftar', 'error');
            return redirect()->back()->withInput();
        }else if($request->request_id == null){
            toast('Permintaan harus dipilih.', 'error');
            return redirect()->back()->withInput();
        }
    
        // Add user_id from logged in user
        $validated['user_id'] = Auth::id();
        $validated['request_id'] = $request->request_id;
        $validated['status'] = 'Menunggu Persetujuan';
    
        // Create topic
        Topic::create($validated);
    
        toast('Data Berhasil Ditambahkan', 'success');
        return redirect()->route('topics.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Topic $topic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Topic $topic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Temukan MeetingRequest berdasarkan ID
        $topic = Topic::findOrFail($id);
    
        // Validasi input jika diperlukan
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'supporting_file' => 'required|string|max:255',
        ]);

        // Update data berdasarkan input dari request
        $topic->update([
            'user_id' => auth()->id(),
            'title' => $validated['title'],
            'description' => $validated['description'],
            'supporting_file' => $validated['supporting_file'],
            'status' => 'Menunggu Persetujuan',
        ]);

        toast('Data Berhasil Diubah', 'success');
        return redirect()->route('topics.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topic $topic)
    {
        $topic->delete();
        
        toast('Data Berhasil Dihapus', 'success');
        return redirect()->route('topics.index');
    }

    public function details($id){
        $topic = Topic::findOrFail($id);
        $meetingRequest = MeetingRequest::where('id', $topic->request_id)->first();

        $supporting_file = $topic->supporting_file;

        // Periksa apakah tautan sudah memuat protokol http atau https
        if (!preg_match("~^(?:f|ht)tps?://~i", $supporting_file)) {
            // Tambahkan http sebagai default jika protokol tidak ada
            $supporting_file = 'http://' . $supporting_file;
        }

        return view('mely.meeting.topic.topic-details', compact('topic','meetingRequest', 'supporting_file'));
    }

    public function updateStatus(Request $request, $id)
    {
    // Temukan MeetingRequest berdasarkan ID
    $topic = Topic::findOrFail($id);

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
    $topic->update([
        'status' => $validated['status'],
        'rejection_reason' => $validated['rejection_reason'],
    ]);

    toast('Status Pertemuan Berhasil Diperbarui', 'success');
    return redirect()->route('topics.index');
    }
}
