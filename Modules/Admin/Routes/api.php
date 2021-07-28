<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\ApiAdminController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/latest_products', [ApiAdminController::class, 'get_latest_products'])->name('admin.latest_products');

    Route::post('/admin_orders', [ApiAdminController::class, 'get_orders'])->name('admin.orders');

    Route::post('/admin_stocks', [ApiAdminController::class, 'get_stocks'])->name('admin.stocks');

    Route::post('/get_users', [ApiAdminController::class, 'get_users'])->name('admin.users');
    Route::post('/get_transactions', [ApiAdminController::class, 'get_transactions'])->name('admin.transactions');


});
