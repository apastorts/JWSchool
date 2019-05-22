<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meeting;
use Apastorts\JWGetter\Model\Schedule;
use App\MeetingService;

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

    public function new()
    {
        if(Meeting::where('date', now()->startOfWeek())->count() == 0){
            $meeting = MeetingService::createMeeting(Schedule::where('date', now()->startOfWeek())->first());
        }
        else{
            $meeting = Meeting::where('date', now()->startOfWeek())->first();
        }
        return view('meeting.show', compact('meeting'));
    }
}
