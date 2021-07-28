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

    Route::get('/users', 'AdminController@users')->name('control.users');
    Route::get('/settings', 'AdminController@settings')->name('control.settings');
    Route::get('/settings/edit', 'AdminController@settings_edit')->name('control.settings.edit');
    Route::post('/settings/update', 'AdminController@settings_update')->name('control.settings.update');

    Route::get('/items', 'ProductController@index')->name('control.items');

    Route::post('/item/delete', 'ProductController@delete')->name('control.product.delete');

    Route::get('builder/{id}', 'ProductController@builder')->name('control.build.category');


    Route::get('/transactions', 'AdminController@transactions')->name('control.transactions');
    Route::get('/users', 'AdminController@users')->name('control.users');

    Route::get('/invoice/{ref}', 'AdminController@print_page')->name('control.invoice');

    Route::get('/order/{order}', 'AdminController@order_show')->name('admin.orders.update');

    Route::get('/product/{sku}/edit', 'ProductController@edit')->name('admin.product.edit');

    Route::post('/order/update', 'AdminController@update_order')->name('admin.order.update');

//    Admin Login
    Route::get('/login', 'Auth\LoginController@showLogin')->name('control.login');
    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('control.register');

    Route::get('/forgot-password', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('control.forgot');
    Route::get('reset-password/{token}', 'Auth\ForgotPasswordController@showResetPasswordForm')->name('reset.password.get');

    Route::post('/login', 'Auth\LoginController@loginAdmin')->name('control.login');
    Route::post('/register', 'Auth\RegisterController@register')->name('control.register');
    Route::post('reset-password', 'Auth\ForgotPasswordController@submitResetPasswordForm')->name('reset.password.post');

});
