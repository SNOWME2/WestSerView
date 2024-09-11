@extends('main_views.authentication')

@section('title')
    Login
@endsection
@section('main')
    <div class="font-[sans-serif]">
        <div class="min-h-screen flex flex-col items-center justify-center">
            <div
                class="grid md:grid-cols-2 items-center gap-4 max-md:gap-8 max-w-6xl max-md:max-w-lg w-full p-4 m-4 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] rounded-md">
                <div class="md:max-w-md w-full px-4 py-4">
                    {{-- Login Form --}}
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-12">
                            <h3 class="text-gray-800 text-3xl font-extrabold">Login</h3>
                            <p class="text-sm mt-4 text-gray-800">Don't have an account <a href="{{ route('register') }}"
                                    class="text-blue-600 font-semibold hover:underline ml-1 whitespace-nowrap">Register
                                    here</a></p>
                        </div>
                        {{-- Email --}}
                        <div>
                            <label class="text-gray-800 text-xs block mb-2">Email</label>
                            <div class="relative flex items-center">
                                <input name="email" type="text" required
                                    class="w-full text-gray-800 text-sm border-b border-gray-300 focus:border-blue-600 px-2 py-3 outline-none"
                                    placeholder="Enter email" />
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                    class="w-[18px] h-[18px] absolute right-2" viewBox="0 0 682.667 682.667">
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
                        </div>

                        {{-- Password --}}
                        <div class="mt-8">
                            <label class="text-gray-800 text-xs block mb-2">Password</label>
                            <div class="relative flex items-center">
                                <input name="password" type="password" id="password" required
                                    class="w-full text-gray-800 text-sm border-b border-gray-300 focus:border-blue-600 px-2 py-3 outline-none"
                                    placeholder="Enter password" />
                                {{--  Toggle Password Peek --}}
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
                                    <svg id="eyeSlashIcon" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                        width="122.879px" height="79.699px" viewBox="0 0 122.879 79.699" fill="#bbb"
                                        stroke="#bbb" class="w-[18px] hidden h-[18px] cursor-pointer">
                                        <path
                                            d="M0.955,37.326c2.922-3.528,5.981-6.739,9.151-9.625C24.441,14.654,41.462,7.684,59.01,7.334 c6.561-0.131,13.185,0.665,19.757,2.416l-5.904,5.904c-4.581-0.916-9.168-1.324-13.714-1.233 c-15.811,0.316-31.215,6.657-44.262,18.533l0,0c-2.324,2.115-4.562,4.39-6.702,6.82c4.071,4.721,8.6,8.801,13.452,12.227 c2.988,2.111,6.097,3.973,9.296,5.586l-5.262,5.262c-2.782-1.504-5.494-3.184-8.12-5.039c-6.143-4.338-11.813-9.629-16.78-15.85 C-0.338,40.563-0.228,38.59,0.955,37.326L0.955,37.326L0.955,37.326z M96.03,0l5.893,5.893L28.119,79.699l-5.894-5.895L96.03,0 L96.03,0z M97.72,17.609c4.423,2.527,8.767,5.528,12.994,9.014c3.877,3.196,7.635,6.773,11.24,10.735 c1.163,1.277,1.22,3.171,0.226,4.507c-4.131,5.834-8.876,10.816-14.069,14.963C95.119,67.199,79.338,72.305,63.352,72.377 c-6.114,0.027-9.798-3.141-15.825-4.576l3.545-3.543c4.065,0.705,8.167,1.049,12.252,1.031c14.421-0.064,28.653-4.668,40.366-14.02 c3.998-3.191,7.706-6.939,11.028-11.254c-2.787-2.905-5.627-5.543-8.508-7.918c-4.455-3.673-9.042-6.759-13.707-9.273L97.72,17.609 L97.72,17.609z M61.44,18.143c2.664,0,5.216,0.481,7.576,1.359l-5.689,5.689c-0.619-0.079-1.248-0.119-1.886-0.119 c-4.081,0-7.775,1.654-10.449,4.328c-2.674,2.674-4.328,6.369-4.328,10.45c0,0.639,0.04,1.268,0.119,1.885l-5.689,5.691 c-0.879-2.359-1.359-4.912-1.359-7.576c0-5.995,2.43-11.42,6.358-15.349C50.02,20.572,55.446,18.143,61.44,18.143L61.44,18.143z M82.113,33.216c0.67,2.09,1.032,4.32,1.032,6.634c0,5.994-2.43,11.42-6.357,15.348c-3.929,3.928-9.355,6.357-15.348,6.357 c-2.313,0-4.542-0.361-6.633-1.033l5.914-5.914c0.238,0.012,0.478,0.018,0.719,0.018c4.081,0,7.775-1.652,10.449-4.326 s4.328-6.369,4.328-10.449c0-0.241-0.006-0.48-0.018-0.72L82.113,33.216L82.113,33.216z" />
                                    </svg>

                                </button>

                            </div>
                        </div>
                        {{-- Remember Me Toggle --}}
                        <div class="flex flex-wrap items-center justify-between gap-4 mt-6">
                            <div class="flex items-center">
                                <input id="remember" name="remember" type="checkbox"
                                    class="h-4 w-4 shrink-0 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" />
                                <label for="remember" class="ml-3 block text-sm text-gray-800">
                                    Remember me
                                </label>
                            </div>
                            {{-- Forgot Passowrd Link --}}
                            <div>
                                <a href="jajvascript:void(0);" class="text-blue-600 font-semibold text-sm hover:underline">
                                    Forgot Password?
                                </a>
                            </div>
                        </div>
                        @if ($errors->any())
                            <div class="mt-4 text-sm text-red-600">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {{-- Submit Button --}}
                        <div class="mt-12">
                            <button type="submit"
                                class="w-full shadow-xl py-2.5 px-4 text-sm tracking-wide rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                                Log in
                            </button>
                        </div>


                    </form>
                </div>
                {{-- RIght Image Pane --}}
                <div class="md:h-full bg-[#f5f2d6] rounded-xl lg:p-12 p-8">

                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                        xmlns:svgjs="http://svgjs.dev/svgjs" width="500" height="500"
                        viewBox="0 0 300 328.8427139282226" class="svg-animations w-full h-full object-contain"
                        style="background-color: rgb(66, 103, 207);"><svg viewBox="0 0 150.987060546875 139" width="200"
                            height="200" style="fill: rgb(253, 255, 226);" x="50" y="27.403559494018538"><svg
                                width="151" height="134" viewBox="0 0 151 134" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0)">
                                    <path
                                        d="M33.2858 67.2938H33.4162C51.7027 67.2938 66.6761 52.3295 66.6761 34.0254V33.8949C66.6761 15.6038 51.7157 0.626465 33.4162 0.626465H33.2858C14.9994 0.626465 0.0258789 15.5907 0.0258789 33.8949V34.0254C0.0258789 52.3295 14.9863 67.2938 33.2858 67.2938Z" />
                                    <path
                                        d="M150.909 134L84.3236 133.961C84.3105 133.53 84.2844 133.087 84.2844 132.656L84.3366 33.3076C84.3627 14.9773 99.3622 -0.0130379 117.688 8.50951e-06C136.013 0.013055 151 15.0165 151 33.3467L150.948 132.695C150.935 133.139 150.922 133.569 150.909 134Z" />
                                    <path
                                        d="M66.6371 133.961L0.0259826 133.922C0.0259826 133.7 0.0129395 133.491 0.0129395 133.269L0.0259826 116.27C0.0390257 97.9396 15.0386 82.9492 33.3642 82.9492C51.6767 82.9753 66.6632 97.9787 66.6632 116.309L66.6502 133.308C66.6502 133.517 66.6371 133.739 66.6371 133.961Z" />
                                </g>
                            </svg></svg><text fill="#fdffe2" font-family="Verdana" font-size="38px" x="102.70162582397461"
                            y="265.5709217071533">
                            <tspan dy="0" x="102.70162582397461">WSV</tspan>
                        </text><text fill="#fdffe2" font-family="Arial" font-size="18px" x="96.14938354492188"
                            y="297.80416755676265">
                            <tspan dy="0" x="96.14938354492188">WestSerView</tspan>
                        </text></svg>
                </div>
            </div>
        </div>
    </div>


@endsection
