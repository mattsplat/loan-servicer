<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Insurance::class, function (Faker $faker) {
  $property = App\Models\Property::inRandomOrder()->first();
    return [
      'company' => $faker->company,
      'policy_number' => $faker->ssn,
      'cost' => round(($property->value * rand(5, 15) )/1000, 2),
      'property_id' => $property->id
    ];
});
