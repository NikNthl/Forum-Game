<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth; 
use App\Models\Login;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function Login(Request $request): RedirectResponse
    {
        // Validate the request data
        $validatedLogin = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Hash the password
        $validatedLogin['password'] = Hash::make($validatedLogin['password']);

        // Attempt to authenticate the user
        if (Auth::attempt($validatedLogin, $request->filled('remember'))) {
            // If login successful, save login data (if needed) and redirect
            $login = new Login([
                'username' => $request->input('username'),
                'password' => $validatedLogin['password'], // Use the hashed password
            ]);
            $login->save();

            if (Auth::check()) {
                return redirect('/');
            }
        } else {
            // If login fails, log an error and redirect back with an error message
            \Log::error('Failed to create Login instance.');
            return redirect()->back()->with('error', 'Failed to create Login instance.');
        }
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect('/');
    }
}
