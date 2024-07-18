<?php

namespace App\Http\Controllers\Mely;

use App\Models\Agenda;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\Email;
use App\Models\Admin;
use App\Models\Presence;
use App\Models\Topic;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil pengguna yang sedang login
        $user = auth()->user(); 
        
    if ($user->id_role == 3 || $user->id_role == 4) {
        // Jika peran pengguna adalah spv dan staf, tampilkan agenda dengan status tertentu
        $agendas = Agenda::whereIn('status', ['Dijadwalkan', 'Selesai', 'Notula Tersedia'])->get();
    } else {
        // Jika bukan staf, tampilkan semua agenda
        $agendas = Agenda::all();
    }
        $topics = Topic::all();
        return view('mely.meeting.agenda.agenda-table', compact('agendas','topics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get the topics with the status 'Diterima'
        $topics = Topic::where('status', 'Diterima')->get();

        // Return the view with the topics data
        return view('mely.meeting.agenda.create-agenda', compact('topics'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'topic_id' => 'required|exists:topics,id',
            // 'meeting_type' => 'required|in:Daring,Tatap Muka',
            // 'date' => 'required|date',
            // 'time' => 'required|date_format:H:i',
            'meeting_address' => 'required|string|max:255',
        ]);

        // Check if request_id already exists in the topics table
        $existingTopic = Agenda::where('topic_id', $request->topic_id)->first();

        if ($existingTopic) {
            // If exists, display a toast message and redirect back
            toast('Topik sudah terdaftar', 'error');
            return redirect()->back()->withInput();
        }else if($request->topic_id == null){
            toast('Topik harus dipilih.', 'error');
            return redirect()->back()->withInput();
        }

        $date = $request->date;
        $time = $request->time;

        $selectedDateTime = strtotime("$date $time");
        $currentDateTime = strtotime('now');
    
        if ($selectedDateTime <= $currentDateTime) {
            // Jika memilih tanggal dan waktu yang sudah berlalu, tampilkan pesan kesalahan
            toast('Anda tidak dapat memilih tanggal dan waktu yang sudah berlalu.', 'error');
            return redirect()->back()->withInput();
        }else if($date == null){
            toast('Tanggal harus dipilih.', 'error');
            return redirect()->back()->withInput();
        }else if($time == null){
            toast('Jam harus dipilih.', 'error');
            return redirect()->back()->withInput();
        }

        $agenda = new Agenda();
        $agenda->topic_id = $request->topic_id;
        $agenda->user_id = auth()->user()->id; 
        $agenda->date = $date;
        $agenda->time = $time;
        $agenda->meeting_type = $request->meeting_type;
        $agenda->meeting_address = $request->meeting_address;
        $agenda->status = 'Menunggu Persetujuan';
        $agenda->save();
    
        toast('Data Berhasil Ditambahkan', 'success');
        return redirect()->route('agendas.index');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agenda $agenda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        // Temukan MeetingRequest berdasarkan ID
        $agenda = Agenda::findOrFail($id);

        $validated = $request->validate([
            // 'meeting_type' => 'required|in:Daring,Tatap Muka',
            // 'date' => 'required|date',
            // 'time' => 'required|date_format:H:i',
            'meeting_address' => 'required|string|max:255',
        ]);

        $date = $request->date;
        $time = $request->time;

        $selectedDateTime = strtotime("$date $time");
        $currentDateTime = strtotime('now');
    
        if ($selectedDateTime <= $currentDateTime) {
            // Jika memilih tanggal dan waktu yang sudah berlalu, tampilkan pesan kesalahan
            toast('Anda tidak dapat memilih tanggal dan waktu yang sudah berlalu.', 'error');
            return redirect()->back()->withInput();
        }

        $agenda->update([
            'user_id' => auth()->id(),
            'meeting_type' => $request->meeting_type,
            'date' => $date,
            'time' => $time,
            'meeting_address' => $validated['meeting_address'],
            'status' => 'Menunggu Persetujuan',
        ]);

        toast('Data Berhasil Diubah', 'success');
        return redirect()->route('agendas.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agenda $agenda)
    {
        $agenda->delete();
        
        toast('Data Berhasil Dihapus', 'success');
        return redirect()->route('agendas.index');
    }

    public function details($id){
        $agenda = Agenda::findOrFail($id);

        $meeting_address = $agenda->meeting_address;

        // Periksa apakah tautan sudah memuat protokol http atau https
        if (!preg_match("~^(?:f|ht)tps?://~i", $meeting_address)) {
            // Tambahkan http sebagai default jika protokol tidak ada
            $meeting_address = 'http://' . $meeting_address;
        }

        return view('mely.meeting.agenda.agenda-details', compact('agenda', 'meeting_address'));
    }

    public function updateStatus(Request $request, $id)
    {
    // Temukan Agenda berdasarkan ID
    $agenda = Agenda::findOrFail($id);

    // Validasi input jika diperlukan
    $validated = $request->validate([
        'status' => 'required|in:Menunggu Persetujuan,Diterima,Ditolak,Dijadwalkan,Selesai,Notula Tersedia',
        'rejection_reason' => 'nullable|string'
    ]);

    // Cek jika status adalah 'Ditolak' dan rejection_reason kosong
    if ($validated['status'] === 'Ditolak' && empty($validated['rejection_reason'])) {
        toast('Alasan penolakan harus diisi', 'error');
        return redirect()->back()->withInput();
    }

    // Jika status diubah menjadi 'Selesai', update completed_at
    if ($validated['status'] === 'Selesai') {
        $agenda->completed_at = now(); // Set completed_at ke waktu saat ini
    }

    // Kirim email jika status diubah menjadi 'Dijadwalkan'
    if ($validated['status'] === 'Dijadwalkan') {
        
        // Ambil semua pengguna
        $users = User::all();
        $admin = Admin::first();

        // Iterasi setiap pengguna
        foreach ($users as $user) {

            // Kirim email dengan agenda yang ditemukan untuk pengguna ini
            Mail::to($user->email)->send(new Email($agenda , $user->nama , $admin->whatsapp_number)); 
        }
    }

    if ($validated['status'] === 'Notula Tersedia') {
        $agenda->reported_at = now(); // Set completed_at ke waktu saat ini
    }

    // Update status berdasarkan input dari request
    $agenda->update([
        'status' => $validated['status'],
        'rejection_reason' => $validated['rejection_reason'],
    ]);

    toast('Status Pertemuan Berhasil Diperbarui', 'success');
    return redirect()->route('agendas.index');
}


    public function storeInitialAbsenAt(Request $request)
    {
            // Cari presensi yang sudah ada untuk agenda ini dan pengguna yang login
        $existingPresence = Presence::where('agenda_id', $request->agenda_id)
        ->where('user_id', auth()->user()->id)
        ->first();

        if ($existingPresence) {
            // Jika presensi sudah ada, cek status initial_absen_at
            if ($existingPresence->initial_absen_at) {
                // Jika sudah dikonfirmasi kehadirannya, berikan pesan error
                toast('Anda sudah melakukan presensi awal untuk agenda ini.', 'error');
            } else if($existingPresence->confirmed_at){
                $existingPresence->initial_absen_at = Carbon::now();
                $existingPresence->save();
    
                toast('Tanggal dan Jam Presensi Awal Berhasil Diperbarui', 'success');
            }
        } else {
            // Jika presensi belum ada, buat presensi baru
            $presence = new Presence();
            $presence->agenda_id = $request->agenda_id;
            $presence->user_id = auth()->user()->id;
            $presence->confirmed_at = null;
            $presence->initial_absen_at = Carbon::now();
            $presence->final_absen_at = null;
            $presence->save();
    
            toast('Tanggal dan Jam Presensi Awal Berhasil Tersimpan', 'success');
            }


        return redirect()->route('agendas.details', $request->agenda_id);
        }

        public function updateFinalAbsenAt(Request $request, $id)
        {
            $agenda = Agenda::findOrFail($id);
            $presence = Presence::where('agenda_id', $agenda->id)->first(); // Menggunakan first() karena mencari satu record
        
            // Memeriksa apakah sudah ada data presensi dan final_absen_at belum terisi
            if (!$presence) {
                toast('Belum ada data presensi untuk agenda ini', 'error');
            } elseif ($presence->final_absen_at !== null) {
                toast('Anda sudah melakukan presensi untuk agenda ini', 'error');
            } else {
                $presence->update([
                    'final_absen_at' => now(), // Menggunakan now() untuk mendapatkan waktu saat ini
                ]);
        
                toast('Tanggal dan Jam Presensi Akhir Berhasil Tersimpan', 'success');
            }
        
            return redirect()->route('agendas.details', $agenda->id);
        }

        public function attendanceConfirmation($id)
        {
            // Pastikan pengguna sudah login
            if (!auth()->check()) {
                toast('Silakan login untuk mengkonfirmasi kehadiran.', 'error');
                return redirect()->route('login');
            }

            // Cari agenda berdasarkan ID
            $agenda = Agenda::find($id);

            if (!$agenda) {
                abort(404); // Jika agenda tidak ditemukan, tampilkan halaman 404
            }

            // Cek apakah sudah ada presensi yang terkait dengan agenda ini dan pengguna yang login
            $existingPresence = Presence::where('agenda_id', $id)
                ->where('user_id', auth()->user()->id)
                ->first();

            if ($existingPresence) {
                // Jika sudah ada presensi, cek statusnya
                if ($existingPresence->confirmed_at) {
                    // Jika sudah dikonfirmasi sebelumnya, berikan pesan error
                    toast('Anda sudah melakukan konfirmasi kehadiran untuk agenda ini.', 'error');
                } else {
                    // Jika belum dikonfirmasi, update waktu konfirmasi
                    $existingPresence->confirmed_at = Carbon::now();
                    $existingPresence->save();

                    // Berikan pesan sukses
                    toast('Konfirmasi Kehadiran Berhasil.', 'success');
                }
            } else {
                // Jika belum ada presensi, buat presensi baru
                $presence = new Presence();
                $presence->agenda_id = $id;
                $presence->user_id = auth()->user()->id; // Ambil ID pengguna yang sedang login
                $presence->confirmed_at = Carbon::now();
                $presence->initial_absen_at = null; // Sesuaikan dengan logika aplikasi Anda
                $presence->final_absen_at = null; // Sesuaikan dengan logika aplikasi Anda
                $presence->save();

                // Berikan pesan sukses
                toast('Konfirmasi Kehadiran Berhasil.', 'success');
            }

            // Redirect ke halaman detail agenda setelah konfirmasi
            return redirect()->route('agendas.details', $id);
        }
    }

    
