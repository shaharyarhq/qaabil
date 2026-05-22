<?php

use App\Models\Course;
use App\Models\UserObjectiveProgress;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Renderless;
use Livewire\Attributes\Url;
use Livewire\Component;

new class extends Component
{
    public Course $course;

    #[Url]
    public string $language = '';

    public array $objectiveProgress = [];

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

        $objectiveIds = $this->course->sections
            ->flatMap(fn($s) => $s->chapters)
            ->flatMap(fn($c) => $c->objectives)
            ->pluck('id');

        $this->objectiveProgress = Auth::check()
            ? UserObjectiveProgress::query()
            ->where('user_id',  Auth::user()->id)
            ->whereIn('objective_id', $objectiveIds)
            ->pluck('status', 'objective_id')
            ->toArray()
            : [];
    }

    #[Renderless]
    public function setObjectiveProgress(int $objectiveId, ?string $status): void
    {
        // Guard — should never be called by guests but defence in depth
        if (! Auth::check()) {
            return;
        }

        if ($status === null) {
            UserObjectiveProgress::where('user_id', Auth::id())
                ->where('objective_id', $objectiveId)
                ->delete();
            return;
        }

        UserObjectiveProgress::updateOrCreate(
            ['user_id' => Auth::id(), 'objective_id' => $objectiveId],
            ['status'  => $status]
        );
    }
};
