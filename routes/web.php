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
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

        // Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');


        // Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');



Route::get('/admin/upload', function () {
	return view('upload');
})->name('upload.data');

\TalvBansal\MediaManager\Routes\MediaRoutes::get();


Route::resource('/admin/role', 'RoleController')->except('data');
Route::get("/admin/role-data", "RoleController@data")->name("role.data");



Route::resource('/admin/user', 'UserController')->except(['getData', 'edit', 'showRole']);

Route::get('/admin/user/{user}/edit', 'UserController@edit')->name('user.edit');
Route::get("/admin/user-data", "UserController@getData")->name("user.data");
// Route::get("/admin/user/role/{role}", "UserController@showRole")->name("user.role");





Route::get('/home', 'HomeController@index')->name('home');
