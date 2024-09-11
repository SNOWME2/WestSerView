@extends('main_views.website_view')

@section('main')
    <section class="py-8 bg-white dark:bg-gray-900">
        <div class="max-w-screen-xl px-4 mx-auto">
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Food Cart</h2>

            <!-- Reservation Details -->
            <div class="mb-6">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Reservation Details</h3>
                <p class="text-gray-500 dark:text-gray-300">Reservation ID: {{ $reservation->reservation_id }}</p>
                <p class="text-gray-500 dark:text-gray-300">Guest Name: {{ $reservation->guest_name }}</p>
                <p class="text-gray-500 dark:text-gray-300">Room Number: {{ $reservation->Rooms->room_number ?? 'N/A' }}</p>
                <p class="text-gray-500 dark:text-gray-300">Start Date:
                    {{ $reservation->reservation_start_date->format('M d, Y H:i A') }}</p>
                <p class="text-gray-500 dark:text-gray-300">End Date:
                    {{ $reservation->reservation_end_date->format('M d, Y H:i A') }}</p>
                <p class="text-gray-500 dark:text-gray-300">Status: {{ $reservation->status }}</p>
            </div>

            <!-- Actions -->
            <div class="mb-6 flex justify-between">
                <form action="{{ route('cart.confirmAll', $reservation->reservation_id) }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="px-4 py-2 bg-green-500 text-white font-semibold rounded-md hover:bg-green-600">
                        Confirm All
                    </button>
                </form>

                <form action="{{ route('cart.deleteSelected', $reservation->reservation_id) }}" method="POST"
                    id="delete-selected-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-4 py-2 bg-red-500 text-white font-semibold rounded-md hover:bg-red-600">
                        Delete Selected
                    </button>
                </form>
            </div>

            <!-- Cart Items -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <input type="checkbox" id="select-all">
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Product ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Quantity</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Catering Type</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-900 dark:divide-gray-700">
                        @foreach ($cartItems as $item)
                            @php
                                $statusClass = '';
                                $disabled = '';
                                if ($item->status == 'Confirmed') {
                                    $statusClass = 'bg-gray-200 text-gray-400';
                                    $disabled = 'disabled';
                                } elseif ($item->status == 'Pending') {
                                    $statusClass = 'bg-yellow-100 text-yellow-600';
                                }
                            @endphp
                            <tr class="{{ $statusClass }}">
                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300">
                                    <input type="checkbox" name="cart_ids[]" value="{{ $item->cart_id }}"
                                        {{ $disabled }}>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300">{{ $item->product_id }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300">{{ $item->quantity }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300">{{ $item->catering_type }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300">{{ $item->price }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300">{{ $item->total }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300">{{ $item->status }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300">
                                    @if ($item->status != 'Confirmed')
                                        <form action="{{ route('cart.delete', $item->cart_id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-600">
                                                Delete
                                            </button>
                                        </form>
                                    @else
                                        <button type="button" class="text-gray-500 cursor-not-allowed">
                                            Delete
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
