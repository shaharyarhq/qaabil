<?php

namespace App\Gamify\Badges;

use QCod\Gamify\BadgeType;

class RegularLearner extends BadgeType
{
    /**
     * Description for badge
     *
     * @var string
     */
    protected $description = '';

    /**
     * Check is user qualifies for badge
     *
     * @return bool
     */
    public function qualifier($user)
    {
        return $user->getPoints() >= 1000;
    }
}
