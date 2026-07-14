<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Rutas estaticas de /productos/* van antes que cualquier {product:slug} para
// que no puedan ser interpretadas como un slug (ej. "buscar").
Route::get('/productos', [ProductController::class, 'index'])->name('products.index');
Route::get('/productos/buscar', [ProductController::class, 'search'])->name('products.search');
Route::get('/productos/{product:slug}/quick-view', [ProductController::class, 'quickView'])
    ->name('products.quick-view');

Route::get('/carrito', [CartController::class, 'index'])->name('cart.index');

Route::middleware('throttle:30,1')->group(function () {
    Route::post('/carrito/agregar', [CartController::class, 'store'])->name('cart.store');
    Route::patch('/carrito/items/{cartItem}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/carrito/items/{cartItem}', [CartController::class, 'destroy'])->name('cart.destroy');
});

Route::post('/carrito/checkout', [CartController::class, 'checkout'])
    ->middleware('throttle:10,1')
    ->name('cart.checkout');

Route::get('/pedidos/{order:public_token}', [OrderController::class, 'show'])->name('orders.show');
