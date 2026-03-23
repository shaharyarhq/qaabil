<?php

use App\Models\Video;
use Codebyray\ReviewRateable\Models\Review;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

new class extends Component
{
    public string $reviewText = '';

    public int $rating = 0;

    public Video $video;

    public function submitReview()
    {
        if (!Auth::check()) {
            $this->addError('auth', 'You must be logged in to submit a review.');
            return;
        }

        $this->validate([
            'rating'     => 'required|integer|min:1|max:5',
            'reviewText' => 'nullable|string|max:1000',
        ], [
            'rating.required' => 'Please pick a star rating before submitting.'
        ]);

        $this->video->addReview([
            'review'  => $this->reviewText,
            'ratings' => [
                'overall' => $this->rating,
            ],
        ], Auth::user()->id);

        $this->refresh();
    }

    public function refresh(){
        $this->reviewText = '';
        $this->rating = 0;
    }

    public function deleteReview(Review $review){
        $this->video->deleteReview($review->id);
    }

    public function mount(Video $video)
    {
        $this->video = $video;
    }
};
