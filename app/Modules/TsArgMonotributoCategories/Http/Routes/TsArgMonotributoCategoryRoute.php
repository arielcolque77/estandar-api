<?php

namespace App\Modules\TsArgMonotributoCategories\Http\Routes;

use App\Modules\TsArgMonotributoCategories\Http\Controllers\TsArgMonotributoCategoryController;
use Illuminate\Support\Facades\Route;

Route::controller(TsArgMonotributoCategoryController::class)->group(function () {
    Route::prefix('ts-arg-monotributo-categories')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('{id}', 'show');
        Route::put('{id}', 'update');
        Route::delete('{id}', 'delete');
    });
});
