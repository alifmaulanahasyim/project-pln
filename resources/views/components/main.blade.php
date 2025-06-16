<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js"></script>
  <style>
    [x-cloak] {
      display: none !important;
    }
    .no-scrollbar::-webkit-scrollbar {
      display: none;
    }
    .no-scrollbar {
      -ms-overflow-style: none; /* IE and Edge */
      scrollbar-width: none; /* Firefox */
    }
  </style>
</head>
<body>
  <main class="relative slideshow-bg h-screen flex items-center justify-center" x-data="{ open: false, agreed: false }">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative text-center z-10">
      <h1 class="text-balance text-3xl font-semibold tracking-tight text-white sm:text-5xl">
        PT. PLN Nusantara Power Unit Pembangkit Belawan <br> Sistem Informasi Penerimaan Mahasiswa Magang 
      </h1>
      <p class="mt-8 text-pretty text-base font-medium text-gray-300 sm:text-lg/6">
        Isi formulir dibawah ini jika ingin melaksanakan magang di PT. PLN Nusantara Power UP Belawan
      </p>
      <div class="mt-10 flex items-center justify-center gap-x-6">
        <a href="#" @click.prevent="open = true" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
          Isi Formulir
        </a>
        
      </div>
    </div>

    <div x-show="open" x-cloak x-transition class="fixed inset-0 flex items-center justify-center z-50">
      <div class="absolute inset-0 bg-black bg-opacity-50" @click="open = false"></div>
      <div class="relative bg-white rounded-lg shadow-lg w-4/5 sm:w-2/3 max-h-3/4 overflow-hidden z-50">
        <div class="px-6 py-4 border-b border-gray-300">
          <h2 class="text-xl font-bold text-gray-800 text-center">KETENTUAN</h2>
        </div>
        <div class="px-6 py-4 overflow-y-auto max-h-60 no-scrollbar">
          <p class="text-sm text-gray-700">Setelah diterima, ketentuan berikut wajib dipatuhi oleh mahasiswa/i yang akan menjalani PKL di PT PLN Nusantara Power UP Belawan. Harap diperhatikan dengan seksama.</p>
          <ul class="list-decimal pl-5 space-y-2 text-sm text-gray-700">
            <li>Mahasiswa/i wajib membawa sendiri Alat Pelindung Diri (safety helmet dan safety shoes).</li>
            <li>Mahasiswa/i tidak diperkenankan naik angkutan umum selama magang di PLN UP Belawan.</li>
            <li>Mahasiswa/i wajib mengikuti Standar Prosedur Pelaksanaan Magang Mahasiswa di PT PLN Nusantara Power UP Belawan.</li>
            <li>Mahasiswa/i wajib menyetarakan BPJS Kesehatan atau asuransi kesehatan lainnya.</li>
            <li>Mahasiswa/i wajib menyertakan riwayat penyakit setahun terakhir.</li>
          </ul>
          <p class="text-sm text-gray-700">Demikian disampaikan untuk dapat diketahui, atas perhatiannya diucapkan terima kasih.</p>
          <div class="mt-4">
            <input type="checkbox" id="agree" x-model="agreed" class="mr-2">
            <label for="agree" class="text-sm text-gray-700">Saya setuju dengan ketentuan di atas</label>
          </div>
        </div>
        <div class="flex justify-end px-6 py-4 border-t border-gray-300">
          <button @click="agreed ? window.location.href='/form' : alert('Silakan setujui ketentuan terlebih dahulu.')" class="bg-green-600 text-white px-5 py-2 rounded-md shadow-md text-sm hover:bg-green-500 focus:outline-none ml-2">
            Lanjut ke Formulir
          </button>
        </div>        
      </div>
    </div>
  </main>
</body>
</html>