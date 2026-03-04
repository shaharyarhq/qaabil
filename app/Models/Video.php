<?php

namespace App\Models;

use App\Models\Chapter;
use App\Models\Course;
use App\Models\Objective;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'title',
        'video_url',
        'thumbnail_url',
        'course_id',
        'chapter_id',
        'objective_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function objective()
    {
        return $this->belongsTo(Objective::class);
    }
}
