<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Property::class, function (Faker $faker) {
    $value = rand(100, 500)*1000;
    return [
      "type" => 'Single Family',
      "address" => $faker->address,
      "value" => $value,
      "tax" => $value * rand(8, 20)/1000, 
    ];
});
