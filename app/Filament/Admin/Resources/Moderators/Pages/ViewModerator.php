<?php

namespace App\Filament\Admin\Resources\Moderators\Pages;

use App\Filament\Admin\Resources\Moderators\ModeratorResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewModerator extends ViewRecord
{
    protected static string $resource = ModeratorResource::class;

    public static function canAccess(array $parameters = []): bool
    {
        return false;
    }

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
