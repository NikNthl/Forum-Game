<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\answer;

class answerController extends Controller{
    
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'answers' => 'required|string|max:2000',
        ]);

       // Tambahkan user_id ke data yang divalidasi
        $validatedData['user_id'] = auth()->id();

        // Simpan jawaban ke dalam database
        $answers = new answer($validatedData);
        $answers->save();

        // Redirect ke halaman utama
        return redirect('/home');
    }

    public function deleteAnswer($id){
        $answers = answer::findOrFail($id);

        if ($answers->user_id != auth()->id()){
            return redirect()->route('/')->with('error', 'you cannot delete other users answer');
        }

        $answers->delete();

        return redirect()->route('/home')->with('success', 'answer deleted');
    }
    public function editAnswer(Request $request, $id){

        $validatedData = $request->validate([
            'answers' => 'required|string|max:2000',
        ]);

        $answers = answer::findOrFail($id);

        if ($answers->user_id != auth()->id()){
            return redirect()->route('/home')->with('error', 'you cannot edit other users answer');
        }

        $answers->update([
            'answers' => $validatedData['answers'],
        ]);
    
        return redirect()->route('/home')->with('success', 'answer editted');
    }
}