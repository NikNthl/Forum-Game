<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    use HasFactory;
    protected $table = 'question';
    protected $fillable =[
        'title',
        'question'    
    ];
};