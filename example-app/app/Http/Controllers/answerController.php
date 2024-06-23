<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\answer;

class answerController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'answers' => 'required|string|max:2000',
            'question_id' => 'required|integer|exists:questions,id', // Add validation for question_id
        ]);

        $validatedData['user_id'] = auth()->id();

        // Create and save the answer
        $answer = new answer($validatedData);
        $answer->save();

        // Redirect to the home page
        return redirect('/home');
    }

    public function deleteanswer($id)
    {
        $answer = answer::findOrFail($id);

        if ($answer->user_id != auth()->id()) {
            return redirect()->route('/')->with('error', 'You cannot delete other users\' answers');
        }

        $answer->delete();

        return redirect()->route('/home')->with('success', 'answer deleted');
    }

    public function editanswer(Request $request, $id)
    {
        $validatedData = $request->validate([
            'answers' => 'required|string|max:2000',
        ]);

        $answer = answer::findOrFail($id);

        if ($answer->user_id != auth()->id()) {
            return redirect()->route('/home')->with('error', 'You cannot edit other users\' answers');
        }

        $answer->update([
            'answers' => $validatedData['answers'],
        ]);

        return redirect()->route('/home')->with('success', 'answer edited');
    }
}
