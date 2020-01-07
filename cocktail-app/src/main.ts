import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router';
import store from './store';
import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';

import HelloWorld from './components/HelloWorld.vue';
import Cocktails from './components/cocktails/Cocktails.vue';
import CocktailInfo from './components/cocktails/CocktailInfo.vue';
import NotFound from './components/other/NotFound.vue';

Vue.use(VueRouter);

Vue.config.productionTip = false

const router = new VueRouter({
  routes: [
    {
      path: '/',
      component: HelloWorld
    },
    {
      path: '/cocktails',
      component: Cocktails
    },
    {
      path: '/cocktail/:id',
      component: CocktailInfo
    },
    {
      path: '*',
      component: NotFound
    }
  ],
  mode: 'history'
})

new Vue({
  router,
  store,
  render: h => h(App),
}).$mount('#app')
