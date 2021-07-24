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

use Illuminate\Support\Facades\Route;


Route::prefix('control-room')->middleware('auth')->group(function () {
    Route::get('/', 'AdminController@index')->name('control.room');
    Route::get('/login', 'Auth\LoginController@showLogin')->name('control.login');
    Route::get('/forgot-password', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('control.forgot');
    Route::get('reset-password/{token}', 'Auth\ForgotPasswordController@showResetPasswordForm')->name('reset.password.get');

    Route::post('/login', 'Auth\LoginController@loginAdmin')->name('control.login');
    Route::post('reset-password', 'Auth\ForgotPasswordController@submitResetPasswordForm')->name('reset.password.post');

});
