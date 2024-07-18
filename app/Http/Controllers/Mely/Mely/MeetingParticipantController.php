<?php

namespace App\Http\Controllers\Mely\Mely;

use App\Models\MeetingParticipant;
use App\Http\Requests\StoreMeetingParticipantRequest;
use App\Http\Requests\UpdateMeetingParticipantRequest;
use App\Http\Controllers\Controller;
use App\Models\SubmissionModule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MeetingParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MeetingParticipant $meetingParticipant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MeetingParticipant $meetingParticipant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMeetingParticipantRequest $request, MeetingParticipant $meetingParticipant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MeetingParticipant $meetingParticipant)
    {
        //
    }

    public function updateInitialAbsenAt(Request $request, $id)
{
    $userId = auth()->user()->id;
    $submissionModule = SubmissionModule::findOrFail($id);
    
    // Menggunakan first() karena mencari satu record
    $meetingParticipant = MeetingParticipant::where('agenda_id', $submissionModule->id)
                            ->where('participant_id', $userId)
                            ->first();
    
    // Memeriksa apakah data $meetingParticipant ditemukan
    if (!$meetingParticipant) {
        toast('Anda tidak memiliki akses untuk melakukan presensi untuk agenda ini', 'error');
    } else {
        // Memeriksa apakah sudah ada data presensi dan final_absen_at belum terisi
        if ($meetingParticipant->initial_absen_at !== null) {
            toast('Anda sudah melakukan presensi awal untuk agenda ini', 'error');
        } else {
            $meetingParticipant->update([
                'initial_absen_at' => Carbon::now(), 
            ]);
            toast('Tanggal dan Jam Presensi awal Berhasil Tersimpan', 'success');
        }
    }
    
    return redirect()->route('integrated-calendars.index');
    }

    public function updateFinalAbsenAt(Request $request, $id)
    {
        $userId = auth()->user()->id;
        $submissionModule = SubmissionModule::findOrFail($id);
        
        // Menggunakan first() karena mencari satu record
        $meetingParticipant = MeetingParticipant::where('agenda_id', $submissionModule->id)
                                ->where('participant_id', $userId)
                                ->first();
        
        // Memeriksa apakah data $meetingParticipant ditemukan
        if (!$meetingParticipant) {
            toast('Anda tidak memiliki akses untuk melakukan presensi untuk agenda ini', 'error');
        } else {
            // Memeriksa apakah sudah ada data presensi dan final_absen_at belum terisi
            if ($meetingParticipant->final_absen_at !== null) {
                toast('Anda sudah melakukan presensi akhir untuk agenda ini', 'error');
            } else {
                $meetingParticipant->update([
                    'final_absen_at' => Carbon::now(), 
                ]);
                toast('Tanggal dan Jam Presensi akhir Berhasil Tersimpan', 'success');
            }
        }
        
        return redirect()->route('integrated-calendars.index');
    }

}
