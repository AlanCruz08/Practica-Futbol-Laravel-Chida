<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/check', function() { return 'ok'; });
Route::post('/login', [loginController::class, 'login']);
Route::post('/register', [loginController::class, 'register']);
Route::post('/logout', [loginController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/validate', [LoginController::class, 'validar']);