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
                sans: ['Libre Franklin', 'sans-serif'],
            },
            colors: {
                page: '#f8dcbf',
                green: '#003d0c',
                gold: '#ffa400',
            }
        },
    },

    plugins: [forms],
};
