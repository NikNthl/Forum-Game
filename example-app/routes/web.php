<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
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

Route::get ('/question', function(){
    return view('addQuestion');
});

Route::get ('/changePassword',function(){
    return view('changePassword');
});