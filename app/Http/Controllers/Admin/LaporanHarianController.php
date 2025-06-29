<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LaporanHarian;
use App\Models\userr;
use Illuminate\Support\Facades\DB;

class LaporanHarianController extends Controller
{

    // Display all laporan harian for admin
public function index()
{
    $latestLaporans = \App\Models\LaporanHarian::with('mahasiswa')
        ->select('laporan_harian.*')
        ->join(DB::raw('(SELECT mahasiswa_nim, MAX(tanggal) as max_tanggal FROM laporan_harian GROUP BY mahasiswa_nim) as latest'), function($join) {
            $join->on('laporan_harian.mahasiswa_nim', '=', 'latest.mahasiswa_nim')
                 ->on('laporan_harian.tanggal', '=', 'latest.max_tanggal');
        })
         ->orderByDesc('laporan_harian.tanggal')
        ->get();


    return view('admin.laporanharian', ['laporans' => $latestLaporans]);
}

    // Show edit form
    public function edit($id)
    {
        $laporan = LaporanHarian::with('mahasiswa')->findOrFail($id);
        return view('admin.editlaporanharian', compact('laporan'));
    }

    // Update laporan harian
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kegiatan' => 'required|string|min:10',
        ]);
        $laporan = LaporanHarian::findOrFail($id);
        $laporan->update([
            'tanggal' => $request->tanggal,
            'kegiatan' => $request->kegiatan,
        ]);
        return redirect()->route('admin.laporanharian.index')->with('success', 'Laporan harian berhasil diperbarui.');
    }

    // Delete laporan harian
    public function destroy($id)
    {
        $laporan = LaporanHarian::findOrFail($id);
        $laporan->delete();
        return redirect()->route('admin.laporanharian.index')->with('success', 'Laporan harian berhasil dihapus.');
    }
    public function all()
    {
        $laporans = \App\Models\LaporanHarian::with('mahasiswa')->orderByDesc('tanggal')->paginate(30);
        return view('admin.laporanhariandetail', compact('laporans'));
    }
    public function detail($nim)
    {
        $mahasiswa = \App\Models\Mahasiswa::where('nim', $nim)->firstOrFail();
        $laporans = \App\Models\LaporanHarian::where('mahasiswa_nim', $nim)
            ->orderBy('tanggal', 'asc')
            ->get();

        return view('admin.laporanhariandetail', compact('laporans', 'mahasiswa'));
    }
}
