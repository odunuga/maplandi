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

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    Route::get('/', 'ShopController@welcome')->name('welcome');

    Route::prefix('shop')->group(function () {
        Route::get('/', 'ShopController@index')->name('shop');
        Route::get('/{sku}', 'ShopController@show')->name('shop.product');
    });
});
