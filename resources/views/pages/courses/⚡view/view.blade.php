<div x-data="courseSearch()" @keydown.escape.window="closeAll()" x-init="initFromHash()">

    <x-courses.view.hero :course="$course"></x-courses.view.hero>

    <x-courses.view.content :course="$course" :objective-progress="$objectiveProgress"></x-courses.view.content>

    <style>
        /* ── Shared accordion body ── */
        .section-body,
        .chapter-body {
            display: grid;
            grid-template-rows: 0fr;
            transition: grid-template-rows 320ms cubic-bezier(.4, 0, .2, 1);
        }

        .section-body.open,
        .chapter-body.open {
            grid-template-rows: 1fr;
        }

        .section-body.open .section-body-inner {
            padding-block: calc(var(--spacing) * 5);
        }

        .section-body-inner,
        .chapter-body-inner {
            overflow: hidden;
            transition: padding 320ms cubic-bezier(.4, 0, .2, 1);
        }

        /* ── Section toggle states ── */
        .section-toggle {
            background: linear-gradient(135deg, rgba(27, 58, 107, .07) 0%, rgba(27, 58, 107, .03) 100%);
        }

        .section-toggle[aria-expanded="true"] {
            background: linear-gradient(135deg, #1b3a6b 0%, #122952 100%);
        }

        .section-toggle .section-num {
            background: rgba(27, 58, 107, .1);
            color: #1b3a6b;
        }

        .section-toggle[aria-expanded="true"] .section-num {
            background: rgba(255, 255, 255, .15);
            color: white;
        }

        .section-toggle .section-title {
            color: #0f172a;
        }

        .section-toggle[aria-expanded="true"] .section-title {
            color: white;
        }

        .section-toggle .section-pill {
            background: rgba(27, 58, 107, .08);
            color: #1b3a6b;
        }

        .section-toggle[aria-expanded="true"] .section-pill {
            background: rgba(255, 255, 255, .12);
            color: rgba(255, 255, 255, .7);
        }

        .section-toggle[aria-expanded="true"] .chevron {
            transform: rotate(180deg);
            color: rgba(255, 255, 255, .6);
        }

        /* ── Jump flash highlight ── */
        @keyframes jump-highlight {
            0% {
                box-shadow: 0 0 0 0 rgba(245, 158, 11, 0);
                outline-color: rgba(245, 158, 11, 0);
            }

            20% {
                box-shadow: 0 0 0 4px rgba(245, 158, 11, .35);
                outline-color: rgba(245, 158, 11, .6);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(245, 158, 11, 0);
                outline-color: rgba(245, 158, 11, 0);
            }
        }

        .jump-flash {
            animation: jump-highlight 1.6s ease-out forwards;
            outline: 2px solid rgba(245, 158, 11, .6);
            outline-offset: 2px;
            border-radius: 14px;
        }
    </style>

    <script>
        /* ── Section toggle (mirrors chapter toggle exactly) ── */
        function toggleSection(btn) {
            const expanded = btn.getAttribute('aria-expanded') === 'true';
            btn.setAttribute('aria-expanded', String(!expanded));
            btn.nextElementSibling.classList.toggle('open', !expanded);
        }

        /* ── Chapter toggle ── */
        function toggleChapter(btn) {
            const expanded = btn.getAttribute('aria-expanded') === 'true';
            btn.setAttribute('aria-expanded', String(!expanded));
            btn.nextElementSibling.classList.toggle('open', !expanded);
        }

        /* ── Boot: open first section + first chapter ── */
        document.addEventListener('DOMContentLoaded', () => {
            const firstSection = document.querySelector('.section-toggle');
            if (firstSection) toggleSection(firstSection);

            const firstChapter = document.querySelector('.chapter-toggle');
            if (firstChapter) toggleChapter(firstChapter);
        });

        /* ── Course search + jump ── */
        function courseSearch() {
            const items = [];

            @foreach ($course->sections as $sectionIndex => $section)
                items.push({
                    id: 'section-{{ $section->id }}',
                    type: 'section',
                    label: @js($section->name),
                    sub: 'Section {{ $sectionIndex + 1 }} · {{ $section->chapters->count() }} {{ Str::plural('chapter', $section->chapters->count()) }}',
                    href: '#{{ Str::slug($section->name) }}',
                });
                @foreach ($section->chapters as $chapterIndex => $chapter)
                    items.push({
                        id: 'chapter-{{ $chapter->id }}',
                        type: 'chapter',
                        label: @js($chapter->name),
                        sub: '{{ $section->name }} · {{ $chapter->objectives->count() }} {{ Str::plural('objective', $chapter->objectives->count()) }}',
                        href: '#{{ Str::slug($section->name) }}-{{ Str::slug($chapter->name) }}',
                    });
                    @foreach ($chapter->objectives as $obj)
                        items.push({
                            id: 'obj-{{ $obj->id }}',
                            type: 'objective',
                            label: @js($obj->name),
                            sub: '{{ $chapter->name }}',
                            /* scoped to chapter+section so ids never collide across the course */
                            href: '#{{ Str::slug($section->name) }}-{{ Str::slug($chapter->name) }}-{{ Str::slug($obj->name) }}',
                        });
                    @endforeach
                @endforeach
            @endforeach

            return {
                jumpOpen: false,
                jumpQuery: '',
                jumpResults: [],
                activeIdx: 0,
                allItems: items,

                openJump() {
                    this.jumpOpen = true;
                    this.jumpQuery = '';
                    /* Default view: sections + chapters only — objectives flood the list, so they
                       only appear once the person actually searches for something. */
                    this.jumpResults = this.allItems.filter(i => i.type !== 'objective');
                    this.activeIdx = 0;
                    this.$nextTick(() => this.$refs.jumpInput?.focus());
                },

                closeAll() {
                    this.jumpOpen = false;
                },

                initFromHash() {
                    if (!window.location.hash) return;
                    const id = window.location.hash.slice(1);
                    setTimeout(() => this.revealAndScroll(id), 150);
                },

                revealAndScroll(id) {
                    const doFlash = () => {
                        const el = document.getElementById(id);
                        if (!el) return;
                        el.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                        el.classList.remove('jump-flash');
                        void el.offsetWidth;
                        el.classList.add('jump-flash');
                        setTimeout(() => el.classList.remove('jump-flash'), 2500);
                    };

                    const target = document.getElementById(id);
                    if (!target) {
                        setTimeout(doFlash, 100);
                        return;
                    }

                    const sectionItem = target.closest('.section-item');
                    const sectionToggle = sectionItem?.querySelector(':scope > .section-toggle');
                    if (sectionToggle && sectionToggle.getAttribute('aria-expanded') !== 'true') {
                        toggleSection(sectionToggle);
                    }

                    const chapterItem = target.closest('.chapter-item');
                    const chapterToggle = chapterItem?.querySelector(':scope > .chapter-toggle');
                    if (chapterToggle && chapterToggle.getAttribute('aria-expanded') !== 'true') {
                        toggleChapter(chapterToggle);
                    }

                    setTimeout(doFlash, 340);
                },

                jumpTo(item) {
                    const id = item.href.slice(1);
                    this.closeAll();
                    /* keep the URL shareable/bookmarkable without a full page reload */
                    history.pushState(null, '', item.href);
                    this.revealAndScroll(id);
                },

                filterJump() {
                    const q = this.jumpQuery.toLowerCase().trim();
                    if (!q) {
                        this.jumpResults = this.allItems.filter(i => i.type !== 'objective');
                    } else {
                        this.jumpResults = this.allItems.filter(i =>
                            i.label.toLowerCase().includes(q) ||
                            i.sub.toLowerCase().includes(q));
                    }
                    this.activeIdx = 0;
                },

                scrollActiveIntoView() {
                    this.$nextTick(() => {
                        const active = this.$refs.jumpList?.querySelector('[data-active="true"]');
                        active?.scrollIntoView({
                            block: 'nearest'
                        });
                    });
                },

                handleKey(e) {
                    if (!this.jumpOpen) {
                        if (e.key === '/' && document.activeElement.tagName !== 'INPUT' && document.activeElement
                            .tagName !== 'TEXTAREA') {
                            e.preventDefault();
                            this.openJump();
                        }
                        return;
                    }
                    if (e.key === 'ArrowDown') {
                        e.preventDefault();
                        this.activeIdx = Math.min(this.activeIdx + 1, this.jumpResults.length - 1);
                        this.scrollActiveIntoView();
                    } else if (e.key === 'ArrowUp') {
                        e.preventDefault();
                        this.activeIdx = Math.max(this.activeIdx - 1, 0);
                        this.scrollActiveIntoView();
                    } else if (e.key === 'Enter') {
                        const item = this.jumpResults[this.activeIdx];
                        if (item) this.jumpTo(item);
                    }
                },
            };
        }
    </script>
</div>
