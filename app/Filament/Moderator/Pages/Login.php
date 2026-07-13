<?php

namespace App\Filament\Moderator\Pages;

use Caresome\FilamentAuthDesigner\Pages\Auth\Login as BaseLogin;
use Illuminate\Contracts\Support\Htmlable;

class Login extends BaseLogin
{
    // protected string $view = 'filament.moderator.pages.login';

    public function getHeading(): string|Htmlable
    {
        return __('Moderator Login');
    }
}
