<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PMS\POSController;

Route::get('/pos/checkout/{reservation_id}', [POSController::class, 'checkout'])->name('pos.checkout');
Route::get('/pos/report/{type}', [POSController::class, 'generateReport'])->name('pos.report');