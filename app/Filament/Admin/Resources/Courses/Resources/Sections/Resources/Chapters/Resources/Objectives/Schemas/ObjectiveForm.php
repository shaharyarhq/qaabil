<?php

namespace App\Filament\Admin\Resources\Courses\Resources\Sections\Resources\Chapters\Resources\Objectives\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ObjectiveForm
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
