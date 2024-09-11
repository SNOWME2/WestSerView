@extends('main_views.website_view')
@section('title')
    Rooms
@endsection
@section('main')
    <div class="max-w-7xl mx-auto p-6">
        <div class="bg-white p-4 shadow-md rounded-md">


            @foreach ($rooms as $room)
                <!-- Room Item 1 -->
                <div class="flex items-start mb-6">
                    <img src="{{ asset('assets/images/example-1.jpeg') }}" alt="Grand De Luxe Room"
                        class="w-32 h-32 object-cover rounded-md">
                    <div class="ml-4">
                        <h3 class="text-xl font-semibold">{{ $room->room_number }}</h3>
                        <p class="text-sm text-gray-600">{{ $room->room_type }}</p>
                        <p class="text-sm text-gray-500 mt-1">Newly refurbished Grand De Luxe Rooms</p>
                    </div>
                    <div class="ml-auto text-right">
                        <p class="text-xl font-semibold text-[#6c757d]">₱{{ $room->price }}</p>
                        <p class="text-sm text-gray-600">Per Night</p>
                        <p class="text-sm text-gray-500">Including taxes and fees</p> 
                        <form action="{{ route('show.room', ['roomid' => Crypt::encrypt($room->room_id)]) }}"
                            method="GET">
                            <button class="bg-[#6c757d] text-white px-4 py-2 rounded-md mt-2">Book Now</button>
                        </form>

                    </div>

                </div>
                <hr class="pb-4">
            @endforeach



            {{ $rooms->links('pagination::custom-pagination') }}


        </div>
    @endsection
