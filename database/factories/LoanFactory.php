<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Loan::class, function (Faker $faker) {
    $terms = [15,20,30];
    $property = App\Models\Property::inRandomOrder()->first();
    $start_amount = $property->value - ($property->value*rand(4, 25)/100);
    $start_date = Carbon\Carbon::now()->subMonths(rand(0, 100))->toDateTimeString();
    return [
        'start_date' => $start_date,
        "term" => $terms[rand(0,2)]*12,
        "rate" => rand(300, 600)/100,
        "start_amount" => $start_amount,
        "balance" => $start_amount,
        "payment_day" => rand(1,30),
        "customer_id" => App\Models\Customer::inRandomOrder()->first()->id,
        "lender_id" =>  App\Models\Lender::inRandomOrder()->first()->id,
        "property_id" =>  $property->id,
    ];
});
