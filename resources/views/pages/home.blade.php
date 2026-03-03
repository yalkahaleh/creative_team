@extends('layouts.app')
@php
    $locale = App::getLocale();
    $isAr   = $locale === 'ar';
    $r      = fn($name) => $isAr ? route("ar.$name") : route($name);
    $h      = __('messages.home');
    $waLink = 'https://wa.me/963940832959?text=' . urlencode($isAr ? 'مرحباً، أريد حجز استشارة مجانية' : 'Hello, I\'d like to book a free consultation');
@endphp

@section('content')

<section class="hero-section relative flex items-center justify-center overflow-hidden" style="background:var(--bg)">

    <div class="hero-digital-bg"></div>

    <div class="glow-orb w-[500px] h-[500px] opacity-15 dark:opacity-25"
         style="background:#289db9; top:-5%; right:-5%;"></div>
    <div class="glow-orb w-80 h-80 opacity-10 dark:opacity-20"
         style="background:#3f5965; bottom:10%; left:-5%;"></div>

    <div class="float-obj float-a text-3xl" style="top:15%; {{ $isAr ? 'left' : 'right' }}:8%;">🎨</div>
    <div class="float-obj float-b text-2xl" style="top:25%; {{ $isAr ? 'right' : 'left' }}:6%;">💻</div>
    <div class="float-obj float-c text-3xl" style="bottom:20%; {{ $isAr ? 'left' : 'right' }}:12%;">🚀</div>
    <div class="float-obj float-a text-2xl" style="bottom:30%; {{ $isAr ? 'right' : 'left' }}:8%;">📱</div>

    <div class="relative z-10 text-center px-4 max-w-4xl mx-auto py-12">
        <div class="section-tag justify-center mb-6 reveal">{{ $h['hero_tag'] }}</div>

        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6 reveal reveal-delay-1 text-body"
            style="line-height:{{ $isAr ? '1.4' : '1.15' }}">
            <span class="gradient-text">{{ $h['hero_title'] }}</span>
        </h1>

        <p class="text-base md:text-lg text-dim max-w-2xl mx-auto mb-3 reveal reveal-delay-2 leading-relaxed">
            {{ $h['hero_services'] }}
        </p>
        <p class="text-sm text-dim/70 max-w-xl mx-auto mb-10 reveal reveal-delay-2">
            {{ $h['hero_tagline'] }}
        </p>

        <div class="flex flex-wrap gap-4 justify-center reveal reveal-delay-3">
            <a href="{{ $waLink }}" target="_blank" rel="noopener" class="btn-primary">
                {{ $h['hero_cta1'] }}
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
            <a href="{{ $r('services') }}" class="btn-outline">
                {{ $h['hero_cta2'] }}
            </a>
        </div>
    </div>

    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-1 opacity-40 animate-bounce">
        <svg class="w-5 h-5 text-dim" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
        </svg>
    </div>
</section>

