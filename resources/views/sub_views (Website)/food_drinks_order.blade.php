@extends('main_views.website_view')

@section('title')
    {{ $fob->product_name }}
@endsection
@section('main')
    <section class="py-8 bg-white md:py-16 dark:bg-gray-900 antialiased">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
                <!-- Product Image -->
                <div class="shrink-0 max-w-md lg:max-w-lg mx-auto">
                    <img class="w-full object-contain" src="{{ asset('assets/images/brooke-lark-R18ecx07b3c-unsplash.jpg') }}"
                        loading="lazy" alt="Product Image" />
                </div>

                <!-- Product Details -->
                <div class="mt-6 sm:mt-8 lg:mt-0">
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                        {{ $fob->product_name }}
                    </h1>
                    <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                        <p class="text-2xl font-extrabold text-gray-900 sm:text-3xl dark:text-white">
                            ${{ number_format($fob->price, 2) }}
                        </p>
                    </div>

                    {{-- <!-- Add to Cart Form --> {{ route('cart.add') }} --}}
                    <form action="{{ route('add.cart') }}" method="POST" class="mt-6">
                        @csrf
                        <input class="hidden" type="text" name="product_id" value="{{ $fob->product_id }}">
                        <!-- Select Reservation -->
                        <div class="mb-4">
                            <label for="reservation_id"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Select
                                Reservation:</label>
                            <select name="reservation_id" id="reservation_id" required
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm dark:bg-gray-800 dark:text-gray-300">
                                <option value="" disabled selected>Select a reservation</option>
                                @foreach ($reservations as $reservation)
                                    <option value="{{ $reservation->reservation_id }}">
                                        Reservation ID:{{ $reservation->reservation_id }} - Room
                                        {{ $reservation->Rooms->room_number }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Catering Type -->
                        <div class="mb-4">
                            <label for="catering_type"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Catering Type:</label>
                            <select name="catering_type" id="catering_type" required
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm dark:bg-gray-800 dark:text-gray-300">
                                <option value="" disabled selected>Select catering type</option>
                                <option value="Breakfast">Breakfast</option>
                                <option value="Lunch">Lunch</option>
                                <option value="Dinner">Dinner</option>

                            </select>
                        </div>

                        <!-- Quantity -->
                        <div class="mb-4">
                            <label for="quantity"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Quantity:</label>
                            <input type="number" id="quantity" name="quantity" min="1" value="1" required
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm dark:bg-gray-800 dark:text-gray-300">
                        </div>

                        <!-- Add to Cart Button -->
                        <button type="submit"
                            class="text-white mt-4 sm:mt-0 bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800 flex items-center justify-center">
                            <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                            </svg>
                            Add to cart
                        </button>
                    </form>

                    <!-- Product Description -->
                    <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />
                    <p class="mb-6 text-gray-500 dark:text-gray-400">{{ $fob->description }}</p>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="mb-4">
                <ul class="text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </section>
@endsection
