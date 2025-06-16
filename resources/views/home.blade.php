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




        <h2 class="text-2xl md:text-3xl font-bold mb-12 text-center">
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600">
                Informasi Mahasiswa Magang
            </span>
        </h2>

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
</html>
