<?php

namespace App\Enums;

enum Panel: string
{
    case ADMIN = 'admin';
    case MEMBER = 'member';
    case MODERATOR = 'moderator';
}
