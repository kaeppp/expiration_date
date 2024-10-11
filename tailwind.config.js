import defaultTheme from 'tailwindcss/defaultTheme';
const colors = require('tailwindcss/colors');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./src/**/*.{html,js,ts,jsx,tsx,mdx}",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        ],
        
    theme: {
            extend: {
                fontFamily: {
                        sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                        dela: ['Dela Gothic One', 'sans-serif'],
                        zenmaru: ['Zen Maru Gothic', 'sans-serif'],
                        zenkaku: ['Zen Kaku Gothic New', 'sans-serif']
                            },
                    },
                    
            colors: {
                        transparent: 'transparent',
                        current: 'currentColor',
                        black: colors.black,
                        white: colors.white,
                        gray: colors.gray,
                        emerald: colors.emerald,
                        indigo: colors.indigo,
                        yellow: colors.yellow,
                        red: colors.red,
                        yellowkou: '#F9E97A',
                        yelloekou_2: '#fffbe9',
                        brown: '#8f6552',
                        brown25l: '#a58374',
                        mojiiro: '#333333',
                        blue1: '#7CA1F0',
                    },
                },
    plugins: [],
};

