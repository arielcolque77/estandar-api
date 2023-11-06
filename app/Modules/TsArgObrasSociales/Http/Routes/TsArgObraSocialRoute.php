<?php

namespace App\Modules\TsArgObrasSociales\Http\Routes;

use App\Modules\TsArgObrasSociales\Http\Controllers\TsArgObraSocialController;
use Illuminate\Support\Facades\Route;

Route::controller(TsArgObraSocialController::class)->group(function () {
    Route::prefix('ts-arg-obrassociales')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('{id}', 'show');
        Route::put('{id}', 'update');
        Route::delete('{id}', 'delete');
    });
});
