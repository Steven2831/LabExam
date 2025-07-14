<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Teyvat Booking — Tropical Portal</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />

  <!-- Tailwind Config -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            sand: '#fef3c7',
            ocean: '#38bdf8',
            coral: '#fb7185',
            palm: '#34d399',
            sunset: '#f472b6',
          },
          fontFamily: {
            sans: ['Inter', 'ui-sans-serif'],
          },
          boxShadow: {
            glow: '0 0 20px rgba(251, 113, 133, 0.4)',
          }
        }
      }
    };
  </script>

  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #fef3c7, #fcd34d, #fca5a5, #38bdf8);
      background-size: 400% 400%;
      animation: gradientMove 20s ease infinite;
      min-height: 100vh;
    }

    @keyframes gradientMove {
      0%, 100% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
    }

    .glass-box {
      background: rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .hover-glow:hover {
      box-shadow: 0 0 20px rgba(251, 113, 133, 0.3);
    }
  </style>
</head>
<body>

  <div class="min-h-screen px-4 py-12">
    <div class="w-full max-w-5xl mx-auto glass-box rounded-3xl p-10 shadow-2xl">

      <!-- Header -->
      <div class="text-center mb-10">
        <h1 class="text-5xl font-extrabold text-coral mb-3 tracking-tight">🌴 Teyvat Booking</h1>
        <p class="text-sand-700 text-lg font-light">Escape ordinary. Plan your perfect stay with a breeze.</p>
      </div>

      <!-- CTA Buttons -->
      <div class="flex flex-col sm:flex-row justify-center gap-6 mb-14">
        <a href="{{ route('register') }}"
           class="bg-gradient-to-r from-palm to-sunset text-white px-8 py-4 rounded-xl text-lg font-semibold flex items-center justify-center gap-2 transition duration-300 hover:scale-105 hover-glow">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2"
               viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 00-3-3.87M5 19v2m11-11a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
          Register
        </a>
        <a href="{{ route('login') }}"
           class="border-2 border-ocean text-ocean hover:bg-ocean hover:text-white px-8 py-4 rounded-xl text-lg font-semibold flex items-center justify-center gap-2 transition duration-300 hover:scale-105 hover-glow">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2"
               viewBox="0 0 24 24"><path d="M15 12H3m0 0l4-4m-4 4l4 4m13 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V5a3 3 0 013-3h7" /></svg>
          Login
        </a>
      </div>

      <!-- Features -->
      <div class="mb-16">
        <h2 class="text-3xl font-bold text-center text-palm mb-8">Why Choose Us?</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
          <div class="bg-white/30 p-6 rounded-xl border border-white/30 hover:shadow-xl transition hover:scale-105">
            <h3 class="font-semibold text-lg text-coral mb-2">📅 Instant Booking</h3>
            <p class="text-gray-700 text-sm">Book in real-time. No delays. No stress.</p>
          </div>
          <div class="bg-white/30 p-6 rounded-xl border border-white/30 hover:shadow-xl transition hover:scale-105">
            <h3 class="font-semibold text-lg text-coral mb-2">🔐 Secure Portal</h3>
            <p class="text-gray-700 text-sm">Your data stays private with top-grade protection.</p>
          </div>
          <div class="bg-white/30 p-6 rounded-xl border border-white/30 hover:shadow-xl transition hover:scale-105">
            <h3 class="font-semibold text-lg text-coral mb-2">📊 Admin Control</h3>
            <p class="text-gray-700 text-sm">Manage, track, and grow your bookings efficiently.</p>
          </div>
        </div>
      </div>

      <!-- CTA Banner -->
      <div class="mt-16 bg-gradient-to-r from-ocean/20 to-coral/10 border border-coral/30 rounded-xl p-8 text-center">
        <h2 class="text-2xl font-bold mb-4 text-ocean">Start Your Journey 🌺</h2>
        <p class="text-gray-700 mb-6 max-w-2xl mx-auto">
          Teyvat Booking is designed for tropical getaways, smart scheduling, and sunny satisfaction.
        </p>
        <a href="{{ route('register') }}"
           class="px-6 py-3 bg-coral text-white rounded-lg font-semibold text-lg transition hover:bg-pink-500 hover-glow">
          Let’s Go →
        </a>
      </div>

      <!-- Footer -->
      <footer class="text-center mt-12 pt-6 text-sm text-gray-600 border-t border-white/20">
        &copy; {{ date('Y') }} Teyvat Booking. Built for wanderers and planners alike. 🧳🌞
      </footer>

    </div>
  </div>

</body>
</html>
