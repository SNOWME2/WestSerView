<?php

namespace App\Http\Controllers\Website;

use Carbon\Carbon;
use App\Models\Rooms;
use App\Models\Reservations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{

    //Reservation Website
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'room_id' => 'required|exists:rooms,room_id',
            'guest_id' => 'required|exists:guests,guest_id',
            'guest_name' => 'required',
            'guest_contact_or_email' => 'required',
            'room_type' => 'required|exists:rooms,room_type',
            'number_of_guest' => 'required|integer|min:1',
            'arrival_date' => 'required|date|after_or_equal:today',
            'arrival_time' => 'required|date_format:H:i',
            'departure_date' => 'required|date|after:arrival_date',
            'departure_time' => 'required|date_format:H:i',
            'special_requests' => 'nullable|string', // Changed to nullable
        ]);

        // Combine arrival date and time into a single datetime
        $arrivalDatetime = Carbon::createFromFormat('Y-m-d H:i', $request->arrival_date . ' ' . $request->arrival_time);

        // Combine departure date and time into a single datetime
        $departureDatetime = Carbon::createFromFormat('Y-m-d H:i', $request->departure_date . ' ' . $request->departure_time);

        // Log the request data
        Log::info('Reservation data: ', $request->all());

        // Create the reservation
        $reservation = Reservations::create([
            'room_id' => $request->room_id,
            'guest_id' => $request->guest_id,
            'guest_name' => $request->guest_name,
            'guest_contact_or_email' => $request->guest_contact_or_email,
            'reservation_type' => $request->room_type,
            'number_of_guest' => $request->number_of_guest,
            'reservation_start_date' => $arrivalDatetime,
            'reservation_end_date' => $departureDatetime,
            'special_requests' => $request->special_requests,
        ]);

        Rooms::where('room_id',$request->room_id)->update([
            'status'=>'Reserved',
        ]);

        // Check if the reservation was created successfully
        return redirect()->route('room-list')->with('status', 'Reservation Created');
    }

    public function showAllReservations()
    {
        $userID = Auth::guard('web')->user()->guest_id;

        // Debugging statement
        Log::info('User ID: ' . $userID);

        // Ensure paginate() is used directly on the query builder
        $reservations = Reservations::where('guest_id', $userID)->paginate(5);

        // Debugging statement
        Log::info('Reservations: ', $reservations->toArray());

        return view('sub_views (Website).Reservation_list', compact('reservations'));
    }
}