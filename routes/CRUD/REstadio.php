<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstadioController;

Route::/*middleware(['auth:sanctum'])
    ->*/prefix('estadio')
    ->group(function () {

        Route::get('/check', function() { return 'ok'; });

        Route::get('', [EstadioController::class, 'index'])
            ->name('index');

         //ruta para traerte el equipo con el id que le pases
        Route::get('/{estadioID}', [EstadioController::class, 'show']);


        Route::post('', [EstadioController::class, 'store'])
            ->name('store');

        Route::put('/{estadioID}', [EstadioController::class, 'update'])
            ->name('update')
            ->where('estadioID', '[0-9]+');

        Route::delete('/{estadioID}', [EstadioController::class, 'destroy'])
            ->name('destroy')
            ->where('estadioID', '[0-9]+');
    });