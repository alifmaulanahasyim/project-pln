<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MovedController;
use App\Http\Controllers\VisionMissionController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminMiddleware; // Import your middleware
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Routes for mahasiswa
Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
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
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('divisis', DivisiController::class);
    Route::get('/data', [MahasiswaController::class, 'index'])->name('data');
    Route::get('/dashboard', [MahasiswaController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/edit/{id}', [MahasiswaController::class, 'editDashboard'])->name('dashboard.edit');
    Route::put('/dashboard/update/{id}', [MahasiswaController::class, 'update'])->name('dashboard.update');
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
});

require __DIR__.'/auth.php';
