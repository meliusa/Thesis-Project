<?php

namespace App\Http\Controllers\Mely\Mely;

use App\Models\IntegratedCalendar;
use App\Http\Requests\StoreIntegratedCalendarRequest;
use App\Http\Requests\UpdateIntegratedCalendarRequest;
use App\Http\Controllers\Controller;
use App\Models\MeetingParticipant;
use App\Models\SubmissionModule;

class IntegratedCalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Ambil ID user yang sedang login
    $userId = auth()->user()->id;

    // Cari partisipan yang memiliki user ID yang sedang login
    $participants = MeetingParticipant::where('participant_id', $userId)->get();

    // Inisialisasi array kosong untuk events dan submissionModules
    $events = [];
    $submissionModules = [];

    // Jika ada partisipan yang sesuai
    if ($participants->isNotEmpty()) {
            // Ambil semua agenda yang terkait dengan partisipan yang ditemukan
            $agendaIds = $participants->pluck('agenda_id')->toArray();

            // Ambil semua submission_modules yang statusnya 'Undangan Didistribusikan' dan terkait dengan agenda yang ditemukan
            $submissionModules = SubmissionModule::whereIn('id', $agendaIds)
            ->where('status', 'Undangan Didistribusikan')
            ->orderBy('date', 'asc')
            ->orderBy('time', 'asc')
            ->get(['id', 'title', 'date', 'time', 'type']);

            // Ambil semua events yang statusnya 'Undangan Didistribusikan'
            $events = SubmissionModule::whereIn('id', $agendaIds)
            ->where('status', 'Undangan Didistribusikan')
            ->get(['id', 'title', 'date', 'time', 'type']);
    }

    // Kirimkan data ke view
    return view('mely.mely.meeting.integrated-calendar.index', compact('events', 'submissionModules'));
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
    public function store(StoreIntegratedCalendarRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(IntegratedCalendar $integratedCalendar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IntegratedCalendar $integratedCalendar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIntegratedCalendarRequest $request, IntegratedCalendar $integratedCalendar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IntegratedCalendar $integratedCalendar)
    {
        //
    }
}
