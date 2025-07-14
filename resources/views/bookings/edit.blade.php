@extends('layouts.app')

@section('title', 'Edit Booking')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />

<div class="py-12 px-4 min-h-screen bg-gradient-to-br from-sky-100 via-yellow-50 to-pink-100">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-2xl rounded-2xl p-8 border-l-8 border-teal-400">
            <h2 class="text-3xl font-extrabold mb-6 text-center text-teal-600">✏️ Update Your Travel Plan</h2>

            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-3 mb-4 rounded-lg border border-green-300 text-center">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('bookings.update', $booking->id) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div>
                    <label for="title" class="block font-medium text-teal-700 mb-1">🏝️ Trip Title</label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        value="{{ old('title', $booking->title) }}"
                        required
                        class="w-full border border-teal-300 bg-white text-teal-900 rounded-lg p-3 shadow focus:ring-2 focus:ring-coral-400 focus:border-coral-400"
                    />
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block font-medium text-teal-700 mb-1">📝 Trip Description</label>
                    <textarea
                        name="description"
                        id="description"
                        rows="4"
                        required
                        class="w-full border border-teal-300 bg-white text-teal-900 rounded-lg p-3 shadow focus:ring-2 focus:ring-coral-400 focus:border-coral-400"
                    >{{ old('description', $booking->description) }}</textarea>
                </div>

                <!-- Hidden Date -->
                <input
                    type="hidden"
                    name="booking_date"
                    id="booking_date"
                    value="{{ \Carbon\Carbon::parse(old('booking_date', $booking->booking_date))->format('Y-m-d H:i') }}"
                />

                <!-- Calendar -->
                <div>
                    <label for="inline-calendar" class="block font-medium text-teal-700 mb-2">📅 Travel Date & Time</label>
                    <div
                        id="inline-calendar"
                        class="border border-teal-300 rounded-lg p-2 bg-white shadow-sm text-teal-900"
                    ></div>
                    <p class="text-teal-600 text-xs mt-1">Choose a new travel date and time for your adventure.</p>
                    @error('booking_date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="pt-4 text-center">
                    <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-white font-semibold py-3 px-6 rounded-lg transition shadow">
                        ✨ Update Booking
                    </button>
                </div>
            </form>

            <!-- Navigation Links -->
            <div class="mt-8 text-center space-y-3">
                <a href="{{ route('bookings.index') }}"
                   class="inline-block px-6 py-2 text-teal-700 border border-teal-400 rounded-lg hover:bg-teal-100 transition"
                >
                    &larr; Back to Bookings
                </a>

                <a href="{{ route('dashboard') }}"
                   class="inline-block px-6 py-2 bg-teal-600 text-white rounded-lg hover:bg-teal-700 transition"
                >
                    🏠 Go to Dashboard
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Flatpickr JS -->
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
