<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sidebar</title>
    <!-- Google Material Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Include your Vite CSS & JS -->
    @vite(['resources/css/sidebar.css', 'resources/js/sidebar.js'])
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            900: '#1e3a8a'
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .material-symbols-rounded {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .sidebar-collapsed .nav-label {
            opacity: 0;
            transform: translateX(-10px);
            pointer-events: none;
        }
        .sidebar-collapsed .nav-tooltip {
            opacity: 1;
            visibility: visible;
            transform: translateX(0);
        }
        .nav-tooltip {
            opacity: 0;
            visibility: hidden;
            transform: translateX(-10px);
            transition: all 0.2s ease;
        }
    </style>
</head>
<body class="bg-gray-50 overflow-x-hidden">
    <aside class="fixed left-0 top-0 h-screen w-64 bg-white shadow-xl border-r border-gray-200 transition-all duration-300 ease-in-out z-50 overflow-y-auto">
        <!-- Sidebar Header -->
        <header class="flex items-center justify-between p-4 border-b border-gray-100 bg-gradient-to-r from-primary-50 to-blue-50 flex-shrink-0">
            <a href="/data" class="flex items-center space-x-2 group min-w-0">
                <div class="w-8 h-8 bg-gradient-to-br from-primary-500 to-primary-700 rounded-lg flex items-center justify-center shadow-md group-hover:scale-110 transition-transform duration-200 flex-shrink-0">
                    <img src="{{ asset('img/logobulat.png') }}" alt="PLN" class="w-6 h-6 rounded object-cover">
                </div>
                <div class="nav-label transition-all duration-300 min-w-0">
                    <h1 class="font-bold text-gray-800 text-sm truncate">PLN Dashboard</h1>
                    <p class="text-xs text-gray-500 truncate">Management System</p>
                </div>
            </a>
        </header>

        <!-- Navigation -->
        <nav class="sidebar-nav p-3 flex-1 overflow-y-auto">
            <!-- Primary Navigation -->
            <div class="mb-6">
                <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3 px-2 nav-label">Main Menu</h2>
                <ul class="nav-list primary-nav space-y-1">
                    @php
                        $navItems = [
                            ['route' => '/data', 'icon' => 'school', 'label' => 'Data Mahasiswa', 'color' => 'blue'],
                            ['route' => route('divisis.index'), 'icon' => 'layers', 'label' => 'Divisi', 'color' => 'purple'],
                            ['route' => route('admin.vision_mission.edit'), 'icon' => 'lightbulb', 'label' => 'Visi-Misi', 'color' => 'yellow'],
                            ['route' => route('history.index'), 'icon' => 'history', 'label' => 'Histori', 'color' => 'green'],
                            ['route' => route('admin.users'), 'icon' => 'group', 'label' => 'Users', 'color' => 'indigo'],
                            ['route' => route('admin.laporanharian.index'), 'icon' => 'fact_check', 'label' => 'Laporan Harian', 'color' => 'teal'],
                        ];
                        
                        $colorClasses = [
                            'blue' => 'from-blue-100 to-blue-200 text-blue-600',
                            'purple' => 'from-purple-100 to-purple-200 text-purple-600',
                            'yellow' => 'from-yellow-100 to-yellow-200 text-yellow-600',
                            'green' => 'from-green-100 to-green-200 text-green-600',
                            'indigo' => 'from-indigo-100 to-indigo-200 text-indigo-600',
                            'teal' => 'from-teal-100 to-teal-200 text-teal-600',
                        ];
                    @endphp
                    
                    @foreach($navItems as $item)
                        <li class="nav-item group">
                            <a href="{{ $item['route'] }}" class="nav-link flex items-center space-x-2 p-2 rounded-lg transition-all duration-200 hover:bg-gradient-to-r hover:from-primary-50 hover:to-blue-50 hover:shadow-sm relative overflow-hidden">
                                <div class="icon-wrapper w-8 h-8 bg-gradient-to-br {{ $colorClasses[$item['color']] }} rounded-lg flex items-center justify-center transition-all duration-200 group-hover:scale-105 flex-shrink-0">
                                    <span class="nav-icon material-symbols-rounded text-sm">{{ $item['icon'] }}</span>
                                </div>
                                <span class="nav-label text-sm font-medium text-gray-700 group-hover:text-primary-700 transition-colors duration-200 truncate">{{ $item['label'] }}</span>
                                <div class="absolute inset-0 bg-gradient-to-r from-primary-500 to-blue-500 opacity-0 group-hover:opacity-5 transition-opacity duration-200 rounded-lg"></div>
                            </a>
                            <span class="nav-tooltip absolute left-16 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white px-2 py-1 rounded text-xs whitespace-nowrap shadow-lg z-10">{{ $item['label'] }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Secondary Navigation -->
            <div class="border-t border-gray-100 pt-4">
                <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3 px-2 nav-label">Account</h2>
                <ul class="nav-list secondary-nav space-y-1">
                    <li class="nav-item group">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="block">
                            @csrf
                            <button type="submit" class="nav-link btn-logout w-full flex items-center space-x-2 p-2 rounded-lg transition-all duration-300 hover:bg-gradient-to-r hover:from-red-50 hover:to-pink-50 hover:shadow-sm relative overflow-hidden group transform hover:scale-[1.01] focus:outline-none focus:ring-2 focus:ring-red-200 focus:ring-opacity-50" aria-label="Logout">
                                <!-- Animated background gradient -->
                                <div class="absolute inset-0 bg-gradient-to-r from-red-500 via-pink-500 to-red-600 opacity-0 group-hover:opacity-10 transition-all duration-300 rounded-lg"></div>
                                
                                <!-- Icon wrapper with enhanced styling -->
                                <div class="icon-wrapper relative z-10 w-8 h-8 bg-gradient-to-br from-red-100 via-red-200 to-pink-200 rounded-lg flex items-center justify-center transition-all duration-300 group-hover:scale-105 flex-shrink-0 border border-red-200 group-hover:border-red-300">
                                    <span class="nav-icon material-symbols-rounded text-red-600 text-sm group-hover:text-red-700 transition-all duration-300">logout</span>
                                </div>
                                
                                <!-- Label with enhanced typography -->
                                <span class="nav-label relative z-10 text-sm font-medium text-gray-700 group-hover:text-red-700 transition-all duration-300 truncate">Logout</span>
                                
                                <!-- Subtle shine effect -->
                                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white to-transparent opacity-0 group-hover:opacity-20 group-hover:translate-x-full transition-all duration-700 transform -translate-x-full rounded-lg"></div>
                            </button>
                        </form>
                        <span class="nav-tooltip absolute left-16 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white px-2 py-1 rounded text-xs whitespace-nowrap shadow-lg z-10">Logout</span>
                    </li>
                </ul>
            </div>
        </nav>
    </aside>
</body>
</html>