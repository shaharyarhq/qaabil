<?php

namespace App\Filament\Moderator\Widgets;

use Filament\Widgets\Widget;

class BadgeProgressWidget extends Widget
{
    protected string $view = 'filament.student.widgets.badge-progress-widget';

    protected static ?int $sort = 2;

    protected int|string|array $columnSpan = 'full';

    public function getProgress(): array
    {
        $user = filament()->auth()->user();
        $month = now()->month;
        $year = now()->year;

        return [
            [
                'label'       => 'Reviewer',
                'icon'        => '⭐',
                'icon_bg'     => '#CECBF6',
                'icon_color'  => '#3C3489',
                'bar_color'   => '#7F77DD',
                'badge_bg'    => '#EEEDFE',
                'badge_color' => '#534AB7',
                'unit'        => 'videos approved',
                'current'     => $user->approvedVideos()
                    ->whereMonth('updated_at', $month)
                    ->whereYear('updated_at', $year)
                    ->count(),
                'tiers' => ['Supporter' => 10, 'Motivator' => 30, 'Influencer' => 100],
            ],
        ];
    }
}
