@extends('layouts.app')
@php
    $locale = App::getLocale();
    $isAr   = $locale === 'ar';
    $r      = fn($name) => $isAr ? route("ar.$name") : route($name);
@endphp

@section('content')

<section class="hero-section relative flex items-center justify-center overflow-hidden"
         style="background: var(--bg);">

    <div class="hero-digital-bg"></div>

    <div class="glow-orb w-96 h-96 opacity-20 dark:opacity-30"
         style="background:#289db9; top:10%; left:5%;"></div>
    <div class="glow-orb w-72 h-72 opacity-10 dark:opacity-20"
         style="background:#3f5965; bottom:10%; right:5%;"></div>

    <span class="float-obj float-a text-3xl md:text-5xl" style="top:12%; left:7%;">💻</span>
    <span class="float-obj float-b text-2xl md:text-4xl" style="top:18%; right:9%;">📱</span>
    <span class="float-obj float-c text-3xl md:text-5xl" style="bottom:22%; left:6%;">🎨</span>
    <span class="float-obj float-a text-2xl md:text-4xl" style="bottom:18%; right:7%; animation-delay:-3s;">🎬</span>
    <span class="float-obj float-b text-2xl md:text-4xl" style="top:55%; left:3%; animation-delay:-1.5s;">📸</span>

    <div class="relative z-10 text-center px-4 max-w-4xl mx-auto">

        <div class="section-tag mb-6 justify-center reveal">
            {{ __('messages.services.hero_tag') }}
        </div>

        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6 reveal reveal-delay-1 text-body leading-tight">
            <span class="gradient-text">{{ __('messages.services.hero_title') }}</span>
        </h1>

        <p class="text-lg md:text-xl text-dim max-w-2xl mx-auto leading-relaxed reveal reveal-delay-2">
            {{ __('messages.services.hero_subtitle') }}
        </p>

        <div class="flex flex-wrap gap-4 justify-center mt-10 reveal reveal-delay-3">
            <a href="{{ $r('contact') }}" class="btn-primary">
                {{ __('messages.get_started') }}
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>


</section>

<section class="py-16 bg-surface border-y border-theme">
    <div class="max-w-5xl mx-auto px-4 text-center reveal">
        <p class="text-xl md:text-2xl font-bold text-body mb-3">
            {{ __('messages.services.intro_title') }}
        </p>
        <p class="text-dim text-base max-w-2xl mx-auto leading-relaxed">
            {{ __('messages.services.intro_text') }}
        </p>
    </div>
</section>

@php
$cats = [
    ['key' => 'dev',    'emoji' => '💻', 'label' => __('messages.services.cat_dev')],
    ['key' => 'social', 'emoji' => '📱', 'label' => __('messages.services.cat_social')],
    ['key' => 'design', 'emoji' => '🎨', 'label' => __('messages.services.cat_design')],
    ['key' => 'video',  'emoji' => '🎥', 'label' => __('messages.services.cat_video')],
    ['key' => 'photo',  'emoji' => '📸', 'label' => __('messages.services.cat_photo')],
];
@endphp

<div style="background:var(--bg)">

<div class="sticky top-[72px] z-40 bg-card border-b border-theme shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-3">
        <div class="flex items-center gap-2 overflow-x-auto no-scrollbar pb-0.5">
            @foreach ($cats as $cat)
                <button class="cat-tab flex-shrink-0" data-tab="{{ $cat['key'] }}">
                    <span>{{ $cat['emoji'] }}</span>
                    <span>{{ $cat['label'] }}</span>
                </button>
            @endforeach
        </div>
    </div>
</div>

