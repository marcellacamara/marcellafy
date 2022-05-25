const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            color: {
                transparent: "transparent",
                current: "currentColor",
                black: "#000",
                white: "#fff",
                gray: {
                    100: "#f7fafc",
                    200: "#edf2f7",
                    300: "#e2e8f0",
                },
                fontFamily: {
                    sans: ["Nunito", ...defaultTheme.fontFamily.sans],
                },
            },
        },

        plugins: [require("@tailwindcss/forms")],
    },
};
