<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

    // loans
    public function loans(){

      return belongsTo('App\Models\Loan');

    }

    // customers
    public function customers(){

      return belongsTo('App\Models\Customer');

    }

}
