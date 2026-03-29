<?php

use App\Models\Objective;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;

new class extends Component
{
    public Objective $objective;

    #[Url]
    public string $search = '';
    #[Url]
    public string $sort = 'newest';
    #[Url]
    public string $language = '';
    #[Url]
    public string $focus = '';
    #[Url]
    public string $creator = '';

    public function mount(Objective $objective): void
    {
        $objective->load(['chapter.section.course']);
        $this->objective = $objective;
    }


    public function resetAll(): void
    {
        $this->search   = '';
        $this->sort     = 'newest';
        $this->language = '';
        $this->focus    = '';
        $this->creator  = '';
    }

    #[Computed]
    public function availableCreators()
    {
        return $this->objective->videos()
            ->with('creator')
            ->get()
            ->pluck('creator')
            ->filter()
            ->unique('id')
            ->sortBy('name')
            ->values();
    }

    #[Computed]
    public function availableLanguages()
    {
        return array_keys(config('app.languages'));
    }

    #[Computed]
    public function videos()
    {
        $query = $this->objective->videos()->with(['creator', 'reviews.ratings']);

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                    ->orWhereHas('creator', fn($q) => $q->where('name', 'like', '%' . $this->search . '%'));
            });
        }

        if ($this->language) {
            $query->where('language', $this->language);
        }

        if ($this->focus) {
            $query->where('focus_of_the_video', $this->focus);
        }

        if ($this->creator) {
            $query->where('created_by', $this->creator);
        }

        if (in_array($this->sort, ['rating-high', 'rating-low'])) {
            $query->leftJoinSub(
                DB::table('ratings')
                    ->join('reviews', 'ratings.review_id', '=', 'reviews.id')
                    ->where('reviews.reviewable_type', \App\Models\Video::class)
                    ->where('ratings.key', 'overall')
                    ->select('reviews.reviewable_id', DB::raw('AVG(ratings.value) as avg_rating'))
                    ->groupBy('reviews.reviewable_id'),
                'avg_ratings',
                'avg_ratings.reviewable_id',
                '=',
                'videos.id'
            )
                ->orderBy('avg_rating', $this->sort === 'rating-high' ? 'desc' : 'asc')
                ->select('videos.*');
        } else {
            match ($this->sort) {
                'title-asc'  => $query->orderBy('title'),
                'title-desc' => $query->orderByDesc('title'),
                'oldest'     => $query->oldest(),
                default      => $query->latest(),
            };
        }

        return $query->get();
    }
};
