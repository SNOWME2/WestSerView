<?php

namespace App\Http\Controllers\PMS;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\FOBList;
use App\Models\Reservations;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller


{

    // Display all item order PMS
    public function showOrderList()
    {
        $cartItems = Cart::with('reservation', 'fob')->get();

        return response()->json($cartItems);
    }


    // Display cart items for a specific reservation
    public function showFoodcart($reservation_id)
    {
        $reservation = Reservations::find($reservation_id);

        if (!$reservation) {
            return redirect()->back()->withErrors('Reservation not found.');
        }
        $reservation->reservation_start_date = Carbon::parse($reservation->reservation_start_date);
        $reservation->reservation_end_date = Carbon::parse($reservation->reservation_end_date);

        $cartItems = Cart::where('reservation_id', $reservation_id)->get();

        return view('sub_views (Website).cart', compact('reservation', 'cartItems'));
    }

    // Handle checkout process after confirming individual cart item
    public function confirmItem(Request $request, $cart_id)
    {
        $cartItem = Cart::findOrFail($cart_id);

        // Update cart item status to 'Completed'
        $cartItem->update(['status' => 'Confirmed']);

        return redirect()->route('cart.showFoodcart', $cartItem->reservation_id)
            ->with('message', 'Item status updated to completed successfully.');
    }

    // Add an item to the cart
    public function addToCart(Request $request)
    {
        $validatedData = $request->validate([
            'reservation_id' => 'required|exists:reservations,reservation_id',
            'product_id' => 'required|exists:food_and_beverages,product_id',
            'quantity' => 'required|integer|min:1',
            'catering_type' => 'required|in:Breakfast,Lunch,Dinner',
        ]);

        $product = FOBList::find($validatedData['product_id']);

        if ($product) {
            $total = $product->price * $validatedData['quantity'];

            Cart::create([
                'reservation_id' => $validatedData['reservation_id'],
                'product_id' => $validatedData['product_id'],
                'quantity' => $validatedData['quantity'],
                'price' => $product->price,
                'total' => $total,
                'catering_type' => $validatedData['catering_type'],
                'status' => 'Pending', // Default status
            ]);

            return redirect()->route('fobdetail', ['id' => encrypt($validatedData['product_id'])])
                ->with('status', 'Product added to cart successfully!');
        }

        return redirect()->back()->withErrors('Product not found.');
    }

    // Delete a specific cart item
    public function deleteCartItem($cart_id)
    {
        Cart::findOrFail($cart_id)->delete();

        return redirect()->back()->with('status', 'Cart item deleted successfully.');
    }

    // Delete selected cart items
    public function deleteSelected(Request $request, $reservation_id)
    {
        $validatedData = $request->validate([
            'cart_ids' => 'required|array',
            'cart_ids.*' => 'exists:carts,cart_id'
        ]);

        Cart::whereIn('cart_id', $validatedData['cart_ids'])->delete();

        return redirect()->back()->with('status', 'Selected cart items deleted successfully.');
    }

    // Handle checkout process after confirming all cart items
    public function confirmAll(Request $request, $reservation_id)
    {
        // Update all cart items status to 'Completed'
        Cart::where('reservation_id', $reservation_id)->update(['status' => 'Confirmed']);

        // Optionally, you can redirect to a confirmation page or perform further actions
        return redirect()->route('all.reservation', $reservation_id)
            ->with('status', 'All items confirmed and marked as completed.');
    }

    // Calculate total cost of completed cart items for a specific reservation
    public function calculateCartTotal($reservation_id)
    {
        $completedCartTotal = Cart::where('reservation_id', $reservation_id)
            ->where('status', 'Completed')
            ->sum('total');

        return $completedCartTotal;
    }
}