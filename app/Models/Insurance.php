<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
  
    public function loans(){
            return belongsTo('App\Models\Property');
    }

}