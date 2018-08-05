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
            $user->attachToLender($lender);
        });

        $customer = \App\Models\Customer::all();

        $customer->each(function($customer){
            $user = factory('App\User')->create();
            $user->attachToRole($customer);
        });
    }
}
