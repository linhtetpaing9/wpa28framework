<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('superadmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::pluck('name', 'id');
        return view('users.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'profile_image' => 'required'
        ]);

    
        if($request->is_admin == "true"){
            $request->is_admin = true;
        }else {
            $request->is_admin = false;
        }



        $name = $request->name;
        $slug = str_slug($name, "-");

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'slug' => $slug,
            'is_admin' => $request->is_admin,
            'profile_image' => $request->profile_image,
            'password' => bcrypt('$request->password'),


        ]);


        $user = User::where('name', $request->name)->first();
        $role = Role::where('id', $request->role_id)->first();
        $user->roles()->attach($role);
        


         return Redirect::route('user.index');
    }


    public function getData(Request $request)
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


    // public function showRole(Role $role)
    // {
    //     $users = $role->users;
    //     return view('users.user-role', compact('users'));
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $roles = $user->roles;

        $roles_status = [];

        if($roles[0]->permissions['show-task']){
            $roles_status['show'] = 'can see post';
        }else{
            $roles_status['show'] = 'cannot see post';
        }


        if($roles[0]->permissions['update-task']){
            $roles_status['update'] = 'can update post';
        }else{
            $roles_status['update'] = 'cannot update post';
        }


        if($roles[0]->permissions['delete-task']){
            $roles_status['delete'] = 'can delete post';
        }else{
            $roles_status['delete'] = 'cannot delete post';
        }
       
       // dd($roles_status);

        if($user->is_admin){
            return view('users.profile', compact('user', 'roles', 'roles_status'));
        }else{
            return view('fronts.profile', compact('user', 'roles'));
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $role = Role::pluck('name', 'id');
        return view('users.edit', compact('user', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
            'profile_image' => 'required'
        ]);

        $user = User::where('id', $user->id)->first();
        $user->roles()->detach();

        if($request->is_admin == "true"){
            $request->is_admin = true;
        }else {
            $request->is_admin = false;
        }



        $name = $request->name;
        $slug = str_slug($name, "-");

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'slug' => $slug,
            'is_admin' => $request->is_admin,
            'profile_image' => $request->profile_image,
            'password' => bcrypt('$request->password'),


        ]);


        $user = User::where('name', $request->name)->first();
        $role = Role::where('id', $request->role_id)->first();
        $user->roles()->attach($role);

        return Redirect::route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user = User::where('slug', $user->slug)->first();
        $user->roles()->detach();
        $user = User::where('slug', $user->slug)->delete();

        

        return Redirect::route('user.index');
    }
}
