<?php

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

Route::get('/', 'HomeController@dashboard')->name('dashboard');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*  Sidebar route here!!
|   Route pada sidebar harus mengirimkan variabel yang membuat sidebar active.
|   berikut nilai variabel $active:
|   Dashboard = 0;
|   Manage staff = 1 s.d 5;
|   Order = 11 s.d 16; 
*/

Route::prefix('staff')->name('staff.')->group(function() {
    Route::get('/', 'StaffController@index')->name('index');
    Route::get('add', 'StaffController@addStaff')->name('add');
    Route::get('list', 'StaffController@listStaff')->name('list');
    Route::post('add', 'StaffController@create')->name('create');
});
Route::prefix('order')->name('order.')->group(function() {
    Route::get('/', 'OrderController@index')->name('index');
    Route::get('waiting', 'OrderController@waitingList')->name('waiting');
    Route::post('ambilBarang/', 'OrderController@ambilBarang')->name('ambilBarang');
    Route::get('diagnosa', 'OrderController@acceptedList')->name('accepted');
    Route::post('diagnosa', 'OrderController@diagnosa')->name('diagnosa');
    Route::post('mulaiKerjakan', 'OrderController@mulaiKerjakan')->name('mulaiKerjakan');
    Route::post('hapusOrder', 'OrderController@hapusOrder')->name('hapusOrder');
    Route::post('uploadFotoService', 'OrderController@uploadFotoService')->name('uploadFotoService');
    Route::post('selesaiDikerjakan', 'OrderController@selesaiDikerjakan')->name('selesaiDikerjakan');
    Route::get('working', 'OrderController@working')->name('working');
    Route::get('finish', 'OrderController@finish')->name('finish');
    Route::get('archives', 'OrderController@archives')->name('archives');
}); 