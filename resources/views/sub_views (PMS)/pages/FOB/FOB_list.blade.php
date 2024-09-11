@extends('main_views.pms_view')
@section('title', 'Food And Drinks Lists')
@section('content')

    <!-- component -->
    <div class="container  mx-auto">

        <div class="w-full flex justify-between items-center mb-3 mt-1 pl-3">
            <div>
                <h3 class="text-lg font-semibold text-slate-800">Food and Drinks Lists</h3>
                <p class="text-slate-500">Overview of the current Food and Drinks Lists Offers.</p>
            </div>
            <div class="ml-3">
                <div class="w-full max-w-sm min-w-[200px] relative">
                    <div class="relative">
                        <input
                            class="bg-white w-full pr-11 h-10 pl-3 py-2 bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded transition duration-200 ease focus:outline-none focus:border-slate-400 hover:border-slate-400 shadow-sm focus:shadow-md"
                            placeholder="Search for invoice..." />
                        <button class="absolute h-8 w-8 right-1 top-1 my-auto px-2 flex items-center bg-white rounded "
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                stroke="currentColor" class="w-8 h-8 text-slate-600">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div
            class="relative flex flex-col w-full h-full overflow-scroll text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
            <table class="w-full text-left table-auto min-w-max">
                <thead>
                    <tr>
                        <th class="p-4 border-b border-slate-200 bg-slate-50">
                            <p class="text-sm font-normal leading-none text-slate-500">
                                Product Id
                            </p>
                        </th>
                        <th class="p-4 border-b border-slate-200 bg-slate-50">
                            <p class="text-sm font-normal leading-none text-slate-500">
                                Product Name
                            </p>
                        </th>
                        <th class="p-4 border-b border-slate-200 bg-slate-50">
                            <p class="text-sm font-normal leading-none text-slate-500">
                                Category
                            </p>
                        </th>
                        <th class="p-4 border-b border-slate-200 bg-slate-50">
                            <p class="text-sm font-normal leading-none text-slate-500">
                                Price
                            </p>
                        </th>
                        <th class="p-4 border-b border-slate-200 bg-slate-50">
                            <p class="text-sm font-normal leading-none text-slate-500">
                                Status
                            </p>
                        </th>
                        <th class="p-4 border-b border-slate-200 bg-slate-50">
                            <p class="text-sm font-normal leading-none text-slate-500">
                                Action
                            </p>
                        </th>
                    </tr>
                </thead>
                <tbody id="fob-container">
                    @foreach ($fobs as $fob)
                        <tr class="hover:bg-slate-50 border-b border-slate-200">
                            <td class="p-4 py-5">
                                <p class="block font-semibold text-sm text-slate-800">{{ $fob->product_id }}</p>
                            </td>
                            <td class="p-4 py-5">
                                <p class="text-sm text-slate-700">{{ $fob->product_name }}</p>
                            </td>
                            <td class="p-4 py-5">
                                <p class="text-sm text-slate-700">{{ $fob->category }}</p>
                            </td>
                            <td class="p-4 py-5">
                                <p class="text-sm text-slate-700">P {{ $fob->price }}</p>
                            </td>
                            <td class="p-4 py-5">
                                <p class="text-sm text-slate-700">{{ $fob->status }}</p>
                            </td>
                            <td class="p-4 py-5">
                                <p class="text-sm text-slate-700">
                                    @if ($fob->status == 'Available')
                                        <button type="button"
                                            class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Out
                                            of Stock
                                        </Button>
                                    @elseif('Not Available')
                                        <button type="button"
                                            class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Available
                                        </Button>
                                    @endif
                                </p>
                            </td>



                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="flex justify-between space-x-3 items-center px-4 py-3">
                {{ $fobs->links() }}
            </div>

        </div>


    </div>
@endsection
