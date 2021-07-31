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

//    Route::post('/dropzone/upload',[ApiAdminController::class,'dropzone_update'])->name('admin.dropzone.update');


    Route::post('/get_tags', [ApiAdminController::class, 'get_tags'])->name('admin.tags');

    Route::post('/admin_comment_report', [ApiAdminController::class, 'comment_report'])->name('admin.comments.report');

    Route::post('/admin_product_report', [ApiAdminController::class, 'get_product_report'])->name('admin.product.report');

    Route::post('/admin_comments', [ApiAdminController::class, 'get_comments'])->name('admin.comments');


    Route::post('/admin_promotions', [ApiAdminController::class, 'get_promotions'])->name('admin.promotionst');


});
