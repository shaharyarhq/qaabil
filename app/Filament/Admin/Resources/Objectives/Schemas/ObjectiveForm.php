<?php

namespace App\Filament\Admin\Resources\Objectives\Schemas;

use App\Enums\QuizType;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Tabs;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\CheckboxList;
use Filament\Schemas\Components\EmptyState;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;

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
                    ->persistTabInQueryString()
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

                                        Select::make('course_id')
                                            ->label('Course')
                                            ->relationship('chapter.section.course', 'name')
                                            ->afterStateUpdatedJs('$set(`section_id`, null)')
                                            ->required(),

                                        Select::make('section_id')
                                            ->label('Section')
                                            ->relationship('chapter.section', 'name', fn($query, Get $get) => $query->where('course_id', $get('course_id')))
                                            ->afterStateUpdatedJs('$set(`chapter_id`, null)')
                                            ->required(),

                                        Select::make('chapter_id')
                                            ->relationship('chapter', 'name', fn($query, Get $get) => $query->where('section_id', $get('section_id')))
                                            ->afterStateHydrated(function (Get $get, Set $set, ?Model $record) {
                                                if ($record) {
                                                    $set('course_id', $record->chapter->section->course->id);
                                                    $set('section_id', $record->chapter->section->id);
                                                }
                                            })
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
                                        EmptyState::make('no_quiz_yet')
                                            ->heading('No Questions Assigned to the quiz')
                                            ->description('Assign questions to this quiz.')
                                            ->icon(Heroicon::AcademicCap)
                                            ->columnSpanFull()
                                            ->visible(fn(?Model $record) => !($record?->questions()->exists())),
                                        CheckboxList::make('questions')
                                            ->relationship(
                                                name: 'questions',
                                                titleAttribute: 'question',
                                                modifyQueryUsing: fn(Builder $query, ?Model $record) =>
                                                $query->where('objective_id', $record?->objective_id),
                                            )
                                            ->columnSpanFull()
                                            ->columns(1)
                                            ->bulkToggleable(),
                                        // Repeater::make('questions')
                                        //     ->relationship('questions')
                                        //     ->columnSpanFull()
                                        //     ->columns(2)
                                        //     ->reorderable()
                                        //     ->schema([
                                        //         Select::make('type')
                                        //             ->enum(QuizType::class)
                                        //             ->options(QuizType::class)
                                        //             ->live()
                                        //             ->required(),

                                        //         Textarea::make('question')
                                        //             ->required(),
                                        //     ])

                                    ])
                            ])
                    ]),
            ]);
    }
}
