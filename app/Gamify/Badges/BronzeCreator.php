<?php

namespace App\Gamify\Badges;

use QCod\Gamify\BadgeType;

class BronzeCreator extends BadgeType
{
    /**
     * Description for badge
     *
     * @var string
     */
    protected $description = 'Uploaded 1 video this month';

    /**
     * Check is user qualifies for badge
     */
    public function qualifier($user): bool
    {
        return $user->videos()
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count() >= 1;
    }
}
