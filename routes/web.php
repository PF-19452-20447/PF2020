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

//=== CRUD TESTING FACILITY ===
Route::resource('proprietarios','ProprietarioController');

//=============================
Auth::routes(['verify' => true]);

//Route::get('/inquilinos/{id}', 'InquilinosController@show');

Route::get('/', 'HomeController@index')->name('home');

//only users autenticated and with email verified can access the following routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/users', 'UserController@index')->name('users.index');
    Route::post('/users', 'UserController@store')->name('users.store');
    Route::get('/users/create', 'UserController@create')->name('users.create');
    Route::get('/profile', 'UserController@showProfile')->name('users.profile');
    Route::get('/users/{user}', 'UserController@show')->name('users.show');
    Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');
    Route::put('/users/{user}', 'UserController@update')->name('users.update');
    Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy');
    Route::delete('/users/{user}/delete', 'UserController@delete')->name('users.delete');
    Route::impersonate();

// inquilinos

//Route::get('/inquilinos', 'InquilinosController@index')->name('inquilinos.index');
//Route::post('/inquilinos', 'InquilinosController@store')->name('inquilinos.store');
//Route::get('/inquilinos/create', 'InquilinosController@create')->name('inquilinos.create');
//Route::get('/inquilinos/{inquilino}', 'InquilinosController@show')->name('inquilinos.show');
//Route::get('/inquilinos/{inquilino}/edit', 'InquilinosController@edit')->name('inquilinos.edit');
//Route::put('/inquilinos/{inquilino}', 'InquilinosController@update')->name('inquilinos.update');
//Route::delete('/inquilinos/{inquilino}', 'InquilinosController@destroy')->name('inquilinos.destroy');
//Route::delete('/inquilinos/{inquilino}/delete', 'InquilinosController@delete')->name('inquilinos.delete');
//Route::impersonate();

    Route::resource('inquilinos','InquilinoController');    
    Route::post('/inquilinos', 'InquilinoController@store')->name('inquilinos.store');

    Route::get('/inquilinos/pdf','InquilinoController@export_pdf');


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

//permissions and roles

Route::get('service/inquilino/view', 'InquilinoController@view');
Route::get('service/inquilino/create', 'InquilinoController@create');
Route::get('service/inquilino/update', 'InquilinoController@update');
Route::get('service/inquilino/destroy', 'InquilinoController@destroy');
});

//fiadores
Route::resource('fiador', 'FiadorController');

//permissoes e roles dos fiadores

Route::get('service/fiador/view', 'FiadorController@view');
Route::get('service/fiador/create', 'FiadorController@create');
Route::get('service/fiador/update', 'FiadorController@update');
Route::get('service/fiador/destroy', 'FiadorController@destroy');


//imoveis
Route::resource('imoveis', 'ImovelController')->parameters([
    'imoveis' => 'imovel'
]);

//permissoes e roles dos fiadores
Route::get('service/imoveis/view', 'ImovelController@view');
Route::get('service/imoveis/create', 'ImovelController@create');
Route::get('service/imoveis/update', 'ImovelController@update');
Route::get('service/imoveis/destroy', 'ImovelController@destroy');

//contratos

Route::resource('contratos', 'ContratoController');

//permissoes e roles dos contratos

Route::get('service/contrato/view','ContratoController@view');
Route::get('service/contrato/create','ContratoController@create');
Route::get('service/contrato/update','ContratoController@update');
Route::get('service/contrato/destroy','ContratoController@destroy');

/*Route::group( ['middleware' => 'auth'], function() {
    // practicing using forms for sending data to the DB & populating form fields with DB data
    Route::get('users/profile', 'UserProfileController@index')->name('users.profile');
    Route::patch('users/profile/{id}', 'UserProfileController@update')->name('users.edit');

});*/

//rendas


Route::resource('rendas', 'RendaController');

//permissoes e roles das rendas

Route::get('service/renda/view','RendaController@view');
Route::get('service/renda/create','RendaController@create');
Route::get('service/renda/update','RendaController@update');
Route::get('service/renda/destroy','RendaController@destroy');




