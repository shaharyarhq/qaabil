<?php

namespace App\Filament\Support\Components\Tab;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs\Tab;

class RouteDetailsTab
{
    public static function make(?string $labelKey = 'route.label', ?string $urlKey = 'route.url'): Tab
    {
        return Tab::make('Route Details')
            ->schema([
                Section::make()
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make($labelKey),
                        TextInput::make($urlKey)->prefix(function () {
                            return request()->host();
                        }),
                    ])
            ]);
    }
}
