<?php

namespace App\Modules\TsArgUsers\Http\Routes;

use App\Modules\TsArgUsers\Http\Controllers\TsArgUserController;
use Illuminate\Support\Facades\Route;

Route::controller(TsArgUserController::class)->group(function () {
    Route::prefix('ts-arg-users')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('{id}', 'show');
        Route::put('{id}', 'update');
        Route::delete('{id}', 'delete');
    });
});
