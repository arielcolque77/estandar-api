<?php

namespace App\Modules\PaymentMethods\Http\Routes;

use App\Modules\PaymentMethods\Http\Controllers\PaymentMethodController;
use Illuminate\Support\Facades\Route;

Route::controller(PaymentMethodController::class)->group(function () {
    Route::prefix('payment-methods')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('{id}', 'show');
        Route::put('{id}', 'update');
        Route::delete('{id}', 'delete');
    });
});
