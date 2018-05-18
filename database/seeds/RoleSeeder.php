<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
        	'name' => 'Admin',
        	'slug' => 'admin',
        	'permissions' => [
        		'update-task' => true,
        		'show-task' => true,
        		'delete-task' => true

        	]
        ]);
        Role::create([

        	'name' => 'User',
        	'slug' => 'user',
        	'permissions' => [
        		'update-task' => false,
        		'show-task' => true,
                'delete-task' => false

        	]

        ]);
    }
}
