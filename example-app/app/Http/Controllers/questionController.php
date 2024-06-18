<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\question;
use App\Models\Like;

class questionController extends Controller{
    
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:200',
            'question' => 'required|string|max:2000',
            'tags' =>'nullable|string',
        ]);

       // Tambahkan user_id ke data yang divalidasi
        $validatedData['user_id'] = auth()->id();

        // Simpan pertanyaan ke dalam database
        $question = new question($validatedData);
        $question->save();

        // Redirect ke halaman utama
        return redirect('/home');
    }

    public function deleteQuestion($id)
{
    $question = Question::findOrFail($id);

    if ($question->user_id != auth()->id()) {
        return redirect()->route('home')->with('error', 'You cannot delete other users questions');
    }

    $question->delete();

    return redirect()->route('home')->with('success', 'question deleted');
}

    public function editQuestion(Request $request, $id){

        $validatedData = $request->validate([
            'title' => 'required|string|max:200',
            'question' => 'required|string|max:2000',
            'tags' =>'nullable|string',
        ]);

        $question = question::findOrFail($id);

        if ($question->user_id != auth()->id()){
            return redirect()->route('home')->with('error', 'you cannot edit other users question');
        }

        $question->update([
            'title' => $validatedData['title'],
            'question' => $validatedData['question'],
            'tags' => $validatedData['tags'],
        ]);
    
        return redirect()->route('home')->with('success', 'question editted');
        }
}