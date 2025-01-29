import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        "./resources/**/*.blade.php",
        "./node_modules/flowbite/**/*.js",
    ],


    theme: {
        extend: {
            fontFamily: {
                amiri: ['Amiri',  'serif'],
            },
            colors: {
                brown: {
                    "max": "#b18e27 !important",
                    "lite" : "#99740487 !important"
                }
            }
        }
    },


    plugins: [
      forms,
      require('flowbite/plugin'),
    ],
};
