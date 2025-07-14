<div class="flex min-h-screen bg-gradient-to-br from-orange-50 via-pink-100 to-yellow-100 text-gray-900 font-sans">

    <!-- Sidebar -->
    <aside x-data="{ openProfile: false, openNotif: false }"
           class="w-64 bg-white/30 backdrop-blur-xl text-teal-900 shadow-lg border-r border-yellow-300/30">
        <div class="h-full flex flex-col">

            <!-- Logo -->
            <div class="px-6 py-4 flex items-center gap-2 border-b border-yellow-200/40">
                <svg class="h-6 w-6 text-amber-500" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path d="M9.75 17h4.5m-10.5 0H3.375a.375.375 0 0 1-.375-.375V6.75A2.25 2.25 0 0 1 5.25 4.5h13.5a2.25 2.25 0 0 1 2.25 2.25v9.875a.375.375 0 0 1-.375.375H20.25m-15 0h15M9.75 17a1.5 1.5 0 0 0 1.5 1.5h1.5a1.5 1.5 0 0 0 1.5-1.5"
                          stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span class="text-lg font-bold tracking-wide text-amber-600">Island Portal</span>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 px-4 py-6 space-y-3 text-sm">

                <!-- Dashboard -->
                <a href="{{ route('dashboard') }}"
                   class="block px-4 py-2 rounded-lg transition duration-200 {{ request()->routeIs('dashboard') ? 'bg-orange-200 text-amber-800 font-semibold' : 'hover:bg-orange-100 text-teal-800' }}">
                    🧭 Dashboard
                </a>

                <!-- Bookings -->
                <a href="{{ route('bookings.index') }}"
                   class="block px-4 py-2 rounded-lg transition duration-200 {{ request()->routeIs('bookings.index') ? 'bg-orange-200 text-amber-800 font-semibold' : 'hover:bg-orange-100 text-teal-800' }}">
                    📅 Bookings
                </a>

                <!-- Notifications Dropdown -->
                <div class="relative">
                    <button @click="openNotif = !openNotif"
                            class="w-full flex justify-between items-center px-4 py-2 rounded-lg hover:bg-orange-100 text-teal-800 transition duration-200">
                        <span>🔔 Notifications</span>
                        @if(auth()->user()->unreadNotifications->count())
                            <span class="ml-2 w-2 h-2 bg-red-500 rounded-full animate-ping"></span>
                        @endif
                    </button>

                    <div x-show="openNotif"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-2"
                         @click.outside="openNotif = false"
                         class="absolute left-full top-0 ml-2 w-80 bg-white/80 backdrop-blur-xl border border-yellow-300/40 rounded-lg shadow-lg z-50 text-sm text-gray-800">
                        <div class="p-4 font-semibold text-amber-700 border-b border-yellow-200/50">Recent Updates</div>
                        <ul class="max-h-64 overflow-y-auto divide-y divide-yellow-100/40">
                            @forelse(auth()->user()->unreadNotifications->take(5) as $notification)
                                <li class="px-4 py-2 hover:bg-yellow-50 transition duration-150">
                                    {{ $notification->data['message'] ?? 'New Notification' }}
                                </li>
                            @empty
                                <li class="px-4 py-2 text-gray-500">No new notifications</li>
                            @endforelse
                        </ul>
                        @if(auth()->user()->unreadNotifications->count())
                            <form method="POST" action="{{ route('notifications.markAllRead') }}" class="p-3 text-center">
                                @csrf
                                <button type="submit" class="text-pink-500 hover:underline">Mark all as read</button>
                            </form>
                        @endif
                    </div>
                </div>

                <!-- Profile Dropdown -->
                <div class="relative">
                    <button @click="openProfile = !openProfile"
                            class="w-full flex justify-between items-center px-4 py-2 rounded-lg hover:bg-orange-100 text-teal-800 transition duration-200">
                        <span>👤 {{ Auth::user()->name }}</span>
                        <svg class="h-4 w-4 text-teal-600" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                        </svg>
                    </button>
                    <div x-show="openProfile"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-2"
                         @click.outside="openProfile = false"
                         class="absolute left-full top-0 ml-2 mt-1 bg-white/90 border border-yellow-300/40 rounded-lg text-sm shadow text-gray-800">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-yellow-50 transition">⚙️ Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 hover:bg-yellow-50 transition">🚪 Logout</button>
                        </form>
                    </div>
                </div>

            </nav>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>
</div>
