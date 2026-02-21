import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/moonshine/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Manrope', 'Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                ice: {
                    coral: '#E27D60',
                    sky: '#85CDCB',
                    peach: '#E8A87C',
                    rose: '#C38D9E',
                    teal: '#41B3A3',
                },
            },
            spacing: {
                '18': '4.5rem',
                '22': '5.5rem',
            },
            boxShadow: {
                'card': '0 4px 20px rgba(0, 0, 0, 0.06)',
                'card-hover': '0 8px 30px rgba(65, 179, 163, 0.15)',
            },
            transitionDuration: {
                '400': '400ms',
            },
        },
    },
    plugins: [],
};
