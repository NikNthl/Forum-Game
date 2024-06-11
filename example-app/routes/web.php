<?php

use App\Http\Controllers\registerController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get ('/', function(){
    return view('home');
});

Route::get ('/login', function(){
    return view('login');
});

Route::get ('/register', function(){
    return view('register');
});

Route::post ('/register', [registerController::class, 'register']);

Route::get ('/question', function(){
    return view('addQuestion');
});

Route::get ('/changePassword',function(){
    return view('changePassword');
});

// Route untuk proses submit login (gunakan POST untuk keamanan)
Route::post('/login', [AuthController::class, 'Login']);

// Route untuk proses logout
Route::get('/logout', [AuthController::class, 'logout']);