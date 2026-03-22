<?php

namespace App\Filament\Admin\Resources\Courses\Resources\Sections\Resources\Chapters\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ChapterForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
            ]);
    }
}
