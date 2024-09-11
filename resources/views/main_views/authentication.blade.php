<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>


    @yield('main')


    <footer class="bg-gray-900 text-gray-300 py-6 px-16 font-sans tracking-wide">
        <div class="flex justify-between items-center max-lg:flex-col text-center flex-wrap gap-4">
            <p class="text-[15px] leading-loose">© ReadymadeUI. All rights reserved.</p>

            <ul class="flex space-x-6 gap-y-2 max-lg:justify-center flex-wrap">
                <li><a href="javascript:void(0)" class="text-[15px] hover:text-white">Terms of Service</a></li>
                <li><a href="javascript:void(0)" class="text-[15px] hover:text-white">Privacy Policy</a></li>
                <li><a href="javascript:void(0)" class="text-[15px] hover:text-white">Contact</a></li>
            </ul>
        </div>
    </footer>
</body>

</html>
