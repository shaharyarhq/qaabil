<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class HomePageSettings extends Settings
{
    public array $route;
    public array $hero_slides;
    public string $courses_badge;
    // public string $courses_title;
    // public string $courses_highlight;
    public string $manifesto_quote;
    public string $manifesto_description;
    public static function group(): string
    {
        return 'home_page';
    }
}
