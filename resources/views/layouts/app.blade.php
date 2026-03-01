@php
    $locale   = App::getLocale();
    $isRtl    = $locale === 'ar';
    // Bare path without /ar prefix (e.g. /ar/services → /services)
    $barePath = preg_replace('#^/ar(?=/|$)#', '', request()->getPathInfo()) ?: '/';
@endphp
<!DOCTYPE html>
<html lang="{{ $locale }}"
      dir="{{ $isRtl ? 'rtl' : 'ltr' }}"
      class="{{ session('theme', 'dark') === 'dark' ? 'dark' : '' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $description ?? 'Creative Team — ' . __('messages.footer.slogan') }}">
    <meta property="og:title" content="{{ $title ?? 'Creative Team' }}">
    <meta property="og:type" content="website">
    <title>{{ $title ?? 'Creative Team' }}</title>

    {{-- hreflang for bilingual SEO --}}
    <link rel="alternate" hreflang="en" href="{{ url($barePath) }}">
    <link rel="alternate" hreflang="ar" href="{{ url('/ar' . $barePath) }}">
    <link rel="alternate" hreflang="x-default" href="{{ url($barePath) }}">

    {{-- Preload icons --}}
    <link rel="preload" as="image" href="{{ asset('images/icon-light.png') }}">
    <link rel="preload" as="image" href="{{ asset('images/icon-dark.png') }}">

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('images/icon-light.png') }}">

    {{-- Vite (Tailwind + App JS) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Dark mode: apply before paint to avoid flash --}}
    <script>
        (function() {
            const saved = localStorage.getItem('theme');
            const sys   = window.matchMedia('(prefers-color-scheme: dark)').matches;
            if (saved === 'dark' || (!saved && sys)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        })();
    </script>

    @stack('head')
</head>
<body class="{{ __('messages.font_class') }}">

    {{-- ─────────────────── HEADER ─────────────────── --}}
    @include('components.header')

    {{-- ─────────────────── MOBILE MENU ─────────────────── --}}
    @include('components.mobile-menu')

    {{-- ─────────────────── MAIN ─────────────────── --}}
    <main>
        @yield('content')
    </main>

    {{-- ─────────────────── FOOTER ─────────────────── --}}
    @include('components.footer')

    @stack('scripts')
</body>
</html>
