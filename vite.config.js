import { defineConfig } from 'vite';
import path from 'path';
import laravel from 'laravel-vite-plugin';
import vue from "@vitejs/plugin-vue"; 

export default defineConfig({
    resolve: {
        alias: {
            '@': path.resolve('resources/js')
        },
      },
    plugins: [
        vue(),
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
