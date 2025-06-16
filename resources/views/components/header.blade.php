<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body x-data="{ isOpen: false, popupOpen: false }">
    <header class="bg-yellow-500 sticky top-0 z-50">
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
          <div class="flex lg:flex-1">
            <a href="" class="-m-1.5 p-1.5 ">
              <span class="sr-only">Your Company</span>
              <!-- Logo Images -->
              <img :class="isOpen ? 'h-6 top-3' : 'h-8 top-6'" 
              class="w-auto absolute left-6 top-3 transition-all duration-300" src="{{ asset('img/logobumn.png') }}" alt="">
              <img :class="isOpen ? 'h-6 top-3' : 'h-8 top-6'" 
              class="w-auto absolute right-6 top-3 transition-all duration-300" src="{{ asset('img/logopln.png') }}" alt="">
            </a>
          </div>
          <div class="flex lg:hidden">
            <button type="button" @click="isOpen = !isOpen" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
              <span class="sr-only">Open main menu</span>
              <svg :class="{'hidden': isOpen, 'block': !isOpen }" class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
              </svg>
            </button>
          </div>
          <div class="hidden lg:flex lg:gap-x-12">
            <a href="/" class="text-sm/6 font-semibold text-gray-900">Home</a>  
            <a href="/about" class="text-sm/6 font-semibold text-gray-900">About</a>   
            <a href="/divisi" class="text-sm/6 font-semibold text-gray-900">Divisi</a>   
            <a href="/" class="text-sm/6 font-semibold text-gray-900">Sertifikat Magang</a>
            <a href="/moved" class="text-sm/6 font-semibold text-gray-900">Histori Magang</a>
          </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
              <a href="#" class="text-sm/6 font-semibold text-gray-900"><span aria-hidden="true"></span></a>
            </div>
          </nav>
        
        <!-- Mobile menu, show/hide based on menu open state. -->
        <div class="lg:hidden" role="dialog" aria-modal="true">
          <div class="fixed inset-0 z-10" x-show="isOpen" x-transition:enter="transition ease-in-out duration-300" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"></div>
          <div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10" x-show="isOpen" x-transition:enter="transition ease-in-out duration-300" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full">
            <div class="flex items-center justify-between">
              <a href="#" class="-m-1.5 p-1.5">
                <span class="sr-only">Your Company</span>
                <img class="h-8 w-auto" src="{{ asset('img/logopln21.png') }}" alt="">
              </a>
              <button @click="isOpen = false" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                <span class="sr-only">Close menu </span>
                <svg :class="{'block': isOpen, 'hidden': !isOpen }" class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
            <div class="mt-6 flow-root">
              <div class="-my-6 divide-y divide-gray-500/10">
                <div class="space-y-2 py-6">
                  <a href="/" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Home</a>
                  <a href="/about" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">About</a>
                  <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Company</a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </header>

    <!-- Your main content here -->

    <!-- Popup Notification -->
    <div x-show="popupOpen" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50" style="display: none;">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <p class="text-lg font-semibold">Data anda berhasil dimasukkan silahkan tunggu hasilnya</p>
            <button @click="popupOpen = false" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">OK</button>
        </div>
    </div>

    <script>
        function submitForm() {
            // Your form submission logic here
            // After successful insertion, show the popup
            this.popupOpen = true;  // Correct way to update Alpine.js state
        }
    </script>
</body>
</html>
