import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                poppins: ["Poppins", "sans-serif"],
            },
            colors: {
                primary: "#62B1FF",
                primaryLight: "#97CCFF",
                primaryDark: "#03396D",
                background: "#F6F6F6",
                secondary: "#5A5B5D",
            },
        },
    },

    plugins: [forms, require("flowbite/plugin")],
};
