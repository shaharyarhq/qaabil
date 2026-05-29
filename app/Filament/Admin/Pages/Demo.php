<?php

namespace App\Filament\Admin\Pages;

use Filament\Pages\Page;

class Demo extends Page
{
    protected static bool $shouldRegisterNavigation = false;

    public static function canAccess(): bool
    {
        return false;
    }

    protected string $view = 'filament.admin.pages.demo';
}
