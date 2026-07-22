<?php

use App\Models\Course;
use App\Models\Qualification;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;

new class extends Component
{
    #[Url]
    public string $search = '';

    #[Url]
    public string $sort = 'newest';

    #[Url]
    public string $qualification = '';

    #[Computed]
    public function qualifications()
    {
        return Qualification::withCount('courses')->orderBy('name')->get();
    }

    #[Computed]
    public function courses()
    {
        $query = getCourseQuery()->withCount(['sections', 'chapters', 'videos']);

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->qualification) {
            $query->where('qualification_id', $this->qualification);
        }

        match ($this->sort) {
            'name-asc' => $query->orderBy('name'),
            'name-desc' => $query->orderByDesc('name'),
            'oldest' => $query->oldest(),
            default => $query->latest(),
        };

        return $query->get();
    }

    public function resetAll(): void
    {
        $this->search = '';
        $this->sort = 'newest';
        $this->qualification = '';
    }

    public function mount() {}
};
