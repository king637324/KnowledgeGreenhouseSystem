import Vue from 'vue';
import VueRouter from 'vue-router';
import Welcome from './views/Welcome.vue';

Vue.use(VueRouter);

const routes = [{
    path: '/',
    name: 'welcome',
    component: Welcome
}, {
    path: '/categories',
    name: 'categories',
    component: () =>
        import ('./views/Categories.vue')
}];

const router = new VueRouter({
    routes: routes,
    linkActiveClass: 'active'
});

export default router;