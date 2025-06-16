<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir PKL Student</title>
    <link href='img/favicon.ico' rel='shortcut icon'>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @vite(['resources/css/inputdivisi.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-blue-600 via-blue-700 to-blue-900 min-h-screen py-8 px-4" x-data="{ isOpen: false }">
    <main class="max-w-4xl mx-auto">
        <div class="container mx-auto bg-white shadow-2xl rounded-2xl overflow-hidden backdrop-blur-xl">
            <!-- Header Section -->
            <div class="bg-gradient-to-r from-blue-700 to-blue-900 p-8 text-white relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-full opacity-10">
                    <div class="absolute -top-20 -left-20 w-64 h-64 rounded-full bg-blue-400"></div>
                    <div class="absolute bottom-0 right-0 w-96 h-96 rounded-full bg-blue-500"></div>
                </div>
                <div class="relative z-10">
                    <h1 class="text-center text-4xl font-bold">Formulir Pendaftaran Magang</h1>
                    <p class="text-center mt-3 text-blue-100 text-lg">PT. PLN Nusantara Power Unit Pembangkit Belawan</p>
                </div>
            </div>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="bg-red-500 text-white p-4 rounded-lg mx-8 my-4 shadow-lg">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle mr-3 text-xl"></i>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <form id="data-pendaftaran-form" action="{{ route('insertform') }}" method="POST" class="p-8" @submit.prevent="isOpen = true; $el.submit();">
                @csrf

                <!-- Progress Indicator -->
                <div class="mb-8">
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-blue-600 h-2.5 rounded-full w-0 transition-all duration-500" id="progress-bar"></div>
                    </div>
                    <div class="flex justify-between mt-2 text-sm text-gray-500">
                        <span>Informasi Ketua</span>
                        <span>Informasi Anggota</span>
                        <span>Akademik</span>
                        <span>Selesai</span>
                    </div>
                </div>

                <!-- Info Cards -->
                <div class="mb-10 bg-blue-50 p-6 rounded-xl border border-blue-100 shadow-md">
                    <div class="flex items-center space-x-3 mb-4">
                        <i class="fas fa-user-graduate text-blue-600 text-xl"></i>
                        <h2 class="text-xl font-semibold text-gray-800">Informasi Ketua Tim</h2>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="w-full">
                            <label class="text-sm text-gray-600 font-medium" for="full-name">Nama Lengkap</label>
                            <div class="mt-1 relative">
                                <i class="fas fa-user text-gray-400 absolute top-3 left-3"></i>
                                <input type="text" id="full-name" name="nama" required
                                    class="w-full p-2 pl-10 bg-white rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Jenis Kelamin</label>
                            <div class="mt-1 relative">
                                <i class="fas fa-venus-mars text-gray-400 absolute top-3 left-3"></i>
                                <select name="jeniskelamin" required
                                    class="w-full p-2 pl-10 bg-white rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                    <option value="laki-laki">Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="w-full">
                            <label class="text-sm text-gray-600 font-medium" for="nim">NIM</label>
                            <div class="mt-1 relative">
                                <i class="fas fa-id-card text-gray-400 absolute top-3 left-3"></i>
                                <input type="text" id="nim" name="nim" required
                                    class="w-full p-2 pl-10 bg-white rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                            </div>
                        </div>

                        <div class="w-full">
                            <label class="text-sm text-gray-600 font-medium" for="nohp">Nomor HandPhone/WhatsApp</label>
                            <div class="mt-1 relative">
                                <i class="fab fa-whatsapp text-gray-400 absolute top-3 left-3"></i>
                                <input type="tel" id="nohp" name="nohp" required
                                    class="w-full p-2 pl-10 bg-white rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200" placeholder="+6287777777777">
                            </div>
                        </div>

                        <div class="w-full">
                            <label class="text-sm text-gray-600 font-medium" for="email">Email</label>
                            <div class="mt-1 relative">
                                <i class="fas fa-envelope text-gray-400 absolute top-3 left-3"></i>
                                <input type="email" id="email" name="email" required
                                    class="w-full p-2 pl-10 bg-white rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="space-y-8">
                    <!-- Personal Information Section -->
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 shadow-md transition-all duration-300 hover:shadow-lg">
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="bg-blue-100 rounded-full p-2">
                                <i class="fas fa-users text-blue-700"></i>
                            </div>
                            <h2 class="text-xl font-semibold text-gray-800">Informasi Anggota Tim</h2>
                        </div>

                        <div class="space-y-6">
                            <!-- Anggota 1 -->
                            <div class="p-4 bg-white rounded-lg shadow-sm">
                                <h3 class="text-md font-medium text-blue-600 mb-3 flex items-center">
                                    <i class="fas fa-user-circle mr-2"></i>Anggota 1
                                </h3>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-600">Nama</label>
                                        <input type="text" name="nama2" 
                                            class="mt-1 w-full p-2 bg-white rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-600">NIM</label>
                                        <input type="text" name="nim2" 
                                            class="mt-1 w-full p-2 bg-white rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-600">Jenis Kelamin</label>
                                        <select name="jeniskelamin2" 
                                            class="mt-1 w-full p-2 bg-white rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                                            <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                            <option value="laki-laki">Laki-Laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Additional members with collapse/expand functionality -->
                            <div x-data="{ expanded: false }">
                                <div class="p-4 bg-white rounded-lg shadow-sm" x-show="expanded" x-transition>
                                    <!-- Anggota 3-7 (collapsed by default) -->
                                    <div class="space-y-6">
                                        <!-- Anggota 3 -->
                                        <div>
                                            <h3 class="text-md font-medium text-blue-600 mb-3 flex items-center">
                                                <i class="fas fa-user-circle mr-2"></i>Anggota 2
                                            </h3>
                                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-600">Nama</label>
                                                    <input type="text" name="nama3" 
                                                        class="mt-1 w-full p-2 bg-white rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-600">NIM</label>
                                                    <input type="text" name="nim3" 
                                                        class="mt-1 w-full p-2 bg-white rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-600">Jenis Kelamin</label>
                                                    <select name="jeniskelamin3" 
                                                        class="mt-1 w-full p-2 bg-white rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                                                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                                        <option value="laki-laki">Laki-Laki</option>
                                                        <option value="perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <h3 class="text-md font-medium text-blue-600 mb-3 flex items-center">
                                                <i class="fas fa-user-circle mr-2"></i>Anggota 3
                                            </h3>
                                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-600">Nama</label>
                                                    <input type="text" name="nama4" 
                                                        class="mt-1 w-full p-2 bg-white rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-600">NIM</label>
                                                    <input type="text" name="nim4" 
                                                        class="mt-1 w-full p-2 bg-white rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-600">Jenis Kelamin</label>
                                                    <select name="jeniskelamin4" 
                                                        class="mt-1 w-full p-2 bg-white rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                                                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                                        <option value="laki-laki">Laki-Laki</option>
                                                        <option value="perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Anggota 5 -->
                                        <div>
                                            <h3 class="text-md font-medium text-blue-600 mb-3 flex items-center">
                                                <i class="fas fa-user-circle mr-2"></i>Anggota 4
                                            </h3>
                                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-600">Nama</label>
                                                    <input type="text" name="nama5" 
                                                        class="mt-1 w-full p-2 bg-white rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-600">NIM</label>
                                                    <input type="text" name="nim5" 
                                                        class="mt-1 w-full p-2 bg-white rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-600">Jenis Kelamin</label>
                                                    <select name="jeniskelamin5" 
                                                        class="mt-1 w-full p-2 bg-white rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                                                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                                        <option value="laki-laki">Laki-Laki</option>
                                                        <option value="perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Anggota 6 -->
                                        <div>
                                            <h3 class="text-md font-medium text-blue-600 mb-3 flex items-center">
                                                <i class="fas fa-user-circle mr-2"></i>Anggota 5
                                            </h3>
                                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-600">Nama</label>
                                                    <input type="text" name="nama6" 
                                                        class="mt-1 w-full p-2 bg-white rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-600">NIM</label>
                                                    <input type="text" name="nim6" 
                                                        class="mt-1 w-full p-2 bg-white rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-600">Jenis Kelamin</label>
                                                    <select name="jeniskelamin6" 
                                                        class="mt-1 w-full p-2 bg-white rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                                                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                                        <option value="laki-laki">Laki-Laki</option>
                                                        <option value="perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Anggota 7 -->
                                        <div>
                                            <h3 class="text-md font-medium text-blue-600 mb-3 flex items-center">
                                                <i class="fas fa-user-circle mr-2"></i>Anggota 6
                                            </h3>
                                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-600">Nama</label>
                                                    <input type="text" name="nama7" 
                                                        class="mt-1 w-full p-2 bg-white rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-600">NIM</label>
                                                    <input type="text" name="nim7" 
                                                        class="mt-1 w-full p-2 bg-white rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-600">Jenis Kelamin</label>
                                                    <select name="jeniskelamin7" 
                                                        class="mt-1 w-full p-2 bg-white rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                                                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                                        <option value="laki-laki">Laki-Laki</option>
                                                        <option value="perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Toggle button -->
                                <button type="button" 
                                        @click="expanded = !expanded" 
                                        class="mt-4 text-blue-600 hover:text-blue-800 flex items-center text-sm font-medium">
                                    <i class="fas" :class="expanded ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                                    <span class="ml-2" x-text="expanded ? 'Sembunyikan anggota lainnya' : 'Tampilkan lebih banyak anggota (5 lagi)'"></span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Academic Information -->
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 shadow-md transition-all duration-300 hover:shadow-lg">
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="bg-blue-100 rounded-full p-2">
                                <i class="fas fa-graduation-cap text-blue-700"></i>
                            </div>
                            <h2 class="text-xl font-semibold text-gray-800">Informasi Akademik</h2>
                        </div>
                        <div class="w-full">
                            <label class="text-sm text-gray-600 font-medium" for="institusi">Asal Kampus</label>
                            <div class="mt-1 relative">
                                <i class="fas fa-university text-gray-400 absolute top-3 left-3"></i>
                                <input type="text" id="institusi" name="nama_institusi" required
                                    class="w-full p-2 pl-10 bg-white rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Jurusan/Program Studi</label>
                            <div class="mt-1 relative">
                                <i class="fas fa-book text-gray-400 absolute top-3 left-3"></i>
                                <input type="text" name="jurusan" required
                                    class="w-full p-2 pl-10 bg-white rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Semester</label>
                                <div class="mt-1 relative">
                                    <i class="fas fa-calendar-alt text-gray-400 absolute top-3 left-3"></i>
                                    <input type="number" name="semester" required min="1" max="8"
                                        class="w-full p-2 pl-10 bg-white rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Division Selector -->
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 shadow-md transition-all duration-300 hover:shadow-lg">
                        <div class="division-header">
                            <h2 class="division-title"><i class="fa fa-briefcase blue-icon" aria-hidden="true"></i> Pilih Divisi Magang</h2>
                            <p class="division-subtitle">Silakan pilih divisi untuk penempatan Magang Anda</p>
                        </div>
                        <!-- Hidden input to store the selected division -->
                        <input type="hidden" name="divisi" id="selectedDivisi">
                    
                        <!-- Direct Division Options -->
                        <div class="division-option" onclick="document.getElementById('selectedDivisi').value='Engineering'">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                </svg>
                                <span class="ml-2">Engineering</span>
                            </div>
                        </div>
                    
                        <div class="division-option" onclick="document.getElementById('selectedDivisi').value='Operasi'">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon>
                                </svg>
                                <span class="ml-2">Operasi</span>
                            </div>
                        </div>
                    
                        <div class="division-option" onclick="document.getElementById('selectedDivisi').value='Pemeliharaan'">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                                </svg>
                                <span class="ml-2">Pemeliharaan</span>
                            </div>
                        </div>
                    
                        <div class="division-option" onclick="document.getElementById('selectedDivisi').value='Business Support'">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                                </svg>
                                <span class="ml-2">Business Support</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="w-full">
                        <label class="text-sm text-gray-600 font-medium" for="mulai_magang">Mulai Magang</label>
                        <div class="mt-1 relative">
                            <input type="date" id="mulai_magang" name="mulai_magang" required
                                class="w-full p-2 bg-white rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                        </div>
                    </div>
                    
                    <div class="w-full">
                        <label class="text-sm text-gray-600 font-medium" for="selesai_magang">Selesai Magang</label>
                        <div class="mt-1 relative">
                            <input type="date" id="selesai_magang" name="selesai_magang" required
                                class="w-full p-2 bg-white rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                        </div>
                    </div>
                    <!-- Additional Information -->
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 shadow-md transition-all duration-300 hover:shadow-lg">
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="bg-blue-100 rounded-full p-2">
                                <i class="fas fa-info-circle text-blue-700"></i>
                            </div>
                            <h2 class="text-xl font-semibold text-gray-800">Informasi Tambahan</h2>
                        </div>

                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Alasan Pendaftaran</label>
                                <div class="mt-1 relative">
                                    <textarea name="alasan" rows="4" required
                                        class="w-full p-2 bg-white rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200"
                                        placeholder="Jelaskan alasan anda ingin magang di sini..."></textarea>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-600">Link Foto Diri</label>
                                    <p class="text-xs text-gray-500 mb-1">Masukkan Link Google Drive</p>
                                    <div class="mt-1 relative">
                                        <i class="fas fa-image text-gray-400 absolute top-3 left-3"></i>
                                        <input type="url" name="linkfoto" required
                                            class="w-full p-2 pl-10 bg-white rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200"
                                            placeholder="https://drive.google.com/file/...">
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-600">Link Surat Pengantar</label>
                                    <p class="text-xs text-gray-500 mb-1">Masukkan Link Google Drive</p>
                                    <div class="mt-1 relative">
                                        <i class="fas fa-file-alt text-gray-400 absolute top-3 left-3"></i>
                                        <input type="url" name="linksurat" required
                                            class="w-full p-2 pl-10 bg-white rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200"
                                            placeholder="https://drive.google.com/file/...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Confirmation Section -->
                    <div class="bg-blue-50 p-6 rounded-xl border border-blue-100 shadow-md">
                        <div class="flex items-center space-x-3">
                            <input type="checkbox" id="confirmation-checkbox" 
                                class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="confirmation-checkbox" class="text-sm text-gray-700">
                                Saya menyatakan bahwa semua informasi yang diberikan adalah benar dan dapat dipertanggung jawabkan
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-8 flex justify-between items-center">
                    <button type="button" onclick="history.back()"
                        class="px-6 py-2 text-gray-700 rounded-lg hover:bg-gray-100 transition-colors duration-200 flex items-center">
                        <i class="fas fa-times mr-2"></i>
                        Batal
                    </button>

                    <button type="submit" id="submit-button"
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover :bg-blue-700 transition-colors duration-200 flex items-center disabled:opacity-50 disabled:cursor-not-allowed">
                        <i class="fas fa-paper-plane mr-2"></i>
                        Kirim Pendaftaran
                    </button>
                </div>
            </form>
        </div>
    </main>

    <!-- Popup Notification -->
    <div x-show="isOpen" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50" style="display: none;">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <p class="text-lg font-semibold">Data anda berhasil dimasukkan, silahkan tunggu hasilnya</p>
            <button @click="isOpen = false" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">OK</button>
        </div>
    </div>

    <script>
        const checkbox = document.getElementById('confirmation-checkbox');
        const submitButton = document.getElementById('submit-button');

        checkbox.addEventListener('change', function() {
            submitButton.disabled = !this.checked;
        });

        // Initialize submit button state
        submitButton.disabled = true;
        document.addEventListener('DOMContentLoaded', function() {
            // Division selection
            const divisionOptions = document.querySelectorAll('.division-option');
            divisionOptions.forEach(option => {
                option.addEventListener('click', function() {
                    // Clear previous selection
                    divisionOptions.forEach(opt => opt.classList.remove('selected'));
                    
                    // Select current option
                    this.classList.add('selected');
                    
                    // Enable submit button
                    submitButton.disabled = false;
                });
            });
        });
    </script>
</body>
</html>