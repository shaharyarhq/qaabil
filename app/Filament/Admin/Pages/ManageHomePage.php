<?php

namespace App\Filament\Admin\Pages;

use App\Filament\Support\Components\Tab\RouteDetailsTab;
use App\Settings\HomePageSettings;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
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
                Tabs::make()
                    ->lazy()
                    ->persistTabInQueryString()
                    ->persistTab()
                    ->columnSpanFull()
                    ->contained(false)
                    ->tabs([
                        RouteDetailsTab::make(),
                        Tab::make('Hero Slider')
                            ->schema([
                                Section::make()
                                    ->columns(2)
                                    ->columnSpanFull()
                                    ->schema([
                                        Repeater::make('hero_slides')
                                            ->reorderable()
                                            ->collapsed()
                                            ->columnSpanFull()
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
                            ]),
                        Tab::make('Manifesto')
                            ->schema([
                                Section::make()
                                    ->columns(2)
                                    ->columnSpanFull()
                                    ->schema([
                                        TextInput::make('manifesto_quote')
                                            ->required()
                                            ->columnSpanFull()
                                            ->maxLength(255),

                                        RichEditor::make('manifesto_description')
                                            ->columnSpanFull()
                                            ->toolbarButtons([
                                                'bold',
                                                'italic',
                                                'bulletList',
                                                'orderedList',
                                                'link',
                                            ]),
                                    ]),
                            ]),
                    ]),
            ]);
    }
}
