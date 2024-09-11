{{-- Cancel Reservation --}}


@if (Route::is('frontdesk.reservations'))
    <div id="cancel-reservation" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 p-4 flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]">
        <div class="w-full max-w-lg bg-white shadow-lg rounded-lg p-6 relative">
            <svg data-modal-hide="cancelreservation" xmlns="http://www.w3.org/2000/svg"
                class="w-3.5 h-3.5 absolute top-3 right-3 cursor-pointer text-gray-400 hover:text-gray-500" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1l12 12M13 1L1 13"></path>
            </svg>

            <h3 class="text-lg font-semibold text-gray-900 mb-4">Are you sure you want to log out?</h3>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <div class="flex gap-4 justify-center">
                    <button type="submit"
                        class="px-4 py-2 text-sm rounded-sm font-bold text-white border-2 border-red-600 bg-red-600 transition-all ease-in-out duration-300 hover:bg-transparent hover:text-red-600">Logout</button>
                    <button type="button" data-modal-hide="logout-modal"
                        class="px-4 py-2 text-sm rounded-sm font-bold text-black border-2 border-blue-800 bg-blue-300 transition-all ease-in-out duration-300 hover:bg-transparent hover:text-gray-800">Cancel</button>
                </div>
            </form>
        </div>
    </div>
@endif
