<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/art-items', [ArtworkController::class, 'index'])->name('artworks.index');
Route::get('/artworks/{artwork}', [ArtworkController::class, 'show'])->name('artworks.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('home');
    })->name('dashboard');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('/order/place', [OrderController::class, 'placeOrder'])->name('order.place');
    Route::get('/payment', [OrderController::class, 'payment'])->name('payment');
    Route::post('/payment/process', [OrderController::class, 'processPayment'])->name('payment.process');
    Route::get('/payment/success/{order}', [OrderController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');

    // Admin Routes
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::resource('artworks', \App\Http\Controllers\Admin\ArtworkController::class);
        Route::get('/users', [AdminDashboardController::class, 'users'])->name('users');
        Route::delete('/users/{user}', [AdminDashboardController::class, 'destroy'])->name('users.destroy');
        Route::get('/orders', [AdminDashboardController::class, 'orders'])->name('orders');
        Route::get('/carts', [AdminDashboardController::class, 'carts'])->name('carts');
    });
});
