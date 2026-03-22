<?php

use App\Models\Course;
use Livewire\Component;

new class extends Component
{
    public Course $course;

    public function mount(Course $course)
    {
        $course
            ->loadCount(['sections', 'chapters', 'videos'])
            ->load([
                'sections',
                'sections.chapters',
                'sections.chapters.objectives',
                'sections.chapters.objectives.videos' => function ($query) {
                    $query->whereNotNull('video_url')->where('status', 'approved');
                },
            ]);

        $this->course = $course;
    }
};
