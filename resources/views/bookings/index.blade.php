@extends('layouts.app')

@section('title', 'Bookings')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />

<style>
    #inline-calendar {
        width: 100%;
        font-size: 1rem;
    }

    .flatpickr-calendar {
        background-color: #fff7ed;
        color: #0f172a;
        border: 1px solid #fdba74;
    }

    .flatpickr-day {
        height: 2.5rem;
        width: 2.5rem;
        line-height: 2.5rem;
        font-size: 1rem;
        margin: 0.15rem;
        border-radius: 0.5rem;
    }

    .flatpickr-day.today {
        background-color: #f59e0b;
        color: white;
    }

    .flatpickr-day.selected {
        background-color: #ec4899;
        color: white;
    }

    .flatpickr-day:hover {
        background-color: #fde68a;
        color: #1e293b;
    }

    .flatpickr-time input {
        font-size: 1rem;
        height: 2.25rem;
        width: 3rem;
    }
</style>

<div class="py-12 px-4 min-h-screen bg-gradient-to-br from-sky-200 via-yellow-100 to-pink-100 text-gray-900">
    <div class="max-w-4xl mx-auto space-y-10">

        @if (session('success'))
            <div class="bg-green-100 text-green-800 border border-green-400 px-4 py-3 rounded-lg text-center font-medium shadow">
                {{ session('success') }}
            </div>
        @endif

        <!-- 🧳 Booking Form -->
        <section class="bg-white/90 border border-orange-200 rounded-2xl shadow-xl p-10 space-y-8">
            <h2 class="text-3xl font-extrabold text-pink-600 flex items-center gap-2">
                <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Plan Your Trip ✈️
            </h2>

            <form method="POST" action="{{ route('bookings.store') }}" class="space-y-6">
                @csrf

                <!-- 📍 Title -->
                <div>
                    <label for="title" class="block text-orange-600 font-semibold mb-1">Trip Title</label>
                    <input 
                        type="text" 
                        name="title" 
                        id="title" 
                        value="{{ old('title') }}"
                        required
                        placeholder="e.g., Island Getaway, Mountain Hike..."
                        class="w-full rounded-lg bg-white border border-yellow-300 p-3 shadow focus:ring-2 focus:ring-pink-400 focus:outline-none"
                    />
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- 📝 Description -->
                <div>
                    <label for="description" class="block text-orange-600 font-semibold mb-1">Trip Details</label>
                    <textarea 
                        name="description" 
                        id="description" 
                        rows="4"
                        required
                        placeholder="Tell us about your travel goals!"
                        class="w-full rounded-lg bg-white border border-yellow-300 p-3 shadow focus:ring-2 focus:ring-pink-400 focus:outline-none"
                    >{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Hidden Booking Date -->
                <input type="hidden" name="booking_date" id="booking_date" value="{{ old('booking_date') }}" />

                <!-- 📆 Calendar -->
                <div>
                    <label for="inline-calendar" class="block text-orange-600 font-semibold mb-2">Travel Date & Time</label>
                    <div id="inline-calendar" class="rounded-xl overflow-hidden border border-yellow-300 bg-white shadow"></div>
                    <p class="text-yellow-600 text-sm mt-2">Select your preferred schedule.</p>
                    @error('booking_date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- 🚀 Submit Button -->
                <div class="pt-6 text-right">
                    <button type="submit" class="inline-flex items-center gap-2 bg-pink-500 hover:bg-pink-600 active:bg-pink-700 transition px-6 py-3 rounded-lg text-white font-semibold shadow-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M5 13l4 4L19 7" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Book My Trip
                    </button>
                </div>
            </form>
        </section>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    const bookedDates = @json($bookedDates);
    const hiddenInput = document.getElementById("booking_date");

    flatpickr("#inline-calendar", {
        inline: true,
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        minDate: "today",
        disable: bookedDates,
        time_24hr: false,
        defaultDate: hiddenInput.value || null,
        onChange: function(selectedDates, dateStr) {
            hiddenInput.value = dateStr;
        }
    });
</script>
@endsection
