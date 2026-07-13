<?php

namespace App\Filament\Admin\Pages;

use BackedEnum;
use Filament\Schemas\Schema;
use Filament\Pages\SettingsPage;
use Filament\Support\Icons\Heroicon;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Tabs\Tab;
use App\Settings\TermsAndConditionsPageSettings;
use App\Filament\Support\Components\Tab\RouteDetailsTab;

class ManageTermsAndConditionsPage extends SettingsPage
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::ClipboardDocumentCheck;

    protected static string $settings = TermsAndConditionsPageSettings::class;

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
                        Tab::make('Content')
                            ->schema([
                                Section::make()
                                    ->columns(2)
                                    ->columnSpanFull()
                                    ->schema([
                                        RichEditor::make('content')
                                            ->columnSpanFull()
                                    ])
                            ])
                    ])
            ]);
    }
}
