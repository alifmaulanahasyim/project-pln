<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Magang</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/data.js'])
    <link href="img/favicon.ico" rel="shortcut icon">

    <style>
        /* Slideshow Background */
        @keyframes slideShow {
            0%   { background-image:url('img/viewpln.jpeg'); }
            33%  { background-image:url('img/viewpln2.jpeg'); }
            66%  { background-image:url('img/viewpln.jpeg'); }
            100% { background-image:url('img/viewpln2.jpeg'); }
        }
        .slideshow-bg{
            animation:slideShow 12s infinite;
            background-size:cover;
            background-position:center;
        }
         @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes shimmer {
            0% {
                background-position: -200% 0;
            }
            100% {
                background-position: 200% 0;
            }
        }
        
        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out;
        }
        
        .animate-shimmer {
            background: linear-gradient(
                90deg,
                #fbbf24 0%,
                #f59e0b 25%,
                #eab308 50%,
                #f59e0b 75%,
                #fbbf24 100%
            );
            background-size: 200% 100%;
            animation: shimmer 3s ease-in-out infinite;
        }
        @keyframes shimmer {
            0% {
                background-position: -200% 0;
            }
            100% {
                background-position: 200% 0;
            }
        }
        
        .animate-shimmer {
            background: linear-gradient(
                90deg,
                #fbbf24 0%,
                #f59e0b 25%,
                #eab308 50%,
                #f59e0b 75%,
                #fbbf24 100%
            );
            background-size: 200% 100%;
            animation: shimmer 3s ease-in-out infinite;
        }
    </style>
    
</head>

<body class="bg-gray-100 text-gray-900">
<x-header title="Welcome to PLN"/>

<section class="py-12 md:py-10 bg-gradient-to-b from-white to-blue-50">
    <div class="px-4 max-w-6xl mx-auto">
<div style="text-align: right;">
    <form method="POST" action="{{ route('logout') }}" class="logout-form">
        @csrf
        <button type="submit" class="logout-button">
            <span class="icon">&#x2192;</span> Logout
        </button>
    </form>
</div>
       <div class="text-center mb-16 animate-fade-in-up">
            <div class="relative inline-block">
                <!-- Decorative background blur -->
                <div class="absolute inset-0 bg-gradient-to-r from-yellow-500/30 to-blue-600/30 blur-3xl rounded-full transform scale-150"></div>
                
                <!-- Icon -->
                <div class="relative mb-6">
                    <div class="w-20 h-20 mx-auto bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-2xl flex items-center justify-center shadow-lg transform rotate-3 hover:rotate-0 transition-transform duration-300 border-2 border-yellow-300">
                        <svg class="w-10 h-10 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                </div>
                
                <!-- Main Title -->
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6 leading-tight">
                    <span class="block bg-clip-text text-transparent animate-shimmer">
                        Informasi
                    </span>
                    <span class="text-2xl block bg-clip-text text-transparent bg-gradient-to-r from-blue-400 via-yellow-400 to-blue-500 mt-1">
                        Mahasiswa Magang
                    </span>
                </h1>
                
                <!-- Decorative elements -->
                <div class="flex justify-center mt-8 space-x-2">
                    <div class="w-2 h-2 bg-yellow-400 rounded-full animate-bounce"></div>
                    <div class="w-2 h-2 bg-blue-500 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                    <div class="w-2 h-2 bg-yellow-500 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                </div>
            </div>
        </div>
        {{-- ───────────────── GRID WITH SCHEDULE & DIVISION CARDS ───────────────── --}}
    <div class="bg-white rounded-xl shadow-sm p-6 mb-8 border border-gray-100">
        <!-- Schedule and Division Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">
            <!-- Schedule Card -->
            <div class="bg-gradient-to-br from-blue-50 to-white rounded-xl p-5 border border-blue-100 relative overflow-hidden group">
                <div class="absolute -top-3 -right-3 w-14 h-14 bg-blue-200 opacity-20 rounded-full"></div>
                <div class="flex items-center space-x-4 z-10 relative">
                    <div class="bg-blue-100/80 rounded-lg p-3 group-hover:bg-blue-200/50 transition-all">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Buka di Hari</p>
                        <p class="text-xl font-bold text-gray-800">Senin - Jum'at</p>
                    </div>
                </div>
            </div>

            <!-- Division Cards -->
            @if($divisis->count())
                @foreach($divisis as $item)
                <div class="bg-gradient-to-br from-green-50 to-white rounded-xl p-5 border border-green-100 relative overflow-hidden group">
                    <div class="absolute -top-3 -right-3 w-14 h-14 bg-green-200 opacity-20 rounded-full"></div>
                    <div class="flex items-center space-x-4 z-10 relative">
                        <div class="bg-green-100/80 rounded-lg p-3 group-hover:bg-green-200/50 transition-all">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Divisi</p>
                            <p class="text-lg font-bold text-gray-800">{{ $item->divisi }}</p>
                            <p class="text-sm text-gray-500 mt-1">Kuota Maksimal</p>
                            <p class="text-xl font-bold text-green-600">{{ $item->sisa ?? '0' }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="bg-gray-100 rounded-xl p-6 text-center col-span-full border border-gray-200">
                    <svg class="w-8 h-8 text-gray-400 mb-2 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-gray-600">Belum ada data divisi yang tersedia</p>
                </div>
            @endif
        </div>

        <!-- Statistics Section -->
        <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800 mb-6 border-b pb-2 flex items-center">
                <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                </svg>
                Jumlah Mahasiswa Magang Setiap Divisi dan Status
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($countsByDivision as $divisi => $statuses)
                <div class="bg-white rounded-lg p-4 border border-gray-200">
                    <h4 class="font-medium text-gray-700 mb-3 flex items-center">
                        <svg class="w-4 h-4 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        {{ $divisi }}
                    </h4>
                    <ul class="space-y-2">
                        <li class="flex justify-between items-center">
                            <span class="text-gray-600">Diterima</span>
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs font-medium">{{ $statuses['Diterima'] ?? 0 }}</span>
                        </li>
                    </ul>
                </div>
                @endforeach
                <div class="bg-white rounded-lg p-4 border border-gray-200">
                    <h3 class="font-medium text-gray-700 mb-3 flex items-center">
                        <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                        Total Status Keseluruhan
                    </h3>
                    <ul class="space-y-3">
                        <li class="flex justify-between items-center py-2">
                            <span class="text-gray-600">Diterima</span>
                            <span class="font-medium">{{ $diterimaTotal }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div> {{-- /.container --}}
</section>

@if(session('success'))
    <div class="alert alert-success" role="alert">{{ session('success') }}</div>
@endif

<x-main class="relative slideshow-bg h-screen"/>
<x-footer/>
</body>
<script>
    // Cegah tombol "Back" kembali ke login
    if (performance.navigation.type === performance.navigation.TYPE_NAVIGATE) {
        history.replaceState(null, '', location.href);
    }
</script>
</html>
