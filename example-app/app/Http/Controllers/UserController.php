<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    // Menampilkan form edit
    public function edit(Request $request, $id)
    {    
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('home')->with('error', 'User tidak ditemukan.');
        }

        // Kirim variabel $user ke view
        return view('users.edit', compact('user'));
    }

    // update email dan username 
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'username' => 'required|string|max:20|unique:users,username,'.$id,
            'email' => 'required|email|unique:users,email,'.$id.'|max:64',
        ], [
            'username.required' => 'Username is required.',
            'username.max' => 'Username cannot exceed 20 characters.',
            'username.unique' => 'Username is already taken.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'Email cannot exceed 64 characters.',
            'email.unique' => 'Email is already in use.',
            'password.min' => 'Password must be at least 8 characters.',
        ]);

        $user->update($validatedData);

        return redirect()->route('users.show', $user->id)->with('success', 'User updated successfully');
    }

    // Menampilkan profil pengguna
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('/account', compact('user'));
    }


    public function delete($id)
    {
        // Cek apakah user yang sedang login adalah user yang ingin dihapus
        if ($id == Auth::id()) {
            // Hapus user dari database
            User::find($id)->delete();

            // Logout user
            Auth::logout();

            // Redirect ke halaman home atau halaman login
            return redirect()->route('home')->with('success', 'Akun berhasil dihapus.');
        }
    }

}