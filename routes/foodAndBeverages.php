<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PMS\FOBController;
use App\Http\Controllers\PMS\Auth\AuthController;

Route::middleware('auth:staff', 'fob', 'Prevent_Backdoor')->group(function () {
    //Dashboard
    Route::get('/fob/dashboard', [FOBController::class, 'FOB_view'])->name('PMS.food&beverages');

    //Food and Beverages List

    Route::get('/fob/food_list', [FOBController::class, 'foodAndBeveragesList'])->name('food_beverages_list.FOB');
});
