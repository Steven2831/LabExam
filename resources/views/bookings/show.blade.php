@extends('layouts.app')

@section('title', 'View Booking')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-sky-100 via-yellow-50 to-pink-100 py-12 px-4 flex justify-center items-center">
    <div class="w-full max-w-2xl bg-white/90 rounded-2xl shadow-2xl border-l-8 border-pink-300 p-8 backdrop-blur-md">

        <h2 class="text-3xl font-extrabold text-pink-600 mb-6 flex items-center gap-2">
            <svg class="w-7 h-7 text-yellow-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            Booking Details 🧭
        </h2>

        <div class="space-y-6 text-gray-800">
            <div>
                <label class="block text-sm font-semibold text-pink-600">📌 Title</label>
                <p class="text-lg mt-1">{{ $booking->title }}</p>
            </div>

            <div>
                <label class="block text-sm font-semibold text-pink-600">📝 Description</label>
                <p class="text-base mt-1">{{ $booking->description }}</p>
            </div>

            <div>
                <label class="block text-sm font-semibold text-pink-600">📅 Booking Date & Time</label>
                <p class="text-base mt-1">{{ \Carbon\Carbon::parse($booking->booking_date)->format('F j, Y h:i A') }}</p>
            </div>
        </div>

        <div class="mt-8 text-right">
            <a href="{{ route('dashboard') }}" class="inline-block px-5 py-2 bg-pink-500 text-white rounded-lg hover:bg-pink-600 transition font-semibold shadow-md">
                ← Back to Dashboard
            </a>
        </div>
    </div>
</div>
@endsection
