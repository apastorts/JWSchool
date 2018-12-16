<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Meeting as MeetingResource;
use App\Meeting;
use App\Talk;

class MeetingController extends Controller
{
    public function store(Request $request)
    {

       $request->validate([
         'meetingDate' => 'required'
       ]);

       $meeting = new Meeting();
       $meeting->date = str_replace(['T','Z'],' ', request('meetingDate'));
       $meeting->save();

       foreach($request->all() as $type => $talk){
         if($talk && $type != 'meetingDate')
         {
           $newTalk = new Talk();
           $newTalk->meeting_id = $meeting->id;
           $newTalk->type = $type;
           $newTalk->user_id = $talk;
           $newTalk->save();
         }
       }

       return new MeetingResource($meeting);
    }
}
