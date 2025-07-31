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
            ->join(DB::raw('
                (SELECT mahasiswa_nim, MAX(created_at) as latest_created FROM laporan_harian GROUP BY mahasiswa_nim) as latest
            '), function($join) {
                $join->on('laporan_harian.mahasiswa_nim', '=', 'latest.mahasiswa_nim')
                    ->on('laporan_harian.created_at', '=', 'latest.latest_created');
            })
            ->orderByDesc('laporan_harian.created_at')
            ->get();
        return view('admin.laporanharian', ['laporans' => $latestLaporans]);
    }


    // Show edit form
    public function edit($id)
    {
        $laporan = LaporanHarian::with('mahasiswa')->findOrFail($id);
        return view('admin.editlaporanharian', compact('laporan'));
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
    $laporans = \App\Models\LaporanHarian::with(['mahasiswa' => function($query) {
        $query->select('id', 'user_id', 'nama', 'nama2', 'nama3', 'nama4', 'nama5', 'nama6', 'nama7');
    }])
    ->select('laporan_harian.*')
    ->join(DB::raw('
        (SELECT mahasiswa_nim, MAX(created_at) as latest_created 
         FROM laporan_harian 
         GROUP BY mahasiswa_nim) as latest
    '), function($join) {
        $join->on('laporan_harian.mahasiswa_nim', '=', 'latest.mahasiswa_nim')
             ->on('laporan_harian.created_at', '=', 'latest.latest_created');
    })
    ->orderByDesc('laporan_harian.created_at')
    ->get();

    return view('admin.laporanhariandetail', compact('laporans'));
}

    public function detail($nim)
    {
        $mahasiswa = \App\Models\Mahasiswa::where('nim', $nim)->firstOrFail();
        $laporans = \App\Models\LaporanHarian::where('mahasiswa_nim', $nim)
->orderBy('created_at', 'asc')
            ->get();

        return view('admin.laporanhariandetail', compact('laporans', 'mahasiswa'));
    }
}
