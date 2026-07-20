<?php

namespace App\Filament\Admin\Resources\Objectives\Schemas;

use App\Filament\Admin\Resources\Questions\Tables\QuestionsTable;
use Filament\Actions\Action;
use Filament\Forms\Components\ModalTableSelect;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\EmptyState;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Model;

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
                                            ->contained(false)
                                            ->visible(fn(?Model $record) => !($record?->questions()->exists())),
                                        Group::make([
                                            ModalTableSelect::make('questions')
                                                ->relationship(name: 'questions', titleAttribute: 'question')
                                                ->multiple()
                                                ->tableConfiguration(QuestionsTable::class)
                                                ->tableArguments(fn($livewire) => [
                                                    'objective_id' => $livewire->getRecord()?->id,
                                                ])
                                                ->extraFieldWrapperAttributes(['class' => 'flex justify-center'])
                                                ->hiddenLabel()
                                                ->selectAction(
                                                    fn(Action $action) => $action
                                                        ->label('Select Questions')
                                                )
                                                ->columnSpanFull(),
                                        ])
                                            ->columns(1)
                                            ->columnSpanFull(),
                                    ])
                            ])
                    ]),
            ]);
    }
}
