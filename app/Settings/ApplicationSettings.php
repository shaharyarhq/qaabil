<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class ApplicationSettings extends Settings
{

    public array $site_settings;

    public static function group(): string
    {
        return 'application_settings';
    }
}
