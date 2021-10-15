'use strict';

import Vue from 'vue';

Vue.config.productionTip = false;

//  jQuery is required by bootstrap to work
window.$ = window.jQuery = require('jquery');
import 'bootstrap';
require('bootstrap/dist/css/bootstrap.css');
require('font-awesome/css/font-awesome.css');

import App from './App.vue';
import router from '../src/router/index.js';
new Vue({
  el: '#app',
  router,
  render: h => h(App)
});