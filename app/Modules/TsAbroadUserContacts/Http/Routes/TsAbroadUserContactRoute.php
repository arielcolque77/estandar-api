<?php

namespace App\Modules\TsAbroadUserContacts\Http\Routes;

use App\Modules\TsAbroadUserContacts\Http\Controllers\TsAbroadUserContactController;
use Illuminate\Support\Facades\Route;

Route::controller(TsAbroadUserContactController::class)->group(function () {
    Route::prefix('ts-abroad-user-contacts')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('{id}', 'show');
        Route::put('{id}', 'update');
        Route::delete('{id}', 'delete');
    });
});
