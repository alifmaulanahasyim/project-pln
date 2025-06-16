<?php
// app/Http/Controllers/DivisiController.php
namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    public function index(Request $request)
    {
        $divisis = Divisi::all();
        $editDivisi = null;
    
        if ($request->has('edit')) {
            $editDivisi = Divisi::find($request->edit);
        }
    
        return view('admin.divisi', compact('divisis', 'editDivisi'));
    }
    

    public function create()
    {
        return view('admin.divisis.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'divisi' => 'nullable|string',
            'sisa' => 'nullable|string',
        ]);

        Divisi::create($validated);
        return redirect()->route('divisis.index')->with('success', 'Divisi created.');
    }

    public function edit(Divisi $divisi)
    {
        return view('admin.divisis.edit', compact('divisi'));
    }

    public function update(Request $request, Divisi $divisi)
    {
        $validated = $request->validate([
            'divisi' => 'nullable|string',
            'sisa' => 'nullable|string',
        ]);

        $divisi->update($validated);
        return redirect()->route('divisis.index')->with('success', 'Divisi updated.');
    }

    public function destroy(Divisi $divisi)
    {
        $divisi->delete();
        return redirect()->route('divisis.index')->with('success', 'Divisi deleted.');
    }
}
