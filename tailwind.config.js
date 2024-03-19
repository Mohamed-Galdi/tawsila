/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                pr: ["pr", "sans-serif"],
                sec: ["sec", "sans-serif"],
            },
            colors: {
                tawsila: {
                    50: "#feffe7",
                    100: "#faffc1",
                    200: "#faff86",
                    300: "#fffe41",
                    400: "#fff20d",
                    500: "#f6dc00",
                    600: "#d1a900",
                    700: "#a67a02",
                    800: "#895e0a",
                    900: "#744d0f",
                    950: "#442904",
                },
                pr: "#f6dc00",
                soft_black: "#202124",
            },
        },
    },
    plugins: [],
};
