import { defineConfig } from 'vite';
import fullReload from 'vite-plugin-full-reload';

export default defineConfig({
    root: './',
    plugins: [
        fullReload(['src/**/*.php'])
    ],
    build: {
        outDir: 'build',
        assetsDir: '.',
        emptyOutDir: true
    },
    server: {
        hmr: {
            host: 'localhost',
            port: 5173
        },
        host: 'localhost',
        port: 5173,
        watch: {
            usePolling: true,
            ignored: ['node_modules', 'build'],
            include: [
                'src/**/*.php',
                'assets/**/*.js',
                'assets/**/*.css',
                'assets/**/*.html'
            ]
        }
    }
});
