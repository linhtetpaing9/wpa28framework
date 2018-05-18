<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('superadmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = \Auth::user();
        // if($user->is_admin){
        //     $role = Role::paginate(10);
        // }else{
        //     $role = Role::where('user_id', $user->id)->paginate(10);
        // }
        
        return view('roles.index', compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
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
            'name' => 'required'
        ]);
    

        if($request->delete == "true"){
            $request->delete = true;
        }else {
            $request->delete = false;
        }

        if($request->show == "true"){
            $request->show = true;
        }else{
            $request->show = false;
        }

        if($request->update == "true"){
            $request->update = true;
        }else{
            $request->update = false;
        }

        $name = $request->name;
        $slug = str_slug($name, "-");

        Role::create([
            'name' => $request->name,
            'slug' => $slug,
            'permissions' => [
                'update-task' => $request->update,
                'delete-task' => $request->delete,
                'show-task' => $request->show

            ]

        ]);
         return Redirect::route('role.index');
    }
    public function data(Request $request)
    {

        if($request->ajax()){

            $model = Role::query();
            
            return Datatables::of($model)
            ->addColumn("edit", function($model){
                $data = "<a class='btn btn-primary' href=" . route("role.edit", $model->slug) . ">Edit</a>";
                return $data;
            })
            ->addColumn("delete", function($model){
                $data = '<form action="' . route('role.destroy', $model->slug). '" method="post">'
                . csrf_field() .
                method_field("delete") .
                '<button class="btn btn-danger">Delete</button>
                </form>';
                return $data;
            })
            ->rawColumns(['edit', 'delete'])
            ->toJson();
        }
        return abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {

        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->validate(request(), [
            'name' => 'required',
            'permissions' => 'required'
        ]);

        if($request->delete == "true"){
            $request->delete = true;
        }else {
            $request->delete = false;
        }

        if($request->show == "true"){
            $request->show = true;
        }else{
            $request->show = false;
        }

        if($request->update == "true"){
            $request->update = true;
        }else{
            $request->update = false;
        }

        $name = $request->name;
        $slug = str_slug($name, "-");

        $role->update([
            'name' => $request->name,
            'slug' => $slug,
            'permissions' => [
                'update-task' => $request->update,
                'delete-task' => $request->delete,
                'show-task' => $request->show

            ]

        ]);

        return Redirect::route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role = Role::where('slug', $role->slug)->delete();
        
        $role = Role::where('slug', $role->slug)->first();

        return Redirect::route('role.index');
    }
}
