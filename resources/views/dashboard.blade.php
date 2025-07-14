@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<script src="//unpkg.com/alpinejs" defer></script>

<div x-data="{ showBookings: false }" class="min-h-screen bg-gradient-to-br from-sky-200 via-yellow-100 to-orange-100 text-gray-800 py-10 px-6 flex flex-col">
    <div class="w-full max-w-6xl mx-auto space-y-10 flex-grow">

        <!-- ✅ Success Alert -->
        @if(session('success'))
            <div class="bg-green-100 text-green-800 border border-green-400 px-4 py-3 rounded-lg text-center font-medium shadow">
                {{ session('success') }}
            </div>
        @endif

        <!-- 🏖️ Welcome Card -->
        <div class="bg-white shadow-xl rounded-2xl p-8 border-l-8 border-teal-400">
            <h2 class="text-3xl font-extrabold text-teal-600">🌴 Welcome, {{ Auth::user()->name }}!</h2>
            <p class="text-teal-700 mt-2 text-lg">Explore your bookings and users in this tourism dashboard. ✈️</p>
        </div>

        <!-- 📊 Stats Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- 📘 Total Bookings -->
            <div 
                @click="showBookings = !showBookings"
                @keydown.enter.prevent="showBookings = !showBookings"
                @keydown.space.prevent="showBookings = !showBookings"
                class="cursor-pointer bg-sky-100 shadow-md p-6 rounded-xl border-l-4 border-sky-400 hover:bg-sky-200 transition-all duration-300"
                tabindex="0"
                role="button"
                title="Toggle bookings view"
            >
                <h4 class="text-sky-700 font-semibold text-xl">🧳 Total Bookings</h4>
                <p class="text-4xl font-bold text-sky-800 mt-2">{{ $totalBookings }}</p>
            </div>

            <!-- 👥 Total Users -->
            <a href="{{ route('users.index') }}" class="group block">
                <div class="bg-orange-100 shadow-md p-6 rounded-xl border-l-4 border-orange-400 hover:bg-orange-200 transition-all duration-300">
                    <h4 class="text-orange-700 font-semibold text-xl group-hover:text-orange-600">👥 Total Users</h4>
                    <p class="text-4xl font-bold text-orange-800 group-hover:text-orange-700 mt-2">{{ $totalUsers }}</p>
                </div>
            </a>
        </div>

        <!-- 🗓️ Booking List -->
        <div x-show="showBookings" x-transition class="bg-white p-6 rounded-2xl shadow-lg mt-6 border border-sky-200" style="display: none;">
            <h3 class="text-2xl font-semibold text-teal-700 mb-4">📅 Your Bookings</h3>

            @if ($bookings->count())
                <div class="space-y-4">
                    @foreach ($bookings as $booking)
                        <div class="bg-yellow-50 border border-yellow-200 p-4 rounded-xl shadow hover:shadow-lg transition">
                            <h4 class="text-xl font-bold text-yellow-800">🏖️ {{ $booking->title }}</h4>
                            <p class="text-sm text-yellow-700 mt-1">{{ $booking->description }}</p>
                            <p class="text-xs text-gray-600 mt-2">
                                📆 {{ \Carbon\Carbon::parse($booking->booking_date)->format('F j, Y h:i A') }}
                            </p>

                            <div class="mt-3 flex space-x-4 text-sm">
                                <a href="{{ route('bookings.edit', $booking->id) }}"
                                   class="text-sky-600 hover:text-sky-500 font-semibold underline transition">
                                    ✏️ Edit
                                </a>
                                <form method="POST" action="{{ route('bookings.destroy', $booking->id) }}"
                                      onsubmit="return confirm('Are you sure you want to delete this booking?');"
                                      class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-400 font-semibold underline transition">
                                        🗑 Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-teal-500 italic py-6">You currently have no bookings. Time to plan a trip! 🌍</p>
            @endif
        </div>
    </div>
</div>
@endsection
