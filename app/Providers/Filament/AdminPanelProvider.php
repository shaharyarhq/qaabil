<?php

namespace App\Providers\Filament;

use Filament\Panel;
use Filament\PanelProvider;
use Filament\Pages\Dashboard;
use App\Enums\Panel as EnumsPanel;
use App\Filament\Admin\Pages\Login;
use App\Livewire\CustomPersonalInfo;
use App\Filament\Admin\Pages\Profile;
use App\Filament\Widgets\AccountWidget;
use Illuminate\Support\Facades\Storage;
use Filament\Http\Middleware\Authenticate;
use Jeffgreco13\FilamentBreezy\BreezyCore;
use App\Filament\Plugins\CoreSettingsPlugin;
use App\Filament\Support\PanelConfiguration;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Filament\Http\Middleware\AuthenticateSession;
use Caresome\FilamentAuthDesigner\AuthDesignerPlugin;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Caresome\FilamentAuthDesigner\Data\AuthPageConfig;
use Caresome\FilamentAuthDesigner\Enums\MediaPosition;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        $panelId = EnumsPanel::ADMIN->value;

        return $panel
            ->default()
            ->id($panelId)
            ->path($panelId)
            ->login()
            // ->profile(Profile::class)
            ->discoverResources(in: app_path('Filament/Admin/Resources'), for: 'App\Filament\Admin\Resources')
            ->discoverPages(in: app_path('Filament/Admin/Pages'), for: 'App\Filament\Admin\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Admin/Widgets'), for: 'App\Filament\Admin\Widgets')
            ->widgets([
                AccountWidget::class,
                // FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->plugin(new CoreSettingsPlugin())
            ->plugins([
                AuthDesignerPlugin::make()
                    ->defaults(
                        fn($config) => $config
                            ->media(getPanelAuthBackgroundUrl($panelId))
                            ->mediaPosition(MediaPosition::tryFrom(getSiteSettings()["{$panelId}_auth_background_position"] ?? '') ?? MediaPosition::Cover)
                            ->blur(getSiteSettings()["{$panelId}_auth_background_blur"] ?? false)
                            ->themeToggle(top: '1rem', left: '1rem')
                    )
                    ->login(
                        fn(AuthPageConfig $config) => $config
                            ->usingPage(Login::class),
                    )
            ]);
    }
}
