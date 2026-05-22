<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    protected $fillable = [
        'name',
        'chapter_id',
        'quiz_link',
    ];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function userProgress()
    {
        return $this->hasMany(UserObjectiveProgress::class);
    }
}
