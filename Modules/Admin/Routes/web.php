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


Route::prefix('control-room')->group(function () {
    Route::get('/', 'AdminController@index')->name('control.room');
    Route::get('/orders', 'AdminController@orders')->name('control.orders');
    Route::get('/stocks', 'AdminController@stocks')->name('control.stocks');
    Route::get('/items', 'AdminController@items')->name('control.items');
    Route::get('/transactions', 'AdminController@transactions')->name('control.transactions');


//    Admin Login
    Route::get('/login', 'Auth\LoginController@showLogin')->name('control.login');
    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('control.register');

    Route::get('/forgot-password', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('control.forgot');
    Route::get('reset-password/{token}', 'Auth\ForgotPasswordController@showResetPasswordForm')->name('reset.password.get');

    Route::post('/login', 'Auth\LoginController@loginAdmin')->name('control.login');
    Route::post('/register', 'Auth\RegisterController@register')->name('control.register');
    Route::post('reset-password', 'Auth\ForgotPasswordController@submitResetPasswordForm')->name('reset.password.post');

});
