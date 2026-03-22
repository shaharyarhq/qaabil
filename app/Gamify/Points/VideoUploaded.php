<?php

namespace App\Gamify\Points;

use QCod\Gamify\PointType;

class VideoUploaded extends PointType
{
    /**
     * Number of points
     */
    public int $points = 10;

    /**
     * Point constructor
     */
    public function __construct($subject = null)
    {
        $this->subject = $subject;
    }

    /**
     * User who will be receive points
     *
     * @return mixed
     */
    public function payee()
    {
        return $this->getSubject();
    }
}
