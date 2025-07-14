<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Inline Laravel-style red SVG favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml;base64,PHN2ZyBmaWxsPSIjZGMxNDQ3IiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCI+PHBhdGggZD0iTTEyIDMgTDIgOSA2IDkgNiAxNSAxOCAxNSAxOCA5IDE4IDkgMTIgMTgiLz48L3N2Zz4=" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans antialiased bg-gradient-to-br from-sky-100 via-yellow-50 to-pink-100 text-gray-900 min-h-screen">
    <div class="min-h-screen flex flex-col">

        <!-- Navigation Bar -->
        @include('layouts.navigation') {{-- Top or sidebar navigation goes here --}}

        <!-- Optional Header -->
        @if (isset($header))
            <header class="bg-white/80 backdrop-blur-md shadow-md border-b border-pink-200 rounded-b-xl">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h1 class="text-3xl font-bold text-pink-600 tracking-wide flex items-center gap-2">
                        🏖️ {{ $header }}
                    </h1>
                </div>
            </header>
        @endif

        <!-- Main Page Content -->
        <main class="flex-grow">
            <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                @yield('content')
            </div>
        </main>

        <!-- Tropical Footer -->
        <footer class="bg-pink-50 border-t border-pink-200 py-4 text-center text-sm text-pink-600 font-medium">
            &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved. 🧳🌴✈️
        </footer>
    </div>
</body>
</html>
