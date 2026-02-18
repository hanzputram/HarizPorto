/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                lavender: "#efd9f2",
                "lavender-light": "#f8f7ff",
                "lavender-dark": "#c9a0cc",
                skyblue: "#e3f2fd",
                mint: "#e8f5e9",
                "dark-bg": "#0a0a0c",
                "dark-surface": "#121214",
                "dark-border": "#ffffff14",
                "dark-text": "#f8f7ff",
                "dark-muted": "#f8f7ff66",
            },
        },
    },
    plugins: [],
};