import Vue from 'vue';
import App from './App.vue';
import router from './router';

import store from './store';

import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
import 'bootstrap';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);

import axios from 'axios'

import Chartkick from 'vue-chartkick'
import Chart from 'chart.js'
Vue.use(Chartkick.use(Chart))

var VueScrollTo = require('vue-scrollto');
Vue.use(VueScrollTo)

import 'vue-select/dist/vue-select.css';

import vSelect from 'vue-select'
Vue.component('v-select', vSelect)

import FlashMessage from '@smartweb/vue-flash-message';
Vue.use(FlashMessage);

new Vue({
    el: '#app',
    router,
    store,
    axios,
    render: h => h(App)
});