<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'username' => $faker->userName,
        'name' => $faker->name,
        'uuid' => $faker->uuid,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'password' => bcrypt(str_random(10)),
    ];
});
