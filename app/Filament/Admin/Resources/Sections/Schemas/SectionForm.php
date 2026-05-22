<?php

namespace App\Filament\Admin\Resources\Sections\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SectionForm
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
                        Select::make('course_id')
                            ->relationship('course', 'name')
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
