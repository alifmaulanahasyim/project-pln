<!-- resources/views/components/isi.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - PT PLN Nusantara Power</title>
    @vite(['resources/css/about.css','resources/css/app.css', 'resources/js/app.js', 'resources/js/about.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='img/favicon.ico' rel='shortcut icon'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>
<body class="bg-gray-50 font-sans">
    <!-- Compact Header -->
    <div class="bg-white shadow-sm py-4 px-4 text-center mb-6">
      <h2 class="text-3xl font-bold">TENTANG</h2>
      <p class="text-lg">PT PLN Nusantara Power Unit Pembangkit Belawan</p>
    </div>
    
    <div class="max-w-6xl mx-auto px-4 sm:px-6 py-1">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            <!-- Left Column (Content) -->
            <div class="lg:col-span-7">
                <!-- Sejarah Section -->
                <section id="sejarah" class="page-section mb-8 animate__animated animate__fadeInUp">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4 relative pb-2 inline-block">
                        Sejarah Perusahaan
                        <span class="absolute bottom-0 left-0 h-1 bg-blue-600 w-full"></span>
                    </h2>
                    <div class="bg-white p-5 rounded-lg shadow-sm">
                        <p class="text-base text-gray-700 leading-relaxed">
                            PT PLN NUSANTARA POWER (PT PLN NP) sejak berdiri tahun 1995 yang awalnya bernama PT Pembangkitan Jawa-Bali (PT PJB) senantiasa mengabdikan diri untuk bangsa dan negara Indonesia, serta mendorong perkembangan perekonomian nasional dengan menyediakan energi listrik yang bermutu tinggi, andal dan ramah lingkungan. Dengan visi menjadi perusahaan pembangkit tenaga listrik Indonesia yang terkemuka dengan standar kelas dunia, PT PLN NP tiada henti berbenah dan melakukan inovasi dengan tetap berpegang pada kaidah tata pengelolaan perusahaan yang baik (Good Corporate Governance/GCG). Berkat dukungan shareholders dan stakeholders, PT PLN NP tumbuh dan berkembang dengan berbagai bidang usaha, tanpa meninggalkan tanggung jawab sosial perusahaan demi terwujudnya kemandirian masyarakat dan kelestarian lingkungan hidup.
                        </p>
                    </div>
                </section>
                
                @props(['visionMission'])

                <!-- Visi Misi Section -->
                <section id="visi-misi" class="page-section mb-8">
                  <h2 class="text-2xl font-bold text-gray-900 mb-4 relative pb-2 inline-block">
                      VISI & MISI
                      <span class="absolute bottom-0 left-0 h-1 bg-blue-600 w-full"></span>
                  </h2>
                  
                  <!-- Visi Card -->
                  <div class="mb-6 bg-gradient-to-r from-blue-50 to-sky-50 rounded-lg shadow-sm p-4 border-l-4 border-blue-600 transition-all hover:shadow-md">
                      <div class="flex items-center mb-2">
                          <div class="p-2 bg-blue-600 rounded-full mr-3 shadow-sm">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                              </svg>
                          </div>
                          <h3 class="text-2xl font-bold text-blue-800">VISI</h3>
                      </div>
                      <div class="pl-12">
                          <p class="text-base text-gray-700 font-medium italic leading-relaxed">
                              "{{ $visionMission->vision ?? 'Visi not set' }}"
                          </p>
                      </div>
                  </div>
                  
                  <!-- Misi Card -->
                  <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-lg shadow-sm p-4 border-l-4 border-green-600 transition-all hover:shadow-md">
                      <div class="flex items-center mb-3">
                          <div class="p-2 bg-green-600 rounded-full mr-3 shadow-sm">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                              </svg>
                          </div>
                          <h3 class="text-2xl font-bold text-green-800">MISI</h3>
                      </div>
                      <div class="pl-12">
                          @if ($visionMission && $visionMission->mission)
                              <ul class="space-y-3">
                                  @foreach(explode('|', $visionMission->mission) as $mission)
                                  <li class="flex items-start group">
                                      <div class="bg-green-100 p-1 rounded-full mr-3 mt-1 shadow-sm group-hover:bg-green-200 transition-colors">
                                          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                                              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                          </svg>
                                      </div>
                                      <span class="text-sm text-gray-700 font-medium">{{ $mission }}</span>
                                  </li>
                                  @endforeach
                              </ul>
                          @else
                              <p class="text-base text-gray-700 italic">Misi not set</p>
                          @endif
                      </div>
                  </div>
                </section>
                
            </div>
            
            <!-- Right Column (Image) -->
            <div class="lg:col-span-5 lg:sticky lg:top -4">
                <div class="image-container shadow-md rounded-lg overflow-hidden animate__animated animate__fadeInRight">
                    <img class="w-full h-auto" src="img/fotojalan.jpeg" alt="PT PLN Nusantara Power">
                </div>
  
                <!-- Stats Cards -->
                <div class="mt-6 grid grid-cols-2 gap-4 animate__animated animate__fadeInUp animate__delay-1s pl-16 mb-6">
                    <div class="bg-white rounded-lg shadow-sm p-4 text-center">
                        <div class="text-blue-600 font-bold text-2xl">1995</div>
                        <div class="mt-1 text-gray-600 text-sm">Tahun Berdiri</div>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm p-4 text-center">
                        <div class="text-green-600 font-bold text-2xl">EBT</div>
                        <div class="mt-1 text-gray-600 text-sm">Fokus Energi</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>