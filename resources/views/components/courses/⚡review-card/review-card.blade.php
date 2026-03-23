<div>

    @forelse ($reviews as $review)
        @php
            $user = $review->user;
            $rating = optional($review->ratings->first())->value ?? 0;
            $isAuthor = auth()->check() && auth()->id() === $review->user_id;
        @endphp
        <div wire:keu="{{ $review->id }}" class="bg-white border border-[#e2e8f0] rounded-2xl p-5" x-data="{ isEditing: false }">
            <div class="flex items-start justify-between gap-3">

                <div class="flex items-center gap-3">
                    {{-- Avatar --}}
                    <div
                        class="w-9 h-9 rounded-full overflow-hidden flex items-center justify-center shrink-0 font-bold text-sm text-white bg-[#1b3a6b]">
                        @if ($user && $user->getFilamentAvatarUrl())
                            <img src="{{ $user->getFilamentAvatarUrl() }}" alt="{{ $user->name }}"
                                class="w-full h-full object-cover">
                        @else
                            {{ $user ? strtoupper(substr($user->name, 0, 1)) : '?' }}
                        @endif
                    </div>

                    <div>
                        <p class="text-[.85rem] font-bold text-[#0f172a]">
                            {{ $user->name ?? 'Unknown User' }}
                        </p>

                        <p class="text-[.7rem] text-[#94a3b8]">
                            {{ $review->created_at->diffForHumans() }}
                        </p>
                    </div>
                </div>

                {{-- Stars --}}
                <div class="flex items-center gap-0.5 shrink-0">
                    @for ($s = 1; $s <= 5; $s++)
                        <svg width="13" height="13" viewBox="0 0 20 20"
                            fill="{{ $s <= $rating ? '#f59e0b' : '#e2e8f0' }}">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    @endfor
                </div>

            </div>

            {{-- Review body --}}
            @if (!empty($review->review))
                <p x-show="!isEditing" class="text-sm text-[#475569] leading-relaxed mt-3">
                    {{ $review->review }}
                </p>
                <div x-show="isEditing" class="rounded-2xl mb-5 py-2" x-data="{ hovered: 0, rating: {{ $rating ?? 0 }} }">

                    {{-- Star picker --}}
                    <div class="flex items-center gap-1 mb-1" @mouseleave="hovered = 0">
                        @for ($s = 1; $s <= 5; $s++)
                            <button type="button" @click="rating = {{ $s }}"
                                @mouseenter="hovered = {{ $s }}"
                                class="transition-transform hover:scale-110 focus:outline-none">
                                <svg width="30" height="30" viewBox="0 0 20 20"
                                    :fill="(hovered || rating) >= {{ $s }} ? '#f59e0b' : '#e2e8f0'"
                                    class="transition-colors duration-100">
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

                    {{-- Text review --}}
                    <input wire:model='editedReviewText' type="text" rows="3" placeholder="Edit Review"
                        value="{{ $review->review }}"
                        class="w-full mt-3 text-sm text-[#0f172a] placeholder-[#cbd5e1] bg-[#f8fafd] border border-[#e2e8f0] rounded-xl px-4 py-3 transition-all focus:outline-none focus:border-[rgba(27,58,107,.4)] focus:shadow-[0_0_0_3px_rgba(27,58,107,.08)] mb-4" />
                </div>
            @endif

            {{-- Controls --}}
            @if ($isAuthor)
                <div class="flex items-center gap-3 mt-3 pt-3 border-t border-[#f1f5f9]">
                    <button @click="isEditing = !isEditing"
                        class="text-[.75rem] font-bold text-[#1b3a6b] hover:text-[#d97706] transition-colors"
                        x-text="isEditing ? 'Cancel' : 'Edit'">
                    </button>

                    <button x-show="isEditing" wire:click='updateReview({{ $review->id }})'
                        class="text-[.75rem] font-bold text-[#1b3a6b] hover:text-[#d97706] transition-colors">
                        Save
                    </button>

                    <span class="text-[#e2e8f0]">·</span>

                    <button wire:click='deleteReview({{ $review->id }})'
                        class="text-[.75rem] font-bold text-[#94a3b8] hover:text-red-500 transition-colors">
                        Delete
                    </button>
                </div>
            @endif
        </div>
    @empty
        No Reviews yes , be the first to review
    @endforelse

</div>
