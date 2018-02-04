<?php

use Faker\Generator as Faker;


$factory->define(App\Models\Customer::class, function (Faker $faker) {
  
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastname,
        'phone' => $faker->phoneNumber,
        'ssn' => $faker->ssn
    ];
});
