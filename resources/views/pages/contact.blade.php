@extends('layouts.app')
@php
    $locale = App::getLocale();
    $isAr   = $locale === 'ar';
    $r      = fn($name) => $isAr ? route("ar.$name") : route($name);

    $waNumber = '963940832959';
    $waMsg    = $isAr
        ? urlencode('مرحباً، أود الاستفسار عن خدماتكم.')
        : urlencode('Hello, I would like to inquire about your services.');
    $waLink   = "https://wa.me/{$waNumber}?text={$waMsg}";
@endphp

@section('content')

{{-- ══════════════════════════════════════════════════════
     HERO
══════════════════════════════════════════════════════ --}}
<section class="hero-section relative flex items-center justify-center overflow-hidden"
         style="background: var(--bg);">

    <div class="hero-digital-bg"></div>

    <div class="glow-orb w-96 h-96 opacity-20 dark:opacity-30"
         style="background:#289db9; top:5%; left:3%;"></div>
    <div class="glow-orb w-64 h-64 opacity-10 dark:opacity-20"
         style="background:#3f5965; bottom:8%; right:4%;"></div>

    <span class="float-obj float-a" style="top:12%; left:6%;">📞</span>
    <span class="float-obj float-b" style="top:16%; right:8%;">💬</span>
    <span class="float-obj float-c" style="bottom:20%; left:5%;">✉️</span>
    <span class="float-obj float-a" style="bottom:16%; right:6%; animation-delay:-3s;">🤝</span>

    <div class="relative z-10 text-center px-4 max-w-4xl mx-auto">
        <div class="section-tag mb-6 justify-center reveal">
            {{ __('messages.contact.hero_tag') }}
        </div>
        <h1 class="text-5xl md:text-7xl font-black mb-6 reveal reveal-delay-1 leading-tight">
            <span class="gradient-text">{{ __('messages.contact.hero_title') }}</span>
        </h1>
        <p class="text-lg md:text-xl text-dim max-w-2xl mx-auto leading-relaxed reveal reveal-delay-2">
            {{ __('messages.contact.hero_sub') }}
        </p>
        <div class="flex flex-wrap gap-4 justify-center mt-10 reveal reveal-delay-3">
            <a href="{{ $waLink }}" target="_blank" rel="noopener" class="btn-primary">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                    <path d="M11.998 0C5.372 0 0 5.373 0 12c0 2.117.554 4.103 1.523 5.82L.057 23.776a.5.5 0 00.613.63l6.115-1.601A11.944 11.944 0 0011.998 24C18.626 24 24 18.627 24 12S18.626 0 11.998 0zm0 21.818a9.82 9.82 0 01-5.012-1.374l-.36-.214-3.728.977.994-3.638-.235-.374A9.808 9.808 0 012.18 12c0-5.42 4.4-9.818 9.818-9.818S21.818 6.58 21.818 12c0 5.419-4.4 9.818-9.82 9.818z"/>
                </svg>
                {{ $isAr ? 'تحدث معنا الآن' : 'Chat With Us Now' }}
            </a>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════════════════
     FREE CONSULTATION BANNER
══════════════════════════════════════════════════════ --}}
<section class="py-16 px-4 bg-surface border-y border-theme">
    <div class="max-w-4xl mx-auto">
        <div class="consult-banner reveal">
            <div class="consult-icon">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                </svg>
            </div>
            <div class="flex-1 min-w-0">
                <div class="section-tag mb-2">{{ __('messages.contact.cta_tag') }}</div>
                <h2 class="text-xl md:text-2xl font-black text-body mb-1">
                    {{ __('messages.contact.cta_title') }}
                </h2>
                <p class="text-dim text-sm">{{ __('messages.contact.cta_text') }}</p>
            </div>
            <a href="{{ $waLink }}" target="_blank" rel="noopener"
               class="btn-primary flex-shrink-0">
                🚀 {{ $isAr ? 'احجز الآن — مجاناً' : 'Book Now — It\'s Free' }}
            </a>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════════════════
     DIRECT CONTACT + SOCIAL
