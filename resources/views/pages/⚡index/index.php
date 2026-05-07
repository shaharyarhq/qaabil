<?php

use Livewire\Component;

new class extends Component
{
    public $courses;

    public function mount()
    {
        $this->courses = getCourseQuery()->withCount(['sections', 'chapters', 'videos'])->get();
    }
};
