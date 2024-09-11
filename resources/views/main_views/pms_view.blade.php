<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @if (Route::is('frontdesk.reservations'))
        <meta name="csrf-token" content="{{ csrf_token() }}">
    @endif

    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    {{-- Navbars --}}


    @if (Auth::guard('staff')->user()->role == 'Front Desk')
        @include('sub_views (PMS).components.navbars.FrontDesk_navbar')
    @elseif (Auth::guard('staff')->user()->role == 'Food&Beverages')
        @include('sub_views (PMS).components.navbars.FOB_navbar')
    @endif
    {{-- Side Bars --}}
    @if (Auth::guard('staff')->user()->role == 'Front Desk')
        @include('sub_views (PMS).components.sidebars.FrontDesk_sidebar')
    @elseif (Auth::guard('staff')->user()->role == 'Food&Beverages')
        @include('sub_views (PMS).components.sidebars.FOB_sidebar')
    @endif
    @if (Route::is('frontdesk.stafflist'))
    @include('sub_views (PMS).components.addmodal')
    @endif
    @include('sub_views (PMS).components.successtoast')

    {{-- @include('sub_views (PMS).components.displayDrawerRoom') --}}

    @include('sub_views (PMS).components.modal')

    <!-- Offcanvas -->
    <!-- Offcanvas container -->



    <main>
        @yield('content')
    </main>

</body>

</html>
