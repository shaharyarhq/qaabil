<?php

namespace App\Models;

use App\Models\Chapter;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function objectives()
    {
        return $this->hasManyThrough(Objective::class, Chapter::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
