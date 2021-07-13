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

                        <!-- <div class="sb-sidenav-menu-heading">測試</div>

                        <router-link to="/test" class="nav-link" exact>
                            <b-icon icon="hammer"></b-icon> 頁面測試
                        </router-link>
                        <router-link to="/categories" class="nav-link" exact>
                            Categories
                        </router-link> -->

                        <div class="sb-sidenav-menu-heading">知識庫</div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#溫室技術知識庫" aria-expanded="false" aria-controls="溫室技術知識庫">
                            <div class="sb-nav-link-icon"><b-icon icon="book"></b-icon></div>
                            溫室技術知識庫
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="溫室技術知識庫" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <router-link to="/MaterialsAndDesignKnowledgeBase/Article" class="nav-link" exact>
                                    材料知識庫
                                </router-link>

                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#分析知識庫" aria-expanded="false" aria-controls="分析知識庫">
                                    分析知識庫
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="分析知識庫" aria-labelledby="headingOne" data-parent="#溫室技術知識庫">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#溫室流體分析" aria-expanded="false" aria-controls="溫室流體分析">
                                            溫室流體分析
                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        </a>
                                        <div class="collapse" id="溫室流體分析" aria-labelledby="headingOne" data-parent="#分析知識庫">
                                            <nav class="sb-sidenav-menu-nested nav">
                                                <router-link to="/GreenhouseFluidAnalysis/SimpleGreenhouse" class="nav-link" exact>
                                                    簡易溫室
                                                </router-link>
                                                <router-link to="/GreenhouseFluidAnalysis/DomeGreenhouse" class="nav-link" exact>
                                                    圓頂溫室
                                                </router-link>
                                                <router-link to="/GreenhouseFluidAnalysis/MountainGreenhouse" class="nav-link" exact>
                                                    山型溫室
                                                </router-link>
                                                <router-link to="/GreenhouseFluidAnalysis/InclinedRoofGreenhouse" class="nav-link" exact>
                                                    斜頂溫室
                                                </router-link>
                                                <router-link to="/GreenhouseFluidAnalysis/GreenhouseWindPressureChart" class="nav-link" exact>
                                                    型式風壓比較
                                                </router-link>
                                            </nav>
                                        </div>

                                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#材料結構分析" aria-expanded="false" aria-controls="材料結構分析">
                                            材料結構分析
                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        </a>
                                        <div class="collapse" id="材料結構分析" aria-labelledby="headingOne" data-parent="#分析知識庫">
                                            <nav class="sb-sidenav-menu-nested nav">
                                                <router-link to="/MaterialStructureAnalysis/RoundPipe" class="nav-link" exact>
                                                    圓管材
                                                </router-link>
                                                <router-link to="/MaterialStructureAnalysis/ProfilePipe" class="nav-link" exact>
                                                    型材
                                                </router-link>
                                                <router-link to="/MaterialStructureAnalysis/Truss" class="nav-link" exact>
                                                    桁架
                                                </router-link>
                                            </nav>
                                        </div>

                                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#溫室結構分析" aria-expanded="false" aria-controls="溫室結構分析">
                                            溫室結構分析
                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        </a>
                                        <div class="collapse" id="溫室結構分析" aria-labelledby="headingOne" data-parent="#分析知識庫">
                                            <nav class="sb-sidenav-menu-nested nav">
                                                <router-link to="/GreenhouseStructureAnalysis/RobustGreenhouse" class="nav-link" exact>
                                                    強固型溫室
                                                </router-link>
                                                <router-link to="/GreenhouseStructureAnalysis/SimpleGreenhouse" class="nav-link" exact>
                                                    簡易型溫室
                                                </router-link>
                                            </nav>
                                        </div>
                                    </nav>
                                </div>

                                <router-link to="/MaterialsAndDesignKnowledgeBase/Article" class="nav-link" exact>
                                    設計知識庫
                                </router-link>
                            </nav>
                        </div>



                        <div class="sb-sidenav-menu-heading">科普 / 查詢</div>
                        <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#溫室總體規劃系統" aria-expanded="false" aria-controls="溫室總體規劃系統">
                            <div class="sb-nav-link-icon"><b-icon icon="book"></b-icon></div>
                            溫室總體規劃系統
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a> -->

                                <!-- <router-link to="/GreenhouseMasterPlan/CropSelection" class="nav-link" exact>

                                    溫室作物選擇
                                </router-link>

                                <router-link to="/GreenhouseMasterPlan/CropEnvironmentalDemandAnalysis" class="nav-link" exact>
                                    作物環境需求分析

                                </router-link> -->


                                <router-link to="/GreenhouseMasterPlan/GeographicalEnvironmentAnalysis" class="nav-link" exact>
                                    地理環境分析
                                </router-link>

                                <router-link to="/GreenhouseDesign" class="nav-link" exact>
                                    溫室設計
                                </router-link>


                                <router-link to="/GreenhouseMasterPlan/CostAnalysis/GreenhouseMaterialCostAnalysis" class="nav-link" exact>
                                    溫室材料成本分析
                                </router-link>

                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#環控設計" aria-expanded="false" aria-controls="成本分析">
                                    環控設計
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>

                                <div class="collapse" id="環控設計" aria-labelledby="headingOne">

                                    <nav class="sb-sidenav-menu-nested nav">
                                        <router-link to="/EnvironmentalControlDesign/LightEnvironment" class="nav-link" exact>
                                            光環境控制
                                        </router-link>
                                        <router-link to="/EnvironmentalControlDesign/TemperatureEnvironment" class="nav-link" exact>
                                            溫環境控制
                                        </router-link>

                                        <router-link to="/Development" class="nav-link" exact>

                                            氣環境控制
                                        </router-link>
                                    </nav>
                                </div>


                                <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#成本分析" aria-expanded="false" aria-controls="成本分析">

                                    成本分析
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="成本分析" aria-labelledby="headingOne" data-parent="#溫室總體規劃系統">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <router-link to="/GreenhouseMasterPlan/CostAnalysis/GreenhouseMaterialCostAnalysis" class="nav-link" exact>
                                            溫室材料成本分析
                                        </router-link>

                                        <router-link to="/GreenhouseMasterPlan/CostAnalysis/GreenhouseConstructionCostAnalysis/easy" class="nav-link" exact>

                                            溫室構造成本分析
                                        </router-link>
                                        <router-link to="/Development" class="nav-link" exact>
                                            生產設備成本分析
                                        </router-link>
                                        <router-link to="/Development" class="nav-link" exact>
                                            環控設備成本分析
                                        </router-link>
                                        <router-link to="/Development" class="nav-link" exact>
                                            生產營運成本分析
                                        </router-link>
                                    </nav>
                                </div>

                                <router-link to="/RiskAnalysis" class="nav-link" exact>
                                    風險分析

                                </router-link> -->
                        <div class="sb-sidenav-menu-heading">規劃</div>
                            <router-link to="/GreenhouseMasterPlan/GreenhouseOverallPlan" class="nav-link" exact>
                                總體規劃
                            </router-link>
                            <router-link to="/Development" class="nav-link" exact>
                                優化分析
                            </router-link>


                        <div class="sb-sidenav-menu-heading">其他</div>
                        <router-link to="/UnitConversion" class="nav-link" exact>
                            各單位換算
                        </router-link>
                        <router-link to="/Q&A" class="nav-link" exact>
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
