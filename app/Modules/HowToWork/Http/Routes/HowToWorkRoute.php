<?php

namespace App\Modules\HowToWork\Http\Routes;

use App\Modules\HowToWork\Http\Controllers\HowToWorkController;
use Illuminate\Support\Facades\Route;

Route::controller(HowToWorkController::class)->group(function () {
    Route::prefix('how-to-work')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('{id}', 'show');
        Route::put('{id}', 'update');
        Route::delete('{id}', 'delete');
    });
});
