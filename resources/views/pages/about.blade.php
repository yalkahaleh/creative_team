@extends('layouts.app')
@php
    $locale = App::getLocale();
    $isAr   = $locale === 'ar';
    $r      = fn($name) => $isAr ? route("ar.$name") : route($name);
@endphp

@section('content')

{{-- ══════════════════════════════════════════════════════
     HERO SECTION
══════════════════════════════════════════════════════ --}}
<section class="hero-section relative flex items-center justify-center overflow-hidden"
         style="background: var(--bg);">

    <div class="hero-digital-bg"></div>

    <div class="glow-orb w-96 h-96 opacity-20 dark:opacity-30"
         style="background:#289db9; top:10%; left:5%;"></div>
    <div class="glow-orb w-72 h-72 opacity-10 dark:opacity-20"
         style="background:#3f5965; bottom:10%; right:5%;"></div>

    {{-- Floating objects --}}
    <span class="float-obj float-a" style="top:10%; left:6%;">🏆</span>
    <span class="float-obj float-b" style="top:15%; right:8%;">🚀</span>
    <span class="float-obj float-c" style="bottom:20%; left:5%;">💡</span>
    <span class="float-obj float-a" style="bottom:16%; right:6%; animation-delay:-3s;">🎯</span>
    <span class="float-obj float-b" style="top:50%; left:2%; animation-delay:-1.5s;">⚡</span>

    <div class="relative z-10 text-center px-4 max-w-4xl mx-auto">
        <div class="section-tag mb-6 justify-center reveal">
            {{ __('messages.about.hero_tag') }}
        </div>
        <h1 class="text-5xl md:text-7xl font-black mb-6 reveal reveal-delay-1 leading-tight">
            <span class="gradient-text">{{ __('messages.about.hero_title') }}</span>
        </h1>
        <p class="text-lg md:text-xl text-dim max-w-2xl mx-auto leading-relaxed reveal reveal-delay-2">
            {{ __('messages.about.hero_sub') }}
        </p>
        <div class="flex flex-wrap gap-4 justify-center mt-10 reveal reveal-delay-3">
            <a href="{{ $r('contact') }}" class="btn-primary">
                {{ __('messages.contact_us') }}
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
            <a href="{{ $r('services') }}" class="btn-outline">
                {{ __('messages.view_all') }}
            </a>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════════════════
     STATS BAR
══════════════════════════════════════════════════════ --}}
<section class="py-14 bg-surface border-y border-theme overflow-hidden">
    <div class="max-w-5xl mx-auto px-4">
        <div class="grid grid-cols-3 gap-6 text-center">

            @php
            $stats = [
                ['value' => __('messages.about.stat_projects'), 'label' => __('messages.about.stat_projects_label')],
                ['value' => __('messages.about.stat_clients'),  'label' => __('messages.about.stat_clients_label')],
                ['value' => __('messages.about.stat_years'),    'label' => __('messages.about.stat_years_label')],
            ];
            @endphp

            @foreach($stats as $i => $stat)
            <div class="reveal {{ $i === 0 ? '' : ($i === 1 ? 'reveal-delay-1' : 'reveal-delay-2') }}">
                <div class="text-4xl md:text-5xl font-black gradient-text mb-1">{{ $stat['value'] }}</div>
                <div class="text-dim text-sm font-medium">{{ $stat['label'] }}</div>
            </div>
            @endforeach

        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════════════════
     WHO WE ARE
