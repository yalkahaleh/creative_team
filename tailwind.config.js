/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
    ],
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                primary: {
                    DEFAULT: '#289db9',
                    50:  '#e8f7fb',
                    100: '#c5eaf3',
                    200: '#9dd9ea',
                    300: '#6ac8e1',
                    400: '#3dbad8',
                    500: '#289db9',
                    600: '#1e7d94',
                    700: '#165e6f',
                    800: '#0d3f4a',
                    900: '#052025',
                },
                neutral: {
                    DEFAULT: '#3f5965',
                    50:  '#f0f4f6',
                    100: '#d1e0e5',
                    200: '#a8c4cc',
                    300: '#7aa3ae',
                    400: '#5c8290',
                    500: '#3f5965',
                    600: '#314752',
                    700: '#24353e',
                    800: '#172329',
                    900: '#0d1b22',
                },
                dark: {
                    bg:      '#0d1b22',
                    surface: '#1a2c35',
                    card:    '#1e3540',
                    border:  '#2a4555',
                },
            },
            fontFamily: {
                cairo: ['Cairo', 'sans-serif'],
            },
            animation: {
                'float':          'float 6s ease-in-out infinite',
                'float-reverse':  'float-reverse 8s ease-in-out 1s infinite',
                'float-slow':     'float 10s ease-in-out 2s infinite',
                'spin-slow':      'spin 20s linear infinite',
                'spin-reverse':   'spin-reverse 15s linear infinite',
                'gradient':       'gradient 8s ease infinite',
                'pulse-glow':     'pulseGlow 3s ease-in-out infinite',
                'slide-up':       'slideUp 0.8s ease forwards',
                'fade-in':        'fadeIn 1s ease forwards',
                'bounce-slow':    'bounce 3s ease-in-out infinite',
                'shimmer':        'shimmer 2s linear infinite',
            },
            keyframes: {
                float: {
                    '0%, 100%': { transform: 'translateY(0px) rotate(0deg)' },
                    '33%':      { transform: 'translateY(-22px) rotate(6deg)' },
                    '66%':      { transform: 'translateY(-10px) rotate(-4deg)' },
                },
                'float-reverse': {
                    '0%, 100%': { transform: 'translateY(0px) rotate(0deg)' },
                    '33%':      { transform: 'translateY(22px) rotate(-6deg)' },
                    '66%':      { transform: 'translateY(10px) rotate(4deg)' },
                },
                'spin-reverse': {
                    from: { transform: 'rotate(360deg)' },
                    to:   { transform: 'rotate(0deg)' },
                },
                gradient: {
                    '0%, 100%': { backgroundPosition: '0% 50%' },
                    '50%':      { backgroundPosition: '100% 50%' },
                },
                pulseGlow: {
                    '0%, 100%': { boxShadow: '0 0 20px rgba(40,157,185,0.3), 0 0 40px rgba(40,157,185,0.1)' },
                    '50%':      { boxShadow: '0 0 40px rgba(40,157,185,0.7), 0 0 80px rgba(40,157,185,0.3)' },
                },
                slideUp: {
                    from: { opacity: '0', transform: 'translateY(40px)' },
                    to:   { opacity: '1', transform: 'translateY(0)' },
                },
                fadeIn: {
                    from: { opacity: '0' },
                    to:   { opacity: '1' },
                },
                shimmer: {
                    '0%':   { backgroundPosition: '-200% 0' },
                    '100%': { backgroundPosition: '200% 0' },
                },
            },
            backgroundSize: {
                '200%': '200%',
            },
        },
    },
    plugins: [],
};
