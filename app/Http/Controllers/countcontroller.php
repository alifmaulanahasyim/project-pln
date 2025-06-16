<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Divisi;
use Illuminate\Http\Request;

class CountController extends Controller
{
    public function index()
    {
        // Get all divisions
        $divisis = Divisi::all();

        // Get all Mahasiswa records
        $mahasiswas = Mahasiswa::all();

        // Calculate counts by division and status
        $countsByDivision = $mahasiswas
            ->groupBy('divisi')
            ->map(function ($group) {
                return $group->groupBy('status')->map(function ($statusGroup) {
                    return $statusGroup->sum(function ($item) {
                        // Count how many nama fields are filled in each row
                        return collect([
                            $item->nama,
                            $item->nama2,
                            $item->nama3,
                            $item->nama4,
                            $item->nama5,
                            $item->nama6,
                            $item->nama7,
                        ])->filter()->count();
                    });
                });
            })->toArray();

        // Calculate total counts by status across all divisions
        $pendingTotal = $mahasiswas->where('status', 'Pending')->sum(function ($item) {
            return collect([
                $item->nama,
                $item->nama2,
                $item->nama3,
                $item->nama4,
                $item->nama5,
                $item->nama6,
                $item->nama7,
            ])->filter()->count();
        });

        $ditolakTotal = $mahasiswas->where('status', 'Ditolak')->sum(function ($item) {
            return collect([
                $item->nama,
                $item->nama2,
                $item->nama3,
                $item->nama4,
                $item->nama5,
                $item->nama6,
                $item->nama7,
            ])->filter()->count();
        });

        $diterimaTotal = $mahasiswas->where('status', 'Diterima')->sum(function ($item) {
            return collect([
                $item->nama,
                $item->nama2,
                $item->nama3,
                $item->nama4,
                $item->nama5,
                $item->nama6,
                $item->nama7,
            ])->filter()->count();
        });

        // Return the data to your blade view (change view name if needed)
        return view('counts.index', compact(
            'divisis',
            'countsByDivision',
            'pendingTotal',
            'ditolakTotal',
            'diterimaTotal'
        ));
    }
}
