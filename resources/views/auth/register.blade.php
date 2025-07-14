<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register — Teyvat Booking</title>

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
            coral: '#fb7185',
            ocean: '#38bdf8',
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
      animation: gradientMove 18s ease infinite;
    }

    @keyframes gradientMove {
      0%, 100% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
    }

    .glass-card {
      background: rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .hover-glow:hover {
      box-shadow: 0 0 15px rgba(251, 113, 133, 0.3);
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center px-4 py-10">

  <div class="w-full max-w-md glass-card rounded-2xl shadow-2xl p-8">

    <!-- Heading -->
    <h2 class="text-3xl font-bold text-center text-coral mb-6">Create Your Teyvat Account</h2>

    <!-- Laravel Register Form -->
    <form method="POST" action="{{ route('register') }}" class="space-y-5">
      @csrf

      <!-- Name -->
      <div>
        <label for="name" class="block text-sm font-medium text-white mb-1">Full Name</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required
          class="w-full px-4 py-3 border border-white/20 bg-white/10 text-white rounded-lg placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-coral" />
        @error('name')
          <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block text-sm font-medium text-white mb-1">Email Address</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required
          class="w-full px-4 py-3 border border-white/20 bg-white/10 text-white rounded-lg placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-coral" />
        @error('email')
          <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block text-sm font-medium text-white mb-1">Password</label>
        <input type="password" id="password" name="password" required
          class="w-full px-4 py-3 border border-white/20 bg-white/10 text-white rounded-lg placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-coral" />
        @error('password')
          <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- Confirm Password -->
      <div>
        <label for="password_confirmation" class="block text-sm font-medium text-white mb-1">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required
          class="w-full px-4 py-3 border border-white/20 bg-white/10 text-white rounded-lg placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-coral" />
      </div>

      <!-- Register Button -->
      <div>
        <button type="submit"
          class="w-full bg-gradient-to-r from-palm to-coral text-white font-semibold py-3 rounded-lg transition hover:scale-105 hover-glow">
          Sign Up
        </button>
      </div>
    </form>

    <!-- Login Link -->
    <p class="text-center text-sm text-white/80 mt-6">
      Already have an account?
      <a href="{{ route('login') }}" class="text-ocean font-semibold hover:underline">Login here</a>
    </p>
  </div>

</body>
</html>
