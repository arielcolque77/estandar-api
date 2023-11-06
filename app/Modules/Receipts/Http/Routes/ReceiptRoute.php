<?php

namespace App\Modules\Receipts\Http\Routes;

use App\Modules\Receipts\Http\Controllers\ReceiptController;
use Illuminate\Support\Facades\Route;

Route::controller(ReceiptController::class)->group(function () {
    Route::prefix('receipts')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('{id}', 'show');
        Route::put('{id}', 'update');
        Route::delete('{id}', 'delete');
    });
});
