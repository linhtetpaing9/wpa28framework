<?php

namespace App;


class Role extends Model
{
    protected $casts = [
    	'permissions' => 'array'
    ];

     public function users(){
        return $this->belongsToMany(User::class);
    }

    public function getRouteKeyName()
    {
    	return 'slug';
    }
}
