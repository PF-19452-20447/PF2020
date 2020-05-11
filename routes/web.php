<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

/*Route::get('/', function () {
    return view('welcome');
    //return view('home');
    //return view('index');
});*/

Auth::routes(['verify' => true]);

Route::get('/inquilinos/{id}', 'InquilinosController@show');

Route::get('/', 'HomeController@index')->name('home');

//only users autenticated and with email verified can access the following routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/users', 'UserController@index')->name('users.index');
    Route::post('/users', 'UserController@store')->name('users.store');
    Route::get('/users/create', 'UserController@create')->name('users.create');
    Route::get('/users/{user}', 'UserController@show')->name('users.show');
    Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');
    Route::put('/users/{user}', 'UserController@update')->name('users.update');
    Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy');
    Route::delete('/users/{user}/delete', 'UserController@delete')->name('users.delete');
    Route::impersonate();

    /*Route::get('/roles', 'RoleController@index')->name('roles.index');
    Route::post('/roles', 'RoleController@store')->name('roles.store');
    Route::get('/roles/create', 'RoleController@create')->name('roles.create');
    Route::get('/roles/{role}', 'RoleController@show')->name('roles.show');
    Route::get('/roles/{role}/edit', 'RoleController@edit')->name('roles.edit');
    Route::put('/roles/{role}', 'RoleController@update')->name('roles.update');
    Route::delete('/roles/{role}', 'RoleController@destroy')->name('roles.destroy');*/
    Route::resource('roles', 'RoleController');
    Route::put('/roles/{role}/update-permissions', 'RoleController@updatePermissions')->name('roles.update_permissions');

    //Route::get('/settings', 'SettingController@index')->name('settings.index');
    Route::resource('settings', 'SettingController');
});

