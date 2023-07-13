<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DivisionController;

Route::middleware(['auth:sanctum'])
    ->prefix('division')
    ->group(function () {

        Route::get('/check', function () {
            return 'ok';
        });

        Route::get('', [DivisionController::class, 'index'])
            ->name('index');

        Route::post('', [DivisionController::class, 'store'])
            ->name('store');

        Route::put('/{divisionID}', [DivisionController::class, 'update'])
            ->name('update')
            ->where('divisionID', '[0-9]+');

        Route::delete('/{divisionID}', [DivisionController::class, 'destroy'])
            ->name('destroy')
            ->where('divisionID', '[0-9]+');

        Route::post('/ascender/{equipoID}', [DivisionController::class, 'ascender'])
        ->name('ascender')
        ->where('equipoID', '[0-9]+');

        Route::post('/descender/{equipoID}', [DivisionController::class, 'descender'])
        ->name('descender')
        ->where('equipoID', '[0-9]+');

    });
