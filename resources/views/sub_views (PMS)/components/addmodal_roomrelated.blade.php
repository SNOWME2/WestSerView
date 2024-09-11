@if (Route::is('frontdesk.reservations'))

    {{-- Add Reservation Modal --}}
    <div id="addReservationModal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-[40vw] max-h-full mx-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-hide="addReservationModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add New Reservation</h3>
                    <form id="addRoomForm" class="space-y-6" action="{{ route('reservation.create.frontdesk') }}"
                        method="POST">
                        @csrf
                        {{-- Hidden Inputs --}}
                        <input type="text" name="added_by" id="added_by" class="hidden ""
                            value="{{ Auth::guard('staff')->user()->name }}">
                        <input type="text" name="mode_of_reservation" id="mode_of_reservation" class="hidden "
                            value="On-site">


                        {{-- Guest Name --}}
                        <div>
                            <label for="reservation_for"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Guest Name
                            </label>
                            <input type="text" name="reservation_for" id="reservation_for"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required>
                            @error('reservation_for')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Guest Contact --}}
                        <div>
                            <label for="guest_contact"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Guest
                                Email/Contact
                            </label>
                            <input type="text" name="guest_contact" id="guest_contact"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required>
                            @error('guest_contact')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="grid grid-cols-2 gap-4">

                            <div>
                                {{-- Room Type --}}
                                <label for="room_type"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room
                                    Type</label>
                                <select name="room_type" id="room_type"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Double" required>

                                    @foreach ($rooms as $room)
                                        <option value="{{ $room->room_id }}">Room Number {{ $room->room_number }}
                                            ({{ $room->room_type }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('room_type')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                {{-- Number of Guest --}}
                                <label for="room_cap"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Guest
                                </label>
                                <input name="room_cap" id="room_cap" type="number"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="1" value="1"required>
                                @error('room_cap')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        {{-- Checkin Check Out Dateand time --}}
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                {{-- Checkin Date --}}
                                <label for="checkin"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Check
                                    In</label>
                                <input type="date" name="checkin" id="checkin"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    value="{{ now()->toDateString('Y-m-d') }}" required>
                                @error('checkin')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                                {{-- Checkin  time --}}
                                <div class="pt-3 flex">
                                    <input type="time" id="arrival-checkin_time" name="checkin_time"
                                        class="rounded-none rounded-s-lg bg-gray-50 border text-gray-900 leading-none focus:ring-blue-500 focus:border-blue-500 block flex-1 w-full text-sm border-gray-300 p-2.5"
                                        value="{{ old('checkin_time', now()->format('H:i')) }}" required>

                                    <span
                                        class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-s-0 border-s-0 border-gray-300 rounded-e-md">
                                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                    @error('checkin_time')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                {{-- Check Out Date --}}
                                <label for="checkout"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Check Out
                                </label>
                                <input type="date" id="checkout" name="checkout"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    required>

                                @error('checkout')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                                {{-- CheckOUt Time --}}
                                <div class="pt-3 flex">
                                    <input type="time" id="arrival-checkout_time" name="checkout_time"
                                        class="rounded-none rounded-s-lg bg-gray-50 border text-gray-900 leading-none focus:ring-blue-500 focus:border-blue-500 block flex-1 w-full text-sm border-gray-300 p-2.5"
                                        value="{{ old('checkout_time', now()->format('H:i')) }}" required>

                                    <span
                                        class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-s-0 border-s-0 border-gray-300 rounded-e-md">
                                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                    @error('checkin_time')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        {{-- Special Requests --}}
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700" for="special-requests">Special
                                Requests</label>
                            <textarea class="w-full border border-gray-300 rounded-lg px-3 py-2" name="special_requests" id="special-requests"
                                rows="4">{{ old('special_requests') }}</textarea>

                        </div>
                        {{-- Buttons --}}
                        <div class="flex justify-end space-x-4">
                            {{-- Submit Button --}}
                            <button type="submit"
                                class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                                Reservation</button>
                            {{-- Discard Button --}}
                            <button type="button" data-modal-hide="addRoomModal"
                                class="w-full text-gray-500 bg-white border border-gray-200 hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">Discard</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@else
    <div id="addRoomModal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-[40vw] max-h-full mx-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-hide="addRoomModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add new Room</h3>
                    <form id="addRoomForm" class="space-y-6" action="{{ route('room.create.frontdesk') }}"
                        method="POST">
                        @csrf
                        <input type="text" name="hotel_id" id="hotel_id" class="hidden ""
                            value="{{ Auth::guard('staff')->user()->hotel_id }}">
                        <input type="text" name="added_by" id="added_by" class="hidden ""
                            value="{{ Auth::guard('staff')->user()->name }}">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="room_number"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room
                                    Number</label>
                                <input type="number" name="room_number" id="room_number"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="4569" required>
                                @error('room_number')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="room_type"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room
                                    Type</label>
                                <select name="room_type" id="room_type"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Double" required>


                                    <option value="Single">Single</option>
                                    <option value="Double">Double</option>
                                    <option value="Suite">Suite</option>
                                    <option value="Delux">Delux</option>
                                </select>
                                @error('room_type')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="room_price"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room
                                    Price</label>
                                <input type="number" name="room_price" id="room_price"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    required>
                                @error('room_price')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="room_cap"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room
                                    Capacity</label>
                                <input type="number" id="room_cap" name="room_cap"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    required>

                                @error('room_cap')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex justify-end space-x-4">
                            <button type="submit"
                                class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                                Room</button>
                            <button type="button" onclick="" data-modal-hide="addRoomModal"
                                class="w-full text-gray-500 bg-white border border-gray-200 hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">Discard</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endif
