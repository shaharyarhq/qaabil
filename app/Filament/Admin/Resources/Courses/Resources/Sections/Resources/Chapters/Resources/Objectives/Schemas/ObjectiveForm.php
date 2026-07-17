<?php

namespace App\Filament\Admin\Resources\Courses\Resources\Sections\Resources\Chapters\Resources\Objectives\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs\Tab;

class ObjectiveForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make()
                    ->columnSpanFull()
                    ->columns(2)
                    ->contained(false)
                    ->schema([
                        Tab::make('Details')
                            ->columnSpanFull()
                            ->columns(2)
                            ->schema([
                                Section::make()
                                    ->columnSpanFull()
                                    ->columns(2)
                                    ->schema([
                                        TextInput::make('name')
                                            ->required(),
                                        // TextInput::make('quiz_link')
                                        //     ->placeholder('https://www.example.com/quiz')
                                        //     ->url()
                                        //     ->required()
                                        //     ->rules(['required', 'url']),
                                    ]),
                            ]),
                        Tab::make('Associated Quiz')
                            ->columnSpanFull()
                            ->columns(2)
                            ->schema([
                                Section::make()
                                    ->columnSpanFull()
                                    ->columns(2)
                                    ->relationship('quiz')
                                    ->schema([])
                            ])
                    ]),
            ]);
    }
}
