{{-- review-tab.blade.php --}}
@php
    $reviews = $video->getReviews(false)->load(['user', 'ratings']);
    $total = $reviews->count();
    $avgRating = $total > 0 ? round($reviews->map(fn($r) => optional($r->ratings->first())->value ?? 0)->avg(), 1) : 0;
    $starCounts = collect([5, 4, 3, 2, 1])->mapWithKeys(
        fn($s) => [
            $s => $reviews->filter(fn($r) => (int) round(optional($r->ratings->first())->value ?? 0) === $s)->count(),
        ],
    );
@endphp

<section class="mt-5 sm:mt-6" x-data="{ hovered: 0, rating: 0 }">

    {{-- ── Section heading ── --}}
    <div class="flex items-center gap-2 mb-4 sm:mb-5">
        <span class="inline-block w-4 h-0.75 rounded-sm bg-[#f59e0b]"></span>
        <h2 class="text-[1rem] sm:text-[1.1rem] font-extrabold text-[#0f172a] tracking-tight">Reviews</h2>
        @if ($total > 0)
            <span class="text-[.72rem] font-bold text-[#94a3b8] ml-1">
                {{ $total }} {{ Str::plural('review', $total) }}
            </span>
        @endif
    </div>

    {{-- ── Rating summary ── --}}
    @if ($total > 0)
        <div class="bg-white border border-[#e2e8f0] rounded-2xl p-4 sm:p-5 mb-4 sm:mb-5 flex flex-col sm:flex-row items-center gap-5 sm:gap-6">

            {{-- Big average --}}
            <div class="text-center shrink-0">
                <div class="font-['Instrument_Serif',serif] text-[3rem] sm:text-[3.5rem] text-[#0f172a] leading-none">
                    {{ number_format($avgRating, 1) }}
                </div>
                <div class="flex items-center justify-center gap-0.5 mt-1.5">
                    @for ($s = 1; $s <= 5; $s++)
                        <svg width="14" height="14" viewBox="0 0 20 20"
                            fill="{{ $s <= round($avgRating) ? '#f59e0b' : '#e2e8f0' }}">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    @endfor
                </div>
                <p class="text-[.7rem] text-[#94a3b8] mt-1 font-medium">out of 5</p>
            </div>

            {{-- Breakdown bars --}}
            <div class="flex-1 w-full flex flex-col gap-1.5">
                @foreach ([5, 4, 3, 2, 1] as $star)
                    @php
                        $count = $starCounts[$star];
                        $pct = $total > 0 ? round(($count / $total) * 100) : 0;
                    @endphp
                    <div class="flex items-center gap-2">
                        <span
                            class="text-[.7rem] font-bold text-[#94a3b8] w-3 shrink-0 text-right">{{ $star }}</span>
                        <svg width="10" height="10" viewBox="0 0 20 20" fill="#f59e0b" class="shrink-0">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <div class="flex-1 h-1.5 rounded-full bg-[#f1f5f9] overflow-hidden">
                            <div class="h-full rounded-full bg-[#f59e0b] transition-all duration-500"
                                style="width:{{ $pct }}%"></div>
                        </div>
                        <span class="text-[.7rem] text-[#94a3b8] w-4 shrink-0">{{ $count }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    {{-- ── Write a review form ── --}}
    <div class="bg-white border border-[#e2e8f0] rounded-2xl p-4 sm:p-5 mb-4 sm:mb-5" x-data="{ hovered: 0, rating: @entangle('rating') }">
        <p class="text-[.72rem] font-extrabold uppercase tracking-[.08em] text-[#94a3b8] mb-3 sm:mb-4">Leave a review</p>

        {{-- Star picker --}}
        <div class="flex items-center gap-1 mb-1" @mouseleave="hovered = 0">
            @for ($s = 1; $s <= 5; $s++)
                <button type="button" @click="rating = {{ $s }}" @mouseenter="hovered = {{ $s }}"
                    class="transition-transform hover:scale-110 focus:outline-none">
                    <svg width="28" height="28" viewBox="0 0 20 20"
                        :fill="(hovered || rating) >= {{ $s }} ? '#f59e0b' : '#e2e8f0'"
                        class="transition-colors duration-100 sm:w-7.5 sm:h-7.5">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                </button>
            @endfor
            <span class="ml-2 text-[.8rem] font-semibold text-[#94a3b8] transition-all"
                x-text="['', 'Terrible', 'Poor', 'Average', 'Good', 'Excellent'][hovered || rating] ?? ''">
            </span>
        </div>

        @error('rating')
            <p class="text-red-500 text-xs mt-1 mb-2">{{ $message }}</p>
        @enderror
        @error('auth')
            <p class="text-red-500 text-xs mt-1 mb-2">{{ $message }}</p>
        @enderror

        <textarea wire:model='reviewText' rows="3" placeholder="Share your thoughts about this video (optional)…"
            class="w-full mt-3 text-sm text-[#0f172a] placeholder-[#cbd5e1] bg-[#f8fafd] border border-[#e2e8f0] rounded-xl px-3 sm:px-4 py-3 resize-none transition-all focus:outline-none focus:border-[rgba(27,58,107,.4)] focus:shadow-[0_0_0_3px_rgba(27,58,107,.08)] mb-3 sm:mb-4">
        </textarea>

        <button wire:click='submitReview' type="button"
            class="inline-flex items-center gap-2 px-4 sm:px-5 py-2.5 rounded-xl bg-[#1b3a6b] text-white text-[.82rem] font-bold transition-colors hover:bg-[#122952] data-loading:opacity-50 data-loading:pointer-events-none">
            Submit review
        </button>
    </div>

    {{-- ── Reviews list ── --}}
    <div class="flex flex-col gap-3">
        @forelse ($reviews as $review)
            @php
                $user = $review->user;
                $rating = optional($review->ratings->first())->value ?? 0;
                $isAuthor = auth()->check() && auth()->id() === $review->user_id;
            @endphp

            <div class="bg-white border border-[#e2e8f0] rounded-2xl p-4 sm:p-5" x-data="{ isEditing: false }">
                <div class="flex items-start justify-between gap-3">

                    <div class="flex items-center gap-2.5 sm:gap-3 min-w-0">
                        {{-- Avatar --}}
                        <div
                            class="w-8 sm:w-9 h-8 sm:h-9 rounded-full overflow-hidden flex items-center justify-center shrink-0 font-bold text-sm text-white bg-[#1b3a6b]">
                            @if ($user && $user->getFilamentAvatarUrl())
                                <img src="{{ $user->getFilamentAvatarUrl() }}" alt="{{ $user->name }}"
                                    class="w-full h-full object-cover">
                            @else
                                {{ $user ? strtoupper(substr($user->name, 0, 1)) : '?' }}
                            @endif
                        </div>
                        <div class="min-w-0">
                            <p class="text-[.85rem] font-bold text-[#0f172a] truncate">
                                {{ $user->name ?? 'Unknown User' }}
                                @if ($isAuthor)
                                    <span
                                        class="ml-1.5 text-[.6rem] font-extrabold uppercase tracking-[.06em] px-1.5 py-0.5 rounded bg-[#eff6ff] text-[#1b3a6b]">you</span>
                                @endif
                            </p>
                            <p class="text-[.7rem] text-[#94a3b8]">{{ $review->created_at->diffForHumans() }}</p>
                        </div>
                    </div>

                    {{-- Stars --}}
                    <div class="flex items-center gap-0.5 shrink-0">
                        @for ($s = 1; $s <= 5; $s++)
                            <svg width="12" height="12" viewBox="0 0 20 20"
                                fill="{{ $s <= $rating ? '#f59e0b' : '#e2e8f0' }}">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @endfor
                    </div>
                </div>

                @if (!empty($review->review))
                    <p class="text-sm text-[#475569] leading-relaxed mt-3">{{ $review->review }}</p>
                @endif

                @if ($isAuthor)
                    <div class="flex items-center gap-3 mt-3 pt-3 border-t border-[#f1f5f9]">
                        <button wire:click='deleteReview({{ $review->id }})' wire:confirm="Delete your review?"
                            class="data-loading:opacity-50 data-loading:pointer-events-none text-[.75rem] font-bold text-[#94a3b8] hover:text-red-500 transition-colors">
                            Delete
                        </button>
                    </div>
                @endif
            </div>
        @empty
            <div class="py-10 sm:py-12 text-center">
                <span class="font-['Instrument_Serif',serif] italic text-4xl text-[#f59e0b]/20 block mb-3">✦</span>
                <p class="font-['Instrument_Serif',serif] italic text-lg text-[#94a3b8] mb-1">No reviews yet</p>
                <p class="text-sm text-[#94a3b8]/70">Be the first to share your thoughts.</p>
            </div>
        @endforelse
    </div>

</section>
