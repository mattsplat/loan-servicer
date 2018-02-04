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
          $insurance = factory('App\Models\Insurance', ['property_id' => $property->id])
          ->create()->first();

        }

    }
}
