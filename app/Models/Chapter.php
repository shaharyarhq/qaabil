<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $fillable = [
        'name',
        'course_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function objectives()
    {
        return $this->hasMany(Objective::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
