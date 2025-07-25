import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/main.js',
                'resources/css/main.css',
            ],
            refresh: true,
        }),
    ],
});