══════════════════════════════════════════════════════ --}}
<section class="py-24 px-4" style="background: var(--bg);">
    <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10">

        {{-- Phone / WhatsApp --}}
        <div class="reveal">
            <div class="section-tag mb-4">{{ __('messages.contact.direct_tag') }}</div>
            <h3 class="text-2xl font-black text-body mb-6">{{ __('messages.contact.direct_title') }}</h3>

            @php $phones = __('messages.contact.phones'); @endphp

            <div class="space-y-3">
                {{-- First number → WhatsApp --}}
                @php
                    $waPhone  = preg_replace('/\D/', '', $phones[0]);
                    $waLink1  = "https://wa.me/{$waPhone}?text={$waMsg}";
                @endphp
                <a href="{{ $waLink1 }}" target="_blank" rel="noopener"
                   class="contact-phone-card">
                    <div class="contact-phone-icon" style="background:#25d366;">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                            <path d="M11.998 0C5.372 0 0 5.373 0 12c0 2.117.554 4.103 1.523 5.82L.057 23.776a.5.5 0 00.613.63l6.115-1.601A11.944 11.944 0 0011.998 24C18.626 24 24 18.627 24 12S18.626 0 11.998 0zm0 21.818a9.82 9.82 0 01-5.012-1.374l-.36-.214-3.728.977.994-3.638-.235-.374A9.808 9.808 0 012.18 12c0-5.42 4.4-9.818 9.818-9.818S21.818 6.58 21.818 12c0 5.419-4.4 9.818-9.82 9.818z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-xs font-bold text-dim uppercase tracking-wider mb-0.5">WhatsApp</div>
                        <div class="font-bold text-body text-base" dir="ltr">{{ $phones[0] }}</div>
                    </div>
                    <svg class="w-4 h-4 text-dim {{ $isAr ? 'me-0 ms-auto' : 'ms-auto' }}"
                         fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="{{ $isAr ? 'M7 16l-4-4m0 0l4-4m-4 4h18' : 'M17 8l4 4m0 0l-4 4m4-4H3' }}"/>
                    </svg>
                </a>

                {{-- Second number → Call --}}
                @php $callPhone = preg_replace('/\D/', '', $phones[1]); @endphp
                <a href="tel:+{{ $callPhone }}"
                   class="contact-phone-card">
                    <div class="contact-phone-icon" style="background:var(--primary);">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-xs font-bold text-dim uppercase tracking-wider mb-0.5">{{ $isAr ? 'اتصال مباشر' : 'Direct Call' }}</div>
                        <div class="font-bold text-body text-base" dir="ltr">{{ $phones[1] }}</div>
                    </div>
                    <svg class="w-4 h-4 text-dim {{ $isAr ? 'me-0 ms-auto' : 'ms-auto' }}"
                         fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="{{ $isAr ? 'M7 16l-4-4m0 0l4-4m-4 4h18' : 'M17 8l4 4m0 0l-4 4m4-4H3' }}"/>
                    </svg>
                </a>
            </div>
        </div>

        {{-- Social Media --}}
        <div class="reveal reveal-delay-2">
            <div class="section-tag mb-4">{{ __('messages.contact.social_tag') }}</div>
            <h3 class="text-2xl font-black text-body mb-6">{{ __('messages.contact.social_title') }}</h3>

            <div class="space-y-4">
                {{-- Instagram --}}
                <a href="https://www.instagram.com/creative.team2025"
                   target="_blank" rel="noopener"
                   class="contact-social-card">
                    <div class="contact-social-icon"
                         style="background:linear-gradient(135deg,#f09433,#e6683c,#dc2743,#cc2366,#bc1888);">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                            <circle cx="12" cy="12" r="4"/>
                            <circle cx="17.5" cy="6.5" r="0.5" fill="white" stroke="none"/>
                        </svg>
                    </div>
                    <div>
                        <div class="font-bold text-body text-base">Instagram</div>
                        <div class="text-dim text-sm">{{ __('messages.contact.instagram_handle') }}</div>
                    </div>
                    <svg class="w-4 h-4 text-dim {{ $isAr ? 'me-0 ms-auto' : 'ms-auto' }}"
                         fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="{{ $isAr ? 'M7 16l-4-4m0 0l4-4m-4 4h18' : 'M17 8l4 4m0 0l-4 4m4-4H3' }}"/>
                    </svg>
                </a>

                {{-- Facebook --}}
                <a href="https://www.facebook.com/share/1F6DdThmBh/"
                   target="_blank" rel="noopener"
                   class="contact-social-card">
                    <div class="contact-social-icon" style="background:#1877f2;">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="font-bold text-body text-base">Facebook</div>
                        <div class="text-dim text-sm">{{ __('messages.contact.facebook_handle') }}</div>
                    </div>
                    <svg class="w-4 h-4 text-dim {{ $isAr ? 'me-0 ms-auto' : 'ms-auto' }}"
                         fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="{{ $isAr ? 'M7 16l-4-4m0 0l4-4m-4 4h18' : 'M17 8l4 4m0 0l-4 4m4-4H3' }}"/>
                    </svg>
                </a>
            </div>
        </div>

    </div>
