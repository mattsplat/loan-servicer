<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lender extends Model
{
    public function loans(){

      return hasMany('App\Models\Loan');

    }

    public function customers(){

      return hasManyThrough('App\Models\Customer', 'App\Models\Loan');

    }

}
