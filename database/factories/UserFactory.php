<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'sex' => $faker->title == 'Mr' ? 'Male' : 'Female',
        'role_id' => function(){
          return factory('App\Role')->create()->id;
        },
        'congregation_id' => function(){
          return factory('App\Congregation')->create()->id;
        }
    ];
});

$factory->define(App\Talk::class, function (Faker $faker) {
    return [
        'type' => $faker->name,
        'user_id' => function(){
          return factory('App\User')->create()->id;
        },
        'meeting_id' => function(){
          return factory('App\Meeting')->create()->id;
        }
    ];
});

$factory->define(App\Meeting::class, function (Faker $faker) {
    return [
        'date' => now(),
        'user_id' => function(){
          return factory('App\User')->create()->id;
        }
    ];
});

$factory->define(App\Role::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Congregation::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
