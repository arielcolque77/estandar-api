<?php

namespace App\Modules\DeregistrationReasons\Http\Routes;

use App\Modules\DeregistrationReasons\Http\Controllers\DeregistrationReasonController;
use Illuminate\Support\Facades\Route;

Route::controller(DeregistrationReasonController::class)->group(function () {
    Route::prefix('deregistration-reasons')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('{id}', 'show');
        Route::put('{id}', 'update');
        Route::delete('{id}', 'delete');
    });
});
