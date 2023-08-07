const colors = require("tailwindcss/colors");

module.exports = {
    content: ["./resources/js/**/*.html", "./resources/js/**/*.vue"],
    theme: {
        extend: {
            colors: {
                theme: {
                    50: "#fef4ff",
                    100: "#fce7ff",
                    200: "#f9cfff",
                    300: "#f8a8ff",
                    400: "#f475fd",
                    500: "#e941f4",
                    600: "#d021d8",
                    700: "#b017b4",
                    800: "#911593",
                    900: "#781777",
                    950: "#610260",
                },
                danger: colors.red,
            },
            fontFamily: {
                roboto: ["Roboto Condensed", " sans-serif"],
            },
        },
    },
    variants: {
        extend: {},
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
        require("@tailwindcss/aspect-ratio"),
    ],
};
