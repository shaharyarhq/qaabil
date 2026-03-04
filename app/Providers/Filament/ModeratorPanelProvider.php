<?php

namespace App\Providers\Filament;

use App\Filament\Support\PanelConfiguration;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Widgets\AccountWidget;
use App\Filament\Moderator\Pages\Login;
use App\Filament\Moderator\Pages\Register;
use App\Http\Middleware\EnsureModeratorIsApproved;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class ModeratorPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return PanelConfiguration::make($panel)
            ->id('moderator')
            ->path('moderator')
            ->login(Login::class)
            ->registration(Register::class)
            ->passwordReset()
            ->emailVerification()
            ->emailChangeVerification()
            ->profile()
            ->discoverResources(in: app_path('Filament/Moderator/Resources'), for: 'App\Filament\Moderator\Resources')
            ->discoverPages(in: app_path('Filament/Moderator/Pages'), for: 'App\Filament\Moderator\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Moderator/Widgets'), for: 'App\Filament\Moderator\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
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
                EnsureModeratorIsApproved::class
            ]);
    }
}
