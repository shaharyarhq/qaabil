<?php

namespace App\Filament\Admin\Resources\Moderators\Pages;

use App\Filament\Admin\Resources\Moderators\ModeratorResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditModerator extends EditRecord
{
    protected static string $resource = ModeratorResource::class;

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
