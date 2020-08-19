<?php

use Illuminate\Support\Facades\Route;

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

    /*\App\Role::find(1)->givePermissionsTo('delete users');
    auth()->user()->giveRolesTo('admin');
    dd(auth()->user()->can('delete users'));*/

    // role testing
//    dd(auth()->user()->hasRole('admin'));
//    auth()->user()->refreshRoles('Admin');
//    auth()->user()->withdrawRoles('Admin');
//    auth()->user()->giveRolesTo('Admin', 'Teacher');


// Permisson testing
//    dd(auth()->user()->can('delete users'));

//    dd(auth()->user()->hasPermission('add users'));
//    auth()->user()->refreshPermissions('add users');
//    auth()->user()->withdrawPermissions('delete users');
//    auth()->user()->givePermissionsTo(['add users']);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::group(['prefix' => 'panel', 'middleware'=>'role:admin'], function () {
Route::group(['prefix' => 'panel', 'middleware'=>'can:add users'], function () {
    Route::get('users', 'UserController@index')->name('users.index');
    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');
    Route::post('users/{user}/edit', 'UserController@update')->name('users.update');

    // roles
    Route::get('roles', 'RoleController@index')->name('roles.index');
    Route::post('roles', 'RoleController@store')->name('roles.store');
    Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit');
    Route::post('roles/{role}/update', 'RoleController@update')->name('roles.update');
});
