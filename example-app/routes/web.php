<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [homeController::class, 'index']);

Route::get ('/login', [loginController::class, 'index']);

Route::get ('/register', [registerController::class, 'index']);