<?php

namespace App\Modules\Residences\Http\Routes;

use App\Modules\Residences\Http\Controllers\ResidenceController;
use Illuminate\Support\Facades\Route;

Route::controller(ResidenceController::class)->group(function () {
    Route::prefix('residences')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('{id}', 'show');
        Route::put('{id}', 'update');
        Route::delete('{id}', 'delete');
    });
});
