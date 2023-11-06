<?php

namespace App\Modules\TsUserContactTypes\Http\Routes;

use App\Modules\TsUserContactTypes\Http\Controllers\TsUserContactTypeController;
use Illuminate\Support\Facades\Route;

Route::controller(TsUserContactTypeController::class)->group(function () {
    Route::prefix('ts-user-contact-types')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('{id}', 'show');
        Route::put('{id}', 'update');
        Route::delete('{id}', 'delete');
    });
});
