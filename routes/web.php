<?php

use App\Http\Controllers\SocialiteController;
use App\Models\User;
use App\Notifications\NewRegistration;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Shop\Http\Controllers\ShopController;

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
Route::group(['prefix' => LaravelLocalization::setLocale()], function () {

    Route::get('/google/login', [SocialiteController::class, 'login'])->name('google.login');

    Route::get('/google/signup', [SocialiteController::class, 'signup'])->name('google.signup');

    Route::get('oauth/google/callback', [SocialiteController::class, 'webhook']);

    Route::get('/password/first', [SocialiteController::class, 'password_set'])->name('password.first');

    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [ShopController::class, 'welcome'])->name('dashboard');

    Route::get('testimony/request/{token}', [ShopController::class, 'testimony_request'])->name('testimony.request.set');


});

