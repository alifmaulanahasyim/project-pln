{{-- resources/views/laporan-harian/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Input Laporan Harian')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Input Laporan Harian</h1>
                <p class="text-gray-600 mt-2">Masukkan detail kegiatan harian Anda</p>
            </div>

            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 rounded-md p-4 mb-6">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">Terdapat kesalahan:</h3>
                            <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            @if (session('success'))
                <div class="bg-green-50 border border-green-200 rounded-md p-4 mb-6">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <form action="{{ route('laporan-harian.store') }}" method="POST" class="space-y-6">
                @csrf

                {{-- NIM Mahasiswa --}}
                <div>
                    <label for="mahasiswa_nim" class="block text-sm font-medium text-gray-700 mb-2">
                        NIM Mahasiswa
                    </label>
                    <select name="mahasiswa_nim" id="mahasiswa_nim" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('mahasiswa_nim') border-red-500 @enderror">
                        <option value="">Pilih NIM Mahasiswa</option>
                        @foreach($mahasiswas as $mahasiswa)
                            <option value="{{ $mahasiswa->nim }}" {{ old('mahasiswa_nim') == $mahasiswa->nim ? 'selected' : '' }}>
                                {{ $mahasiswa->nim }} - {{ $mahasiswa->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('mahasiswa_nim')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tanggal --}}
                <div>
                    <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-2">
                        Tanggal
                    </label>
                    <input type="date" name="tanggal" id="tanggal" 
                           value="{{ old('tanggal', date('Y-m-d')) }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('tanggal') border-red-500 @enderror">
                    @error('tanggal')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Kegiatan --}}
                <div>
                    <label for="kegiatan" class="block text-sm font-medium text-gray-700 mb-2">
                        Kegiatan
                    </label>
                    <textarea name="kegiatan" id="kegiatan" rows="8" 
                              placeholder="Deskripsikan kegiatan yang dilakukan hari ini secara detail..."
                              class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('kegiatan') border-red-500 @enderror">{{ old('kegiatan') }}</textarea>
                    @error('kegiatan')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-sm text-gray-500">Jelaskan kegiatan yang dilakukan dengan detail</p>
                </div>

                {{-- Buttons --}}
                <div class="flex gap-4 pt-4">
                    <button type="submit" 
                            class="flex-1 bg-blue-600 text-white py-2 px-4 rounded-md font-medium hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200">
                        <svg class="inline-block w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Simpan Laporan
                    </button>
                    
                    <a href="{{ route('laporan-harian.index') }}" 
                       class="flex-1 bg-gray-500 text-white py-2 px-4 rounded-md font-medium hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition duration-200 text-center">
                        <svg class="inline-block w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Batal
                    </a>
                </div>
            </form>
        </div>

        {{-- Quick Info Card --}}
        <div class="bg-blue-50 border border-blue-200 rounded-md p-4 mt-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-blue-800">Tips Pengisian Laporan</h3>
                    <div class="mt-2 text-sm text-blue-700">
                        <ul class="list-disc list-inside space-y-1">
                            <li>Pastikan tanggal laporan sesuai dengan kegiatan yang dilakukan</li>
                            <li>Deskripsikan kegiatan dengan jelas dan detail</li>
                            <li>Sertakan hasil atau pencapaian dari kegiatan tersebut</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Auto-resize textarea
    document.getElementById('kegiatan').addEventListener('input', function() {
        this.style.height = 'auto';
        this.style.height = this.scrollHeight + 'px';
    });

    // Form validation
    document.querySelector('form').addEventListener('submit', function(e) {
        const nim = document.getElementById('mahasiswa_nim').value;
        const tanggal = document.getElementById('tanggal').value;
        const kegiatan = document.getElementById('kegiatan').value.trim();

        if (!nim) {
            alert('Silakan pilih NIM Mahasiswa');
            e.preventDefault();
            return;
        }

        if (!tanggal) {
            alert('Silakan pilih tanggal');
            e.preventDefault();
            return;
        }

        if (!kegiatan) {
            alert('Silakan isi kegiatan');
            e.preventDefault();
            return;
        }

        if (kegiatan.length < 10) {
            alert('Kegiatan harus diisi minimal 10 karakter');
            e.preventDefault();
            return;
        }
    });
</script>
@endpush