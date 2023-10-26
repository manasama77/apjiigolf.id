import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/sass/app.scss",
                "resources/js/app.js",

                "resources/sass/landing_custom.scss",

                "resources/sass/login.scss",

                "resources/adminlte/css/adminlte.css",

                "resources/sass/undian.scss",
            ],
            refresh: true,
        }),
    ],
});
