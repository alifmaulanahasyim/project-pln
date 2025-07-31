@php use Carbon\Carbon; @endphp
@php
    $sertifikatDikirim = $sertifikatDikirim ?? false;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Harian - Input Data</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .card-shadow {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .input-focus {
            transition: all 0.3s ease;
        }
        .input-focus:focus {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        .btn-hover {
            transition: all 0.3s ease;
        }
        .btn-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
        .animate-fade-in {
            animation: fadeIn 0.5s ease-in;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        textarea {
    text-align: left;          /* Align text to the left */
    vertical-align: top;       /* Ensure text starts from top */
    padding: 8px;              /* Optional for spacing */
}
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Header Section -->
    <div class="gradient-bg py-8">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <div class="text-center text-white w-full">
                <h1 class="text-4xl font-bold mb-2">
                    <i class="fas fa-clipboard-list mr-3"></i>
                    Laporan Harian
                </h1>
                <p class="text-xl opacity-90">Mahasiswa Magang di PT PLN Nusantara Power Unit Pembangkit Belawan</p>
            </div>
            <div class="ml-4">
                <form method="POST" action="{{ route('logout') }}" id="logout-form">
                    @csrf
                    <button type="submit" 
                            class="bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold py-3 px-6 rounded-xl shadow-lg btn-hover focus:outline-none focus:ring-4 focus:ring-red-300 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl active:translate-y-0">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>

<form id="laporanForm"
      action="{{ $sudahAda ? route('laporan-harian.laporanharian.update', $laporan->id) : route('laporan-harian.laporanharian.store') }}"
      method="POST"
      class="space-y-6">
    @csrf
    @if($sudahAda)
        @method('PUT')
    @endif

    {{-- Kegiatan --}}
    <div>
        <label for="kegiatan" class="block text-sm font-semibold text-gray-700 mb-2">
            <i class="fas fa-tasks mr-2 text-purple-500"></i>
            Deskripsi Kegiatan
        </label>
        <textarea name="kegiatan" id="kegiatanField" rows="6"
                  placeholder="Deskripsikan kegiatan hari ini..."
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none resize-none text-sm @error('kegiatan') border-red-500 @enderror"
                  {{ $sudahAda && empty(old('kegiatan')) ? 'disabled' : '' }}>
            {{ old('kegiatan') ?: ($laporan->kegiatan ?? '') }}
        </textarea>
        @error('kegiatan')
            <p class="mt-1 text-sm text-red-600"><i class="fas fa-info-circle mr-1"></i>{{ $message }}</p>
        @enderror
    </div>

    {{-- Kehadiran Anggota --}}
    <div>
    <label class="block text-sm font-semibold text-gray-700 mb-2">
        <i class="fas fa-users mr-2 text-green-500"></i>
        Status Kehadiran Anggota
    </label>
    @php
        $anggota = collect([
            $mahasiswa->nama,
            $mahasiswa->nama2,
            $mahasiswa->nama3,
            $mahasiswa->nama4,
            $mahasiswa->nama5,
            $mahasiswa->nama6,
            $mahasiswa->nama7,
        ])->filter();

        $statusKehadiran = $laporan->status_kehadiran ?? []; // assumed to be array from DB
    @endphp

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
            <thead class="bg-gray-100 text-sm text-gray-600">
                <tr>
                    <th class="py-2 px-4 text-left">Nama</th>
                    <th class="py-2 px-4 text-left">Status Kehadiran</th>
                </tr>
            </thead>
            <tbody class="text-sm">
                @foreach ($anggota as $nama)
                    <tr>
                        <td class="py-2 px-4">{{ $nama }}</td>
                        <td class="py-2 px-4">
                            <select name="status_kehadiran[{{ $nama }}]" class="border rounded px-2 py-1">
                                @foreach (['hadir', 'izin', 'sakit', 'alpha'] as $status)
                                    <option value="{{ $status }}"
                                        {{ ($statusKehadiran[$nama] ?? '') === $status ? 'selected' : '' }}>
                                        {{ ucfirst($status) }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


    {{-- Submit Buttons --}}
    <div class="flex flex-col sm:flex-row gap-3 pt-4">
        <button type="submit"
                class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg font-semibold transition"
                @if($sudahAda && empty(old('kegiatan'))) disabled @endif>
            <i class="fas fa-save mr-2"></i> Simpan Laporan
        </button>

        @if(isset($sudahAda, $laporan) && $sudahAda)
            <button type="button" id="editBtn"
                    class="w-full sm:w-auto bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-3 rounded-lg font-semibold transition">
                <i class="fas fa-edit mr-2"></i> Edit Laporan
            </button>

            <button type="submit" id="submitEditBtn"
                    class="hidden w-full sm:w-auto bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-lg font-semibold transition">
                <i class="fas fa-check mr-2"></i> Simpan Perubahan
            </button>
        @endif

        <a href="{{ route('laporan-harian.laporanharian.index') }}"
           class="w-full sm:w-auto bg-gray-500 hover:bg-gray-600 text-white px-5 py-3 rounded-lg font-semibold text-center transition">
            <i class="fas fa-times mr-2"></i> Batal
        </a>
    </div>
</form>
    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6 mt-12">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} Sistem Laporan Harian. All rights reserved.</p>
        </div>
    </footer>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const editBtn = document.getElementById('editBtn');
    const kegiatanField = document.getElementById('kegiatanField');
    const submitNewBtn = document.getElementById('submitNewBtn');
    const submitEditBtn = document.getElementById('submitEditBtn');
    const laporanForm = document.getElementById('laporanForm');

    // Auto-resize textarea
    if (kegiatanField) {
        kegiatanField.addEventListener('input', function () {
            this.style.height = 'auto';
            this.style.height = this.scrollHeight + 'px';
        });
        kegiatanField.dispatchEvent(new Event('input'));
    }

    // Enable editing
    if (editBtn && kegiatanField && submitEditBtn) {
        editBtn.addEventListener('click', function () {
            kegiatanField.removeAttribute('disabled');
            kegiatanField.focus();
            editBtn.classList.add('hidden');
            submitNewBtn.classList.add('hidden');
            submitEditBtn.classList.remove('hidden');
        });
    }

    // Form validation
    if (laporanForm && kegiatanField) {
        laporanForm.addEventListener('submit', function (e) {
            const kegiatan = kegiatanField.value.trim();
            const isEditable = !kegiatanField.disabled;
            let activeBtn = isEditable ? submitEditBtn : submitNewBtn;
            let hasError = false;

            clearErrors();

            if (!kegiatan) {
                showError('kegiatanField', 'Silakan isi kegiatan');
                hasError = true;
            } else if (kegiatan.length < 10) {
                showError('kegiatanField', 'Kegiatan harus diisi minimal 10 karakter');
                hasError = true;
            }

            if (hasError) {
                e.preventDefault();
                kegiatanField.scrollIntoView({ behavior: 'smooth', block: 'center' });
                return;
            }

            // Show loading
            if (activeBtn) {
                activeBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Menyimpan...';
                activeBtn.disabled = true;
            }
        });
    }

    // Error helpers
    function clearErrors() {
        document.querySelectorAll('.error-message').forEach(msg => msg.remove());
        const field = document.getElementById('kegiatanField');
        field?.classList.remove('border-red-500');
        field?.classList.add('border-gray-200');
    }

    function showError(fieldId, message) {
        const field = document.getElementById(fieldId);
        if (!field) return;

        field.classList.add('border-red-500');
        field.classList.remove('border-gray-200');

        let errorMsg = field.parentNode.querySelector('.error-message');
        if (!errorMsg) {
            errorMsg = document.createElement('p');
            errorMsg.className = 'mt-2 text-sm text-red-600 flex items-center error-message';
            field.parentNode.appendChild(errorMsg);
        }
        errorMsg.innerHTML = `<i class="fas fa-exclamation-circle mr-1"></i>${message}`;
    }
});
</script>
</body>
</html>
