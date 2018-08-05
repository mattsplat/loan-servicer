<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    public function loans(){

      return $this->hasMany('App\Models\Loan');

    }

    public function properties(){

      return $this->belongsToMany('App\Models\Property', 'loans');

    }

    public function lenders(){

      return $this->belongsToMany('App\Models\Lender', 'loans');

    }

    public function totalLoanAmount(){

        $loans = $this->loans;
        $total = 0;
        foreach($loans as $loan){
            $total += $loan->start_amount;
        }

        return $total;
    }

}
