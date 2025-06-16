<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sidebar</title>

    <!-- Google Material Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" />

    <!-- Include your Vite CSS & JS -->
    @vite(['resources/css/sidebar.css', 'resources/js/sidebar.js'])

    <style>
        .icon-wrapper {
            background-color: #f0f4f8;
            padding: 10px;
            border-radius: 50%;
            transition: background-color 0.3s ease, transform 0.2s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .nav-link:hover .icon-wrapper {
            background-color: #e0f0ff;
            transform: scale(1.1);
        }

        .nav-icon {
            font-size: 20px;
            color: #333;
            transition: color 0.3s ease;
        }

        .nav-link:hover .nav-icon {
            color: #0077ff;
        }
    </style>
</head>
<body>
    <aside class="sidebar">
        <header class="sidebar-header">
            <a href="/data" class="header-logo">
                <img src="{{ asset('img/logobulat.png') }}" alt="PLN">
            </a>
            <button class="toggler sidebar-toggler" aria-label="Toggle Sidebar">
                <span class="material-symbols-rounded">chevron_left</span>
            </button>
            <button class="toggler menu-toggler" aria-label="Open Menu">
                <span class="material-symbols-rounded">menu</span>
            </button>
        </header>

        <nav class="sidebar-nav">
            <ul class="nav-list primary-nav">
                @php
                    $navItems = [
                        ['route' => '/data', 'icon' => 'school', 'label' => 'Data Mahasiswa'],
                        ['route' => route('divisis.index'), 'icon' => 'layers', 'label' => 'Divisi'], 
                        ['route' => route('admin.vision_mission.edit'), 'icon' => 'lightbulb', 'label' => 'Visi-Misi'],
                        ['route' => route('history.index'), 'icon' => 'history', 'label' => 'Histori'],
                    ];
                @endphp

                @foreach($navItems as $item)
                    <li class="nav-item">
                        <a href="{{ $item['route'] }}" class="nav-link">
                            <div class="icon-wrapper">
                                <span class="nav-icon material-symbols-rounded">{{ $item['icon'] }}</span>
                            </div>
                            <span class="nav-label">{{ $item['label'] }}</span>
                        </a>
                        <span class="nav-tooltip">{{ $item['label'] }}</span>
                    </li>
                @endforeach
            </ul>

            <ul class="nav-list secondary-nav">
                <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="nav-link btn-logout" aria-label="Logout">
                            <div class="icon-wrapper">
                                <span class="nav-icon material-symbols-rounded">logout</span>
                            </div>
                            <span class="nav-label">Logout</span>
                        </button>
                    </form>
                    <span class="nav-tooltip">Logout</span>
                </li>
            </ul>
        </nav>
    </aside>
</body>
</html>
