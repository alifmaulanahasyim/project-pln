<?php

namespace App\Http\Controllers;

use GDText\Box;
use App\Models\Mahasiswa;
use App\Models\MovedMahasiswa; // Import the MovedMahasiswa model
use App\Models\Histori; // Import the Histori model
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Dashboard;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MahasiswaController extends Controller
{
    public function index()
    {
        $data = Mahasiswa::all();
        $newData = Mahasiswa::where('status', 'Pending')->orderBy('created_at', 'desc')->get();
        $users = User::all();
        $newDataCount = $newData->count();
        return view("data", compact('data', 'newData', 'users', 'newDataCount'));
    }

    public function dashboard()
    {
        $dashboardData = Dashboard::find(1); // Mengambil data dengan id = 1

        // Ambil data pertama
        if (!$dashboardData) {
            // Jika data tidak ditemukan, buat objek kosong agar tidak terjadi error
            $dashboardData = new Dashboard([
                'sisa' => 0,
                'terima' => 0
            ]);
        }

        return view('dashboard', compact('dashboardData'));
    }

    public function update(Request $request, $id)
    {   
        $dashboardData = Dashboard::findOrFail($id); // Ambil data berdasarkan ID
        $dashboardData->update([
            'sisa' => $request->sisa,
            'terima' => $request->terima
        ]);

        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
    }

    public function stat()
    {
        $data = Dashboard::select('terima', 'sisa')->get();
        return view('home', compact('data'));
    }

    public function tambahform() {
        $alreadyInserted = false;
        if (Auth::check()) {
            $alreadyInserted = Mahasiswa::where('user_id', Auth::user()->id)->exists();
        }
        return view('form', compact('alreadyInserted'));
    }

    public function detail($nim)
    {
        $data = Mahasiswa::where('nim', $nim)->first(); // Ganti Mahasiswa dengan model yang sesuai
        if (!$data) {
            abort(404); // Jika data tidak ditemukan, tampilkan halaman 404
        }
        return view('detail', compact('data')); // Pastikan 'detail' adalah nama view yang benar
    }

    public function insertform(Request $request) {
        // Validasi data yang diterima
        $request->validate([
            'nim' => 'required|string|unique:mahasiswas,nim',
            'nim2' => 'nullable|string',
            'nim3' => 'nullable|string',
            'nim4' => 'nullable|string',
            'nim5' => 'nullable|string',
            'nim6' => 'nullable|string',
            'nim7' => 'nullable|string',
            'email' => 'required|email',
            'nama' => 'required|string|max:255',
            'nama2' => 'nullable|string|max:255',
            'nama3' => 'nullable|string|max:255',
            'nama4' => 'nullable|string|max:255',
            'nama5' => 'nullable|string|max:255',
            'nama6' => 'nullable|string|max:255',
            'nama7' => 'nullable|string|max:255',
            'jeniskelamin' => 'required|in:laki-laki,perempuan', // Validasi enum
            'jeniskelamin2' => 'nullable|in:laki-laki,perempuan',
            'jeniskelamin3' => 'nullable|in:laki-laki,perempuan',
            'jeniskelamin4' => 'nullable|in:laki-laki,perempuan',
            'jeniskelamin5' => 'nullable|in:laki-laki,perempuan',
            'jeniskelamin6' => 'nullable|in:laki-laki,perempuan',
            'jeniskelamin7' => 'nullable|in:laki-laki,perempuan',
            'nama_institusi' => 'required|string',
            'jurusan' => 'required|string',
            'nohp' => 'required|string|max:15', // Validasi nohp
            'semester' => 'required|string',
            'alasan' => 'required|string',
            'divisi' => 'required|string',
            'linkfoto' => 'required|url',
            'linksurat' => 'required|url',
            'mulai_magang' => 'nullable|date', // Validation for mulai magang
            'selesai_magang' => 'nullable|date', // Validation for selesai magang
        ]);

        // Validasi nama tidak boleh duplikat di seluruh kolom nama mahasiswa
        $allNames = [
            $request->nama,
            $request->nama2,
            $request->nama3,
            $request->nama4,
            $request->nama5,
            $request->nama6,
            $request->nama7,
        ];
        foreach ($allNames as $name) {
            if ($name && Mahasiswa::where('nama', $name)
                ->orWhere('nama2', $name)
                ->orWhere('nama3', $name)
                ->orWhere('nama4', $name)
                ->orWhere('nama5', $name)
                ->orWhere('nama6', $name)
                ->orWhere('nama7', $name)
                ->exists()) {
                return back()->withErrors(['nama' => 'Nama ' . $name . ' sudah terdaftar sebagai mahasiswa magang.'])->withInput();
            }
        }

        // Simpan data mahasiswa
        $anggotaCount = 0;
    for ($i = 1; $i <= 7; $i++) {
        $field = $i === 1 ? 'nama' : 'nama' . $i;
        if ($request->filled($field)) {
            $anggotaCount++;
        }
    }

    // Simpan data mahasiswa
    $mahasiswa = new Mahasiswa($request->all());
    // Set user_id sesuai user yang login
    if (Auth::check()) {
        $mahasiswa->user_id = Auth::user()->id;
    }
    $mahasiswa->save();

    return redirect()->route('home')->with('success', "Data berhasil ditambahkan! Jumlah mahasiswa yang mengisi: $anggotaCount");
    }

    public function tampilform($nim) {
        // Mengambil data mahasiswa berdasarkan NIM
        $data = Mahasiswa ::where('nim', $nim)->first();

        // Jika data tidak ditemukan, redirect dengan pesan error
        if (!$data) {
            return redirect()->route('home')->with('error', 'Mahasiswa tidak ditemukan');
        }

        return view('tampilform', compact('data'));
    }
   
    public function updateform(Request $request, $nim) {
        // Validate the incoming request data
        $request->validate([
            'email' => 'required|email',
            'nama' => 'required|string|max:255',
            'nim2' => 'nullable|string',
            'nim3' => 'nullable|string',
            'nim4' => 'nullable|string',
            'nim5' => 'nullable|string',
            'nim6' => 'nullable|string',
            'nim7' => 'nullable|string',
            'jeniskelamin' => 'required|in:laki-laki,perempuan',
            'jeniskelamin2' => 'nullable|in:laki-laki,perempuan',
            'jeniskelamin3' => 'nullable|in:laki-laki,perempuan',
            'jeniskelamin4' => 'nullable|in:laki-laki,perempuan',
            'jeniskelamin5' => 'nullable|in:laki-laki,perempuan',
            'jeniskelamin6' => 'nullable|in:laki-laki,perempuan',
            'jeniskelamin7' => 'nullable|in:laki-laki,perempuan',
            'nama_institusi' => 'required|string',
            'jurusan' => 'required|string',
            'nohp' => 'required|string|max:15',
            'semester' => 'required|string',
            'alasan' => 'required|string',
            'divisi' => 'required|string',
            'linkfoto' => 'required|url',
            'linksurat' => 'required|url',
            'mulai_magang' => 'nullable|date',
            'selesai_magang' => 'nullable|date',
        ]);
    
        // Find the mahasiswa by NIM and update the data
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        if ($mahasiswa) {
            $mahasiswa->update($request->all());
            return redirect()->route('data')->with('success', 'Data berhasil diperbarui');
        }
    
        // If mahasiswa not found, redirect with error message
        return redirect()->route('data')->with('error', 'Mahasiswa tidak ditemukan');
    }
    public function delete($nim) {
        // Temukan mahasiswa berdasarkan NIM
        $data = Mahasiswa::where('nim', $nim)->first();

        // Periksa apakah data ditemukan
        if ($data) {
            $data->delete();
            return redirect()->route('data')->with('success', 'Data berhasil dihapus');
        }

        // Jika data tidak ditemukan, redirect dengan pesan error
        return redirect()->route('data')->with('error', 'Data tidak ditemukan');
    }

    public function getNomorHp($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        if ($mahasiswa) {
            return response()->json(['nohp' => $mahasiswa->nohp]);
        } else {
            return response()->json(['message' => 'Mahasiswa tidak ditemukan'], 404);
        }
    }

   
    public function moveMahasiswa($nim)
{
    // Find the original record in the mahasiswas table
    $mahasiswa = Mahasiswa::findOrFail($nim);

    // Create a new record in the moved_mahasiswas table
    MovedMahasiswa::create($mahasiswa->toArray());

    // Optionally, delete the original record from the mahasiswas table
    $mahasiswa->delete();

    // Redirect back with a success message
    return redirect()->route('data')->with('success', 'Data berhasil dipindahkan.');
}
public function showMoved()
{
    $movedRecords = MovedMahasiswa::paginate(); // Use pagination if needed
    return view('moved', compact('movedRecords'));
}

public function showDetail($nim)
{
    // Fetch the data for the student using the NIM
    $data = Mahasiswa::where('nim', $nim)->firstOrFail();

    // Return the view with the data
    return view('detail2', compact('data'));
}
}