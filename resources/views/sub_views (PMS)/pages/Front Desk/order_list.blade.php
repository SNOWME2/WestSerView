@extends('main_views.pms_view')

@section('title', 'Users')
@section('content')
    @if (Route::is('frontdesk.orderlist'))
        <div class="p-4 ">
            <!-- Small Navigation Bar -->
            <div class="flex justify-between items-center bg-white mb-4 sticky top-[56px]">
                <h2 class="text-lg font-semibold text-gray-900">Order List</h2>
                <button data-modal-target="addStaffModal" data-modal-toggle="addStaffModal"
                    class="hidden sm:inline-flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"><svg
                        aria-hidden="true" class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Add User
                </button>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto w-full">
                <table class="w-full divide-y divide-gray-200 bg-white">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Product Name & Guest Name
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Quantity
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>



                    <tbody id="orderslist-content" class="bg-white divide-y divide-gray-200">


                    </tbody>
                </table>
            </div>
    @endif
@endsection
