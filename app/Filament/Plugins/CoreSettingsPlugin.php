<?php

namespace App\Filament\Plugins;

use Filament\Panel;
use Illuminate\View\View;
use Filament\Contracts\Plugin;
use Filament\Support\Enums\Width;
use Filament\Support\Colors\Color;
use Filament\View\PanelsRenderHook;
use App\Livewire\CustomPersonalInfo;
use Illuminate\Support\Facades\Storage;
use Jeffgreco13\FilamentBreezy\BreezyCore;
use Filament\FontProviders\GoogleFontProvider;
use Martin6363\SidebarResize\SidebarResizePlugin;
use Caresome\FilamentAuthDesigner\AuthDesignerPlugin;
use Caresome\FilamentAuthDesigner\Data\AuthPageConfig;
use Caresome\FilamentAuthDesigner\Enums\MediaPosition;
use Andreia\FilamentUiSwitcher\FilamentUiSwitcherPlugin;
use Leandrocfe\FilamentApexCharts\FilamentApexChartsPlugin;

class CoreSettingsPlugin implements Plugin
{
    public function getId(): string
    {
        return 'app-core-settings';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->font('Space Grotesk', provider: GoogleFontProvider::class)
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->profile()
            // ->homeUrl(
            //     // fn() => getHomePageSettings()->route['url']
            // )
            ->spaUrlExceptions([
                // getHomePageSettings()->route['url'],
            ])
            ->globalSearch(false)
            ->spa()
            ->brandLogo(
                fn() => asset('storage/' . getSiteSettings()['logo'])
            )
            ->darkModeBrandLogo(
                fn() => asset('storage/' . getSiteSettings()['logo_dark_mode'])
            )
            ->favicon(
                fn() => asset('storage/' . getSiteSettings()['favicon'])
            )
            ->brandLogoHeight('2.4rem')
            ->simplePageMaxContentWidth(Width::Large)
            ->databaseTransactions()
            ->databaseNotifications()
            ->renderHook(
                PanelsRenderHook::BODY_END,
                hook: fn(): View => view('partials.about-me')
            )
            ->renderHook(
                PanelsRenderHook::BODY_END,
                hook: fn(): View => view('partials.drag-modals')
            )
            ->renderHook(
                PanelsRenderHook::STYLES_AFTER,
                hook: fn(): View => view('partials.bprogress')
            )
            ->colors([
                'primary' => Color::Blue,
                'danger' => Color::Rose,
                'success' => Color::Teal,
                'warning' => Color::Orange,
                'info' => Color::Sky,
                'gray' => Color::Mauve,
            ])
            ->plugins([
                FilamentUiSwitcherPlugin::make()
                    ->withModeSwitcher(),
                FilamentApexChartsPlugin::make(),
                BreezyCore::make()
                    ->myProfileComponents([
                        'personal_info' => CustomPersonalInfo::class,
                    ])
                    ->myProfile(hasAvatars: true),
                SidebarResizePlugin::make()
                    ->minWidth(320),
            ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
