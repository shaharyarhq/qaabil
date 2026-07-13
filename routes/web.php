<?php

use App\Http\Middleware\CheckVideoAccess;
use App\Settings\AcademyPageSettings;
use App\Settings\ContactPageSettings;
use App\Settings\HomePageSettings;
use App\Settings\PricingPageSettings;
use Illuminate\Support\Facades\Route;

$homePageSettings = app(HomePageSettings::class);
$academyPageSettings = app(AcademyPageSettings::class);
$contactPageSettings = app(ContactPageSettings::class);
$pricingPageSettings = app(PricingPageSettings::class);

Route::livewire($homePageSettings->route['url'], 'pages::index')->name('home');

Route::livewire($contactPageSettings->route['url'], 'pages::contact')->name('contact');

Route::livewire('/about', 'pages::about')->name('about');

// Route::livewire('/', 'pages::privacy-policy')->name('policy');

// Route::livewire('/', 'pages::terms-and-conditions')->name('terms');

Route::livewire($academyPageSettings->route['url'], 'pages::academy')->name('academy');

Route::livewire($pricingPageSettings->route['url'], 'pages::pricing')->name('pricing');

Route::livewire('/courses', 'pages::courses.index')->name('courses.index');

Route::livewire('/courses/{course}', 'pages::courses.view')->name('courses.view');

Route::livewire('/videos/{video}', 'pages::videos.view')->middleware(
    [
        // EnsureModeratorIsApproved::class,
        CheckVideoAccess::class
    ]
)->name('videos.view');

Route::livewire('/objectives/{objective}', 'pages::objectives.view')->name('objectives.view');

Route::livewire('/videos/{video}/locked/guest', 'pages::videos.locked-guest')->name('videos.locked.guest');

Route::livewire('/videos/{video}/locked/member', 'pages::videos.locked-member')->name('videos.locked.member');
