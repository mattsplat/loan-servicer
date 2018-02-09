<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    public function loans(){

      return $this->hasMany('App\Models\Loan');

    }

    public function properties(){

      return $this->hasManyThrough('App\Models\Property', 'App\Loan');

    }

    public function lenders(){

      return $this->hasManyThrough('App\Models\Lender', 'App\Models\Loan');

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
