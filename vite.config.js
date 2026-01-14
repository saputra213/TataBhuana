import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/admin/articles/create.js',
                'resources/js/admin/articles/edit.js',
                'resources/js/admin/confirmDelete.js',
                'resources/css/layouts/app.css',
                'resources/js/layouts/app.js',
                'resources/css/components/floating-whatsapp.css',
                'resources/js/components/floating-whatsapp.js',
                'resources/css/components/floating-instagram.css',
                'resources/js/components/floating-instagram.js',
                'resources/css/components/floating-facebook.css',
                'resources/js/components/floating-facebook.js',
                'resources/css/articles/index.css',
                'resources/js/articles/index.js',
                'resources/css/home.css',
                'resources/js/home.js',
                'resources/css/projects-index.css',
                'resources/js/projects-index.js',
                'resources/css/projects-show.css',
                'resources/js/projects-show.js'
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
