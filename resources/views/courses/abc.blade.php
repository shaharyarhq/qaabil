<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qaabil · Courses</title>
    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Sora + Instrument Serif -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Sora:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #faf7f2;
            /* slightly warmer off-white */
            font-family: 'Sora', system-ui, sans-serif;
            color: #1e1b1a;
            -webkit-font-smoothing: antialiased;
        }

        /* dot‑grid pattern */
        .dot-grid {
            background-image: radial-gradient(#d4b68a 1.2px, transparent 1.2px);
            background-size: 32px 32px;
        }

        /* headings use Instrument Serif */
        h1,
        h2,
        h3,
        .display-italic {
            font-family: 'Instrument Serif', serif;
            font-weight: 400;
            letter-spacing: -0.02em;
        }

        .instrument-italic {
            font-family: 'Instrument Serif', serif;
            font-style: italic;
        }

        /* card styles - same but with new accent colors */
        .course-card {
            background-color: #ffffff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.02), 0 2px 5px rgba(0, 0, 0, 0.02);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            animation: fadeUp 0.5s ease forwards;
            opacity: 0;
        }

        .course-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 18px 30px -12px rgba(0, 0, 0, 0.1), 0 6px 12px -6px rgba(0, 0, 0, 0.05);
        }

        .card-accent {
            height: 8px;
            width: 100%;
        }

        .card-cta {
            background-color: #1e1b1a;
            /* deep warm black from logo */
            color: #faf7f2;
            border-radius: 20px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            animation: fadeUp 0.5s ease forwards;
            opacity: 0;
        }

        .card-cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 25px 35px -12px rgba(0, 0, 0, 0.25);
        }

        @keyframes fadeUp {
            0% {
                opacity: 0;
                transform: translateY(10px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .btn-outline {
            border: 1px solid #e5ddd2;
            background: transparent;
            padding: 0.5rem 1.25rem;
            border-radius: 40px;
            font-weight: 500;
            transition: all 0.1s ease;
        }

        .btn-outline:hover {
            background: #1e1b1a;
            color: #faf7f2;
            border-color: #1e1b1a;
        }

        .btn-solid {
            background: #1e1b1a;
            /* logo black */
            color: white;
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 40px;
            font-weight: 500;
            transition: background 0.1s ease;
        }

        .btn-solid:hover {
            background: #c69c5a;
            /* logo gold on hover */
        }

        /* logo colors */
        .logo-gold {
            color: #c69c5a;
            /* warm gold from logo */
        }

        .bg-logo-gold {
            background-color: #c69c5a;
        }

        .border-logo-gold {
            border-color: #c69c5a;
        }

        .text-logo-dark {
            color: #1e1b1a;
        }

        .delay-1 {
            animation-delay: 0.05s;
        }

        .delay-2 {
            animation-delay: 0.1s;
        }

        .delay-3 {
            animation-delay: 0.15s;
        }

        .delay-4 {
            animation-delay: 0.2s;
        }

        .delay-5 {
            animation-delay: 0.25s;
        }

        .delay-6 {
            animation-delay: 0.3s;
        }
    </style>
</head>

<body class="antialiased">

    <!-- navbar with actual image logo -->
    <nav class="max-w-7xl mx-auto px-6 py-5 flex items-center justify-between flex-wrap gap-y-3">
        <!-- logo left with actual image -->
        <a href="/" class="flex items-center gap-3">
            <!-- replace src with your actual logo path -->
            <img src="{{ asset('storage/logo.png') }}" alt="Qaabil" class="h-16 w-auto object-contain">
            <!-- optional text fallback that matches your brand -->
            {{-- <span class="text-xl instrument-italic tracking-tight text-[#1e1b1a] hidden sm:inline">Qaabil</span> --}}
        </a>

        <!-- center links (unchanged) -->
        <div class="hidden md:flex items-center gap-10 text-sm font-medium text-[#1e1b1a]/80">
            <a href="#" class="hover:text-[#c69c5a] transition">Courses</a>
            <a href="#" class="hover:text-[#c69c5a] transition">Dashboard</a>
            <a href="#" class="hover:text-[#c69c5a] transition">Community</a>
        </div>

        <!-- auth buttons (unchanged) -->
        <div class="flex items-center gap-3">
            <button class="btn-outline text-sm px-5 py-2 hidden sm:inline-block">Log in</button>
            <button class="btn-solid text-sm px-5 py-2">Sign up</button>
        </div>
    </nav>

    <!-- hero with gold-tinted dot grid -->
    <section
        class="dot-grid relative max-w-7xl mx-auto mt-2 mb-12 mx-6 lg:mx-auto px-6 py-20 rounded-[40px] bg-[#f5efe8] bg-opacity-70">
        <div class="relative z-10 text-center max-w-2xl mx-auto">
            <span class="inline-block instrument-italic text-lg logo-gold mb-4"> — from the community, for the community
                — </span>
            <h1 class="text-6xl md:text-7xl font-normal text-[#1e1b1a] leading-[1.1] tracking-tight">
                Empower <span class="instrument-italic" style="color: #c69c5a;">Learning</span>
            </h1>
            <p class="font-sora text-[#1e1b1a]/70 text-lg max-w-lg mx-auto mt-6">
                Crowdsourced video mastery. Each course, chapter & objective built by students, for students.
            </p>
            <div class="mt-10 flex flex-wrap gap-4 justify-center">
                <button class="btn-solid text-base px-8 py-3">Explore courses</button>
                <button
                    class="btn-outline text-base px-8 py-3 border-[#c69c5a] text-[#1e1b1a] hover:bg-[#c69c5a] hover:text-white hover:border-[#c69c5a]">How
                    it works</button>
            </div>
        </div>
    </section>

    <!-- main courses grid -->
    <main class="max-w-7xl mx-auto px-6 pb-24">
        <!-- section title with gold -->
        <div class="flex items-center justify-between mb-10">
            <h2 class="text-4xl instrument-italic text-[#1e1b1a]">Top courses<span
                    class="text-2xl ml-2 logo-gold">✦</span></h2>
            <a href="{{route('courses.index')}}" class="text-4xl instrument-italic text-[#1e1b1a] group relative w-fit  cursor-pointer">
    all courses
    <span class="absolute -bottom-2 left-0 w-0 h-0.5 bg-[#c69c5a] group-hover:w-full transition-all duration-500"></span>
    <span class="text-2xl ml-2 logo-gold inline-block group-hover:scale-150 group-hover:rotate-180 transition-all duration-500">✦</span>
</a>
        </div>

        <!-- card grid: accent colors now inspired by logo gold tones -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 auto-rows-fr">

            @foreach ($courses as $course)
                <div class="course-card group relative flex flex-col delay-1 overflow-hidden cursor-pointer">
                    <div class="card-accent bg-logo-gold relative z-10"></div>

                    <div
                        class="absolute inset-0 bg-gradient-to-br from-[#c69c5a]/0 via-[#c69c5a]/0 to-[#c69c5a]/5 opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none">
                    </div>

                    <div class="p-6 flex-1 flex flex-col relative z-10">
                        <div class="flex justify-between items-start mb-3">
                            <span
                                class="text-xs font-medium uppercase tracking-wider text-[#1e1b1a]/40 bg-[#1e1b1a]/5 px-3 py-1 rounded-full group-hover:bg-[#c69c5a]/10 group-hover:text-[#c69c5a] transition-all duration-300">
                                {{ $course->chapters_count }} {{ Str::plural('chapter', $course->chapters_count) }}
                            </span>
                            <span
                                class="instrument-italic text-sm text-[#1e1b1a]/40 group-hover:text-[#c69c5a]/60 transition-colors duration-300">
                                updated {{ $course->updated_at->diffForHumans() }}
                            </span>
                        </div>

                        <h3
                            class="text-2xl instrument-italic mb-2 group-hover:translate-x-1 transition-transform duration-300">
                            {{ $course->name }}
                            <span
                                class="inline-block opacity-0 group-hover:opacity-100 translate-x--2 group-hover:translate-x-0 transition-all duration-300 ml-1 text-[#c69c5a]">✦</span>
                        </h3>

                        <p
                            class="text-sm text-[#1e1b1a]/70 leading-relaxed mb-6 group-hover:text-[#1e1b1a]/90 transition-colors duration-300 relative">
                            {{ $course->description }}
                        </p>

                        <div
                            class="mt-auto flex items-center justify-between border-t border-[#1e1b1a]/5 pt-4 group-hover:border-[#c69c5a]/20 transition-colors duration-300">
                            <span class="text-xs text-[#1e1b1a]/50 flex items-center gap-1">
                                <span
                                    class="inline-block group-hover:scale-110 transition-transform duration-300">🔥</span>
                                <span class="group-hover:text-[#1e1b1a]/70 transition-colors duration-300">
                                    {{ $course->videos_count ?? 0 }} videos submitted
                                </span>
                            </span>
                            <span class="text-sm font-medium relative">
                                {{ $course->objectives_count ?? 0 }}
                                {{ Str::plural('objective', $course->objectives_count ?? 0) }}
                                <span
                                    class="absolute -bottom-1 left-0 w-0 h-[2px] bg-[#c69c5a] group-hover:w-full transition-all duration-300"></span>
                            </span>
                        </div>
                    </div>

                    <div class="absolute top-0 right-0 w-12 h-12 overflow-hidden">
                        <div
                            class="absolute top-0 right-0 w-12 h-12 bg-[#c69c5a]/0 group-hover:bg-[#c69c5a]/5 transition-colors duration-500 transform rotate-45 translate-x-6 -translate-y-6">
                        </div>
                    </div>

                    <div
                        class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-[#c69c5a]/0 via-[#c69c5a]/50 to-[#c69c5a]/0 translate-y-full group-hover:translate-y-0 transition-transform duration-700">
                    </div>
                </div>
            @endforeach

            <!-- Card 6 – dark CTA card with gold accent -->
            <div class="card-cta flex flex-col p-8 relative delay-6">
                <div class="flex flex-col h-full justify-between">
                    <div>
                        <span class="inline-block instrument-italic text-5xl logo-gold opacity-90 mb-4">✦</span>
                        <h3 class="text-3xl instrument-italic text-[#faf7f2] mb-3">create a course</h3>
                        <p class="text-sm text-[#faf7f2]/60 mb-8 font-sora leading-relaxed">
                            Admin? Design chapters, invite maintainers, and grow the knowledge base.
                        </p>
                    </div>
                    <div class="mt-auto">
                        <button
                            class="w-full bg-[#c69c5a] hover:bg-[#b58b4a] text-[#1e1b1a] font-medium rounded-full px-6 py-3 text-sm transition">
                            + New course
                        </button>
                        <p class="text-xs text-[#faf7f2]/40 mt-4 text-center">unlock by subscribing or uploading an
                            approved video</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- editorial note with gold -->
        <div class="mt-16 max-w-2xl mx-auto text-center border-t border-[#c69c5a]/20 pt-12">
            <span class="instrument-italic text-3xl text-[#1e1b1a]"> “ upload an approved video <span
                    class="logo-gold">✦</span> unlock any chapter ” </span>
            <p class="font-sora text-sm text-[#1e1b1a]/50 mt-5 leading-relaxed">
                Every course contains chapters with clear objectives. Students submit video solutions.
                Objective maintainers (top contributors) review and accept. Once you have one accepted video,
                you unlock the rest — crowdsourced, peer-validated, forever free.
            </p>
        </div>
    </main>

    <!-- footer with gold -->
    <footer class="border-t border-[#c69c5a]/20 py-8 mt-10">
        <div
            class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-2 text-xs text-[#1e1b1a]/50 font-sora">
            <span>© 2025 Qaabil — <span class="logo-gold">✦</span> empower learning.</span>
            <span class="flex gap-5">
                <a href="#" class="hover:text-[#c69c5a]">terms</a>
                <a href="#" class="hover:text-[#c69c5a]">privacy</a>
                <a href="#" class="hover:text-[#c69c5a]">contact</a>
            </span>
        </div>
    </footer>
</body>

</html>
