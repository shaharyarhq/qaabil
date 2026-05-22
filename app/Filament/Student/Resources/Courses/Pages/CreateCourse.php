<?php

namespace App\Filament\Student\Resources\Courses\Pages;

use App\Filament\Student\Resources\Courses\CourseResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCourse extends CreateRecord
{
    protected static string $resource = CourseResource::class;

    public static function canAccess(array $parameters = []): bool
    {
        return false;
    }
}
