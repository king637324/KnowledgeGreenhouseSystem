<template>

    <div >
        <v-app-bar color="deep-purple accent-4" app dark >
            <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>

            <router-link to="/" class="nav-link" exact style="color:white;">
                <b-icon icon="house-door"></b-icon>
            </router-link>

            <v-toolbar-title>溫室設計專家知識系統</v-toolbar-title>

            <v-spacer></v-spacer>

            <!-- 檢查是否有登入會員 -->
            <div v-if="!$auth.check()">
                <v-btn icon>
                    <router-link to="/login" style="color:white;">
                        登入
                    </router-link>
                </v-btn>
            </div>
            <div v-else>
                <div class="dropdown d-flex justify-content-end" >
                    <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;">
                        Hi! {{$auth.user().name}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <!-- 顯示專家的編號 -->
                        <div v-if="$auth.user().identity === '管理者' || $auth.user().identity === '專家'">
                            <a class="dropdown-item" href="#" disabled='ture'>專家編號：{{$auth.user().id}}</a>
                            <div class="dropdown-divider"></div>  <!-- 分隔線 -->
                        </div>
                        <!-- 是管理員才能編輯資料庫 -->
                        <div v-if="$auth.user().identity === '管理者'">
                            <!-- <a class="dropdown-item" href="/managerUser">會員管理</a> -->
                            <router-link to="/Auth_managerUser" class="nav-link" exact style="color:black;">
                                會員管理
                            </router-link>
                            <div class="dropdown-divider"></div>
                        </div>
                        <!-- 登出函式 -->
                        <a class="dropdown-item" href="#" @click.prevent="$auth.logout()">登出</a>
                    </div>
                </div>

            </div>


        </v-app-bar>

        <v-navigation-drawer v-model="drawer" app dark>

            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">

                        <div class="sb-sidenav-menu-heading">規劃</div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#總體規劃" aria-expanded="false" style="font-size:20px;">
                            溫室總體規畫系統
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="總體規劃" aria-labelledby="headingOne">

                            <nav class="sb-sidenav-menu-nested nav">
                                <router-link to="/GreenhouseMasterPlan/GreenhouseOverallPlanbase" class="nav-link" style="font-size:18px;" exact>
                                    A.溫室基本資訊輸入
                                </router-link>
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#作物需求與環境分析" style="font-size:18px;" aria-expanded="false" aria-controls="成本分析">
                                    B.作物需求環境分析
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="作物需求與環境分析" aria-labelledby="headingOne">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <router-link to="/GreenhouseMasterPlan/CropSelection" style="font-size:16px;" class="nav-link" exact>
                                            1.作物需求
                                        </router-link>

                                        <router-link to="/GreenhouseMasterPlan/GeographicalEnvironmentAnalysis" style="font-size:16px;" class="nav-link" exact>
                                            2.地理分析
                                        </router-link>

                                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#環控分析" style="font-size:16px;" aria-expanded="false" aria-controls="成本分析">
                                            3.環控分析
                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        </a>


                                        <div class="collapse" id="環控分析" aria-labelledby="headingOne">

                                            <nav class="sb-sidenav-menu-nested nav">
                                                <router-link to="/EnvironmentalControlDesign/LightEnvironment" style="font-size:12px;" class="nav-link" exact>
                                                    (1).光環境分析
                                                </router-link>
                                                <router-link to="/EnvironmentalControlDesign/TemperatureEnvironment" style="font-size:12px;" class="nav-link" exact>
                                                    (2).溫環境分析
                                                </router-link>
                                            </nav>
                                        </div>
                                    </nav>
                                </div>

                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#溫室規劃設計" style="font-size:18px;" aria-expanded="false" aria-controls="成本分析">
                                    C.溫室規劃設計
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="溫室規劃設計" aria-labelledby="headingOne">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <router-link to="/GreenhouseMasterPlan/GreenhouseCoatedFilm" style="font-size:16px;" class="nav-link" exact>
                                            1.披覆材料設計
                                        </router-link>
                                        <router-link to="/GreenhouseMasterPlan/CostAnalysis/GreenhouseMaterialCostAnalysis" style="font-size:16px;" class="nav-link" exact>
                                            2.結構材料設計
                                        </router-link>
                                        <router-link to="/GreenhouseMasterPlan/Greenhousewidget" style="font-size:16px;" class="nav-link" exact>
                                            3.溫室載重設計
                                        </router-link>
                                        <router-link to="/GreenhouseMasterPlan/GreenhousePlanDesign" style="font-size:16px;" class="nav-link" exact>
                                            4.溫室型式設計
                                        </router-link>
                                        <a class="nav-link collapsed" href="#" data-toggle="collapse" style="font-size:16px;" data-target="#環控設計" aria-expanded="false" aria-controls="成本分析">
                                            5.溫室環控設計
                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        </a>

                                        <div class="collapse" id="環控設計" aria-labelledby="headingOne">

                                            <nav class="sb-sidenav-menu-nested nav">
                                                <router-link to="/EnvironmentalControlDesign/LightEnvironmentNeed" style="font-size:12px;" class="nav-link" exact>
                                                    (1).光控設計
                                                </router-link>
                                                <router-link to="/EnvironmentalControlDesign/TemperatureEnvironmentNeed" style="font-size:12px;" class="nav-link" exact>
                                                    (2).溫控設計
                                                </router-link>
                                            </nav>
                                        </div>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" style="font-size:18px;" data-target="#溫室設計分析" aria-expanded="false" aria-controls="成本分析">
                                    D.溫室設計分析
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="溫室設計分析" aria-labelledby="headingOne">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link collapsed" href="#" data-toggle="collapse" style="font-size:16px;" data-target="#材料設計分析" aria-expanded="false" aria-controls="成本分析">
                                            1.材料設計分析
                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        </a>

                                        <div class="collapse" id="材料設計分析" aria-labelledby="headingOne">

                                            <nav class="sb-sidenav-menu-nested nav">
                                                <router-link to="/GreenhouseMasterPlan/CostAnalysis/GreenhouseSteel" style="font-size:12px;" class="nav-link" exact>
                                                    (1).國際鋼材
                                                </router-link>
                                                <router-link to="/MaterialStructureAnalysis/RoundPipe" style="font-size:12px;" class="nav-link" exact>
                                                    (2).管材
                                                </router-link>
                                                <router-link to="/MaterialStructureAnalysis/ProfilePipe" style="font-size:12px;" class="nav-link" exact>
                                                    (3).型材
                                                </router-link>
                                            </nav>
                                        </div>
                                        <a class="nav-link collapsed" href="#" data-toggle="collapse" style="font-size:16px;" data-target="#載重設計分析" aria-expanded="false" aria-controls="成本分析">
                                            2.載重設計分析
                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        </a>

                                        <div class="collapse" id="載重設計分析" aria-labelledby="headingOne">

                                            <nav class="sb-sidenav-menu-nested nav">
                                                <router-link to="/GreenhouseMasterPlan/GreenhouseOwn" style="font-size:12px;" class="nav-link" exact>
                                                    (1).自載重
                                                </router-link>
                                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#風載重" style="font-size:12px;" aria-expanded="false" aria-controls="成本分析">
                                                    (2)風載重
                                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                                </a>

                                                <div class="collapse" id="風載重" aria-labelledby="headingOne">

                                                    <nav class="sb-sidenav-menu-nested nav">
                                                        <router-link to="/GreenhouseFluidAnalysis/SimpleGreenhouse" style="font-size:10px;" class="nav-link" exact>
                                                            (2.1).簡易溫室
                                                        </router-link>
                                                        <router-link to="/GreenhouseFluidAnalysis/DomeGreenhouse" style="font-size:10px;" class="nav-link" exact>
                                                            (2.2).圓頂溫室
                                                        </router-link>
                                                        <router-link to="/GreenhouseFluidAnalysis/MountainGreenhouse" style="font-size:10px;" class="nav-link" exact>
                                                            (2.3).山型溫室
                                                        </router-link>
                                                        <router-link to="/GreenhouseFluidAnalysis/InclinedRoofGreenhouse" style="font-size:10px;" class="nav-link" exact>
                                                            (2.4).斜頂溫室
                                                        </router-link>
                                                        <router-link to="/GreenhouseFluidAnalysis/GreenhouseWindPressureChart" style="font-size:10px;" class="nav-link" exact>
                                                            (2.5).溫室風壓
                                                        </router-link>
                                                    </nav>
                                                </div>
                                            </nav>
                                        </div>
                                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#結構設計分析" style="font-size:16px;" aria-expanded="false" aria-controls="成本分析">
                                            3.結構設計分析
                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        </a>

                                        <div class="collapse" id="結構設計分析" aria-labelledby="headingOne">

                                            <nav class="sb-sidenav-menu-nested nav">
                                                <router-link to="/MaterialStructureAnalysis/Truss" style="font-size:12px;" class="nav-link" exact>
                                                    (1).屋架桁架
                                                </router-link>
                                                <router-link to="/GreenhouseStructureAnalysis/SimpleGreenhouse" style="font-size:12px;" class="nav-link" exact>
                                                    (2).簡易溫室
                                                </router-link>
                                                <router-link to="/GreenhouseStructureAnalysis/RobustGreenhouse" style="font-size:12px;" class="nav-link" exact>
                                                    (2).強固溫室
                                                </router-link>
                                            </nav>
                                        </div>
                                    </nav>
                                </div>
                                <router-link class="nav-link collapsed" style="font-size:18px;" to="/GreenhouseMasterPlan/GreenhouseResult">
                                    E.溫室設計結果
                                </router-link>
                                
                            </nav>
                        </div>
                        

                        <div class="sb-sidenav-menu-heading">知識庫</div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#溫室技術知識庫" aria-expanded="false" aria-controls="溫室技術知識庫" style="font-size:20px;">
                            <div class="sb-nav-link-icon"><b-icon icon="book" style="font-size:18px;"></b-icon></div>
                            溫室技術知識庫
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="溫室技術知識庫" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <router-link to="/MaterialsAndDesignKnowledgeBase/Article" style="font-size:18px;" class="nav-link" exact>
                                    材料知識庫
                                </router-link>

                                <a class="nav-link collapsed" href="#" data-toggle="collapse" style="font-size:18px;" data-target="#分析知識庫" aria-expanded="false" aria-controls="分析知識庫">
                                    分析知識庫
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="分析知識庫" aria-labelledby="headingOne" data-parent="#溫室技術知識庫">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link collapsed" style="font-size:16px;" href="#" data-toggle="collapse" data-target="#溫室流體分析" aria-expanded="false" aria-controls="溫室流體分析">
                                            溫室流體分析
                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        </a>
                                        <div class="collapse" id="溫室流體分析" aria-labelledby="headingOne" data-parent="#分析知識庫">
                                            <nav class="sb-sidenav-menu-nested nav">
                                                <router-link to="/GreenhouseFluidAnalysis/SimpleGreenhouse" class="nav-link" style="font-size:12px;" exact>
                                                    簡易溫室
                                                </router-link>
                                                <router-link to="/GreenhouseFluidAnalysis/DomeGreenhouse" class="nav-link" style="font-size:12px;" exact>
                                                    圓頂溫室
                                                </router-link>
                                                <router-link to="/GreenhouseFluidAnalysis/MountainGreenhouse" class="nav-link" style="font-size:12px;" exact>
                                                    山型溫室
                                                </router-link>
                                                <router-link to="/GreenhouseFluidAnalysis/InclinedRoofGreenhouse" class="nav-link" style="font-size:12px;" exact>
                                                    斜頂溫室
                                                </router-link>
                                                <router-link to="/GreenhouseFluidAnalysis/GreenhouseWindPressureChart" class="nav-link" style="font-size:12px;" exact>
                                                    型式風壓比較
                                                </router-link>
                                            </nav>
                                        </div>

                                        <a class="nav-link collapsed" href="#" style="font-size:16px;" data-toggle="collapse" data-target="#材料結構分析" aria-expanded="false" aria-controls="材料結構分析">
                                            材料結構分析
                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        </a>
                                        <div class="collapse" id="材料結構分析" aria-labelledby="headingOne" data-parent="#分析知識庫">
                                            <nav class="sb-sidenav-menu-nested nav">
                                                <router-link to="/MaterialStructureAnalysis/RoundPipe" style="font-size:12px;" class="nav-link" exact>
                                                    圓管材
                                                </router-link>
                                                <router-link to="/MaterialStructureAnalysis/ProfilePipe" style="font-size:12px;" class="nav-link" exact>
                                                    型材
                                                </router-link>
                                                <router-link to="/MaterialStructureAnalysis/Truss" style="font-size:12px;" class="nav-link" exact>
                                                    桁架
                                                </router-link>
                                            </nav>
                                        </div>

                                        <a class="nav-link collapsed" href="#" data-toggle="collapse" style="font-size:16px;" data-target="#溫室結構分析" aria-expanded="false" aria-controls="溫室結構分析">
                                            溫室結構分析
                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        </a>
                                        <div class="collapse" id="溫室結構分析" aria-labelledby="headingOne" data-parent="#分析知識庫">
                                            <nav class="sb-sidenav-menu-nested nav">
                                                <router-link to="/GreenhouseStructureAnalysis/RobustGreenhouse" style="font-size:12px;" class="nav-link" exact>
                                                    強固型溫室
                                                </router-link>
                                                <router-link to="/GreenhouseStructureAnalysis/SimpleGreenhouse" style="font-size:12px;" class="nav-link" exact>
                                                    簡易型溫室
                                                </router-link>
                                            </nav>
                                        </div>
                                    </nav>
                                </div>

                                <router-link to="/MaterialsAndDesignKnowledgeBase/Article" style="font-size:18px;" class="nav-link" exact>
                                    設計知識庫
                                </router-link>

                            </nav>
                        </div>

                        <div class="sb-sidenav-menu-heading">其他</div>
                        <router-link to="/UnitConversion" class="nav-link" style="font-size:20px;"  exact> 
                            各單位換算
                        </router-link>
                        <router-link to="/Q&A" class="nav-link" style="font-size:20px;" exact>
                            常見問題Q&A
                        </router-link>

                    </div>
                </div>
            </nav>
        </v-navigation-drawer>
    </div>
</template>


<script>

    export default {
        data: () => ({
            drawer: true, // 導覽列的開關
        }),
}
</script>
