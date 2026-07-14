<?php

namespace App\Filament\Admin\Pages;

use BackedEnum;
use App\Enums\Panel;
use Filament\Schemas\Schema;
use Filament\Pages\SettingsPage;
use Filament\Support\Icons\Heroicon;
use App\Settings\ApplicationSettings;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Slider;
use Filament\Schemas\Components\Tabs;
use Illuminate\Support\Facades\Storage;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Forms\Components\BaseFileUpload;
use Filament\Schemas\Components\Utilities\Get;
use Caresome\FilamentAuthDesigner\Enums\MediaPosition;

class ManageApplicationSettings extends SettingsPage
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::Cog6Tooth;

    protected static string $settings = ApplicationSettings::class;

    public function form(Schema $schema): Schema
    {
        $tabs = [];

        foreach (
            [
                Panel::ADMIN->value,
                Panel::MEMBER->value,
                Panel::MODERATOR->value,
            ] as $panel
        ) {
            $tabs = [
                ...$tabs,
                Tab::make(str("$panel Panel")->headline())
                    ->schema([
                        Section::make()
                            ->columnSpanFull()
                            ->columns(2)
                            ->schema([
                                Select::make("site_settings.{$panel}_auth_background_type")
                                    ->searchable(false)
                                    ->live()
                                    ->options([
                                        'image' => 'Image',
                                        'video' => 'Video',
                                    ]),
                                Select::make("site_settings.{$panel}_auth_background_position")
                                    ->label('Auth Background Position')
                                    ->options(MediaPosition::class)
                                    ->searchable(false),
                                FileUpload::make("site_settings.{$panel}_auth_background")
                                    ->label('Auth Background')
                                    ->acceptedFileTypes(['image/*'])
                                    ->directory("images/site_settings/{$panel}/auth_background")
                                    ->disk('public')
                                    ->visibility('public')
                                    ->deleteUploadedFileUsing(function ($file) {
                                        Storage::disk('public')->delete($file);
                                    })
                                    ->preserveFilenames()
                                    ->nullable()
                                    ->removeUploadedFileButtonPosition('right')
                                    ->visible(fn(Get $get) => $get("site_settings.{$panel}_auth_background_type") === 'image')
                                    ->required()
                                    ->imageEditor()
                                    ->columnSpanFull()
                                    ->downloadable()
                                    // ->columnSpanFull()
                                    ->openable(),
                                FileUpload::make("site_settings.{$panel}_auth_background_video")
                                    ->label('Auth Background Video')
                                    ->acceptedFileTypes(['video/*'])
                                    ->directory("images/site_settings/{$panel}/auth_background_video")
                                    ->disk('public')
                                    ->visibility('public')
                                    ->deleteUploadedFileUsing(function ($file) {
                                        Storage::disk('public')->delete($file);
                                    })
                                    ->nullable()
                                    ->removeUploadedFileButtonPosition('right')
                                    // ->imageEditor()
                                    ->previewable()
                                    ->visible(fn(Get $get) => $get("site_settings.{$panel}_auth_background_type") === 'video')
                                    ->required()
                                    ->columnSpanFull()
                                    ->downloadable()
                                    // ->columnSpanFull()
                                    ->openable(),
                                Slider::make("site_settings.{$panel}_auth_background_blur")
                                    ->label('Auth Background Blur')
                                    ->range(minValue: 0, maxValue: 10)
                                    ->tooltips()
                                    ->vertical()
                                    ->decimalPlaces(0),
                            ])
                    ])
            ];
        }

        return $schema
            ->components([
                Tabs::make()
                    ->lazy()
                    ->persistTabInQueryString()
                    ->persistTab()
                    ->columnSpanFull()
                    ->contained(false)
                    ->tabs([
                        Tab::make('Site Settings')
                            ->columnSpanFull()
                            ->schema([
                                Section::make()
                                    ->columnSpanFull()
                                    ->columns(2)
                                    ->schema([
                                        FileUpload::make('site_settings.logo')
                                            ->image()
                                            ->label('Site Logo')
                                            ->directory('images/site_settings/logo')
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
                                            // ->columnSpanFull()
                                            ->openable(),
                                        FileUpload::make('site_settings.logo_dark_mode')
                                            ->image()
                                            ->label('Site Logo Dark Mode')
                                            ->directory('images/site_settings/logo')
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
                                            // ->columnSpanFull()
                                            ->openable(),
                                        FileUpload::make('site_settings.favicon')
                                            ->image()
                                            ->label('Site Favicon')
                                            ->directory('images/site_settings/logo')
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
                                            // ->columnSpanFull()
                                            ->openable(),
                                    ]),
                            ]),
                        ...$tabs
                    ]),
            ]);
    }
}
