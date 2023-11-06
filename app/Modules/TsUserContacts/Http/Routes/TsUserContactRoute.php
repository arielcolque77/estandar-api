<?php

namespace App\Modules\TsUserContacts\Http\Routes;

use App\Modules\TsUserContacts\Http\Controllers\TsUserContactController;
use Illuminate\Support\Facades\Route;

Route::controller(TsUserContactController::class)->group(function () {
    Route::prefix('ts-user-contacts')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('{id}', 'show');
        Route::put('{id}', 'update');
        Route::delete('{id}', 'delete');
    });
});
