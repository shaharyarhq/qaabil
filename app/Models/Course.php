<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function chapters()
    {
        return $this->hasManyThrough(Chapter::class, Section::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
