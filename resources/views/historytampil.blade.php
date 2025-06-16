<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Detail Mahasiswa Magang</title>
    <link href='img/favicon.ico' rel='shortcut icon'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #f8f9fa; /* Light background */
        }
        .card-header {
            background-color: #343a40; /* Dark background for card header */
            color: white; /* White text */
        }
        .badge-primary {
            background-color: #ffc107; /* Yellow badge */
        }
        .custom-yellow-button {
            background-color: #FFC107; /* Bootstrap's warning color */
            color: white; /* Text color */
            border: none; /* Remove border */
            padding: 10px 20px; /* Padding */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Pointer cursor on hover */
            transition: background-color 0.3s; /* Smooth transition */
        }
        .custom-yellow-button:hover {
            background-color: #e0a800; /* Darker shade on hover */
        }
    </style>
</head>

<body>
    <div class="container my-4">
        <header class="text-center mb-4">
            <h1 class="display-4 text-warning">Edit Detail Mahasiswa Magang</h1>
            <p class="lead text-secondary">PT. PLN Nusantara Power Unit Pembangkit Belawan</p>
        </header>

        <main>
            <form action="{{ route('moved.update', $record->nim) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <section class="card mb-4">
                    <div class="card-header">
                        <h2 class="h5 mb-0"><i class="fas fa-calendar-alt"></i> Informasi Program</h2>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <strong><i class="fas fa-play"></i> Tanggal Mulai:</strong>
                                <input type="date" name="mulai_magang" value="{{ $record->mulai_magang }}" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <strong><i class="fas fa-flag-checkered"></i> Tanggal Selesai:</strong>
                                <input type="date" name="selesai_magang" value="{{ $record->selesai_magang }}" class="form-control" required>
                            </div>
                        </div>
                        <div class="division-selector bg-gray-50 p-6 rounded-xl border border-gray-200 shadow-md transition-all duration-300 hover:shadow-lg" style="max-width: 600px;">
                            <div class="division-header">
                                <h2 class="division-title"><i class="fa fa-briefcase blue-icon" aria-hidden="true"></i> Pilih Divisi Magang</h2>
                                <p class="division-subtitle">Silakan pilih divisi untuk penempatan Magang Anda</p>
                            </div>
                            <label for="divisi" class="block text-sm font-medium text-gray-600">Divisi</label>
                            <select id="divisi" name="divisi" class="mt-1 block w-full rounded-lg border-gray-300 bg-white px-4 py-2 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                <option value="" disabled {{ !$record->divisi ? 'selected' : '' }}>Pilih Divisi</option>
                                <option value="System Owner" {{ $record->divisi == 'System Owner' ? 'selected' : '' }}>System Owner</option>
                                <option value="Condition Based Maintenance" {{ $record->divisi == 'Condition Based Maintenance' ? 'selected' : '' }}>Condition Based Maintenance</option>
                                <option value="MMRK (Manajemen Mutu, Risiko, dan K3)" {{ $record->divisi == 'MMRK (Manajemen Mutu, Risiko, dan K3)' ? 'selected' : '' }}>MMRK (Manajemen Mutu, Risiko, dan K3)</option>
                                <option value="Perencanaan dan Pengendalian" {{ $record->divisi == 'Perencanaan dan Pengendalian' ? 'selected' : '' }}>Perencanaan dan Pengendalian</option>
                                <option value="Operasi PLTU A/B/C/D" {{ $record->divisi == 'Operasi PLTU A/B/C/D' ? 'selected' : '' }}>Operasi PLTU A/B/C/D</option>
                                <option value="Operasi PLTGU A/B/C/D" {{ $record->divisi == 'Operasi PLTGU A/B/C/D' ? 'selected' : '' }}>Operasi PLTGU A/B/C/D</option>
                                <option value="Niaga & Bahan Bakar" {{ $record->divisi == 'Niaga & Bahan Bakar' ? 'selected' : '' }}>Niaga & Bahan Bakar</option>
                                <option value="Kimia & Laboratorium" {{ $record->divisi == 'Kimia & Laboratorium' ? 'selected' : '' }}>Kimia & Laboratorium</option>
                                <option value="Outage Management" {{ $record->divisi == 'Outage Management' ? 'selected' : '' }}>Outage Management</option>
                                <option value="Rendal Pemeliharaan" {{ $record->divisi == 'Rendal Pemeliharaan' ? 'selected' : '' }}>Rendal Pemeliharaan</option>
                                <option value="Pemeliharaan Listrik" {{ $record->divisi == 'Pemeliharaan Listrik' ? 'selected' : '' }}>Pemeliharaan Listrik</option>
                                <option value="Kontrol & Instrumen" {{ $record->divisi == 'Kontrol & Instrumen' ? 'selected' : '' }}>Kontrol & Instrumen</option>
                                <option value="Pemeliharaan Mesin 1" {{ $record->divisi == 'Pemeliharaan Mesin 1' ? 'selected' : '' }}>Pemeliharaan Mesin 1</option>
                                <option value="Pemeliharaan Mesin 2" {{ $record->divisi == 'Pemeliharaan Mesin 2' ? 'selected' : '' }}>Pemeliharaan Mesin 2</option>
                                <option value="Inventori Kontrol & Gudang" {{ $record->divisi == 'Inventori Kontrol & Gudang' ? 'selected' : '' }}>Inventori Kontrol & Gudang</option>
                                <option value="Keuangan" {{ $record->divisi == 'Keuangan' ? 'selected' : '' }}>Keuangan</option>
                                <option value="Pengadaan" {{ $record->divisi == 'Pengadaan' ? 'selected' : '' }}>Pengadaan</option>
                                <option value="SDM" {{ $record->divisi == 'SDM' ? 'selected' : '' }}>SDM</option>
                                <option value="Umum & CSR" {{ $record->divisi == 'Umum & CSR' ? 'selected' : '' }}>Umum & CSR</option>
                            </select>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <strong><i class="fas fa-university"></i> Asal Perguruan Tinggi:</strong>
                                <input type="text" name="nama_institusi" value="{{ $record->nama_institusi }}" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="card mb-4">
                    <div class="card-header">
                        <h2 class="h5 mb-0"><i class="fas fa-user"></i> Informasi Pribadi Ketua Tim</h2>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-4"><strong><i class="fas fa-id-card"></i> Nama Ketua Tim:</strong></div>
                            <div class="col-md-8">
                                <input type="text" name="nama" value="{{ $record->nama }}" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4"><strong><i class="fas fa-graduation-cap"></i> NIM:</strong></div>
                            <div class="col-md-8">
                                <input type="text" name="nim" value="{{ $record->nim }}" class="form-control" required readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4"><strong><i class="fas fa-envelope"></i> Email:</strong></div>
                            <div class="col-md-8">
                                <input type="email" name="email" value="{{ $record->email }}" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4"><strong><i class="fab fa-whatsapp"></i> No HP/WhatsApp:</strong></div>
                            <div class="col-md-8">
                                <input type="text" name="nohp" value="{{ $record->nohp }}" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4"><strong><i class="fas fa-venus-mars"></i> Jenis Kelamin:</strong></div>
                            <div class="col-md-8">
                                <select name="jeniskelamin" class="form-control" required>
                                    <option value="Laki-laki" {{ $record->jeniskelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ $record->jeniskelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4"><strong><i class="fas fa-bookmark"></i> Semester:</strong></div>
                            <div class="col-md-8">
                                <input type="text" name="semester" value="{{ $record->semester }}" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="mb-4">
                    <h2 class="section-title text-center mb-4"><i class="fas fa-users"></i> Anggota Tim</h2>
                    
                    @php
                        $members = [
                            ['nama' => $record->nama2 ?? null, 'nim' => $record->nim2 ?? null, 'jeniskelamin' => $record->jeniskelamin2 ?? null],
                            ['nama' => $record->nama3 ?? null, 'nim' => $record->nim3 ?? null, 'jeniskelamin' => $record->jeniskelamin3 ?? null],
                            ['nama' => $record->nama4 ?? null, 'nim' => $record->nim4 ?? null, 'jeniskelamin' => $record->jeniskelamin4 ?? null],
                            ['nama' => $record->nama5 ?? null, 'nim' => $record->nim5 ?? null, 'jeniskelamin' => $record->jeniskelamin5 ?? null],
                            ['nama' => $record->nama6 ?? null, 'nim' => $record->nim6 ?? null, 'jeniskelamin' => $record->jeniskelamin6 ?? null],
                            ['nama' => $record->nama7 ?? null, 'nim' => $record->nim7 ?? null, 'jeniskelamin' => $record->jeniskelamin7 ?? null],
                        ];
                    @endphp
                
                    <div class="row">
                        @foreach($members as $index => $member)
                            @if($member['nama'] || $member['nim'] || $member['jeniskelamin'])
                                <div class="col-md-4 mb-4">
                                    <div class="card shadow-sm border-light">
                                        <div class="card-header text-center">
                                            <h3 class="h6"><i class="fas fa-user-friends"></i> Anggota {{ $index + 1 }}</h3>
                                        </div>
                                        <div class="card-body">
                                            @if($member['nama'])
                                                <div class="info-row mb-2">
                                                    <strong><i class="fas fa-id-card"></i> Nama:</strong>
                                                    <input type="text" name="nama{{ $index + 2 }}" value="{{ $member['nama'] }}" class="mt-1 p-2 bg-white rounded-md border border-blue-100" required>
                                                </div>
                                            @endif
                                            @if($member['nim'])
                                                <div class="info-row mb-2">
                                                    <strong><i class="fas fa-graduation-cap"></i> NIM:</strong>
                                                    <input type="text" name="nim{{ $index + 2 }}" value="{{ $member['nim'] }}" class="mt-1 p-2 bg-white rounded-md border border-blue-100" required>
                                                </div>
                                            @endif
                                            @if($member['jeniskelamin'])
                                                <div class="info-row mb-2">
                                                    <strong><i class="fas fa-venus-mars"></i> Jenis Kelamin:</strong>
                                                    <select name="jeniskelamin{{ $index + 2 }}" class="mt-1 p-2 bg-white rounded-md border border-blue-100" required>
                                                        <option value="Laki-laki" {{ $member['jeniskelamin'] == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                                        <option value="Perempuan" {{ $member['jeniskelamin'] == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
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

                <!-- Submit Button -->
               <!-- Submit Button -->
               <form action="{{ route('moved.update', $record->nim) }}" method="POST" enctype="multipart/form-data" class="p-4">
                @csrf
                <!-- Form fields go here -->     
                <div class="mt-4 flex justify-between">
                    <button type="button" onclick="history.back()" class="flex items-center px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition duration-200">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali
                    </button>
                    <button type="submit" class="flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                        <i class="fas fa-save mr-2"></i>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
            </form>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>