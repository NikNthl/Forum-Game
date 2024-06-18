<?php

use App\Http\Controllers\registerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\questionController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\searchController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [HomeController::class, 'index'])->name('home');

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

Route::post ('/question', [questionController::class, 'store']);

Route::put('/question/{id}', [questionController::class, 'editQuestion'])->name('questions.edit');

Route::delete('/question/{id}', [questionController::class, 'deleteQuestion'])->name('questions.delete');


Route::get ('/changePassword',function(){
    return view('changePassword');
});

// Route untuk proses submit login (gunakan POST untuk keamanan)
Route::post('/', [AuthController::class, 'login']);

// Route untuk proses logout
Route::get('/logout', [AuthController::class, 'logout']);

// Route untuk search
Route::get('/home', [SearchController::class, 'index'])->name('home');

