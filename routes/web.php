<?php

use App\Models\Course;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $courses = Course::withCount('chapters')->get();

    return view('courses.index', compact('courses'));
});
