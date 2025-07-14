<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans text-gray-800 antialiased bg-gradient-to-br from-yellow-50 via-sky-100 to-pink-100">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-10 sm:pt-0">

        <!-- Logo -->
        <div>
            <a href="/">
                <x-application-logo class="w-24 h-24 text-pink-400" />
            </a>
        </div>

        <!-- Card -->
        <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white/80 border border-pink-200 rounded-xl shadow-lg backdrop-blur-md">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
