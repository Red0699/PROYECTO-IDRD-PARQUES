<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;

//use Illuminate\Support\Facades\Auth;

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

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

	//Usuario Administrador
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['edit']]);
	Route::get('userEdit/{user}', ['as' => 'userEdit.edit', 'uses' => 'App\Http\Controllers\UserController@edit']);
	
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade');

	//Mapa
	Route::get('map', function () {return view('pages.mapas.view');})->name('map');

	Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	Route::get('table-list', function () {return view('pages.tables');})->name('table');

	//Edición Perfil del Usuario
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	Route::put('profile/photo', ['as' => 'profile.photo', 'uses' => 'App\Http\Controllers\ProfileController@photo']);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);

	//Roles y Permisos
	Route::resource('permission', 'App\Http\Controllers\PermissionController', ['except' => ['edit', 'show']]);
	Route::get('permissionEdit/{permission}', ['as' => 'permissionEdit.edit', 'uses' => 'App\Http\Controllers\PermissionController@edit']);

	Route::resource('rol', 'App\Http\Controllers\RolController', ['except' => ['edit', 'show']]);
	Route::get('rolEdit/{rol}', ['as' => 'rolEdit.edit', 'uses' => 'App\Http\Controllers\RolController@edit']);

	//Parque
	Route::resource('parque', 'App\Http\Controllers\ParqueController', ['except' => ['edit']]);
	Route::get('parque/{parque}/editar', ['as' => 'parque.edit', 'uses' => 'App\Http\Controllers\ParqueController@edit']);

	//Implementos Inventarios
	Route::get('inventario', 'App\Http\Controllers\InventarioController@index')->name('inventario');

	Route::resource('juegos', 'App\Http\Controllers\JuegosController', ['except' => ['create', 'store']]);
	Route::get('juegos/create/{parque}', ['as' => 'juegos.create', 'uses' => 'App\Http\Controllers\JuegosController@create']);
	Route::post('juegos/{parque}', ['as' => 'juegos.store', 'uses' => 'App\Http\Controllers\JuegosController@store']);

	Route::resource('cancha', 'App\Http\Controllers\CanchaDeportivaController');
	Route::resource('equipamiento', 'App\Http\Controllers\EquipamientoController');
	Route::resource('escenario', 'App\Http\Controllers\EscenarioController');
	Route::resource('mobiliario', 'App\Http\Controllers\MobiliarioController');
});
