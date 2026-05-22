<!-- ── Nav ───────────────────────────────────── -->
<nav class="bg-white border-b border-[#e2e8f0] sticky top-0 z-50" x-data="{ open: false }">

    @php
        $links = [
            ['route' => 'home',          'label' => 'Home'],
            ['route' => 'courses.index', 'label' => 'Courses',    'pattern' => 'courses.*'],
            ['route' => 'pricing',       'label' => 'Get Access'],
            ['route' => 'contact',       'label' => 'Contact'],
            ['route' => 'academy',       'label' => 'Academy'],
            ['route' => 'about',         'label' => 'Why Qaabil'],
        ];

        $authHomeUrl = null;
        if (auth()->check()) {
            $authHomeUrl = match (true) {
                auth()->user()->isSuperAdmin() => filament()->getPanel('admin')->getUrl(),
                auth()->user()->isModerator()  => filament()->getPanel('moderator')->getUrl(),
                auth()->user()->isStudent()    => filament()->getPanel('member')->getUrl(),
                default                        => '/',
            };
        }
    @endphp

    {{-- ── Main row ── --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2 flex items-center justify-between gap-2">

        {{-- Logo --}}
        <a {{ spa() }} href="/" class="shrink-0">
            <img src="{{ asset('/images/logo/qaabil.jpeg') }}" alt="Qaabil"
                class="h-10 sm:h-12 lg:h-14 w-auto object-contain">
        </a>

        {{-- Desktop nav links — lg and above only --}}
        <div class="hidden lg:flex items-center gap-1 flex-1 justify-center">
            @foreach ($links as $link)
                @php
                    $pattern = $link['pattern'] ?? $link['route'];
                    $active  = request()->routeIs($pattern);
                @endphp
                <a {{ spa() }} href="{{ route($link['route']) }}"
                    class="text-[.95rem] font-semibold px-4 py-[.6rem] rounded-lg no-underline transition-colors whitespace-nowrap
                           {{ $active ? 'bg-[#eff6ff] text-[#1b3a6b]' : 'text-[#475569] hover:bg-[#eff6ff] hover:text-[#1b3a6b]' }}">
                    {{ $link['label'] }}
                </a>
            @endforeach
        </div>

        {{-- Tablet nav links — md only (768px–1023px), tighter --}}
        <div class="hidden md:flex lg:hidden items-center gap-0.5 flex-1 justify-center">
            @foreach ($links as $link)
                @php
                    $pattern = $link['pattern'] ?? $link['route'];
                    $active  = request()->routeIs($pattern);
                @endphp
                <a {{ spa() }} href="{{ route($link['route']) }}"
                    class="text-[.78rem] font-semibold px-2 py-2 rounded-lg no-underline transition-colors whitespace-nowrap
                           {{ $active ? 'bg-[#eff6ff] text-[#1b3a6b]' : 'text-[#475569] hover:bg-[#eff6ff] hover:text-[#1b3a6b]' }}">
                    {{ $link['label'] }}
                </a>
            @endforeach
        </div>

        {{-- Right side: auth buttons + hamburger --}}
        <div class="flex items-center gap-2 shrink-0">

            @auth

                {{-- Desktop: avatar + Dashboard text --}}
                <a href="{{ $authHomeUrl }}"
                    class="hidden lg:inline-flex items-center gap-2 text-[.925rem] font-semibold text-[#475569]
                           border-[1.5px] border-[#e2e8f0] rounded-[10px] px-[1.4rem] py-[.65rem]
                           transition-all hover:border-[#1b3a6b] hover:text-[#1b3a6b]">
                    <img class="w-9 h-9 rounded-full object-cover border border-[#e2e8f0]"
                        src="{{ auth()->user()->getFilamentAvatarUrl() }}" alt="avatar">
                    <span class="leading-none">Dashboard</span>
                </a>

                {{-- Tablet: avatar only --}}
                <a href="{{ $authHomeUrl }}"
                    class="hidden md:inline-flex lg:hidden items-center
                           border-[1.5px] border-[#e2e8f0] rounded-[10px] p-[.4rem]
                           transition-all hover:border-[#1b3a6b]">
                    <img class="w-7 h-7 rounded-full object-cover border border-[#e2e8f0]"
                        src="{{ auth()->user()->getFilamentAvatarUrl() }}" alt="avatar">
                </a>

            @else

                {{-- Log in button — desktop full, tablet compact --}}
                <a href="{{ filament()->getPanel('member')->getLoginUrl() }}?redirectTo={{ url()->current() }}"
                    class="hidden md:inline-block font-semibold text-[#475569]
                           border-[1.5px] border-[#e2e8f0] rounded-[10px]
                           text-[.78rem] md:px-3 md:py-2 lg:text-[.925rem] lg:px-[1.4rem] lg:py-[.65rem]
                           transition-all hover:border-[#1b3a6b] hover:text-[#1b3a6b] whitespace-nowrap">
                    Log in
                </a>

                {{-- Sign up button — desktop full, tablet compact --}}
                <a href="{{ filament()->getPanel('member')->getRegistrationUrl() }}?redirectTo={{ url()->current() }}"
                    class="hidden md:inline-block font-bold text-white bg-[#1b3a6b]
                           border-[1.5px] border-[#1b3a6b] rounded-[10px]
                           text-[.78rem] md:px-3 md:py-2 lg:text-[.925rem] lg:px-6 lg:py-[.65rem]
                           transition-colors hover:bg-[#122952] whitespace-nowrap">
                    <span class="hidden lg:inline">Sign up free</span>
                    <span class="lg:hidden">Sign up</span>
                </a>

            @endauth

            {{-- Hamburger — mobile only --}}
            <button @click="open = !open"
                class="md:hidden flex flex-col justify-center items-center w-10 h-10
                       rounded-lg border border-[#e2e8f0] bg-white
                       transition-colors hover:border-[#1b3a6b] hover:bg-[#eff6ff]"
                aria-label="Toggle menu">
                <span class="block w-5 h-[1.5px] bg-[#475569] transition-all duration-200 rounded"
                    :class="open ? 'rotate-45 translate-y-1.25' : ''"></span>
                <span class="block w-5 h-[1.5px] bg-[#475569] transition-all duration-200 rounded my-[3.5px]"
                    :class="open ? 'opacity-0' : ''"></span>
                <span class="block w-5 h-[1.5px] bg-[#475569] transition-all duration-200 rounded"
                    :class="open ? '-rotate-45 -translate-y-1.25' : ''"></span>
            </button>
        </div>
    </div>

    {{-- ── Mobile dropdown (< 768px only) ── --}}
    <div x-show="open"
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        @click.outside="open = false"
        class="md:hidden border-t border-[#e2e8f0] bg-white px-4 pb-4 pt-3"
        style="display:none">

        <div class="flex flex-col gap-1">
            @foreach ($links as $link)
                @php
                    $pattern = $link['pattern'] ?? $link['route'];
                    $active  = request()->routeIs($pattern);
                @endphp
                <a {{ spa() }} href="{{ route($link['route']) }}" @click="open = false"
                    class="text-[1rem] font-semibold px-4 py-3.5 rounded-lg no-underline transition-colors
                           {{ $active ? 'bg-[#eff6ff] text-[#1b3a6b]' : 'text-[#475569] hover:bg-[#eff6ff] hover:text-[#1b3a6b]' }}">
                    {{ $link['label'] }}
                </a>
            @endforeach
        </div>

        <div class="mt-3 pt-3 border-t border-[#e2e8f0] flex flex-col gap-2">
            @auth
                <a href="{{ $authHomeUrl }}"
                    class="text-[1rem] font-semibold text-center text-[#475569]
                           border-[1.5px] border-[#e2e8f0] rounded-[10px] px-4 py-3.5
                           transition-all hover:border-[#1b3a6b] hover:text-[#1b3a6b]">
                    Dashboard
                </a>
            @else
                <a href="{{ filament()->getPanel('member')->getLoginUrl() }}?redirectTo={{ url()->current() }}"
                    class="text-[1rem] font-semibold text-center text-[#475569]
                           border-[1.5px] border-[#e2e8f0] rounded-[10px] px-4 py-3.5
                           transition-all hover:border-[#1b3a6b] hover:text-[#1b3a6b]">
                    Log in
                </a>
                <a href="{{ filament()->getPanel('member')->getRegistrationUrl() }}?redirectTo={{ url()->current() }}"
                    class="text-[1rem] font-bold text-center text-white
                           bg-[#1b3a6b] border-[1.5px] border-[#1b3a6b] rounded-[10px] px-4 py-3.5
                           transition-colors hover:bg-[#122952]">
                    Sign up free
                </a>
            @endauth
        </div>
    </div>

</nav>