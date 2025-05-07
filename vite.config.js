import { defineConfig } from 'vite';
import fullReload from 'vite-plugin-full-reload';

export default defineConfig({
    // Ne pas définir `root` si le fichier `index.php` est à la racine
    plugins: [
        fullReload(['src/**/*.php', './index.php']),
    ],
    build: {
        manifest: true,
        rollupOptions: {
            input: 'assets/js/main.js',
        },
        outDir: 'build', // pas besoin de ../build si tu es déjà à la racine
        emptyOutDir: true,
    },
    server: {
        hmr: {
            host: 'localhost',
            port: 5173,
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
                'assets/**/*.html',
                './index.php',
            ]
        }
    }
});