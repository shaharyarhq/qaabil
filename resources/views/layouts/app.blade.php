<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? config('app.name') }}</title>

    {{-- <x-pwa.head></x-pwa.head> --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles

    <style>
        .hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255, 255, 255, 0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.04) 1px, transparent 1px);
            background-size: 56px 56px;
        }

        :root {
            --navy: #1b3a6b;
            --navy-d: #122952;
            --amber: #f59e0b;
            --amber-d: #d97706;
            --sky: #eff6ff;
            --border: #e2e8f0;
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
    </style>
</head>

<body wire:transition class="bg-[#f8fafd] text-[#0f172a] antialiased" style="font-family:'Plus Jakarta Sans',system-ui,sans-serif">
    <x-navbar></x-navbar>

    {{ $slot }}
    
    <x-footer></x-footer>

    {{-- <x-pwa.scripts></x-pwa.scripts> --}}

    @livewireScripts
</body>
<link rel="stylesheet" type="text/css" href="https://unpkg.com/@bprogress/core/dist/index.css" />
<script type="module">
    import {
        BProgress
    } from 'https://unpkg.com/@bprogress/core/dist/index.js';

    Livewire.hook('commit', ({
        component,
        commit,
        respond,
        succeed,
        fail
    }) => {
        BProgress.start();

        succeed(({
            snapshot,
            effect
        }) => {
            queueMicrotask(() => {
                BProgress.done();
            });
        });
    });

    window.onbeforeunload = function() {
        BProgress.start();
    };

    window.addEventListener('load', function() {
        BProgress.start();
        BProgress.done();
    });
</script>

</html>
