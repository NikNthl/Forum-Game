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
        'tags',
    ];

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