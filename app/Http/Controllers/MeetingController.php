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

       $meeting = request('meeting_id') ? Meeting::find(request('meeting_id')) : new Meeting();
       $meeting->date = str_replace(['T','Z'],' ', request('meetingDate')['date']);
       $meeting->user_id = auth()->user()->id;
       $this->deleteTalks($meeting);

       $meeting->save();

       foreach($request->all() as $type => $talk){
         if($talk && $type != 'meetingDate' && $type != 'meeting_id')
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

    public function show(Meeting $meeting)
    {
      $meeting->talks = $meeting->talks;

      foreach($meeting->talks as $talk){
        $talk->user = $talk->user;
        $talk->user->role = $talk->user->role;
      }

      return view('meeting.show', compact('meeting'));
    }

    public function delete(Meeting $meeting)
    {
      $this->deleteTalks($meeting);
      $meeting->delete();

      return redirect('/');
    }

    private function deleteTalks(Meeting $meeting)
    {
      foreach($meeting->talks as $talk)
      {
        $talk->delete();
      }
    }
}
