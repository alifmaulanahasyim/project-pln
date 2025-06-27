<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Divisi Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap & Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Your Vite Assets -->
    @vite(['resources/css/table.css', 'resources/js/app.js'])
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <x-sidebar />

        <!-- Main Content -->
        <div class="container-fluid p-4 flex-grow-1">
            <div class="text-center">
                <h1 class="page-title">Edit Divisi</h1>
            </div>

            {{-- Success Message --}}
            @if(session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Form Section --}}
            <div class="row justify-content ">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="{{ isset($editDivisi) ? route('divisis.update', $editDivisi) : route('divisis.store') }}" method="POST">
                                @csrf
                                @if(isset($editDivisi))
                                    @method('PUT')
                                @endif

                                <div class="mb-3">
                                    <label for="divisi" class="form-label">Divisi</label>
                                    <input type="text" id="divisi" name="divisi" class="form-control" required
                                           value="{{ old('divisi', $editDivisi->divisi ?? '') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="sisa" class="form-label">Kuota Maksimal</label>
                                    <input type="text" id="sisa" name="sisa" class="form-control" required
                                           value="{{ old('sisa', $editDivisi->sisa ?? '') }}">
                                </div>

                                <button type="submit" class="btn btn-primary w-100">
                                    {{ isset($editDivisi) ? 'Update' : 'Add' }} Divisi
                                </button>

                                @if(isset($editDivisi))
                                    <a href="{{ route('divisis.index') }}" class="btn btn-secondary w-100 mt-2">Cancel</a>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Table Section --}}
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-light text-center">
                                <tr>
                                   
                                    <th>Divisi</th>
                                    <th>Kuota Maksimal</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($divisis as $divisi)
                                    <tr class="text-center">

                                        <td>{{ $divisi->divisi }}</td>
                                        <td>{{ $divisi->sisa }}</td>
                                        <td>
                           
                                            <a href="{{ route('divisis.index', ['edit' => $divisi->id]) }}" class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        <form action="{{ route('divisis.destroy', $divisi) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Delete?')" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                        </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
