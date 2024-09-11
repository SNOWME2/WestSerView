<?php

use App\Http\Controllers\PMS\CartController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth', 'Prevent_Backdoor')->group(function () {
    Route::post('/cart_add', [CartController::class, 'addToCart'])->name('add.cart');

    Route::get('/cart/all', [CartController::class, 'showAllFoodList'])->name('all.cart');

    Route::get('/cart/{id}', [CartController::class, 'showFoodcartweb'])->name('show.cart');

    Route::post('/cart/confirm-all/{reservation_id}', [CartController::class, 'confirmAll'])->name('cart.confirmAll');
    Route::delete('/cart/delete-selected/{reservation_id}', [CartController::class, 'deleteSelected'])->name('cart.deleteSelected');

    Route::delete('/cart/delete/{id}', [CartController::class, 'deleteCartItem'])->name('cart.delete');


    
});