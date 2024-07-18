<?php

namespace App\Http\Controllers\Mely\Mely;

use App\Models\AttendanceList;
use App\Http\Requests\StoreAttendanceListRequest;
use App\Http\Requests\UpdateAttendanceListRequest;
use App\Http\Controllers\Controller;
use App\Models\MeetingParticipant;
use App\Models\SubmissionModule;
use App\Models\User;
use Carbon\Carbon;

class AttendanceListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua submission_modules dengan status tertentu, diurutkan berdasarkan tanggal dan waktu rapat terdekat dengan hari ini
        $submissionModules = SubmissionModule::where('status', 'Undangan Didistribusikan')
        ->orWhere('status', 'Telah Dilaksanakan')
        ->orWhere('status', 'Notula Tersedia')
        ->where(function ($query) {
            $query->whereDate('date', '>=', Carbon::today()); // Tanggal rapat setelah atau sama dengan hari ini
        })
        ->orderBy('date', 'asc') // Urutkan berdasarkan tanggal rapat secara ascending
        ->orderBy('time', 'asc') // Kemudian urutkan berdasarkan waktu rapat secara ascending jika tanggalnya sama
        ->get();

        $meetingParticipants = MeetingParticipant::all();

        return view('mely.mely.meeting.attendance-list.index', compact('submissionModules','meetingParticipants'));
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
    public function store(StoreAttendanceListRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AttendanceList $attendanceList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AttendanceList $attendanceList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttendanceListRequest $request, AttendanceList $attendanceList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AttendanceList $attendanceList)
    {
        //
    }

    public function details($id)
    {
        $submissionModule = SubmissionModule::FindorFail($id);
        $meetingParticipants = MeetingParticipant::where('agenda_id', $submissionModule->id)->get();
        $users = User::all();
        return view('mely.mely.meeting.attendance-list.detail', compact('submissionModule', 'meetingParticipants', 'users'));
    }
}
