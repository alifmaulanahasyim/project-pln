{{-- resources/views/laporan-harian/create.blade.php --}}
@php use Carbon\Carbon; @endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Harian - Input Data</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .card-shadow {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .input-focus {
            transition: all 0.3s ease;
        }
        .input-focus:focus {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        .btn-hover {
            transition: all 0.3s ease;
        }
        .btn-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
        .animate-fade-in {
            animation: fadeIn 0.5s ease-in;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Header Section -->
    <div class="gradient-bg py-8">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <div class="text-center text-white w-full">
                <h1 class="text-4xl font-bold mb-2">
                    <i class="fas fa-clipboard-list mr-3"></i>
                    Laporan Harian
                </h1>
                <p class="text-xl opacity-90">Mahasiswa Magang di PT PLN Nusantara Power Unit Pembangkit Belawan</p>
            </div>
            <div class="ml-4">
                <form method="POST" action="{{ route('logout') }}" id="logout-form">
                    @csrf
                    <button type="submit" 
                            class="bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold py-3 px-6 rounded-xl shadow-lg btn-hover focus:outline-none focus:ring-4 focus:ring-red-300 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl active:translate-y-0">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <!-- Main Form Card -->
            <div class="bg-white rounded-2xl card-shadow p-8 animate-fade-in">
                <div class="mb-8 text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mb-4">
                        <i class="fas fa-edit text-2xl text-blue-600"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">Input Laporan Harian</h2>
                    <p class="text-gray-600">Masukkan detail kegiatan harian Anda dengan lengkap</p>
                </div>

                @if(isset($mahasiswas))
                    {{-- Data mahasiswa tersedia --}}
                @else
                    <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-exclamation-triangle text-red-400"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-red-700 font-medium">Data mahasiswa tidak tersedia.</p>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="bg-red-50 border-l-4 border-red-400 rounded-lg p-6 mb-8 animate-fade-in">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-times-circle text-xl text-red-400"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-red-800 mb-2">Terdapat kesalahan:</h3>
                                <ul class="text-red-700 space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li class="flex items-center">
                                            <i class="fas fa-chevron-right text-xs mr-2"></i>
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                @if (session('success'))
                    <div class="bg-green-50 border-l-4 border-green-400 rounded-lg p-6 mb-8 animate-fade-in">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-check-circle text-xl text-green-400"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-lg font-semibold text-green-800">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                @if (session('sudahAda') || (isset($sudahAda) && $sudahAda))
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            alert('Anda sudah mengisi laporan untuk hari ini.');
                        });
                    </script>
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 rounded-lg p-6 mb-8 animate-fade-in">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-exclamation-circle text-xl text-yellow-400"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-lg font-semibold text-yellow-800">Anda sudah mengisi laporan untuk hari ini.</p>
                            </div>
                        </div>
                    </div>
                @endif

                <form action="{{ route('laporan-harian.laporanharian.store') }}" method="POST" class="space-y-8">
                    @csrf
                    <!-- Form Grid -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        {{-- NIM Mahasiswa --}}
                        <div class="lg:col-span-1">
                            <label for="mahasiswa_nim" class="block text-sm font-semibold text-gray-700 mb-3">
                                <i class="fas fa-user-graduate mr-2 text-blue-500"></i>
                                NIM Mahasiswa
                            </label>
                            <div class="relative">
                                <select name="mahasiswa_nim" id="mahasiswa_nim" 
                                        class="w-full px-4 py-3 pl-12 border-2 border-gray-200 rounded-xl input-focus focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('mahasiswa_nim') border-red-500 @enderror"
                                        @if(session('sudahAda') || (isset($sudahAda) && $sudahAda)) disabled @endif>
                                    <option value="">Pilih NIM Mahasiswa</option>
                                    @foreach($mahasiswas as $mahasiswa)
                                        <option value="{{ $mahasiswa->nim }}" {{ old('mahasiswa_nim') == $mahasiswa->nim ? 'selected' : '' }}>
                                            {{ $mahasiswa->nim }} - {{ $mahasiswa->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fas fa-id-card text-gray-400"></i>
                                </div>
                            </div>
                            @error('mahasiswa_nim')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Tanggal --}}
                        <div class="lg:col-span-1">
                            <label for="tanggal" class="block text-sm font-semibold text-gray-700 mb-3">
                                <i class="fas fa-calendar-alt mr-2 text-green-500"></i>
                                Tanggal Kegiatan
                            </label>
                            <div class="relative">
                                <input type="date" name="tanggal" id="tanggal" 
                                       value="{{ old('tanggal', date('Y-m-d')) }}"
                                       class="w-full px-4 py-3 pl-12 border-2 border-gray-200 rounded-xl input-focus focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('tanggal') border-red-500 @enderror"
                                       @if(session('sudahAda') || (isset($sudahAda) && $sudahAda)) disabled @endif>
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fas fa-calendar text-gray-400"></i>
                                </div>
                            </div>
                            @error('tanggal')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    {{-- Kegiatan --}}
                    <div>
                        <label for="kegiatan" class="block text-sm font-semibold text-gray-700 mb-3">
                            <i class="fas fa-tasks mr-2 text-purple-500"></i>
                            Deskripsi Kegiatan
                        </label>
                        <div class="relative">
                            <textarea name="kegiatan" id="kegiatan" rows="8" 
                                      placeholder="Deskripsikan kegiatan yang dilakukan hari ini secara detail...&#10;&#10;Contoh:&#10;- Kegiatan yang dilakukan&#10;- Lokasi kegiatan&#10;- Hasil yang dicapai&#10;- Kendala yang dihadapi (jika ada)"
                                      class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl input-focus focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 resize-none @error('kegiatan') border-red-500 @enderror"
                                      @if(session('sudahAda') || (isset($sudahAda) && $sudahAda)) disabled @endif>{{ old('kegiatan') }}</textarea>
                            <div class="absolute top-4 right-4">
                                <i class="fas fa-pen text-gray-300"></i>
                            </div>
                        </div>
                        @error('kegiatan')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                        <div class="mt-2 flex items-center text-sm text-gray-500">
                            <i class="fas fa-info-circle mr-2"></i>
                            <span>Minimal 10 karakter. Jelaskan kegiatan dengan detail dan jelas.</span>
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex flex-col sm:flex-row gap-4 pt-6">
                        <button type="submit" 
                                class="flex-1 bg-gradient-to-r from-blue-600 to-blue-700 text-white py-4 px-6 rounded-xl font-semibold btn-hover focus:outline-none focus:ring-4 focus:ring-blue-300 transition duration-300"
                                @if(session('sudahAda') || (isset($sudahAda) && $sudahAda)) disabled @endif>
                            <i class="fas fa-save mr-2"></i>
                            Simpan Laporan
                        </button>
                        
                        <a href="{{ route('laporan-harian.laporanharian.index') }}" 
                           class="flex-1 bg-gradient-to-r from-gray-500 to-gray-600 text-white py-4 px-6 rounded-xl font-semibold btn-hover focus:outline-none focus:ring-4 focus:ring-gray-300 transition duration-300 text-center">
                            <i class="fas fa-times mr-2"></i>
                            Batal
                        </a>
                    </div>
                </form>
            </div>

            <!-- Tips Card -->
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 rounded-2xl p-6 mt-8 animate-fade-in">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-lightbulb text-blue-600"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-blue-800 mb-3">
                            <i class="fas fa-star mr-2"></i>
                            Tips Pengisian Laporan yang Baik
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-blue-700">
                            <div class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                                <span>Pastikan tanggal laporan sesuai dengan kegiatan yang dilakukan</span>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                                <span>Deskripsikan kegiatan dengan jelas dan terstruktur</span>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                                <span>Sertakan hasil atau pencapaian dari kegiatan tersebut</span>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                                <span>Cantumkan kendala yang dihadapi dan solusinya</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                <div class="bg-white rounded-xl p-6 card-shadow text-center">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-clipboard-list text-blue-600 text-xl"></i>
                    </div>
                    <h4 class="font-semibold text-gray-700">Laporan Hari Ini</h4>
                    <p class="text-2xl font-bold text-blue-600 mt-2">{{ date('d M Y') }}</p>
                </div>
                
                <div class="bg-white rounded-xl p-6 card-shadow text-center">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-check text-green-600 text-xl"></i>
                    </div>
                    <h4 class="font-semibold text-gray-700">Status</h4>
                   @if(isset($sudahAda) && $sudahAda)
                        <p class="text-lg font-semibold text-yellow-600 mt-2">Anda Sudah Memasukkan Laporan Harian</p>
                    @else
                        <p class="text-lg font-semibold text-green-600 mt-2">Siap Input</p>
                    @endif
                </div>
                
                <div class="bg-white rounded-xl p-6 card-shadow text-center">
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-clock text-purple-600 text-xl"></i>
                    </div>
                    <h4 class="font-semibold text-gray-700">Waktu</h4>
                        <p class="text-lg font-semibold text-purple-600 mt-2" id="current-time">
                            {{ \Carbon\Carbon::now('Asia/Jakarta')->format('H:i') }} WIB
                        </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6 mt-12">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} Sistem Laporan Harian. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Auto-resize textarea
        const textarea = document.getElementById('kegiatan');
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = this.scrollHeight + 'px';
        });

        // Form validation with enhanced UX
        // Pastikan validasi hanya untuk form laporan harian, bukan semua form
        const laporanForm = document.querySelector('form[action*="laporanharian.store"]');
        if (laporanForm) {
            laporanForm.addEventListener('submit', function(e) {
                const nim = document.getElementById('mahasiswa_nim').value;
                const tanggal = document.getElementById('tanggal').value;
                const kegiatan = document.getElementById('kegiatan').value.trim();

                // Reset previous error states
                document.querySelectorAll('.border-red-500').forEach(el => {
                    el.classList.remove('border-red-500');
                    el.classList.add('border-gray-200');
                });

                let hasError = false;

                if (!nim) {
                    showError('mahasiswa_nim', 'Silakan pilih NIM Mahasiswa');
                    hasError = true;
                }

                if (!tanggal) {
                    showError('tanggal', 'Silakan pilih tanggal');
                    hasError = true;
                }

                if (!kegiatan) {
                    showError('kegiatan', 'Silakan isi kegiatan');
                    hasError = true;
                } else if (kegiatan.length < 10) {
                    showError('kegiatan', 'Kegiatan harus diisi minimal 10 karakter');
                    hasError = true;
                }

                if (hasError) {
                    e.preventDefault();
                    // Scroll to first error
                    document.querySelector('.border-red-500').scrollIntoView({ 
                        behavior: 'smooth', 
                        block: 'center' 
                    });
                }
            });
        }

        function showError(fieldId, message) {
            const field = document.getElementById(fieldId);
            field.classList.add('border-red-500');
            field.classList.remove('border-gray-200');
            
            // Create or update error message
            let errorMsg = field.parentNode.querySelector('.error-message');
            if (!errorMsg) {
                errorMsg = document.createElement('p');
                errorMsg.className = 'mt-2 text-sm text-red-600 flex items-center error-message';
                field.parentNode.appendChild(errorMsg);
            }
            errorMsg.innerHTML = `<i class="fas fa-exclamation-circle mr-1"></i>${message}`;
        }

        // Update current time
        function updateTime() {
            
            const now = new Date();
            const timeString = now.toLocaleTimeString('id-ID', { 
                hour: '2-digit', 
                minute: '2-digit' 
            });
            document.getElementById('current-time').textContent = timeString;
        }
        document.getElementById('current-time').textContent = timeString + ' WIB';

        // Update time every minute
        setInterval(updateTime, 60000);

        // Add loading state to submit button
        document.querySelector('form').addEventListener('submit', function() {
            const submitBtn = document.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Menyimpan...';
            submitBtn.disabled = true;
        });

        // Smooth animations on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'fadeIn 0.6s ease-out';
                }
            });
        }, observerOptions);

        // Observe all cards for animation
        document.querySelectorAll('.card-shadow').forEach(card => {
            observer.observe(card);
        });
    </script>
</body>
</html>
