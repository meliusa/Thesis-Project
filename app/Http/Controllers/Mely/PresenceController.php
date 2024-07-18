<?php

namespace App\Http\Controllers\Mely;

use App\Models\Presence;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PresenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $presences = Presence::all();
        return view('mely.meeting.presence.presence-table', compact('presences'));
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
    public function show(Presence $presence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Presence $presence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Presence $presence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Presence $presence)
    {
        //
    }
    
    public function details($id)
    {
        $presence = Presence::FindorFail($id);
        // Mengambil semua presences yang memiliki agenda_id yang sama dengan $presence->agenda_id
        $presences = Presence::where('agenda_id', $presence->agenda_id)->get();
        return view('mely.meeting.presence.presence-details', compact('presence', 'presences'));
    }
}
