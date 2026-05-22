<?php

namespace App\Filament\Support;

use Andreia\FilamentUiSwitcher\FilamentUiSwitcherPlugin;
use Filament\FontProviders\GoogleFontProvider;
use Filament\Panel;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\Width;
use Filament\View\PanelsRenderHook;
use Illuminate\View\View;
use Leandrocfe\FilamentApexCharts\FilamentApexChartsPlugin;

class PanelConfiguration
{
    public static function make(Panel $panel)
    {
        return (new static)->apply($panel);
    }

    public function apply(Panel $panel): Panel
    {
        $panel
            ->font('Space Grotesk', provider: GoogleFontProvider::class)
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->profile()
            // ->brandName($this->generalSettings->site_name)
            // ->brandLogo(fn() => $this->generalSettings->site_logo ? asset('storage/' . $this->generalSettings->site_logo) : null)
            // ->darkModeBrandLogo(fn() => $this->generalSettings->site_logo_dark_mode ? asset('storage/' . $this->generalSettings->site_logo_dark_mode) : null)
            // ->spa(fn() => $this->generalSettings->spa_mode)
            // ->maxContentWidth($this->generalSettings->content_width ?? Width::Full)
            // ->topNavigation(fn() => $this->generalSettings->navigation_type === 'topbar')
            // ->topbar(fn() => $this->generalSettings->navigation_type === 'topbar')
            // ->topbar(false)
            ->homeUrl('/')
            // ->sidebarWidth('18rem')
            // ->sidebarCollapsibleOnDesktop()
            ->globalSearch(false)
            ->spa()
            ->spaUrlExceptions([
                '/',
            ])
            ->brandLogo('/images/logo/qaabil.jpeg')
            ->favicon('/images/logo/favicon.png')
            ->brandLogoHeight('2.4rem')
            ->simplePageMaxContentWidth(Width::Large)
            ->databaseTransactions()
            ->databaseNotifications()
            ->renderHook(
                PanelsRenderHook::FOOTER,
                fn (): View => view('partials.global-loading-indicator'),
            )
            ->renderHook(
                PanelsRenderHook::BODY_END,
                hook: fn (): View => view('partials.light-switch')
            )
            ->renderHook(
                PanelsRenderHook::BODY_END,
                hook: fn (): View => view('partials.about-me')
            )
            ->renderHook(
                PanelsRenderHook::BODY_END,
                hook: fn (): View => view('partials.drag-modals')
            )
            ->renderHook(
                PanelsRenderHook::STYLES_AFTER,
                hook: fn (): View => view('partials.bprogress')
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
                FilamentApexChartsPlugin::make()
            ]);

        return $panel;
    }
}
