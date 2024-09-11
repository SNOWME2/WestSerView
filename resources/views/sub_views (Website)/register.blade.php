@extends('main_views.authentication')

@section('title')
    Register
@endsection

@section('main')
    <div class="font-[sans-serif] bg-white max-w-4xl flex items-center mx-auto md:h-screen p-4">
        <div class="grid md:grid-cols-3 items-center shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] rounded-xl overflow-hidden">
            {{--  Left Panel  --}}
            <div
                class="max-md:order-1 flex flex-col justify-center space-y-16 max-md:mt-16 min-h-full bg-gradient-to-r from-gray-900 to-gray-700 lg:px-8 px-4 py-4">
                <div>
                    <h4 class="text-white text-lg font-semibold">Create Your Account</h4>
                    <p class="text-[13px] text-gray-300 mt-3 leading-relaxed">Welcome to our registration page! Get started
                        by creating your account.</p>
                </div>
                <div>
                    <h4 class="text-white text-lg font-semibold">Simple & Secure Registration</h4>
                    <p class="text-[13px] text-gray-300 mt-3 leading-relaxed">Our registration process is designed to be
                        straightforward and secure. We prioritize your privacy and data security.</p>
                </div>
            </div>
            {{--  Registration Form (Right Panel) --}}
            <form action="{{ route('register') }}" method="POST" class="md:col-span-2 w-full py-6 px-6 sm:px-16">
                @csrf
                <div class="mb-6">
                    <h3 class="text-gray-800 text-2xl font-bold">Create an account</h3>
                </div>

                <div class="space-y-6">
                    <div>
                        <label class="text-gray-800 text-sm mb-2 block">Name</label>
                        <div class="relative flex items-center">
                            {{--  Name --}}
                            <input name="name" type="text"
                                class="text-gray-800 bg-white border border-gray-300 w-full text-sm px-4 py-2.5 rounded-md outline-blue-500"
                                placeholder="Enter name" />
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                class="w-4 h-4 absolute right-4" viewBox="0 0 24 24">
                                <circle cx="10" cy="7" r="6" data-original="#000000"></circle>
                                <path
                                    d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z"
                                    data-original="#000000"></path>
                            </svg>
                        </div>
                        {{-- Name Error Message --}}
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <div>
                        <label class="text-gray-800 text-sm mb-2 block">Email </label>
                        <div class="relative flex items-center">
                            {{--  Email --}}
                            <input name="email" type="text"
                                class="text-gray-800 bg-white border border-gray-300 w-full text-sm px-4 py-2.5 rounded-md outline-blue-500"
                                placeholder="Enter email" />
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                class="w-4 h-4 absolute right-4" viewBox="0 0 682.667 682.667">
                                <defs>
                                    <clipPath id="a" clipPathUnits="userSpaceOnUse">
                                        <path d="M0 512h512V0H0Z" data-original="#000000"></path>
                                    </clipPath>
                                </defs>
                                <g clip-path="url(#a)" transform="matrix(1.33 0 0 -1.33 0 682.667)">
                                    <path fill="none" stroke-miterlimit="10" stroke-width="40"
                                        d="M452 444H60c-22.091 0-40-17.909-40-40v-39.446l212.127-157.782c14.17-10.54 33.576-10.54 47.746 0L492 364.554V404c0 22.091-17.909 40-40 40Z"
                                        data-original="#000000"></path>
                                    <path
                                        d="M472 274.9V107.999c0-11.027-8.972-20-20-20H60c-11.028 0-20 8.973-20 20V274.9L0 304.652V107.999c0-33.084 26.916-60 60-60h392c33.084 0 60 26.916 60 60v196.653Z"
                                        data-original="#000000"></path>
                                </g>
                            </svg>

                        </div>
                        {{-- Email Error Message --}}
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="text-gray-800 text-sm mb-2 block">Address </label>
                        <div class="relative flex items-center">
                            {{--  Address --}}
                            <input name="address" type="text"
                                class="text-gray-800 bg-white border border-gray-300 w-full text-sm px-4 py-2.5 rounded-md outline-blue-500"
                                placeholder="Enter Address" />

                            <svg fill="#bbb" stroke="#bbb" class="w-5 h-5 absolute right-3" viewBox="0 0 100 100"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M49,18.92A23.74,23.74,0,0,0,25.27,42.77c0,16.48,17,31.59,22.23,35.59a2.45,2.45,0,0,0,3.12,0c5.24-4.12,22.1-19.11,22.1-35.59A23.74,23.74,0,0,0,49,18.92Zm0,33.71a10,10,0,1,1,10-10A10,10,0,0,1,49,52.63Z" />
                            </svg>

                        </div>
                        {{-- Address Error Message --}}
                        @error('address')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="text-gray-800 text-sm mb-2 block">Password</label>
                        <div class="relative flex items-center">
                            {{--  Password --}}
                            <input id="passwordn" name="password" type="password"
                                class="text-gray-800 bg-white border border-gray-300 w-full text-sm px-4 py-2.5 rounded-md outline-blue-500"
                                placeholder="Enter password" />
                        </div>
                        {{-- Password error message --}}
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="text-gray-800 text-sm mb-2 block">Confirm Password</label>
                        <div class="relative flex items-center">
                            {{--  Password Confirmation --}}
                            <input id="password" name="password_confirmation" type="password"
                                class="text-gray-800 bg-white border border-gray-300 w-full text-sm px-4 py-2.5 rounded-md outline-blue-500"
                                placeholder="Enter password" />
                            <button type="button" id="togglePassword"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-600">
                                {{--  Open Eye Icon --}}
                                <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                    class="w-[18px] h-[18px] cursor-pointer" viewBox="0 0 128 128">
                                    <path
                                        d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z"
                                        data-original="#000000"></path>
                                </svg>

                                {{--  Slashed Eye Icon (Closed By Default) --}}
                                <svg id="eyeSlashIcon" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="122.879px"
                                    height="79.699px" viewBox="0 0 122.879 79.699" fill="#bbb" stroke="#bbb"
                                    class="w-[18px] hidden h-[18px] cursor-pointer">

                                    <path
                                        d="M0.955,37.326c2.922-3.528,5.981-6.739,9.151-9.625C24.441,14.654,41.462,7.684,59.01,7.334 c6.561-0.131,13.185,0.665,19.757,2.416l-5.904,5.904c-4.581-0.916-9.168-1.324-13.714-1.233 c-15.811,0.316-31.215,6.657-44.262,18.533l0,0c-2.324,2.115-4.562,4.39-6.702,6.82c4.071,4.721,8.6,8.801,13.452,12.227 c2.988,2.111,6.097,3.973,9.296,5.586l-5.262,5.262c-2.782-1.504-5.494-3.184-8.12-5.039c-6.143-4.338-11.813-9.629-16.78-15.85 C-0.338,40.563-0.228,38.59,0.955,37.326L0.955,37.326L0.955,37.326z M96.03,0l5.893,5.893L28.119,79.699l-5.894-5.895L96.03,0 L96.03,0z M97.72,17.609c4.423,2.527,8.767,5.528,12.994,9.014c3.877,3.196,7.635,6.773,11.24,10.735 c1.163,1.277,1.22,3.171,0.226,4.507c-4.131,5.834-8.876,10.816-14.069,14.963C95.119,67.199,79.338,72.305,63.352,72.377 c-6.114,0.027-9.798-3.141-15.825-4.576l3.545-3.543c4.065,0.705,8.167,1.049,12.252,1.031c14.421-0.064,28.653-4.668,40.366-14.02 c3.998-3.191,7.706-6.939,11.028-11.254c-2.787-2.905-5.627-5.543-8.508-7.918c-4.455-3.673-9.042-6.759-13.707-9.273L97.72,17.609 L97.72,17.609z M61.44,18.143c2.664,0,5.216,0.481,7.576,1.359l-5.689,5.689c-0.619-0.079-1.248-0.119-1.886-0.119 c-4.081,0-7.775,1.654-10.449,4.328c-2.674,2.674-4.328,6.369-4.328,10.45c0,0.639,0.04,1.268,0.119,1.885l-5.689,5.691 c-0.879-2.359-1.359-4.912-1.359-7.576c0-5.995,2.43-11.42,6.358-15.349C50.02,20.572,55.446,18.143,61.44,18.143L61.44,18.143z M82.113,33.216c0.67,2.09,1.032,4.32,1.032,6.634c0,5.994-2.43,11.42-6.357,15.348c-3.929,3.928-9.355,6.357-15.348,6.357 c-2.313,0-4.542-0.361-6.633-1.033l5.914-5.914c0.238,0.012,0.478,0.018,0.719,0.018c4.081,0,7.775-1.652,10.449-4.326 s4.328-6.369,4.328-10.449c0-0.241-0.006-0.48-0.018-0.72L82.113,33.216L82.113,33.216z" />
                                </svg>
                            </button>
                        </div>
                        {{-- Password Confrimation Error Message --}}
                        @error('password_confirmation')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{--  Terms and Condition --}}
                    <div class="flex items-center">
                        <input id="accept" name="accept" type="checkbox"
                            class="h-4 w-4 shrink-0 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" />
                        <label for="accept" class="ml-3 block text-sm text-gray-800">
                            I accept the <a href="javascript:void(0);"
                                class="text-blue-600 font-semibold hover:underline ml-1">Terms and Conditions</a>
                        </label>
                    </div>
                    {{-- Terms and Condition error message --}}
                    @error('agree')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{--  Submit Button --}}
                <div class="!mt-12">
                    <button type="submit"
                        class="w-full py-3 px-4 tracking-wider text-sm rounded-md text-white bg-gray-700 hover:bg-gray-800 focus:outline-none">
                        Create an account
                    </button>
                </div>
                {{-- ALready have an Account --}}
                <p class="text-gray-800 text-sm mt-6 text-center">Already have an account? <a href="{{ route('login') }}"
                        class="text-blue-600 font-semibold hover:underline ml-1">Login here</a></p>
            </form>
        </div>
    </div>
@endsection
