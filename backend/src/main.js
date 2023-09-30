import {createApp} from 'vue'
import CKEditor from '@ckeditor/ckeditor5-vue';

import store from './store';
import authStore from './store/auth'
import router from './router'
import './index.css';
import currencyUSD from './filters/currency.js'
import { abilitiesPlugin } from "@casl/vue";
import ability from "./services/ability";

import App from './App.vue'

const app = createApp(App);

app
  .use(store)
  .use(authStore)
  .use(router)
  .use( CKEditor )
  .mount('#app')
;
app.use(abilitiesPlugin, ability, { useGlobalProperties: true });
app.config.globalProperties.$filters = {
  currencyUSD
}
