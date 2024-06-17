<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $questions = Question::when($request->has('search'), function ($query) use ($request) {
            $query->where('title', 'ilike', '%' . $request->get('search') . '%')
                  ->orWhere('question', 'ilike', '%' . $request->get('search') . '%');
        })->orderBy('created_at', 'DESC')->paginate(10);

        return view('/home', [
            'questions' => $questions,
            'searchQuery' => $request->get('search', '') // Pass the search query back to the view
        ]);
    }
}
