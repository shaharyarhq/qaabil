<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class PrivacyPolicyPageSettings extends Settings
{
    public array $route;
    public ?string $content;

    public static function group(): string
    {
        return 'privacy_policy';
    }
}
