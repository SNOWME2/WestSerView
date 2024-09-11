<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PMS\Auth\AuthController;
use App\Http\Controllers\PMS\Room_List_Controller;
//Front Page (Website)
Route::get('/', function () {
    return view('sub_views (Website).frontpage
    ');
})->name('frontpage');





//Staff Authentication
Route::middleware('guest:staff')->group(function () {
    // Login View
    Route::get('/staff/login', [AuthController::class, 'create'])->name('login.staff');

    // Login
    Route::post('staff/login', [AuthController::class, 'store']);
});

//Staff Logout
Route::POST('/frontdesk/logout', [AuthController::class, 'destroy'])->middleware('auth:staff', 'Prevent_Backdoor')->name('staff.logout');




require __DIR__ . '/guest.php';
require __DIR__ . '/frontDesk.php';
require __DIR__ . '/foodAndBeverages.php';
require __DIR__ . '/cart.php';