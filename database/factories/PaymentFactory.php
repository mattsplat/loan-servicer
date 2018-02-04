<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Payment::class, function (Faker $faker) {

    $loan = App\Models\Loan::inRandomOrder()->first();
    $due_date = Carbon\Carbon::parse($loan->start_date)->addMonths(rand(1,10));
    return [
      "amount" => Carbon\Carbon::now()->subMonths(rand(0, 100)),
      "method" => 'check',
      "due_date" => $due_date,
      "loan_id" => $loan->id,
      "customer_id" => App\Models\Customer::inRandomOrder()->first(),
    ];
});
