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
        fontFamily: {
          primary: 'Poppins',
        },
        container: {
          padding: {
            DEFAULT: '30px',
            lg: '0',
          },
        },
        screens: {
          sm: '640px',
          md: '768px',
          lg: '1024px',
          xl: '1440px',
        },
        extend: {
          colors: {
            primary: '#222222',
            secondary: '#F5E6E0',
          },
        },
      },

    plugins: [forms],
};
