@extends('layouts.app')

@section('title', 'Tourist Portal - Users List')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>

<div class="min-h-screen bg-gradient-to-br from-yellow-100 via-pink-200 to-orange-300 text-gray-800 py-12 px-4 sm:px-6 lg:px-8 font-sans">
    <div class="max-w-6xl mx-auto bg-white/80 backdrop-blur-sm border border-orange-200 rounded-2xl shadow-2xl p-8 space-y-8">

        <!-- Title with Emoji -->
        <h1 class="text-4xl font-bold text-orange-700 text-center tracking-wide flex items-center justify-center gap-2">
            🌴 Tourist Users List 🌞
        </h1>

        <!-- Back Button -->
        <div>
            <a href="{{ route('dashboard') }}"
                class="inline-flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-4 rounded-full shadow transition duration-200">
                ← Back to Dashboard
            </a>
        </div>

        @if($users->count())
            <!-- Table -->
            <div class="overflow-x-auto rounded-xl border border-orange-200 shadow-lg">
                <table class="min-w-full bg-white text-sm text-left text-gray-700 table-auto rounded-xl overflow-hidden">
                    <thead class="bg-orange-200 text-orange-800 uppercase text-xs">
                        <tr>
                            <th class="px-6 py-4 border-b">🧍 Name</th>
                            <th class="px-6 py-4 border-b">📧 Email</th>
                            <th class="px-6 py-4 border-b">📅 Joined</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr class="hover:bg-orange-100 transition">
                                <td class="px-6 py-4 border-b">{{ $user->name }}</td>
                                <td class="px-6 py-4 border-b">{{ $user->email }}</td>
                                <td class="px-6 py-4 border-b text-sm text-gray-500">{{ $user->created_at->format('M d, Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-6 text-center">
                {{ $users->links('pagination::tailwind') }}
            </div>
        @else
            <p class="text-center text-orange-600 italic">🗺️ No users found in this tropical paradise.</p>
        @endif
    </div>
</div>
@endsection
