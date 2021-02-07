import 'es6-promise/auto'
import VueAuth                  from '@websanova/vue-auth/dist/v2/vue-auth.common.js';
import authBasic       from '@websanova/vue-auth/dist/drivers/auth/basic.js';
import httpVueResource from '@websanova/vue-auth/dist/drivers/http/vue-resource.1.x.js';
import routerVueRouter from '@websanova/vue-auth/dist/drivers/router/vue-router.2.x.js';
import driverAuthBearer      from '@websanova/vue-auth/dist/drivers/auth/bearer.js';
import driverHttpAxios       from '@websanova/vue-auth/dist/drivers/http/axios.1.x.js';
import driverHttpVueResource from '@websanova/vue-auth/dist/drivers/http/vue-resource.1.x.js';
import driverRouterVueRouter from '@websanova/vue-auth/dist/drivers/router/vue-router.2.x.js';
import driverOAuth2Google    from '@websanova/vue-auth/dist/drivers/oauth2/google.js';
import driverOAuth2Facebook  from '@websanova/vue-auth/dist/drivers/oauth2/facebook.js';

import VueAxios from 'vue-axios'
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
import Auth from './auth'
var VueScrollTo = require('vue-scrollto');


Vue.component('v-select', vSelect)

Vue.use(VueAxios, axios)
axios.defaults.baseURL = `${process.env.MIX_APP_URL}/api`
Vue.use(VueAuth,{
    plugins: {
        http: Vue.axios, // Axios
        // http: Vue.http, // Vue Resource
        router: router,
    },
    drivers: {
        auth: driverAuthBearer,
        http: driverHttpAxios,
        router: driverRouterVueRouter,

    },
    options: {
        rolesKey: 'type',
        notFoundRedirect: {name: 'user-account'},
    }
});
Vue.use(VJstree);
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

