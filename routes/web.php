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
});

Route::group(['prefix' => '/users', 'namespace' => 'App\User\Controllers'],function () {
    Route::resource('/', 'UserController')->except([]);
    Route::resource('roles', 'UserRoleController')->except([]);
    Route::resource('rights', 'UserRightController')->except([]);
});
