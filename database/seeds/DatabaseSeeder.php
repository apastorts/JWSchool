<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $role = factory('App\Role')->create();
        factory('App\User')->create([
          'name' => 'Abel Pastor',
          'role_id' => $role->id,
          'email' => 'apastorts@gmail.com',
          'password' => bcrypt('donkey'),
          'sex' => 'Male'
        ]);

        factory('App\User',10)->create();
    }
}
