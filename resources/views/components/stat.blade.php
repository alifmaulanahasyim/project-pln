<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
  <section class="bg-gray-300 py-12">
    <div class="container mx-auto text-center">
      <!-- Tambahkan max-w-[value] untuk membatasi lebar -->
      <div class="bg-white py-16 sm:py-20 px-6 sm:px-12 rounded-2xl flex justify-center items-center max-w-5xl mx-auto">
        <div class="w-full">
          <!-- Flex dan grid responsif -->
          <dl class="grid grid-cols-1 gap-x-8 gap-y-12 text-center sm:grid-cols-3">
            <!-- Kontainer kecil untuk elemen teks -->
            <div class="mx-auto flex max-w-xs flex-col gap-y-4">
              <dt class="text-sm text-gray-600">Buka di Hari</dt>
              <dd class="order-first text-2xl font-semibold tracking-tight text-gray-900 sm:text-3xl md:text-4xl">Senin - Jum'at</dd>
            </div>
            <div class="mx-auto flex max-w-xs flex-col gap-y-4">
              <dt class="text-sm text-gray-600">Sisa kuota</dt>
              <dd class="order-first text-2xl font-semibold tracking-tight text-gray-900 sm:text-3xl md:text-4xl">26/36</dd>
            </div>
            <div class="mx-auto flex max-w-xs flex-col gap-y-4">
              <dt class="text-sm text-gray-600">Telah Diterima</dt>
              <dd class="order-first text-2xl font-semibold tracking-tight text-gray-900 sm:text-3xl md:text-4xl">460</dd>
            </div>
          </dl>
        </div>
      </div>
    </div>
  </section>
</body>
</html>
