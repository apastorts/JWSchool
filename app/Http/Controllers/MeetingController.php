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

       $meeting = Meeting::findOrNew(request('meeting_id'));
       $meeting->date = str_replace(['T','Z'],' ', request('meetingDate'));
       $meeting->user_id = auth()->user()->id;
       $this->deleteTalks($meeting);

       $meeting->save();

       foreach($request->all() as $type => $talks){
         if($talks && $type != 'meetingDate' && $type != 'meeting_id')
         {
           foreach($talks as $talk){
             $newTalk = new Talk();
             $newTalk->meeting_id = $meeting->id;
             $newTalk->type = $type;
             $newTalk->title = $talk['title'];
             $newTalk->user_id = $talk['user']['id'];
             $newTalk->save();
           }
         }
       }

       return new MeetingResource($meeting);
    }

    public function show(Meeting $meeting)
    {
      $meeting->talks = $meeting->talks;

      foreach($meeting->talks as $talk){
        $talk->user = $talk->user ? $talk->user : null;
        $talk->user->role = $talk->user->role ? $talk->user->role : null;
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
