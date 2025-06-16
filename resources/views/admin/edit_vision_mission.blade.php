<!doctype html>
<html lang="ar">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> <!-- Using Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @vite(['resources/css/table.css', 'resources/js/app.js'])
    <title>Edit Visi dan Misi</title>
</head>

<body>
    
    <div class="d-flex">
        <x-sidebar></x-sidebar>
        <div class="container-fluid p-4 flex-grow-1">
            <div class="text-center">
                <h1 class="page-title">Edit Visi dan Misi</h1>
            </div>
    
            @if(session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif
    
            <!-- Form Section -->
            <div class="row justify-content">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="{{ route('admin.vision_mission.update') }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label for="vision" class="form-label">Visi</label>
                                    <input type="text" name="vision" id="vision" value="{{ old('vision', $visionMission->vision ?? '') }}"
                                        class="form-control @error('vision') is-invalid @enderror" required>
                                    @error('vision')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="mission" class="form-label">Misi</label>
                                    <!-- Here, we output old('mission') in the textarea -->
                                    <textarea name="mission" id="mission" rows="4" 
                                            class="form-control @error('mission') is-invalid @enderror" required>{{ old('mission', $visionMission->mission ?? '') }}</textarea>
                                    @error('mission')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <!-- Sidebar (Optional) -->

    

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
