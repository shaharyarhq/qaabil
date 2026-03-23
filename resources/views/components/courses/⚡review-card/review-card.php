<?php

use App\Models\Video;
use Codebyray\ReviewRateable\Models\Review;
use Livewire\Component;

new class extends Component
{
    public Video $video;

    public $reviews;

    public function deleteReview(Review $review)
    {
        $this->video->deleteReview($review->id);
    }

    public function updateReview()
    {
    }

    public function mount(){
        $this->reviews = $this->video->getReviews(false)->load(['user', 'ratings']);
    }
};
