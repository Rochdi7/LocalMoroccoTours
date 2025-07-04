import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { viteStaticCopy } from 'vite-plugin-static-copy';

export default defineConfig({
    build: {
        manifest: true,
        rtl: true,
        outDir: 'public/build/',
        cssCodeSplit: true,
        rollupOptions: {
            output: {
                assetFileNames: (asset) => {
                    if (asset.name && asset.name.endsWith('.css')) {
                        return 'css/' + `[name]` + '.css';
                    } else if (asset.name) {
                        return 'icons/' + asset.name;
                    }
                    return 'assets/[name].[ext]';
                },
                entryFileNames: 'js/' + `[name]` + `.js`,
            },
        },
    },
    plugins: [
        laravel({
            input: [
                // Existing SCSS files for Lightable
                'resources/scss/landing.scss',
                'resources/scss/style-preset.scss',
                'resources/scss/style.scss',
                'resources/scss/uikit.scss',

                // New CSS files for LocalMoroccoTours theme
                'resources/css/vendors.css',
                'resources/css/main.css',

                // Also add JS files for LocalMoroccoTours
                'resources/js/vendors.js',
                'resources/js/main.js',
            ],
            refresh: true,
        }),
        viteStaticCopy({
            targets: [
                {
                    src: 'resources/plugins',
                    dest: 'css',
                },
                {
                    src: 'resources/fonts',
                    dest: '',
                },
                {
                    src: 'resources/images',
                    dest: '',
                },
                {
                    src: 'resources/js',
                    dest: '',
                },
                {
                    src: 'resources/json',
                    dest: '',
                },
            ],
        }),
    ],
});
