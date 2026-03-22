<?php

use App\Models\Objective;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;

new class extends Component
{
    public Objective $objective;

    #[Url]
    public string $search = '';

    public string $sort = 'newest';

    public function mount(Objective $objective): void
    {
        $objective->load(['chapter.section.course']);
        $this->objective = $objective;
    }

    #[Computed]
    public function videos()
    {
        $query = $this->objective->videos()->with('creator');

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%'.$this->search.'%')
                    ->orWhereHas('creator', fn ($q) => $q->where('name', 'like', '%'.$this->search.'%'));
            });
        }

        match ($this->sort) {
            'title-asc' => $query->orderBy('title'),
            'title-desc' => $query->orderByDesc('title'),
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
};
