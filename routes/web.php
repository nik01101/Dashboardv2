<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetalleVentaController;
use App\Http\Controllers\MarcaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/detalles-venta', [DetalleVentaController::class, 'index'])->name('detalles.index');

Route::get('/marcas', [MarcaController::class, 'index'])->name('marcas.index');

Route::get('/detalles-vtaprdo', [DetalleVentaController::class, 'vtaprdo'])->name('detalles.vtaprdo');

Route::get('/detalles-stckmrca', [DetalleVentaController::class, 'stckmrca'])->name('detalles.stckmrca');
