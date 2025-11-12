import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import { extendColors } from "./resources/tailwind/colors";
import { extendFontSizes } from "./resources/tailwind/font-sizes.js";
import { extendWidths } from "./resources/tailwind/widths.js";
import { extendAspectRatios } from "./resources/tailwind/aspect-ratios.js";
import { extendBreakpoints } from "./resources/tailwind/breakpoints.js";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./public/js/**/*.js",
        "./node_modules/@material-tailwind/html/**/*.js",
    ],

    theme: {
        extend: {
            width: {
                ...extendWidths,
            },
            maxWidth: {
                ...extendWidths,
            },
            minWidth: {
                ...extendWidths,
            },
            fontFamily: {
                sans: ["Inter", ...defaultTheme.fontFamily.sans],
                mono: ["SpaceMono", ...defaultTheme.fontFamily.mono],
            },
            colors: {
                ...extendColors,
            },
            fontSize: {
                ...extendFontSizes,
            },
            aspectRatio: {
                ...extendAspectRatios,
            },
            screens: {
                ...extendBreakpoints,
            },
        },
    },

    plugins: [forms],
};
