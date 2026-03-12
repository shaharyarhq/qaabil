<?php

namespace App\Models;

use App\Enums\VideoStatus;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Objective;
use Illuminate\Database\Eloquent\Model;
use Mattiverse\Userstamps\Traits\Userstamps;

class Video extends Model
{
    use Userstamps;

    protected $fillable = [
        'title',
        'video_url',
        'thumbnail_url',
        'course_id',
        'chapter_id',
        'objective_id',
        'approved_by',
        'status'
    ];

    protected $casts = [
        'status' => VideoStatus::class
    ];

    protected $attributes = [
        'status' => VideoStatus::PENDING,
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

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
