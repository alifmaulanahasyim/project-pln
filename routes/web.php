<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MovedController;
use App\Http\Controllers\VisionMissionController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanHarianController;
use App\Http\Middleware\AdminMiddleware; // Import your middleware
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Routes for mahasiswa
Route::get('/', function () {
    return redirect()->route('login');
})->middleware('guest');
    Route::get('login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);
    
    Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('mahasiswa/laporanharian', App\Http\Controllers\LaporanHarianController::class, [
        'as' => 'laporan-harian'
    ]);
   Route::put('/laporan-harian/laporanharian/{id}', [LaporanHarianController::class, 'update'])->name('laporan-harian.laporanharian.update');
    Route::get('/mahasiswa/sertifikat', [App\Http\Controllers\SertifikatController::class, 'showMahasiswa'])->name('mahasiswa.sertifikat.download');
    Route::get('/stat', [MahasiswaController::class, 'index'])->name('stat');
    Route::get('/divisi', fn() => view('divisi'))->name('divisi');
    Route::get('/form', [MahasiswaController::class, 'tambahform'])->name('form');
    Route::post('/insertform', [MahasiswaController::class, 'insertform'])->name('insertform');
    Route::get('/detail/{nim}', [MahasiswaController::class, 'detail'])->name('detail');
    Route::get('/mahasiswa/moved', [MahasiswaController::class, 'showMoved'])->name('mahasiswa.moved');
    Route::get('/moved', [MovedController::class, 'index'])->name('moved');
    Route::get('/moved/{nim}', [MovedController::class, 'show'])->name('moved.show');
    Route::get('/status', [MahasiswaController::class, 'status'])->name('status');
    Route::get('/status/{nim}', [MahasiswaController::class, 'show'])->name('status.show');
    Route::get('/about', [VisionMissionController::class, 'index'])->name('about');
    Route::get('/visimisi', [VisionMissionController::class, 'index'])->name('visimisi');
});

// Routes for admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/cek-sertifikat', [AdminController::class, 'cekSertifikatTim']);
    Route::get('/admin/pilih-sertifikat/{nim}', [App\Http\Controllers\SertifikatController::class, 'pilihForm'])->name('admin.pilih-sertifikat.form');
Route::post('/admin/pilih-sertifikat/{nim}', [App\Http\Controllers\SertifikatController::class, 'prosesPilih'])->name('admin.pilih-sertifikat.proses');
    Route::post('/admin/kirim-sertifikat/{nim}', [App\Http\Controllers\SertifikatController::class, 'kirim'])->name('admin.kirim-sertifikat');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('divisis', DivisiController::class);
    Route::get('/data', [MahasiswaController::class, 'index'])->name('data');
    // Route::get('/dashboard', [MahasiswaController::class, 'dashboard'])->name('dashboard');
    // Route::get('/dashboard/edit/{id}', [MahasiswaController::class, 'editDashboard'])->name('dashboard.edit');
    // Route::put('/dashboard/update/{id}', [MahasiswaController::class, 'update'])->name('dashboard.update');
    Route::get('/tampilform/{nim}', [MahasiswaController::class, 'tampilform'])->name('tampilform');
    Route::post('/updateform/{nim}', [MahasiswaController::class, 'updateform'])->name('updateform');
    Route::delete('/delete/{nim}', [MahasiswaController::class, 'delete'])->name('delete');
    Route::get('/sertifikat', [MahasiswaController::class, 'getsertifikat'])->name('sertifikat');
    Route::get('/detail/{nim}', [MahasiswaController::class, 'detail'])->name('detail');
    Route::post('/mahasiswa/{nim}/move', [MahasiswaController::class, 'moveMahasiswa'])->name('mahasiswa.move');
    Route::get('/mahasiswa/{nim}/nohp', [MahasiswaController::class, 'getNomorHp']);
    Route::get('/history', [MovedController::class, 'history'])->name('history.index');
    Route::get('/historytampil/{nim}', [MovedController::class, 'edit'])->name('historytampil.edit');
    Route::post('/historytampil/update/{nim}', [MovedController::class, 'update'])->name('moved.update');
    Route::delete('/history/{nim}', [MovedController::class, 'delete'])->name('history.delete');
    Route::get('/admin/vision-mission/edit', [VisionMissionController::class, 'edit'])->name('admin.vision_mission.edit');
    Route::post('/admin/vision-mission/update', [VisionMissionController::class, 'update'])->name('admin.vision_mission.update');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/admin/users/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
   Route::get('admin/laporanharian', [App\Http\Controllers\Admin\LaporanHarianController::class, 'index'])->name('admin.laporanharian.index');
Route::get('admin/laporanhariandetail/{nim}', [App\Http\Controllers\Admin\LaporanHarianController::class, 'detail'])->name('admin.laporanhariandetail.mahasiswa');
   Route::put('admin/laporanharian/{id}', [App\Http\Controllers\Admin\LaporanHarianController::class, 'update'])->name('admin.laporanharian.update');
Route::delete('admin/laporanharian/{id}', [App\Http\Controllers\Admin\LaporanHarianController::class, 'destroy'])->name('admin.laporanharian.destroy');
});

require __DIR__.'/auth.php';
