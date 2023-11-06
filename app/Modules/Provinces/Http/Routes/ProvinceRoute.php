<?php

namespace App\Modules\Provinces\Http\Routes;

use App\Modules\Provinces\Http\Controllers\ProvinceController;
use Illuminate\Support\Facades\Route;

Route::controller(ProvinceController::class)->group(function () {
    Route::prefix('provinces')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('{id}', 'show');
        Route::put('{id}', 'update');
        Route::delete('{id}', 'delete');
    });
});
