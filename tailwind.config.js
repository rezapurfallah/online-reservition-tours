/** @type {import('tailwindcss').Config} */

export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                customBlue: '#1C3D5A',
            },
            width: {
                '97': '97%',
            },
            height: {
                '500': '500px',
            }
        },
    },
    plugins: [],
}


