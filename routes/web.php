<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;

// Pag principal
Route::get('/', [HomeController::class, 'index'])->name('home');

// Productos
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.detail');

// Contacto
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Foro novedades
Route::get('/forum', [PostController::class, 'index'])->name('forum');

// Carrito compra
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'add'])->name('carrito.add');
Route::put('/carrito/eliminar/{key}', [CarritoController::class, 'remove'])->name('carrito.remove');
Route::post('/carrito/vaciar', [CarritoController::class, 'clear'])->name('carrito.clear');
Route::put('/carrito/update/{key}', [CarritoController::class, 'updateQuantity'])->name('carrito.updateQuantity');

// Checkout y finalizar compra
Route::get('/carrito/checkout', [CarritoController::class, 'checkout'])->name('carrito.checkout');
Route::post('/carrito/finalizar', [CarritoController::class, 'finalizar'])->name('carrito.finalizar');


// Panel usuario
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});

// Perfil usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Panel ADMIN el mas capo :3
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/posts', [PostController::class, 'adminIndex'])->name('posts.index');
    Route::get('/admin/posts/create', [PostController::class, 'create'])->name('posts.create');
    route::get('admin/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::post('/admin/posts', [PostController::class, 'store'])->name('posts.store');
    Route::put('/admin/posts/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/admin/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

    Route::get('admin/users', [UserController::class, 'index'])->name('users.index');
    Route::get('admin/users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('admin/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('admin/users', [UserController::class, 'store'])->name('users.store');
    Route::put('admin/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('admin/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/admin/products', [ProductController::class, 'adminIndex'])->name('products.index');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::post('/admin/products', [ProductController::class, 'store'])->name('products.store');
    Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

    Route::get('/admin/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::delete('/admin/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');

});


require __DIR__.'/auth.php';
