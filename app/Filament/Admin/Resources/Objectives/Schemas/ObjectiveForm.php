<?php

namespace App\Filament\Admin\Resources\Objectives\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Tabs;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Utilities\Get;

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
                                        Select::make('chapter_id')
                                            ->relationship('chapter', 'name')
                                            ->required(),

                                    ]),
                            ]),
                        Tab::make('Associated Quiz')
                            ->columnSpanFull()
                            ->columns(2)
                            ->schema([
                                Section::make()
                                    ->relationship('quiz')
                                    ->columnSpanFull()
                                    ->columns(2)
                                    ->schema([

                                        Repeater::make('questions')
                                            // ->relationship('questions')
                                            ->schema([
                                                Textarea::make('question')
                                                    ->required()
                                                    ->rows(2),

                                                Select::make('type')
                                                    ->options([
                                                        'single_choice' => 'Single Choice',
                                                        'multiple_choice' => 'Checkboxes (Multiple)',
                                                        'short_answer' => 'Short Answer',
                                                    ])
                                                    ->live()
                                                    ->required(),

                                                Repeater::make('options')
                                                    // ->relationship('options')
                                                    ->visible(fn(Get $get) => in_array($get('type'), ['single_choice', 'multiple_choice']))
                                                    ->schema([
                                                        TextInput::make('option_text')->required()->columnSpan(3),
                                                        Toggle::make('is_correct')->columnSpan(1),
                                                    ])
                                                    ->columns(4)
                                                    ->defaultItems(2)
                                                    ->addActionLabel('Add option'),

                                                TagsInput::make('accepted_answers')
                                                    ->visible(fn(Get $get) => $get('type') === 'short_answer')
                                                    ->placeholder('Type an accepted answer, press Enter'),
                                            ])
                                            ->itemLabel(fn(array $state) => $state['question'] ?? 'New question')
                                            ->addActionLabel('Add question')
                                            ->collapsible(),
                                    ])

                            ])
                    ]),
            ]);
    }
}
