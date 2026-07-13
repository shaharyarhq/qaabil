<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class TermsAndConditionsPageSettings extends Settings
{
    public array $route;
    public ?string $content;

    public static function group(): string
    {
        return 'terms_and_conditions';
    }
}
