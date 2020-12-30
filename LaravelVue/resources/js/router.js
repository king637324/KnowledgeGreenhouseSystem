import Vue from 'vue';
import VueRouter from 'vue-router';
import Welcome from './views/Welcome.vue';
import Home from './views/Home.vue';

import GreenhouseFluidAnalysis_SimpleGreenhouse from './views/GreenhouseTechnologyKnowledgeBase/AnalyzeKnowledgeBase/GreenhouseFluidAnalysis/SimpleGreenhouse.vue';
import GreenhouseFluidAnalysis_DomeGreenhouse from './views/GreenhouseTechnologyKnowledgeBase/AnalyzeKnowledgeBase/GreenhouseFluidAnalysis/DomeGreenhouse.vue';
import GreenhouseFluidAnalysis_MountainGreenhouse from './views/GreenhouseTechnologyKnowledgeBase/AnalyzeKnowledgeBase/GreenhouseFluidAnalysis/MountainGreenhouse.vue';
import GreenhouseFluidAnalysis_InclinedRoofGreenhouse from './views/GreenhouseTechnologyKnowledgeBase/AnalyzeKnowledgeBase/GreenhouseFluidAnalysis/InclinedRoofGreenhouse.vue';
import GreenhouseFluidAnalysis_GreenhouseWindPressureChart from './views/GreenhouseTechnologyKnowledgeBase/AnalyzeKnowledgeBase/GreenhouseFluidAnalysis/GreenhouseWindPressureChart.vue';

import MaterialStructureAnalysis_RoundPipe from './views/GreenhouseTechnologyKnowledgeBase/AnalyzeKnowledgeBase/MaterialStructureAnalysis/RoundPipe.vue';
import MaterialStructureAnalysis_ProfilePipe from './views/GreenhouseTechnologyKnowledgeBase/AnalyzeKnowledgeBase/MaterialStructureAnalysis/ProfilePipe.vue';
import MaterialStructureAnalysis_Truss from './views/GreenhouseTechnologyKnowledgeBase/AnalyzeKnowledgeBase/MaterialStructureAnalysis/Truss.vue';

Vue.use(VueRouter);

const routes = [{
    path: '/',
    name: 'home',
    component: Home
        // name: 'welcome',
        // component: Welcome
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
    path: '/MaterialStructureAnalysis/RoundPipe',
    name: '/MaterialStructureAnalysis/RoundPipe',
    component: MaterialStructureAnalysis_RoundPipe
}, {
    path: '/MaterialStructureAnalysis/ProfilePipe',
    name: '/MaterialStructureAnalysis/ProfilePipe',
    component: MaterialStructureAnalysis_ProfilePipe
}, {
    path: '/MaterialStructureAnalysis/Truss',
    name: '/MaterialStructureAnalysis/Truss',
    component: MaterialStructureAnalysis_Truss
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