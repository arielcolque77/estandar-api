<?php

namespace App\Modules\ReceiptTypes\Http\Routes;

use App\Modules\ReceiptTypes\Http\Controllers\ReceiptTypeController;
use Illuminate\Support\Facades\Route;

Route::controller(ReceiptTypeController::class)->group(function () {
    Route::prefix('receipt-types')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('{id}', 'show');
        Route::put('{id}', 'update');
        Route::delete('{id}', 'delete');
    });
});
