@extends('main_views.website_view')

@section('main')
    <section class="py-8 bg-white dark:bg-gray-900">
        <div class="max-w-screen-xl px-4 mx-auto">
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Reservations List</h2>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Reservation ID
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Guest Name
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Room Number
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Start Date
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                End Date
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-900 dark:divide-gray-700">
                        @foreach ($reservations as $reservation)
                            <tr onclick="location.href='{{ route('show.cart', ['id' => $reservation->reservation_id]) }}'"
                                class="cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-white">
                                    {{ $reservation->reservation_id }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300">
                                    {{ $reservation->guest_name }} <!-- Adjust according to your relationship -->
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300">
                                    {{ $reservation->Rooms->room_number }}
                                    <!-- Adjust according to your relationship -->
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300">
                                    {{ $reservation->reservation_start_date }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300">
                                    {{ $reservation->reservation_end_date }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300">
                                    {{ $reservation->status }}
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $reservations->links() }}
            </div>
        </div>
    </section>
@endsection
