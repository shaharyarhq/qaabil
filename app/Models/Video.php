<?php

namespace App\Models;

use App\Enums\VideoStatus;
use App\Observers\VideoObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Mattiverse\Userstamps\Traits\Userstamps;

#[ObservedBy(VideoObserver::class)]
class Video extends Model
{
    use Userstamps;

    protected $fillable = [
        'title',
        'video_url',
        'thumbnail_url',
        'course_id',
        'section_id',
        'chapter_id',
        'objective_id',
        'language',
        'approved_by',
        'description',
        'learning_materials',
        'quiz_attachments',
        'quiz_link',
        'status',
    ];

    protected $casts = [
        'status' => VideoStatus::class,
        'learning_materials' => 'array',
        'quiz_attachments' => 'array',
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

    public function section()
    {
        return $this->belongsTo(Section::class);
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
