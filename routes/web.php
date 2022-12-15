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

	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['edit']]);
	Route::get('userEdit/{user}', ['as' => 'userEdit.edit', 'uses' => 'App\Http\Controllers\UserController@edit']);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	 Route::get('map', function () {return view('pages.maps');})->name('map');
	 Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	Route::put('profile/photo', ['as' => 'profile.photo', 'uses' => 'App\Http\Controllers\ProfileController@photo']);
	
	Route::resource('permission', 'App\Http\Controllers\PermissionController', ['except' => ['edit', 'show']]);
	Route::get('permissionEdit/{permission}', ['as' => 'permissionEdit.edit', 'uses' => 'App\Http\Controllers\PermissionController@edit']);

	Route::resource('rol', 'App\Http\Controllers\RolController', ['except' => ['edit', 'show']]);
	Route::get('rolEdit/{rol}', ['as' => 'rolEdit.edit', 'uses' => 'App\Http\Controllers\RolController@edit']);

	Route::resource('parque', 'App\Http\Controllers\ParqueController', ['except' => ['edit']]);
	Route::get('parqueEdit/{parque}', ['as' => 'parqueEdit.edit', 'uses' => 'App\Http\Controllers\ParqueController@edit']);

	//Route::get('permissions', [PermissionController::class, 'index'])->name('permissions');
});

