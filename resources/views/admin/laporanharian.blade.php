<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Laporan Harian</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
 @vite(['resources/css/table.css', 'resources/js/app.js'])
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <x-sidebar></x-sidebar>
        <!-- Main Content -->
        <div class="container-fluid p-4 flex-grow-1">
            <div class="text-center mb-4">
                <h1 class="page-title">Manajemen Laporan Harian</h1>
            </div>
            @if(session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle text-center">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($laporans as $laporan)
                                <tr>
                                    <td>{{ $laporan->id }}</td>
                                    <td>{{ $laporan->mahasiswa->nama ?? '-' }}</td>
                                    <td>{{ $laporan->tanggal->format('d M Y') }}</td>
                                    <td>
<a href="{{ route('admin.laporanhariandetail.mahasiswa', $laporan->mahasiswa_nim) }}" class="btn btn-sm btn-info">Detail</a>                                        <form action="{{ route('admin.laporanharian.destroy', $laporan->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus laporan ini?')"> <i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if(method_exists($laporans, 'links'))
                            {{ $laporans->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>