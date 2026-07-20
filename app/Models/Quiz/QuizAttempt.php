<?php

namespace App\Models\Quiz;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class QuizAttempt extends Model
{
    protected $fillable = [
        'quiz_id',
        'user_id',
        'status',
        'total_questions',
        'correct_count',
        'percentage',
        'submitted_at',
    ];

    protected $casts = [
        'submitted_at' => 'datetime',
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // kept for later — QuizAnswer table/writes currently commented out
    // public function answers()
    // {
    //     return $this->hasMany(QuizAnswer::class);
    // }
}
