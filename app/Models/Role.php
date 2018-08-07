<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];

    const ALLOWED_TYPES = [
        'Lender',
        'Customer',
        'Admin',
    ];

    public function roleable()
    {
        return $this->morphTo('roleable', '');
    }

}
