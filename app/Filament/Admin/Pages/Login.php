<?php

namespace App\Filament\Admin\Pages;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Illuminate\Contracts\Support\Htmlable;
use Caresome\FilamentAuthDesigner\Pages\Auth\Login as BaseLogin;

class Login extends BaseLogin
{
    // protected string $view = 'filament.moderator.pages.login';

    public function getHeading(): string|Htmlable
    {
        return __('Admin Login');
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        $this->getEmailFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getRememberFormComponent(),
                    ]),
            ]);
    }
}
