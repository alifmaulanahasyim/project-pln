<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histori Mahasiswa Magang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { width: 100%;
            background-color: #f8f9fa; /* Light background */
        }
        footer {
            background-color: #343a40; /* Dark footer */
            padding: 20px 0;
            color: white; /* White text */
        }
        .return-button {
            background: linear-gradient(to right, #0056b3, #007bff);
            color: white;
            border: none;
            border-radius: 0.5rem;
            padding: 0.75rem 1.5rem;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }
        .return-button:hover {
            background: linear-gradient(to right, #007bff, #0056b3);
            transform: scale(1.05);
        }
        .table-container {
            overflow-x: auto; /* Allow horizontal scrolling */
        }
    </style>
</head>

<body>
    <x-header/>
    <div class="bg-white shadow-sm py-4 px-4 text-center mb-6">
        <h2 class="text-3xl font-bold header-title">STATUS PENERIMAAN MAHASISWA MAGANG</h2>
        <p class="text-lg">PT. PLN Nusantara Power Unit Pembangkit Belawan</p>
    </div>
        
    <div class="container-fluid">
        <div class="card-container">
            <div class="d-flex justify-content-between align-items-center mb-4">
               
                <div class="d-flex gap-2">   
                    <div class="input-group">
                        <button id="sortButton" class="btn btn-warning me-2">Sort by Newest</button>
                        <input type="text" class="form-control" placeholder="Cari Data" id="searchInput">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="table-container">
                <table class="table table-hover" id="mahasiswaTable">
                    <thead>
                        <tr class="text-center">
                            <th>No</th> <!-- Kolom No ditambahkan -->
                            <th>Email</th>
                            <th>Nama Ketua Tim</th>
                            <th>Jenis Kelamin</th>
                            <th>Asal Kampus</th>
                            <th>Jurusan/Program Studi</th>
                            <th>Divisi Magang</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
    
                    <tbody>
                        @foreach ($data as $index => $row) <!-- Menambahkan index untuk nomor urut -->
                        <tr class="text-center" data-date="{{ $row->created_at }}">
                            <td>{{ $index + 1 }}</td> <!-- Menampilkan nomor urut -->
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->jeniskelamin }}</td>
                            <td>{{ $row->nama_institusi }}</td>
                            <td>{{ $row->jurusan }}</td>
                            <td>{{ $row->divisi }}</td>
                            <td>
                                <span class="status-badge {{ $row->status ? 'status-active' : 'status-pending' }}">
                                    {{ $row->status ?? 'Pending' }} <!-- Automatically set to 'pending' if blank -->
                                </span>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="/detail/{{$row->nim}}" class="btn btn-detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const table = document.getElementById('movedMahasiswaTable');
            const rows = table.getElementsByTagName('tr');
            const sortButton = document.getElementById('sortButton');
            let isNewest = true;

            searchInput.addEventListener('keyup', function() {
                const query = searchInput.value.toLowerCase();
                
                for (let i = 1; i < rows.length; i++) {
                    let foundMatch = false;
                    const cells = rows[i].getElementsByTagName('td');
                    
                    for (let j = 0; j < cells.length; j++) {
                        const cellText = cells[j].textContent.toLowerCase();
                        if (cellText.indexOf(query) > -1) {
                            foundMatch = true;
                            break;
                        }
                    }
                    
                    rows[i].style.display = foundMatch ? '' : 'none';
                }
            });

            sortButton.addEventListener('click', function() {
                const tbody = table.querySelector('tbody');
                const sortedRows = Array.from(rows).slice(1).sort((a, b) => {
                    const dateA = new Date(a.cells[1].textContent); // Assuming NIM is a date for sorting
                    const dateB = new Date(b.cells[1].textContent);
                    return isNewest ? dateB - dateA : dateA - dateB;
                });

                sortedRows.forEach(row => tbody.appendChild(row));
                isNewest = !isNewest;
                sortButton.textContent = isNewest ? 'Sort by Newest' : 'Sort by Oldest';
            });
        });
    </script>
    <x-footer></x-footer>
</body>
</html>