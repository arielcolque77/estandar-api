<?php

namespace App\Modules\Countries\Http\Routes;

use App\Modules\Countries\Http\Controllers\CountryController;
use Illuminate\Support\Facades\Route;

Route::controller(CountryController::class)->group(function () {
    Route::prefix('countries')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('{id}', 'show');
        Route::put('{id}', 'update');
        Route::delete('{id}', 'delete');
    });
});
