<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('app.name') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,800;0,900;1,700;1,800&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600;9..40,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <style>
        body { font-family: 'DM Sans', sans-serif; -webkit-font-smoothing: antialiased; }

        /* Hero carousel */
        .carousel-slide { position: absolute; inset: 0; opacity: 0; transition: opacity 0.65s ease; pointer-events: none; }
        .carousel-slide.active { opacity: 1; pointer-events: auto; }

        /* Polling bar grows upward */
        .poll-bar-wrap { display: flex; align-items: flex-end; }
        .poll-bar-fill { width: 100%; height: 0; transition: height 1.3s cubic-bezier(0.22, 1, 0.36, 1); }
        .poll-bar-fill.animated { height: var(--bar-h); }

        /* Badge scale-in after bars done */
        .poll-badge {
            transform: scale(0); opacity: 0;
            transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1) 1.15s,
                        opacity 0.35s ease 1.15s;
        }
        .poll-badge.animated { transform: scale(1); opacity: 1; }

        /* Tabular numbers */
        .count-num { font-variant-numeric: tabular-nums; }
    </style>
</head>
<body class="bg-white text-[#0A0A0A]">
    {{ $slot }}
    @livewireScripts
    @stack('scripts')
</body>
</html>
