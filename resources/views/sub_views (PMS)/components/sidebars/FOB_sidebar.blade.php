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
                <a href="{{ route('PMS.food&beverages') }}"
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

            <li>
                <a href="{{ route('frontdesk.reservations') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">

                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" x="0px" y="0px"
                        viewBox="0 0 119.92 122.88 ">
                        <g>
                            <path
                                d="M67.02,12.99c-0.3,0-0.59-0.05-0.86-0.15c-1.42,0-2.58-1.16-2.58-2.58v-5.1h-25.1v5.1c0,1.34-1.02,2.44-2.33,2.57 c-0.28,0.1-0.58,0.16-0.89,0.16h-9.44v10.53h49.56V12.99H67.02L67.02,12.99z M70.57,122.2c-0.46,0.42-1.07,0.68-1.74,0.68 c-0.14,0-0.27-0.01-0.4-0.03l-62.69,0v0.01c-1.56,0-3-0.65-4.05-1.69h0l0-0.01l-0.01,0l-0.01-0.01C0.64,120.11,0,118.68,0,117.12 V20.24c0-1.58,0.65-3.02,1.69-4.06c1.04-1.04,2.48-1.69,4.06-1.69h14.92v-2.82c0-1.05,0.43-2.01,1.13-2.71l0,0l0.01-0.01l0.01-0.01 c0.7-0.69,1.66-1.12,2.71-1.12h8.81V4.27c0-1.17,0.48-2.23,1.25-3.01l0.01-0.01h0C35.36,0.48,36.42,0,37.59,0h26.89 c1.17,0,2.23,0.48,3.01,1.26l0.01-0.01c0.77,0.77,1.25,1.84,1.25,3.02v3.56h7.94c1.05,0,2.01,0.43,2.71,1.13l0.01,0.01l0.01,0.01 l0.01,0.01c0.69,0.7,1.12,1.66,1.12,2.71v2.82h14.92c1.57,0,3.01,0.65,4.05,1.69l0.01-0.01c1.04,1.04,1.69,2.48,1.69,4.06v69.18 c0.05,0.21,0.08,0.42,0.08,0.64c0,0.78-0.34,1.47-0.89,1.95l-29.62,30C70.72,122.08,70.64,122.14,70.57,122.2L70.57,122.2z M66.25,117.71V95.27c0-2.14,0.88-4.09,2.29-5.5c1.41-1.41,3.36-2.29,5.5-2.29h22.01V20.24c0-0.16-0.07-0.3-0.17-0.41l0.01-0.01 l-0.01,0c-0.1-0.1-0.25-0.16-0.41-0.16H80.55v5.17c0,1.05-0.43,2.01-1.13,2.71l-0.01,0l-0.01,0.01l-0.01,0.01 c-0.7,0.69-1.66,1.12-2.71,1.12H24.52c-1.06,0-2.03-0.43-2.72-1.13c-0.08-0.08-0.16-0.17-0.22-0.26c-0.56-0.67-0.91-1.54-0.91-2.47 v-5.17H5.74c-0.16,0-0.3,0.07-0.41,0.17c-0.11,0.11-0.17,0.25-0.17,0.41v96.87c0,0.16,0.06,0.31,0.17,0.41h0l0.01,0.01 c0.1,0.1,0.25,0.17,0.41,0.17v0.01L66.25,117.71L66.25,117.71z M71.41,95.27v18.78l21.14-21.41H74.03c-0.72,0-1.38,0.3-1.85,0.77 C71.7,93.89,71.41,94.55,71.41,95.27L71.41,95.27z M21.27,84.65c-1.43,0-2.58-1.16-2.58-2.58c0-1.43,1.16-2.58,2.58-2.58h45.4 c1.42,0,2.58,1.16,2.58,2.58c0,1.42-1.16,2.58-2.58,2.58H21.27L21.27,84.65z M21.27,50.08c-1.43,0-2.58-1.16-2.58-2.58 c0-1.42,1.16-2.58,2.58-2.58h58.67c1.43,0,2.58,1.16,2.58,2.58c0,1.42-1.16,2.58-2.58,2.58H21.27L21.27,50.08z M21.27,67.36 c-1.43,0-2.58-1.16-2.58-2.58c0-1.42,1.16-2.58,2.58-2.58h58.67c1.43,0,2.58,1.16,2.58,2.58c0,1.43-1.16,2.58-2.58,2.58H21.27 L21.27,67.36z" />
                        </g>
                    </svg>

                    <span class="flex-1 ms-3 whitespace-nowrap">Orders</span>

                </a>
            </li>
            <li>
                {{-- {{ route('rooms.list.frontdesk') }} --}}
                <a href="{{ route('food_beverages_list.FOB') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg "
                        class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x=" 0px" y="0px" viewBox="0 0 122.88 98.89"
                        style="enable-background:new 0 0 122.88 98.89" xml:space="preserve">

                        <g>
                            <path class="st0"
                                d="M1.72,92h119.43c0.94,0,1.72,0.79,1.72,1.72v3.44c0,0.93-0.78,1.72-1.72,1.72H1.72C0.78,98.89,0,98.12,0,97.17 v-3.44C0,92.78,0.78,92,1.72,92L1.72,92z M66.4,19.73c31.57,2.52,56.4,25.25,56.4,57.47c0,2.62-0.17,5.19-0.48,7.72l-121.75,0 c-0.32-2.56-0.48-5.14-0.48-7.73c0-32.37,25.06-55.19,56.83-57.5V9.92l-9.68,0c-0.98,0-1.78-0.8-1.78-1.78V1.78 c0-0.98,0.8-1.78,1.78-1.78h28.7c0.98,0,1.78,0.8,1.78,1.78v6.37c0,0.98-0.8,1.78-1.78,1.78H66.4L66.4,19.73L66.4,19.73L66.4,19.73 z" />
                        </g>
                    </svg>

                    <span class="flex-1 ms-3 whitespace-nowrap">Food & Beverages List</span>

                </a>
            </li>

            <li>
                {{-- {{ route('staff.list.frontdesk') }} --}}
                <a href="{{ route('frontdesk.stafflist') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 115.21"
                        style="enable-background:new 0 0 122.88 115.21">
                        <g>
                            <path
                                d="M29.03,100.46l20.79-25.21l9.51,12.13L41,110.69C33.98,119.61,20.99,110.21,29.03,100.46L29.03,100.46z M53.31,43.05 c1.98-6.46,1.07-11.98-6.37-20.18L28.76,1c-2.58-3.03-8.66,1.42-6.12,5.09L37.18,24c2.75,3.34-2.36,7.76-5.2,4.32L16.94,9.8 c-2.8-3.21-8.59,1.03-5.66,4.7c4.24,5.1,10.8,13.43,15.04,18.53c2.94,2.99-1.53,7.42-4.43,3.69L6.96,18.32 c-2.19-2.38-5.77-0.9-6.72,1.88c-1.02,2.97,1.49,5.14,3.2,7.34L20.1,49.06c5.17,5.99,10.95,9.54,17.67,7.53 c1.03-0.31,2.29-0.94,3.64-1.77l44.76,57.78c2.41,3.11,7.06,3.44,10.08,0.93l0.69-0.57c3.4-2.83,3.95-8,1.04-11.34L50.58,47.16 C51.96,45.62,52.97,44.16,53.31,43.05L53.31,43.05z M65.98,55.65l7.37-8.94C63.87,23.21,99-8.11,116.03,6.29 C136.72,23.8,105.97,66,84.36,55.57l-8.73,11.09L65.98,55.65L65.98,55.65z" />
                        </g>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Kitchen Inventory</span>
                </a>
            </li>

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
