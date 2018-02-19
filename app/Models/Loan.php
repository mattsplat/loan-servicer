<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{

    protected $dates = ['created_at', 'updated_at', 'start_date'];

  // customers
  public function customer(){

    return $this->belongsTo('App\Models\Customer');

  }

  // lenders
  public function lender(){

    return $this->belongsTo('App\Models\Lender');

  }

  // properties
  public function property(){

    return $this->belongsTo('App\Models\Property');

  }

  // insurances
  public function insurance(){

    return $this->hasManyThrough('App\Models\Insurance', 'App\Models\Property');

  }

  // payments
  public function payments(){

    return $this->hasMany('App\Models\Payment');

  }



  public function monthlyMortgage()
  {

      $int = $this->rate/1200;
      $int1 = 1+$int;
      $r1 = pow($int1, $this->term);

      $pmt = $this->start_amount*($int*$r1)/($r1-1);

      return $pmt;
  }
  
  public function monthlyPayment(){

      $principal = $this->monthlyMortgage();


      $insurance = $this->property->insurance->cost / 12;

      $tax = $this->property->tax / 12;
      
      return $principal + $insurance + $tax;
  }

  public function age(){

      return Carbon::now()->diffForHumans($this->start_date, true);

  }
}
