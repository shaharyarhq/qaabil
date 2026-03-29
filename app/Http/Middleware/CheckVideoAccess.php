<?php

namespace App\Http\Middleware;

use App\Models\VideoView;
use App\Services\VideoAccessService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckVideoAccess
{
    public function __construct(protected VideoAccessService $service) {}

    public function handle(Request $request, Closure $next): Response
    {
        $video = $request->route('video');

        if (! $video instanceof \App\Models\Video) {
            $video = \App\Models\Video::findOrFail($video);
        }

        // ── GUEST ────────────────────────────────────────────────────────
        if (! Auth::check()) {
            $watched = $request->session()->get(VideoAccessService::GUEST_SESSION_KEY, []);

            // Within free limit → record + allow
            if (count($watched) < VideoAccessService::FREE_LIMIT) {
                if (! in_array($video->id, $watched)) {
                    $watched[] = $video->id;
                    $request->session()->put(VideoAccessService::GUEST_SESSION_KEY, $watched);
                }
                return $next($request);
            }

            // Limit hit (even if same video)
            $request->session()->put('url.intended', $request->url());
            return redirect()->route('videos.locked.guest', ['video' => $video->id]);
        }

        // ── MEMBER ───────────────────────────────────────────────────────

        // Uploaded a video this month → full unlimited access
        if ($this->service->memberUploadedThisMonth()) {
            return $next($request);
        }

        // TODO: check subscription status here when you add payments
        // if (Auth::user()->subscribed()) { return $next($request); }

        // Within free limit → record + allow (no re-watch exemption)
        $watchedCount = VideoView::where('user_id', Auth::id())->count();

        if ($watchedCount < VideoAccessService::FREE_LIMIT) {
            VideoView::firstOrCreate(
                ['user_id' => Auth::id(), 'video_id' => $video->id],
                ['watched_at' => now()]
            );
            return $next($request);
        }

        // Limit hit
        return redirect()->route('videos.locked.member', ['video' => $video->id]);
    }
}