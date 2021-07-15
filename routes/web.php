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

Route::group(['prefix' => '/', 'namespace' => 'App\User\Controllers'],function () {
    //исключенные действия ресурсных контроллеров
    $except = ['create', 'show', 'destroy', 'edit', 'index'];
    Route::resource('users', 'UserController')->except($except);
    Route::group(['prefix' => '/users'],function () {
        $except = ['create', 'show', 'destroy', 'edit', 'index'];
        Route::resource('roles', 'UserRoleController')->except($except);
        Route::group(['prefix' => '/roles'], function () {
            Route::patch('/{idRole}/params/{idRight}', 'UserRoleController@changeRight');
        });
        Route::resource('rights', 'UserRightController')->except($except);
        Route::resource('groups', 'UserGroupController')->except($except);
        Route::group(['prefix' => '/roles'], function () {
            Route::patch('/{idRole}/groups/{idGroup}', 'UserGroupController@changeRole');
        });
    });
});
