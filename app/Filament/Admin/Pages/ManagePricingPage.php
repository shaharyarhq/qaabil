<?php

namespace App\Filament\Admin\Pages;

use App\Filament\Support\Components\Tab\RouteDetailsTab;
use App\Settings\PricingPageSettings;
use BackedEnum;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class ManagePricingPage extends SettingsPage
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::CurrencyDollar;

    protected static string $settings = PricingPageSettings::class;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make()
                    ->persistTabInQueryString()
                    ->persistTab()
                    ->columnSpanFull()
                    ->contained(false)
                    ->tabs([
                        RouteDetailsTab::make(),
                        Tab::make('Hero Section')
                            ->schema([
                                Section::make()
                                    ->columns(2)
                                    ->columnSpanFull()
                                    ->Schema([
                                        TextInput::make('hero.badge')
                                            ->columnSpanFull()
                                            ->required(),

                                        TextInput::make('hero.title')
                                            // ->toolbarButtons([
                                            //     'bold',
                                            //     'italic',
                                            //     'link',
                                            // ])
                                            ->columnSpanFull(),

                                        RichEditor::make('hero.description')
                                            // ->toolbarButtons([
                                            //     'bold',
                                            //     'italic',
                                            //     'bulletList',
                                            //     'orderedList',
                                            //     'link',
                                            // ])
                                            ->columnSpanFull(),

                                        Repeater::make('hero.chips')
                                            ->label('Hero Chips')
                                            ->simple(
                                                TextInput::make('value')
                                                    ->required()
                                            )
                                            ->reorderable()
                                            ->columnSpanFull()
                                            ->defaultItems(2),
                                    ]),
                            ]),
                        Tab::make('How It Works')
                            ->schema([
                                Section::make()
                                    ->columns(2)
                                    ->columnSpanFull()
                                    ->Schema([
                                        Repeater::make('how_it_works.steps')
                                            ->label('Steps')
                                            ->collapsed()
                                            ->reorderable()
                                            ->columns(2)
                                            ->columnSpanFull()
                                            ->itemLabel(fn(array $state): ?string => $state['title'] ?? 'Step')
                                            ->schema([
                                                TextInput::make('icon')
                                                    ->required()
                                                    ->helperText('Emoji or icon'),

                                                TextInput::make('title')
                                                    ->required(),

                                                RichEditor::make('description')
                                                    // ->toolbarButtons([
                                                    //     'bold',
                                                    //     'italic',
                                                    //     'link',
                                                    // ])
                                                    ->columnSpanFull(),
                                            ]),
                                    ])
                            ]),
                        Tab::make('Frequently Asked Questions')
                            ->schema([
                                Section::make()
                                    ->columns(2)
                                    ->columnSpanFull()
                                    ->Schema([
                                        Repeater::make('faqs')
                                            ->collapsed()
                                            ->reorderable()
                                            ->columnSpanFull()
                                            ->columns(2)
                                            ->itemLabel(fn(array $state): ?string => $state['question'] ?? 'FAQ')
                                            ->schema([
                                                TextInput::make('question')
                                                    ->required(),

                                                RichEditor::make('answer')
                                                    ->columnSpanFull()
                                                // ->toolbarButtons([
                                                //     'bold',
                                                //     'italic',
                                                //     'bulletList',
                                                //     'orderedList',
                                                //     'link',
                                                // ]),

                                            ]),
                                    ])
                            ]),
                        Tab::make('Manifesto')
                            ->schema([
                                Section::make()
                                    ->columns(2)
                                    ->columnSpanFull()
                                    ->Schema([
                                        TextInput::make('manifesto.quote'),

                                        RichEditor::make('manifesto.description')
                                            ->columnSpanFull()
                                        // ->toolbarButtons([
                                        //     'bold',
                                        //     'italic',
                                        //     'bulletList',
                                        //     'orderedList',
                                        //     'link',
                                        // ])
                                        ,

                                        TextInput::make('manifesto.button_label')
                                            ->required(),

                                        TextInput::make('manifesto.button_url')
                                            ->required(),

                                    ]),
                            ])
                    ]),
            ]);
    }
}
