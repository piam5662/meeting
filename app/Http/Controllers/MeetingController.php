<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use Illuminate\Http\Request;

class MeetingController extends Controller
{ public function List()
    {
        return view('allMeeting');
    }
    public function create()
    {
        return view('meetings.create');
    }
    public function index()
    {
        $meetings = Meeting::all();

        return response()->json(['data' => $meetings]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'start_time' => 'required|date|before:end_time',
            'end_time' => 'required|date|after:start_time',
        ]);

        // Check for overlapping meetings
        $overlappingMeetings = Meeting::where(function ($query) use ($request) {
            $query->where('start_time', '<', $request->input('end_time'))
                  ->where('end_time', '>', $request->input('start_time'));
        })->exists();

        if ($overlappingMeetings) {
            return redirect()->route('meetings.create')->with('error', 'Overlapping meeting exists. Please choose a different time slot.');
        }

        Meeting::create([
            'name' => $request->input('name'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
        ]);

        return redirect()->route('meetings.create')->with('success', 'Meeting created successfully.');
    }



}
