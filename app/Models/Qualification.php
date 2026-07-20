<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;

class Qualification extends Model
{
    use HasRelationships;

    protected $fillable = [
        'name',
        'description',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

}
