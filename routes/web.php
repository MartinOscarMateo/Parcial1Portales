<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\UserController;

// Página principal
Route::get('/', [HomeController::class, 'index'])->name('home');

// Productos
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.detail');

// Contacto
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Foro de novedades
Route::get('/forum', [PostController::class, 'index'])->name('forum');

// Carrito de compras
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'add'])->name('carrito.add');
Route::post('/carrito/eliminar/{id}', [CarritoController::class, 'remove'])->name('carrito.remove');
Route::post('/carrito/vaciar', [CarritoController::class, 'clear'])->name('carrito.clear');
Route::post('/carrito/update/{id}', [CarritoController::class, 'updateQuantity'])->name('carrito.updateQuantity');

// Panel de usuario
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});

// Perfil de usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Panel del ADMIN
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/posts', [PostController::class, 'adminIndex'])->name('posts.index');
    Route::post('/admin/posts', [PostController::class, 'store'])->name('posts.store');
    Route::put('/admin/posts/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/admin/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

    Route::get('admin/users', [UserController::class, 'index'])->name('users.index');
    Route::post('admin/users', [UserController::class, 'store'])->name('users.store');
    Route::put('admin/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('admin/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

});

// Rutas de autenticación
require __DIR__.'/auth.php';
