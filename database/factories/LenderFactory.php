<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Lender::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
    ];
});
