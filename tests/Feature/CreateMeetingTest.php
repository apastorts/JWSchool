<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use App\User;
use App\Meeting;

class CreateMeeting extends TestCase
{
    /** @test */
      public function it_creates_a_meeting_if_all_fieds_are_correct()
    {
        Passport::actingAs(
            factory(User::class)->create()
        );


        $response = $this->json('POST', '/api/meeting/create', [
              'bibleReading' => '1',
              'treasuresTalk' => '1',
              'digging' => '1',
              'initial' => '1',
              'firstRV' => '1',
              'talk' => '1',
              'congregationBible' => '1',
              'secondPart' => '1',
              'localNeeds' => '1',
              'meetingDate' => now()
          ])->getData();

        $this->assertCount(1,Meeting::all());
    }
}
