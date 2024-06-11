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
            'username' => ['required', 'string'],
            'password' => ['required']
        ])->validate();

        if (Auth::attempt(
            request()->only(['username','password']),
            request()->filled('remember')
        )) {
            return redirect('/');
        }

        return redirect()->back()->with('error', 'Invalid credentials !');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect('/');
    }
}
