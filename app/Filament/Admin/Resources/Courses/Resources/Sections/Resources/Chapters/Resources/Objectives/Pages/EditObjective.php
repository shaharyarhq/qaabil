<?php

namespace App\Filament\Admin\Resources\Courses\Resources\Sections\Resources\Chapters\Resources\Objectives\Pages;

use App\Filament\Admin\Resources\Courses\Resources\Sections\Resources\Chapters\Resources\Objectives\ObjectiveResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditObjective extends EditRecord
{
    protected static string $resource = ObjectiveResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
