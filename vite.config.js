import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';


export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'public/js/map.js',
                'public/css/style.css',
                'public/js/mobile-menu.js',
                'public/css/mobile_catalog_menu.css'
            ],
            refresh: true,
        }),
    ],
});
