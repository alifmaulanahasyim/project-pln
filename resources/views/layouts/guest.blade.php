<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    
    <!-- Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 50%, #fef3c7 100%);
        }
        
        .glass-effect {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.98);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 8px 32px rgba(251, 191, 36, 0.15);
        }
        
        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }
        
        .floating-animation:nth-child(2) {
            animation-delay: 2s;
        }
        
        .floating-animation:nth-child(3) {
            animation-delay: 4s;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .blob {
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            animation: blob-anim 7s ease-in-out infinite;
        }
        
        .blob:nth-child(2) {
            animation-delay: 2s;
        }
        
        @keyframes blob-anim {
            0%, 100% { border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%; }
            25% { border-radius: 58% 42% 75% 25% / 76% 46% 54% 24%; }
            50% { border-radius: 50% 50% 33% 67% / 55% 27% 73% 45%; }
            75% { border-radius: 33% 67% 58% 42% / 63% 68% 32% 37%; }
        }
        
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px -12px rgba(251, 191, 36, 0.35);
        }
        
        .logo-glow {
            filter: drop-shadow(0 4px 8px rgba(251, 191, 36, 0.2));
            transition: all 0.3s ease;
        }
        
        .logo-glow:hover {
            filter: drop-shadow(0 8px 16px rgba(251, 191, 36, 0.4));
            transform: scale(1.05);
        }
        
    </style>
</head>
<body class="font-sans antialiased min-h-screen overflow-auto">

    <!-- Animated Background -->
    <div class="fixed inset-0 gradient-bg">
        <!-- Floating geometric shapes -->
        <div class="absolute top-20 left-20 w-24 h-24 bg-white/20 rounded-full floating-animation"></div>
        <div class="absolute top-40 right-32 w-16 h-16 bg-white/15 rounded-full floating-animation"></div>
        <div class="absolute bottom-32 left-40 w-20 h-20 bg-white/20 rounded-full floating-animation"></div>
        
        <!-- Animated blobs -->
        <div class="absolute top-0 left-0 w-72 h-72 bg-white/10 blob -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-white/10 blob translate-x-1/2 translate-y-1/2"></div>
    </div>
    
    <!-- Main Content -->
    <div class="relative z-10 min-h-screen flex flex-col items-center justify-center px-4 sm:px-6 lg:px-8">
        <!-- Logo -->
<div class="mt-12 mb-8">
    <a href="/" class="block">
        <img class="w-auto h-12 sm:h-16 logo-glow transition-all duration-300" 
             src="{{ asset('img/logopln.png') }}" 
             alt="Logo">
    </a>
</div>
        
        <!-- Main Card -->
<!-- In your guest.blade.php layout -->
<div class="glass-effect rounded-3xl p-6 sm:p-8 pb-12 card-hover shadow-2xl">
    
    @php
        $route = Route::currentRouteName();
    @endphp

    @if ($route === 'login')
        <div class="text-center mb-8">
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-2">
                Welcome Back
            </h1>
            <p class="text-gray-600 text-sm sm:text-base">
                Sign in to your account to continue
            </p>
        </div>
    @elseif ($route === 'register')
        <div class="text-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Create an Account</h2>
            <p class="text-sm text-gray-500">Use a Gmail address and a secure password</p>
        </div>
    @endif

    <!-- Slot for the form -->
    <div class="space-y-6">
        {{ $slot }}
    </div>
</div>

    </div>
    
    <!-- Additional floating elements -->
    <div class="fixed inset-0 pointer-events-none">
        <div class="absolute top-1/4 left-10 w-2 h-2 bg-white/20 rounded-full animate-pulse"></div>
        <div class="absolute top-3/4 right-20 w-1 h-1 bg-white/30 rounded-full animate-pulse" style="animation-delay: 1s;"></div>
        <div class="absolute bottom-1/4 left-1/3 w-1.5 h-1.5 bg-white/25 rounded-full animate-pulse" style="animation-delay: 2s;"></div>
    </div>
</body>
</html>