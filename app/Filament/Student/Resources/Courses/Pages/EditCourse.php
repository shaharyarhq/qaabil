<?php

namespace App\Filament\Student\Resources\Courses\Pages;

use App\Filament\Student\Resources\Courses\CourseResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditCourse extends EditRecord
{
    protected static string $resource = CourseResource::class;

    public static function canAccess(array $parameters = []): bool
    {
        return false;
    }

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
