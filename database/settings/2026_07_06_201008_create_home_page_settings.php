<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('home_page.hero_slides', []);

        $this->migrator->add('home_page.courses_badge', 'All Courses');

        $this->migrator->add(
            'home_page.manifesto_quote',
            'manifesto_quote'
        );

        $this->migrator->add(
            'home_page.manifesto_description',
            'manifesto_description'
        );
    }
};
