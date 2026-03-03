<?php

namespace App\Models;

use App\Models\Chapter;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
    ];

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}
