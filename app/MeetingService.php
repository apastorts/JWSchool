<?php

namespace App;

use Apastorts\JWGetter\Model\Schedule;

class MeetingService
{
    public static function createMeeting(Schedule $schedule)
    {
        $meeting = json_decode($schedule->metadata);

        $new_meeting = new Meeting();
        $new_meeting->date = $schedule->date;
        $new_meeting->user_id = auth()->user()->id;
        $new_meeting->save();

        foreach($meeting->treasures as $key => $treasures){
            if($key != 'title'){
                $talk = new Talk();
                $talk->title = $treasures[1];
                $talk->type = 'treasures';
                $talk->meeting_id = $new_meeting->id;
                $talk->save();
            }
        }

        foreach($meeting->teachers as $key => $teachers){
            if($key != 'title'){
                $talk = new Talk();
                $talk->title = $teachers[1];
                $talk->type = 'ministry';
                $talk->meeting_id = $new_meeting->id;
                $talk->save();
            }
        }

        foreach($meeting->living as $key => $living){
            if($key != 'title'){
                $talk = new Talk();
                $talk->title = $living[1];
                $talk->type = 'christianLiving';
                $talk->meeting_id = $new_meeting->id;
                $talk->save();
            }
        }

        return $new_meeting;
    }
}