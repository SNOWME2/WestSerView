<?php

namespace App\Http\Controllers\PMS;


use Carbon\Carbon;
use App\Models\Rooms;
use App\Models\Staff;
use App\Models\Work_Order;
use App\Models\Reservations;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FrontDeskController extends Controller
{

    //Dashboard View
    public function view()
    {
        return view('sub_views (PMS).pages.Front Desk.Dashboard');
    }

    //Staff List View
    public function staff_list()
    {


        // Get the role of the currently authenticated staff member
        $userRole = Auth::guard('staff')->user()->role;

        // Fetch staff members with the same role as the authenticated user
        $staffs = Staff::where('role', $userRole)->get();

        // Return the view with the staff data

        return response()->json($staffs);
    }

    public function staffs()
    {

        return view('sub_views (PMS).pages.Front Desk.users_list');
    }

    //Reservation Fetch
    public function list_reservation()
    {
        $reservations = Reservations::with('Rooms', 'Guests')->orderBy('created_at', 'desc')->get();
        return response()->json($reservations);
    }
    //Reservation list view
    public function reservation()
    {
        // Fetch reservations with related rooms and guests
        $reservations = Reservations::with('Rooms', 'Guests')->get();

        // Extract the IDs of reserved rooms
        $reservedRoomIds = $reservations->pluck('room_id')->toArray();

        // Fetch rooms that are not reserved
        $rooms = Rooms::whereNotIn('room_id', $reservedRoomIds)->get();

        // Return the view with the filtered list of rooms
        return view('sub_views (PMS).pages.Front Desk.reservation_list', compact('rooms'));
    }

    //Room List View
    public function room_list()
    {
        // Fetch reservations for rooms belonging to the specific hotel
        $rooms = Rooms::with('Reservation')->paginate(12);
        return view('sub_views (PMS).pages.Front Desk.room_list', compact('rooms'));
    }

    //Create On-site Reservation
    //Create On-site Reservation
    public function create_reservation(Request $request)
    {
        $request->validate([
            'added_by' => ['required', 'exists:staffs,name'],
            'reservation_for' => ['required', 'string'],
            'guest_contact' => ['required', 'string'],
            'room_type' => ['required', 'string'], // Assuming room_type is a string field
            'room_cap' => ['required', 'integer'],
            'checkin' => ['required', 'date', 'after_or_equal:today'],
            'checkin_time' => ['required', 'date_format:H:i'],
            'checkout' => ['required', 'date', 'after:checkin'],
            'checkout_time' => ['required', 'date_format:H:i'],
            'mode_of_reservation' => ['required', 'in:Online,On-site'], // Corrected validation
            'special_requests' => ['nullable', 'string'],
        ]);

        Rooms::where('room_id', $request->room_type)->update([
'status'=>'Reserved',
        ]);

        // Combine check-in date and time into a single datetime
        $arrivalDatetime = Carbon::createFromFormat('Y-m-d H:i', $request->checkin . ' ' . $request->checkin_time);

        // Combine check-out date and time into a single datetime
        $departureDatetime = Carbon::createFromFormat('Y-m-d H:i', $request->checkout . ' ' . $request->checkout_time);

        Reservations::create([
            'added_by' => $request->added_by,
            'room_id' => $request->room_type, // Ensure this is correctly related to room_id
            'guest_name' => $request->reservation_for,
            'guest_contact_or_email' => $request->guest_contact,
            'number_of_guest' => $request->room_cap,
            'reservation_start_date' => $arrivalDatetime,
            'reservation_end_date' => $departureDatetime,
            'mode_of_reservation' => $request->mode_of_reservation,
            'special_requests' => $request->special_requests,
        ]);
        if ($request) {
            return redirect()->back()->with('success', 'Reservation added successfully.');
        } else {
            return redirect()->back()->with('error', 'Reservation unsuccessfully added.');
        }
    }

    //Get Reservation Details
    public function getReservationDetails($revid)
    {
        $reservation = Reservations::with('Guests', 'Rooms')->find($revid);

        if (!$reservation) {
            return response()->json(['error' => 'Room not found'], 404);
        }

        // Prepare additional data as needed

        return response()->json([
            'rev_id' => $reservation->reservation_id,
            'guest_name' => $reservation->guest_name ?? 'N/A',
            'guest_email' => $reservation->guest_contact_or_email ?? 'N/A',
            'guest_phone' => $reservation->Guests->phone ?? 'N/A',
            'room_type' => $reservation->Rooms->room_type ?? 'N/A',
            'room_number' => $reservation->Rooms->room_number ?? 'N/A',
            'reservation_start_date' => $reservation->reservation_start_date,
            'reservation_end_date' => $reservation->reservation_end_date,
            'number_of_guest' => $reservation->number_of_guest,
            'status' => $reservation->status ?? 'N/A',
        ]);
    }
    //Update reservation status
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Cancelled,Arrived,Departed',
        ]);

        $reservation = Reservations::find($id);

        if (!$reservation) {
            return response()->json(['success' => false, 'message' => 'Reservation not found'], 404);
        }

        $reservation->status = $request->status;

        $roomId=$reservation->room_id;

        $room=Rooms::where('room_id',$roomId);

        if($reservation->status == "Departed"){
       
            $room->update([
                'status'=>'Available'
            ]);
            
          
        } else if($reservation->status == "Arrived"){
            $room->update([
                'status'=>'Reserved'
            ]);
   
          
        }else if($reservation->status == "Cancelled"){
            $room->update([
                'status'=>'Available'
            ]);
   
          
        }

        $reservation->save();

        return response()->json(['success' => true]);
    }
}