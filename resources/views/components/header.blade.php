@php
    $locale   = App::getLocale();
    $isAr     = $locale === 'ar';
    $r        = fn($name) => $isAr ? route("ar.$name") : route($name);
    $navItems = [
        ['route' => 'home',     'label' => __('messages.nav.home')],
        ['route' => 'services', 'label' => __('messages.nav.services')],
        ['route' => 'about',    'label' => __('messages.nav.about')],
        ['route' => 'contact',  'label' => __('messages.nav.contact')],
    ];
    // Language switch: toggle /ar prefix on the current path
    $barePath  = preg_replace('#^/ar(?=/|$)#', '', request()->getPathInfo()) ?: '/';
    $switchUrl = $isAr ? $barePath : '/ar' . $barePath;
@endphp

<header class="site-header" id="site-header">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 h-full flex items-center justify-between gap-4">

        {{-- ── Logo ── --}}
        <a href="{{ $r('home') }}" class="flex-shrink-0">
            <img src="{{ asset('images/icon-light.png') }}"
                 alt="Creative Team"
                 class="h-16 w-auto block dark:hidden"
                 loading="eager">
            <img src="{{ asset('images/icon-dark.png') }}"
                 alt="Creative Team"
                 class="h-16 w-auto hidden dark:block"
                 loading="eager">
        </a>

        {{-- ── Desktop Navigation ── --}}
        <nav class="hidden md:flex items-center gap-6">
            @foreach ($navItems as $item)
                <a href="{{ $r($item['route']) }}"
                   class="nav-link {{ request()->routeIs($item['route']) || request()->routeIs('ar.'.$item['route']) ? 'active' : '' }}">
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>

        {{-- ── Right Controls ── --}}
        <div class="flex items-center gap-3">

            {{-- Dark / Light Toggle --}}
            <button data-theme-toggle
                    class="mode-btn"
                    aria-label="Toggle theme">
                <span data-theme-icon class="text-base">☽</span>
            </button>

            {{-- Language Switcher --}}
            <a href="{{ $switchUrl }}"
               class="mode-btn text-xs font-bold tracking-wider"
               aria-label="Switch language">
                {{ $isAr ? 'EN' : 'AR' }}
            </a>

            {{-- CTA Button (desktop only) --}}
            <a href="{{ $r('contact') }}"
               class="btn-primary hidden lg:inline-flex text-sm py-2.5 px-5">
                {{ __('messages.contact_us') }}
            </a>

            {{-- Hamburger (mobile) --}}
            <button data-menu-open
                    class="md:hidden mode-btn"
                    aria-label="Open menu">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

    </div>
</header>
