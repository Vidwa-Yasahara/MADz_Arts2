import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Outfit', ...defaultTheme.fontFamily.sans],
                serif: ['Playfair Display', ...defaultTheme.fontFamily.serif],
            },
            colors: {
                ash: {
                    50: '#F2F3F5',
                    100: '#E5E7EB',
                    200: '#D2D6DC',
                    300: '#9FA6B2',
                    400: '#707787',
                    500: '#5F6575',
                    600: '#4E5361',
                    700: '#3D414D',
                    800: '#2C2F38',
                    900: '#1C1E24',
                    950: '#0B0D12',
                },
            },
        },
    },

    plugins: [forms, typography],
};
