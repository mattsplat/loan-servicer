<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $dates = ['date' ];

    // loans
    public function loan(){

      return $this->belongsTo('App\Models\Loan');

    }

    // customers
    public function customer(){

      return $this->belongsTo('App\Models\Customer');

    }


}
