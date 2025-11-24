<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\UserController;

Route::view('/', 'welcome');
Route::middleware('auth')->group(function () {
    Route::resource('users', UserController::class);
});
// Rutas protegidas por login
Route::middleware(['auth', 'verified'])->group(function () {

    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('profile', 'profile')->name('profile');


    
    // Clientes
    Route::resource('clients', ClientController::class);

    // Usuarios
    Route::resource('users', UserController::class);

    // Ventas
    Route::get('/ventas', [VentasController::class, 'index'])->name('ventas.index');
});


// Importa login, registro y authentications
require __DIR__.'/auth.php';
