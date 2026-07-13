<?php

namespace App\Filament\Admin\Pages;

use App\Settings\ApplicationSettings;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Storage;

class ManageApplicationSettings extends SettingsPage
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::Cog6Tooth;

    protected static string $settings = ApplicationSettings::class;

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
                                    ])
                            ]),
                    ]),
            ]);
    }
}
