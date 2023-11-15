import { createApp } from 'vue';
import App from '@/App.vue';
import Router from '@/router/router.js';
import Store from '@/store/store.js';
import axios from "axios";

(async () => {
    try {
      await axios.get('/api/user');

      await Store.dispatch('setAuth', true);
    } catch (error) {
      console.error(error);
    }
})();

createApp(App).use(Router).use(Store).mount('#app');