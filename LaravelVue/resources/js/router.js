import Vue from 'vue';
import VueRouter from 'vue-router';
import Welcome from './views/Welcome.vue';
import Home from './views/Home.vue';
import MaterialDesignKnowledgeBase from './views/GreenhouseTechnologyKnowledgeBase/MaterialDesignKnowledgeBase.vue';
import GreenhouseFluidAnalysis_SimpleGreenhouse from './views/GreenhouseTechnologyKnowledgeBase/AnalyzeKnowledgeBase/GreenhouseFluidAnalysis/SimpleGreenhouse.vue';
import GreenhouseFluidAnalysis_DomeGreenhouse from './views/GreenhouseTechnologyKnowledgeBase/AnalyzeKnowledgeBase/GreenhouseFluidAnalysis/DomeGreenhouse.vue';
import GreenhouseFluidAnalysis_MountainGreenhouse from './views/GreenhouseTechnologyKnowledgeBase/AnalyzeKnowledgeBase/GreenhouseFluidAnalysis/MountainGreenhouse.vue';
import GreenhouseFluidAnalysis_InclinedRoofGreenhouse from './views/GreenhouseTechnologyKnowledgeBase/AnalyzeKnowledgeBase/GreenhouseFluidAnalysis/InclinedRoofGreenhouse.vue';
import GreenhouseFluidAnalysis_GreenhouseWindPressureChart from './views/GreenhouseTechnologyKnowledgeBase/AnalyzeKnowledgeBase/GreenhouseFluidAnalysis/GreenhouseWindPressureChart.vue';

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
    path: '/GreenhouseFluidAnalysis/DomeGreenhouse',
    name: '/GreenhouseFluidAnalysis/DomeGreenhouse',
    component: GreenhouseFluidAnalysis_DomeGreenhouse
}, {
    path: '/GreenhouseFluidAnalysis/MountainGreenhouse',
    name: '/GreenhouseFluidAnalysis/MountainGreenhouse',
    component: GreenhouseFluidAnalysis_MountainGreenhouse
}, {
    path: '/GreenhouseFluidAnalysis/InclinedRoofGreenhouse',
    name: '/GreenhouseFluidAnalysis/InclinedRoofGreenhouse',
    component: GreenhouseFluidAnalysis_InclinedRoofGreenhouse
}, {
    path: '/GreenhouseFluidAnalysis/GreenhouseWindPressureChart',
    name: '/GreenhouseFluidAnalysis/GreenhouseWindPressureChart',
    component: GreenhouseFluidAnalysis_GreenhouseWindPressureChart
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