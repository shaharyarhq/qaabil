<?php

namespace App\Filament\Admin\Resources\Courses\Resources\Sections\Resources\Chapters\Resources\Objectives\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ObjectiveForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->required(),
                        TextInput::make('quiz_link')
                            ->placeholder('https://www.example.com/quiz')
                            ->url()
                            ->required()
                            ->rules(['required', 'url']),
                    ]),
            ]);
    }
}
