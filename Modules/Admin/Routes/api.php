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


});
