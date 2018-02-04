<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    public function loans(){

      return hasMany('App\Models\Loan');

    }

    public function properties(){

      return hasManyThrough('App\Models\Property', 'App\Loan');

    }

    public function lenders(){

      return hasManyThrough('App\Models\Lender', 'App\Models\Loan');

    }

}
