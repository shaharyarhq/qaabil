<?php

namespace App\Filament\Student\Pages;

use Illuminate\View\View;
use Filament\Schemas\Schema;
use Livewire\Attributes\Url;
use Filament\View\PanelsRenderHook;
use Filament\Schemas\Components\Section;
use Illuminate\Contracts\Support\Htmlable;
use Caresome\FilamentAuthDesigner\Pages\Auth\Login as BaseLogin;
use Caresome\FilamentAuthDesigner\Concerns\HasAuthDesignerLayout;

class Login extends BaseLogin
{
    // protected string $view = 'filament.student.pages.login';

    public function mount(): void {}

    public function getHeading(): string|Htmlable
    {
        return __('Member Login');
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
