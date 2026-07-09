<?php

namespace App\Filament\Admin\Pages;

use App\Settings\HomePageSettings;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Storage;

class ManageHomePage extends SettingsPage
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::HomeModern;

    protected static string $settings = HomePageSettings::class;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Hero Slider')
                    ->columnSpanFull()
                    ->description('Manage the homepage hero slides.')
                    ->schema([

                        Repeater::make('hero_slides')
                            ->reorderable()
                            ->collapsed()
                            ->columns(2)
                            ->itemLabel(fn(array $state): ?string => $state['title'] ?? 'New Slide')
                            ->schema([

                                FileUpload::make('image')
                                    ->image()
                                    ->directory('images/homepage/hero-slides')
                                    ->disk('public')
                                    ->visibility('public')
                                    ->deleteUploadedFileUsing(function ($file) {
                                        Storage::disk('public')->delete($file);
                                    })
                                    ->preserveFilenames()
                                    ->nullable()
                                    ->removeUploadedFileButtonPosition('right')
                                    ->imageEditor()
                                    ->downloadable()
                                    ->columnSpanFull()
                                    ->openable(),

                                TextInput::make('alt')
                                    ->label('Image Alt Text')
                                    ->required(),

                                TextInput::make('title')
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('sub')
                                    ->label('Subtitle')
                                    ->required(),

                                TextInput::make('button_label')
                                    ->required(),

                                TextInput::make('button_url')
                                    ->required(),

                            ])
                            ->defaultItems(1),

                    ]),
                Section::make('Manifesto')
                    ->columnSpanFull()
                    ->schema([

                        TextInput::make('manifesto_quote')
                            ->required()
                            ->maxLength(255),

                        RichEditor::make('manifesto_description')
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'bulletList',
                                'orderedList',
                                'link',
                            ]),

                    ]),
            ]);
    }
}
