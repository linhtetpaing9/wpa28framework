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

\TalvBansal\MediaManager\Routes\MediaRoutes::get();

Auth::routes();


Route::prefix('admin')->group(function(){


	Route::resource('role', 'RoleController')->except('data');
	Route::get("role-data", "RoleController@datatable")->name("role.data");



	Route::resource('user', 'UserController')->except(['getData', 'edit', 'upload']);
	Route::get('user/{user}/edit', 'UserController@edit')->name('user.edit');
	Route::get("user-data", "UserController@datatable")->name("user.data");
	Route::get('upload', 'UserController@upload')->name('upload.data');
});




Route::get('/home', 'HomeController@index')->name('home');
