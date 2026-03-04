<?php

namespace App\Filament\Moderator\Pages;

use Filament\Pages\Page;

class PendingApproval extends Page
{
    protected string $view = 'filament.moderator.pages.pending-approval';

    protected static bool $shouldRegisterNavigation = false; // hide from sidebar

    public function getTitle(): string
    {
        return 'Pending Approval';
    }
}
