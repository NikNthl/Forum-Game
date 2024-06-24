<?php

use App\Http\Controllers\registerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\questionController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\searchController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route untuk halaman home
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route halaman login
Route::get ('/', function(){
    return view('login');
});

// Route halaman register
Route::get ('/register', function(){
    return view('register');
});

// Route simpan data register
Route::post ('/register', [registerController::class, 'register']);


// Route ke halaman add question
Route::get ('/question', function(){
    return view('question');
});

// Route simpan data question
Route::post ('/question', [questionController::class, 'store']);

// Route mengedit pertanyaan 
Route::put('/question/{id}', [questionController::class, 'editQuestion'])->name('questions.edit');

// Route hapus pertanyaan
Route::delete('/question/{id}', [questionController::class, 'deleteQuestion'])->name('questions.delete');

// Route halaman change password
Route::get('/changePassword', [PasswordController::class, 'showChangePasswordForm'])->name('password.change');

// Route proses ganti password
Route::post('/changePassword', [PasswordController::class, 'changePassword'])->name('password.update');

// Route untuk proses submit login (gunakan POST untuk keamanan)
Route::post('/', [AuthController::class, 'login']);

// Route untuk proses logout
Route::get('/logout', [AuthController::class, 'logout']);

// Route untuk search
Route::get('/home', [SearchController::class, 'index'])->name('home');

// Route untuk account
Route::get('/account', function(){
    return view('account');
});

// Route untuk account
Route::get('/account/edit', function(){
    return view('updateProfile');
});

Route::post('/questions/{id}/like', [LikeController::class, 'like'])->name('questions.like');

Route::post('/questions/{id}/dislike', [LikeController::class, 'dislike'])->name('questions.dislike');

// Routes untuk answers
Route::post('/answers', [AnswerController::class, 'store'])->name('answers.store');
Route::put('/answers/{id}', [AnswerController::class, 'editAnswer'])->name('answers.edit');
Route::delete('/answers/{id}', [AnswerController::class, 'deleteAnswer'])->name('answers.delete');

//Route untuk update users
Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');
Route::get('users/{id}', [UserController::class, 'show'])->name('users.show');

//route delete account
Route::delete('/account/delete/{id}', [UserController::class, 'delete']);