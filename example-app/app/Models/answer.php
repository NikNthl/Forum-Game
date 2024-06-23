<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $table = 'answers';

    protected $fillable = [
        'question_id',
        'user_id',
        'answers',
    ];
//
    public function user()
    {
        return $this->belongsTo(User::class);
    }
//
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($answer) {
            if (auth()->check()) {
                $answer->user_id = auth()->id();
            }
        });
    }
};
