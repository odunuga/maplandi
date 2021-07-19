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

Route::prefix('cart')->group(function () {
    Route::get('/', 'CartController@index')->name('cart');
});

Route::prefix('checkout')->group(function () {
    Route::get('/', 'CartController@checkout')->name('checkout');
});


Route::prefix('order')->group(function () {
    Route::get('/', 'CartController@order')->name('order');

    Route::get('/{ref}', 'CartController@order_show')->name('order.show');
});

Route::prefix('payment')->group(function () {
    Route::get('/', 'CartController@payment')->name('payment');
});

Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');


Route::get('/payment/callback', 'PaymentController@handleGatewayCallback')->name('handleGatewayCallback');
