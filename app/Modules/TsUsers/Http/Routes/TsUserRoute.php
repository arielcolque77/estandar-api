<?php

namespace App\Modules\TsUsers\Http\Routes;

use App\Modules\TsUsers\Http\Controllers\TsUserController;
use Illuminate\Support\Facades\Route;

Route::controller(TsUserController::class)->group(function () {
    Route::prefix('ts-users')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('{id}', 'show');
        Route::put('{id}', 'update');
        Route::delete('{id}', 'delete');
    });
});
