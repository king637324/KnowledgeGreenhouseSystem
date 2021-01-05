<template>



    <main>
  
      <v-app-bar
      color="deep-purple accent-4"
      dark
      >
        <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
  
        <v-toolbar-title>溫室設計專家知識系統</v-toolbar-title>
  
        <v-spacer></v-spacer>
  
        <v-btn icon>
          <v-icon>mdi-magnify</v-icon>
        </v-btn>
  
        <v-btn icon>
          <v-icon>mdi-filter</v-icon>
        </v-btn>
  
        <v-btn icon>
          <v-icon>mdi-dots-vertical</v-icon>
        </v-btn>
      </v-app-bar>
  
      <v-navigation-drawer
        v-model="drawer"
        absolute
        temporary
        dark
        
      >
                   <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">

                        <div class="sb-sidenav-menu-heading">Core</div>
                        <router-link to="/" class="nav-link" exact>
                            <b-icon icon="house-door"></b-icon> 首頁
                        </router-link>

                        <div class="sb-sidenav-menu-heading">測試</div>
                        <router-link to="/categories" class="nav-link" exact>
                            Categories
                        </router-link>

                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#溫室技術知識庫" aria-expanded="false" aria-controls="溫室技術知識庫">
                            <!-- <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div> -->
                            <div class="sb-nav-link-icon"><b-icon icon="book"></b-icon></div>
                            溫室技術知識庫
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="溫室技術知識庫" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <!-- <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a> -->
                                <router-link to="/MaterialDesignKnowledgeBase" class="nav-link" exact>
                                    材料知識庫
                                </router-link>
                                <!-- <router-link to="/AnalyzeKnowledgeBase" class="nav-link" exact>
                                    分析知識庫
                                </router-link> -->
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#分析知識庫" aria-expanded="false" aria-controls="分析知識庫">
                                    分析知識庫
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="分析知識庫" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#溫室流體分析" aria-expanded="false" aria-controls="溫室流體分析">
                                            溫室流體分析
                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        </a>
                                        <div class="collapse" id="溫室流體分析" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
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
                                        <div class="collapse" id="材料結構分析" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
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
                                        <router-link to="/" class="nav-link" exact>
                                            溫室結構分析
                                        </router-link>
                                    </nav>
                                </div>
                                <router-link to="/MaterialDesignKnowledgeBase" class="nav-link" exact>
                                    設計知識庫
                                </router-link>
                            </nav>
                        </div>
                        <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Layouts
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                            </nav>
                        </div> -->

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Pages
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="login.html">Login</a>
                                        <a class="nav-link" href="register.html">Register</a>
                                        <a class="nav-link" href="password.html">Forgot Password</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    Error
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="401.html">401 Page</a>
                                        <a class="nav-link" href="404.html">404 Page</a>
                                        <a class="nav-link" href="500.html">500 Page</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Addons</div>
                        <a class="nav-link" href="charts.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Charts
                        </a>
                        <a class="nav-link" href="tables.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tables
                        </a>
                    </div>
                </div>
                <!-- <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div> -->
            </nav>
      </v-navigation-drawer>
        <router-view></router-view>
        <Foot/>
    </main>

</template>

<script>
    import BootstrapSideBar from 'b-sidebar';

    import Header from './components/Header.vue';
    import Sidrbar from './components/Sidrbar.vue';
    import Foot from './components/Foot.vue';
    import Navbar from './components/Navbar.vue';

    export default {
        components:{
            Header,
            Sidrbar,
            Foot,
            Navbar,
            BootstrapSideBar
        },
        data: () => ({
            drawer: false,
            group: null,
        }),watch: {
        group () {
            this.drawer = false
      },
    },
    }
</script>
