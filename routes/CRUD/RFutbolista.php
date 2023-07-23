<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FutbolistaController;


Route::middleware(['auth:sanctum'])
    ->
    prefix('futbolista')
    ->group(function () {

        Route::get('/check', function () { return 'ok'; });

        Route::get('', [FutbolistaController::class, 'index'])
            ->name('index');

        Route::post('', [FutbolistaController::class, 'store'])
            ->name('store');

        Route::put('/{futbolistaID}', [FutbolistaController::class, 'update'])
            ->name('update')
            ->where('futbolistaID', '[0-9]+');

        Route::delete('/{futbolistaID}', [FutbolistaController::class, 'destroy'])
            ->name('destroy')
            ->where('futbolistaID', '[0-9]+');
    });
