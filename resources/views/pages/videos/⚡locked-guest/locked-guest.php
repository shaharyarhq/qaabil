<?php

use App\Models\Video;
use Livewire\Component;

new class extends Component
{
    public Video $video;

    public function mount(Video $video): void
    {
        $this->video = $video;
    }
};
