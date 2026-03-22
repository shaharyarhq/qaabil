<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::index')->name('home');

Route::livewire('/contact', 'pages::contact')->name('contact');

Route::livewire('/about', 'pages::about')->name('about');

Route::livewire('/pricing', 'pages::pricing')->name('pricing');

Route::livewire('/courses', 'pages::courses.index')->name('courses.index');

Route::livewire('/courses/{course}', 'pages::courses.view')->name('courses.view');

Route::livewire('/videos/{video}', 'pages::videos.view')->name('videos.view');

Route::livewire('/objectives/{objective}', 'pages::objectives.view')->name('objectives.view');
