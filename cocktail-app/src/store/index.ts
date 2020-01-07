import Vue from 'vue';
import Vuex, { StoreOptions } from 'vuex';
import cocktails from './modules/cocktails';
import { RootState } from '../types';

/* load Vuex */
Vue.use(Vuex);

/* create store */
const store: StoreOptions<RootState> = {
    state: {
        version: '1.0.0' // a simple property
    },
    modules: {
        cocktails
    }
};

export default new Vuex.Store<RootState>(store);
