<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mahasiswa;

class SertifikatController extends Controller
{
    public function kirim($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->firstOrFail();
        $mahasiswa->sertifikat_dikirim = true;
        $mahasiswa->save();

        // (Opsional) Kirim notifikasi/email ke mahasiswa di sini

        return back()->with('success', 'Sertifikat berhasil dikirim ke mahasiswa.');
    }

    public function showMahasiswa()
    {
        $user = auth()->user();
        // Pastikan user login dan punya relasi mahasiswa
        if (!$user) {
            abort(403, 'Anda belum login.');
        }
        $mahasiswa = $user->mahasiswa()->first();
        if (!$mahasiswa) {
            abort(403, 'Data mahasiswa tidak ditemukan.');
        }
        if (!$mahasiswa->sertifikat_dikirim) {
            abort(403, 'Sertifikat belum tersedia.');
        }
        return view('mahasiswa.sertifikat', compact('mahasiswa'));
    }

    // Tambahkan method untuk memilih dan mengirim sertifikat ke banyak mahasiswa (opsional)
public function pilihForm($nim)
{
    // Misal: anggota kelompok diambil dari satu baris mahasiswa (nama, nama2, dst)
    $mahasiswa = \App\Models\Mahasiswa::where('nim', $nim)->firstOrFail();
    // Buat array anggota dari kolom nama, nama2, dst
    $anggota = collect([
        ['nama' => $mahasiswa->nama, 'nim' => $mahasiswa->nim, 'id' => $mahasiswa->id],
        ['nama' => $mahasiswa->nama2, 'nim' => $mahasiswa->nim2 ?? null, 'id' => $mahasiswa->id], // nim2 jika ada
        ['nama' => $mahasiswa->nama3, 'nim' => $mahasiswa->nim3 ?? null, 'id' => $mahasiswa->id],
        ['nama' => $mahasiswa->nama4, 'nim' => $mahasiswa->nim4 ?? null, 'id' => $mahasiswa->id],
        ['nama' => $mahasiswa->nama5, 'nim' => $mahasiswa->nim5 ?? null, 'id' => $mahasiswa->id],
        ['nama' => $mahasiswa->nama6, 'nim' => $mahasiswa->nim6 ?? null, 'id' => $mahasiswa->id],
        ['nama' => $mahasiswa->nama7, 'nim' => $mahasiswa->nim7 ?? null, 'id' => $mahasiswa->id],
    ])->filter(fn($a) => !empty($a['nama']));
    return view('admin.pilih_sertifikat', compact('anggota', 'nim'));
}

public function prosesPilih(Request $request, $nim)
{
    $mahasiswa = Mahasiswa::where('nim', $nim)->firstOrFail();
    $anggotaDipilih = $request->input('anggota_nim', []); // NIM yang dicentang

    if (empty($anggotaDipilih)) {
        return back()->with('error', 'Pilih minimal satu anggota.');
    }

    // Simpan dalam format JSON (NIM => true)
    $statusSertifikat = [];
    foreach ($anggotaDipilih as $nimAnggota) {
        $statusSertifikat[$nimAnggota] = true;
    }

    $mahasiswa->sertifikat_dikirim = $statusSertifikat;
    $mahasiswa->save();

    return redirect()->route('admin.laporanharian.index')->with('success', 'Sertifikat berhasil dikirim.');
}
public function cekSertifikatTim($nim)
{
    $mahasiswa = Mahasiswa::where('nim', $nim)->first();

    if (!$mahasiswa) {
        return false;
    }

    $nims = collect([
        $mahasiswa->nim,
        $mahasiswa->nim2,
        $mahasiswa->nim3,
        $mahasiswa->nim4,
        $mahasiswa->nim5,
        $mahasiswa->nim6,
        $mahasiswa->nim7,
    ])->filter();

    $satuMingguTerakhir = now()->subDays(7);

    foreach ($nims as $anggotaNim) {
        $hadir = \App\Models\LaporanHarian::where('mahasiswa_nim', $anggotaNim)
            ->where('status_kehadiran', 'hadir')
            ->whereDate('created_at', '>=', $satuMingguTerakhir)
            ->count();

        if ($hadir < 1) {
            return false; // Tidak hadir selama 1 minggu
        }
    }

    return true;
}


}
