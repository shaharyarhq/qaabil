<!-- ── Nav ───────────────────────────────────── -->
<nav class="bg-white border-b border-[#e2e8f0] sticky top-0 z-50" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between gap-4">

        {{-- Logo --}}
        <a {{ spa() }} href="/" class="shrink-0">
            <img src="{{ asset('/images/logo/qaabil.jpeg') }}" alt="Qaabil" class="h-8 w-auto object-contain">
        </a>

        {{-- Desktop links --}}
        <div class="hidden md:flex items-center gap-1">
            <a {{ spa() }} href="{{ route('home') }}" @class([
                'text-[.85rem] font-semibold px-3 py-[.4rem] rounded-lg no-underline transition-colors',
                'bg-[#eff6ff] text-[#1b3a6b]'                            => request()->routeIs('home'),
                'text-[#475569] hover:bg-[#eff6ff] hover:text-[#1b3a6b]' => !request()->routeIs('home'),
            ])>Home</a>

            <a {{ spa() }} href="{{ route('courses.index') }}" @class([
                'text-[.85rem] font-semibold px-3 py-[.4rem] rounded-lg no-underline transition-colors',
                'bg-[#eff6ff] text-[#1b3a6b]'                            => request()->routeIs('courses.*'),
                'text-[#475569] hover:bg-[#eff6ff] hover:text-[#1b3a6b]' => !request()->routeIs('courses.*'),
            ])>Courses</a>

            <a {{ spa() }} href="{{ route('pricing') }}" @class([
                'text-[.85rem] font-semibold px-3 py-[.4rem] rounded-lg no-underline transition-colors',
                'bg-[#eff6ff] text-[#1b3a6b]'                            => request()->routeIs('pricing'),
                'text-[#475569] hover:bg-[#eff6ff] hover:text-[#1b3a6b]' => !request()->routeIs('pricing'),
            ])>Pricing</a>

            <a {{ spa() }} href="{{ route('contact') }}" @class([
                'text-[.85rem] font-semibold px-3 py-[.4rem] rounded-lg no-underline transition-colors',
                'bg-[#eff6ff] text-[#1b3a6b]'                            => request()->routeIs('contact'),
                'text-[#475569] hover:bg-[#eff6ff] hover:text-[#1b3a6b]' => !request()->routeIs('contact'),
            ])>Contact Us</a>

            <a {{ spa() }} href="{{ route('about') }}" @class([
                'text-[.85rem] font-semibold px-3 py-[.4rem] rounded-lg no-underline transition-colors',
                'bg-[#eff6ff] text-[#1b3a6b]'                            => request()->routeIs('about'),
                'text-[#475569] hover:bg-[#eff6ff] hover:text-[#1b3a6b]' => !request()->routeIs('about'),
            ])>Why Use Qaabil</a>
        </div>

        {{-- Right side --}}
        <div class="flex items-center gap-2">
            @auth
                @php
                    $homeUrl = match (true) {
                        auth()->user()->isSuperAdmin() => filament()->getPanel('admin')->getUrl(),
                        auth()->user()->isModerator()  => filament()->getPanel('moderator')->getUrl(),
                        auth()->user()->isStudent()    => filament()->getPanel('member')->getUrl(),
                        default                        => '/',
                    };
                @endphp
                <a href="{{ $homeUrl }}"
                    class="hidden sm:inline-block text-[.825rem] font-semibold text-[#475569] border-[1.5px] border-[#e2e8f0] rounded-[10px] px-[1.1rem] py-[.45rem] bg-transparent cursor-pointer transition-all hover:border-[#1b3a6b] hover:text-[#1b3a6b]">
                    Dashboard
                </a>
            @else
                <a href="{{ filament()->getPanel('member')->getLoginUrl() }}?redirectTo={{ url()->current() }}"
                    class="hidden sm:inline-block text-[.825rem] font-semibold text-[#475569] border-[1.5px] border-[#e2e8f0] rounded-[10px] px-[1.1rem] py-[.45rem] bg-transparent cursor-pointer transition-all hover:border-[#1b3a6b] hover:text-[#1b3a6b]">
                    Log in
                </a>
                <a href="{{ filament()->getPanel('member')->getRegistrationUrl() }}?redirectTo={{ url()->current() }}"
                    class="hidden sm:inline-block text-[.825rem] font-bold text-white bg-[#1b3a6b] border-[1.5px] border-[#1b3a6b] rounded-[10px] px-[1.2rem] py-[.45rem] cursor-pointer transition-colors hover:bg-[#122952]">
                    Sign up free
                </a>
            @endauth

            {{-- Hamburger (mobile only) --}}
            <button
                @click="open = !open"
                class="md:hidden flex flex-col justify-center items-center w-9 h-9 rounded-lg border border-[#e2e8f0] bg-white transition-colors hover:border-[#1b3a6b] hover:bg-[#eff6ff]"
                aria-label="Toggle menu"
            >
                <span class="block w-4 h-[1.5px] bg-[#475569] transition-all duration-200 rounded"
                    :class="open ? 'rotate-45 translate-y-[5px]' : ''"></span>
                <span class="block w-4 h-[1.5px] bg-[#475569] transition-all duration-200 rounded my-[3px]"
                    :class="open ? 'opacity-0' : ''"></span>
                <span class="block w-4 h-[1.5px] bg-[#475569] transition-all duration-200 rounded"
                    :class="open ? '-rotate-45 -translate-y-[5px]' : ''"></span>
            </button>
        </div>
    </div>

    {{-- Mobile dropdown --}}
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        @click.outside="open = false"
        class="md:hidden border-t border-[#e2e8f0] bg-white px-4 pb-4 pt-3"
        style="display:none"
    >
        <div class="flex flex-col gap-1">
            <a {{ spa() }} href="{{ route('home') }}" @click="open = false" @class([
                'text-[.9rem] font-semibold px-3 py-2.5 rounded-lg no-underline transition-colors',
                'bg-[#eff6ff] text-[#1b3a6b]'                            => request()->routeIs('home'),
                'text-[#475569] hover:bg-[#eff6ff] hover:text-[#1b3a6b]' => !request()->routeIs('home'),
            ])>Home</a>

            <a {{ spa() }} href="{{ route('courses.index') }}" @click="open = false" @class([
                'text-[.9rem] font-semibold px-3 py-2.5 rounded-lg no-underline transition-colors',
                'bg-[#eff6ff] text-[#1b3a6b]'                            => request()->routeIs('courses.*'),
                'text-[#475569] hover:bg-[#eff6ff] hover:text-[#1b3a6b]' => !request()->routeIs('courses.*'),
            ])>Courses</a>

            <a {{ spa() }} href="{{ route('pricing') }}" @click="open = false" @class([
                'text-[.9rem] font-semibold px-3 py-2.5 rounded-lg no-underline transition-colors',
                'bg-[#eff6ff] text-[#1b3a6b]'                            => request()->routeIs('pricing'),
                'text-[#475569] hover:bg-[#eff6ff] hover:text-[#1b3a6b]' => !request()->routeIs('pricing'),
            ])>Pricing</a>

            <a {{ spa() }} href="{{ route('contact') }}" @click="open = false" @class([
                'text-[.9rem] font-semibold px-3 py-2.5 rounded-lg no-underline transition-colors',
                'bg-[#eff6ff] text-[#1b3a6b]'                            => request()->routeIs('contact'),
                'text-[#475569] hover:bg-[#eff6ff] hover:text-[#1b3a6b]' => !request()->routeIs('contact'),
            ])>Contact Us</a>

            <a {{ spa() }} href="{{ route('about') }}" @click="open = false" @class([
                'text-[.9rem] font-semibold px-3 py-2.5 rounded-lg no-underline transition-colors',
                'bg-[#eff6ff] text-[#1b3a6b]'                            => request()->routeIs('about'),
                'text-[#475569] hover:bg-[#eff6ff] hover:text-[#1b3a6b]' => !request()->routeIs('about'),
            ])>Why Use Qaabil</a>
        </div>

        {{-- Auth buttons in mobile menu --}}
        <div class="mt-3 pt-3 border-t border-[#e2e8f0] flex flex-col gap-2">
            @auth
                @php
                    $homeUrl = match (true) {
                        auth()->user()->isSuperAdmin() => filament()->getPanel('admin')->getUrl(),
                        auth()->user()->isModerator()  => filament()->getPanel('moderator')->getUrl(),
                        auth()->user()->isStudent()    => filament()->getPanel('member')->getUrl(),
                        default                        => '/',
                    };
                @endphp
                <a href="{{ $homeUrl }}"
                    class="text-[.9rem] font-semibold text-center text-[#475569] border-[1.5px] border-[#e2e8f0] rounded-[10px] px-4 py-2.5 transition-all hover:border-[#1b3a6b] hover:text-[#1b3a6b]">
                    Dashboard
                </a>
            @else
                <a href="{{ filament()->getPanel('member')->getLoginUrl() }}?redirectTo={{ url()->current() }}"
                    class="text-[.9rem] font-semibold text-center text-[#475569] border-[1.5px] border-[#e2e8f0] rounded-[10px] px-4 py-2.5 transition-all hover:border-[#1b3a6b] hover:text-[#1b3a6b]">
                    Log in
                </a>
                <a href="{{ filament()->getPanel('member')->getRegistrationUrl() }}?redirectTo={{ url()->current() }}"
                    class="text-[.9rem] font-bold text-center text-white bg-[#1b3a6b] border-[1.5px] border-[#1b3a6b] rounded-[10px] px-4 py-2.5 transition-colors hover:bg-[#122952]">
                    Sign up free
                </a>
            @endauth
        </div>
    </div>
</nav>