<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LikeDislike;
use App\Models\Answer;

class LikeDislikeController extends Controller
{
    // Fungsi untuk menangani toggle like pada jawaban
    public function toggleLike(Request $request, $answerId)
    {
        // Mendapatkan pengguna yang sedang login
        $user = Auth::user();

        // Jika pengguna belum login, kembalikan respon error
        if (!$user) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        // Mencari jawaban berdasarkan ID, jika tidak ditemukan akan gagal
        $answer = Answer::findOrFail($answerId);

        // Mengecek apakah pengguna sudah memberikan like atau dislike pada jawaban ini
        $existingLike = LikeDislike::where('user_id', $user->id)->where('answer_id', $answerId)->first();

        if ($existingLike) {
            if ($existingLike->is_like) {
                // Jika record existing adalah like, hapus (unlike)
                $existingLike->delete();
            } else {
                // Jika record existing adalah dislike, ubah menjadi like
                $existingLike->update(['is_like' => true]);
            }
        } else {
            // Jika tidak ada record existing, buat like baru
            $answer->likes()->create(['user_id' => $user->id, 'is_like' => true]);
        }

        // Kembalikan jumlah like dan dislike yang diperbarui
        return response()->json([
            'likes_count' => $answer->likes()->count(),
            'dislikes_count' => $answer->dislikes()->count(),
        ]);
    }

    // Fungsi untuk menangani toggle dislike pada jawaban
    public function toggleDislike(Request $request, $answerId)
    {
        // Mendapatkan pengguna yang sedang login
        $user = Auth::user();

        // Jika pengguna belum login, kembalikan respon error
        if (!$user) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        // Mencari jawaban berdasarkan ID, jika tidak ditemukan akan gagal
        $answer = Answer::findOrFail($answerId);

        // Mengecek apakah pengguna sudah memberikan like atau dislike pada jawaban ini
        $existingLike = LikeDislike::where('user_id', $user->id)->where('answer_id', $answerId)->first();

        if ($existingLike) {
            if (!$existingLike->is_like) {
                // Jika record existing adalah dislike, hapus (remove dislike)
                $existingLike->delete();
            } else {
                // Jika record existing adalah like, ubah menjadi dislike
                $existingLike->update(['is_like' => false]);
            }
        } else {
            // Jika tidak ada record existing, buat dislike baru
            $answer->dislikes()->create(['user_id' => $user->id, 'is_like' => false]);
        }

        // Kembalikan jumlah like dan dislike yang diperbarui
        return response()->json([
            'likes_count' => $answer->likes()->count(),
            'dislikes_count' => $answer->dislikes()->count(),
        ]);
    }
}
