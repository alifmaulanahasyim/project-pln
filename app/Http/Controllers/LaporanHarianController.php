<?php

namespace App\Http\Controllers;

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
    $laporan = LaporanHarian::where('mahasiswa_nim', $mahasiswa->nim)->orderBy('tanggal', 'desc')->get();
    $mahasiswas = Mahasiswa::where('status', 'Diterima')->get();
    $sudahAda = LaporanHarian::where('mahasiswa_nim', $mahasiswa->nim)
        ->where('tanggal', date('Y-m-d'))
        ->exists();
    $sertifikatDikirim = $mahasiswa->sertifikat_dikirim ?? false;
    return view('mahasiswa.laporanharian', compact('laporan', 'mahasiswa', 'mahasiswas', 'sudahAda', 'sertifikatDikirim'));
}

    // Show form to create new laporan harian
    public function create()
    {
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->where('status', 'Diterima')->first();
        if (!$mahasiswa) {
            return redirect()->back()->with('error', 'Akses hanya untuk mahasiswa yang sudah diterima.');
        }
        $mahasiswas = Mahasiswa::where('status', 'Diterima')->get();
        // Cek apakah sudah mengisi laporan hari ini
       $sudahAda = LaporanHarian::where('mahasiswa_nim', $mahasiswa->nim)
        ->where('tanggal', date('Y-m-d'))
        ->exists();
        return view('mahasiswa.laporanharian', compact('mahasiswa', 'mahasiswas', 'sudahAda'));
    }

    // Store new laporan harian
    public function store(Request $request)
    {
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->where('status', 'Diterima')->first();
        if (!$mahasiswa) {
            return redirect()->back()->with('error', 'Akses hanya untuk mahasiswa yang sudah diterima.');
        }
        $sudahAda = LaporanHarian::where('mahasiswa_nim', $mahasiswa->nim)
            ->where('tanggal', $request->tanggal)
            ->exists();

        if ($sudahAda) {
            // Redirect ke halaman create dengan pesan error
            return redirect()->route('laporan-harian.laporanharian.create')->with('sudahAda', true);
        }
        $request->validate([
            'tanggal' => 'required|date',
            'kegiatan' => 'required|string',
        ]);
        LaporanHarian::create([
            'user_id' => $user->id,
            'mahasiswa_nim' => $mahasiswa->nim,
            'tanggal' => $request->tanggal,
            'kegiatan' => $request->kegiatan,
        ]);
       return redirect()->route('laporan-harian.laporanharian.create')->with('success', 'Laporan harian berhasil ditambahkan.');
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
        $laporan = LaporanHarian::findOrFail($id);
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->where('status', 'Diterima')->first();
        if (!$mahasiswa || $laporan->mahasiswa_nim !== $mahasiswa->nim) {
            return redirect()->back()->with('error', 'Akses tidak diizinkan.');
        }
        $request->validate([
            'tanggal' => 'required|date',
            'kegiatan' => 'required|string',
        ]);
        $laporan->update([
            'tanggal' => $request->tanggal,
            'kegiatan' => $request->kegiatan,
        ]);
        return redirect()->route('laporan-harian.index')->with('success', 'Laporan harian berhasil diperbarui.');
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
