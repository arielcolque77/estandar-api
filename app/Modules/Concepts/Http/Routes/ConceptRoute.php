<?php

namespace App\Modules\Concepts\Http\Routes;

use App\Modules\Concepts\Http\Controllers\ConceptController;
use Illuminate\Support\Facades\Route;

Route::controller(ConceptController::class)->group(function () {
    Route::prefix('concepts')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('{id}', 'show');
        Route::put('{id}', 'update');
        Route::delete('{id}', 'delete');
    });
});
