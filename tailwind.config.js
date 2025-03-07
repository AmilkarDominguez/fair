const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            backgroundImage: {
                'logo-pattern': "url('/images/logo.png')",
                'footer-texture': "url('/img/footer-texture.png')",
            },
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // primary: {
                //     50: '#fdf2f8',
                //     100: '#fce7f3',
                //     200: '#fbcfe8',
                //     300: '#f9a8d4',
                //     400: '#f472b6',
                //     500: '#ec4899',
                //     600: '#db2777',
                //     700: '#be185d',
                //     800: '#9d174d',
                //     900: '#831843',
                // },
                primary: {
                    '50': '#F18D95',
                    '100': '#EE7B85',
                    '200': '#EA5663',
                    '300': '#E53241',
                    '400': '#D41B2A',
                    '500': '#B01623',
                    '600': '#7E1019',
                    '700': '#4C0A0F',
                    '800': '#1A0305',
                    '900': '#000000'
                },
                // secondary: {
                //     50: '#ECFDF5',
                //     100: '#D1FAE5',
                //     200: '#A7F3D0',
                //     300: '#6EE7B7',
                //     400: '#34D399',
                //     500: '#10B981',
                //     600: '#059669',
                //     700: '#047857',
                //     800: '#065F46',
                //     900: '#064E3B',
                // },
            }
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
