import {createApp} from 'vue'
import CKEditor from '@ckeditor/ckeditor5-vue';
import { createPinia } from "pinia";
import store from './store';
import router from './router'
import './index.css';
import currencyKSH from './filters/currency.js'
import { abilitiesPlugin } from "@casl/vue";
import ability from "./services/ability";

import App from './App.vue'
const pinia = createPinia();
const app = createApp(App);
app.use(pinia);
app.use(store);
app.use(router);
app.use( CKEditor )
app.mount('#app')
;
app.use(abilitiesPlugin, ability, { useGlobalProperties: true });
app.config.globalProperties.$filters = {
  currencyKSH
}
