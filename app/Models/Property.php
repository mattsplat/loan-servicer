<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    // loans
    public function loans(){

      return hasMany('App\Models\Loan');

    }

    // customer
    public function customers(){

      return hasManyThrough('App\Models\Customer', 'App\Models\Loan');

    }

    // lenders
    public function lenders(){

      return hasManyThrough('App\Models\Lender', 'App\Models\Loan');

    }
    
    // insurances
    public function insurance(){

      return hasMany('App\Models\Insurance');
    }

    // payments
    public function payments(){

      return hasManyThrough('App\Models\Payment', 'App\Models\Loan');

    }

}
