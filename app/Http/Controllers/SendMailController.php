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
       $talk->user->notify(new TalkAssignment($talk));
     }

     return redirect('/');
   }

}
