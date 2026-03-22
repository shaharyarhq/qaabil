<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $fillable = [
        'name',
        'section_id',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
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
