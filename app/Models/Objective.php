<?php

namespace App\Models;

use App\Models\Chapter;
use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    protected $fillable = [
        'name',
    ];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }
}
