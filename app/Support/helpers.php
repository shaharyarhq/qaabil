<?php

use App\Models\Course;
use App\Settings\HomePageSettings;
use App\Settings\AcademyPageSettings;
use App\Settings\ApplicationSettings;
use App\Settings\ContactPageSettings;
use App\Settings\PricingPageSettings;
use App\Settings\PrivacyPolicyPageSettings;
use App\Settings\TermsAndConditionsPageSettings;

if (! function_exists('app_date_format')) {
    function app_date_format()
    {
        return 'd-M-Y';
    }
}

if (! function_exists('app_date_time_format')) {
    function app_date_time_format()
    {
        return 'd-M-Y h:i a';
    }
}

if (! function_exists('spa')) {
    function spa()
    {
        return 'wire:navigate';
    }
}

function getCourseQuery()
{
    return Course::query()->where('is_disabled', false);
}

function getHomePageSettings()
{
    return app(HomePageSettings::class);
}

function getPricingPageSettings()
{
    return app(PricingPageSettings::class);
}

function getAcademyPageSettings()
{
    return app(AcademyPageSettings::class);
}

function getContactPageSettings()
{
    return app(ContactPageSettings::class);
}

function getApplicationSettings()
{
    return app(ApplicationSettings::class);
}

function getSiteSettings()
{
    return getApplicationSettings()->site_settings;
}

function getPrivacyPolicyPageSettings()
{
    return app(PrivacyPolicyPageSettings::class);
}

function getTermsAndConditionsPageSettings()
{
    return app(TermsAndConditionsPageSettings::class);
}

function getPanelAuthBackgroundUrl(string $panelId): ?string
{
    $settings = getSiteSettings();

    $path = $settings["{$panelId}_auth_background_video"]
        ?? $settings["{$panelId}_auth_background"]
        ?? null;

    return $path ? asset('storage/' . $path) : null;
}
