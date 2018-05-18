<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\Users;
use App\Repositories\Roles;
use App\Repositories\Requests;
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
        return view('roles.index');
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
    public function store(Requests $requests, Roles $roles)
    {
        $this->validate($requests->validate(), $requests->roleCreateData());

        $roles->create();
        
        return Redirect::route('role.index');
    }
    
    public function datatable(Request $request)
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
    public function update(Requests $requests, Roles $roles)
    {
        $this->validate($requests->validate(), $requests->roleCreateData());

        $roles->update();

        return Redirect::route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role, Roles $roles)
    {
        $roles->detachID($role);
        $roles->delete($role);
        return Redirect::route('role.index');
    }
}
