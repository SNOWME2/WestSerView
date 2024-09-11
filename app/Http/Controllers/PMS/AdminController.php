<?php

namespace App\Http\Controllers\PMS;

use App\Models\Rooms;
use App\Models\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //Add Employee
    public function add_employee(Request $request)
    {

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string',  'email', 'max:255', 'unique:staffs'],
            'password' => ['required'],
            'role' => ['required', 'string', 'max:255'],
        ]);

        Staff::create([
            'name' =>  $request->first_name . ' ' . $request->last_name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);


        // Redirect or respond as needed
        return redirect()->back()->with('success', 'Staff member added successfully.');
    }

    //Create Room
    public function create_room(Request $request)
    {

        $request->validate([
            'added_by' => ['required', 'exists:staffs,name'],
            'hotel_id' => ['required', 'exists:hotels,hotel_id'],
            'room_number' => ['required', 'string', 'unique:rooms,room_number'],
            'room_type' => ['required', 'string'],
            'room_price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'room_cap' => ['required', 'integer'],
        ]);

        Rooms::create([

            'hotel_id' => $request->hotel_id,
            'room_number' => $request->room_number,
            'room_type' => $request->room_type,
            'price' => $request->room_price,
            'capacity' => $request->room_cap,
            'added_by' => $request->added_by,
        ]);

        return redirect()->back()->with('success', 'Room added successfully.');
    }

    //Get Employeee List
    public function staff_list()
    {

        $staffs = Staff::get();
        return view('Dashboards.staffs.frontdesk.pages.staffList', compact('staffs'));
    }
    //Get Room List
    public function room_list()
    {
        // Fetch reservations for rooms belonging to the specific hotel
        $rooms = Rooms::with('Reservation');
        return view('Dashboards.staffs.frontdesk.pages.roomList', compact('rooms'));
    }

    //Get Room detail
    public function getRoomDetails($id)
    {
        $room = Rooms::find($id);

        if (!$room) {
            return response()->json(['error' => 'Room not found'], 404);
        }

        // Prepare additional data as needed
        $statusClass = match ($room->status) {
            'Available' => 'text-blue-500',
            'Maintenance' => 'text-gray-500',
            'Occupied' => 'text-red-500',
            'Dirty' => 'text-black',
            'Clean' => 'text-green-500',
            default => 'text-gray-500',
        };

        return response()->json([
            'room_number' => $room->room_number,
            'room_type' => $room->room_type,
            'status' => $room->status,
            'status_class' => $statusClass,
            'room_capacity' => $room->capacity,
            'room_price' => $room->price,
            'added_by' => $room->added_by
        ]);
    }
}