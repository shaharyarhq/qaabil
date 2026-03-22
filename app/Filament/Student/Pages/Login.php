<?php

namespace App\Filament\Student\Pages;

use Filament\Auth\Pages\Login as BaseLogin;
use Filament\View\PanelsRenderHook;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\View\View;

class Login extends BaseLogin
{
    // protected string $view = 'filament.student.pages.login';

    public function getHeading(): string|Htmlable
    {
        filament()->getCurrentPanel()->renderHook(PanelsRenderHook::AUTH_LOGIN_FORM_AFTER, fn (): View => view('partials.login-moderator-instead'));

        return __('Member Login');

    }
}
