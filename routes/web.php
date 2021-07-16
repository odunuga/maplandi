<?php

use App\Http\Controllers\SocialiteController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    Route::get('/google/login', [SocialiteController::class, 'login'])->name('google.login');

    Route::get('/google/signup', [SocialiteController::class, 'signup'])->name('google.signup');

    Route::get('oauth/google/callback', [SocialiteController::class, 'webhook']);

    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
}
);
