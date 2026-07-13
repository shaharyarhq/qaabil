<?php

namespace App\Providers\Filament;

use Exception;
use Filament\Panel;
use App\Models\User;
use App\Enums\UserRole;
use Illuminate\View\View;
use Filament\PanelProvider;
use Illuminate\Support\Str;
use Filament\Pages\Dashboard;
use App\Enums\Panel as EnumsPanel;
use Illuminate\Support\Facades\DB;
use Filament\View\PanelsRenderHook;
use App\Livewire\CustomPersonalInfo;
use App\Filament\Student\Pages\Login;
use App\Filament\Widgets\AccountWidget;
use Illuminate\Support\Facades\Storage;
use App\Filament\Student\Pages\Register;
use Filament\Http\Middleware\Authenticate;
use Jeffgreco13\FilamentBreezy\BreezyCore;
use App\Filament\Plugins\CoreSettingsPlugin;
use App\Filament\Support\PanelConfiguration;
use Filament\FontProviders\GoogleFontProvider;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Filament\Http\Middleware\AuthenticateSession;
use DutchCodingCompany\FilamentSocialite\Provider;
use Caresome\FilamentAuthDesigner\AuthDesignerPlugin;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Caresome\FilamentAuthDesigner\Data\AuthPageConfig;
use Caresome\FilamentAuthDesigner\Enums\MediaPosition;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Exceptions\SocialiteEmailAlreadyExistsException;
use App\Exceptions\SocialiteUnableToCreateUserException;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use DutchCodingCompany\FilamentSocialite\FilamentSocialitePlugin;

class StudentPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id(EnumsPanel::MEMBER->value)
            ->path('member')
            ->login(Login::class)
            ->registration(Register::class)
            ->passwordReset()
            ->emailVerification()
            ->emailChangeVerification()
            // ->profile(Profile::class)
            ->discoverResources(in: app_path('Filament/Student/Resources'), for: 'App\Filament\Student\Resources')
            ->discoverPages(in: app_path('Filament/Student/Pages'), for: 'App\Filament\Student\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->renderHook(PanelsRenderHook::AUTH_LOGIN_FORM_AFTER, fn(): View => view('partials.login-moderator-instead'))
            ->renderHook(PanelsRenderHook::AUTH_REGISTER_FORM_AFTER, fn(): View => view('partials.register-moderator-instead'))
            // ->renderHook(PanelsRenderHook::AUTH_LOGIN_FORM_AFTER, fn (): View => view('partials.copyright-label'))
            // ->renderHook(PanelsRenderHook::AUTH_REGISTER_FORM_AFTER, fn (): View => view('partials.copyright-label'))
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
            ->plugin(new CoreSettingsPlugin())
            ->plugins([
                AuthDesignerPlugin::make()
                    ->login(
                        fn(AuthPageConfig $config) => $config
                            ->media(asset('storage/images/homepage/hero-slides/hero-1.jpg'))
                            ->mediaPosition(MediaPosition::Cover)
                            ->blur(2)
                            ->themeToggle(top: '1rem', left: '1rem')
                            ->usingPage(Login::class)
                    )
                    ->registration(
                        fn(AuthPageConfig $config) => $config
                            ->media(asset('storage/images/homepage/hero-slides/hero-1.jpg'))
                            ->mediaPosition(MediaPosition::Cover)
                            ->blur(2)
                            ->themeToggle(top: '1rem', left: '1rem')
                            ->usingPage(Register::class)
                    )
                    ->emailVerification(
                        fn(AuthPageConfig $config) => $config
                            ->media(asset('storage/images/homepage/hero-slides/hero-1.jpg'))
                            ->mediaPosition(MediaPosition::Cover)
                            ->blur(2)
                            ->themeToggle(top: '1rem', left: '1rem')
                    )
                    ->passwordReset(
                        fn(AuthPageConfig $config) => $config
                            ->media(asset('storage/images/homepage/hero-slides/hero-1.jpg'))
                            ->mediaPosition(MediaPosition::Cover)
                            ->blur(2)
                            ->themeToggle(top: '1rem', left: '1rem')
                    ),
                FilamentSocialitePlugin::make()
                    ->slug('member')
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

                            $user->assignRole(UserRole::STUDENT);
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
