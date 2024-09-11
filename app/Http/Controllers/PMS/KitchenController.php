<?php

namespace App\Http\Controllers\PMS;

use App\Models\Rooms;
use App\Models\Work_Order;
use App\Models\Reservations;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class KitchenController extends Controller
{
    public function createWorkOrders(Request $request)
    {
        $request->validate([
            'hotel_id' => ['required', 'exists:hotels,hotel_id'],
            // 'staff_id' => ['required', 'exists:staffs, staff_id'],
            'room_id' => ['required', 'exists:rooms,room_id'],
            'work_name' => ['required'],
            'work_desc' => ['required'],
            'work_type' => ['required'],
        ]);

        Work_Order::create([
            'hotel_id' =>  $request->hotel_id,
            // 'staff_id' => $request->staff_id,
            'room_id' =>   $request->room_id,
            'work_name' => $request->work_name,
            'work_desc' => $request->work_desc,
            'work_type' => $request->work_type,

        ]);

        return redirect()->back()->with('success', 'Room added successfully.');
    }
    public function getWorkOrders()
    {
        $hotelId = Auth::guard('staff')->user()->hotel_id;

        $workOrderList = Work_Order::whereHas('hotel', function ($query) use ($hotelId) {
            $query->where('hotel_id', $hotelId);
        })->with('room')->with('staff')->orderBy('workOrder_id', 'desc')->get();


        $reservations = Reservations::whereHas('Rooms', function ($query) use ($hotelId) {
            $query->where('hotel_id', $hotelId);
        })->with('Guests', 'Rooms.hotel')->get();

        $reservedRoomIds = $reservations->pluck('room_id')->toArray();
        $workOrderListIds = $workOrderList->pluck('room_id')->toArray();

        $rooms = Rooms::whereHas('hotel', function ($query) use ($hotelId) {
            $query->where('hotel_id', $hotelId);
        })->with('workOrder')->whereNotIn('room_id', $workOrderListIds)->with('hotel')->whereNotIn('room_id', $reservedRoomIds)->get();


        return view('Dashboards.staffs.frontdesk.pages.workOrderList', compact('workOrderList', 'rooms'));
    }
}