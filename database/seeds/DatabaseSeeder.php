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
        factory('App\Role')->create([
          'name' => 'Anciano'
        ]);

        factory('App\Role')->create([
          'name' => 'Siervo Ministerial'
        ]);

        factory('App\Role')->create([
          'name' => 'Precursor'
        ]);

        factory('App\Role')->create([
          'name' => 'Publicador'
        ]);

        factory('App\User')->create([
          'name' => 'Abel Pastor',
          'role_id' => 2,
          'email' => 'apastorts@gmail.com',
          'password' => bcrypt('donkey'),
          'sex' => 'Male'
        ]);
    }
}
