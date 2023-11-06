<?php

namespace App\Modules\TsActivities\Http\Routes;

use App\Modules\TsActivities\Http\Controllers\TsActivityController;
use Illuminate\Support\Facades\Route;

Route::controller(TsActivityController::class)->group(function () {
    Route::prefix('ts-activities')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('{id}', 'show');
        Route::put('{id}', 'update');
        Route::delete('{id}', 'delete');
    });
});
