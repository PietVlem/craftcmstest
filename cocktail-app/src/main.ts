import Vue from 'vue'
import App from './App.vue'

/* Router */
import router from './router';

/* Vuex */
import store from './store';

/* Bootstrap */
import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';

/* Custom style */
import './style/main.scss';

Vue.config.productionTip = false

new Vue({
  router,
  store,
  render: h => h(App),
}).$mount('#app')
