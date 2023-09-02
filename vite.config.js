// vite.config.js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'


export default defineConfig({
    plugins: [
        vue(),
        laravel({
            manifest: false,
            polyfill: false,
            Polyfillmodulepreload: false,
            input: [
                'resources/css/app.css',
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            ///refresh: true,

            refresh: [ 'resources/**' ],
        }),
    ],
});
