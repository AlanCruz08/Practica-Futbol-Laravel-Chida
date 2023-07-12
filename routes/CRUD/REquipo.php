<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;

Route::middleware(['auth:sanctum'])
    ->prefix('equipo')
    ->group(function () {

        Route::get('/check', function() { return 'ok'; });

        Route::get('', [EquipoController::class, 'index'])
            ->name('index');

        Route::post('', [EquipoController::class, 'store'])
            ->name('store');

        Route::put('/{equipoID}', [EquipoController::class, 'update'])
            ->name('update')
            ->where('equipoID', '[0-9]+');

        Route::delete('/{equipoID}', [EquipoController::class, 'destroy'])
            ->name('destroy')
            ->where('equipoID', '[0-9]+');
    });