<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('/admin/role', 'RoleController')->except('data');
Route::get("/admin/role-data", "RoleController@data")->name("role.data");



Route::resource('/admin/user', 'UserController')->except(['getData', 'edit', 'showRole']);

Route::get('/admin/user/{user}/edit', 'UserController@edit')->name('user.edit');
Route::get("/admin/user-data", "UserController@getData")->name("user.data");
// Route::get("/admin/user/role/{role}", "UserController@showRole")->name("user.role");





Route::get('/home', 'HomeController@index')->name('home');
