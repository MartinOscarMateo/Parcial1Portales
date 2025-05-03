<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CarritoController;

// Paina principal 
Route::get('/', [HomeController::class, 'index'])->name('home');

// Productos 
Route::get('/products', [ProductController::class, 'index'])->name('products');

// Detallel del producto
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.detail');

// Paina de contacto
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Nldades
Route::get('/forum', [PostController::class, 'index'])->name('forum');

// Carrito de compras
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'add'])->name('carrito.add');  // Esta ruta es la que usa el formulario
Route::post('/carrito/eliminar/{id}', [CarritoController::class, 'remove'])->name('carrito.remove');
Route::post('/carrito/vaciar', [CarritoController::class, 'clear'])->name('carrito.clear');
Route::post('/carrito/update/{id}', [CarritoController::class, 'updateQuantity'])->name('carrito.updateQuantity');

// Panel de usuario (solo si está autenticado)
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

<<<<<<< HEAD
// Panel del ADMIN
=======



// Panel del ADMIN 8)
>>>>>>> a4592f3a144eb5577aab09b7dfa3c0150bc7fe62
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

<<<<<<< HEAD
    Route::get('/admin/posts/create', [PostController::class, 'create'])->name('posts.create');
=======
    // Ver publis
    Route::get('/admin/posts', [PostController::class, 'adminIndex'])->name('posts.index');
>>>>>>> a4592f3a144eb5577aab09b7dfa3c0150bc7fe62

    Route::post('/admin/posts', [PostController::class, 'store'])->name('posts.store');

    // Actualizar publi existente 
    Route::put('/admin/posts/{id}', [PostController::class, 'update'])->name('posts.update');

    // Eliminar publi
    Route::delete('/admin/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
});

<<<<<<< HEAD
require __DIR__.'/auth.php';
=======



// Carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');

// Rutas de autenticacion
require __DIR__.'/auth.php';
>>>>>>> a4592f3a144eb5577aab09b7dfa3c0150bc7fe62
