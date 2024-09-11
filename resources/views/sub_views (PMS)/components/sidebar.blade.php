<!-- drawer component -->
<div id="drawer-navigation"
    class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-64 dark:bg-gray-800"
    tabindex="-1" aria-labelledby="drawer-navigation-label">
    <h5 id="drawer-navigation-label" class="text-base font-semibold text-gray-500 uppercase dark:text-gray-400">Menu
    </h5>
    <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation"
        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
        <span class="sr-only">Close menu</span>
    </button>
    <div class="py-4 overflow-y-auto">
        <ul class="space-y-2 font-medium">
            <li>


                <a @switch (Auth::user() ->role)
                    @case('Front Desk')

                    href="{{ route('PMS.frontdesk') }}"
                    @break
                     @case('House Keeper')

                    href="{{ route('PMS.housekeeper') }}"
                    @break
                     @case('Kitchen')

                    href="{{ route('PMS.Kitchen') }}"
                    @break @endswitch
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            {{-- <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                        <path
                            d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                    </svg>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">E-commerce</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-example" class="hidden py-2 space-y-2">
                    <li>
                        <a href="#"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Products</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Billing</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Invoice</a>
                    </li>
                </ul>
            </li> --}}
            <li>
                <a href="{{ route('frontdesk.reservations') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 119.92 122.88 "
                        class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor">

                        <path
                            d="M108.68,122.88H11.24A11.28,11.28,0,0,1,0,111.64V22.55A11.28,11.28,0,0,1,11.24,11.31H21.61V25.14a12.35,12.35,0,0,0,4.67,9.61,14.55,14.55,0,0,0,18.31,0,12.35,12.35,0,0,0,4.67-9.61V11.31H70.2V25.14a12.35,12.35,0,0,0,4.67,9.61,14.55,14.55,0,0,0,18.31,0,12.35,12.35,0,0,0,4.67-9.61V11.31h10.83a11.3,11.3,0,0,1,11.24,11.24v89.09a11.27,11.27,0,0,1-11.24,11.24ZM83.58,56.77h16.1a2.07,2.07,0,0,1,2.06,2v13.4a2.07,2.07,0,0,1-2.06,2H83.58a2.06,2.06,0,0,1-2-2V58.82a2.05,2.05,0,0,1,2-2Zm-31.51,0H68.18a2.06,2.06,0,0,1,2,2v13.4a2.07,2.07,0,0,1-2,2H52.07a2.06,2.06,0,0,1-2-2V58.82a2.06,2.06,0,0,1,2-2Zm-31.84,0H36.34a2.06,2.06,0,0,1,2,2v13.4a2.07,2.07,0,0,1-2,2H20.23a2.06,2.06,0,0,1-2.05-2V58.82a2.05,2.05,0,0,1,2.05-2ZM83.58,85.26h16.1a2.07,2.07,0,0,1,2.06,2v13.4a2.06,2.06,0,0,1-2.06,2.05H83.58a2.06,2.06,0,0,1-2-2.05V87.31a2.06,2.06,0,0,1,2-2Zm-31.51,0H68.18a2.06,2.06,0,0,1,2,2v13.4a2.06,2.06,0,0,1-2,2.05H52.07a2.06,2.06,0,0,1-2-2.05V87.31a2.07,2.07,0,0,1,2-2Zm-31.84,0H36.34a2.06,2.06,0,0,1,2,2v13.4a2.06,2.06,0,0,1-2,2.05H20.23a2.06,2.06,0,0,1-2.05-2.05V87.31a2.06,2.06,0,0,1,2.05-2ZM78.6,4.45C78.6,2,81,0,84,0s5.43,2,5.43,4.45V25.14c0,2.46-2.42,4.45-5.43,4.45s-5.42-2-5.42-4.45V4.45ZM30,4.45C30,2,32.44,0,35.44,0s5.42,2,5.42,4.45V25.14c0,2.46-2.42,4.45-5.42,4.45S30,27.6,30,25.14V4.45ZM3.6,43.86v66.58a8.87,8.87,0,0,0,8.84,8.84h95a8.87,8.87,0,0,0,8.85-8.84V43.86Z" />
                    </svg>

                    <span class="flex-1 ms-3 whitespace-nowrap">Resevations</span>

                </a>
            </li>
            <li>
                {{-- {{ route('rooms.list.frontdesk') }} --}}
                <a href=""
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512"
                        class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" fill="currentColor">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g>
                                <path class="st0"
                                    d="M124.305,228.745c-4.113-0.97-7.914-3.042-10.948-6.075l-10.499-10.493c-8.958-8.957-8.958-23.475,0-32.432 l10.499-10.499c4.301-4.294,10.138-6.72,16.212-6.72h71.012c6.083,0,11.919,2.426,16.22,6.72l10.493,10.499 c8.957,8.957,8.957,23.475,0,32.432l-10.493,10.493c-3.033,3.033-6.835,5.104-10.948,6.075h100.294 c-4.105-0.97-7.907-3.042-10.948-6.075l-10.493-10.493c-8.957-8.957-8.957-23.475,0-32.432l10.493-10.499 c4.308-4.294,10.137-6.72,16.22-6.72h71.012c6.082,0,11.912,2.426,16.22,6.72l10.485,10.499c8.957,8.957,8.957,23.475,0,32.432 L398.65,222.67c-3.041,3.033-6.842,5.104-10.948,6.075h84.661h1.651V119.211c0-20.687-16.762-37.457-37.45-37.457H75.444 c-20.687,0-37.458,16.77-37.458,37.457v109.534h1.651H124.305z">
                                </path>
                                <polygon class="st0"
                                    points="502.095,241.96 472.363,241.96 39.637,241.96 23.121,241.96 0,241.96 0,430.246 39.637,430.246 39.637,393.911 472.363,393.911 472.363,430.246 512,430.246 512,393.911 512,241.96 ">
                                </polygon>
                            </g>
                        </g>
                    </svg>

                    <span class="flex-1 ms-3 whitespace-nowrap">Rooms</span>

                </a>
            </li>
            {{-- <li>
                <a href="#"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Inbox</span>
                    <span
                        class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>
                </a>
            </li> --}}
            <li>
                {{-- {{ route('staff.list.frontdesk') }} --}}
                <a href="{{ route('frontdesk.stafflist') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path
                            d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Users</span>
                </a>
            </li>



            <li>
                <a data-modal-target="addStaffModal" data-modal-toggle="addStaffModal" href="#" type="button"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">

                    <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        width="24" height="24" viewBox="0 0 24 24"fill="currentColor" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-user-plus">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="8.5" cy="7" r="4"></circle>
                        <line x1="20" y1="8" x2="20" y2="14"></line>
                        <line x1="23" y1="11" x2="17" y2="11"></line>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Add New User</span>
                </a>


            </li>

            <li>
                {{-- {{ route('WorkOrderList.frontdesk') }} --}}
                <a href=""
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">

                    <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-user-plus">
                        <path
                            d="M537.6 780.8H275.456c-19.456 0-31.744-12.8-31.744-31.744 0-19.456 12.8-31.744 31.744-31.744h268.8c12.8-38.4 31.744-76.8 57.344-102.4H275.456c-19.456 0-31.744-12.8-31.744-31.744s12.8-31.744 31.744-31.744h435.2c19.456-6.144 38.4-6.144 51.2-6.144 51.2 0 96.256 19.456 134.144 44.544V230.4c0-64-51.2-115.2-115.2-115.2h-19.456v121.856c0 64-51.2 115.2-115.2 115.2H345.6C281.6 351.744 230.4 300.544 230.4 236.544V115.2h-31.744c-64 0-115.2 51.2-115.2 115.2v640c0 64 51.2 115.2 115.2 115.2h505.856c-90.112-18.944-160.768-102.4-166.912-204.8z" />
                        <path
                            d="M345.6 294.4h301.056c31.744 0 57.344-25.6 57.344-57.344V115.2H588.8c-6.144-44.544-45.056-82.944-96.256-82.944-45.056 0-83.456 38.4-89.6 82.944H287.744v121.856c0 31.744 25.6 57.344 57.856 57.344z m556.544 365.056c-31.744-38.4-82.944-64-134.144-64h-31.744c-19.456 0-31.744 6.656-51.2 19.456-38.4 19.456-70.656 57.344-89.6 102.4-6.144 19.456-6.144 38.4-6.144 57.344v6.144c6.144 96.256 82.944 166.4 173.056 166.4 51.2 0 102.4-25.6 134.144-64 25.6-31.744 38.4-70.656 38.4-115.2 6.144-38.4-13.312-76.8-32.768-108.544z m-37.888 82.944l-102.4 102.4c-12.8 12.8-25.6 12.8-38.4 0l-64-64c-12.8-12.8-12.8-25.6 0-38.4s25.6-12.8 38.4 0l31.744 31.744 12.8 12.8 82.944-82.944c12.8-12.8 25.6-12.8 38.4 0s12.8 25.6 0.512 38.4z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Work Orders</span>
                </a>


            </li>
            {{-- <li>
                <a href="#"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 18 20">
                        <path
                            d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Products</span>
                </a>
            </li> --}}
            <hr>
            <li class=mt-5>

                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">


                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 8h11m0 0-4-4m4 4-4 4m-5 3H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h3" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Logout</span>



                </a>

                <form id="logout-form" action="{{ route('staff.logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>
