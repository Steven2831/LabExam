<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login — IT Tourist Booking</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

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
            sans: ['Inter', 'ui-sans-serif', 'system-ui']
          },
          boxShadow: {
            glow: '0 0 25px rgba(251, 113, 133, 0.4)',
          },
          keyframes: {
            float: {
              '0%, 100%': { transform: 'translateY(0)' },
              '50%': { transform: 'translateY(-12px)' },
            }
          },
          animation: {
            float: 'float 9s ease-in-out infinite',
          }
        }
      }
    };
  </script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #fef3c7, #fcd34d, #fca5a5, #38bdf8);
      background-size: 400% 400%;
      animation: gradientMove 15s ease infinite;
      min-height: 100vh;
      overflow-x: hidden;
    }

    @keyframes gradientMove {
      0%, 100% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
    }

    .blur-circle {
      position: absolute;
      border-radius: 9999px;
      filter: blur(100px);
      opacity: 0.25;
      z-index: 0;
    }
  </style>
</head>
<body class="relative flex items-center justify-center py-20 px-4">

  <!-- Floating Blur Decorations -->
  <div class="blur-circle w-96 h-96 bg-palm top-0 left-0 animate-float"></div>
  <div class="blur-circle w-72 h-72 bg-sunset top-32 right-0 animate-float"></div>
  <div class="blur-circle w-80 h-80 bg-coral bottom-0 left-1/2 -translate-x-1/2 animate-float"></div>

  <!-- Login Card -->
  <div class="relative z-10 w-full max-w-md bg-white/40 backdrop-blur-xl border border-white/30 shadow-2xl rounded-3xl p-8">

    <!-- Icon -->
    <div class="flex justify-center mb-4">
      <svg class="w-12 h-12 text-ocean" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path d="M12 4v16m8-8H4" />
      </svg>
    </div>

    <h2 class="text-3xl font-bold text-center text-coral mb-2">🌴 Welcome Back, Traveler</h2>
    <p class="text-center text-gray-700 mb-6">Login to your tropical booking escape</p>

    <!-- Form -->
    <form method="POST" action="{{ route('login') }}" class="space-y-5">
      @csrf

      <div>
        <label for="email" class="block text-sm font-medium text-gray-800 mb-1">Email</label>
        <input id="email" type="email" name="email" required autofocus
               class="w-full px-4 py-3 border border-white/30 bg-white/50 text-gray-900 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-ocean" />
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-gray-800 mb-1">Password</label>
        <input id="password" type="password" name="password" required
               class="w-full px-4 py-3 border border-white/30 bg-white/50 text-gray-900 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-ocean" />
      </div>

      <div class="flex items-center">
        <input id="remember_me" type="checkbox" name="remember"
               class="h-4 w-4 text-coral bg-white/40 border-white/30 rounded focus:ring-coral" />
        <label for="remember_me" class="ml-2 text-sm text-gray-700">Remember me</label>
      </div>

      <div>
        <button type="submit"
                class="w-full bg-gradient-to-r from-ocean to-palm text-white font-semibold py-3 rounded-xl hover:from-palm hover:to-ocean transition shadow-glow">
          Sign In
        </button>
      </div>
    </form>

    <!-- Links -->
    <div class="text-center text-sm text-gray-600 mt-6 space-y-2">
      @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}" class="text-ocean hover:underline">Forgot Password?</a><br>
      @endif
      <span>New here? 
        <a href="{{ route('register') }}" class="text-coral font-semibold hover:underline">Create an account</a>
      </span>
    </div>
  </div>
</body>
</html>
