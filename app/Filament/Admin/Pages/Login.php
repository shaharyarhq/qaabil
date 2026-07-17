<?php

namespace App\Filament\Admin\Pages;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use App\Filament\Support\Pages\BaseLogin;
use Illuminate\Contracts\Support\Htmlable;

class Login extends BaseLogin
{
    // protected string $view = 'filament.moderator.pages.login';

    public function getHeading(): string|Htmlable
    {
        return __('Admin Login');
    }
}
