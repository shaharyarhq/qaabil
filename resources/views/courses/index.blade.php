<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qaabil · Courses</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* pseudo-elements + view transitions — can't be done with Tailwind */
        .card-dark::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255, 255, 255, .03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, .03) 1px, transparent 1px);
            background-size: 36px 36px;
        }

        .manifesto::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255, 255, 255, .03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, .03) 1px, transparent 1px);
            background-size: 48px 48px;
        }

        /* animated underline on hover */
        .underline-amber {
            position: relative;
            display: inline-block;
        }

        .underline-amber::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            height: 2px;
            width: 0;
            background: #f59e0b;
            transition: width .3s ease;
            border-radius: 1px;
        }

        .card:hover .underline-amber::after {
            width: 100%;
        }

        .card:hover .pill {
            background: rgba(27, 58, 107, .1);
        }

        /* view transitions */
        ::view-transition-old(root),
        ::view-transition-new(root) {
            animation: none;
            mix-blend-mode: normal;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(12px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-up {
            animation: fadeUp .45s ease both;
        }

        .d1 {
            animation-delay: .04s
        }

        .d2 {
            animation-delay: .08s
        }

        .d3 {
            animation-delay: .12s
        }

        .d4 {
            animation-delay: .16s
        }

        .d5 {
            animation-delay: .20s
        }

        .d6 {
            animation-delay: .24s
        }

        /* ── Search & Filter styles ── */

        /* Search input glow */
        .search-wrap:focus-within {
            box-shadow: 0 0 0 3px rgba(27, 58, 107, .12), 0 8px 24px -6px rgba(27, 58, 107, .1);
        }

        .search-input:focus {
            outline: none;
        }

        /* Filter chip active state */
        .filter-chip {
            cursor: pointer;
            user-select: none;
            transition: all .18s ease;
        }

        .filter-chip:hover {
            border-color: rgba(27, 58, 107, .4);
        }

        .filter-chip.active {
            background: #1b3a6b;
            color: #fff;
            border-color: #1b3a6b;
        }

        .filter-chip.active .chip-dot {
            background: #f59e0b;
        }

        /* Sort dropdown */
        .sort-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%2394a3b8' stroke-width='2.5'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 10px center;
            padding-right: 28px;
        }

        .sort-select:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(27, 58, 107, .12);
        }

        /* No-results state */
        #no-results {
            display: none;
        }

        #no-results.visible {
            display: flex;
        }

        /* Course card hidden state */
        .card[data-hidden="true"] {
            display: none;
        }

        /* Results count badge animation */
        @keyframes pop {
            0% {
                transform: scale(.8);
                opacity: 0;
            }

            60% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .count-pop {
            animation: pop .25s ease both;
        }

        /* Clear button */
        .clear-btn {
            transition: all .18s ease;
        }

        .clear-btn:hover {
            background: #fee2e2;
            color: #dc2626;
            border-color: #fca5a5;
        }
    </style>
</head>

<body class="bg-[#f8fafd] text-[#0f172a] antialiased" style="font-family:'Plus Jakarta Sans',system-ui,sans-serif">

    <x-navbar></x-navbar>

    <!-- ── Main ─────────────────────────────────── -->
    <main class="max-w-7xl mx-auto px-6 py-14 pb-28">

        {{-- ── Page header ── --}}
        <div class="flex items-end justify-between mb-8">
            <div>
                <div
                    class="inline-flex items-center gap-2 text-[.7rem] font-extrabold uppercase tracking-[.1em] text-[#1b3a6b] mb-2">
                    <span class="inline-block w-[18px] h-[3px] rounded-sm bg-[#f59e0b]"></span>
                    All Courses
                </div>
                <h2 class="text-[2.25rem] font-extrabold text-[#0f172a] tracking-tight leading-snug">
                    Start learning
                    <span class="font-['Instrument_Serif',serif] font-normal italic text-[#1b3a6b]">today</span>
                    <span class="text-[#f59e0b] text-[1.5rem] ml-1">✦</span>
                </h2>
            </div>

            {{-- Live results count --}}
            <div id="results-count" class="hidden md:flex items-center gap-2 text-sm text-[#94a3b8]">
                Showing <span id="count-num"
                    class="font-extrabold text-[#1b3a6b] tabular-nums">{{ $courses->count() }}</span> of
                {{ $courses->count() }} courses
            </div>
        </div>

        {{-- ── Search + Filters bar ── --}}
        <div class="mb-8 flex flex-col gap-4">

            {{-- Search row --}}
            <div
                class="search-wrap flex items-center gap-3 bg-white border border-[#e2e8f0] rounded-[14px] px-4 py-3 transition-all duration-[.22s]">
                <svg class="shrink-0 text-[#94a3b8]" width="18" height="18" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2.2">
                    <circle cx="11" cy="11" r="8" />
                    <path stroke-linecap="round" d="M21 21l-4.35-4.35" />
                </svg>
                <input id="search-input" type="text" placeholder="Search courses, topics, keywords…"
                    class="search-input flex-1 bg-transparent text-[.9rem] text-[#0f172a] placeholder-[#cbd5e1]">
                {{-- Clear X --}}
                <button id="search-clear"
                    class="hidden shrink-0 w-6 h-6 rounded-full bg-[#f1f5f9] border border-[#e2e8f0] text-[#94a3b8] text-xs flex items-center justify-center clear-btn"
                    aria-label="Clear search">
                    ✕
                </button>
            </div>

            {{-- Filters + Sort row --}}
            <div class="flex flex-wrap items-center gap-2">
                <span class="text-[.72rem] font-extrabold uppercase tracking-[.08em] text-[#94a3b8] mr-1">Filter:</span>

                {{-- All --}}
                <button
                    class="filter-chip active inline-flex items-center gap-1.5 px-3 py-[.3rem] rounded-lg border border-[#e2e8f0] bg-white text-[.78rem] font-bold text-[#0f172a]"
                    data-filter="all">
                    <span class="chip-dot w-[6px] h-[6px] rounded-full bg-[#94a3b8]"></span>
                    All
                </button>

                {{-- Beginner (≤3 sections) --}}
                <button
                    class="filter-chip inline-flex items-center gap-1.5 px-3 py-[.3rem] rounded-lg border border-[#e2e8f0] bg-white text-[.78rem] font-bold text-[#0f172a]"
                    data-filter="beginner">
                    <span class="chip-dot w-[6px] h-[6px] rounded-full bg-[#10b981]"></span>
                    Beginner
                </button>

                {{-- Intermediate (4–7 sections) --}}
                <button
                    class="filter-chip inline-flex items-center gap-1.5 px-3 py-[.3rem] rounded-lg border border-[#e2e8f0] bg-white text-[.78rem] font-bold text-[#0f172a]"
                    data-filter="intermediate">
                    <span class="chip-dot w-[6px] h-[6px] rounded-full bg-[#f59e0b]"></span>
                    Intermediate
                </button>

                {{-- Advanced (8+ sections) --}}
                <button
                    class="filter-chip inline-flex items-center gap-1.5 px-3 py-[.3rem] rounded-lg border border-[#e2e8f0] bg-white text-[.78rem] font-bold text-[#0f172a]"
                    data-filter="advanced">
                    <span class="chip-dot w-[6px] h-[6px] rounded-full bg-[#ef4444]"></span>
                    Advanced
                </button>

                {{-- Spacer --}}
                <div class="flex-1"></div>

                {{-- Sort dropdown --}}
                <div class="relative">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-[#94a3b8] pointer-events-none"
                        width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2.5">
                        <path stroke-linecap="round" d="M3 6h18M6 12h12M9 18h6" />
                    </svg>
                    <select id="sort-select"
                        class="sort-select text-[.8rem] font-bold text-[#0f172a] bg-white border border-[#e2e8f0] rounded-lg pl-8 pr-7 py-[.35rem] cursor-pointer transition-all duration-[.18s] hover:border-[rgba(27,58,107,.3)]">
                        <option value="default">Sort: Default</option>
                        <option value="name-asc">Name A → Z</option>
                        <option value="name-desc">Name Z → A</option>
                        <option value="sections-desc">Most Sections</option>
                        <option value="chapters-desc">Most Chapters</option>
                        <option value="videos-desc">Most Videos</option>
                        <option value="newest">Newest First</option>
                    </select>
                </div>
            </div>
        </div>

        {{-- ── Course grid ── --}}
        <div id="course-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 auto-rows-fr">

            @foreach ($courses as $i => $course)
                <a href="{{ route('courses.view', $course) }}"
                    class="card group fade-up d{{ ($i % 5) + 1 }} flex flex-col bg-white border border-[#e2e8f0] rounded-[20px] overflow-hidden no-underline transition-all duration-[.22s] ease hover:-translate-y-1 hover:shadow-[0_20px_40px_-12px_rgba(27,58,107,.13)] hover:border-[rgba(27,58,107,.22)]"
                    data-course-id="{{ $course->id }}" data-name="{{ strtolower($course->name) }}"
                    data-description="{{ strtolower($course->description) }}"
                    data-sections="{{ $course->sections_count }}" data-chapters="{{ $course->chapters_count }}"
                    data-videos="{{ $course->videos_count ?? 0 }}" data-updated="{{ $course->updated_at->timestamp }}"
                    data-hidden="false">

                    {{-- Accent bar --}}
                    <div class="h-[5px] bg-[#1b3a6b] shrink-0"
                        style="view-transition-name: course-bar-{{ $course->id }};"></div>

                    <div class="p-6 flex flex-col flex-1">
                        <div class="flex items-center justify-between mb-4">
                            {{-- Level badge (derived from sections count) --}}
                            @php
                                $sections = $course->sections_count;
                                if ($sections <= 3) {
                                    $levelLabel = 'Beginner';
                                    $levelColor = 'bg-[#ecfdf5] text-[#059669] border-[rgba(5,150,105,.15)]';
                                    $dot = '#10b981';
                                } elseif ($sections <= 7) {
                                    $levelLabel = 'Intermediate';
                                    $levelColor = 'bg-[#fffbeb] text-[#b45309] border-[rgba(180,83,9,.15)]';
                                    $dot = '#f59e0b';
                                } else {
                                    $levelLabel = 'Advanced';
                                    $levelColor = 'bg-[#fef2f2] text-[#dc2626] border-[rgba(220,38,38,.15)]';
                                    $dot = '#ef4444';
                                }
                            @endphp
                            <span
                                class="pill inline-flex items-center gap-1.5 text-[.68rem] font-extrabold uppercase tracking-[.07em] px-3 py-[.25rem] rounded-md border transition-colors {{ $levelColor }}"
                                data-level="{{ strtolower($levelLabel) }}">
                                <span class="w-[5px] h-[5px] rounded-full shrink-0"
                                    style="background:{{ $dot }}"></span>
                                {{ $levelLabel }} · {{ $course->sections_count }}
                                {{ Str::plural('section', $course->sections_count) }}
                            </span>
                            <span class="font-['Instrument_Serif',serif] italic text-xs text-[#94a3b8]">
                                {{ $course->updated_at->diffForHumans() }}
                            </span>
                        </div>

                        {{-- Title --}}
                        <h3 class="mb-2 text-[1.3rem] font-extrabold text-[#0f172a] leading-snug tracking-tight transition-transform duration-300 group-hover:translate-x-0.5"
                            style="view-transition-name: course-title-{{ $course->id }};">
                            {{ $course->name }}
                            <span
                                class="text-[#f59e0b] opacity-0 group-hover:opacity-100 transition-opacity ml-1">✦</span>
                        </h3>

                        <p class="text-sm leading-relaxed mb-5 flex-1 text-[#475569]">
                            {{ $course->description }}
                        </p>

                        <div class="flex items-center justify-between pt-4 border-t border-[#e2e8f0]">
                            <span class="text-xs flex items-center gap-1.5 text-[#94a3b8]">
                                📚 {{ $course->chapters_count }} {{ Str::plural('chapter', $course->chapters_count) }}
                            </span>
                            <span class="underline-amber text-sm font-bold text-[#1b3a6b]">
                                🔥 {{ $course->videos_count ?? 0 }}
                                {{ Str::plural('video', $course->videos_count ?? 0) }}
                            </span>
                        </div>
                    </div>
                </a>
            @endforeach

            {{-- CTA dark card — always last, always visible --}}
            <div id="cta-card"
                class="card-dark fade-up d6 relative bg-[#1b3a6b] rounded-[20px] overflow-hidden p-8 flex flex-col justify-between transition-all duration-[.22s] ease hover:-translate-y-1 hover:shadow-[0_20px_40px_-12px_rgba(27,58,107,.5)]">
                <div class="relative z-10">
                    <div class="w-11 h-11 rounded-xl flex items-center justify-center mb-5 shrink-0"
                        style="background:rgba(245,158,11,.15)">
                        <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#f59e0b"
                            stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                    <h3 class="text-[1.75rem] font-extrabold text-white mb-2 leading-snug">
                        Create a
                        <span class="font-['Instrument_Serif',serif] font-normal italic text-[#f59e0b]">course</span>
                    </h3>
                    <p class="text-[.825rem] leading-relaxed text-white/45">
                        Admin? Design sections, chapters, invite maintainers, and grow the knowledge base.
                    </p>
                </div>
                <div class="relative z-10 mt-7">
                    <button
                        class="w-full py-[.7rem] rounded-xl text-[.85rem] font-extrabold bg-[#f59e0b] text-[#1b3a6b] border-none cursor-pointer transition-colors hover:bg-[#d97706]">
                        + New course
                    </button>
                    <p class="text-[.7rem] text-center mt-3 text-white/25">
                        Unlock by subscribing or uploading an approved video
                    </p>
                </div>
            </div>

        </div>

        {{-- No results state --}}
        <div id="no-results" class="hidden flex-col items-center justify-center py-24 text-center">
            <div
                class="w-16 h-16 rounded-2xl bg-white border border-[#e2e8f0] flex items-center justify-center mb-5 text-2xl shadow-sm">
                🔍
            </div>
            <h3 class="text-lg font-extrabold text-[#0f172a] mb-2">No courses found</h3>
            <p class="text-sm text-[#94a3b8] mb-5 max-w-xs">
                Try a different keyword or reset your filters to see all courses.
            </p>
            <button id="reset-btn"
                class="px-5 py-2 rounded-xl bg-[#1b3a6b] text-white text-sm font-bold transition-opacity hover:opacity-80">
                Reset filters
            </button>
        </div>

        {{-- Manifesto --}}
        <div class="manifesto relative mt-16 bg-[#1b3a6b] rounded-3xl overflow-hidden px-8 md:px-16 py-14 text-center">
            <div class="relative z-10">
                <p class="font-['Instrument_Serif',serif] italic text-white leading-relaxed max-w-[600px] mx-auto"
                    style="font-size:clamp(1.5rem,2.5vw,2rem)">
                    " upload an approved video
                    <span class="text-[#f59e0b]"> ✦ </span>
                    unlock any chapter "
                </p>
                <div class="w-10 h-[2px] rounded mx-auto my-[18px]" style="background:rgba(245,158,11,.4)"></div>
                <p class="text-[.85rem] text-white/45 max-w-[500px] mx-auto leading-relaxed">
                    Every course contains sections and chapters with clear objectives. Students submit video solutions.
                    Maintainers review and accept. One approved video unlocks the rest —
                    crowdsourced, peer-validated, forever free.
                </p>
            </div>
        </div>

    </main>

    <x-footer></x-footer>

    <script>
        (function() {
            const searchInput = document.getElementById('search-input');
            const searchClear = document.getElementById('search-clear');
            const sortSelect = document.getElementById('sort-select');
            const filterChips = document.querySelectorAll('.filter-chip');
            const noResults = document.getElementById('no-results');
            const grid = document.getElementById('course-grid');
            const countNum = document.getElementById('count-num');
            const ctaCard = document.getElementById('cta-card');
            const resetBtn = document.getElementById('reset-btn');

            // Grab all course cards (not the CTA)
            const allCards = [...document.querySelectorAll('.card[data-course-id]')];
            const totalCount = allCards.length;

            let state = {
                query: '',
                filter: 'all', // all | beginner | intermediate | advanced
                sort: 'default',
            };

            // ── Helpers ──────────────────────────────────
            function getLevel(sections) {
                if (sections <= 3) return 'beginner';
                if (sections <= 7) return 'intermediate';
                return 'advanced';
            }

            function matchesQuery(card) {
                if (!state.query) return true;
                const q = state.query.toLowerCase();
                return card.dataset.name.includes(q) || card.dataset.description.includes(q);
            }

            function matchesFilter(card) {
                if (state.filter === 'all') return true;
                return getLevel(+card.dataset.sections) === state.filter;
            }

            function getSortValue(card) {
                switch (state.sort) {
                    case 'name-asc':
                        return card.dataset.name;
                    case 'name-desc':
                        return card.dataset.name;
                    case 'sections-desc':
                        return -parseInt(card.dataset.sections);
                    case 'chapters-desc':
                        return -parseInt(card.dataset.chapters);
                    case 'videos-desc':
                        return -parseInt(card.dataset.videos);
                    case 'newest':
                        return -parseInt(card.dataset.updated);
                    default:
                        return 0;
                }
            }

            // ── Core render ──────────────────────────────
            function render() {
                const visible = [];
                const hidden = [];

                allCards.forEach(card => {
                    if (matchesQuery(card) && matchesFilter(card)) {
                        visible.push(card);
                    } else {
                        hidden.push(card);
                    }
                });

                // Sort visible
                if (state.sort !== 'default') {
                    visible.sort((a, b) => {
                        const va = getSortValue(a);
                        const vb = getSortValue(b);
                        if (typeof va === 'string') return va.localeCompare(vb) * (state.sort === 'name-desc' ?
                            -1 : 1);
                        return va - vb;
                    });
                }

                // Re-order in DOM
                visible.forEach(card => {
                    card.setAttribute('data-hidden', 'false');
                    card.style.display = '';
                    grid.insertBefore(card, ctaCard); // keep CTA last
                });
                hidden.forEach(card => {
                    card.setAttribute('data-hidden', 'true');
                    card.style.display = 'none';
                });

                // Count badge
                const v = visible.length;
                countNum.textContent = v;
                // Trigger re-animation
                countNum.classList.remove('count-pop');
                void countNum.offsetWidth;
                countNum.classList.add('count-pop');

                // No results
                if (v === 0) {
                    noResults.classList.add('visible');
                    noResults.style.display = 'flex';
                    grid.style.display = 'none';
                } else {
                    noResults.classList.remove('visible');
                    noResults.style.display = 'none';
                    grid.style.display = '';
                }

                // CTA card visibility: show when we have results or always?
                // We'll always show it so grid never looks empty for admins.
                ctaCard.style.display = (v === 0) ? 'none' : '';
            }

            // ── Event: search ────────────────────────────
            searchInput.addEventListener('input', () => {
                state.query = searchInput.value.trim();
                searchClear.style.display = state.query ? 'flex' : 'none';
                render();
            });

            searchClear.addEventListener('click', () => {
                searchInput.value = '';
                state.query = '';
                searchClear.style.display = 'none';
                searchInput.focus();
                render();
            });

            // ── Event: filter chips ───────────────────────
            filterChips.forEach(chip => {
                chip.addEventListener('click', () => {
                    filterChips.forEach(c => c.classList.remove('active'));
                    chip.classList.add('active');
                    state.filter = chip.dataset.filter;
                    render();
                });
            });

            // ── Event: sort ───────────────────────────────
            sortSelect.addEventListener('change', () => {
                state.sort = sortSelect.value;
                render();
            });

            // ── Event: reset ──────────────────────────────
            function resetAll() {
                searchInput.value = '';
                searchClear.style.display = 'none';
                state = {
                    query: '',
                    filter: 'all',
                    sort: 'default'
                };
                filterChips.forEach(c => c.classList.remove('active'));
                document.querySelector('[data-filter="all"]').classList.add('active');
                sortSelect.value = 'default';
                render();
            }

            resetBtn.addEventListener('click', resetAll);

            // ── Keyboard shortcut: / to focus search ─────
            document.addEventListener('keydown', (e) => {
                if (e.key === '/' && document.activeElement !== searchInput) {
                    e.preventDefault();
                    searchInput.focus();
                }
                if (e.key === 'Escape' && document.activeElement === searchInput) {
                    resetAll();
                    searchInput.blur();
                }
            });

            // Init count
            countNum.textContent = totalCount;
        })();
    </script>

</body>

</html>
