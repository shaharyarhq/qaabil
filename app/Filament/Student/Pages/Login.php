<?php

namespace App\Filament\Student\Pages;

use Filament\Auth\Pages\Login as BaseLogin;
use Illuminate\Contracts\Support\Htmlable;

class Login extends BaseLogin
{
    // protected string $view = 'filament.student.pages.login';

    public function getHeading(): string|Htmlable
    {
        return __('Student Login');
    }
}
