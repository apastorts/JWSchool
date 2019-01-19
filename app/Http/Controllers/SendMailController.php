<?php

namespace App\Http\Controllers;

use App\Meeting;
use App\Talk;
use App\Notifications\TalkAssignment;

class SendMailController extends Controller
{
    /**
    * Show the profile for the given user.
    *
    * @param  int  $id
    * @return View
    */
   public function __invoke(Meeting $meeting)
   {
     foreach ($meeting->talks as $talk){
       if($talk->user) $talk->user->notify(new TalkAssignment($talk, $talk->user));
       if($talk->partner) $talk->partner->notify(new TalkAssignment($talk, $talk->partner));
     }

     return redirect('/');
   }

}
