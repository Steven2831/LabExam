@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-pink-100 to-yellow-100 text-teal-900 py-10 px-4 sm:px-6">
    <div class="w-full max-w-4xl mx-auto bg-white/30 backdrop-blur-xl rounded-2xl shadow-xl p-10 border border-yellow-200/50 space-y-10">

        <h2 class="text-3xl font-bold text-amber-600 text-center">👤 Update Traveler Profile</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 mb-6 rounded-lg border border-green-300 text-center">
                {{ session('success') }}
            </div>
        @endif

        <!-- Profile Update Form -->
        <form method="POST" action="{{ route('profile.update') }}" class="space-y-6">
            @csrf
            @method('PATCH')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name -->
                <div>
                    <label class="block text-sm font-semibold text-amber-700 mb-1">Full Name</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                        class="w-full rounded-lg px-4 py-2 bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-amber-400"
                        required>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-semibold text-amber-700 mb-1">Email Address</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                        class="w-full rounded-lg px-4 py-2 bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-amber-400"
                        required>
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-semibold text-amber-700 mb-1">
                        New Password <span class="text-xs text-gray-500">(optional)</span>
                    </label>
                    <input type="password" name="password"
                        class="w-full rounded-lg px-4 py-2 bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-amber-400">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="block text-sm font-semibold text-amber-700 mb-1">Confirm Password</label>
                    <input type="password" name="password_confirmation"
                        class="w-full rounded-lg px-4 py-2 bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-amber-400">
                </div>
            </div>

            <div class="text-center pt-4">
                <button type="submit"
                    class="bg-amber-500 hover:bg-amber-600 text-white font-semibold py-2 px-8 rounded-lg transition">
                    🌴 Save Profile
                </button>
            </div>
        </form>

        <!-- Divider -->
        <hr class="border-yellow-300/50 my-10">

        <!-- Delete Account Form -->
        <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.')">
            @csrf
            @method('DELETE')

            <h3 class="text-xl font-bold text-red-500 mb-4 text-center">⚠️ Danger Zone</h3>

            <div class="max-w-md mx-auto">
                <label class="block text-sm font-semibold text-red-500 mb-1">Confirm Password</label>
                <input type="password" name="password"
                    class="w-full rounded-lg px-4 py-2 bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-red-400"
                    required>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

                <div class="text-center mt-4">
                    <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-8 rounded-lg transition">
                        🗑️ Delete Account
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
