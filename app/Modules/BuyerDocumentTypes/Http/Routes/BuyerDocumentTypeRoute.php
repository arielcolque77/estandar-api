<?php

namespace App\Modules\BuyerDocumentTypes\Http\Routes;

use App\Modules\BuyerDocumentTypes\Http\Controllers\BuyerDocumentTypeController;
use Illuminate\Support\Facades\Route;

Route::controller(BuyerDocumentTypeController::class)->group(function () {
    Route::prefix('buyer-document-types')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('{id}', 'show');
        Route::put('{id}', 'update');
        Route::delete('{id}', 'delete');
    });
});
