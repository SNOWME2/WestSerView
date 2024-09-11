<header
    class='flex shadow-lg py-4 px-4 sm:px-10 bg-white font-[sans-serif] min-h-[70px] tracking-wide sticky top-0 z-50'>
    <div class='flex  flex-wrap items-center justify-between gap-6 w-full'>

        <a href="{{ route('frontpage') }}">
            <img src="{{ asset('assets/images/Banner.jpg') }}" alt="logo" class="object-cover  max-h-12 " />
        </a>


        {{-- Collapse Menu Button --}}
        <div id="collapseMenu"
            class='max-lg:hidden  lg:!block max-lg:w-full max-lg:fixed max-lg:before:fixed max-lg:before:bg-black max-lg:before:opacity-50 max-lg:before:inset-0 max-lg:before:z-50'>
            <button id="toggleClose" class='lg:hidden fixed top-2 right-4 z-[100] rounded-full bg-white p-3'>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-black" viewBox="0 0 320.591 320.591">
                    <path
                        d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z"
                        data-original="#000000"></path>
                    <path
                        d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z"
                        data-original="#000000"></path>
                </svg>
            </button>
            <ul
                class=' lg:flex lg:gap-x-5 max-lg:space-y-3 max-lg:fixed max-lg:bg-white max-lg:w-1/2 max-lg:min-w-[300px] max-lg:top-0 max-lg:left-0 max-lg:p-6 max-lg:h-full max-lg:shadow-md max-lg:overflow-auto z-50'>
                <li class='mb-6 hidden max-lg:block'>
                    <a href="{{ route('frontpage') }}"><img src="{{ asset('assets/images/Banner.jpg') }}" alt="logo"
                            class='object-cover h-26 w-96 ' /></a>
                </li>
                <li class='max-lg:border-b max-lg:py-3 px-3'><a href='{{ route('frontpage') }}'
                        class='hover:text-[#007bff] text-[#333] block font-semibold text-[15px]'>Home</a></li>
                <li class='max-lg:border-b max-lg:py-3 px-3'><a href='{{ route('room-list') }}'
                        class='hover:text-[#007bff] text-[#333] block font-semibold text-[15px]'>Rooms</a></li>
                <li class='max-lg:border-b max-lg:py-3 px-3'><a href='{{ route('dining') }}'
                        class='hover:text-[#007bff] text-[#333] block font-semibold text-[15px]'>Dining</a></li>
                <li class='max-lg:border-b max-lg:py-3 px-3'><a href='{{ route('all.reservation') }}'
                        class='hover:text-[#007bff] text-[#333] block font-semibold text-[15px]'>Reservations</a></li>
            </ul>
        </div>
        {{-- Login, Register, logout button --}}
        <div class='flex items-center ml-auto space-x-6'>
            @guest
                {{-- Login Button --}}
                <button class='font-semibold text-[15px] border-none outline-none '>
                    <a href='{{ route('login') }}' class='text-[#007bff] hover:underline'>Login</a>
                </button>

                {{-- Register Button --}}
                <a href='{{ route('register') }}'>
                    <button
                        class='px-4 py-2 text-sm rounded-sm font-bold text-white border-2 border-[#007bff] bg-[#007bff] transition-all ease-in-out duration-300 hover:bg-transparent hover:text-[#007bff]'>
                        Register
                    </button>
                </a>
            @endguest

            @auth('web')
                <div class='flex items-center max-lg:ml-auto space-x-5'>
                    <a href="{{ route('profile.edit') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24"
                            class="cursor-pointer hover:fill-[#007bff] inline">
                            <circle cx="10" cy="7" r="6" data-original="#000000" />
                            <path
                                d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z"
                                data-original="#000000" />
                        </svg>
                    </a>

                    {{-- Logout Button with Modal --}}
                    <button data-modal-target="logout-modal" data-modal-toggle="logout-modal"
                        class='px-4 py-2 text-sm rounded-sm font-bold text-white border-2 border-[#007bff] bg-[#007bff] transition-all ease-in-out duration-300 hover:bg-transparent hover:text-[#007bff]'>
                        Logout
                    </button>
                @endauth

                {{-- Collapse Button --}}
                <button id="toggleOpen" class='lg:hidden'>
                    <svg class="w-7 h-7" fill="#333" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>

            </div>
        </div>


        {{-- Logout Modal --}}
        <div id="logout-modal" tabindex="-1" aria-hidden="true"
            class="hidden fixed inset-0 p-4 flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]">
            <div class="w-full max-w-lg bg-white shadow-lg rounded-lg p-6 relative">
                <svg data-modal-hide="logout-modal" xmlns="http://www.w3.org/2000/svg"
                    class="w-3.5 h-3.5 absolute top-3 right-3 cursor-pointer text-gray-400 hover:text-gray-500"
                    fill="none" viewBox="0 0 14 14">
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
</header>
