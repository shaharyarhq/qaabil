<?php

use App\Models\Video;
use Livewire\Component;

new class extends Component
{
    public Video $video;

    public function mount(Video $video)
    {
        $video->load([
            'course',
            'chapter',
            'section',
            'chapter.section',
            'objective',
            'objective.videos' => function ($query) {
                $query->whereNotNull('video_url')->where('status', 'approved');
            },
            'approver',
        ]);

        $this->video = $video;
    }
};
