<!doctype html>
<html lang="ar">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> <!-- Perbaikan tautan -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @vite(['resources/css/table.css', 'resources/js/app.js','resources/js/data.js' ])
    <title>Data Mahasiswa</title>
</head>

<body>
    <div class="d-flex">
        <x-sidebar/>
        <div class="container-fluid p-4 flex-grow-1">
            <div class="text-center mb-1">
                <h1 class="page-title">Data Mahasiswa Magang</h1>
            <button class="relative p-3 rounded-full bg-white text-gray-700 hover:bg-gray-100 shadow-md transition duration-200 focus:outline-none">
                <i class="fas fa-bell text-xl"></i>
                @if($newDataCount > 0)
                <!-- Notification Badge -->
                <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs font-bold px-1.5 py-0.5 rounded-full animate-pulse">
                    {{ $newDataCount }}
                </span>
                @endif
            </button>
            </div>
            <div class="text-center">
                <!-- Division Count Badges -->
                <div id="divisi-counts" class="d-flex justify-content-center gap-3 flex-wrap my-3"></div>
                <div id="status-counts" class="d-flex gap-2 flex-wrap mb-3 justify-content-center"></div>
                
                <div class="flex flex-wrap justify-center gap-4 mb-6">
                    <button class="btn btn-primary mx-2 px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition duration-200 flex items-center">
                        <i class="fas fa-sort-amount-down-alt mr-2"></i> Sort Newest
                    </button>
                    <button class="btn btn-secondary mx-2 px-4 py-2 rounded-lg shadow-md hover:bg-gray-700 transition duration-200 flex items-center">
                        <i class="fas fa-sort-amount-up-alt mr-2"></i> Sort Oldest
                    </button>
                    <button class="btn btn-info mx-2 px-4 py-2 rounded-lg shadow-md hover:bg-blue-500 transition duration-200 flex items-center">
                        <i class="fas fa-filter mr-2"></i> Sort by Status
                    </button>
                    <button class="btn btn-success mx-2 px-4 py-2 rounded-lg shadow-md hover:bg-green-500 transition duration-200 flex items-center">
                        <i class="fas fa-sort-alpha-down mr-2"></i> Sort by Divisi
                    </button>
                </div>
                @if(isset($newData) && $newData->count() > 0)
                    <div id="pending-alert" class="alert alert-warning d-flex align-items-center mb-4" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <div>
                            Ada {{ $newData->count() }} data mahasiswa baru dengan status <b>Pending</b> yang harus dicek admin!
                        </div>
                    </div>
                @endif
            
                <div class="table-container">
                    <table class="table table-hover" id="mahasiswaTable">
                        <thead>
                            <tr class="text-center">
                                 <th>User ID</th> <!-- New column for User ID -->
                                <th>Email</th>
                                <th>Nama Ketua Tim</th>
                                <th>Jenis Kelamin</th>
                                <th>Asal Kampus</th>
                                <th>Jurusan/Program Studi</th>
                                <th>Divisi Magang</th>
                                <th>Jumlah Mahasiswa Magang</th> <!-- New column -->
                                <th>Status</th>
                                <th>Aksi</th>
                              
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($data as $index => $row)
                            <tr class="text-center" data-date="{{ $row->created_at->toISOString() }}">
                                <td>{{ $row->user_id ?? '-' }}</td> <!-- Display User ID -->
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->jeniskelamin }}</td>
                                <td>{{ $row->nama_institusi }}</td>
                                <td>{{ $row->jurusan }}</td>
                                <td>{{ $row->divisi }}</td>
                        
                                <!-- New: Calculate number of filled names dynamically -->
                                <td>
                                    {{
                                        collect([$row->nama, $row->nama2, $row->nama3, $row->nama4, $row->nama5, $row->nama6, $row->nama7])
                                        ->filter()
                                        ->count()
                                    }}
                                </td>
                        
                                <td>
                                    <span class="status-badge {{ $row->status ? 'status-active' : 'status-pending' }}">
                                        {{ $row->status ?? 'Pending' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="/detail/{{$row->nim}}" class="btn btn-detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="/tampilform/{{$row->nim}}" class="btn btn-edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="/delete/{{$row->nim}}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                        <!-- New Form to Move Data -->
                                        <form action="/mahasiswa/{{ $row->nim }}/move" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-warning" onclick="return confirm('Apakah Anda yakin ingin memindahkan data ini?')">
                                                <i class="fas fa-arrow-right"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                               
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>