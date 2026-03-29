<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;


class Course extends Model
{
    use HasRelationships;

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

    public function objectives()
    {
        return $this->hasManyDeep(
            Objective::class,
            [Section::class, Chapter::class]
        );
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
