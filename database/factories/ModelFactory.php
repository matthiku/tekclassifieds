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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name'           => $faker->name,
        'email'          => $faker->email,
        'password'       => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});




$factory->define(App\Classified::class, function (Faker\Generator $faker) {
    return [
        'title'       => $faker->company(25),
        'description' => $faker->sentence(35),
        'price'       => $faker->randomFloat(2, 150, 550),
        'condition'   => $faker->randomElement(['good','used','new','old']),
        'main_image'  => $faker->numerify('image#.jpg'),
        'location'    => $faker->address(),
        'email'       => $faker->email(),
        'phone'       => $faker->phoneNumber(10),
        'owner_id'    => $faker->randomDigit(),
        'category_id' => $faker->numberBetween(1,4),
    ];
});
