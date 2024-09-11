<?php

use App\Http\Controllers\PMS\FrontDeskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PMS\Auth\AuthController;


Route::middleware('guest:staff')->group(function () {
    // Login View
    Route::get('/staff/login', [AuthController::class, 'create'])->name('login.staff');

    // Login
    Route::post('staff/login', [AuthController::class, 'store']);
});


// PMS View (FrontDesk)
Route::middleware('auth:staff', 'auth', 'Prevent_Backdoor')->group(function () {
    //FrontDesk Dashboard
    Route::get('/frontdesk/dashboard', [FrontDeskController::class, 'view'])->name('PMS.frontdesk');



    //Front Desk Reservation List
    //Reservation Fetch Data
    Route::get('/api/reservations', [FrontDeskController::class, 'list_reservation']);
    //Reservation Rendering
    Route::get('/frontdesk/reservationlist', [FrontDeskController::class, 'reservation'])->name('frontdesk.reservations');
    //Reservation Detail
    Route::get('/api/get-reservation-detail/{revid}', [FrontDeskController::class, 'getReservationDetails']);
    //Update Reservation Status
    Route::patch('/update-reservation-status/{id}', [FrontDeskController::class, 'updateStatus'])
        ->name('reservation.updateStatus');
    //Front Desk Reservation Create
    Route::post('frontdesk/reservation/create', [FrontDeskController::class, 'create_reservation'])->name('reservation.create.frontdesk');


    //FrontDesk Staff List
    Route::get('/api/stafflist', [FrontDeskController::class, 'staff_list']);
    Route::get('/frontdesk/stafflist', [FrontDeskController::class, 'staffs'])->name('frontdesk.stafflist');

    //Front Desk Add Staff
    Route::post('staff/frontdesk/addEmployee', [FrontDeskController::class, 'add_employee'])->name('add_employe.frontdesk');
});


//Logout
Route::POST('/frontdesk/logout', [AuthController::class, 'destroy'])->middleware('auth:staff', 'Prevent_Backdoor')->name('staff.logout');
