<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pendaftaran Magang</title>
    <link href='img/favicon.ico' rel='shortcut icon'>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
        }
        
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
    </style>
</head>

<body class="bg-gradient-to-br from-blue-500 via-blue-600 to-blue-800 min-h-screen py-12 px-4">
    <main class="max-w-4xl mx-auto">
        <div class="container mx-auto bg-white shadow-2xl rounded-2xl overflow-hidden backdrop-blur-xl transition-all duration-300 hover:shadow-blue-400/30">
            <!-- Header Section -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-800 p-10 text-white relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-full opacity-20">
                    <div class="absolute -top-20 -left-20 w-64 h-64 rounded-full bg-blue-300 animate-float"></div>
                    <div class="absolute top-40 right-20 w-32 h-32 rounded-full bg-blue-400 animate-float" style="animation-delay: 1s"></div>
                    <div class="absolute bottom-0 right-0 w-96 h-96 rounded-full bg-blue-500 animate-float" style="animation-delay: 2s"></div>
                </div>
                <div class="relative z-10">
                    <div class="text-center mb-2">
                        <i class="fas fa-clipboard-list text-4xl text-blue-200 mb-4"></i>
                    </div>
                    <h1 class="text-center text-4xl font-bold">Detail Pendaftaran Magang</h1>
                    <p class="text-center mt-3 text-blue-100 text-lg">PT. PLN Nusantara Power Unit Pembangkit Belawan</p>
                </div>
            </div>

            <div class="p-8 md:p-10">
                <!-- Status Banner -->
                <div class="mb-8 relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-50 to-blue-100 rounded-xl transform -skew-y-1"></div>
                    <div class="relative p-6 flex flex-col md:flex-row items-center justify-between">
                        <div class="flex items-center mb-4 md:mb-0">
                            <div class="bg-blue-100 rounded-full p-3 mr-4">
                                <i class="fas fa-clipboard-check text-blue-700 text-xl"></i>
                            </div>
                            <div>
                                <h2 class="text-lg font-semibold text-gray-700">Status Pendaftaran</h2>
                                <div class="inline-flex items-center px-4 py-2 mt-1 rounded-full text-sm font-medium 
                                    {{ $data->status == 'Diterima' ? 'bg-green-100 text-green-800 border border-green-200' : 
                                       ($data->status == 'Ditolak' ? 'bg-red-100 text-red-800 border border-red-200' : 'bg-yellow-100 text-yellow-800 border border-yellow-200') }}">
                                    <i class="fas fa-circle text-xs mr-2"></i>
                                    {{ $data->status }}
                                </div>
                            </div>
                        </div>
                        <div class="flex space-x-3">
                            <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-medium">
                                <i class="far fa-calendar-alt mr-1"></i> {{ $data->mulai_magang }}
                            </span>
                            <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-medium">
                                <i class="fas fa-building mr-1"></i> {{ $data->divisi }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Info Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-6 rounded-lg shadow-md border border-blue-100 card-hover">
                        <div class="flex items-center space-x-4">
                            <div class="bg-blue-600 rounded-full p-3 text-white">
                                <i class="fas fa-user-graduate text-xl"></i>
                            </div>
                            <div>
                                <p class="text-sm text-blue-600 font-medium">Nama Lengkap</p>
                                <p class="font-semibold text-gray-800 text-lg">{{ $data->nama }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-6 rounded-lg shadow-md border border-blue-100 card-hover">
                        <div class="flex items-center space-x-4">
                            <div class="bg-blue-600 rounded-full p-3 text-white">
                                <i class="fas fa-university text-xl"></i>
                            </div>
                            <div>
                                <p class="text-sm text-blue-600 font-medium">Institusi</p>
                                <p class="font-semibold text-gray-800 text-lg">{{ $data->nama_institusi }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab Navigation --

                <!-- Main Content -->
                <div class="space-y-8">
                    <!-- Personal Information Section -->
                    <div x-show="activeTab === 'personal'" class="bg-white p-6 rounded-xl border border-gray-200 shadow-md transition-all duration-300 hover:shadow-lg">
                        <div class="flex items-center space-x-3 mb-6">
                            <div class="bg-gradient-to-r from-blue-500 to-blue-700 rounded-full p-3 text-white">
                                <i class="fas fa-id-card text-xl"></i>
                            </div>
                            <h2 class="text-xl font-semibold text-gray-800">Informasi Pribadi</h2>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="group">
                                <label class="block text-sm font-medium text-gray-600 group-hover:text-blue-600 transition-colors">Email</label>
                                <div class="mt-1 p-4 bg-gray-50 rounded-md shadow-sm border border-gray-200 group-hover:border-blue-200 transition-colors">
                                    <div class="flex items-center">
                                        <i class="fas fa-envelope text-gray-400 mr-3 group-hover:text-blue-500 transition-colors"></i>
                                        <p class="text-gray-800">{{ $data->email }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="group">
                                <label class="block text-sm font-medium text-gray-600 group-hover:text-blue-600 transition-colors">NIM</label>
                                <div class="mt-1 p-4 bg-gray-50 rounded-md shadow-sm border border-gray-200 group-hover:border-blue-200 transition-colors">
                                    <div class="flex items-center">
                                        <i class="fas fa-id-badge text-gray-400 mr-3 group-hover:text-blue-500 transition-colors"></i>
                                        <p class="text-gray-800">{{ $data->nim }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="group">
                                <label class="block text-sm font-medium text-gray-600 group-hover:text-blue-600 transition-colors">No Handphone/WhatsApp</label>
                                <div class="mt-1 p-4 bg-gray-50 rounded-md shadow-sm border border-gray-200 group-hover:border-blue-200 transition-colors">
                                    <div class="flex items-center">
                                        <i class="fas fa-phone text-gray-400 mr-3 group-hover:text-blue-500 transition-colors"></i>
                                        <p class="text-gray-800">{{ $data->nohp }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="group">
                                <label class="block text-sm font-medium text-gray-600 group-hover:text-blue-600 transition-colors">Jenis Kelamin</label>
                                <div class="mt-1 p-4 bg-gray-50 rounded-md shadow-sm border border-gray-200 group-hover:border-blue-200 transition-colors">
                                    <div class="flex items-center">
                                        <i class="fas fa-venus-mars text-gray-400 mr-3 group-hover:text-blue-500 transition-colors"></i>
                                        <p class="text-gray-800">{{ $data->jeniskelamin }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="group">
                                <label class="block text-sm font-medium text-gray-600 group-hover:text-blue-600 transition-colors">Semester</label>
                                <div class="mt-1 p-4 bg-gray-50 rounded-md shadow-sm border border-gray-200 group-hover:border-blue-200 transition-colors">
                                    <div class="flex items-center">
                                        <i class="fas fa-calendar-alt text-gray-400 mr-3 group-hover:text-blue-500 transition-colors"></i>
                                        <p class="text-gray-800">{{ $data->semester }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Team Members Information -->
                    <div x-show="activeTab === 'team'" class="bg-white p-6 rounded-xl border border-gray-200 shadow-md transition-all duration-300 hover:shadow-lg">
                        <div class="flex items-center space-x-3 mb-6">
                            <div class="bg-gradient-to-r from-blue-500 to-blue-700 rounded-full p-3 text-white">
                                <i class="fas fa-users text-xl"></i>
                            </div>
                            <h2 class="text-xl font-semibold text-gray-800">Anggota Tim</h2>
                        </div>
                        <div class="space-y-4">
                            @php
                                $members = [
                                    ['nama' => $data->nama2, 'nim' => $data->nim2, 'jeniskelamin' => $data->jeniskelamin2],
                                    ['nama' => $data->nama3, 'nim' => $data->nim3, 'jeniskelamin' => $data->jeniskelamin3],
                                    ['nama' => $data->nama4, 'nim' => $data->nim4, 'jeniskelamin' => $data->jeniskelamin4],
                                    ['nama' => $data->nama5, 'nim' => $data->nim5, 'jeniskelamin' => $data->jeniskelamin5],
                                    ['nama' => $data->nama6, 'nim' => $data->nim6, 'jeniskelamin' => $data->jeniskelamin6],
                                    ['nama' => $data->nama7, 'nim' => $data->nim7, 'jeniskelamin' => $data->jeniskelamin7],
                                ];
                    
                                // Initialize a counter for filled members
                                $filledCount = 0;
                            @endphp
                    
                            @foreach($members as $index => $member)
                                @if($member['nama'] || $member['nim'] || $member['jeniskelamin'])
                                    @php
                                        // Increment the filled count based on the index
                                        $filledCount = $index + 2; // +2 because index starts from 0
                                    @endphp
                                    <div class="p-5 bg-gray-50 rounded-lg shadow-sm border border-gray-200 hover:border-blue-200 hover:shadow-md transition-all card-hover">
                                        <div class="flex items-center mb-4">
                                            <div class="bg-blue-100 rounded-full p-2 mr-3">
                                                <i class="fas fa-user text-blue-600"></i>
                                            </div>
                                            <h3 class="text-md font-medium text-blue-600">Anggota {{ $index + 1 }}</h3>
                                        </div>
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                            @if($member['nama'])
                                                <div>
                                                    <label class="block text-xs font-medium text-gray-500">Nama</label>
                                                    <p class="mt-1 p-3 bg-white rounded-md border border-blue-100">{{ $member['nama'] }}</p>
                                                </div>
                                            @endif
                                            @if($member['nim'])
                                                <div>
                                                    <label class="block text-xs font-medium text-gray-500">NIM</label>
                                                    <p class="mt-1 p-3 bg-white rounded-md border border-blue-100">{{ $member['nim'] }}</p>
                                                </div>
                                            @endif
                                            @if($member['jeniskelamin'])
                                                <div>
                                                    <label class="block text-xs font-medium text-gray-500">Jenis Kelamin</label>
                                                    <p class="mt-1 p-3 bg-white rounded-md border border-blue-100">{{ $member['jeniskelamin'] }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                    
                            @if($filledCount === 0)
                                <div class="flex flex-col items-center justify-center p-10 bg-gray-50 rounded-lg border border-dashed border-gray-300">
                                    <i class="fas fa-user-slash text-gray-400 text-4xl mb-3"></i>
                                    <p class="text-gray-500 text-center">Tidak ada anggota tim terdaftar</p>
                                </div>
                            @else
                                <p>Total Mahasiswa Magang: {{ $filledCount }}</p>
                            @endif
                        </div>
                    </div>

                    <!-- Academic Information -->
                    <div x-show="activeTab === 'academic'" class="bg-white p-6 rounded-xl border border-gray-200 shadow-md transition-all duration-300 hover:shadow-lg">
                        <div class="flex items-center space-x-3 mb-6">
                            <div class="bg-gradient-to-r from-blue-500 to-blue-700 rounded-full p-3 text-white">
                                <i class="fas fa-graduation-cap text-xl"></i>
                            </div>
                            <h2 class="text-xl font-semibold text-gray-800">Informasi Akademik</h2>
                        </div>
                        <div class="space-y-6">
                            <div class="group">
                                <label class="block text-sm font-medium text-gray-600 group-hover:text-blue-600 transition-colors">Jurusan/Program Studi</label>
                                <div class="mt-1 p-4 bg-gray-50 rounded-md shadow-sm border border-gray-200 group-hover:border-blue-200 transition-colors">
                                    <div class="flex items-center">
                                        <i class="fas fa-book text-gray-400 mr-3 group-hover:text-blue-500 transition-colors"></i>
                                        <p class="text-gray-800">{{ $data->jurusan }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="group">
                                <label class="block text-sm font-medium text-gray-600 group-hover:text-blue-600 transition-colors">Divisi PKL</label>
                                <div class="mt-1 p-4 bg-gray-50 rounded-md shadow-sm border border-gray-200 group-hover:border-blue-200 transition-colors">
                                    <div class="flex items-center">
                                        <i class="fas fa-briefcase text-gray-400 mr-3 group-hover:text-blue-500 transition-colors"></i>
                                        <p class="text-gray-800">{{ $data->divisi }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-blue-50 p-5 rounded-lg border border-blue-100">
                                <h3 class="text-md font-medium text-blue-700 mb-3">Periode Magang</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-600">Tanggal Mulai</label>
                                        <div class="mt-1 p-4 bg-white rounded-md shadow-sm border border-gray-200">
                                            <div class="flex items-center">
                                                <i class="fas fa-calendar-plus text-blue-400 mr-3"></i>
                                                <p class="text-gray-800">{{ $data->mulai_magang }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-600">Tanggal Selesai</label>
                                        <div class="mt-1 p-4 bg-white rounded-md shadow-sm border border-gray-200">
                                            <div class="flex items-center">
                                                <i class="fas fa-calendar-check text-blue-400 mr-3"></i>
                                                <p class="text-gray-800">{{ $data->selesai_magang }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Information -->
                    <div x-show="activeTab === 'additional'" class="bg-white p-6 rounded-xl border border-gray-200 shadow-md transition-all duration-300 hover:shadow-lg">
                        <div class="flex items-center space-x-3 mb-6">
                            <div class="bg-gradient-to-r from-blue-500 to-blue-700 rounded-full p-3 text-white">
                                <i class="fas fa-info-circle text-xl"></i>
                            </div>
                            <h2 class="text-xl font-semibold text-gray-800">Informasi Tambahan</h2>
                        </div>
                        <div class="space-y-6">
                            <div class="group">
                                <label class="block text-sm font-medium text-gray-600 group-hover:text-blue-600 transition-colors">Alasan Pendaftaran</label>
                                <div class="mt-1 p-4 bg-gray-50 rounded-md shadow-sm border border-gray-200 group-hover:border-blue-200 transition-colors min-h-32">
                                    <div class="flex">
                                        <i class="fas fa-quote-left text-gray-400 mr-3 mt-1 group-hover:text-blue-500 transition-colors"></i>
                                        <p class="text-gray-800">{{ $data->alasan }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-600">Foto Diri</label>
                                    <a href="{{ $data->linkfoto }}" target="_blank" 
                                       class="mt-1 p-4 bg-blue-50 rounded-md shadow-sm border border-blue-100 text-blue-600 hover:text-blue-800 flex items-center hover:bg-blue-100 transition-colors">
                                        <i class="fas fa-image text-blue-500 mr-3"></i>
                                        <span>Lihat Foto</span>
                                        <i class="fas fa-external-link-alt ml-2 text-sm"></i>
                                    </a>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-600">Surat Pengantar</label>
                                    <a href="{{ $data->linksurat }}" target="_blank"
                                       class="mt-1 p-4 bg-blue-50 rounded-md shadow-sm border border-blue-100 text-blue-600 hover:text-blue-800 flex items-center hover:bg-blue-100 transition-colors">
                                        <i class="fas fa-file-alt text-blue-500 mr-3"></i>
                                        <span>Lihat Surat</span>
                                        <i class="fas fa-external-link-alt ml-2 text-sm"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Back Button -->
                <div class="mt-10 flex justify-end">
                    <button type="button" onclick="history.back()"
                        class="px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg hover:from-blue-700 hover:to-blue-800 transition-colors duration-200 flex items-center shadow-md transform hover:scale-105 transition-transform">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali
                    </button>
                </div>
            </div>
        </div>
    </main>

    <!-- AlpineJS for Tab Navigation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.5/cdn.min.js" defer></script>
</body>

</html>