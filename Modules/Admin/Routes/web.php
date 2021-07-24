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

Route::prefix('control-room')->group(function () {
    Route::get('/', 'AdminController@index')->name('control.room');
    Route::get('/login', 'AdminController@showLogin')->name('control.login');
});
