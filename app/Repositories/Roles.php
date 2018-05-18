<?php

namespace App\Repositories;
use App\Role;

class Roles{
	public function pluck()
	{
		return Role::pluck('name', 'id');
	}
}