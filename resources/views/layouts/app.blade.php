<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Blog Home - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}" />
    <!-- Core theme CSS (includes Bootstrap)-->



    @vite(['resources/js/app.js'])
</head>

<body>

    {{-- Header --}}
    @yield('header')

    {{-- Main --}}
    @yield('content')

    {{-- Footer --}}
    @yield('footer')

</body>

</html>
