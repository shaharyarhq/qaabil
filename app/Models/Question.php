<?php

namespace App\Models;

use App\Models\Objective;
use App\Enums\QuestionType;
use App\Models\QuestionOption;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'type',
        'question',
        'objective_id',
        'accepted_answers',
        'hint'
    ];

    protected $casts = [
        'objective_id' => 'integer',
        'type' => QuestionType::class,
        'accepted_answers' => 'array',
    ];

    public function objective()
    {
        return $this->belongsTo(Objective::class);
    }

    public function options()
    {
        return $this->hasMany(QuestionOption::class)->orderBy('order');
    }
}
