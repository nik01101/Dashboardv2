<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConsolidadoDiarioVenController;
use App\Http\Controllers\MarcaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetalleVentaController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/data', [MarcaController::class, 'getData']);

Route::post('/login', [AuthController::class, 'login']);

Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->get('/detalles-venta', [DetalleVentaController::class, 'getDetallesVenta'])->name('api.detalles');

Route::middleware('auth:sanctum')->get('/Consolidado-Diario', [ConsolidadoDiarioVenController::class, 'getConsolidadoDiarioVen'])->name('api.consolidado');

Route::middleware('auth:sanctum')->get('/detalles-vtaprdo', [DetalleVentaController::class, 'getDetallesVtaprdo'])->name('api.vtaprdo');

Route::middleware('auth:sanctum')->get('/graficoventasdiarias', [DetalleVentaController::class, 'getGraficoDiario'])->name('api.graficovendiarias');

Route::middleware('auth:sanctum')->get('/detalles-stckmrca', [DetalleVentaController::class, 'getStock'])->name('api.getStock');

Route::middleware('auth:sanctum')->get('/graficoevolutivoDia', [DetalleVentaController::class, 'GraficoEvolutivoDiario'])->name('api.getEvolutivoDia');

Route::middleware('auth:sanctum')->get('/graficoevolutivoPeriodo', [DetalleVentaController::class, 'GraficoEvolutivoPeriodo'])->name('api.getEvolutivoPeriodo');
