<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PMS\CartController;
use App\Http\Controllers\PMS\Auth\AuthController;
use App\Http\Controllers\PMS\FrontDeskController;




// PMS View (FrontDesk)
Route::middleware('auth:staff', 'frontdesk', 'Prevent_Backdoor')->group(function () {
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
    Route::post('frontdesk/addEmployee', [FrontDeskController::class, 'add_employee'])->name('add_employe.frontdesk');


    Route::view('/frontdesk/order_list', 'sub_views (PMS).pages.Front Desk.order_list')->name('frontdesk.orderlist');
    Route::get('/api/orderlist', [CartController::class, 'showOrderList']);


    Route::get('frontdesk/roomlist',[FrontDeskController::class, 'room_list'])->name('frontdesk.room_list');

    Route::get('frontdesk/roomlist/single',[FrontDeskController::class,'single'])->name('frondesk.roomlist.single');
});