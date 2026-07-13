<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class AcademyPageSettings extends Settings
{
    public array $route;
    public array $hero;
    public array $about;
    public array $courses;
    public array $features;
    public array $gallery;
    public array $tutors;
    public array $testimonials;
    public array $manifesto;

    public static function group(): string
    {
        return 'academy_page';
    }
}
