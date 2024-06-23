<?php

namespace App\Http\Controllers;

use App\Models\question;

class homeController extends Controller
{
public function index()
{
    // Fetch questions with their related answers
    $questions = Question::with('answers.user')->get();

    return view('home', compact('questions'));
}
}

