<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AssigningTalksTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function a_user_has_many_talks_test()
    {
        $user = factory('App\User')->create();

        $talks = factory('App\Talk',2)->create([
          'user_id' => $user->id
        ]);

        $this->assertEquals(2,$user->talks->count());
    }
}
