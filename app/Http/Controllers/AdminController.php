<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function users()
{
    $users = User::all();
    return view('admin.users', compact('users'));
}
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit_user', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->only(['name', 'email', 'role']);
        // Jika password diisi, hash dan update
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);
        return redirect()->route('admin.users')->with('success', 'User berhasil diperbarui');
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->route('admin.users')->with('success', 'User berhasil dihapus');
        }
        return redirect()->route('admin.users')->with('error', 'User not found');
    }
    
}
