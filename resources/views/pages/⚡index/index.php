<?php

use App\Models\Course;
use Livewire\Component;

new class extends Component
{
    public $courses;

    public function mount()
    {
        $this->courses = Course::withCount(['sections', 'chapters', 'videos'])->get();
    }
};
