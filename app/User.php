<?php

namespace App;

use App\Models\Customer;
use App\Models\Lender;
use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use Notifiable;
    use Billable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function attachRole(Model $role)
    {

        $rollable_type = get_class($role);

        if(!in_array(str_replace('App\\Models\\', '', $rollable_type),Role::ALLOWED_TYPES)) {
            throw new \Exception('Role not of '. $rollable_type.' not Allowed');
        }

        return Role::updateOrCreate([
            'user_id' => $this->id,
            'roleable_id' => $role->id,
            'roleable_type' => $rollable_type
        ]);

    }

    public function detatchRole(Model $role)
    {
        return  Role::where([
            'user_id' => $this->id,
            'roleable_id' => $role->id,
            'roleable_type' => get_class($role)
        ])->delete();

    }

    public function roles()
    {
        $roles = Role::where('user_id', $this->id )->get();

        return $roles->map(function($role){
            return ($role->roleable_type::find($role->roleable_id));
        });

    }
}
