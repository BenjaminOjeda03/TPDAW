<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentaController;

Route::get('/', function () {
    return redirect()->route('clients.index');
});

Route::middleware(['auth'])->group(function () {

    // Clientes
    Route::resource('clients', ClientController::class);

    // Usuarios (solo admin)
    Route::resource('users', UserController::class)->middleware('admin');

    // Ventas (externas)
    Route::get('/clients/{client}/ventas', [VentaController::class, 'show'])->name('clients.ventas');
});

require __DIR__.'/auth.php';







/*Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';*/
