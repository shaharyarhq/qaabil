<?php

namespace App\Filament\Admin\Pages;

use App\Filament\Support\Components\Tab\RouteDetailsTab;
use App\Settings\ContactPageSettings;
use BackedEnum;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class ManageContactPage extends SettingsPage
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::Phone;

    protected static string $settings = ContactPageSettings::class;

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
                        Tab::make('Hero')
                            ->schema([
                                Section::make()
                                    ->columns(2)
                                    ->columnSpanFull()
                                    ->schema([

                                        TextInput::make('hero.badge')
                                            ->required(),

                                        TextInput::make('hero.title')
                                            ->label('Title')
                                            ->required(),

                                        Textarea::make('hero.subtitle')
                                            ->rows(2)
                                            ->autosize()
                                            ->columnSpanFull(),

                                    ]),
                            ]),
                        Tab::make('Contact Methods')
                            ->schema([
                                Section::make()
                                    ->columnSpanFull()
                                    ->columns(2)
                                    ->schema([

                                        Repeater::make('methods.items')
                                            ->collapsed()
                                            ->reorderable()
                                            ->columnSpanFull()
                                            ->columns(2)
                                            ->itemNumbers()
                                            ->itemLabel(fn(array $state): ?string => $state['label'] ?? 'Method')
                                            ->schema([

                                                Select::make('type')
                                                    ->options([
                                                        'email' => 'Email',
                                                        'whatsapp' => 'WhatsApp',
                                                    ])
                                                    ->searchable(false)
                                                    ->required(),

                                                TextInput::make('label')
                                                    ->helperText('e.g. "Email us at"')
                                                    ->required(),

                                                TextInput::make('value')
                                                    ->helperText('Display text, e.g. "admin@qaabil.academy"')
                                                    ->required(),

                                                TextInput::make('sub')
                                                    ->label('Subtitle (optional)'),

                                                TextInput::make('href')
                                                    ->label('Link (mailto:, https://wa.me/...)')
                                                    ->required()
                                                    ->columnSpanFull(),

                                            ]),

                                    ]),
                            ]),

                        Tab::make('Social Links')
                            ->schema([
                                Section::make()
                                    ->columns(2)
                                    ->columnSpanFull()
                                    ->schema([

                                        Repeater::make('socials.items')
                                            ->collapsed()
                                            ->reorderable()
                                            ->columnSpanFull()
                                            ->columns(2)
                                            ->cloneable()
                                            ->itemNumbers()
                                            ->itemLabel(fn(array $state): ?string => $state['label'] ?? 'Social')
                                            ->schema([

                                                Select::make('icon_key')
                                                    ->label('Platform')
                                                    ->options([
                                                        'linkedin' => 'linkedin',
                                                        'instagram' => 'instagram',
                                                        'facebook' => 'facebook',
                                                        'tiktok' => 'tiktok',
                                                        'youtube' => 'youtube',
                                                        'threads' => 'threads',
                                                    ])
                                                    ->searchable(false),

                                                // ColorPicker::make('color')
                                                //     ->required(),

                                                TextInput::make('href')
                                                    ->label('URL')
                                                    ->required(),

                                            ]),

                                    ]),
                            ]),


                        Tab::make('Community Note')
                            ->schema([
                                Section::make()
                                    ->columnSpanFull()
                                    ->columns(2)
                                    ->schema([

                                        TextInput::make('note.icon')
                                            ->label('Emoji / Symbol')
                                            ->required(),

                                        TextInput::make('note.title')
                                            ->required(),

                                        Textarea::make('note.description')
                                            ->rows(3)
                                            ->autosize()
                                            ->required()
                                            ->columnSpanFull(),

                                    ]),
                            ]),

                        Tab::make('Message Topics')
                            ->schema([

                                Section::make()
                                    ->columnSpanFull()
                                    ->columns(2)
                                    ->schema([

                                        Repeater::make('topics.items')
                                            ->label('Topic Chips')
                                            ->simple(
                                                TextInput::make('value')
                                                    ->required()
                                            )
                                            ->reorderable()
                                            ->cloneable()
                                            ->columnSpanFull(),

                                    ]),
                            ]),
                    ]),
            ]);
    }
}
