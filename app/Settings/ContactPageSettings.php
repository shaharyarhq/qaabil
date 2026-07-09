<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class ContactPageSettings extends Settings
{
    public array $hero;
    public array $methods;
    public array $socials;
    public array $note;
    public array $topics;

    public static function group(): string
    {
        return 'contact_page';
    }
}
