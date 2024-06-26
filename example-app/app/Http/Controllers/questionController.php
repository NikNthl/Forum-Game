<?php 
namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Question;
use Illuminate\Support\Facades\Storage;

class QuestionController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:200',
            'question' => 'required|string|max:2000',
            'image' => 'nullable|image|mimes:jpeg,png,gif,svg|max:2048',
            'tags' => 'nullable|string|max:255',
        ]);
    
        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public', $filename); 
            $validatedData['image'] = $filename;
        } else {
            $validatedData['image'] = null;
        }
    
        // Tambahkan user_id ke data yang divalidasi
        $validatedData['user_id'] = auth()->id();
    
        // Simpan pertanyaan ke dalam database
        $question = new Question($validatedData); 
        $question->save();
        
        // Redirect ke halaman utama
        return redirect('home');
    }
    
    public function editQuestion(Request $request, $id): RedirectResponse
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:200',
            'question' => 'required|string|max:2000',
            'image' => 'nullable|image|mimes:jpeg,png,gif,svg|max:2048',
            'tags' => 'nullable|string|max:255',
        ]);
    
        $question = Question::findOrFail($id);
    
        if ($question->user_id != auth()->id()) {
            return redirect()->route('home')->with('error', 'You cannot edit other users\' questions');
        }
    
        // Handle image upload if provided
        if ($request->hasFile('image')) {
            // Optionally delete the old image if it exists
            if ($question->image) {
                Storage::disk('public')->delete($question->image);
            }
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public', $filename); 
            $validatedData['image'] = $filename;
        } else {
            $validatedData['image'] = $question->image;
        }
    
        $question->update($validatedData);
    
        return redirect()->route('home')->with('success', 'Question edited');
    }

    public function deleteQuestion($id): RedirectResponse
    {
        $question = Question::findOrFail($id);
        
        if ($question->user_id != auth()->id()) {
            return redirect()->route('home')->with('error', 'You cannot delete other users\' questions');
        }

        // Optionally delete the image if it exists
        if ($question->image) {
            Storage::disk('public')->delete($question->image);
        }

        $question->delete();

        return redirect()->route('home')->with('success', 'Question deleted');
    }
}