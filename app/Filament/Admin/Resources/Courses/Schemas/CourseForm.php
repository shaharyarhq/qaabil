<?php

namespace App\Filament\Admin\Resources\Courses\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CourseForm
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
                        TextInput::make('quiz_link')
                            ->placeholder('https://www.example.com/quiz')
                            ->url()
                            ->required()
                            ->rules(['required', 'url']),
                        Textarea::make('description')
                            ->columnSpanFull()
                            ->nullable(),
                        Toggle::make('is_disabled'),
                    ]),
            ]);
    }
}
