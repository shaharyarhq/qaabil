<?php

namespace App\Providers\Filament;

use App\Filament\Admin\Pages\Profile;
use App\Filament\Student\Pages\Login;
use App\Filament\Student\Pages\Register;
use App\Filament\Support\PanelConfiguration;
use App\Filament\Widgets\AccountWidget;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\View\PanelsRenderHook;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\View\View;
use Jeffgreco13\FilamentBreezy\BreezyCore;

class StudentPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return PanelConfiguration::make($panel)
            ->id('member')
            ->path('member')
            ->login(Login::class)
            ->registration(Register::class)
            ->passwordReset()
            // ->emailVerification()
            // ->emailChangeVerification()
            // ->profile(Profile::class)
            ->discoverResources(in: app_path('Filament/Student/Resources'), for: 'App\Filament\Student\Resources')
            ->discoverPages(in: app_path('Filament/Student/Pages'), for: 'App\Filament\Student\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->renderHook(PanelsRenderHook::AUTH_LOGIN_FORM_AFTER, fn (): View => view('partials.login-moderator-instead'))
            ->renderHook(PanelsRenderHook::AUTH_REGISTER_FORM_AFTER, fn (): View => view('partials.register-moderator-instead'))
            ->renderHook(PanelsRenderHook::AUTH_LOGIN_FORM_AFTER, fn (): View => view('partials.copyright-label'))
            ->renderHook(PanelsRenderHook::AUTH_REGISTER_FORM_AFTER, fn (): View => view('partials.copyright-label'))
            ->discoverWidgets(in: app_path('Filament/Student/Widgets'), for: 'App\Filament\Student\Widgets')
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
            ->plugins([
                BreezyCore::make()
                    ->myProfile(hasAvatars: true),
            ]);
    }
}
