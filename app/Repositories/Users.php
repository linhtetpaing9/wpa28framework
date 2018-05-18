<?php

namespace App\Repositories;
use App\User;
use App\Role;
use Illuminate\Http\Request;

class Users{
	protected $user;
	protected $request;
	protected $role;
	protected $role_status = [];
	public function __construct(User $user, Request $request, Role $role)
	{
		$this->user = $user;
		$this->request = $request;
		$this->role = $role;
	}
	public function create()
	{
		if($this->request->is_admin == "true"){
            $this->request->is_admin = true;
        }else {
            $this->request->is_admin = false;
        }

        $name = $this->request->name;
        $slug = str_slug($name, "-");

		return $this->user->create([
            'name' => $this->request->name,
            'email' => $this->request->email,
            'slug' => $slug,
            'is_admin' => $this->request->is_admin,
            'profile_image' => $this->request->profile_image,
            'password' => bcrypt($this->request->password),
        ]);
	}

	public function show($roles)
	{
		
		
		if($roles[0]->permissions['show-task']){
            $this->roles_status['show'] = 'can see post';
        }else{
            $this->roles_status['show'] = 'cannot see post';
        }


        if($roles[0]->permissions['update-task']){
            $this->roles_status['update'] = 'can update post';
        }else{
            $this->roles_status['update'] = 'cannot update post';
        }


        if($roles[0]->permissions['delete-task']){
            $this->roles_status['delete'] = 'can delete post';
        }else{
            $this->roles_status['delete'] = 'cannot delete post';
        }

        return $this->roles_status;
	}


	public function update()
	{
		if($this->request->is_admin == "true"){
            $this->request->is_admin = true;
        }else {
            $this->request->is_admin = false;
        }

        $name = $this->request->name;
        $slug = str_slug($name, "-");

		return $this->user->update([
            'name' => $this->request->name,
            'email' => $this->request->email,
            'slug' => $slug,
            'is_admin' => $this->request->is_admin,
            'profile_image' => $this->request->profile_image,
            'password' => bcrypt($this->request->password),
        ]);
	}

	public function attachID()
	{
		
        $user = $this->user->where('name', $this->request->name)->first();
        $role = $this->role->where('id', $this->request->role_id)->first();
        $user->roles()->attach($role);
	}

	public function detachID($user)
	{
		$user = $this->user->where('slug', $user->slug)->first();
        $user->roles()->detach();
	}

	public function delete($user)
	{
		return $this->user->where('slug', $user->slug)->delete();
	}

}