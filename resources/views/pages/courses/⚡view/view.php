<?php

use App\Models\Course;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
new class extends Component
{
    public Course $course;

    #[Url]
    public string $language = '';
    
    #[Computed]
    public function availableLanguages()
    {
        return array_keys(config('app.languages'));
    }

    public function mount(Course $course)
    {
        $course
            ->loadCount(['sections', 'chapters', 'videos', 'objectives'])
            ->load([
                'sections',
                'sections.chapters',
                'sections.chapters.objectives',
                'sections.chapters.objectives.videos.reviews.ratings',
                'sections.chapters.objectives.videos' => function ($query) {
                    $query->whereNotNull('video_url')->where('status', 'approved');
                },
            ]);



        $this->course = $course;
    }
};
