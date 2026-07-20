<?php

namespace App\Models\Quiz;

use App\Enums\QuizType;
use App\Models\Question;
use App\Models\Quiz\Quiz;
use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    protected $fillable = [
        'question_id',
        'quiz_id'
    ];

    protected $casts = [
        'quiz_id' => 'integer',
        'question_id' => 'integer',
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
