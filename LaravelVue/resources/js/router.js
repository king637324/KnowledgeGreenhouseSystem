import Vue from 'vue';
import VueRouter from 'vue-router';
import Welcome from './views/Welcome.vue';
import Home from './views/Home.vue';
import Development from './views/Development.vue';

// Auth
import Auth_Login from './views/Auth/Login.vue';
import Auth_managerUser from './views/Auth/managerUser.vue';
import ForgotPassword from './views/Auth/PasswordResetLink.vue';
import ResetPasswordForm from './views/Auth/PasswordRequestForm.vue';


// 溫室材料與設計知識庫
import GreenhouseTechnologyKnowledgeBase_MaterialsAndDesignKnowledgeBase from './views/GreenhouseTechnologyKnowledgeBase/MaterialsAndDesignKnowledgeBase/Article.vue';
import GreenhouseTechnologyKnowledgeBase_AddKnowledgeBase from './views/GreenhouseTechnologyKnowledgeBase/MaterialsAndDesignKnowledgeBase/AddArticle.vue';
import GreenhouseTechnologyKnowledgeBase_EditKnowledgeBase from './views/GreenhouseTechnologyKnowledgeBase/MaterialsAndDesignKnowledgeBase/EditArticle.vue';

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
import GreenhouseMasterPlan_CropSelection from './views/GreenhouseMasterPlan/GreenhouseCropSelection/CropSelection.vue';
import GreenhouseMasterPlan_CropEnvironmentalDemandAnalysis from './views/GreenhouseMasterPlan/CropEnvironmentalDemandAnalysis.vue';
import GreenhouseMasterPlan_GreenhouseConstructionCostAnalysis from './views/GreenhouseMasterPlan/CostAnalysis/GreenhouseConstructionCostAnalysis.vue';
import GreenhouseMasterPlan_GreenhouseMaterialCostAnalysis from './views/GreenhouseMasterPlan/CostAnalysis/GreenhouseMaterialCostAnalysis.vue';

import GreenhouseMasterPlan_ConstructionCostAnalysisTest from './views/GreenhouseMasterPlan/CostAnalysis/ConstructionCostAnalysisTest.vue';
import GreenhouseMasterPlan_GreenhouseConstructionCostAnalysis_Simple from './views/GreenhouseMasterPlan/CostAnalysis/ConstructionCost/SimpleCostAnalysisAdd.vue';
import GreenhouseMasterPlan_GreenhouseConstructionCostAnalysis_Robust from './views/GreenhouseMasterPlan/CostAnalysis/ConstructionCost/RobustCostAnalysisAdd.vue';


import UnitConversion from './views/UnitConversion.vue';
import QandA from './views/QandA.vue';




import Categories from './views/Categories.vue';




Vue.use(VueRouter);

