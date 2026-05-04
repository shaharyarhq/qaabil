<?php

use App\Models\Course;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;

new class extends Component
{
    #[Url]
    public string $search = '';

    public string $sort = 'newest';

    #[Computed]
    public function courses()
    {
        $query = Course::withCount(['sections', 'chapters', 'videos'])->where('is_disabled', false);

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%'.$this->search.'%')
                    ->orWhere('description', 'like', '%'.$this->search.'%');
            });
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
    }

    public function mount() {}
};
