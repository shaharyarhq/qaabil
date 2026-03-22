<?php

namespace App\Filament\Student\Widgets;

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

        $videosThisMonth = $user->videos()
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->count();

        // These will be 0 until video_views and video_reviews tables exist
        $watchedThisMonth = method_exists($user, 'watchedVideos')
            ? $user->watchedVideos()->whereMonth('created_at', $month)->whereYear('created_at', $year)->count()
            : 0;

        $reviewsThisMonth = method_exists($user, 'reviews')
            ? $user->reviews()->whereMonth('created_at', $month)->whereYear('created_at', $year)->count()
            : 0;

        return [
            [
                'label'       => 'Creator',
                'icon'        => '🎬',
                'icon_bg'     => '#FAC775',
                'icon_color'  => '#633806',
                'bar_color'   => '#EF9F27',
                'badge_bg'    => '#FAEEDA',
                'badge_color' => '#854F0B',
                'unit'        => 'videos',
                'current'     => $videosThisMonth,
                'tiers'       => ['Bronze' => 1, 'Silver' => 4, 'Gold' => 8, 'Platinum' => 12],
            ],
            [
                'label'       => 'Learner',
                'icon'        => '📚',
                'icon_bg'     => '#9FE1CB',
                'icon_color'  => '#085041',
                'bar_color'   => '#1D9E75',
                'badge_bg'    => '#E1F5EE',
                'badge_color' => '#0F6E56',
                'unit'        => 'videos watched',
                'current'     => $watchedThisMonth,
                'tiers'       => ['Regular' => 10, 'Smart' => 30, 'Intensive' => 100],
            ],
            [
                'label'       => 'Reviewer',
                'icon'        => '⭐',
                'icon_bg'     => '#CECBF6',
                'icon_color'  => '#3C3489',
                'bar_color'   => '#7F77DD',
                'badge_bg'    => '#EEEDFE',
                'badge_color' => '#534AB7',
                'unit'        => 'reviews',
                'current'     => $reviewsThisMonth,
                'tiers'       => ['Supporter' => 10, 'Motivator' => 30, 'Influencer' => 100],
            ],
        ];
    }
}
