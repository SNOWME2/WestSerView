@extends('main_views.pms_view')

@section('title','Rooms')

@section('content')

<div class="p-4">
    <!-- Small Navigation Bar -->
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold text-gray-900">Room List</h2>
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

        {{-- <a href="{{route('frontdesk.roomlist.single')}}">Single</a> --}}
    </div>
    


<ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 p-4  ">
    @foreach ($rooms as $room)
        
   
   
    <li class="col-span-1 divide-y divide-gray-200 rounded-lg bg-white shadow-md hover:cursor-pointer transition duration-300 hover:scale-110 hover:shadow-xl  ">
      <div class="flex w-full items-center justify-between space-x-6 p-6">
        <div class="flex-1 truncate">
          <div class="flex items-center space-x-3">
            <h3 class="truncate text-sm font-medium text-gray-900">{{$room->room_number}}</h3>
            <span class="inline-flex flex-shrink-0 items-center rounded-full bg-green-50 px-1.5 py-0.5 text-xs font-medium text-blue-600 ring-1 ring-inset ring-green-600/20">{{$room->room_type}}</span>
          </div>
          <p class="mt-1 truncate text-sm text-gray-500">Room ID : {{$room->room_id}}</p>
        </div>
        {{-- <img class="h-10 w-10 flex-shrink-0 rounded-full bg-gray-300" src="https://qph.cf2.quoracdn.net/main-thumb-554097988-200-xietklpojlcioqxaqgcyykzfxblvoqrb.jpeg" alt=""> --}}
      </div>
      <div>
        <div class="-mt-px flex divide-x divide-gray-200">
          <div class="flex w-0 flex-1">
            <a href="howpossible17@example.com" class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-bl-lg border border-transparent py-4 text-sm font-semibold ">
             
             Status
            </a>
          </div>
          <div class="-ml-px flex w-0 flex-1 relative  items-center justify-center gap-x-3 rounded-br-lg border border-transparent py-4 text-sm font-semibold @if ($room->status === 'Reserved')
              bg-green-800 text-zinc-50
          @endif ">
            
              
              {{$room->status}}
            
          </div>
        </div>
      </div>
    </li>
    @endforeach
  </ul>

  {{ $rooms->links('pagination::custom-pagination') }}

</div>

@endsection