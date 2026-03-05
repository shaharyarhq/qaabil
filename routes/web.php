<?php

use App\Models\Course;
use App\Models\Objective;
use App\Models\Video;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $courses = Course::withCount(['chapters', 'objectives', 'videos'])->get();

    return view('courses.abc', compact('courses'));
});

Route::get('/courses', function () {
    $courses = Course::withCount(['chapters', 'objectives', 'videos'])->get();

    return view('courses.index', compact('courses'));
})->name('courses.index');

Route::get('/courses/{course}', function (Course $course) {
    $course->loadCount(['chapters', 'objectives', 'videos' => function ($query) {
        $query->whereNotNull('video_url');
    }])->load([
        'chapters',
        'chapters.objectives',
        'chapters.objectives.videos' => function ($query) {
            $query->whereNotNull('video_url');
        }
    ]);

    return view('courses.view', compact('course'));
})->name('courses.view');

Route::get('video/{video}', function (Video $video) {
    $video->load([
        'course',
        'chapter',
        'objective',
        'objective.videos',
        'approver'
    ]);

    return view('videos.view', compact('video'));
})->name('video.view');


Route::get('objectives/{objective}', function (Objective $objective) {
    $objective->load([
        'chapter.course',
        'videos.creator',
    ]);
    return view('objectives.view', compact('objective'));
})->name('objective.view');