══════════════════════════════════════════════════════ --}}
<section class="py-24 px-4" style="background: var(--bg);">
    <div class="max-w-6xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

            {{-- Text Side --}}
            <div>
                <div class="section-tag mb-4 reveal">{{ __('messages.about.who_tag') }}</div>
                <h2 class="text-4xl md:text-5xl font-black text-body mb-6 reveal reveal-delay-1">
                    {{ __('messages.about.who_title') }}
                </h2>
                <p class="text-dim text-lg leading-relaxed mb-5 reveal reveal-delay-2">
                    {{ __('messages.about.who_text') }}
                </p>
                <p class="text-dim text-base leading-relaxed reveal reveal-delay-3"
                   style="border-{{ $isAr ? 'right' : 'left' }}:3px solid var(--primary);
                          padding-{{ $isAr ? 'right' : 'left' }}:1.25rem;">
                    {{ __('messages.about.who_text2') }}
                </p>
            </div>

            {{-- Visual Side --}}
            <div class="reveal reveal-delay-2">
                <div class="relative">
                    {{-- Main card --}}
                    <div class="glass-card p-8 relative z-10">
                        <div class="grid grid-cols-2 gap-4">
                            @php
                            $pillars = [
                                ['emoji' => '🎨', 'label' => $isAr ? 'تصميم إبداعي' : 'Creative Design'],
                                ['emoji' => '📱', 'label' => $isAr ? 'إدارة سوشيال' : 'Social Media'],
                                ['emoji' => '📈', 'label' => $isAr ? 'تسويق رقمي' : 'Digital Marketing'],
                                ['emoji' => '💻', 'label' => $isAr ? 'تطوير وبرمجة' : 'Development'],
                                ['emoji' => '🎬', 'label' => $isAr ? 'إنتاج فيديو' : 'Video Production'],
                                ['emoji' => '📷', 'label' => $isAr ? 'تصوير احترافي' : 'Photography'],
                            ];
                            @endphp
                            @foreach($pillars as $j => $pillar)
                            <div class="about-pillar-item"
                                 style="animation-delay: {{ $j * 0.1 }}s">
                                <span class="text-2xl">{{ $pillar['emoji'] }}</span>
                                <span class="text-sm font-semibold text-body">{{ $pillar['label'] }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- Decorative blobs --}}
                    <div class="absolute -top-6 -right-6 w-32 h-32 rounded-full opacity-20"
                         style="background: radial-gradient(circle, #289db9, transparent); filter: blur(20px);"></div>
                    <div class="absolute -bottom-6 -left-6 w-24 h-24 rounded-full opacity-15"
                         style="background: radial-gradient(circle, #3f5965, transparent); filter: blur(16px);"></div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════════════════
     WHY WE WERE FOUNDED
