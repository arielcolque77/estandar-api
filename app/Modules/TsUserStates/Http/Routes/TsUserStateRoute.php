<?php

namespace App\Modules\TsUserStates\Http\Routes;

use App\Modules\TsUserStates\Http\Controllers\TsUserStateController;
use Illuminate\Support\Facades\Route;

Route::controller(TsUserStateController::class)->group(function () {
    Route::prefix('ts-user-states')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('{id}', 'show');
        Route::put('{id}', 'update');
        Route::delete('{id}', 'delete');
    });
});
