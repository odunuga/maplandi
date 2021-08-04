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

    Route::get('/comments_abuse', 'AdminController@abuse')->name('control.abuse');

    Route::get('/transactions', 'AdminController@transactions')->name('control.transactions');

    Route::get('/users', 'AdminController@users')->name('control.users');

    Route::get('/invoice/{ref}', 'AdminController@print_page')->name('control.invoice');

    Route::get('/order/{order}', 'AdminController@order_show')->name('admin.orders.update');

    Route::get('/product/{sku}/edit', 'ProductController@edit')->name('admin.product.edit');


    Route::get('tags', 'AdminController@tags')->name('control.tags');

    Route::get('comments', 'AdminController@comments')->name('control.comments');

    Route::get('comment/report', 'AdminController@comment_report')->name('control.comment.report');

    Route::get('product/report', 'AdminController@product_report')->name('control.product.report');

    Route::get('promotions', 'AdminController@promotions')->name('control.promotions');

    Route::get('testimonies','AdminController@testimonies')->name('control.testimonies');


    ////////////////////////////////////////////////////////////////////////////////

    Route::post('/order/update', 'AdminController@update_order')->name('admin.order.update');


    Route::post('/tags/delete', 'AdminController@tags_delete')->name('control.tags.delete');

    Route::post('/testimony/delete', 'AdminController@testimony_delete')->name('control.testimony.delete');

    Route::post('/comment/delete', 'AdminController@comment_delete')->name('control.comment.delete');

    Route::post('/comment_report/delete', 'AdminController@comment_report_delete')->name('control.comment_report.delete');

    Route::post('/comment_report/delete', 'AdminController@product_report_delete')->name('control.product_report.delete');


    Route::post('comment_report/delete', 'AdminController@comment_report_delete')->name('control.comment_report.delete');

    Route::post('product_report/delete', 'AdminController@product_report_delete')->name('control.product_report.delete');


//    Admin Login
    Route::get('/login', 'Auth\LoginController@showLogin')->name('control.login');

    Route::post('/login/post', 'Auth\LoginController@loginAdmin')->name('control.login.post');

    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('control.register');

    Route::post('/register', 'Auth\RegisterController@register')->name('control.register.post');

//    Route::get('/forgot-password', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('control.forgot');
//
//    Route::get('/reset-password/{token}', 'Auth\ResetPasswordController@showResetForm')->name('reset.password.get');
//
//    Route::post('/reset-password', 'Auth\ResetPasswordController@reset')->name('reset.password.post');

    Route::get('forget-password', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('control.forget.password.get');
    Route::post('forget-password', 'Auth\ForgotPasswordController@submitForgetPasswordForm')->name('control.forget.password.post');
    Route::get('reset-password/{token}', 'Auth\ResetPasswordController@showResetForm')->name('control.reset.password.get');
    Route::post('reset-password', 'Auth\ResetPasswordController@submitResetPasswordForm')->name('control.reset.password.post');
});
