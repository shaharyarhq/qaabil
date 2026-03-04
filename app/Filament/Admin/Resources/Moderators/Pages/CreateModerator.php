<?php

namespace App\Filament\Admin\Resources\Moderators\Pages;

use App\Filament\Admin\Resources\Moderators\ModeratorResource;
use Filament\Resources\Pages\CreateRecord;

class CreateModerator extends CreateRecord
{
    protected static string $resource = ModeratorResource::class;
}
