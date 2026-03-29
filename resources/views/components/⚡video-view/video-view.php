<?php

use App\Models\Video;
use App\Services\VideoAccessService;
use Livewire\Component;

new class extends Component
{
    public Video $video;

    // Access state: 'allowed' | 'guest_locked' | 'member_locked'
    public string $accessState = 'allowed';

    public function mount(Video $video, VideoAccessService $service): void
    {
        $this->video = $video;

        $this->accessState = $service->checkAccess($video);

        // Only record the view if access is granted
        if ($this->accessState === 'allowed') {
            $service->recordView($video);
        }
    }
};
