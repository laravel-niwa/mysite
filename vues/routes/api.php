<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
Route::get('/tasks', 'TaskController@index');
Route::get('/tasks/{task}', 'TaskController@show');
Route::post('/tasks', 'TaskController@store');
Route::put('/tasks/{task}', 'TaskController@update');
Route::delete('/tasks/{task}', 'TaskController@destroy');
*/


Route::post('/logins', 'loginsController@login')->name('logins');
Route::post('/register', 'loginsController@register')->name('register');


Route::middleware('auth:api')->get('/users', 'UserController@index')->name('user.list');
//Route::get('/users', 'UserController@index')->name('user.list');
Route::get('/users_li', 'UserController@show_count')->name('user.show_count');
Route::get('/users/{user}', 'UserController@show')->name('user.show');
Route::post('/users', 'UserController@store')->name('user.store');
Route::put('/users/{user}', 'UserController@update')->name('user.update');
Route::delete('/users/{user}', 'UserController@destroy')->name('user.delete');
