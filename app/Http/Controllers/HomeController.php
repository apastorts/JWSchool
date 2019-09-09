<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meeting;
use Apastorts\JWGetter\Model\Schedule;
use App\MeetingService;
use App\Http\Resources\Meeting as MeetingResource;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meetings = Meeting::all();

        return view('home', compact('meetings'));
    }

    public function find($date)
    {
        $date = carbon($date);
        $schedule= Schedule::where('date', $date->startOfWeek())->first();
        $meeting = $schedule ? MeetingService::createMeeting($schedule) : null;
        return $meeting ? new MeetingResource($meeting) : null;
    }

    public function new()
    {
        if(Meeting::where('date', now()->startOfWeek())->count() == 0){
            $schedule= Schedule::where('date', now()->startOfWeek())->first();
            $meeting = $schedule ? MeetingService::createMeeting($schedule) : null;
        }
        else{
            $meeting = Meeting::where('date', now()->startOfWeek())->first();
        }
        return view('meeting.show', compact('meeting'));
    }
}
