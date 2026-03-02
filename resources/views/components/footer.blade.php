@php
    $locale = App::getLocale();
    $isAr   = $locale === 'ar';
    $r      = fn($name) => $isAr ? route("ar.$name") : route($name);
@endphp
<footer class="site-footer">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-16">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">

            {{-- Brand Column --}}
            <div class="lg:col-span-2">
                <a href="{{ $r('home') }}" class="inline-flex mb-4">
                    <img src="{{ asset('images/icon-light.png') }}" alt="Creative Team" class="h-16 w-auto block dark:hidden">
                    <img src="{{ asset('images/icon-dark.png') }}"  alt="Creative Team" class="h-16 w-auto hidden dark:block">
                </a>

                <p class="text-xl font-bold mb-3" style="color:var(--primary)">
                    {{ __('messages.footer.slogan') }}
                </p>
                <p class="text-dim text-sm leading-relaxed max-w-sm">
                    {{ __('messages.footer.description') }}
                </p>

                <div class="flex items-center gap-3 mt-6">
                    <a href="https://www.facebook.com/share/1F6DdThmBh/" target="_blank" rel="noopener" class="social-btn" aria-label="Facebook">
                        <svg class="w-4 h-4 select-none" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/>
                        </svg>
                    </a>
                    <a href="https://www.instagram.com/creative.team2025" target="_blank" rel="noopener" class="social-btn" aria-label="Instagram">
                        <svg class="w-4 h-4 select-none" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                            <circle cx="12" cy="12" r="4"/>
                            <circle cx="17.5" cy="6.5" r="0.5" fill="currentColor" stroke="none"/>
                        </svg>
                    </a>
                    <a href="https://wa.me/963940832959" target="_blank" rel="noopener" class="social-btn" aria-label="WhatsApp">
                        <svg class="w-4 h-4 select-none" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                            <path d="M11.998 0C5.372 0 0 5.373 0 12c0 2.117.554 4.103 1.523 5.82L.057 23.776a.5.5 0 00.613.63l6.115-1.601A11.944 11.944 0 0011.998 24C18.626 24 24 18.627 24 12S18.626 0 11.998 0zm0 21.818a9.82 9.82 0 01-5.012-1.374l-.36-.214-3.728.977.994-3.638-.235-.374A9.808 9.808 0 012.18 12c0-5.42 4.4-9.818 9.818-9.818S21.818 6.58 21.818 12c0 5.419-4.4 9.818-9.82 9.818z"/>
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Quick Links --}}
            <div>
                <h4 class="font-bold text-body mb-5 text-sm tracking-wider uppercase">
                    {{ __('messages.footer.quick_links') }}
                </h4>
                <ul class="space-y-3">
                    <li><a href="{{ $r('home') }}"     class="footer-link">{{ __('messages.nav.home') }}</a></li>
                    <li><a href="{{ $r('services') }}" class="footer-link">{{ __('messages.nav.services') }}</a></li>
                    <li><a href="{{ $r('about') }}"    class="footer-link">{{ __('messages.nav.about') }}</a></li>
                    <li><a href="{{ $r('contact') }}"  class="footer-link">{{ __('messages.nav.contact') }}</a></li>
                </ul>
            </div>

            {{-- Contact Info --}}
            <div>
                <h4 class="font-bold text-body mb-5 text-sm tracking-wider uppercase">
                    {{ __('messages.footer.contact') }}
                </h4>
                <ul class="space-y-4 text-dim text-sm">
                    <li class="flex items-center gap-3">
                        <span class="text-primary flex-shrink-0">
                            <svg class="w-4 h-4 select-none" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </span>
                        <a href="tel:{{ __('messages.footer.phone') }}"
                           class="hover:text-primary transition-colors" dir="ltr">
                            {{ __('messages.footer.phone') }}
                        </a>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="text-primary flex-shrink-0">
                            <svg class="w-4 h-4 select-none" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </span>
                        <a href="mailto:{{ __('messages.footer.email') }}"
                           class="hover:text-primary transition-colors break-all">
                            {{ __('messages.footer.email') }}
                        </a>
                    </li>
                </ul>
            </div>

        </div>

        <div class="border-t border-theme pt-6 flex flex-col sm:flex-row items-center justify-between gap-3 text-dim text-xs">
            <span>
                &copy; {{ date('Y') }} Creative Team. {{ __('messages.footer.rights') }}.
            </span>
            <span>
                {{ __('messages.footer.made_with') }}
                <span style="color:#e74c3c">♥</span>
                {{ $isAr ? 'بواسطة' : 'by' }}
                <a href="{{ $r('home') }}" class="font-semibold hover:text-primary transition-colors">Creative Team</a>
            </span>
        </div>

    </div>
</footer>