══════════════════════════════════════════════════════ --}}
<section class="py-24 px-4 bg-surface border-y border-theme">
    <div class="max-w-5xl mx-auto">

        <div class="text-center mb-16">
            <div class="section-tag justify-center mb-4 reveal">{{ __('messages.about.why_tag') }}</div>
            <h2 class="text-4xl md:text-5xl font-black text-body mb-4 reveal reveal-delay-1">
                {{ __('messages.about.why_title') }}
            </h2>
            <p class="text-dim text-lg reveal reveal-delay-2">{{ __('messages.about.why_intro') }}</p>
        </div>

        {{-- Problem Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            @foreach(__('messages.about.problems') as $k => $problem)
            <div class="about-problem-card reveal {{ $k === 0 ? '' : ($k === 1 ? 'reveal-delay-1' : 'reveal-delay-2') }}">
                <div class="problem-icon-wrap mb-4">
                    @if($problem['icon'] === 'alert-circle')
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/>
                        <line x1="12" y1="16" x2="12.01" y2="16"/>
                    </svg>
                    @elseif($problem['icon'] === 'dollar-sign')
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <line x1="12" y1="1" x2="12" y2="23"/>
                        <path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/>
                    </svg>
                    @else
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <rect x="3" y="3" width="18" height="18" rx="2"/>
                        <circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/>
                    </svg>
                    @endif
                </div>
                <p class="text-body font-semibold text-base">{{ $problem['text'] }}</p>
            </div>
            @endforeach
        </div>

        {{-- Solution Banner --}}
        <div class="about-solution-banner reveal reveal-delay-3">
            <div class="solution-icon">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <p class="text-body text-base leading-relaxed">{{ __('messages.about.why_solution') }}</p>
        </div>

    </div>
</section>

{{-- ══════════════════════════════════════════════════════
     VISION & MISSION
══════════════════════════════════════════════════════ --}}
<section class="py-24 px-4" style="background: var(--bg);">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8">

        {{-- Vision --}}
        <div class="vision-card glass-card p-10 reveal">
            <div class="vm-icon-wrap mb-6" style="background: linear-gradient(135deg,rgba(40,157,185,0.2),rgba(40,157,185,0.05));">
                <svg class="w-7 h-7 text-primary-500" style="color:var(--primary)" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
            </div>
            <div class="section-tag mb-3">{{ __('messages.about.vision_tag') }}</div>
            <p class="text-dim text-base leading-relaxed">{{ __('messages.about.vision_text') }}</p>
        </div>

        {{-- Mission --}}
        <div class="mission-card glass-card p-10 reveal reveal-delay-2">
            <div class="vm-icon-wrap mb-6" style="background: linear-gradient(135deg,rgba(63,89,101,0.25),rgba(63,89,101,0.08));">
                <svg class="w-7 h-7" style="color:var(--primary)" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
            </div>
            <div class="section-tag mb-3">{{ __('messages.about.mission_tag') }}</div>
            <p class="text-dim text-base leading-relaxed">{{ __('messages.about.mission_text') }}</p>
        </div>

    </div>
</section>

{{-- ══════════════════════════════════════════════════════
     WHAT SETS US APART
══════════════════════════════════════════════════════ --}}
<section class="py-24 px-4 bg-surface border-y border-theme">
    <div class="max-w-5xl mx-auto">

        <div class="text-center mb-14">
            <div class="section-tag justify-center mb-4 reveal">{{ __('messages.about.diff_tag') }}</div>
            <h2 class="text-4xl md:text-5xl font-black text-body reveal reveal-delay-1">
                {{ __('messages.about.diff_title') }}
            </h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            @foreach(__('messages.about.diffs') as $idx => $diff)
            @php $delay = ['', 'reveal-delay-1', 'reveal-delay-2', 'reveal-delay-3', 'reveal-delay-4', 'reveal-delay-5'][$idx] ?? ''; @endphp
            <div class="diff-item reveal {{ $delay }}">
                <div class="diff-check">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                        <polyline points="20 6 9 17 4 12"/>
                    </svg>
                </div>
                <span class="text-body font-semibold text-base">{{ $diff }}</span>
            </div>
            @endforeach
        </div>

    </div>
</section>

{{-- ══════════════════════════════════════════════════════
     OUR PHILOSOPHY
══════════════════════════════════════════════════════ --}}
<section class="py-24 px-4" style="background: var(--bg);">
    <div class="max-w-5xl mx-auto">

        <div class="text-center mb-14">
            <div class="section-tag justify-center mb-4 reveal">{{ __('messages.about.phil_tag') }}</div>
            <h2 class="text-4xl md:text-5xl font-black text-body reveal reveal-delay-1">
                {{ __('messages.about.phil_title') }}
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach(__('messages.about.phils') as $m => $phil)
            @php $delay = ['', 'reveal-delay-2', 'reveal-delay-4'][$m] ?? ''; @endphp
            <div class="phil-card why-card reveal {{ $delay }}">
                {{-- Icon --}}
                <div class="phil-icon mb-5">
                    @if($phil['icon'] === 'trending-up')
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/>
                        <polyline points="17 6 23 6 23 12"/>
                    </svg>
                    @elseif($phil['icon'] === 'feather')
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M20.24 12.24a6 6 0 00-8.49-8.49L5 10.5V19h8.5z"/>
                        <line x1="16" y1="8" x2="2" y2="22"/>
                        <line x1="17.5" y1="15" x2="9" y2="15"/>
                    </svg>
                    @else
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <rect x="2" y="3" width="20" height="14" rx="2"/>
                        <line x1="8" y1="21" x2="16" y2="21"/>
                        <line x1="12" y1="17" x2="12" y2="21"/>
                    </svg>
                    @endif
                </div>
                <div class="text-lg font-black text-body mb-2">{{ $phil['label'] }}</div>
                <p class="text-dim text-sm leading-relaxed">{{ $phil['text'] }}</p>
            </div>
            @endforeach
        </div>

    </div>
</section>

{{-- ══════════════════════════════════════════════════════
     CTA
══════════════════════════════════════════════════════ --}}
<section class="cta-section py-24 px-4">
    {{-- decorative rings --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="cta-ring" style="width:500px;height:500px;top:-100px;{{ $isAr ? 'right' : 'left' }}:-100px;"></div>
        <div class="cta-ring" style="width:350px;height:350px;bottom:-80px;{{ $isAr ? 'left' : 'right' }}:-80px; animation-delay:-3s;"></div>
    </div>
    <div class="relative z-10 max-w-3xl mx-auto text-center">
        <div class="section-tag justify-center mb-6 reveal" style="color:rgba(40,157,185,0.9)">
            Creative Team
        </div>
        <h2 class="text-4xl md:text-5xl font-black text-white mb-6 reveal reveal-delay-1 leading-tight">
            {{ __('messages.about.cta_title') }}
        </h2>
        <p class="text-lg leading-relaxed mb-10 reveal reveal-delay-2"
           style="color:rgba(232,244,248,0.75)">
            {{ __('messages.about.cta_sub') }}
        </p>
        <div class="flex flex-wrap gap-4 justify-center reveal reveal-delay-3">
            <a href="{{ $r('contact') }}" class="btn-primary" style="font-size:1.05rem; padding:1rem 2.25rem;">
                {{ __('messages.about.cta_button') }}
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>

@endsection
