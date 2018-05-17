<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    


    public function roles(){
        return $this->belongsToMany(Role::class);
    }


    public function hasPermission($permission) {
        if($this->roles() != null) {
            $user_permissions = $this->roles()->first()->permissions;
            if(array_key_exists($permission,$user_permissions)){
                if($user_permissions[$permission]){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
        return false;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
