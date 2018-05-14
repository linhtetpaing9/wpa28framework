<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$role = Role::find(1);
        $user = User::find(1);
        $user->roles()->attach($role);
    	
    }
}
