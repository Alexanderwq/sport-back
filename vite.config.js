import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from "@vitejs/plugin-vue";
import vueDevTools from "vite-plugin-vue-devtools";
import { fileURLToPath, URL } from 'node:url'

export default defineConfig({
    plugins: [
      vue(),
      vueDevTools(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    resolve: {
      alias: {
        '@': fileURLToPath(new URL('./resources/vue/src', import.meta.url))
      }
    }
});
