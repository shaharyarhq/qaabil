<?php

namespace App\Gamify\Badges;

use QCod\Gamify\BadgeType;

class Influencer extends BadgeType
{
    /**
     * Description for badge
     *
     * @var string
     */
    protected $description = 'Approved 100 videos this month';

    /**
     * Check is user qualifies for badge
     *
     * @return bool
     */
    public function qualifier($user): bool
    {
        return $user->approvedVideos()
            ->whereMonth('updated_at', now()->month)
            ->whereYear('updated_at', now()->year)
            ->count() >= 100;
    }
}
