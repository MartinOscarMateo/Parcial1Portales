<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;

// Pagina principal con productos destacados
Route::get('/', [HomeController::class, 'index'])->name('home');

// Productos (listado)
Route::get('/products', [ProductController::class, 'index'])->name('products');

// Detalle individual del producto
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.detail');

// Pagina de contacto
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Foro de novedades
Route::get('/forum', function () {
    return view('forum');
})->name('forum');

// Panel de usuario (solo si esta autenticado)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Perfil de usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas de autenticacion
require __DIR__.'/auth.php';
