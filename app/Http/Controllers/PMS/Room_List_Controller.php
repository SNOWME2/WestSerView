<?php

namespace App\Http\Controllers\PMS;

use App\Models\Rooms;
use App\Models\Reservations;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class Room_List_Controller extends Controller
{
    //Show Room List Website
    public function room_list()
    {
        $reservations = Reservations::with('Rooms')->get();


        $reservedRoomIds = $reservations->pluck('room_id')->toArray();
        $rooms = Rooms::whereNotIn('room_id', $reservedRoomIds)->paginate(8);
        return view('sub_views (Website).room_list', compact('rooms', 'reservations'));
    }



    //Show Room Detail+Reservation Website
    public function show_room($encryptedRoomId)
    {
        try {
            // Decrypt the encrypted room ID
            $roomId = Crypt::decrypt($encryptedRoomId);

            // Fetch the room using the decrypted room ID
            $room = Rooms::find($roomId);

            $user = Auth::user();

            $data = [
                'room' => $room,
                'user' => $user,
            ];

            return view('sub_views (Website).reservation', $data);
        } catch (\Exception $e) {
            // Handle the exception if decryption fails
            return redirect()->route('frontpage')->withErrors('Invalid room identifier.');
        }
    }
}