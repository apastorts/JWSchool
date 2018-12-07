<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserRoleTest extends TestCase
{
    /**
     * A User has a Role
     *
     * @return void
     */
    public function test_a_user_has_a_role()
    {
        $user = factory('App\User')->create();

        $this->assertNotNull($user->role);
    }
}
