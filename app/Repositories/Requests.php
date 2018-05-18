<?php
namespace App\Repositories;
use Illuminate\Http\Request;
class Requests{

	protected $request;

	public function __construct(Request $request)
	{
		$this->request = $request;
	}

	public function validate()
	{
		return $this->request;
	}
	public function userCreateData()
	{
		return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'profile_image' => 'required'
        ];
	}

	public function userEditData()
	{
		return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
            'profile_image' => 'required'
        ];
	}


	public function roleCreateData()
	{
		return [
            'name' => 'required'
        ];
	}

	public function roleEditData()
	{
		return [
            'name' => 'required',
            'permissions' => 'required'
        ];
	}
}