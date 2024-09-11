@extends('main_views.pms_view')
@section('title', 'Reservation Lists')
@section('content')
    @include('sub_views (PMS).components.addmodal_roomrelated')
    <div class="p-4">
        <!-- Small Navigation Bar -->
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-900">Reservation List</h2>
            <button data-modal-target="addReservationModal" data-modal-toggle="addReservationModal"
                class="hidden sm:inline-flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                <svg aria-hidden="true" class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                        clip-rule="evenodd"></path>
                </svg>
                Add Reservation
            </button>
        </div>
        <div id="reservations-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 p-4">
            <!-- Reservations will be dynamically inserted here -->
        </div>
    </div>
@endsection
