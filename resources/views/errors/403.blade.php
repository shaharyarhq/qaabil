<x-layouts.app>
    {{-- Body --}}
    <div class="flex-1 flex items-center justify-center px-6 py-16 relative overflow-hidden min-h-[80vh]">

        {{-- Background ghost number --}}
        <div
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-[20rem] font-black text-[#1b3a6b]/5 leading-none select-none tracking-[-10px] pointer-events-none">
            403
        </div>

        <div class="relative z-10 text-center max-w-105">

            {{-- Badge --}}
            <div
                class="inline-flex items-center gap-1.5 bg-[#f59e0b]/10 border border-[#f59e0b]/30 text-[#f59e0b] text-[11px] font-extrabold uppercase tracking-[.08em] px-3 py-1 rounded-full mb-6">
                <span class="w-1.5 h-1.5 rounded-full bg-[#f59e0b]"></span>
                Access Denied
            </div>

            {{-- Code --}}
            <div class="text-[5rem] font-black text-[#1b3a6b] leading-none mb-2">
                4<span class="text-[#f59e0b]">0</span>3
            </div>

            {{-- Title --}}
            <h1 class="text-[1.4rem] font-bold text-[#0f172a] mb-3">
                You're not allowed in here.
            </h1>

            {{-- Description --}}
            <p class="text-sm text-[#64748b] leading-[1.75] mb-6">
                {{ $exception->getMessage() ?: 'Forbidden' }}
            </p>

            {{-- Divider --}}
            <div class="w-10 h-0.5 bg-[#f59e0b]/30 rounded mx-auto mb-6"></div>

            {{-- Actions --}}
            <div class="flex items-center justify-center gap-3 flex-wrap">
                <a href="{{ route('home') }}"
                    class="inline-flex items-center gap-1.5 bg-[#1b3a6b]/[0.07] hover:bg-[#1b3a6b]/[0.12] text-[#1b3a6b]/70 text-sm font-semibold px-6 py-2.5 rounded-xl border border-[#1b3a6b]/10 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Back home
                </a>
            </div>

        </div>
    </div>
</x-layouts.app>
