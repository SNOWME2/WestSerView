<!-- Drawer Component -->
<div id="drawer-room"
    class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-80 dark:bg-gray-800"
    tabindex="-1" aria-labelledby="drawer-room">
    <button type="button" data-drawer-hide="drawer-room" aria-controls="drawer-room"
        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
        <span class="sr-only">Close menu</span>
    </button>

    <!-- Spinner -->
    <div id="drawer-loading" class="flex items-center justify-center h-full w-full hidden">
        <div role="status">
            <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                    fill="currentColor" />
                <path
                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                    fill="currentFill" />
            </svg>
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <!-- Content -->
    <div id="drawer-content" class="hidden">
        <h2 id="room-number">Room Number</h2>
        <p id="room-type">Room Type</p>
        <p id="room-capacity">Capacity</p>
        <p id="room-price">price</p>
        <p id="room-addedby">Added by</p>
        <p id="room-status">Status</p>
    </div>


</div>



{{-- Reservation Drawer --}}<!-- Drawer HTML -->
<div id="drawer-reservation"
    class="fixed shadow-lg top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-80 dark:bg-gray-800"
    tabindex="-1" aria-labelledby="drawer-reservation">

    <button type="button" id="drawer-reservation" data-drawer-hide="drawer-reservation"
        aria-controls="drawer-reservation"
        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
        <span class="sr-only">Close menu</span>
    </button>

    <!-- Spinner -->
    <div id="drawer-loading-rev" class="flex items-center justify-center h-full w-full hidden">
        <div role="status">
            <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                    fill="currentColor" />
                <path
                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                    fill="currentFill" />
            </svg>
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <!-- Content -->
    <div id="drawer-reservation-content" class="hidden">
        <div class="mb-4">
            <h3 class="text-lg font-bold">Reservation Information</h3>
            <ul>
                <li class="py-2 border-b border-gray-200">
                    <span class="text-gray-600">Reservation ID:</span>
                    #<span class="text-gray-900" id="reservation-id"></span>
                </li>
                <li class="py-2 border-b border-gray-200">
                    <span class="text-gray-600">Date:</span>
                    <span class="text-gray-900" id="reservation-date"></span>
                </li>
                <li class="py-2 border-b border-gray-200">
                    <span class="text-gray-600">Time:</span>
                    <span class="text-gray-900" id="reservation-time"></span>
                </li>
                <li class="py-2 border-b border-gray-200">
                    <span class="text-gray-600">Party Size:</span>
                    <span class="text-gray-900" id="party-size"></span>
                </li>
            </ul>
        </div>
        <!-- Guest information -->
        <div class="mb-4">
            <h3 class="text-lg font-bold">Guest Information</h3>
            <ul>
                <li class="py-2 border-b border-gray-200">
                    <span class="text-gray-600">Name:</span>
                    <span class="text-gray-900" id="guest-name"></span>
                </li>
                <li class="py-2 border-b border-gray-200">
                    <span class="text-gray-600">Contact:</span>
                    <span class="text-gray-900" id="guest-email"></span>
                </li>

            </ul>
        </div>
        <!-- Table information -->
        <div class="mb-4">
            <h3 class="text-lg font-bold">Table Information</h3>
            <ul>
                <li class="py-2 border-b border-gray-200">
                    <span class="text-gray-600">Room Number:</span>
                    <span class="text-gray-900" id="table-number"></span>
                </li>
                <li class="py-2 border-b border-gray-200">
                    <span class="text-gray-600">Room Type:</span>
                    <span class="text-gray-900" id="table-type"></span>
                </li>
                <li class="py-2 border-b border-gray-200">
                    <span class="text-gray-600">Status:</span>
                    <span class="text-gray-900" id="status"> N/A</span>
                </li>
            </ul>
        </div>
        <div class="mt-4">

        </div>

    </div>


</div>



<!-- Reservation Drawer Component -->
