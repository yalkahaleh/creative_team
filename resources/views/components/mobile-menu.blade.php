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
    $barePath  = preg_replace('#^/ar(?=/|$)#', '', request()->getPathInfo()) ?: '/';
    $switchUrl = $isAr ? $barePath : '/ar' . $barePath;
@endphp

{{-- Overlay --}}
<div class="mobile-menu-overlay"></div>

{{-- Panel --}}
<div class="mobile-menu-panel">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-8">
        <a href="{{ $r('home') }}">
            <img src="{{ asset('images/icon-light.png') }}" alt="Creative Team" class="h-12 w-auto block dark:hidden">
            <img src="{{ asset('images/icon-dark.png') }}"  alt="Creative Team" class="h-12 w-auto hidden dark:block">
        </a>

        <button data-menu-close class="mode-btn" aria-label="Close menu">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    {{-- Nav Links --}}
    <nav class="flex flex-col gap-1 mb-8">
        @foreach ($navItems as $item)
            <a href="{{ $r($item['route']) }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold transition-all duration-200
                      {{ request()->routeIs($item['route']) || request()->routeIs('ar.'.$item['route'])
                           ? 'bg-primary/10 text-primary-500'
                           : 'text-body hover:bg-card hover:text-primary-500' }}">
                {{ $item['label'] }}
            </a>
        @endforeach
    </nav>

    <hr class="border-theme mb-6">

    {{-- Controls --}}
    <div class="flex items-center gap-3">
        <button data-theme-toggle class="mode-btn flex-1 rounded-xl gap-2 text-sm font-semibold">
            <span data-theme-icon>☽</span>
        </button>

        <a href="{{ $switchUrl }}"
           class="mode-btn flex-1 rounded-xl text-sm font-bold tracking-wider">
            {{ $isAr ? 'EN' : 'AR' }}
        </a>
    </div>

    <a href="{{ $r('contact') }}" class="btn-primary w-full justify-center mt-6 text-sm">
        {{ __('messages.contact_us') }}
    </a>
</div>
