<?php

namespace App\Filament\Moderator\Resources\Videos\Pages;

use App\Filament\Moderator\Resources\Videos\VideoResource;
use Filament\Resources\Pages\ListRecords;

class ListVideos extends ListRecords
{
    protected static string $resource = VideoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // CreateAction::make(),
        ];
    }
}
