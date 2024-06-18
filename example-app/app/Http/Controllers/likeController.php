<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Like;

class LikeController extends Controller
{
    public function like(Request $request, $id)
    {
        $question = Question::findOrFail($id);
        $like = Like::updateOrCreate(
            ['user_id' => auth()->id(), 'question_id' => $id],
            ['is_like' => true]
        );

        return redirect()->route('home')->with('success', 'Question liked');
    }

    public function dislike(Request $request, $id)
    {
        $question = Question::findOrFail($id);
        $like = Like::updateOrCreate(
            ['user_id' => auth()->id(), 'question_id' => $id],
            ['is_like' => false]
        );

        return redirect()->route('home')->with('success', 'Question disliked');
    }
}
