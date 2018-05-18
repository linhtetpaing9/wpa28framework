<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\Users;
use App\Repositories\Roles;
use App\Repositories\Requests;
use App\User;
use App\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('superadmin');
    }


    public function index()
    {

        return view('users.index');
    }


    public function create(Roles $roles)
    {
        $role = $roles->pluck();
        return view('users.create', compact('role'));
    }


    public function store(Requests $requests, Users $users)
    {

        $this->validate($requests->validate(), $requests->userCreateData());

        $users->create();

        $users->attachID();


        return Redirect::route('user.index');
    }




    public function show(User $user, Users $users)
    {
        // dd($user->roles);
        
        if(isset($user->roles[0])){
            $roles = $user->roles;

            $roles_status = $users->show($roles);

            if($user->is_admin){
                return view('users.profile', compact('user', 'roles', 'roles_status'));
            }else{
                return view('fronts.profile', compact('user', 'roles'));
            }
            
        }else {
            return view('users.role-error', compact('user'));
        }
        
    }

    public function edit(User $user, Roles $roles)
    {
        $role = $roles->pluck();
        return view('users.edit', compact('user', 'role'));
    }

    public function update(Requests $requests, Users $users, User $user)
    {
        $this->validate($requests->validate(), $requests->userEditData());

        $users->detachID($user);

        $users->update($user);
        
        $users->attachID();

        
        auth()->login($user);

        return Redirect::route('user.index');
    }

    public function upload()
    {
        return view('upload');
    }


    public function destroy(User $user, Users $users)
    {
        $users->detachID($user);
        $users->delete($user);
        return Redirect::route('user.index');
    }


    public function datatable(Request $request)
    {
        if($request->ajax()){

            $model = User::query();
            
            return Datatables::of($model)
            ->addColumn("show", function($model){
                $data = "<a href=" . route("user.show", $model->slug) . ">$model->name</a>";
                return $data;
            })
            ->addColumn("edit", function($model){
                $data = "<a class='btn btn-primary' href=" . route("user.edit", $model->slug) . ">Edit</a>";
                return $data;
            })
            ->addColumn("delete", function($model){
                $data = '<form action="' . route('user.destroy', $model->slug). '" method="post">'
                . csrf_field() .
                method_field("delete") .
                '<button class="btn btn-danger">Delete</button>
                </form>';
                return $data;
            })
            ->rawColumns(['show','edit', 'delete'])
            ->toJson();
        }
        return abort(404);
    }
}
