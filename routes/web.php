<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CarritoController;

// Pagina principal (con productos destacados)
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
Route::get('/forum', [PostController::class, 'index'])->name('forum');

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

// Panel del ADMIN 8)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Crear nueva publi
    Route::get('/admin/posts/create', [PostController::class, 'create'])->name('posts.create');

    // Guardar nueva publi
    Route::post('/admin/posts', [PostController::class, 'store'])->name('posts.store');
});

// Carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');

// Rutas de autenticacion
require __DIR__.'/auth.php';