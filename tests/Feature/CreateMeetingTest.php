<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Meeting;

class CreateMeeting extends TestCase
{
    /** @test */
    public function it_creates_a_meeting_if_all_fieds_are_correct()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $this->json('POST', '/api/meeting/create');

        $this->assertCount(1,Meeting::all());
    }
}
