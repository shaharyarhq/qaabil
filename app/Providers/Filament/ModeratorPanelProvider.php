<?php

namespace App\Providers\Filament;

use App\Enums\UserRole;
use App\Exceptions\SocialiteEmailAlreadyExistsException;
use App\Exceptions\SocialiteUnableToCreateUserException;
use App\Filament\Moderator\Pages\Login;
use App\Filament\Moderator\Pages\Register;
use App\Filament\Support\PanelConfiguration;
use App\Filament\Widgets\AccountWidget;
use App\Http\Middleware\EnsureModeratorIsApproved;
use App\Models\User;
use DutchCodingCompany\FilamentSocialite\FilamentSocialitePlugin;
use DutchCodingCompany\FilamentSocialite\Provider;
use Exception;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\View\PanelsRenderHook;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\View\View;
use Jeffgreco13\FilamentBreezy\BreezyCore;
use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use App\Enums\Panel as EnumsPanel;

class ModeratorPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return PanelConfiguration::make($panel)
            ->id(EnumsPanel::MODERATOR->value)
            ->path('moderator')
            ->login(Login::class)
            ->registration(Register::class)
            ->passwordReset()
            // ->emailVerification()
            // ->emailChangeVerification()
            // ->profile(Profile::class)
            ->discoverResources(in: app_path('Filament/Moderator/Resources'), for: 'App\Filament\Moderator\Resources')
            ->discoverPages(in: app_path('Filament/Moderator/Pages'), for: 'App\Filament\Moderator\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Moderator/Widgets'), for: 'App\Filament\Moderator\Widgets')
            ->renderHook(PanelsRenderHook::AUTH_LOGIN_FORM_AFTER, fn(): View => view('partials.login-member-instead'))
            ->renderHook(PanelsRenderHook::AUTH_REGISTER_FORM_AFTER, fn(): View => view('partials.register-member-instead'))
            // ->renderHook(PanelsRenderHook::AUTH_LOGIN_FORM_AFTER, fn (): View => view('partials.copyright-label'))
            // ->renderHook(PanelsRenderHook::AUTH_REGISTER_FORM_AFTER, fn (): View => view('partials.copyright-label'))
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
                EnsureModeratorIsApproved::class,
            ])
            ->plugins([
                BreezyCore::make()
                    // ->customMyProfilePage(Profile::class)
                    ->myProfile(hasAvatars: true),
                FilamentSocialitePlugin::make()
                    ->slug('moderator')
                    ->registration()
                    ->providers([
                        Provider::make('github')
                            ->label('Github')
                            ->icon('fab-github')
                            ->color('primary')
                            ->outlined(false)
                            ->stateless(false)
                            ->scopes(['read:user']),
                        Provider::make('google')
                            ->label('Google')
                            ->icon('fab-google')
                            ->color('danger')
                            ->outlined(false)
                            ->stateless(false)
                            ->scopes(['email', 'profile']),
                    ])
                    ->createUserUsing(function (string $provider, SocialiteUserContract $oauthUser, FilamentSocialitePlugin $plugin) {
                        $email = $oauthUser->getEmail();

                        if (User::where('email', $email)->exists()) { // Check if email already exists
                            throw new SocialiteEmailAlreadyExistsException;
                        }

                        DB::beginTransaction();

                        try {
                            $user = User::create([
                                'name' => $oauthUser->getName() ?? $oauthUser->getNickname(),
                                'email' => $oauthUser->getEmail(),
                                'password' => Str::password(32),
                                'avatar_url' => $oauthUser->getAvatar(),
                            ]);

                            $user->assignRole(UserRole::MODERATOR);
                            $user->markEmailAsVerified(); // To auto validate user email
                            DB::commit();

                            return $user;
                        } catch (Exception $exception) {
                            DB::rollBack();
                            logger()->error($exception->getMessage());
                            throw new SocialiteUnableToCreateUserException;
                        }
                    })
                    ->resolveUserUsing(function (string $provider, SocialiteUserContract $oauthUser, FilamentSocialitePlugin $plugin) {
                        // dd($oauthUser, User::all());
                    })
            ]);
    }
}
