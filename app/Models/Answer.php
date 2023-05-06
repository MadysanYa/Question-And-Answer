<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = ['is_correct', 'answer_text'];
    protected $casts = ['is_correct' => 'boolean'];
}
