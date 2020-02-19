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
       $meeting->date = carbon(str_replace(['T','Z'],' ', request('meetingDate')))->startOfWeek();
       $meeting->open = request('open') ? request('open')['id'] : null;
       $meeting->close = request('close') ? request('close')['id'] : null;
       $meeting->user_id = auth()->user()->id;
       $this->deleteTalks($meeting);

       $meeting->save();

       foreach(request('talks') as $type => $talks){
         if($talks && $type != 'meetingDate' && $type != 'meeting_id' && $type != 'open' && $type != 'close')
         {
           foreach($talks as $talk){
             $newTalk = new Talk();
             $newTalk->meeting_id = $meeting->id;
             $newTalk->type = $type;
             $newTalk->title = $talk['title'];
             $newTalk->user_id = isset($talk['user']) ? $talk['user']['id'] : '';
             $newTalk->partner_id = isset($talk['partner']) ? $talk['partner']['id'] : '';
             $newTalk->save();
           }
         }
       }

       return new MeetingResource($meeting);
    }

    public function show(Meeting $meeting)
    {
        $meeting->openPray;
        $meeting->closePray;
      $meeting->talks = $meeting->talks;

      foreach($meeting->talks as $talk){
        if($talk->user){
          $talk->user = $talk->user ? $talk->user : null;
          $talk->user->role = $talk->user ? $talk->user->role : null;
        }
        if($talk->partner){
          $talk->partner = $talk->partner ? $talk->partner : null;
          $talk->partner->role = $talk->partner ? $talk->partner->role : null;
        }
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

    public function toPDF(Meeting $meeting)
    {
        $treasures = $meeting->talks->where('type', 'treasures');
        $ministry = $meeting->talks->where('type', 'ministry');
        $christianLiving = $meeting->talks->where('type', 'christianLiving');

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML(view('pdf.midweek', compact('meeting','treasures', 'ministry', 'christianLiving'))->render());
        return $pdf->stream();
    }
}
