import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import auth from './vite/inputs/auth/auth';
import rutasPublicas from './vite/inputs/publicos/rutasPublicas';
import rutasAdmin from './vite/inputs/admin/rutasAdmin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                ...auth,
                'resources/css/welcome.css',
                ...rutasPublicas,
                ...rutasAdmin
            ],
            refresh: true,
        }),
    ],
});
