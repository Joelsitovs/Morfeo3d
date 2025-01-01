import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/Nav.js', // Agregado aquí
                'resources/js/main.js', // Agregado aquí
            ],
            refresh: true,
        }),
    ],
});
