<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;
use Database\Seeders\EquipoSeeder;

Route::middleware(['auth:sanctum'])
    ->prefix('equipo')
    ->group(function () {

        Route::get('/check', function() { return 'ok'; });

        Route::get('', [EquipoController::class, 'index'])
            ->name('index');

                //ruta para traerte el equipo con el id que le pases
        Route::get('/{equipoID}', [EquipoController::class, 'show']);

        Route::post('', [EquipoController::class, 'store'])
            ->name('store');

        Route::put('/{equipoID}', [EquipoController::class, 'update'])
            ->name('update')
            ->where('equipoID', '[0-9]+');

        Route::delete('/{equipoID}', [EquipoController::class, 'destroy'])
            ->name('destroy')
            ->where('equipoID', '[0-9]+');

        Route::post('/{equipoID}/fichar/{futbolistaID}', [EquipoController::class, 'fichar'])
            ->name('fichar')
            ->where('futbolistaID', '[0-9]+')
            ->where('equipoID', '[0-9]+');

        Route::post('{equipoID}/expulsar/{futbolistaID}', [EquipoController::class, 'expulsar'])
            ->name('expulsar')
            ->where('futbolistaID', '[0-9]+')
            ->where('equipoID', '[0-9]+');
    });