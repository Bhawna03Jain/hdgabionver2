/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/views/**/*.blade.php",
        "./resources/css/**/*.css",
        "./resources/js/**/*.js",
        "./resources/views/**/*.html",
    ],
    theme: {
        extend: {
            colors: {
                red: "red",
                "secondary-800": "#1E293B",
                "secondary-700": "#334155",
            },
            fontFamily: {
                display: ["poppins", "sans-serif"],
                body: ["Inter", "sans-serif"],
            },
            fontSize: {
                'size-14': "14px",
                'size-12': "12px",
            },
        },
    },
    plugins: [],
};
