<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Magang Student</title>
    <link href='img/favicon.ico' rel='shortcut icon'>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @vite(['resources/css/inputdivisi.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-blue-600 to-blue-800 min-h-screen py-8">
    <main class="max-w-4xl mx-auto p-4">
        <div class="container mx-auto bg-white shadow-2xl rounded-2xl overflow-hidden">
            <!-- Header Section -->
            <div class="header-bg p-12 text-white relative">
                <div class="floating-elements"></div>
                <div class="relative z-10 text-center">
                    <div class="mb-6">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-white/20 rounded-full mb-4 backdrop-blur-sm">
                            <i class="fas fa-graduation-cap text-3xl"></i>
                        </div>
                    </div>
                    <h1 class="text-5xl font-bold mb-4 bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent">
                        Edit Formulir Pendaftaran Magang
                    </h1>
                    <p class="text-xl text-blue-100 font-light">
                        PT PLN Nusantara Power Unit Pembangkit Belawan
                    </p>
                    <div class="mt-8 flex justify-center">
                        <div class="bg-white/10 backdrop-blur-sm rounded-full px-6 py-2">
                            <span class="text-sm font-medium">✨ Sistem Pendaftaran Digital</span>
                        </div>
                    </div>
                </div>
            </div>

            <form id="data-pendaftaran-form" action="/updateform/{{$data->nim}}" method="POST" enctype="multipart/form-data" class="p-8">
                @csrf
                <div class="space-y-8">
                    <!-- Personal Information Section -->
                    <div class="bg-gray-50 p-6 rounded-xl">
                        <h2 class="text-xl font-semibold text-gray-800 mb-6 flex items-center">
                            <i class="fas fa-user-circle mr-2 text-blue-600"></i>
                            Informasi Pribadi
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-600">Email Aktif</label>
                                <input id="email" name="email" type="email" value="{{ $data->email }}"
                                    class="mt-1 block w-full rounded-lg border-gray-300 bg-white px-4 py-2 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            <div>
                                <label for="full-name" class="block text-sm font-medium text-gray-600">Nama Lengkap</label>
                                <input type="text" name="nama" id="full-name" value="{{ $data->nama }}"
                                    class="mt-1 block w-full rounded-lg border-gray-300 bg-white px-4 py-2 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Jenis Kelamin</label>
                                <div class="mt-1 relative">
                                    <i class="fas fa-venus-mars text-gray-400 absolute top-3 left-3"></i>
                                    <select name="jeniskelamin" 
                                        class="w-full p-2 pl-10 bg-white rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                                        <option value="" disabled {{ $data->jeniskelamin ? '' : 'selected' }}>Pilih Jenis Kelamin</option>
                                        <option value="laki-laki" {{ $data->jeniskelamin == 'laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                                        <option value="perempuan" {{ $data->jeniskelamin == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label for="nim" class="block text-sm font-medium text-gray-600">NIM</label>
                                <input type="text" name="nim" id="nim" value="{{ $data->nim }}" readonly
                                    class="mt-1 block w-full rounded-lg border-gray-300 bg-white px-4 py-2 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            <div>
                                <label for="nohp" class="block text-sm font-medium text-gray-600">Nomor HandPhone/Whatsapp</label>
                                <input type="text" name="nohp" id="nohp" value="{{ $data->nohp }}" readonly
                                    class="mt-1 block w-full rounded-lg border-gray-300 bg-white px-4 py-2 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                        </div>
                    </div>  

                    <!-- Team Members Section -->
                    <section class="mb-4">
                        <h2 class="section-title text-center mb-4"><i class="fas fa-users"></i> Anggota Tim</h2>
                        
                        @php
                            $members = [
                                ['nama' => $data->nama2 ?? null, 'nim' => $data->nim2 ?? null, 'jeniskelamin' => $data->jeniskelamin2 ?? null],
                                ['nama' => $data->nama3 ?? null, 'nim' => $data->nim3 ?? null, 'jeniskelamin' => $data->jeniskelamin3 ?? null],
                                ['nama' => $data->nama4 ?? null, 'nim' => $data->nim4 ?? null, 'jeniskelamin' => $data->jeniskelamin4 ?? null],
                                ['nama' => $data->nama5 ?? null, 'nim' => $data->nim5 ?? null, 'jeniskelamin' => $data->jeniskelamin5 ?? null],
                                ['nama' => $data->nama6 ?? null, 'nim' => $data->nim6 ?? null, 'jeniskelamin' => $data->jeniskelamin6 ?? null],
                                ['nama' => $data->nama7 ?? null, 'nim' => $data->nim7 ?? null, 'jeniskelamin' => $data->jeniskelamin7 ?? null],
                            ];
                        @endphp
                    
                        <div class="row">
                            @foreach($members as $index => $member)
                                @if($member['nama'] || $member['nim'] || $member['jeniskelamin'])
                                    <div class="col-md-4 mb-4">
                                        <div class="p-5 bg-gray-50 rounded-lg shadow-sm border border-gray-200 hover:border-blue-200 hover:shadow-md transition-all">
                                            <div class="flex items-center mb-4">
                                                <div class="bg-blue-100 rounded-full p-2 mr-3">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                                <h3 class="text-md font-medium">Anggota {{ $index + 1 }}</h3>
                                            </div>
                                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                                @if($member['nama'])
                                                    <div>
                                                        <label class="block text-xs font-medium text-gray-500">Nama</label>
                                                        <input type="text" name="nama{{ $index + 2 }}" value="{{ $member['nama'] }}" class="mt-1 p-3 bg-white rounded-md border border-blue-100" required>
                                                    </div>
                                                @endif
                                                @if($member['nim'])
                                                    <div>
                                                        <label class="block text-xs font-medium text-gray-500">NIM</label>
                                                        <input type="text" name="nim{{ $index + 2 }}" value="{{ $member['nim'] }}" class="mt-1 p-3 bg-white rounded-md border border-blue-100" required>
                                                    </div>
                                                @endif
                                                @if($member['jeniskelamin'])
                                                    <div>
                                                        <label class="block text-xs font-medium text-gray-500">Jenis Kelamin</label>
                                                        <select name="jeniskelamin{{ $index + 2 }}" class="mt-1 p-3 bg-white rounded-md border border-blue-100" required>
                                                            <option value="laki-laki" {{ $member['jeniskelamin'] == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                                            <option value="perempuan" {{ $member['jeniskelamin'] == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                                        </select>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                    
                            @if(!array_filter($members, function($member) { return $member['nama'] || $member['nim'] || $member['jeniskelamin']; }))
                                <div class="flex flex-col items-center justify-center p-10 bg-gray-50 rounded-lg border border-dashed border-gray-300 col-span-12">
                                    <i class="fas fa-user-slash text-gray-400 text-4xl mb-3"></i>
                                    <p class="text-gray-500 text-center">Tidak ada anggota tim terdaftar</p>
                                </div>
                            @endif
                        </div>
                    </section>

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
                                <input type="text" id="institusi" name="nama_institusi" value="{{ $data->nama_institusi }}" required
                                    class="w-full p-2 pl-10 bg-white rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Jurusan/Program Studi</label>
                            <div class="mt-1 relative">
                                <i class="fas fa-book text-gray-400 absolute top-3 left-3"></i>
                                <input type="text" name="jurusan" value="{{ $data->jurusan }}" required
                                    class="w-full p-2 pl-10 bg-white rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Semester</label>
                                <div class="mt-1 relative">
                                    <i class="fas fa-calendar-alt text-gray-400 absolute top-3 left-3"></i>
                                    <input type="number" name="semester" value="{{ $data->semester }}" required min="1" max="8"
                                        class="w-full p-2 pl-10 bg-white rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Devisi --}}
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 shadow-md transition-all duration-300 hover:shadow-lg">
                        <div class="division-header">
                            <h2 class="division-title"><i class="fa fa-briefcase blue-icon" aria-hidden="true"></i> Ubah Divisi Magang</h2>
                            <p class="division-subtitle">Silakan Ubah divisi untuk diubah</p>
                        </div>
                        <label for="divisi" class="block text-sm font-medium text-gray-600">Divisi</label>
                        <select id="divisi" name="divisi" class="mt-1 block w-full rounded-lg border-gray-300 bg-white px-4 py-2 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="" disabled {{ !$data->divisi ? 'selected' : '' }}>Pilih Divisi</option>
                            <option value="Engineering" {{ $data->divisi == 'Engineering' ? 'selected' : '' }}>Engineering</option>
                            <option value="Operasi" {{ $data->divisi == 'Operasi' ? 'selected' : '' }}>Operasi</option>
                            <option value="Pemeliharaan" {{ $data->divisi == 'Pemeliharaan' ? 'selected' : '' }}>Pemeliharaan</option>
                            <option value="Business Support" {{ $data->divisi == 'Business Support' ? 'selected' : '' }}>Business Support</option>
                        </select>
                    </div>

                    <!-- Additional Information -->
                    <div class="bg-gray-50 p-6 rounded-xl">
                        <h2 class="text-xl font-semibold text-gray-800 mb-6 flex items-center">
                            <i class="fas fa-file-alt mr-2 text-blue-600"></i>
                            Informasi Tambahan
                        </h2>
                        <div class="space-y-6">
                            <div>
                                <label for="alasan" class="block text-sm font-medium text-gray-600">Alasan Pendaftaran</label>
                                <textarea name="alasan" id="alasan" rows="4"
                                    class="mt-1 block w-full rounded-lg border-gray-300 bg-white px-4 py-2 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="Alasan anda ingin mendaftar di sini">{{ $data->alasan }}</textarea>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="linkfoto" class="block text-sm font-medium text-gray-600">Link Foto Diri</label>
                                    <input type="url" name="linkfoto" id="linkfoto" value="{{ $data->linkfoto }}"
                                        class="mt-1 block w-full rounded-lg border-gray-300 bg-white px-4 py-2 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                        placeholder="Masukkan link foto diri">
                                </div>
                                <div>
                                    <label for="link-surat" class="block text-sm font-medium text-gray-600">Link Surat Pengantar</label>
                                    <input type="url" name="linksurat" id="link-surat" value="{{ $data->linksurat }}"
                                        class="mt-1 block w-full rounded-lg border-gray-300 bg-white px-4 py-2 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                        placeholder="Masukkan link surat pengantar">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Status Section -->
                    <div class="bg-gray-50 p-6 rounded-xl">
                        <h2 class="text-xl font-semibold text-gray-800 mb-6 flex items-center">
                            <i class="fas fa-check-circle mr-2 text-blue-600"></i>
                            Status Pendaftaran
                        </h2>
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-600">Status</label>
                            <select id="status" name="status"
                                class="mt-1 block w-full rounded-lg border-gray-300 bg-white px-4 py-2 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option selected>{{ $data->status }}</option>
                                <option value="Diterima">Diterima</option>
                                <option value="Ditolak">Ditolak</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-8 flex items-center justify-end space-x-4">
                    <button type="button" onclick="history.back()"
                        class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors duration-200 flex items-center">
                        <i class="fas fa-times mr-2"></i>
                        Batal
                    </button>
                    <button id="wa-custom-message" type="button"
                        class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-200 flex items-center">
                        <i class="fas fa-paper-plane mr-2"></i>
                        Kirim Pesan WhatsApp
                    </button>
                    <button id="submit-button" type="submit"
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 flex items-center">
                        <i class="fas fa-save mr-2"></i>
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>
<!-- Modal Custom WhatsApp Message -->
<div id="waCustomModal" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40 hidden">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
        <button id="closeWaModal" class="absolute top-2 right-2 text-gray-400 hover:text-gray-700 text-2xl">&times;</button>
        <h2 class="text-xl font-bold mb-4 text-center text-green-700">Kirim Pesan WhatsApp</h2>
        <textarea id="waCustomInput" rows="4" class="w-full border border-gray-300 rounded-md p-2 mb-4 focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Tulis pesan custom di sini..."></textarea>
        <div class="flex justify-end">
            <button id="sendWaCustomBtn" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md font-semibold">Kirim & Simpan</button>
        </div>
    </div>
</div>
<script>
    // Modal logic
    const waModal = document.getElementById('waCustomModal');
    const waSend = document.getElementById('sendWaCustomBtn');
    const waInput = document.getElementById('waCustomInput');
    const waClose = document.getElementById('closeWaModal');
    const submitBtn = document.getElementById('submit-button');
    const form = document.getElementById('data-pendaftaran-form');

    submitBtn.addEventListener('click', function (e) {
        e.preventDefault();
        waModal.classList.remove('hidden');
        waInput.value = '';
        waInput.focus();
    });
    waClose.addEventListener('click', function () {
        waModal.classList.add('hidden');
    });
    waSend.addEventListener('click', function () {
        const customMessage = waInput.value.trim();
        if (!customMessage) {
            waInput.focus();
            waInput.classList.add('border-red-500');
            return;
        }
        waInput.classList.remove('border-red-500');
        const nim = '{{ $data->nim }}';
        fetch(`/mahasiswa/${nim}/nohp`)
            .then(response => response.json())
            .then(data => {
                if (data.nohp) {
                    const phoneNumber = data.nohp.replace(/^0/, '62');
                    const whatsappUrl = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(customMessage)}`;
                    window.open(whatsappUrl, '_blank');
                    waModal.classList.add('hidden');
                    setTimeout(() => {
                        form.submit();
                    }, 500);
                } else {
                    alert('Nomor HP tidak ditemukan');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Gagal mengambil nomor HP');
            });
    });
    waModal.addEventListener('click', function(e) {
        if (e.target === waModal) waModal.classList.add('hidden');
    });
</script>

</html>