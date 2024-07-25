<?php

namespace App\Http\Controllers\Mely\Mely;

use App\Models\SubmissionModule;
use App\Http\Requests\StoreSubmissionModuleRequest;
use App\Http\Requests\UpdateSubmissionModuleRequest;
use App\Http\Controllers\Controller;
use App\Mail\Email;
use App\Mail\subModuleStatusChangedEmail;
use App\Models\Admin;
use App\Models\MeetingParticipant;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class SubmissionModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $submissionModules = SubmissionModule::orderBy('updated_at','desc')->get();

    $submissionModules_tab1 = SubmissionModule::where('status', 'Baru Ditambahkan')
                                    ->orWhere('status', 'Proses Persetujuan')
                                    ->orWhere('status', 'Sudah Disetujui')
                                    ->orderBy('updated_at', 'desc')
                                    ->get();

    $submissionModules_tab2 = SubmissionModule::where('status', 'Undangan Didistribusikan')
                                    ->orWhere('status', 'Telah Dilaksanakan')
                                    ->orWhere('status', 'Notula Tersedia')
                                    ->orderBy('updated_at', 'desc')
                                    ->get();

    $submissionModules_tab3 = SubmissionModule::where('status', 'Dibatalkan')
                                    ->orderBy('updated_at', 'desc')
                                    ->get();                                

    return view('mely.mely.meeting.submission-module.index', compact('submissionModules','submissionModules_tab1', 'submissionModules_tab2','submissionModules_tab3'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $submissionModules = SubmissionModule::all();
        $users = User::whereBetween('id_role', [1, 5])
            ->orderBy('id_role')
            ->get();
        $roles = Role::all();
        return view('mely.mely.meeting.submission-module.create', compact('submissionModules', 'users', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    $users = User::all();

    // Validasi tanggal dan waktu
    $date = $request->date;
    $time = $request->time;

    $selectedDateTime = strtotime("$date $time");
    $currentDateTime = strtotime('now');

    if ($selectedDateTime <= $currentDateTime) {
        // Jika memilih tanggal dan waktu yang sudah berlalu, tampilkan pesan kesalahan
        toast('Anda tidak dapat memilih tanggal dan waktu yang sudah berlalu.', 'error');
        return redirect()->back()->withInput();
    } else if ($date == null) {
        toast('Tanggal harus dipilih.', 'error');
        return redirect()->back()->withInput();
    } else if ($time == null) {
        toast('Jam harus dipilih.', 'error');
        return redirect()->back()->withInput();
    }

    // Simpan data rapat ke SubmissionModule
    $submissionModule = new SubmissionModule();
    $submissionModule->user_id = $request->user_id == '' ? auth()->user()->id : $request->user_id;
    // Validasi role_id untuk user_id
    $user = User::find($submissionModule->user_id);
    if ($user->id_role == 4) {
        toast('Maaf, staf tidak dapat mengajukan rapat. Diskusikan lebih lanjut dengan Supervisor.', 'error');
        return redirect()->back()->withInput();
    }
    $submissionModule->title = $request->title;
    $submissionModule->purpose = $request->purpose;
    $submissionModule->agenda = $request->agenda;
    $submissionModule->date = $date;
    $submissionModule->time = $time;
    $submissionModule->duration = $request->duration;
    $submissionModule->type = $request->type;
    $submissionModule->location = $request->location;
    $submissionModule->supporting_document = $request->supporting_document;
    $submissionModule->postscript = $request->postscript;
    $submissionModule->status = 'Baru Ditambahkan';
    $submissionModule->reason_cancelled = '';
    $submissionModule->created_at = Carbon::now();
    $submissionModule->updated_at = Carbon::now();
    $submissionModule->save();

// Ambil agenda_id yang baru saja disimpan
$agendaId = $submissionModule->id;

// Validasi partisipan rapat
$hasParticipants = false;

// Simpan partisipan rapat ke MeetingParticipant berdasarkan user_id
// Cek apakah user_id sudah ada sebagai partisipan
$existingParticipant = MeetingParticipant::where('agenda_id', $agendaId)
    ->where('participant_id', $submissionModule->user_id)
    ->exists();

// Jika belum terdaftar, tambahkan sebagai partisipan
if (!$existingParticipant) {
    MeetingParticipant::create([
        'agenda_id' => $agendaId,
        'participant_id' => $submissionModule->user_id,
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    $hasParticipants = true;
}

// Simpan partisipan rapat berdasarkan role_id
if ($request->has('role_id')) {
    foreach ($request->role_id as $roleId) {
        // Ambil semua user dengan role_id tertentu
        $users = User::where('id_role', $roleId)->get();

        foreach ($users as $user) {
            // Periksa apakah user_id tersebut sudah terdaftar di role_id
            $existingParticipant = MeetingParticipant::where('agenda_id', $agendaId)
                ->where('participant_id', $user->id)
                ->exists();

            // Jika belum terdaftar, simpan sebagai partisipan rapat
            if (!$existingParticipant) {
                MeetingParticipant::create([
                    'agenda_id' => $agendaId,
                    'participant_id' => $user->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                $hasParticipants = true; // Set flag bahwa ada partisipan yang dipilih
            }
        }
    }
}

// Simpan partisipan rapat berdasarkan user_id_participant
if ($request->has('user_id_participant')) {
    $userIds = $request->user_id_participant;

    if (!empty($userIds)) {
        foreach ($userIds as $userId) {
            // Periksa apakah user_id tersebut sudah terdaftar sebagai partisipan rapat
            $existingParticipant = MeetingParticipant::where('agenda_id', $agendaId)
                ->where('participant_id', $userId)
                ->exists();

            // Jika belum terdaftar, simpan sebagai partisipan rapat
            if (!$existingParticipant) {
                MeetingParticipant::create([
                    'agenda_id' => $agendaId,
                    'participant_id' => $userId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                $hasParticipants = true; // Set flag bahwa ada partisipan yang dipilih
            }
        }
    }
}

// Jika tidak ada partisipan yang dipilih, tampilkan pesan kesalahan
if (!$hasParticipants) {
    toast('Partisipan rapat harus dipilih.', 'error');
    $submissionModule->delete(); // Hapus data SubmissionModule yang sudah disimpan
    return redirect()->back()->withInput();
}

// Tampilkan pesan sukses dan redirect ke halaman index
toast('Data Berhasil Ditambahkan', 'success');
return redirect()->route('submission-modules.index');

}

    /**
     * Display the specified resource.
     */
    public function show(SubmissionModule $submissionModule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $submissionModule = SubmissionModule::FindorFail($id);
        $meetingParticipants = MeetingParticipant::where('agenda_id', $id)->get();
        $users = User::all();
        $roles = Role::all();
        return view('mely.mely.meeting.submission-module.edit', compact('submissionModule', 'meetingParticipants', 'users','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Temukan MeetingRequest berdasarkan ID
        $submissionModule = SubmissionModule::findOrFail($id);

        $date = $request->date;
        $time = $request->time;

        $selectedDateTime = strtotime("$date $time");
        $currentDateTime = strtotime('now');
    
        if ($selectedDateTime <= $currentDateTime) {
            // Jika memilih tanggal dan waktu yang sudah berlalu, tampilkan pesan kesalahan
            toast('Anda tidak dapat memilih tanggal dan waktu yang sudah berlalu.', 'error');
            return redirect()->back()->withInput();
        }

        $submissionModule->update([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'purpose' => $request->purpose,
            'agenda' => $request->agenda,
            'date' => $date,
            'time' => $time,
            'duration' => $request->duration,
            'type' => $request->type,
            'supporting_document' => $request->supporting_document,
            'postscript' => $request->postscript,
            'updated_at' => now(),
        ]);

        toast('Data Berhasil Diubah', 'success');
        return redirect()->route('submission-modules.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubmissionModule $submissionModule)
    {
        $submissionModule->delete();
        
        toast('Data Berhasil Dihapus', 'success');
        return redirect()->route('submission-modules.index');
    }

    public function details($id)
    {
        $submissionModule = SubmissionModule::findOrFail($id);
        $meetingParticipants = MeetingParticipant::where('agenda_id', $id)->get();
        $users = User::all();
        $roles = Role::all();
        return view('mely.mely.meeting.submission-module.detail', compact('submissionModule', 'meetingParticipants','users','roles'));
    }

    public function updateStatus(Request $request, $id)
{
    $submissionModule = SubmissionModule::findOrFail($id);

    // Update status based on request
    switch ($request->status) {
        case 'Diterima':
            $submissionModule->approved_at = Carbon::now();
            break;
            case 'Undangan Didistribusikan':
                $submissionModule->distributed_at = Carbon::now();
                $admin = Admin::first();
                
                $participants = MeetingParticipant::where('agenda_id', $id)->get();

            foreach ($participants as $participant) {
                $user = User::find($participant->participant_id); // Ambil data user berdasarkan participant_id
                if ($user) {
                    Mail::to($user->email)->send(new Email($submissionModule, $admin->whatsapp_number));
                }
            }
            
        case 'Dibatalkan':
            $submissionModule->cancelled_at = Carbon::now();
            $submissionModule->reason_cancelled = $request->reason_cancelled; // Include reason for cancellation
            break;
        case 'Telah Dilaksanakan':
            $submissionModule->implemented_at = Carbon::now();
            break;
            default:
            // Handle default case if needed
            break;
        }
        
        $submissionModule->status = $request->status;
        $submissionModule->updated_at = now();
        $submissionModule->save();

        Mail::to($submissionModule->user->email)->send(new subModuleStatusChangedEmail());

        toast('Status Berhasil Diubah', 'success');

    return redirect()->route('submission-modules.index');
    }   

    public function attendanceConfirmation($id)
        {
            // Pastikan pengguna sudah login
            if (!auth()->check()) {
                toast('Silakan login untuk mengkonfirmasi kehadiran.', 'error');
                return redirect()->route('login');
            }

            // Cari agenda berdasarkan ID
            $submissionModule = SubmissionModule::find($id);

            if (!$submissionModule) {
                abort(404); // Jika agenda tidak ditemukan, tampilkan halaman 404
            }

            // Cek apakah sudah ada presensi yang terkait dengan agenda ini dan pengguna yang login
            $existingPresence = MeetingParticipant::where('agenda_id', $id)
                ->where('participant_id', auth()->user()->id)
                ->first();

            if ($existingPresence) {
                // Jika sudah ada presensi, cek statusnya
                if ($existingPresence->confirmed_at) {
                    // Jika sudah dikonfirmasi sebelumnya, berikan pesan error
                    toast('Anda sudah melakukan konfirmasi kehadiran untuk agenda ini.', 'error');
                } else {
                    // Jika belum dikonfirmasi, update waktu konfirmasi
                    $existingPresence->confirmed_at = Carbon::now();
                    $existingPresence->updated_at = Carbon::now();
                    $existingPresence->save();

                    // Berikan pesan sukses
                    toast('Konfirmasi Kehadiran Berhasil.', 'success');
                }
            }else{
                toast('Anda bukan partisipan untuk agenda ini.', 'error');
            } 
            return redirect()->route('submission-modules.details', $id);
        }

}
