<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\LaporanHarian;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;

class LaporanHarianController extends Controller
{
        // Show all laporan harian for the logged-in mahasiswa
    public function index()
    {
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->where('status', 'Diterima')->first();
        if (!$mahasiswa) {
            return redirect()->back()->with('error', 'Akses hanya untuk mahasiswa yang sudah diterima.');
        }

        $laporan = LaporanHarian::where('mahasiswa_nim', $mahasiswa->nim)
        ->whereDate('created_at', Carbon::today())
            ->first();

        $sudahAda = LaporanHarian::where('mahasiswa_nim', $mahasiswa->nim)
        ->whereDate('created_at', Carbon::today())
            ->exists();

        $sertifikatDikirim = $mahasiswa->sertifikat_dikirim ?? false;

    $mahasiswas = Mahasiswa::where('status', 'Diterima')->get();

        return view('mahasiswa.laporanharian', compact('laporan', 'mahasiswa', 'mahasiswas', 'sudahAda', 'sertifikatDikirim'));
    }
    public function create()
    {
        $user = Auth::user();

        $laporan = LaporanHarian::where('user_id', $user->id)
            ->whereDate('created_at', Carbon::today())
            ->first();

        $sudahAda = $laporan !== null;
        $mahasiswa = $user->mahasiswa ?? null;
        $sertifikatDikirim = $user->sertifikat_dikirim ?? false;

        $nims = collect([
            $mahasiswa->nim,
            $mahasiswa->nim2,
            $mahasiswa->nim3,
            $mahasiswa->nim4,
            $mahasiswa->nim5,
            $mahasiswa->nim6,
            $mahasiswa->nim7,
        ])->filter();

        return view('laporan-harian.create', compact('nims', 'sudahAda', 'laporan', 'mahasiswa', 'sertifikatDikirim'));
    }
    public function store(Request $request)
    {
        $user = Auth::user();

        // Ensure user has a valid Mahasiswa record
        $mahasiswa = Mahasiswa::where('user_id', $user->id)
            ->where('status', 'Diterima')
            ->first();

        if (!$mahasiswa) {
            return redirect()->back()->with('error', 'Akses hanya untuk mahasiswa yang sudah diterima.');
        }

        // Collect all valid NIMs
        $nims = collect([
            $mahasiswa->nim,
            $mahasiswa->nim2,
            $mahasiswa->nim3,
            $mahasiswa->nim4,
            $mahasiswa->nim5,
            $mahasiswa->nim6,
            $mahasiswa->nim7,
        ])->filter();

        $tanggal = Carbon::today();

        // Prevent duplicate submission for today
        $sudahAda = LaporanHarian::whereIn('mahasiswa_nim', $nims)
            ->whereDate('created_at', \Carbon\Carbon::today())
            ->exists();

        if ($sudahAda) {
            return redirect()->route('laporan-harian.laporanharian.index')->with('sudahAda', true);
        }

        // Validate input
        $request->validate([
            'kegiatan' => 'required|string|min:10',
            'status_kehadiran' => 'required|array',
        ]);

        // Store laporan for each anggota
    foreach ($nims as $nim) {
        LaporanHarian::create([
            'user_id' => $user->id,
            'mahasiswa_nim' => $nim, // use current anggota's NIM
            'kegiatan' => $request->input('kegiatan'),
            'status_kehadiran' => $request->status_kehadiran[$nim] ?? 'hadir', // use their own attendance
        ]);
    }


        return redirect()->route('laporan-harian.laporanharian.index')->with('success', 'Laporan dan kehadiran berhasil disimpan untuk semua anggota.');
    }
    // Show form to edit laporan harian
    public function edit($id)
    {
        $laporan = LaporanHarian::findOrFail($id);
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->where('status', 'Diterima')->first();
        if (!$mahasiswa || $laporan->mahasiswa_nim !== $mahasiswa->nim) {
            return redirect()->back()->with('error', 'Akses tidak diizinkan.');
        }
        return view('mahasiswa.editlaporanharian', compact('laporan', 'mahasiswa'));
    }

    // Update laporan harian
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->where('status', 'Diterima')->first();
        $laporan = LaporanHarian::findOrFail($id);

        if (!$mahasiswa || $laporan->mahasiswa_nim !== $mahasiswa->nim) {
            return redirect()->back()->with('error', 'Akses tidak diizinkan.');
        }

        $request->validate([
            'kegiatan' => 'required|string|min:10',
        ]);

        $laporan->update([
            'kegiatan' => $request->kegiatan,
        ]);
    return redirect()->route('laporan-harian.laporanharian.index')->with('success', 'Laporan berhasil diperbarui.');
    }

    public function showForm()
    {
        $today = now()->toDateString();
        $userId = Auth::id(); // safer and clearer
        $laporan = LaporanHarian::where('user_id', $userId)
                                ->where('tanggal', $today)
                                ->first();

        return view('laporan-harian.form', [
            'laporan' => $laporan,
            'sudahAda' => $laporan !== null,
            'sertifikatDikirim' => false,
        ]);
    }

    // Delete laporan harian
    public function destroy($id)
    {
        $laporan = LaporanHarian::findOrFail($id);
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->where('status', 'Diterima')->first();
        if (!$mahasiswa || $laporan->mahasiswa_nim !== $mahasiswa->nim) {
            return redirect()->back()->with('error', 'Akses tidak diizinkan.');
        }
        $laporan->delete();
        return redirect()->route('laporan-harian.index')->with('success', 'Laporan harian berhasil dihapus.');
    }
    
    
}
