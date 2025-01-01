<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="">
    <header class="header-container">
        <div>
            <a href="/">
                <img src="/header_logo.png" alt="header tech horizon iot programming">
            </a>
        </div>
        <div>
            <input type="text" placeholder="Search ...">
        </div>
        <nav>
            <a href="#">Themes</a>
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        </nav>
    </header>

    <div class="">
        {{ $slot }}
    </div>
    </div>

</body>

</html>
