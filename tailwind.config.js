const colors = require("tailwindcss/colors");

module.exports = {
    content: ["./resources/js/**/*.html", "./resources/js/**/*.vue"],
    theme: {
        extend: {
            colors: {
                theme: {
                    50: "#f3f3ff",
                    100: "#ebeafd",
                    200: "#d9d8fc",
                    300: "#bcb8fa",
                    400: "#998ff6",
                    500: "#7862f0",
                    600: "#6541e6",
                    700: "#562fd2",
                    800: "#4727b0",
                    900: "#3c2290",
                    950: "#28166f",
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
