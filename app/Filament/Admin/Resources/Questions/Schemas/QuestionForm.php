<?php

namespace App\Filament\Admin\Resources\Questions\Schemas;

use Closure;
use Livewire\Component;
use App\Enums\QuestionType;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Forms\Components\Repeater\TableColumn;

class QuestionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        Select::make('objective_id')
                            ->relationship('objective', 'name')
                            ->required(),

                        ToggleButtons::make('type')
                            ->options(QuestionType::class)
                            ->live()
                            ->required()
                            ->inline(),

                        Textarea::make('question')
                            ->columnSpanFull()
                            ->required(),

                        Textarea::make('hint')
                            ->columnSpanFull()
                            ->nullable(),

                        Repeater::make('options')
                            ->relationship('options')
                            ->visible(fn(Get $get) => in_array($get('type'), [
                                QuestionType::Dropdown,
                                QuestionType::SingleChoice,
                                QuestionType::MultipleChoice,
                            ]))
                            ->columnSpanFull()
                            ->reorderable()
                            ->grid([
                                'default' => 1,
                                'md' => 2,
                            ])
                            ->compact()
                            // ->table([
                            //     TableColumn::make('Option'),
                            //     TableColumn::make('Is Correct'),
                            // ])
                            ->schema([
                                TextInput::make('option_text')
                                    ->required()
                                    ->hiddenLabel()
                                    ->columnSpan(3),
                                Checkbox::make('is_correct')
                                    ->columnSpan(1),
                            ])
                            ->columns(4)
                            ->defaultItems(1)
                            ->rule(function (Get $get) {
                                return function (string $attribute, $value, Closure $fail) use ($get) {
                                    $type = $get('type');
                                    $correctCount = collect($value)->filter(fn($opt) => $opt['is_correct'] ?? false)->count();

                                    if (in_array($type, [QuestionType::Dropdown, QuestionType::SingleChoice]) && $correctCount !== 1) {
                                        $fail('Exactly one option must be marked correct for this question type.');
                                    }

                                    if ($type === QuestionType::MultipleChoice && $correctCount < 1) {
                                        $fail('At least one option must be marked correct.');
                                    }
                                };
                            }),

                    ]),
            ]);
    }
}
