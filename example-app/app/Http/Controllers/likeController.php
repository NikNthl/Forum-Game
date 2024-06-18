<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Like;

class likeController extends Controller
{
    public function like(Request $request, $id)
    {
        // Mencari pertanyaan berdasarkan ID yang diberikan
        $question = Question::findOrFail($id);
        
        // Membuat atau memperbarui entri 'like' untuk pengguna yang sedang login dan pertanyaan yang diberikan
        // Jika entri belum ada, maka akan dibuat, jika sudah ada, maka akan diperbarui
        $like = Like::updateOrCreate(
            ['user_id' => auth()->id(), 'question_id' => $id],
            ['is_like' => true]
        );

        // Mengarahkan kembali ke halaman utama dengan pesan sukses
        return redirect()->route('home')->with('success', 'Question upvoted');
    }

    public function dislike(Request $request, $id)
    {
        // Mencari pertanyaan berdasarkan ID yang diberikan
        $question = Question::findOrFail($id);
        
        // Membuat atau memperbarui entri 'like' untuk pengguna yang sedang login dan pertanyaan yang diberikan
        // Jika entri belum ada, maka akan dibuat, jika sudah ada, maka akan diperbarui
        $like = Like::updateOrCreate(
            ['user_id' => auth()->id(), 'question_id' => $id],
            ['is_like' => false]
        );

        // Mengarahkan kembali ke halaman utama dengan pesan sukses
        return redirect()->route('home')->with('success', 'Question downvoted');
    }
}
