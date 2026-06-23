<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Meeting;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class VideoController extends Controller
{
    public function index()
    {
        $activeCalls = Meeting::where('status', 'active')->get();
        $endedCalls = Meeting::where('status', 'ended')->get();
        $totalCalls = Meeting::all();

        return view('videos.index', compact('activeCalls', 'endedCalls', 'totalCalls'));
    }

    public function start(Contact $contact)
    {
        // Generate unique room name
        $roomName = 'slt_' . $contact->id . '_' . Str::random(6);

        // Store meeting in database
        Meeting::create([
            'contact_id' => $contact->id,
            'started_by' => Auth::id(),
            'room_name' => $roomName,
            'started_at' => Carbon::now(),
            'status' => 'active'
        ]);

        return view('video.room', compact('roomName', 'contact'));
    }

    public function end($room)
    {
        Meeting::where('room_name', $room)
            ->update([
                'ended_at' => now(),
                'status' => 'ended'
            ]);

        return redirect()->route('chats.index');
    }
}
