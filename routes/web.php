<?php

use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\SugerenciaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Página principal redirige a artículos
Route::get('/', function () {
    return redirect()->route('articulos.index');
});

// Rutas de Artículos
Route::resource('articulos', ArticuloController::class);

// Rutas de Sugerencias
Route::resource('sugerencias', SugerenciaController::class);

// Rutas de Autenticación
Route::middleware('guest')->group(function () {
    Route::get('register', [UserController::class, 'create'])->name('register');
    Route::post('register', [UserController::class, 'store']);
    Route::get('login', [UserController::class, 'showLoginForm'])->name('login');
    Route::post('login', [UserController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [UserController::class, 'logout'])->name('logout');
});

// Rutas de Usuarios (perfil)
Route::resource('users', UserController::class)->except(['create', 'store']);
