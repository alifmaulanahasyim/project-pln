<!doctype html>
<html lang="ar">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @vite(['resources/css/table.css', 'resources/js/app.js'])
    <title>Data Mahasiswa</title>
</head>

<body>
    <x-sidebar></x-sidebar>
    <div class="container-fluid">
        <div class="text-center my-4">
            <h1 class="page-title">Histori Mahasiswa Magang</h1>
            <div class="flex flex-wrap justify-center gap-4 mb-6">
                <button class="btn btn-primary mx-2 px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition duration-200 flex items-center">
                    <i class="fas fa-sort-amount-down-alt mr-2"></i> Sort Newest
                </button>
                <button class="btn btn-secondary mx-2 px-4 py-2 rounded-lg shadow-md hover:bg-gray-700 transition duration-200 flex items-center">
                    <i class="fas fa-sort-amount-up-alt mr-2"></i> Sort Oldest
                </button>
            </div>
        </div>
        <div class="table-container">
            <table class="table table-hover" id="mahasiswaTable">
                <thead>
                    <tr class="text-center">
                        <th>User ID</th>
                        <th>Email</th>
                        <th>Nama Ketua Tim</th>
                        <th>Jenis Kelamin</th>
                        <th>Asal Kampus</th>
                        <th>Jurusan/Program Studi</th>
                        <th>Divisi PKL</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($movedRecords as $index => $row)
                    <tr class="text-center" data-date="{{ $row->created_at }}">
                        <td>{{ $row->user_id ?? '-' }}</td> <!-- Display User ID -->
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->jeniskelamin }}</td>
                        <td>{{ $row->nama_institusi }}</td>
                        <td>{{ $row->jurusan }}</td>
                        <td>{{ $row->divisi }}</td>
                        <td>
                            <span class="status-badge {{ $row->status ? 'status-active' : 'status-lulus' }}">
                                {{ $row->status ?? 'Lulus' }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                {{-- <a href="{{ route('moved.show', $row->nim) }}" class="btn btn-detail" title="View Details">
                                    <i class="fas fa-eye"></i>
                                </a> --}}
                                <a href="{{ route('historytampil.edit', $row->nim) }}" class="btn btn-edit" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('history.delete', $row->nim) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-delete" onclick="confirmDelete(this)" title="Delete">
                                        <i class="fas fa-trash"></i>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function confirmDelete(button) {
            if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                button.parentElement.submit(); // Submit the form if confirmed
            }
        }

        function sortTable(order) {
            const table = document.getElementById("mahasiswaTable");
            const tbody = table.querySelector("tbody");
            const rows = Array.from(tbody.querySelectorAll("tr"));

            rows.sort((a, b) => {
                const dateA = new Date(a.getAttribute("data-date"));
                const dateB = new Date(b.getAttribute("data-date"));
                return order === 'newest' ? dateB - dateA : dateA - dateB;
            });
        

            rows.forEach(row => tbody.appendChild(row));
        }
    </script>
</body>
</html>