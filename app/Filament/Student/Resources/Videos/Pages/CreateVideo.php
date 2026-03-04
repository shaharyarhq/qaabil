<?php

namespace App\Filament\Student\Resources\Videos\Pages;

use App\Filament\Student\Resources\Videos\VideoResource;
use Filament\Resources\Pages\CreateRecord;

class CreateVideo extends CreateRecord
{
    protected static string $resource = VideoResource::class;
}
