<?php

use App\Models\Course;
use Livewire\Component;
use App\Models\Qualification;
use Illuminate\Database\Eloquent\Collection;

new class extends Component
{
    public Collection $courses;

    public Collection $qualifications;

    public function mount()
    {
        // $this->courses = getCourseQuery()->withCount(['sections', 'chapters', 'videos'])->get();
        $this->qualifications = getQualificationQuery()->withCount('courses')->get();
    }
};
