import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    safelist: ['bg-red-200', 'bg-blue-200', 'bg-green-200', 'text-red-800', 'text-blue-800', 'text-green-800']
});
