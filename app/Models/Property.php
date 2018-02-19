<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    // loans
    public function loans(){

      return $this->hasMany('App\Models\Loan');

    }

    // customer
    public function customers(){

      return $this->hasManyThrough('App\Models\Customer', 'App\Models\Loan');

    }

    // lenders
    public function lenders(){

      return $this->hasManyThrough('App\Models\Lender', 'App\Models\Loan');

    }
    
    // insurances
    public function insurance(){

      return $this->hasOne('App\Models\Insurance');
    }

    // payments
    public function payments(){

      return $this->hasManyThrough('App\Models\Payment', 'App\Models\Loan');

    }

}