</section>

{{-- ══════════════════════════════════════════════════════
     CONTACT FORM
══════════════════════════════════════════════════════ --}}
<section class="py-24 px-4 bg-surface border-y border-theme">
    <div class="max-w-2xl mx-auto">

        <div class="text-center mb-12">
            <div class="section-tag justify-center mb-4 reveal">{{ __('messages.contact.form_tag') }}</div>
            <h2 class="text-4xl font-black text-body reveal reveal-delay-1">
                {{ __('messages.contact.form_title') }}
            </h2>
        </div>

        <form class="glass-card p-8 md:p-10 reveal reveal-delay-2"
              id="contactForm" novalidate>

            {{-- Name --}}
            <div class="form-group">
                <label class="form-label">{{ __('messages.contact.field_name') }}</label>
                <input type="text" name="name" required
                       class="form-input"
                       placeholder="{{ $isAr ? 'أدخل اسمك الكامل' : 'Enter your full name' }}">
            </div>

            {{-- Phone --}}
            <div class="form-group">
                <label class="form-label">{{ __('messages.contact.field_phone') }}</label>
                <input type="tel" name="phone" required dir="ltr"
                       class="form-input {{ $isAr ? 'text-right' : '' }}"
                       placeholder="+963 9XX XXX XXX">
            </div>

            {{-- Service --}}
            <div class="form-group">
                <label class="form-label">{{ __('messages.contact.field_service') }}</label>
                <select name="service" class="form-input form-select">
                    <option value="">{{ $isAr ? '— اختر الخدمة —' : '— Select a service —' }}</option>
                    @foreach(__('messages.contact.services_list') as $svc)
                    <option value="{{ $svc }}">{{ $svc }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Message --}}
            <div class="form-group">
                <label class="form-label">{{ __('messages.contact.field_message') }}</label>
                <textarea name="message" rows="4" required
                          class="form-input form-textarea"
                          placeholder="{{ __('messages.contact.field_message_placeholder') }}"></textarea>
            </div>

            {{-- Submit --}}
            <button type="submit" id="formSubmit"
                    class="btn-primary w-full justify-center text-base py-4">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                </svg>
                {{ __('messages.contact.form_submit') }}
            </button>

            {{-- Success --}}
            <div id="formSuccess" class="form-success hidden mt-4">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                {{ $isAr ? 'تم استلام رسالتك! سنتواصل معك قريباً.' : 'Message received! We\'ll get back to you soon.' }}
            </div>

        </form>
    </div>
</section>

{{-- ══════════════════════════════════════════════════════
     CLOSING QUOTE
══════════════════════════════════════════════════════ --}}
<section class="cta-section py-24 px-4">
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="cta-ring" style="width:500px;height:500px;top:-120px;{{ $isAr ? 'right' : 'left' }}:-120px;"></div>
        <div class="cta-ring" style="width:300px;height:300px;bottom:-80px;{{ $isAr ? 'left' : 'right' }}:-80px;animation-delay:-3s;"></div>
    </div>
    <div class="relative z-10 max-w-3xl mx-auto text-center">
        <div class="text-5xl mb-6 reveal">✨</div>
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4 reveal reveal-delay-1">
            {{ __('messages.contact.closing_title') }}
        </h2>
        <p class="text-xl font-bold mb-3 reveal reveal-delay-2"
           style="color:rgba(40,157,185,0.9)">
            {{ $isAr ? 'نحن لا ننتظر الفرص… نحن نصنعها.' : 'We don\'t wait for opportunities — we create them.' }}
        </p>
        <p class="text-base leading-relaxed mb-10 reveal reveal-delay-3"
           style="color:rgba(232,244,248,0.75)">
            {{ __('messages.contact.closing_text') }}
        </p>
        <div class="flex flex-wrap gap-4 justify-center reveal reveal-delay-4">
            <a href="{{ $waLink }}" target="_blank" rel="noopener"
               class="btn-primary" style="font-size:1.05rem; padding:1rem 2.25rem;">
                🤝 {{ $isAr ? 'ابدأ رحلتك معنا' : 'Start Your Journey With Us' }}
            </a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
document.getElementById('contactForm')?.addEventListener('submit', function(e) {
    e.preventDefault();
    const btn     = document.getElementById('formSubmit');
    const success = document.getElementById('formSuccess');

    btn.disabled = true;
    btn.style.opacity = '0.7';

    // Will be wired to email submission later
    setTimeout(() => {
        success.classList.remove('hidden');
        btn.disabled = false;
        btn.style.opacity = '1';
        this.reset();
    }, 600);
});
</script>
@endpush
