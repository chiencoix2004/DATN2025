import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'Modules/User/resources/assets/css/style.css', // Update to the correct path
                'Modules/User/resources/assets/js/app.js',
                'Modules/User/resources/assets/js/main.js',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '$': 'jquery', // Add this alias for jQuery
        },
    },
    build: {
        outDir: 'public/build-user', // Ensure this is the correct output directory
        manifest: true,
    },
});

