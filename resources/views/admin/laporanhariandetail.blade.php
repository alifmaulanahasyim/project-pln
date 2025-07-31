@php use Carbon\Carbon; @endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Semua Data Laporan Harian</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .card-shadow {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
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
    <div class="gradient-bg py-8">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <div class="text-center text-white w-full">
                <h1 class="text-4xl font-bold mb-2">
                    <i class="fas fa-clipboard-list mr-3"></i>
                    Semua Data Laporan Harian
                </h1>
                <p class="text-xl opacity-90">PT PLN Nusantara Power Unit Pembangkit Belawan</p>
            </div>
        </div>
    </div>
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-6xl mx-auto">
            <div class="bg-white rounded-2xl card-shadow p-8 animate-fade-in">
                <div class="mb-8 text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mb-4">
                        <i class="fas fa-table text-2xl text-blue-600"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">Tabel Semua Laporan Harian</h2>
                </div>
                <div class="table-responsive">
                    <table class="min-w-full table-auto border border-gray-200">
    <thead class="bg-blue-50">
        <tr>
            <th class="px-4 py-2 border">Tanggal</th>
            <th class="px-4 py-2 border">Nama Anggota</th>
            <th class="px-4 py-2 border">Kegiatan</th>
            <th class="px-4 py-2 border">Status Kehadiran</th>
        </tr>
    </thead>
    <tbody>
        @forelse($laporans as $laporan)
            @php
                $tanggal = optional($laporan->created_at)->timezone('Asia/Jakarta')->format('d M Y H:i') ?? '-';
                $kegiatan = $laporan->kegiatan;
                $status = $laporan->status_kehadiran;

                $anggotaList = collect([
                    $laporan->mahasiswa->nama ?? null,
                    $laporan->mahasiswa->nama2 ?? null,
                    $laporan->mahasiswa->nama3 ?? null,
                    $laporan->mahasiswa->nama4 ?? null,
                    $laporan->mahasiswa->nama5 ?? null,
                    $laporan->mahasiswa->nama6 ?? null,
                    $laporan->mahasiswa->nama7 ?? null,
                ])->filter();
            @endphp

            @foreach($anggotaList as $anggota)
                <tr class="hover:bg-blue-50">
                    <td class="px-4 py-2 border">{{ $tanggal }}</td>
                    <td class="px-4 py-2 border">{{ $anggota }}</td>
                    <td class="px-4 py-2 border text-left">{{ $kegiatan }}</td>
                    <td class="px-4 py-2 border capitalize">{{ $status }}</td>
                </tr>
            @endforeach
        @empty
            <tr>
                <td colspan="4" class="px-4 py-2 border text-center text-gray-500">Belum ada laporan</td>
            </tr>
        @endforelse
    </tbody>
</table>


                    @if(method_exists($laporans, 'links'))
                        <div class="mt-4">{{ $laporans->links() }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>
</html>
