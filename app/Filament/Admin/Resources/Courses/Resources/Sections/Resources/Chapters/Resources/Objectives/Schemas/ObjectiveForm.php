<?php

namespace App\Filament\Admin\Resources\Courses\Resources\Sections\Resources\Chapters\Resources\Objectives\Schemas;

use App\Filament\Admin\Resources\Questions\Tables\QuestionsTable;
use Filament\Actions\Action;
use Filament\Forms\Components\ModalTableSelect;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\EmptyState;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
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
