<?php

namespace App\Filament\Moderator\Widgets;

use Filament\Widgets\Widget;

class EarnedBadgesWidget extends Widget
{
    protected string $view = 'filament.student.widgets.earned-badges-widget';

    protected static ?int $sort = 1;

    protected int|string|array $columnSpan = 'full';

    public function getBadges()
    {
        return filament()->auth()->user()->badges;
    }

    public function getReputation(): int
    {
        return filament()->auth()->user()->reputation ?? 0;
    }
}
