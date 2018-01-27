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

Route::get('/', function () {
    return view('pages.example');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*  Sidebar route here!!
|   Route pada sidebar harus mengirimkan variabel yang membuat sidebar active.
|   beriktu nilai variabel $active:
|   Dashboard = 0;
|   Manage staff = 1 s.d 5;
|   Order = 11 s.d 16;
*/

Route::get('/staff/', 'StaffController@index')->name('staff');
Route::get('/staff/add', 'StaffController@addStaff')->name('addStaff');
Route::get('/staff/list', 'StaffController@listStaff')->name('listStaff');
