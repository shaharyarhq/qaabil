<?php

namespace App\Filament\Student\Pages;

use Illuminate\View\View;
use Filament\Schemas\Schema;
use Livewire\Attributes\Url;
use Filament\View\PanelsRenderHook;
use Filament\Schemas\Components\Section;
use App\Filament\Support\Pages\BaseLogin;
use Illuminate\Contracts\Support\Htmlable;

class Login extends BaseLogin
{
    // protected string $view = 'filament.student.pages.login';

    public function mount(): void {}

    public function getHeading(): string|Htmlable
    {
        return __('Member Login');
    }
}
