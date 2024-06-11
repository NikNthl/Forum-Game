<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeDislike extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'answer_id', 'is_like'];
}
