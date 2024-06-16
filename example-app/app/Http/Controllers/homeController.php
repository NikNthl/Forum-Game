<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\question;

class homeController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('home', compact('questions'));
    }
}

