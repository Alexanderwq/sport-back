import './bootstrap';
import App from "../vue/src/App.vue";
import './../vue/src/assets/main.css'
import { createApp } from 'vue'
import { createPinia } from 'pinia'
import router from './../vue/src/router'
import PrimeVue from 'primevue/config'
import Aura from '@primevue/themes/aura';

const app = createApp(App);

app.use(PrimeVue, {
  theme: {
    preset: Aura
  }
});
app.use(createPinia())
app.use(router)

app.mount("#app");
