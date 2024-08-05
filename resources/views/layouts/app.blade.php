<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" rel="stylesheet">
    <title>Online Reservation</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('style')
</head>
<body class="bg-gray-900">
@if(!isset($hideNavbar) || !$hideNavbar)
    @include('home.navbar')
@endif

@yield('sidebar')
@yield('body')


<script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
@yield('script')
</body>
</html>
