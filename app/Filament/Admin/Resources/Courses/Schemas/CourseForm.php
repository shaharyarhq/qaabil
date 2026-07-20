<?php

namespace App\Filament\Admin\Resources\Courses\Schemas;

use App\Filament\Admin\Resources\Qualifications\Schemas\QualificationForm;
use Filament\Forms\Components\Select;
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
                        // TextInput::make('quiz_link')
                        //     ->placeholder('https://www.example.com/quiz')
                        //     ->url()
                        //     ->required()
                        //     ->rules(['required', 'url']),
                        Select::make('qualification_id')
                            ->relationship('qualification', 'name')
                            ->manageOptionForm(QualificationForm::configure($schema)->getComponents())
                            ->required(),
                        Textarea::make('description')
                            ->columnSpanFull()
                            ->nullable(),
                        Toggle::make('is_disabled'),
                    ]),
            ]);
    }
}
