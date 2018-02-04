<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{

  // customers
  public function customers(){

    return belongsTo('App\Models\Customer');

  }

  // lenders
  public function lenders(){

    return belongsTo('App\Models\Lender');

  }

  // properties
  public function property(){

    return belongsTo('App\Models\Property');

  }

  // insurances
  public function insurance(){

    return hasManyThrough('App\Models\Insurance', 'App\Models\Property');

  }

  // payments
  public function payments(){

    return hasMany('App\Models\Payment');

  }

}
