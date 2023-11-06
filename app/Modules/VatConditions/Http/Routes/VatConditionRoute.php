<?php

namespace App\Modules\VatConditions\Http\Routes;

use App\Modules\VatConditions\Http\Controllers\VatConditionController;
use Illuminate\Support\Facades\Route;

Route::controller(VatConditionController::class)->group(function () {
    Route::prefix('vat-conditions')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('{id}', 'show');
        Route::put('{id}', 'update');
        Route::delete('{id}', 'delete');
    });
});
