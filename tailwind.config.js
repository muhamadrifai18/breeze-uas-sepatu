import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'neutral-primary': '#ffffff',
                'neutral-primary-soft': '#f8fafc',
                'neutral-secondary-soft': '#f1f5f9',
                'body': '#475569',
                'heading': '#1e293b',
                'default': '#e2e8f0',
            },
            borderRadius: {
                'base': '0.75rem',
            },
            boxShadow: {
                'xs': '0 1px 2px 0 rgba(0, 0, 0, 0.05)',
            },
        },
    },

    plugins: [forms],
};
