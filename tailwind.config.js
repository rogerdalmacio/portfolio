import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                inconsolata: ['Inconsolata', ...defaultTheme.fontFamily.sans],
                foldit: ['Foldit', ...defaultTheme.fontFamily.sans]
            },
            dropShadow: {
                'hover': '3px 3px 0 rgba(0, 0, 0, 1)',
            }
        },
    },

    plugins: [
        forms,
        typography,
    ],
};
