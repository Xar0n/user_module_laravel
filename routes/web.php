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
    $except = ['create', 'show', 'destroy', 'edit', 'index'];
    Route::resource('/', 'UserController')->except($except);
    Route::resource('roles', 'UserRoleController')->except($except);
    Route::group(['prefix' => '/roles'], function () {
        Route::patch('/{idRole}/params/{idRight}', 'UserRoleController@addRight');
    });
    Route::resource('rights', 'UserRightController')->except($except);
    Route::resource('groups', 'UserGroupController')->except($except);
    Route::group(['prefix' => '/roles'], function () {
        Route::post('/{idRole}/groups/{idGroup}', 'UserGroupController@addRole');
    });
});
