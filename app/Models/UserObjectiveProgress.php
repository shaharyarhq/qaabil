<?php

namespace App\Models;

use App\Enums\Progress;
use Illuminate\Database\Eloquent\Model;

class UserObjectiveProgress extends Model
{
    protected $fillable = ['user_id', 'objective_id', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function objective()
    {
        return $this->belongsTo(Objective::class);
    }

    protected $casts = [
        'status' => Progress::class,
    ];
}
