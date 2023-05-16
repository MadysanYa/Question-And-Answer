<?php

namespace App\Models;

use App\Models\Test;
use App\Models\UserAdmin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id", 
        "test_id", 
        "score", 
        "time_taken",
        "started_at",
        "ended_at"
    ];

    // RELATIONSHIP
    public function user() {
        return $this->belongsTo(UserAdmin::class, "user_id", "id");
    }

    public function examType() {
        return $this->belongsTo(Test::class, "test_id", "id");
    }

    // MUTATOR


    // ACCESSOR
    public function getExamNameAttribute()
    {
        return optional($this->examType)->name;
    }

    public function getUserNameAttribute()
    {
        return optional($this->user)->name;
    }

    public function getScoreFormatAttribute($key)
    {
        return str_pad($this->score, 2, '0', STR_PAD_LEFT);
    }

    // SCOPE
    public function scopeUserId($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    public function scopeTestId($query, $testId)
    {
        return $query->where('test_id', $testId);
    }
}
