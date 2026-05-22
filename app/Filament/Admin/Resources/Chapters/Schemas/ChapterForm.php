<?php

namespace App\Filament\Admin\Resources\Chapters\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ChapterForm
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
                            ->maxLength(255)
                            ->required(),
                        Select::make('section_id')
                            ->relationship('section', 'name')
                            ->required(),
                        TextInput::make('quiz_link')
                            ->placeholder('https://www.example.com/quiz')
                            ->url()
                            ->required()
                            ->rules(['required', 'url']),
                    ])
            ]);
    }
}
