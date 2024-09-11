<?php

namespace App\Http\Controllers\Website;

use App\Models\Cart;
use App\Models\FOBList;
use App\Models\Reservations;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class FoodListController extends Controller
{
    public function foodlist($category = null)
    {
        // Check if a category is provided, otherwise fetch all items
        if ($category && $category !== 'all') {
            $fobs = FOBList::where('category', $category)->paginate(4);
            $message = 'Showing for '
                . ucfirst($category) . ' items';;
        } else {
            $fobs = FOBList::paginate(12);
            $message = 'Showing all items';
        }

        // Return the view with the filtered items and the message
        return view('sub_views (Website).food_drinks_list', compact('fobs', 'message'))->with('message', $message);
    }

    public function foodandbeveragesdetail($id)
    {
        try {
            // Decrypt the encrypted FOB ID
            $fobid = Crypt::decrypt($id);

            // Fetch the FOB using the decrypted FOB ID
            $fob = FOBList::find($fobid);

            // Ensure user is authenticated and retrieve reservations
            if (Auth::check()) {
                $userid = Auth::user()->guest_id; // Assuming guest_id is stored in Auth user

                // Fetch all reservations for the authenticated user
                $reservations = Reservations::where('guest_id', $userid)->get();
            } else {
                // Handle unauthenticated access
                return redirect()->route('frontpage')->withErrors('You must be logged in to view reservations.');
            }

            $data = [
                'fob' => $fob,
                'reservations' => $reservations, // Pass reservations to the view

            ];

            return view('sub_views (Website).food_drinks_order', $data);
        } catch (\Exception $e) {
            // Handle the exception if decryption fails
            return redirect()->route('frontpage')->withErrors('Invalid room identifier.');
        }
    }
}
