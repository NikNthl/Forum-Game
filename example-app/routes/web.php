<?php

use App\Http\Controllers\registerController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\questionController;

Route::get ('/home', function(){
    return view('home');
});

Route::get ('/', function(){
    return view('login');
});

Route::get ('/register', function(){
    return view('register');
});

Route::post ('/register', [registerController::class, 'register']);

Route::get ('/question', function(){
    return view('question');
});

Route::post ('/question', [questionController::class, 'index']);

Route::get ('/changePassword',function(){
    return view('changePassword');
});

// Route untuk proses submit login (gunakan POST untuk keamanan)
Route::post('/', [AuthController::class, 'login']);

// Route untuk proses logout
Route::get('/logout', [AuthController::class, 'logout']);