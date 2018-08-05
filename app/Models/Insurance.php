<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
  
    public function properties(){
            return $this->belongsTo('App\Models\Property', 'property_id', 'id');
    }

}
