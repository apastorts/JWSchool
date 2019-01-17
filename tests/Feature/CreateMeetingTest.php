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
       $this->withoutExceptionHandling();

        Passport::actingAs(
            factory(User::class)->create()
        );


        $response = $this->post('/api/meeting/create', [
              'treasures' => [
                'talk1' => [
                  'title' => '',
                  'user' => 1
                ],
                'talk2' => [
                  'title' => '',
                  'user' => 2
                ]
              ],
              'ministry' => [
                'talk1' => [
                  'title' => '',
                  'user' => 1
                ],
              ],
              'christianLiving' => [
                'talk1' => [
                  'title' => '',
                  'user' => 1
                ],
                'talk2' => [
                  'title' => '',
                  'user' => 2
                ]
              ],
              'meetingDate' => now()
          ]);

        $this->assertCount(5,Meeting::all()->first()->talks);
    }
}
