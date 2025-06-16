<?php

namespace App\Http\Controllers;

use App\Models\MovedMahasiswa; // Ensure you have the correct model
use Illuminate\Http\Request;

class MovedController extends Controller
{
    // Method to display all moved records
    public function index()
    {
        $movedRecords = MovedMahasiswa::all(); // Fetch all records
        return view('moved', compact('movedRecords')); // Pass records to the view
    }

    // Method to display details of a specific record
    public function show($nim)
    {
        $record = MovedMahasiswa::findOrFail($nim); // Fetch the specific record
        return view('detail2', compact('record')); // Pass the record to the detail view
    }

    public function history()
{
    $movedRecords = MovedMahasiswa::all(); // Fetch all records
    return view('history', compact('movedRecords')); // Pass records to the history view
}

public function edit($nim)
{
    $record = MovedMahasiswa::findOrFail($nim); // Fetch the specific record
    return view('historytampil', compact('record')); // Pass the record to the edit view
}

public function update(Request $request, $nim)
{
    $request->validate([
        'email' => 'required|email',
        'nama' => 'required|string|max:255',
        'nohp' => 'required|string|max:15',
        'mulai_magang' => 'required|date',
        'selesai_magang' => 'required|date',
        'divisi' => 'required|string|max:255',
        'nama_institusi' => 'required|string|max:255',
        'jeniskelamin' => 'required|string',
        'semester' => 'required|integer|min:1|max:8',
        // Add other validation rules as needed
    ]);
    $record = MovedMahasiswa::findOrFail($nim); // Fetch the specific record
    $record->update($request->all()); // Update the record   
    return redirect()->route('history.index')->with('success', 'Mahasiswa updated successfully.'); // Redirect to history
}   
 public function delete($nim)
    {
        $record = MovedMahasiswa::findOrFail($nim); // Fetch the specific record
        $record->delete(); // Delete the record
        return redirect()->route('history.index')->with('success', 'Mahasiswa deleted successfully.'); // Redirect to index
    }
}