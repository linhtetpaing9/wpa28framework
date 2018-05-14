<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Lin Htet Paing',
        	'email' => 'linhtetpaing9@example.com',
        	'password' => bcrypt('123456'),
        	'is_admin' => true,
            'slug' => 'lin-htet-paing'

        ]);

        
    }
}
