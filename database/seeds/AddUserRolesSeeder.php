<?php

use Illuminate\Database\Seeder;

class AddUserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lender = \App\Models\Lender::all();

        $lender->each(function($lender){
            $user = factory('App\User')->create();
            $user->attachRole($lender);
        });

        $this->command->info('Creating customers');
        $customer = \App\Models\Customer::all();

        $customer->each(function($customer){
            $user = factory('App\User')->create([
                'name'=> $customer->first_name .' '.$customer->last_name
            ]);
            $user->attachRole($customer);
            $this->command->info('Creating customer '. $customer->id. ' user id '. $user->id);
        });
    }
}
