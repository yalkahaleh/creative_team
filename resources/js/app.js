import './bootstrap';

/* ═══════════════════════════════════════════
   Dark Mode — apply BEFORE render to avoid flash
═══════════════════════════════════════════ */
(function () {
    const saved = localStorage.getItem('theme');
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    if (saved === 'dark' || (!saved && prefersDark)) {
        document.documentElement.classList.add('dark');
    }
})();

/* ═══════════════════════════════════════════
   DOM Ready
═══════════════════════════════════════════ */
document.addEventListener('DOMContentLoaded', () => {
    initDarkMode();
    initMobileMenu();
    initScrollHeader();
    initScrollReveal();
    initTiltCards();
    initCategoryTabs();
});

/* ═══════════════════════════════════════════
   Dark / Light Mode Toggle
═══════════════════════════════════════════ */
function initDarkMode() {
    const toggleBtns = document.querySelectorAll('[data-theme-toggle]');
    toggleBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const isDark = document.documentElement.classList.toggle('dark');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
            updateModeIcons(isDark);
        });
    });

    // Initial icon state
    updateModeIcons(document.documentElement.classList.contains('dark'));
}

function updateModeIcons(isDark) {
    document.querySelectorAll('[data-theme-icon]').forEach(el => {
        el.textContent = isDark ? '☀' : '☽';
        el.setAttribute('title', isDark ? 'Switch to Light Mode' : 'Switch to Dark Mode');
    });
}

/* ═══════════════════════════════════════════
   Mobile Menu
═══════════════════════════════════════════ */
function initMobileMenu() {
    const openBtn  = document.querySelector('[data-menu-open]');
    const closeBtn = document.querySelector('[data-menu-close]');
    const panel    = document.querySelector('.mobile-menu-panel');
    const overlay  = document.querySelector('.mobile-menu-overlay');

    if (!openBtn || !panel) return;

    function open() {
        panel.classList.add('open');
        overlay?.classList.add('open');
        document.body.style.overflow = 'hidden';
    }
    function close() {
        panel.classList.remove('open');
        overlay?.classList.remove('open');
        document.body.style.overflow = '';
    }

    openBtn.addEventListener('click', open);
    closeBtn?.addEventListener('click', close);
    overlay?.addEventListener('click', close);

    // Close on nav link click
    panel.querySelectorAll('a').forEach(a => a.addEventListener('click', close));
}

/* ═══════════════════════════════════════════
   Header scroll state
═══════════════════════════════════════════ */
function initScrollHeader() {
    const header = document.querySelector('.site-header');
    if (!header) return;

    window.addEventListener('scroll', () => {
        header.classList.toggle('scrolled', window.scrollY > 30);
    }, { passive: true });
}

/* ═══════════════════════════════════════════
   Scroll Reveal (Intersection Observer)
═══════════════════════════════════════════ */
function initScrollReveal() {
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12 });

    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
}

/* ═══════════════════════════════════════════
   3D Tilt on service cards
═══════════════════════════════════════════ */
function initTiltCards() {
    const cards = document.querySelectorAll('.tilt-card');

    cards.forEach(card => {
        card.addEventListener('mousemove', e => {
            const rect = card.getBoundingClientRect();
            const x = (e.clientX - rect.left) / rect.width  - 0.5;
            const y = (e.clientY - rect.top)  / rect.height - 0.5;
            card.style.transform =
                `perspective(900px) rotateX(${(-y * 10).toFixed(2)}deg) rotateY(${(x * 10).toFixed(2)}deg) translateY(-6px)`;
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform = 'perspective(900px) rotateX(0deg) rotateY(0deg) translateY(0)';
        });
    });
}

/* ═══════════════════════════════════════════
   Category Tabs (Services page)
═══════════════════════════════════════════ */
function initCategoryTabs() {
    const tabs     = document.querySelectorAll('.cat-tab');
    const sections = document.querySelectorAll('.service-section');

    if (!tabs.length) return;

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const target = tab.dataset.tab;

            tabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');

            sections.forEach(sec => {
                const isMatch = sec.dataset.section === target;
                if (isMatch) {
                    sec.style.display = 'block';
                    // Reset reveals so animation always plays on every tab visit
                    const reveals = sec.querySelectorAll('.reveal');
                    reveals.forEach(el => el.classList.remove('visible'));
                    reveals.forEach((el, i) => {
                        setTimeout(() => el.classList.add('visible'), 60 + i * 50);
                    });
                } else {
                    sec.style.display = 'none';
                }
            });
        });
    });

    // Activate first tab on load
    if (tabs[0]) tabs[0].click();
}

