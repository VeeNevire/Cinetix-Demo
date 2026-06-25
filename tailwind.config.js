import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                display: ['Poppins', 'Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                cinema: {
                    950: '#07070f',
                    900: '#0f0f1a',
                    800: '#1a1a2e',
                    700: '#252540',
                    600: '#2d2d50',
                    500: '#3d3d6b',
                    accent: '#6c5ce7',
                    'accent-light': '#a29bfe',
                    gold: '#f5c518',
                },
            },
            animation: {
                'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                'glow': 'glow 2s ease-in-out infinite alternate',
            },
            keyframes: {
                glow: {
                    '0%': { boxShadow: '0 0 5px rgba(108,92,231,0.5)' },
                    '100%': { boxShadow: '0 0 20px rgba(108,92,231,0.8)' },
                },
            },
        },
    },

    plugins: [forms],
};
