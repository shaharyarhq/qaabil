<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class PricingPageSettings extends Settings
{
    public array $hero;

    public array $how_it_works;

    public array $faqs;

    public array $manifesto;

    public static function group(): string
    {
        return 'pricing_page';
    }
}
