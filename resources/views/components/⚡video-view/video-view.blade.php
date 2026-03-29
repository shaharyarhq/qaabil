<div class="relative min-h-screen bg-gray-950">

    {{-- ===================== ALLOWED: show the video ===================== --}}
    @if ($accessState === 'allowed')
        <div class="mx-auto max-w-5xl px-4 py-10">

            {{-- Video player --}}
            <div class="overflow-hidden rounded-2xl shadow-2xl aspect-video bg-black">
                <iframe
                    src="{{ $video->video_url }}"
                    class="h-full w-full"
                    allowfullscreen
                ></iframe>
            </div>

            {{-- Meta --}}
            <div class="mt-6 space-y-2">
                <h1 class="text-2xl font-bold text-white">{{ $video->title }}</h1>
                @if ($video->description)
                    <p class="text-gray-400">{{ $video->description }}</p>
                @endif
            </div>

        </div>

    {{-- =================== GUEST LOCKED ================================= --}}
    @elseif ($accessState === 'guest_locked')
        <div class="flex min-h-screen items-center justify-center px-4">

            {{-- Blurred fake player in background --}}
            <div class="pointer-events-none absolute inset-0 overflow-hidden">
                <div class="h-full w-full bg-gradient-to-br from-gray-900 via-gray-800 to-gray-950 opacity-60 blur-sm"></div>
            </div>

            {{-- Overlay card --}}
            <div class="relative z-10 w-full max-w-md rounded-3xl border border-white/10 bg-gray-900/90 p-8 shadow-2xl backdrop-blur-md text-center">

                {{-- Lock icon --}}
                <div class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-full bg-indigo-500/20 ring-1 ring-indigo-400/30">
                    <svg class="h-8 w-8 text-indigo-400" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
                    </svg>
                </div>

                <h2 class="text-2xl font-bold text-white">You've used your free video</h2>
                <p class="mt-3 text-gray-400 text-sm leading-relaxed">
                    Create a free account to keep watching — or log in if you already have one.
                </p>

                <div class="mt-8 flex flex-col gap-3">
                    <a href="{{ route('filament.member.auth.register') }}"
                       class="w-full rounded-xl bg-indigo-600 px-6 py-3 text-sm font-semibold text-white shadow-lg hover:bg-indigo-500 transition-colors">
                        Create free account
                    </a>
                    <a href="{{ route('filament.member.auth.login') }}"
                       class="w-full rounded-xl border border-white/10 px-6 py-3 text-sm font-semibold text-gray-300 hover:bg-white/5 transition-colors">
                        Log in
                    </a>
                </div>

                <p class="mt-6 text-xs text-gray-600">
                    You watched <strong class="text-gray-400">{{ $video->title }}</strong> as your free preview.
                </p>
            </div>
        </div>

    {{-- =================== MEMBER LOCKED ================================ --}}
    @elseif ($accessState === 'member_locked')
        <div class="flex min-h-screen items-center justify-center px-4">

            {{-- Blurred bg --}}
            <div class="pointer-events-none absolute inset-0 overflow-hidden">
                <div class="h-full w-full bg-gradient-to-br from-gray-900 via-gray-800 to-gray-950 opacity-60 blur-sm"></div>
            </div>

            {{-- Overlay card --}}
            <div class="relative z-10 w-full max-w-lg rounded-3xl border border-white/10 bg-gray-900/90 p-8 shadow-2xl backdrop-blur-md text-center">

                {{-- Lock icon --}}
                <div class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-full bg-amber-500/20 ring-1 ring-amber-400/30">
                    <svg class="h-8 w-8 text-amber-400" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
                    </svg>
                </div>

                <h2 class="text-2xl font-bold text-white">Unlock unlimited access</h2>
                <p class="mt-3 text-gray-400 text-sm leading-relaxed">
                    You've used your free watch. Choose one of the options below to keep watching.
                </p>

                {{-- Two options --}}
                <div class="mt-8 grid grid-cols-1 gap-4 sm:grid-cols-2">

                    {{-- Option 1: Upload --}}
                    <a href="{{ route('filament.member.pages.upload-video') }}"
                       class="group flex flex-col items-center gap-3 rounded-2xl border border-indigo-500/30 bg-indigo-500/10 p-6 text-center hover:border-indigo-400/60 hover:bg-indigo-500/20 transition-all">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-indigo-500/20 group-hover:bg-indigo-500/30 transition-colors">
                            <svg class="h-6 w-6 text-indigo-400" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-white">Upload a Video</p>
                            <p class="mt-1 text-xs text-gray-400">Contribute to the platform and get full access — free.</p>
                        </div>
                        <span class="mt-auto inline-block rounded-full bg-indigo-600 px-4 py-1 text-xs font-medium text-white">
                            Free
                        </span>
                    </a>

                    {{-- Option 2: Pay --}}
                    <a href="{{ route('pricing') }}"
                       class="group flex flex-col items-center gap-3 rounded-2xl border border-amber-500/30 bg-amber-500/10 p-6 text-center hover:border-amber-400/60 hover:bg-amber-500/20 transition-all">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-amber-500/20 group-hover:bg-amber-500/30 transition-colors">
                            <svg class="h-6 w-6 text-amber-400" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-white">Subscribe</p>
                            <p class="mt-1 text-xs text-gray-400">Get instant unlimited access with a subscription.</p>
                        </div>
                        <span class="mt-auto inline-block rounded-full bg-amber-500 px-4 py-1 text-xs font-medium text-gray-900 font-semibold">
                            Premium
                        </span>
                    </a>

                </div>

                <p class="mt-6 text-xs text-gray-600">
                    Trying to watch: <strong class="text-gray-400">{{ $video->title }}</strong>
                </p>
            </div>
        </div>
    @endif

</div>