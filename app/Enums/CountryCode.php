<?php

namespace App\Enums;

enum CountryCode: string
{
    case MY = '+60';
    case PK = '+92';
    case US = '+1';
    case GB = '+44';
    case AU = '+61';
    case AE = '+971';
    case SA = '+966';
    case SG = '+65';
    case IN = '+91';
    case BD = '+880';
    case ID = '+62';
    case EG = '+20';
    case NG = '+234';
    case ZA = '+27';
    case DE = '+49';
    case FR = '+33';
    case CN = '+86';
    case JP = '+81';
    case KR = '+82';
    case BR = '+55';

    public function label(): string
    {
        return match ($this) {
            self::MY => '🇲🇾 +60',
            self::PK => '🇵🇰 +92',
            self::US => '🇺🇸 +1',
            self::GB => '🇬🇧 +44',
            self::AU => '🇦🇺 +61',
            self::AE => '🇦🇪 +971',
            self::SA => '🇸🇦 +966',
            self::SG => '🇸🇬 +65',
            self::IN => '🇮🇳 +91',
            self::BD => '🇧🇩 +880',
            self::ID => '🇮🇩 +62',
            self::EG => '🇪🇬 +20',
            self::NG => '🇳🇬 +234',
            self::ZA => '🇿🇦 +27',
            self::DE => '🇩🇪 +49',
            self::FR => '🇫🇷 +33',
            self::CN => '🇨🇳 +86',
            self::JP => '🇯🇵 +81',
            self::KR => '🇰🇷 +82',
            self::BR => '🇧🇷 +55',
        };
    }

    public static function default(): self
    {
        return self::MY;
    }
}