const routes = [{
    path: '/',
    name: 'home',
    component: Home,
    meta: {
        auth: undefined
    }

    // name: 'welcome',
    // component: Welcome
}, {
    path: '/Development',
    name: 'Development',
    component: Development,
    meta: {
        auth: undefined
    }
}, {
    path: '/DevelopConstructionCostAnalysisTestment',
    name: '構造成本分析測試',
    component: GreenhouseMasterPlan_ConstructionCostAnalysisTest,
    meta: {
        auth: undefined
    }
}, {
    path: '/ConstructionCost/RobustCostAnalysis/Add',
    name: '強固型溫室參數新增測試',
    component: GreenhouseMasterPlan_GreenhouseConstructionCostAnalysis_Robust,
    meta: {
        auth: undefined
    }
}, {
    path: '/ConstructionCost/SimpleCostAnalysis/Add',
    name: '簡易型溫室參數新增測試',
    component: GreenhouseMasterPlan_GreenhouseConstructionCostAnalysis_Simple,
    meta: {
        auth: undefined
    }
}, {
    path: '/login',
    name: '使用者登入',
    component: Auth_Login,
    meta: {
        auth: false
    }
}, {
    path: '/Auth_managerUser',
    name: '管理會員',
    component: Auth_managerUser,
    meta: {
        auth: true
    }
}, {
    path: '/reset-password',
    name: 'reset-password',
    component: ForgotPassword,
    meta: {
        auth: false
    }
}, {
    path: '/reset-password/:token',
    name: 'reset-password-form',
    component: ResetPasswordForm,
    meta: {
        auth: false
    }
}, {
    path: '/MaterialsAndDesignKnowledgeBase/Article',
    name: '材料與設計知識庫',
    component: GreenhouseTechnologyKnowledgeBase_MaterialsAndDesignKnowledgeBase,
    meta: {
        auth: undefined
    }
}, {
    path: '/MaterialsAndDesignKnowledgeBase/AddArticle',
    name: '材料與設計知識庫新增',
    component: GreenhouseTechnologyKnowledgeBase_AddKnowledgeBase,
    meta: {
        auth: true
    }
}, {
    path: '/MaterialsAndDesignKnowledgeBase/EditArticle/:id',
    name: '材料與設計知識庫編輯',
    component: GreenhouseTechnologyKnowledgeBase_EditKnowledgeBase,
    meta: {
        auth: true
    }
}, {
    path: '/GreenhouseFluidAnalysis/SimpleGreenhouse',
    name: '溫室流體分析-簡易溫室',
    component: GreenhouseFluidAnalysis_SimpleGreenhouse,
    meta: {
        auth: undefined
    }
}, {
    path: '/GreenhouseFluidAnalysis/DomeGreenhouse',
    name: '溫室流體分析-圓頂溫室',
    component: GreenhouseFluidAnalysis_DomeGreenhouse,
    meta: {
        auth: undefined
    }
}, {
    path: '/GreenhouseFluidAnalysis/MountainGreenhouse',
    name: '溫室流體分析-山型溫室',
    component: GreenhouseFluidAnalysis_MountainGreenhouse,
    meta: {
        auth: undefined
    }
}, {
    path: '/GreenhouseFluidAnalysis/InclinedRoofGreenhouse',
    name: '溫室流體分析-斜頂溫室',
    component: GreenhouseFluidAnalysis_InclinedRoofGreenhouse,
    meta: {
        auth: undefined
    }
}, {
    path: '/GreenhouseFluidAnalysis/GreenhouseWindPressureChart',
    name: '溫室流體分析-風壓型式比較',
    component: GreenhouseFluidAnalysis_GreenhouseWindPressureChart,
    meta: {
        auth: undefined
    }
}, {
    path: '/MaterialStructureAnalysis/RoundPipe',
    name: '材料結構分析-圓管材',
    component: MaterialStructureAnalysis_RoundPipe,
    meta: {
        auth: undefined
    }
}, {
    path: '/MaterialStructureAnalysis/ProfilePipe',
    name: '材料結構分析-型管材',
    component: MaterialStructureAnalysis_ProfilePipe,
    meta: {
        auth: undefined
    }
}, {
    path: '/MaterialStructureAnalysis/Truss',
    name: '材料結構分析-桁架',
    component: MaterialStructureAnalysis_Truss,
    meta: {
        auth: undefined
    }
}, {
    path: '/GreenhouseStructureAnalysis/RobustGreenhouse',
    name: '溫室結構分析-強固型溫室',
    component: GreenhouseStructureAnalysis_RobustGreenhouse,
    meta: {
        auth: undefined
    }
}, {
    path: '/GreenhouseStructureAnalysis/SimpleGreenhouse',
    name: '溫室結構分析-簡易型溫室',
    component: GreenhouseStructureAnalysis_SimpleGreenhouse,
    meta: {
        auth: undefined
    }
}, {
    path: '/GreenhouseMasterPlan/GeographicalEnvironmentAnalysis',
    name: '地理環境分析',
    component: GreenhouseMasterPlan_GeographicalEnvironmentAnalysis,
    meta: {
        auth: undefined
    }
}, {
    path: '/GreenhouseMasterPlan/CropSelection',
    name: '溫室作物選擇',
    component: GreenhouseMasterPlan_CropSelection,
    meta: {
        auth: undefined
    }
}, {
    path: '/GreenhouseMasterPlan/CropEnvironmentalDemandAnalysis',
    name: '作物環境分析',
    component: GreenhouseMasterPlan_CropEnvironmentalDemandAnalysis,
    meta: {
        auth: undefined
    }
}, {
    path: '/GreenhouseMasterPlan/CostAnalysis/GreenhouseConstructionCostAnalysis',
    name: '溫室構造成本分析',
    component: GreenhouseMasterPlan_GreenhouseConstructionCostAnalysis,
    meta: {
        auth: undefined
    }
}, {
    path: '/GreenhouseMasterPlan/CostAnalysis/GreenhouseMaterialCostAnalysis',
    name: '溫室材料成本分析',
    component: GreenhouseMasterPlan_GreenhouseMaterialCostAnalysis,
    meta: {
        auth: undefined
    }
}, {
    path: '/Q&A',
    name: '常見問題Q&A',
    component: QandA,
    meta: {
        auth: undefined
    }
}, {
    path: '/UnitConversion',
    name: '各單位換算',
    component: UnitConversion,
    meta: {
        auth: undefined
    }
}, {
    path: '/categories',
    name: 'categories',
    component: Categories,
    meta: {
        auth: undefined
    }
}, {
    path: '/123',
    name: 'welcome',
    component: Welcome,
    meta: {
        auth: undefined
    }
}];

const router = new VueRouter({
    routes: routes,
    linkActiveClass: 'active'
});

export default router;