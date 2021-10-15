// // The Vue build version to load with the `import` command
// // (runtime-only or standalone) has been set in webpack.base.conf with an alias.
// import Vue from 'vue'
// import App from './App'
// import router from './router'
// import BootstrapVue from 'bootstrap-vue'

// Vue.use(BootstrapVue);

// Vue.config.productionTip = false;
// import 'bootstrap/dist/css/bootstrap.css';
// import 'bootstrap-vue/dist/bootstrap-vue.css' ;
// /* eslint-disable no-new */
// new Vue({
//   el: '#app',
//   router,
//   components: { App },
//   template: '<App/>'
// })
import Vue2Sidebar from './components/sidebar'

const Vue2SidebarPlugin = (Vue, params) => {
    Vue.component('side-bar', Vue2Sidebar);
};

Vue2Sidebar.install = Vue2SidebarPlugin;

export default Vue2Sidebar;
export {Vue2Sidebar, Vue2SidebarPlugin};
