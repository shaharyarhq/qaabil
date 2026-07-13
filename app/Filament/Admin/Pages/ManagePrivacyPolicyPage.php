<?php

namespace App\Filament\Admin\Pages;

use BackedEnum;
use Filament\Schemas\Schema;
use Filament\Pages\SettingsPage;
use Filament\Support\Icons\Heroicon;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs\Tab;
use App\Settings\PrivacyPolicyPageSettings;
use App\Filament\Support\Components\Tab\RouteDetailsTab;
use Filament\Forms\Components\RichEditor;

class ManagePrivacyPolicyPage extends SettingsPage
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::ShieldCheck;

    protected static string $settings = PrivacyPolicyPageSettings::class;

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