<section class="service-section px-4 pt-12 pb-24" data-section="dev">
    <div class="max-w-7xl mx-auto">

        <div class="relative mb-12 reveal">
            <span class="section-number">01</span>
            <div class="{{ App::getLocale()==='ar' ? 'pr-8 md:pr-20' : 'pl-8 md:pl-20' }}">
                <div class="section-tag mb-3">
                    💻 {{ __('messages.services.cat_dev') }}
                </div>
                <h2 class="text-3xl md:text-4xl font-black text-body mb-3">
                    {{ __('messages.services.dev_title') }}
                </h2>
                <p class="text-dim text-lg max-w-xl leading-relaxed">
                    {{ __('messages.services.dev_subtitle') }}
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach (__('messages.services.dev_services') as $i => $svc)
            <div class="glass-card tilt-card p-6 reveal reveal-delay-{{ ($i % 6) + 1 }}">
                <div class="flex items-start gap-4 mb-4">
                    <div class="service-icon-wrap">
                        @include('components.icon', ['name' => $svc['icon']])
                    </div>
                    <h3 class="font-bold text-body text-base leading-snug mt-1">{{ $svc['title'] }}</h3>
                </div>
                <p class="text-dim text-sm leading-relaxed">{{ $svc['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="service-section px-4 pt-12 pb-24" data-section="social">
    <div class="max-w-7xl mx-auto">

        <div class="relative mb-10 reveal">
            <span class="section-number">02</span>
            <div class="{{ App::getLocale()==='ar' ? 'pr-8 md:pr-20' : 'pl-8 md:pl-20' }}">
                <div class="section-tag mb-3">
                    📱 {{ __('messages.services.cat_social') }}
                </div>
                <h2 class="text-3xl md:text-4xl font-black text-body mb-3">
                    {{ __('messages.services.social_title') }}
                </h2>
                <p class="text-dim text-lg max-w-xl leading-relaxed">
                    {{ __('messages.services.social_subtitle') }}
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach (__('messages.services.social_services') as $i => $svc)
            <div class="glass-card tilt-card p-6 reveal reveal-delay-{{ ($i % 6) + 1 }}">
                <div class="service-icon-wrap mb-4">
                    @include('components.icon', ['name' => $svc['icon']])
                </div>
                <h3 class="font-bold text-body text-sm mb-2">{{ $svc['title'] }}</h3>
                <p class="text-dim text-xs leading-relaxed">{{ $svc['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="service-section px-4 pt-12 pb-24" data-section="design">
    <div class="max-w-7xl mx-auto">

        <div class="relative mb-12 reveal">
            <span class="section-number">03</span>
            <div class="{{ App::getLocale()==='ar' ? 'pr-8 md:pr-20' : 'pl-8 md:pl-20' }}">
                <div class="section-tag mb-3">
                    🎨 {{ __('messages.services.cat_design') }}
                </div>
                <h2 class="text-3xl md:text-4xl font-black text-body mb-3">
                    {{ __('messages.services.design_title') }}
                </h2>
                <p class="text-dim text-lg max-w-xl leading-relaxed">
                    {{ __('messages.services.design_subtitle') }}
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach (__('messages.services.design_services') as $i => $svc)
            <div class="glass-card tilt-card p-6 reveal reveal-delay-{{ ($i % 6) + 1 }}">
                <div class="flex items-start gap-4 mb-4">
                    <div class="service-icon-wrap">
                        @include('components.icon', ['name' => $svc['icon']])
                    </div>
                    <h3 class="font-bold text-body text-base leading-snug mt-1">{{ $svc['title'] }}</h3>
                </div>
                <p class="text-dim text-sm leading-relaxed">{{ $svc['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="service-section px-4 pt-12 pb-24" data-section="video">
    <div class="max-w-7xl mx-auto">

        <div class="relative mb-12 reveal">
            <span class="section-number">04</span>
            <div class="{{ App::getLocale()==='ar' ? 'pr-8 md:pr-20' : 'pl-8 md:pl-20' }}">
                <div class="section-tag mb-3">
                    🎥 {{ __('messages.services.cat_video') }}
                </div>
                <h2 class="text-3xl md:text-4xl font-black text-body mb-3">
                    {{ __('messages.services.video_title') }}
                </h2>
                <p class="text-dim text-lg max-w-xl leading-relaxed">
                    {{ __('messages.services.video_subtitle') }}
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            @foreach (__('messages.services.video_services') as $i => $svc)
            <div class="glass-card tilt-card p-8 reveal reveal-delay-{{ $i + 1 }}">
                <div class="flex items-center gap-5 mb-4">
                    <div class="service-icon-wrap !w-14 !h-14 !rounded-2xl">
                        @include('components.icon', ['name' => $svc['icon']])
                    </div>
                    <h3 class="font-bold text-body text-lg">{{ $svc['title'] }}</h3>
                </div>
                <p class="text-dim leading-relaxed">{{ $svc['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="service-section px-4 pt-12 pb-24" data-section="photo">
    <div class="max-w-7xl mx-auto">

        <div class="relative mb-12 reveal">
            <span class="section-number">05</span>
            <div class="{{ App::getLocale()==='ar' ? 'pr-8 md:pr-20' : 'pl-8 md:pl-20' }}">
                <div class="section-tag mb-3">
                    📸 {{ __('messages.services.cat_photo') }}
                </div>
                <h2 class="text-3xl md:text-4xl font-black text-body mb-3">
                    {{ __('messages.services.photo_title') }}
                </h2>
                <p class="text-dim text-lg max-w-xl leading-relaxed">
                    {{ __('messages.services.photo_subtitle') }}
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach (__('messages.services.photo_services') as $i => $svc)
            <div class="glass-card tilt-card p-6 reveal reveal-delay-{{ ($i % 6) + 1 }}">
                <div class="flex items-start gap-4 mb-4">
                    <div class="service-icon-wrap">
                        @include('components.icon', ['name' => $svc['icon']])
                    </div>
                    <h3 class="font-bold text-body text-base leading-snug mt-1">{{ $svc['title'] }}</h3>
                </div>
                <p class="text-dim text-sm leading-relaxed">{{ $svc['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

</div>

<section class="py-24 bg-surface border-t border-theme">
    <div class="max-w-7xl mx-auto px-4">

        <div class="text-center mb-16 reveal">
            <div class="section-tag justify-center mb-4">
                {{ __('messages.services.why_title') }}
            </div>
            <h2 class="text-3xl md:text-4xl font-black text-body mb-4">
                {{ __('messages.services.why_title') }}
            </h2>
            <p class="text-dim max-w-2xl mx-auto leading-relaxed">
                {{ __('messages.services.why_subtitle') }}
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach (__('messages.services.why_items') as $i => $item)
            <div class="why-card reveal reveal-delay-{{ $i + 1 }}">
                <div class="service-icon-wrap mx-auto mb-5">
                    @include('components.icon', ['name' => $item['icon']])
                </div>
                <h3 class="font-bold text-body text-base mb-2">{{ $item['title'] }}</h3>
                <p class="text-dim text-sm leading-relaxed">{{ $item['desc'] }}</p>
            </div>
            @endforeach
        </div>

    </div>
</section>

<section class="cta-section py-28 px-4">

    <div class="absolute top-0 left-1/4 w-64 h-64 rounded-full opacity-20"
         style="background:#289db9; filter:blur(80px);"></div>
    <div class="absolute bottom-0 right-1/4 w-80 h-80 rounded-full opacity-10"
         style="background:#3f5965; filter:blur(100px);"></div>

    <div class="relative z-10 max-w-3xl mx-auto text-center">
        <div class="section-tag justify-center mb-6" style="color:#7dd3e8">
            Creative Team
        </div>

        <h2 class="text-4xl md:text-5xl font-black text-white mb-6 leading-tight">
            {{ __('messages.services.cta_title') }}
        </h2>

        <p class="text-lg leading-relaxed mb-10" style="color:rgba(255,255,255,0.75)">
            {{ __('messages.services.cta_subtitle') }}
        </p>

        <div class="flex flex-wrap gap-4 justify-center">
            <a href="{{ $r('contact') }}"
               class="inline-flex items-center gap-2 px-8 py-4 rounded-full font-bold text-neutral-900 bg-white
                      hover:scale-105 transition-transform shadow-xl">
                {{ __('messages.services.cta_button') }}
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
            <a href="https://wa.me/963940832959"
               class="inline-flex items-center gap-2 px-8 py-4 rounded-full font-bold border-2 text-white
                      border-white/30 hover:border-white hover:bg-white/10 transition-all">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                    <path d="M11.998 0C5.372 0 0 5.373 0 12c0 2.117.554 4.103 1.523 5.82L.057 23.776a.5.5 0 00.613.63l6.115-1.601A11.944 11.944 0 0011.998 24C18.626 24 24 18.627 24 12S18.626 0 11.998 0zm0 21.818a9.82 9.82 0 01-5.012-1.374l-.36-.214-3.728.977.994-3.638-.235-.374A9.808 9.808 0 012.18 12c0-5.42 4.4-9.818 9.818-9.818S21.818 6.58 21.818 12c0 5.419-4.4 9.818-9.82 9.818z"/>
                </svg>
                WhatsApp
            </a>
        </div>
    </div>

</section>

@endsection

@push('head')
    <title>{{ __('messages.services.hero_title') }} | Creative Team</title>
@endpush
