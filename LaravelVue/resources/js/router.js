import Vue from 'vue';
import VueRouter from 'vue-router';
import Welcome from './views/Welcome.vue';
import Home from './views/Home.vue';
import MaterialDesignKnowledgeBase from './views/GreenhouseTechnologyKnowledgeBase/MaterialDesignKnowledgeBase.vue';
import AnalyzeKnowledgeBase from './views/GreenhouseTechnologyKnowledgeBase/AnalyzeKnowledgeBase.vue';
import GreenhouseFluidAnalysis_SimpleGreenhouse from './views/GreenhouseTechnologyKnowledgeBase/AnalyzeKnowledgeBase/GreenhouseFluidAnalysis/SimpleGreenhouse.vue';

Vue.use(VueRouter);

const routes = [{
    path: '/',
    name: 'home',
    component: Home
        // name: 'welcome',
        // component: Welcome
}, {
    path: '/MaterialDesignKnowledgeBase',
    name: 'MaterialDesignKnowledgeBase',
    component: MaterialDesignKnowledgeBase
}, {
    path: '/GreenhouseFluidAnalysis/SimpleGreenhouse',
    name: '/GreenhouseFluidAnalysis/SimpleGreenhouse',
    component: GreenhouseFluidAnalysis_SimpleGreenhouse
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