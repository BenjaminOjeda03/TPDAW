<?php

   use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::get('/clientes/{id}/ventas', [ClienteController::class, 'verVentas'])
     ->name('clientes.ventas');
     
Route::get('/clientes', [ClientController::class, 'index'])->name('clientes.index');
Route::get('/clientes/{id}/ventas', [ClientController::class, 'verVentas'])->name('clientes.ventas');
Route::get('/ventas', [App\Http\Controllers\VentasController::class, 'index']);