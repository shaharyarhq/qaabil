<?php

namespace App\Models;

use App\Models\Objective;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'objective_id',
    ];

    public function objective()
    {
        return $this->belongsTo(Objective::class);
    }
}