<section class="py-5 border-y border-theme bg-surface overflow-hidden">
    <div class="max-w-5xl mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-px bg-border">
            @foreach ($h['trust'] as $i => $badge)
            <div class="trust-badge reveal reveal-delay-{{ $i + 1 }}">
                <div class="trust-value">{{ $badge['value'] }}</div>
                <div class="trust-label">{{ $badge['label'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-24 px-4" style="background:var(--bg)">
    <div class="max-w-5xl mx-auto">
        <div class="glass-card p-6 md:p-12 flex flex-col md:flex-row items-center gap-6 md:gap-10">

            <div class="flex-shrink-0 who-icon-wrap reveal">
                <span class="text-6xl">🏢</span>
            </div>

            <div class="flex-1 text-center md:{{ $isAr ? 'text-right' : 'text-left' }}">
                <div class="section-tag mb-4 reveal {{ $isAr ? 'justify-end md:justify-start' : 'justify-center md:justify-start' }}">
                    {{ $h['who_tag'] }}
                </div>
                <h2 class="text-2xl md:text-3xl font-black text-body mb-4 reveal reveal-delay-1">
                    {{ $h['who_title'] }}
                </h2>
                <p class="text-dim leading-relaxed mb-6 reveal reveal-delay-2">
                    {{ $h['who_text'] }}
                </p>
                <a href="{{ $r('about') }}" class="btn-outline reveal reveal-delay-3">
                    {{ $h['who_button'] }}
                    <svg class="w-4 h-4 {{ $isAr ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="py-24 px-4 bg-surface border-t border-theme">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-14">
            <div class="section-tag justify-center mb-4 reveal">{{ $h['services_tag'] }}</div>
            <h2 class="text-3xl md:text-4xl font-black text-body mb-4 reveal reveal-delay-1">
                {{ $h['services_title'] }}
            </h2>
            <p class="text-dim max-w-2xl mx-auto reveal reveal-delay-2">
                {{ $h['services_sub'] }}
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            @foreach ($h['services_cards'] as $i => $card)
            <a href="{{ $r('services') }}"
               class="glass-card tilt-card p-7 text-center block group reveal reveal-delay-{{ $i + 1 }}">
                <div class="text-5xl mb-4 transition-transform duration-300 group-hover:scale-110">
                    {{ $card['emoji'] }}
                </div>
                <h3 class="font-bold text-body text-base mb-2">{{ $card['title'] }}</h3>
                <p class="text-dim text-sm leading-relaxed">{{ $card['desc'] }}</p>
            </a>
            @endforeach
        </div>

        <div class="text-center">
            <a href="{{ $r('services') }}" class="btn-primary reveal">
                {{ __('messages.view_all') }}
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>

<section class="py-24 px-4 bg-surface border-t border-theme">
    <div class="max-w-5xl mx-auto">
        <div class="text-center mb-14">
            <div class="section-tag justify-center mb-4 reveal">{{ $h['why_tag'] }}</div>
            <h2 class="text-3xl md:text-4xl font-black text-body reveal reveal-delay-1">
                {{ $h['why_title'] }}
            </h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @php $icons = [
                'users'       => '<path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>',
                'map'         => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>',
                'bar-chart-2' => '<path stroke-linecap="round" stroke-linejoin="round" d="M18 20V10M12 20V4M6 20v-6"/>',
                'settings'    => '<path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><circle cx="12" cy="12" r="3"/>',
                'refresh-cw'  => '<polyline points="23 4 23 10 17 10"/><polyline points="1 20 1 14 7 14"/><path d="M3.51 9a9 9 0 0114.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0020.49 15"/>',
                'globe'       => '<circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/>',
            ]; @endphp

            @foreach ($h['why_items'] as $i => $item)
            <div class="why-item-card reveal reveal-delay-{{ ($i % 3) + 1 }}">
                <div class="why-item-icon">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        {!! $icons[$item['icon']] ?? '' !!}
                    </svg>
                </div>
                <p class="text-body font-semibold text-sm leading-relaxed">{{ $item['text'] }}</p>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-10 reveal">
            <a href="{{ $r('about') }}" class="btn-outline">
                {{ $isAr ? 'تعرّف علينا أكثر' : 'Learn More About Us' }}
                <svg class="w-4 h-4 {{ $isAr ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>

<section class="cta-section py-24 px-4 relative overflow-hidden">

    <div class="cta-ring w-64 h-64" style="top:50%; left:50%; transform:translate(-50%,-50%); animation-delay:0s;"></div>
    <div class="cta-ring w-96 h-96" style="top:50%; left:50%; transform:translate(-50%,-50%); animation-delay:1.5s;"></div>
    <div class="cta-ring w-[32rem] h-[32rem]" style="top:50%; left:50%; transform:translate(-50%,-50%); animation-delay:3s;"></div>

    <div class="relative z-10 max-w-3xl mx-auto text-center">
        <div class="section-tag justify-center mb-6 reveal" style="background:rgba(40,157,185,.2); border-color:rgba(40,157,185,.4);">
            {{ $h['cta_tag'] }}
        </div>
        <h2 class="text-3xl md:text-5xl font-black text-white mb-6 reveal reveal-delay-1 leading-tight">
            {{ $h['cta_title'] }}
        </h2>
        <p class="text-white/70 text-lg mb-10 reveal reveal-delay-2 leading-relaxed">
            {{ $h['cta_text'] }}
        </p>
        <a href="{{ $waLink }}" target="_blank" rel="noopener"
           class="btn-primary text-lg px-10 py-4 reveal reveal-delay-3">
            {{ $h['cta_button'] }}
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
        </a>
    </div>
</section>

@endsection
