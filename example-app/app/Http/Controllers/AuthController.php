<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function login(Request $request):RedirectResponse { 
        Validator::make($request->all(), [
            'username' => ['required', 'string'], //username wajib diisi (required)
            'password' => ['required'] //password wajib diisi (required)
        ])->validate(); 

        if (Auth::attempt( // untuk melakukan otentikasi user berdarakan username dan password yang telah diberikan
            request()->only(['username','password']), //hanya mengambil username dan password dari request
            request()->filled('remember') //untuk menyimpan autentikasi, supaya dapat login otomatis ketika ingin login lagi
        )) {
            return redirect('/home');
        }

        return redirect()->back()->with('error', 'Invalid credentials !');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout(); //mengakhiri sesi login user
        return redirect('/');
    }
}
