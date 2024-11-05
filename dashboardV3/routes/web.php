<?php

use App\Http\Controllers\MarcaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/marcas', [MarcaController::class, 'index'])->name('marcas.index');

Route::get('/login', function () {
    return view('login');
})->name('login');
