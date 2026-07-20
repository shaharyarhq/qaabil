<?php

namespace App\Models\Quiz;

use App\Models\Question;
use App\Models\Objective;
use App\Models\Quiz\QuizQuestion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Quiz extends Model
{
    protected $fillable = [
        'objective_id',
    ];

    public function objective()
    {
        return $this->belongsTo(Objective::class);
    }

    public function questions(): BelongsToMany
    {
        return $this->belongsToMany(Question::class, 'quiz_questions');
    }
}
