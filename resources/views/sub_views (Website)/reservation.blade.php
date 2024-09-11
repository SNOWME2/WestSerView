@extends('main_views.website_view')
@section('title')
    Room {{ $room->room_number }}
@endsection
@section('main')
    <div class="max-w-5xl mx-auto bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Hotel Booking</h2>
        <p class="mb-6 text-gray-600">Experience something new every moment</p>

        <form action="{{ route('reserve') }}" method="POST">
            @csrf
            <input type="hidden" name="room_id" value="{{ $room->room_id }}">
            <input type="hidden" name="guest_id" value="{{ $user->guest_id }}">
            <input type="hidden" name="guest_name" value="{{ $user->name }}">
            <input type="hidden" name="guest_contact_or_email" value="{{ $user->email }}">

            <!-- Display validation errors -->
            @if ($errors->any())
                <div class="mb-4">
                    <ul class="list-disc pl-5 text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Room Type and Number of Guests -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700" for="room_type">Room Type</label>
                    <input class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-slate-200" name="room_type"
                        id="disabled-input" aria-label="disabled input" value="{{ $room->room_type }}">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700" for="guests">Number of Guests</label>
                    <input class="w-full border border-gray-300 rounded-lg px-3 py-2" type="number" name="number_of_guest"
                        id="guests" placeholder="1" value="1">
                </div>
            </div>

            <!-- Arrival Date & Time -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700" for="arrival-date">Arrival Date &
                        Time</label>
                    <input class="w-full border border-gray-300 rounded-lg px-3 py-2" type="date" name="arrival_date"
                        id="arrival-date" value="{{ old('arrival_date') }}">

                    <div class="flex mt-4">
                        <input type="time" id="arrival-time" name="arrival_time"
                            class="rounded-none rounded-s-lg bg-gray-50 border text-gray-900 leading-none focus:ring-blue-500 focus:border-blue-500 block flex-1 w-full text-sm border-gray-300 p-2.5"
                            value="{{ old('arrival_time', now()->format('H:i')) }}" required>

                        <span
                            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-s-0 border-s-0 border-gray-300 rounded-e-md">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </div>
                </div>

                <div>
                    <!-- Departure Date & Time -->
                    <label class="block mb-2 text-sm font-medium text-gray-700" for="departure-date">Departure Date &
                        Time</label>
                    <input class="w-full border border-gray-300 rounded-lg px-3 py-2" type="date" name="departure_date"
                        id="departure-date" value="{{ old('departure_date') }}">

                    <div class="flex mt-4">
                        <input type="time" id="departure-time" name="departure_time"
                            class="rounded-none rounded-s-lg bg-gray-50 border text-gray-900 leading-none focus:ring-blue-500 focus:border-blue-500 block flex-1 w-full text-sm border-gray-300 p-2.5"
                            value="{{ old('departure_time', now()->format('H:i')) }}" required>

                        <span
                            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-s-0 border-s-0 border-gray-300 rounded-e-md">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Special Requests -->
            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-700" for="special-requests">Special Requests</label>
                <textarea class="w-full border border-gray-300 rounded-lg px-3 py-2" name="special_requests" id="special-requests"
                    rows="4">{{ old('special_requests') }}</textarea>
            </div>

            <button type="submit"
                class="mt-8 w-56 rounded-full border-8 border-blue-500 bg-blue-600 px-10 py-4 text-lg font-bold text-white transition hover:translate-y-1">Book
                Now</button>

        </form>
    </div>
@endsection
