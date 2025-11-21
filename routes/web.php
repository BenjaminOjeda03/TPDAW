<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\VentasController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';


// ✅ RUTA CORRECTA PARA VER TODAS LAS VENTAS
Route::get('/ventas', [VentasController::class, 'index'])->name('ventas.index');


// CRUD CLIENTES
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');  
Route::get('/clientes', [ClientController::class, 'index'])->name('clientes.index');

//CRUD USER
Route::resource('users', \App\Http\Controllers\UserController::class);
Route::resource('/usarios', \App\Http\Controllers\UserController::class);