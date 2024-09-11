@extends('main_views.website_view')
@section('title', 'Dining')

@section('main')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-semibold text-center mb-8 text-gray-800">Our Menu</h1>

        <h4 class="text-32 font-semibold text-center mb-8 text-gray-400">{{ $message }}</h4>

        <div class="mb-6 flex flex-wrap justify-center gap-4">
            <a href="{{ route('foodlist', ['category' => 'all']) }}">
                <button
                    class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded transition duration-300 ease-in-out transform hover:scale-105">All</button>
            </a>
            <a href="{{ route('foodlist', ['category' => 'Appetizer']) }}">
                <button
                    class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded transition duration-300 ease-in-out transform hover:scale-105">Appetizers</button>
            </a>
            <a href="{{ route('foodlist', ['category' => 'Main Course']) }}">
                <button
                    class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded transition duration-300 ease-in-out transform hover:scale-105">Main
                    Course</button>
            </a>
            <a href="{{ route('foodlist', ['category' => 'Desert']) }}">
                <button
                    class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded transition duration-300 ease-in-out transform hover:scale-105">Desserts</button>
            </a>
            <a href="{{ route('foodlist', ['category' => 'beverages']) }}">
                <button
                    class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded transition duration-300 ease-in-out transform hover:scale-105">Beverages</button>
            </a>

        </div>
        <hr class="p-4">

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($fobs as $fob)
                <a href="{{ route('fobdetail', ['id' => Crypt::encrypt($fob->product_id)]) }}">
                    <div class="group relative bg-white rounded-lg shadow-md overflow-hidden transition duration-300 ease-in-out transform hover:scale-105 "
                        loading="lazy">
                        <img src="{{ asset('assets/images/brooke-lark-R18ecx07b3c-unsplash.jpg') }}"
                            alt="{{ $fob->product_name }}" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h2 class="text-xl font-semibold mb-2 text-gray-800">{{ $fob->product_name }}</h2>
                            <p class="text-gray-600 mb-4">{{ $fob->description }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-green-600">P{{ $fob->price }}</span>
                                <button id='modal-{{ $fob->product_id }}'
                                    class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded transition duration-300 ease-in-out">Order</button>
                            </div>
                        </div>

                        <!-- Tooltip -->
                        <div
                            class="absolute bottom-0 left-1/2 transform -translate-x-1/2 mb-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-gray-700 text-white text-sm rounded-lg px-2 py-1">
                            Click for details
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        {{ $fobs->links('pagination::custom-pagination') }}
    </div>
@endsection
