<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Histori Mahasiswa Magang</title>
    <link href='img/favicon.ico' rel='shortcut icon'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        .gender-icon {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 5px;
        }
        .male {
            background-color: #ffc107; /* Yellow for male */
            color: black; /* Black icon */
        }
        .female {
            background-color: #343a40; /* Dark for female */
            color: white; /* White icon */
        }
        footer {
            background-color: #343a40; /* Dark footer */
            padding: 20px 0;
            color: white; /* White text */
        }
        .card {
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }
        .link-button {
            display: inline-flex;
            align-items: center;
            background-color: #ffc107; /* Yellow */
            color: black; /* Black text */
            padding: 8px 15px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .link-button:hover {
            background-color: #343a40; /* Dark on hover */
            color: white; /* White text on hover */
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
            {{-- <img src="/api/placeholder/150/80" alt="PLN Nusantara Power Logo" class="img-fluid mb-2"> --}}
            <h1 class="display-4 text-warning">Detail Histori Mahasiswa Magang</h1>
            <p class="lead text-secondary">PT. PLN Nusantara Power Unit Pembangkit Belawan</p>
        </header>

        <main>
            <!-- Program Information Card -->
            <section class="card mb-4">
                <div class="card-header">
                    <h2 class="h5 mb-0"><i class="fas fa-calendar-alt"></i> Informasi Program</h2>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong><i class="fas fa-play"></i> Tanggal Mulai:</strong>
                            <span>{{ $record->mulai_magang }}</span>
                        </div>
                        <div class="col-md-6">
                            <strong><i class="fas fa-flag-checkered"></i> Tanggal Selesai:</strong>
                            <span>{{ $record->selesai_magang }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <strong><i class="fas fa-building"></i> Divisi:</strong>
                            <span class="badge badge-primary">{{ $record->divisi }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <strong><i class="fas fa-university"></i> Asal Perguruan Tinggi:</strong>
                            <span class="badge badge-primary">{{ $record->nama_institusi }}</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Personal Information Card -->
            <section class="card mb-4">
                <div class="card-header">
                    <h2 class="h5 mb-0"><i class="fas fa-user"></i> Informasi Pribadi Ketua Tim</h2>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4"><strong><i class="fas fa-id-card"></i> Nama Ketua Tim:</strong></div>
                        <div class="col-md-8">{{ $record->nama }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4"><strong><i class="fas fa-graduation-cap"></i> NIM:</strong></div>
                        <div class="col-md-8">{{ $record->nim }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4"><strong><i class="fas fa-envelope"></i> Email:</strong></div>
                        <div class="col-md-8">{{ $record->email }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4"><strong><i class="fab fa-whatsapp"></i> No HP/WhatsApp:</strong></div>
                        <div class="col-md-8">{{ $record->nohp }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4"><strong><i class="fas fa-venus-mars"></i> Jenis Kelamin:</strong></div>
                        <div class="col-md-8">
                            @if($record->jeniskelamin == 'laki-laki')
                                <span class="gender-icon male"><i class="fas fa-mars"></i></span>
                            @else
                                <span class="gender-icon female"><i class="fas fa-venus"></i></span>
                            @endif
                            {{ $record->jeniskelamin }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4"><strong><i class="fas fa-bookmark"></i> Semester:</strong></div>
                        <div class="col-md-8">{{ $record->semester }}</div>
                    </div>
                </div>
            </section>

          <!-- Team Members Card -->
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
                                                <span>{{ $member['nama'] }}</span>
                                            </div>
                                        @endif
                                        @if($member['nim'])
                                            <div class="info-row mb-2">
                                                <strong><i class="fas fa-graduation-cap"></i> NIM:</strong>
                                                <span>{{ $member['nim'] }}</span>
                                            </div>
                                        @endif
                                        @if($member['jeniskelamin'])
                                            <div class="info-row mb-2">
                                                <strong><i class="fas fa-venus-mars"></i> Jenis Kelamin:</strong>
                                                <span>
                                                    @if($member['jeniskelamin'] == 'Laki-laki')
                                                        <span class="gender-icon male"><i class="fas fa-mars"></i></span>
                                                    @else
                                                        <span class="gender-icon female"><i class="fas fa-venus"></i></span>
                                                    @endif
                                                    {{ $member['jeniskelamin'] }}
                                                </span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </section>

            <!-- Return Button -->
            <div class="mt-4 text-right">
                <button type="button" onclick="history.back()" class="custom-yellow-button flex items-center">          
                    <i class="fas fa-arrow-left mr-2"></i>            
                    Kembali
                </button> 
            </div>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>