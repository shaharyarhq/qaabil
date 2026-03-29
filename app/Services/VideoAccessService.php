<?php

namespace App\Services;

use App\Models\Video;
use App\Models\VideoView;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class VideoAccessService
{
    const GUEST_SESSION_KEY = 'watched_video_ids';
    const FREE_LIMIT = 1;

    /**
     * Did the current member upload at least one video this calendar month?
     */
    public function memberUploadedThisMonth(): bool
    {
        if (! Auth::check()) {
            return false;
        }

        return Auth::user()
            ->videos()
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->exists();
    }

    /**
     * How many unique videos has the member watched total?
     */
    public function memberWatchedCount(): int
    {
        return VideoView::where('user_id', Auth::id())->count();
    }
}