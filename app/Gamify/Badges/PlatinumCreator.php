<?php

namespace App\Gamify\Badges;

use QCod\Gamify\BadgeType;

class PlatinumCreator extends BadgeType
{
    /**
     * Description for badge
     *
     * @var string
     */
    protected $description = 'Uploaded 12 videos this month';

    /**
     * Check is user qualifies for badge
     *
     * @return bool
     */
    public function qualifier($user): bool
    {
        return $user->videos()
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count() >= 12;
    }
}
