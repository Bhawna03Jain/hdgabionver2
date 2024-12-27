import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/css/header.css', 'resources/css/checkout.css', 'resources/css/cart.css', 'resources/js/common.js','resources/js/header.js','resources/js/app.js',,'resources/js/header.js','resources/js/checkout.js','resources/js/cart.js'],
            refresh: true,
        }),
    ],
});
