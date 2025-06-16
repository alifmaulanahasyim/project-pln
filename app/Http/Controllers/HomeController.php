<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB; // Import DB facade
use Illuminate\Http\Request;

class HomeController extends Controller
{


public function index()
{
    $divisis = Divisi::all();
    $mahasiswas = Mahasiswa::all();

    // Group mahasiswa counts by normalized division and status
    $groupedCounts = $mahasiswas
        ->groupBy(function ($item) {
            return strtolower(trim($item->divisi));  // normalize division name
        })
        ->map(function ($group) {
            return $group->groupBy('status')->map(function ($statusGroup) {
                return $statusGroup->sum(function ($item) {
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
        });

    $countsByDivision = [];

    foreach ($divisis as $divisi) {
        $divisiName = strtolower(trim($divisi->divisi)); // normalize for lookup
        $statuses = $groupedCounts[$divisiName] ?? [];

        $countsByDivision[$divisi->divisi] = [ // keep original casing for display
            'Pending' => $statuses['Pending'] ?? 0,
            'Ditolak' => $statuses['Ditolak'] ?? 0,
            'Diterima' => $statuses['Diterima'] ?? 0,
        ];
    }

    // Totals by status (normalize status strings just in case)
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

    return view('home', compact(
        'divisis',
        'countsByDivision',
        'pendingTotal',
        'ditolakTotal',
        'diterimaTotal'
    ));
}





    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
