<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MarcaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/data', [MarcaController::class, 'getData']);

Route::post('/login', [AuthController::class, 'login']);

Route::post('/register', [AuthController::class, 'register']);
