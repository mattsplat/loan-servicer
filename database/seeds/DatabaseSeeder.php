<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        // $this->call(UsersTableSeeder::class);
        App\User::create([
          'name' =>'Cave Johnson',
          'email' => 'cave@aperture.com',
          'password' => bcrypt('123456'),
          
        ]);

        factory('App\Models\Lender', 10)->create();
        factory('App\Models\Customer', 50)->create();
        $customers = App\Models\Customer::all();
        foreach($customers as $customer){

          // create property for user
          $property = factory('App\Models\Property', [
            'customer_id' => $customer->id
            ])->create()->first();

          // create loan for property connected to user
          $loan = factory('App\Models\Loan', [
            'property_id' => $property->id,
            'customer_id' => $customer->id
          ])->create()->first();

          // create insurance on property
            $cost = round(($property->value * rand(5, 15) )/1000, 2);

            $insurance = App\Models\Insurance::create([
                'property_id' => $property->id,
                'cost' => $cost,
                'company' => $faker->company,
                'policy_number' => $faker->ssn,
            ]);

          // create payments
            $months = \Carbon\Carbon::now()->diffInMonths($loan->start_date);
            $payment = $loan->monthlyPayment();
            foreach(range(1, $months) as $month){

                $monthly_interest = ($loan->rate/1200);
                $interest = $loan->balance * $monthly_interest ;
                $tax = $loan->property->tax/12;
                $ins = $loan->property->insurance->cost/12;
                if(round($payment) != round($loan->monthlyMortgage()+$tax+$ins) ){
                    $this->command->info('Payment of '. $payment .' != '. ($loan->monthlyMortgage()+$tax+$ins));
                }
                $principal = $payment - ($interest+$tax+$ins);
                \App\Models\Payment::create([
                    "amount" => $payment,
                    "method" => 'check',
                    "date" => $loan->start_date->addMonths($month),
                    "loan_id" => $loan->id,
                    "customer_id" => $customer->id,
                    'principal' => $principal,
                    'interest' => $interest,
                    'tax' => $tax,
                    'insurance' => $ins,
                    'balance' => $loan->balance - $principal,
                ]);


                //adjust balance
                $loan->balance = $loan->balance - $principal;
                $loan->save();
            }

        }

    }
}
