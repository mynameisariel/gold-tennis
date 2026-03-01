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
                darkgreen: '#002607',
                gold: '#ffa400',
                darkgold: '#d18800'
            }
        },
    },

    plugins: [forms],
};
