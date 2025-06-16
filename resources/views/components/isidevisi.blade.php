<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divisi Operasi PLN</title>
    @vite(['resources/css/devisi.css', 'resources/js/devisi.js'])
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href='img/favicon.ico' rel='shortcut icon'>
</head>

<body>
  <div class="bg-white shadow-sm py-4 px-4 text-center mb-6">
    <h2 class="text-3xl font-bold">DIVISI</h2>
    <p class="text-lg">PT. PLN Nusantara Power Unit Pembangkit Belawan</p>
  </div>
    <main class="max-w-7xl mx-auto px-4 py-2">
        
        <div class="landscape-grid">
            <!-- ENGINEERING CARD -->
            <div class="card bg-white p-6 rounded-lg shadow-lg hover:shadow-xl relative">
                <div class="card-content">
                    <div class="flex items-center mb-4">
                        <div class="division-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800 division-heading">ENGINEERING</h2>
                    </div>
                    
                    <p class="text-gray-700 mb-4">
                        Bertanggung jawab untuk mengawasi dan mengelola tim teknik dalam suatu organisasi. Mereka memastikan keberhasilan pelaksanaan proyek-proyek teknik dan memenuhi tenggat waktu yang ditetapkan.
                    </p>

                    <div class="scrollable-area flex-grow">
                        <div class="sub-divisions-grid">
                            <div class="sub-division p-3 bg-gray-50 rounded-md">
                                <h3 class="text-md font-semibold text-indigo-700">1. System Owner</h3>
                                <p class="text-gray-600 mt-1 text-sm">Bertugas memastikan sistem pembangkit berfungsi optimal dan aman dengan mengawasi dan mengelola seluruh aspek teknis sistem.</p>
                            </div>

                            <div class="sub-division p-3 bg-gray-50 rounded-md">
                                <h3 class="text-md font-semibold text-indigo-700">2. Condition Based Maintenance</h3>
                                <p class="text-gray-600 mt -1 text-sm">Bertugas memantau kondisi peralatan pembangkit secara berkala untuk mendeteksi potensi kerusakan dan melakukan pemeliharaan preventif.</p>
                            </div>

                            <div class="sub-division p-3 bg-gray-50 rounded-md col-span-2">
                                <h3 class="text-md font-semibold text-indigo-700">3. MMRK (Manajemen Mutu, Risiko, dan K3)</h3>
                                <p class="text-gray-600 mt-1 text-sm">Bertugas memastikan operasional pembangkit memenuhi standar mutu, mengelola risiko operasional, dan menjamin keselamatan kerja.</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 text-center">
                        <a href="/form" class="btn-primary">
                            Isi Formulir
                        </a>
                    </div>
                </div>
            </div>

            <!-- OPERASI CARD -->
            <div class="card bg-white p-6 rounded-lg shadow-lg hover:shadow-xl relative">
                <div class="card-content">
                    <div class="flex items-center mb-4">
                        <div class="division-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800 division-heading">OPERASI</h2>
                    </div>
                    
                    <p class="text-gray-700 mb-4">
                        Bertanggung jawab atas pengelolaan dan pengawasan kegiatan operasional suatu organisasi atau perusahaan dan memastikan bahwa semua proses berjalan efisien.
                    </p>

                    <div class="scrollable-area flex-grow">
                        <div class="sub-divisions-grid">
                            <div class="sub-division p-3 bg-gray-50 rounded-md">
                                <h3 class="text-md font-semibold text-indigo-700">1. Perencanaan dan Pengendalian</h3>
                                <p class="text-gray-600 mt-1 text-sm">Bertugas merencanakan dan mengendalikan seluruh kegiatan operasional pembangkit agar berjalan efisien.</p>
                            </div>

                            <div class="sub-division p-3 bg-gray-50 rounded-md">
                                <h3 class="text-md font-semibold text-indigo-700">2. Operasi PLTU A/B/C/D</h3>
                                <p class="text-gray-600 mt-1 text-sm">Bertugas mengoperasikan pembangkit listrik tenaga uap untuk menghasilkan listrik dengan memanfaatkan energi dari pembakaran.</p>
                            </div>

                            <div class="sub-division p-3 bg-gray-50 rounded-md">
                                <h3 class="text-md font-semibold text-indigo-700">3. Operasi PLTGU A/B/C/D</h3>
                                <p class="text-gray-600 mt-1 text-sm">Bertugas mengoperasikan pembangkit listrik tenaga gas uap dengan efisien untuk menghasilkan listrik yang stabil.</p>
                            </div>

                            <div class="sub-division p-3 bg-gray-50 rounded-md">
                                <h3 class="text-md font-semibold text-indigo-700">4. Niaga & Bahan Bakar</h3>
                                <p class="text-gray-600 mt-1 text-sm">Memastikan ketersediaan bahan bakar yang cukup dan mengelola aspek komersial terkait penyediaan tenaga listrik.</p>
                            </div>

                            <div class="sub-division p-3 bg-gray-50 rounded-md col-span-2">
                                <h3 class="text-md font-semibold text-indigo-700">5. Kimia & Laboratorium</h3>
                                <p class="text-gray-600 mt-1 text-sm">Memastikan ketersediaan bahan bakar yang cukup dan mengelola aspek komersial terkait penyediaan tenaga listrik, demi menjaga kelancaran operasional.</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 text-center">
                        <a href="/form" class="btn-primary">
                            Isi Formulir
                        </a>
                    </div>
                </div>
            </div>

            <!-- PEMELIHARAAN CARD -->
            <div class="card bg-white p-6 rounded-lg shadow-lg hover:shadow-xl relative pl-16 mb-6">
                <div class="card-content">
                    <div class="flex items-center mb-4">
                        <div class="division-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800 division-heading">PEMELIHARAAN</h2>
                    </div>
                    
                    <p class="text-gray-700 mb-4">
                        Bertanggung jawab untuk memastikan semua peralatan, mesin, dan fasilitas berfungsi dengan baik dan aman. Mereka merencanakan dan mengawasi kegiatan pemeliharaan.
                    </p>

                    <div class="scrollable-area flex-grow">
                        <div class="sub-divisions-grid">
                            <div class="sub-division p-3 bg-gray-50 rounded-md">
                                <h3 class="text-md font-semibold text-indigo-700">1. Outage Management</h3>
                                <p class="text-gray-600 mt-1 text-sm">Bertugas mengelola dan merencanakan pemadaman terencana untuk pemeliharaan, memastikan dampaknya minimal.</p>
                            </div>

                            <div class="sub-division p-3 bg-gray-50 rounded-md">
                                <h3 class="text-md font-semibold text-indigo-700">2. Rendal Pemeliharaan</h3>
                                <p class="text-gray-600 mt-1 text-sm">Bertugas merencanakan dan mengendalikan jadwal pemeliharaan agar semua peralatan pembangkit tetap dalam kondisi optimal.</p>
                            </div>

                            <div class="sub-division p-3 bg-gray-50 rounded-md">
                                <h3 class="text-md font-semibold text-indigo-700">3. Pemeliharaan Listrik</h3>
                                <p class="text-gray-600 mt-1 text-sm">Bertugas menjaga dan memperbaiki sistem kelistrikan pembangkit agar berfungsi dengan baik dan aman.</p>
                            </div>

                            <div class="sub-division p-3 bg-gray-50 rounded-md">
                                <h3 class="text-md font-semibold text-indigo-700">4. Kontrol & Instrumen</h3>
                                <p class="text-gray-600 mt-1 text-sm">Bertugas memelihara sistem kontrol dan instrumentasi untuk memastikan operasi pembangkit yang akurat.</p>
                            </div>

                            <div class="sub-division p-3 bg-gray-50 rounded-md">
                                <h3 class="text-md font-semibold text-indigo-700">5. Pemeliharaan Mesin 1</h3>
                                <p class="text-gray-600 mt-1 text-sm">Bertugas memelihara mesin turbin, boiler, dan generator agar selalu siap beroperasi dengan efisien.</p>
                            </div>

                            <div class="sub-division p-3 bg-gray-50 rounded-md">
                                <h3 class="text-md font-semibold text-indigo-700">6. Pemeliharaan Mesin 2</h3>
                                <p class="text-gray-600 mt-1 text-sm">Bertugas memelihara peralatan bantu, bangunan, dan infrastruktur sipil di area pembangkit.</p>
                            </div>

                            <div class="sub-division p-3 bg-gray-50 rounded-md col-span-2">
                                <h3 class="text-md font-semibold text-indigo-700">7. Inventori Kontrol & Gudang</h3>
                                <p class="text-gray-600 mt-1 text-sm">Bertugas mengelola inventaris suku cadang dan material, memastikan ketersediaan yang tepat untuk pemeliharaan dan perbaikan.</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 text-center">
                        <a href="/form" class="btn-primary">
                            Isi Formulir
                        </a>
                    </div>
                </div>
            </div>

            <!-- BUSINESS SUPPORT CARD -->
            <div class="card bg-white p-6 rounded-lg shadow-lg hover:shadow-xl relative pl-16 mb-6">
                <div class="card-content">
                    <div class="flex items-center mb-4">
                        <div class="division-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800 division-heading">BUSINESS SUPPORT</h2>
                    </div>
                    
                    <p class="text-gray-700 mb-4">
                        Memastikan kelancaran dan efisiensi operasional suatu organisasi. Peran ini melibatkan pengawasan berbagai fungsi administratif dan operasional pendukung.
                    </p>

                    <div class="scrollable-area flex-grow">
                        <div class="sub-divisions-grid">
                            <div class="sub-division p-3 bg-gray-50 rounded-md">
                                <h3 class="text-md font-semibold text-indigo-700">1. Keuangan</h3>
                                <p class="text-gray-600 mt-1 text-sm">Bertugas mengelola anggaran, keuangan, dan pelaporan keuangan untuk memastikan stabilitas keuangan perusahaan.</p>
                            </div>

                            <div class="sub-division p-3 bg-gray-50 rounded-md">
                                <h3 class="text-md font-semibold text-indigo-700">2. Pengadaan</h3>
                                <p class="text-gray-600 mt-1 text-sm">Bertugas memastikan pengadaan barang dan jasa yang dibutuhkan untuk operasional pembangkit dilakukan secara efisien dan transparan.</p>
                            </div>

                            <div class="sub-division p-3 bg-gray-50 rounded-md">
                                <h3 class="text-md font-semibold text-indigo-700">3. SDM</h3>
                                <p class="text-gray-600 mt-1 text-sm">Bertugas mengelola sumber daya manusia, termasuk rekrutmen, pelatihan, dan pengembangan karyawan.</p>
                            </div>

                            <div class="sub-division p-3 bg-gray-50 rounded-md">
                                <h3 class="text-md font-semibold text-indigo-700">4. Umum & CSR</h3>
                                <p class="text-gray-600 mt-1 text-sm">Bertugas mengelola urusan umum perusahaan dan melaksanakan program tanggung jawab sosial perusahaan.</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 text-center">
                        <a href="/form" class="btn-primary">
                            Isi Formulir
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>