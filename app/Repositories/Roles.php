<?php

namespace App\Repositories;
use App\User;
use App\Role;
use Illuminate\Http\Request;

class Roles{
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
	public function pluck()
	{
		return Role::pluck('name', 'id');
	}

	public function create()
	{
		if($this->request->delete == "true"){
            $this->request->delete = true;
        }else {
            $this->request->delete = false;
        }

        if($this->request->show == "true"){
            $this->request->show = true;
        }else{
            $this->request->show = false;
        }

        if($this->request->update == "true"){
            $this->request->update = true;
        }else{
            $this->request->update = false;
        }

        $name = $this->request->name;
        $slug = str_slug($name, "-");

        $this->role->create([
            'name' => $this->request->name,
            'slug' => $slug,
            'permissions' => [
                'update-task' => $this->request->update,
                'delete-task' => $this->request->delete,
                'show-task' => $this->request->show

            ]

        ]);
	}

	public function update()
	{
		if($this->request->delete == "true"){
            $this->request->delete = true;
        }else {
            $this->request->delete = false;
        }

        if($this->request->show == "true"){
            $this->request->show = true;
        }else{
            $this->request->show = false;
        }

        if($this->request->update == "true"){
            $this->request->update = true;
        }else{
            $this->request->update = false;
        }

        $name = $this->request->name;
        $slug = str_slug($name, "-");

        $this->role->update([
            'name' => $this->request->name,
            'slug' => $slug,
            'permissions' => [
                'update-task' => $this->request->update,
                'delete-task' => $this->request->delete,
                'show-task' => $this->request->show

            ]

        ]);
	}

	public function detachID($role)
	{
		$role = $this->role->where('slug', $role->slug)->first();
        $role->users()->detach();
	}

	public function delete($role)
	{
		return $this->role->where('slug', $role->slug)->delete();
	}
}