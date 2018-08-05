<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lender extends Model
{
    public function loans(){

      return $this->hasMany('App\Models\Loan');

    }

    public function customers(){

      return $this->belongsToMany('App\Models\Customer', 'loans');

    }

}
