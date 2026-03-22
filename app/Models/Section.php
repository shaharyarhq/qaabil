<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'name',
        'course_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
