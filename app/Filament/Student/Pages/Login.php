<?php

namespace App\Filament\Student\Pages;

use Filament\View\PanelsRenderHook;
use Illuminate\Contracts\Support\Htmlable;
use Caresome\FilamentAuthDesigner\Pages\Auth\Login as BaseLogin;
use Illuminate\View\View;
use Livewire\Attributes\Url;

class Login extends BaseLogin
{
    // protected string $view = 'filament.student.pages.login';

    public function mount(): void
    {
        filament()->getCurrentPanel()->renderHook(PanelsRenderHook::AUTH_LOGIN_FORM_AFTER, fn(): View => view('partials.login-moderator-instead'));
    }

    public function getHeading(): string|Htmlable
    {
        return __('Member Login');
    }
}
