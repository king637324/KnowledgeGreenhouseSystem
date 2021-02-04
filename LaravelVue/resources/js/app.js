import Vue from 'vue';
import App from './App.vue';
import router from './router';
import store from './store';
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import '@mdi/font/css/materialdesignicons.css'
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
import 'bootstrap';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import axios from 'axios'
import Chartkick from 'vue-chartkick'
import Chart from 'chart.js'
import FlashMessage from '@smartweb/vue-flash-message';
import 'vue-select/dist/vue-select.css';
import vSelect from 'vue-select'
import VJstree from 'vue-jstree'
import VueTreeNavigation from 'vue-tree-navigation';
import CKEditor from 'ckeditor4-vue';

import bearer from 'bearer'

var VueScrollTo = require('vue-scrollto');


Vue.component('v-select', vSelect)

Vue.use(VJstree)
Vue.use(VueTreeNavigation);
Vue.use(Vuetify)
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);
Vue.use(Chartkick.use(Chart))
Vue.use(VueScrollTo)
Vue.use(FlashMessage);
Vue.use(CKEditor);
Vue.use(BootstrapVue)


new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    router,
    store,
    axios,
    render: h => h(App)
});
new Vuetify({
    icons: {
        iconfont: 'md', // 'mdi' || 'mdiSvg' || 'md' || 'fa' || 'fa4' || 'faSvg'
    },
})


// Auth base configuration some of this options
// can be override in method calls
const config = {
    auth: bearer,
    http: axios,
    router: router,
    tokenDefaultName: 'laravel-vue-spa',
    tokenStore: ['localStorage'],
    rolesVar: 'role',
    registerData: { url: 'auth/register', method: 'POST', redirect: '/login' },
    loginData: { url: 'auth/login', method: 'POST', redirect: '', fetchUser: true },
    logoutData: { url: 'auth/logout', method: 'POST', redirect: '/', makeRequest: true },
    fetchData: { url: 'auth/user', method: 'GET', enabled: true },
    refreshData: { url: 'auth/refresh', method: 'GET', enabled: true, interval: 30 }
}
export default config