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

      return $this->belongsToMany('App\Models\Customer', 'loans');

    }

    // lenders
    public function lenders(){

      return $this->belongsToMany('App\Models\Lender', 'loans');

    }
    
    // insurances
    public function insurance(){

      return $this->hasMany('App\Models\Insurance');
    }

    // payments
    public function payments(){

      return $this->hasManyThrough('App\Models\Payment', 'App\Models\Loan');

    }

}
