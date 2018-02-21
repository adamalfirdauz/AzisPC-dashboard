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

// Route::get('users', 'UserController@users')->middleware('auth:api');
Route::post('auth/register', 'AuthController@register');
Route::post('auth/login', 'AuthController@login');

Route::get('users/profile', 'UserController@profile')->middleware('auth:api');
Route::get('users/{id}', 'UserController@profileById')->middleware('auth:api');
Route::post('users/{id}', 'UserController@updateProfile')->middleware('auth:api');

Route::post('order/add', 'OrderController@add')->middleware('auth:api');
Route::get('order/{user_id}', 'OrderController@orderById')->middleware('auth:api');
Route::put('order/{order}', 'OrderController@update')->middleware('auth:api');
Route::delete('order/{order}', 'OrderController@delete')->middleware('auth:api');