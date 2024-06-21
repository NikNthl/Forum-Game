<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    use HasFactory;
    protected $table = 'questions';
    protected $fillable =[
        'user_id',
        'title',
        'question',
        'image',
        'tags',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class)->where('is_like', true);
    }

    public function dislikes()
    {
        return $this->hasMany(Like::class)->where('is_like', false);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($question) {
            if (auth()->check()) {
                $question->user_id = auth()->id();
            }
        });
    }

};