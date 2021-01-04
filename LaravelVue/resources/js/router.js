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
    name: '溫室流體分析-簡易溫室',
    component: GreenhouseFluidAnalysis_SimpleGreenhouse
}, {
    path: '/GreenhouseFluidAnalysis/DomeGreenhouse',
    name: '溫室流體分析-圓頂溫室',
    component: GreenhouseFluidAnalysis_DomeGreenhouse
}, {
    path: '/GreenhouseFluidAnalysis/MountainGreenhouse',
    name: '溫室流體分析-山型溫室',
    component: GreenhouseFluidAnalysis_MountainGreenhouse
}, {
    path: '/GreenhouseFluidAnalysis/InclinedRoofGreenhouse',
    name: '溫室流體分析-斜頂溫室',
    component: GreenhouseFluidAnalysis_InclinedRoofGreenhouse
}, {
    path: '/GreenhouseFluidAnalysis/GreenhouseWindPressureChart',
    name: '溫室流體分析-風壓型式比較',
    component: GreenhouseFluidAnalysis_GreenhouseWindPressureChart
}, {
    path: '/MaterialStructureAnalysis/RoundPipe',
    name: '材料結構分析-圓管材',
    component: MaterialStructureAnalysis_RoundPipe
}, {
    path: '/MaterialStructureAnalysis/ProfilePipe',
    name: '材料結構分析-型管材',
    component: MaterialStructureAnalysis_ProfilePipe
}, {
    path: '/MaterialStructureAnalysis/Truss',
    name: '材料結構分析-桁架',
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