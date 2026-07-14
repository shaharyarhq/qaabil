<?php

use App\Http\Middleware\CheckVideoAccess;
use App\Settings\AcademyPageSettings;
use App\Settings\ContactPageSettings;
use App\Settings\HomePageSettings;
use App\Settings\PricingPageSettings;
use Illuminate\Support\Facades\Route;

Route::livewire(getHomePageSettings()->route['url'], 'pages::index')->name('home');

Route::livewire(getContactPageSettings()->route['url'], 'pages::contact')->name('contact');

// Route::livewire('/about', 'pages::about')->name('about');

Route::livewire(getPrivacyPolicyPageSettings()->route['url'], 'pages::privacy-policy')->name('policy');

Route::livewire(getTermsAndConditionsPageSettings()->route['url'], 'pages::terms-and-conditions')->name('terms');

Route::livewire(getAcademyPageSettings()->route['url'], 'pages::academy')->name('academy');

Route::livewire(getPricingPageSettings()->route['url'], 'pages::pricing')->name('pricing');

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
