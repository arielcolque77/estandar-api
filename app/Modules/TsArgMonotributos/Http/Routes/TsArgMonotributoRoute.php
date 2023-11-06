<?php

namespace App\Modules\TsArgMonotributos\Http\Routes;

use App\Modules\TsArgMonotributos\Http\Controllers\TsArgMonotributoController;
use Illuminate\Support\Facades\Route;

Route::controller(TsArgMonotributoController::class)->group(function () {
    Route::prefix('ts-arg-monotributos')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('{id}', 'show');
        Route::put('{id}', 'update');
        Route::delete('{id}', 'delete');
    });
});
