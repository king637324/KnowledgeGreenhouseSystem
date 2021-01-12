import Vue from 'vue';
import VueRouter from 'vue-router';
import Welcome from './views/Welcome.vue';
import Home from './views/Home.vue';

// 溫室材料與設計知識庫
import GreenhouseTechnologyKnowledgeBase_MaterialsAndDesignKnowledgeBase from './views/GreenhouseTechnologyKnowledgeBase/MaterialsAndDesignKnowledgeBase/Article.vue';

// 溫室技術知識庫
import GreenhouseFluidAnalysis_SimpleGreenhouse from './views/GreenhouseTechnologyKnowledgeBase/AnalyzeKnowledgeBase/GreenhouseFluidAnalysis/SimpleGreenhouse.vue';
import GreenhouseFluidAnalysis_DomeGreenhouse from './views/GreenhouseTechnologyKnowledgeBase/AnalyzeKnowledgeBase/GreenhouseFluidAnalysis/DomeGreenhouse.vue';
import GreenhouseFluidAnalysis_MountainGreenhouse from './views/GreenhouseTechnologyKnowledgeBase/AnalyzeKnowledgeBase/GreenhouseFluidAnalysis/MountainGreenhouse.vue';
import GreenhouseFluidAnalysis_InclinedRoofGreenhouse from './views/GreenhouseTechnologyKnowledgeBase/AnalyzeKnowledgeBase/GreenhouseFluidAnalysis/InclinedRoofGreenhouse.vue';
import GreenhouseFluidAnalysis_GreenhouseWindPressureChart from './views/GreenhouseTechnologyKnowledgeBase/AnalyzeKnowledgeBase/GreenhouseFluidAnalysis/GreenhouseWindPressureChart.vue';

import MaterialStructureAnalysis_RoundPipe from './views/GreenhouseTechnologyKnowledgeBase/AnalyzeKnowledgeBase/MaterialStructureAnalysis/RoundPipe.vue';
import MaterialStructureAnalysis_ProfilePipe from './views/GreenhouseTechnologyKnowledgeBase/AnalyzeKnowledgeBase/MaterialStructureAnalysis/ProfilePipe.vue';
import MaterialStructureAnalysis_Truss from './views/GreenhouseTechnologyKnowledgeBase/AnalyzeKnowledgeBase/MaterialStructureAnalysis/Truss.vue';

import GreenhouseStructureAnalysis_RobustGreenhouse from './views/GreenhouseTechnologyKnowledgeBase/AnalyzeKnowledgeBase/GreenhouseStructureAnalysis/RobustGreenhouse.vue';
import GreenhouseStructureAnalysis_SimpleGreenhouse from './views/GreenhouseTechnologyKnowledgeBase/AnalyzeKnowledgeBase/GreenhouseStructureAnalysis/SimpleGreenhouse.vue';

// 溫室總體規劃
import GreenhouseMasterPlan_GeographicalEnvironmentAnalysis from './views/GreenhouseMasterPlan/GeographicalEnvironmentAnalysis.vue';
import GreenhouseMasterPlan_CropSelection from './views/GreenhouseMasterPlan/CropSelection.vue';
import GreenhouseMasterPlan_CropEnvironmentalDemandAnalysis from './views/GreenhouseMasterPlan/CropEnvironmentalDemandAnalysis.vue';
import GreenhouseMasterPlan_GreenhouseConstructionCostAnalysis from './views/GreenhouseMasterPlan/CostAnalysis/GreenhouseConstructionCostAnalysis.vue';
import GreenhouseMasterPlan_GreenhouseMaterialCostAnalysis from './views/GreenhouseMasterPlan/CostAnalysis/GreenhouseMaterialCostAnalysis.vue';

import UnitConversion from './views/UnitConversion.vue';



Vue.use(VueRouter);

const routes = [{
    path: '/',
    name: 'home',
    component: Home
        // name: 'welcome',
        // component: Welcome
}, {
    path: '/MaterialsAndDesignKnowledgeBase/Article',
    name: '材料與設計知識庫',
    component: GreenhouseTechnologyKnowledgeBase_MaterialsAndDesignKnowledgeBase
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
    path: '/GreenhouseStructureAnalysis/RobustGreenhouse',
    name: '溫室結構分析-強固型溫室',
    component: GreenhouseStructureAnalysis_RobustGreenhouse
}, {
    path: '/GreenhouseStructureAnalysis/SimpleGreenhouse',
    name: '溫室結構分析-簡易型溫室',
    component: GreenhouseStructureAnalysis_SimpleGreenhouse
}, {
    path: '/GreenhouseMasterPlan/GeographicalEnvironmentAnalysis',
    name: '地理環境分析',
    component: GreenhouseMasterPlan_GeographicalEnvironmentAnalysis
}, {
    path: '/GreenhouseMasterPlan/CropSelection',
    name: '溫室作物選擇',
    component: GreenhouseMasterPlan_CropSelection
}, {
    path: '/GreenhouseMasterPlan/CropEnvironmentalDemandAnalysis',
    name: '作物環境分析',
    component: GreenhouseMasterPlan_CropEnvironmentalDemandAnalysis
}, {
    path: '/GreenhouseMasterPlan/CostAnalysis/GreenhouseConstructionCostAnalysis',
    name: '溫室構造成本分析',
    component: GreenhouseMasterPlan_GreenhouseConstructionCostAnalysis
}, {
    path: '/GreenhouseMasterPlan/CostAnalysis/GreenhouseMaterialCostAnalysis',
    name: '溫室材料成本分析',
    component: GreenhouseMasterPlan_GreenhouseMaterialCostAnalysis
}, {
    path: '/UnitConversion',
    name: '各單位換算',
    component: UnitConversion
}, {
    path: '/categories',
    name: 'categories',
    component: () =>
        import ('./views/Categories.vue')
}, {
    path: '/123',
    name: 'welcome',
    component: Welcome
}];

const router = new VueRouter({
    routes: routes,
    linkActiveClass: 'active'
});

export default router;