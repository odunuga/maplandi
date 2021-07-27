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
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale(),], function () {
    Route::prefix('cart')->group(function () {
        Route::get('/', 'CartController@index')->name('cart');
    });

    Route::prefix('checkout')->group(function () {
        Route::get('/', 'CartController@checkout')->name('checkout');
    });


    Route::prefix('orders')->group(function () {
        Route::get('/', 'CartController@orders')->name('orders');
    });
    Route::get('order/{ref}', 'CartController@order_show')->name('order.show');


    Route::prefix('saved')->group(function(){
       Route::get('/','CartController@saved_items')->name('saved');
    });
    Route::prefix('payment')->group(function () {
        Route::get('/', 'CartController@payment')->name('payment');
        Route::get('/on-delivery', 'CartController@on_delivery')->name('payment.on_delivery');
    });

    Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');


    Route::get('/payment/callback', 'PaymentController@handleGatewayCallback')->name('handleGatewayCallback');
});
