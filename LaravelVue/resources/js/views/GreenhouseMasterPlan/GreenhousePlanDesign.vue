<template>

    <div>
        <br>
        <h3 id="總體規劃X">
            溫室總體規劃系統
        </h3>
        <hr>

                <b-card-group deck v-if="showform==true">
                    <b-card header-tag="header" header-text-variant="white" header-bg-variant="info">
                        <template #header>
                            <h6 class="mb-0"><b-icon icon="flower1"></b-icon> 種植植物生長環境需求</h6>
                        </template>
                        <b-card-text>
                                <v-form>
                                <v-container-fluid>
                                    <v-row>
                                        <v-col md="2">
                                            <v-subheader>A.決策權重</v-subheader>
                                        </v-col>
                                        <v-col md="2">
                                            <v-text-field :hint="decide[0]" persistent-hint label="輸入品質性能" v-model="quality" v-on:change="countdecide"></v-text-field>
                                        </v-col>
                                        <v-col md="2">
                                            <v-text-field :hint="decide[1]" persistent-hint label="輸入風險性" v-model="risk" v-on:change="countdecide"></v-text-field>
                                        </v-col>
                                        <v-col md="2">
                                            <v-text-field :hint="decide[2]" persistent-hint label="輸入速度性" v-model="speed" v-on:change="countdecide"></v-text-field>
                                        </v-col>
                                        <v-col md="2">
                                            <v-text-field :hint="decide[3]" persistent-hint label="輸入成本性" v-model="cost" v-on:change="countdecide"></v-text-field>
                                        </v-col>
                                    </v-row>    
                                    <v-row>
                                        <v-col cols="12" md="2">
                                            <v-subheader>B.栽種面積</v-subheader>
                                        </v-col>
                                        <v-col cols="12" md="2">
                                            <v-text-field label="南北長度(m)" v-model="plantlength" v-on:change="areacount"></v-text-field>
                                        </v-col>  
                                        <v-col cols="12" md="2">
                                            <v-text-field label="東西長度(m)" v-model="plantwidth" v-on:change="areacount"></v-text-field>
                                        </v-col>    
                                        <v-col cols="12" md="2">
                                            <v-text-field readonly label="面積試算(平方公尺)" v-model="area"></v-text-field>
                                        </v-col>    
                                                             
                                    </v-row>
                                    <v-row>
                                        <v-col md="2">
                                            <v-subheader>C.溫室選擇</v-subheader>
                                        </v-col>
                                        <v-col md="4">
                                            <v-radio-group row v-model="greenhouseradio" v-on:change="updateRoofType">
                                            <v-radio label="簡易溫室" id="簡易溫室" value="簡易溫室"></v-radio>
                                            <v-radio label="強固溫室" id="強固溫室" value="強固溫室"></v-radio>
                                            </v-radio-group>
                                        </v-col>
                                    </v-row>
                                    
                                    <v-row>
                                    <v-col md="2">
                                        <v-subheader>D.溫室設計</v-subheader>
                                    </v-col>
                                    <v-col md="8" v-if="greenhouseradio == '簡易溫室'">
                                        <table style="border:1px solid black; font-size: 1.5vmin" border='1'>
                                        <thead class="table-active">
                                            <tr align="center">
                                                <td style='width:15vmin'>構建分部</td>
                                                <td>規格</td>
                                            </tr>
                                        </thead>
                                        <tr align="center" id="溫室管材">
                                            <td>溫室管材</td>
                                            <td align="left">
                                                <div class="d-inline-flex p-2 bd-highlight" v-for="(simple, index) in SimpleGreenhousePipes" :key="index">
                                                    <input type="radio" :value="simple.BuildItem" v-model="SimpleGreenhousePipe" v-on:change="updateSimpleRadio('溫室管材',simple)">
                                                    <label>{{simple.BuildItem}}</label>
                                                </div>
                                                <a href="/#/GreenhouseMasterPlan/CostAnalysis/GreenhouseMaterialCostAnalysis"><b-icon class="d-inline-flex" style="float:right;" icon="receipt"></b-icon></a>
                                                <a href="/#/MaterialStructureAnalysis/RoundPipe"><b-icon class="d-inline-flex" style="float:right;" icon="patch-question-fill"></b-icon></a>
                                            </td>
                                        </tr>
                                        <tr align="center" id="圓頂形式">
                                            <td>圓頂形式</td>
                                            <td align="left">
                                                <div class="d-inline-flex p-2 bd-highlight" v-for="(simple, index) in SimpleDomeForms" :key="index">
                                                    <input type="radio" :value="simple.BuildItem" v-model="SimpleDomeForm" v-on:change="updateSimpleRadio('圓頂形式',simple)">
                                                    <label>{{simple.BuildItem}}</label>
                                                </div>
                                                <a href="/#/GreenhouseMasterPlan/CostAnalysis/GreenhouseMaterialCostAnalysis"><b-icon class="d-inline-flex" style="float:right;" icon="receipt"></b-icon></a>
                                                <a href="/#/GreenhouseFluidAnalysis/DomeGreenhouse"><b-icon class="d-inline-flex" style="float:right;" icon="patch-question-fill"></b-icon></a>
                                            </td>
                                        </tr>
                                        <tr align="center" id="圓拱距">
                                            <td>圓拱距</td>
                                            <td align="left">
                                                <div class="d-inline-flex p-2 bd-highlight" v-for="(simple, index) in SimpleCircularArchDistances" :key="index">
                                                    <input type="radio" :value="simple.BuildItem" v-model="SimpleCircularArchDistance" v-on:change="updateSimpleRadio('圓拱距',simple)">
                                                    <label>{{simple.BuildItem}}</label>
                                                </div>
                                                <a href="/#/GreenhouseMasterPlan/CostAnalysis/GreenhouseMaterialCostAnalysis"><b-icon class="d-inline-flex" style="float:right;" icon="receipt"></b-icon></a>
                                                <a href="/#/GreenhouseStructureAnalysis/SimpleGreenhouse"><b-icon class="d-inline-flex" style="float:right;" icon="patch-question-fill"></b-icon></a>
                                            </td>
                                        </tr>
                                        <tr align="center" id="簡易基礎">
                                            <td>基礎</td>
                                            <td align="left">
                                                <div class="d-inline-flex p-2 bd-highlight" v-for="(simple, index) in SimpleFoundations" :key="index">
                                                    <input type="radio" :value="simple.BuildItem" v-model="SimpleFoundation" v-on:change="updateSimpleRadio('基礎',simple)">
                                                    <label>{{simple.BuildItem}}</label>
                                                </div>
                                                <a href="/#/GreenhouseMasterPlan/CostAnalysis/GreenhouseMaterialCostAnalysis"><b-icon class="d-inline-flex" style="float:right;" icon="receipt"></b-icon></a>
                                                <a href="/#/GreenhouseStructureAnalysis/SimpleGreenhouse"><b-icon class="d-inline-flex" style="float:right;" icon="patch-question-fill"></b-icon></a>
                                            </td>
                                        </tr>
                                        <tr align="center" id="簡易跨距">
                                            <td>跨距</td>
                                            <td align="left">
                                                <div class="d-inline-flex p-2 bd-highlight" v-for="(simple, index) in SimpleSpans" :key="index">
                                                    <input type="radio" :value="simple.BuildItem" v-model="SimpleSpan" v-on:change="updateSimpleRadio('跨距',simple)">
                                                    <label>{{simple.BuildItem}}</label>
                                                </div>
                                                <a href="/#/GreenhouseMasterPlan/CostAnalysis/GreenhouseMaterialCostAnalysis"><b-icon class="d-inline-flex" style="float:right;" icon="receipt"></b-icon></a>
                                                <a href="/#/GreenhouseStructureAnalysis/SimpleGreenhouse"><b-icon class="d-inline-flex" style="float:right;" icon="patch-question-fill"></b-icon></a>
                                            </td>
                                        </tr>
                                        <tr align="center" id="簡易肩高">
                                            <td>肩高</td>
                                            <td align="left">
                                                <div class="d-inline-flex p-2 bd-highlight" v-for="(simple, index) in SimpleShoulderHeights" :key="index">
                                                    <input type="radio" :value="simple.BuildItem" v-model="SimpleShoulderHeight" v-on:change="updateSimpleRadio('肩高',simple)">
                                                    <label>{{simple.BuildItem}}</label>
                                                </div>
                                                <a href="/#/GreenhouseMasterPlan/CostAnalysis/GreenhouseMaterialCostAnalysis"><b-icon class="d-inline-flex" style="float:right;" icon="receipt"></b-icon></a>
                                                <a href="/#/GreenhouseStructureAnalysis/SimpleGreenhouse"><b-icon class="d-inline-flex" style="float:right;" icon="patch-question-fill"></b-icon></a>
                                            </td>
                                        </tr>
                                        <tr align="center" id="簡易長度">
                                            <td>長度</td>
                                            <td align="left">
                                                <div class="d-inline-flex p-2 bd-highlight" v-for="(simple, index) in SimpleLengths" :key="index">
                                                    <input type="radio" :value="simple.BuildItem" v-model="SimpleLength" v-on:change="updateSimpleRadio('長度',simple)">
                                                    <label>{{simple.BuildItem}}</label>
                                                </div>
                                                <a href="/#/GreenhouseMasterPlan/CostAnalysis/GreenhouseMaterialCostAnalysis"><b-icon class="d-inline-flex" style="float:right;" icon="receipt"></b-icon></a>
                                                <a href="/#/GreenhouseStructureAnalysis/SimpleGreenhouse"><b-icon class="d-inline-flex" style="float:right;" icon="patch-question-fill"></b-icon></a>
                                            </td>
                                        </tr>
                                        <tr align="center" id="簡易連續性">
                                            <td>連續性</td>
                                            <td align="left">
                                                <div class="d-inline-flex p-2 bd-highlight" v-for="(simple, index) in SimpleContinuitys" :key="index">
                                                    <input type="radio" :value="simple.BuildItem" v-model="SimpleContinuity" v-on:change="updateSimpleRadio('連續性',simple)">
                                                    <label>{{simple.BuildItem}}</label>
                                                </div>
                                                <a href="/#/GreenhouseMasterPlan/CostAnalysis/GreenhouseMaterialCostAnalysis"><b-icon class="d-inline-flex" style="float:right;" icon="receipt"></b-icon></a>
                                                <a href="/#/MaterialsAndDesignKnowledgeBase/Article"><b-icon class="d-inline-flex" style="float:right;" icon="patch-question-fill"></b-icon></a>
                                            </td>                    
                                        </tr>
                                        <tr align="center" id="簡易披覆材料">
                                            <td>披覆材料</td>
                                            <td align="left">
                                                <div class="d-inline-flex p-2 bd-highlight" v-for="(simple, index) in SimpleCoatingFilms" :key="index">
                                                    <input type="radio" :value="simple.BuildItem" v-model="SimpleCoatingFilm" v-on:change="updateSimpleRadio('披覆材料',simple)">
                                                    <label>{{simple.BuildItem}}</label>
                                                </div>
                                                <a href="/#/GreenhouseMasterPlan/CostAnalysis/GreenhouseMaterialCostAnalysis"><b-icon class="d-inline-flex" style="float:right;" icon="receipt"></b-icon></a>
                                                <a href="/#/MaterialsAndDesignKnowledgeBase/Article"><b-icon class="d-inline-flex" style="float:right;" icon="patch-question-fill"></b-icon></a>
                                            </td>
                                        </tr>
                                        </table>
                                    </v-col>
                                    <v-col md="8" v-else-if="greenhouseradio == '強固溫室'">
                                        <table style="border:1px solid black; font-size: 1.5vmin" border='1'>
                                        <thead class="table-active">
                                            <tr align="center">
                                                <td style='width:15vmin'>構建分部</td>
                                                <td>規格</td>
                                            </tr>
                                        </thead>
                                        <tr align="center" id="溫室型材">
                                            <td>溫室型材</td>
                                            <td align="left">
                                                <div class="d-inline-flex p-2 bd-highlight" v-for="(robust, index) in StrongGreenhousPprofiles" :key="index">
                                                    <input type="radio" :value="robust.BuildItem" v-model="RobustGreenhouseProfile" v-on:change="updateRobustRadio('溫室型材',robust)">
                                                    <label>{{robust.BuildItem}}</label>
                                                </div>

                                                <a href="/#/GreenhouseMasterPlan/CostAnalysis/GreenhouseMaterialCostAnalysis"><b-icon class="d-inline-flex" style="float:right;" icon="receipt"></b-icon></a>
                                                <a href="/#/MaterialStructureAnalysis/ProfilePipe"><b-icon class="d-inline-flex" style="float:right;" icon="patch-question-fill"></b-icon></a>

                                            </td>
                                        </tr>
                                        <tr align="center" id="屋頂形式">
                                            <td>屋頂形式</td>
                                            <td align="left">
                                                <div class="d-inline-flex p-2 bd-highlight" v-for="(robust, index) in StrongRoofForms" :key="index">
                                                    <input type="radio" :value="robust.BuildItem" v-model="RobustRoofForm" v-on:change="updateRobustRadio('屋頂形式',robust)">
                                                    <label>{{robust.BuildItem}}</label>
                                                </div>

                                                <a href="/#/GreenhouseMasterPlan/CostAnalysis/GreenhouseMaterialCostAnalysis"><b-icon class="d-inline-flex" style="float:right;" icon="receipt"></b-icon></a>
                                                <a href="/#/GreenhouseFluidAnalysis/GreenhouseWindPressureChart"><b-icon class="d-inline-flex" style="float:right;" icon="patch-question-fill"></b-icon></a>

                                            </td>
                                        </tr>
                                        <tr align="center" id="上拱距">
                                            <td>上拱距</td>
                                            <td align="left">
                                                <div class="d-inline-flex p-2 bd-highlight" v-for="(robust, index) in StrongUpperArchDistances" :key="index">
                                                    <input type="radio" :value="robust.BuildItem" v-model="RobustUpperArch" v-on:change="updateRobustRadio('上拱距',robust)">
                                                    <label>{{robust.BuildItem}}</label>
                                                </div>

                                                <a href="/#/GreenhouseMasterPlan/CostAnalysis/GreenhouseMaterialCostAnalysis"><b-icon class="d-inline-flex" style="float:right;" icon="receipt"></b-icon></a>
                                                <a href="/#/GreenhouseStructureAnalysis/RobustGreenhouse"><b-icon class="d-inline-flex" style="float:right;" icon="patch-question-fill"></b-icon></a>

                                            </td>
                                        </tr>
                                        <tr align="center" id="基礎">
                                            <td>基礎</td>
                                            <td align="left">
                                                <div class="d-inline-flex p-2 bd-highlight" v-for="(robust, index) in StrongFoundations" :key="index">
                                                    <input type="radio" :value="robust.BuildItem" v-model="RobustFoundation" v-on:change="updateRobustRadio('基礎',robust)">
                                                    <label>{{robust.BuildItem}}</label>
                                                </div>

                                                <a href="/#/GreenhouseMasterPlan/CostAnalysis/GreenhouseMaterialCostAnalysis"><b-icon class="d-inline-flex" style="float:right;" icon="receipt"></b-icon></a>
                                                <a href="/#/GreenhouseStructureAnalysis/RobustGreenhouse"><b-icon class="d-inline-flex" style="float:right;" icon="patch-question-fill"></b-icon></a>

                                            </td>
                                        </tr>
                                        <tr align="center" id="跨距">
                                            <td>跨距</td>
                                            <td align="left">
                                                <div class="d-inline-flex p-2 bd-highlight" style="valign:center;" v-for="(robust, index) in StrongSpans" :key="index">
                                                    <input type="radio" :value="robust.BuildItem" v-model="RobustSpan" v-on:change="updateRobustRadio('跨距',robust)">
                                                    <label>{{robust.BuildItem}}</label>
                                                </div>
                                                <a href="/#/GreenhouseMasterPlan/CostAnalysis/GreenhouseMaterialCostAnalysis"><b-icon class="d-inline-flex" style="float:right;" icon="receipt"></b-icon></a>
                                                <a href="/#/GreenhouseStructureAnalysis/RobustGreenhouse"><b-icon class="d-inline-flex" style="float:right;" icon="patch-question-fill"></b-icon></a>

                                            </td>
                                        </tr>
                                        <tr align="center" id="肩高">
                                            <td>肩高</td>
                                            <td align="left">
                                                <div class="d-inline-flex p-2 bd-highlight" v-for="(robust, index) in StrongShoulderHeights" :key="index">
                                                    <input type="radio" :value="robust.BuildItem" v-model="RobustShoulderHeight" v-on:change="updateRobustRadio('肩高',robust)">
                                                    <label>{{robust.BuildItem}}</label>
                                                </div>

                                                <a href="/#/GreenhouseMasterPlan/CostAnalysis/GreenhouseMaterialCostAnalysis"><b-icon class="d-inline-flex" style="float:right;" icon="receipt"></b-icon></a>
                                                <a href="/#/GreenhouseStructureAnalysis/RobustGreenhouse"><b-icon class="d-inline-flex" style="float:right;" icon="patch-question-fill"></b-icon></a>

                                            </td>
                                        </tr>
                                        <tr align="center" id="長度">
                                            <td>長度</td>
                                            <td align="left">
                                                <div class="d-inline-flex p-2 bd-highlight" v-for="(robust, index) in StrongLengths" :key="index">
                                                    <input type="radio" :value="robust.BuildItem" v-model="RobustLength" v-on:change="updateRobustRadio('長度',robust)">
                                                    <label>{{robust.BuildItem}}</label>
                                                </div>

                                                <a href="/#/GreenhouseMasterPlan/CostAnalysis/GreenhouseMaterialCostAnalysis"><b-icon class="d-inline-flex" style="float:right;" icon="receipt"></b-icon></a>
                                                <a href="/#/GreenhouseStructureAnalysis/RobustGreenhouse"><b-icon class="d-inline-flex" style="float:right;" icon="patch-question-fill"></b-icon></a>

                                            </td>
                                        </tr>
                                        <tr align="center" id="連續性">
                                            <td>連續性</td>
                                            <td align="left">
                                                <div class="d-inline-flex p-2 bd-highlight" v-for="(robust, index) in StrongContinuitys" :key="index">
                                                    <input type="radio" :value="robust.BuildItem" v-model="RobustContinuity" v-on:change="updateRobustRadio('連續性',robust)">
                                                    <label>{{robust.BuildItem}}</label>
                                                </div>
                                                <a href="/#/GreenhouseMasterPlan/CostAnalysis/GreenhouseMaterialCostAnalysis"><b-icon class="d-inline-flex" style="float:right;" icon="receipt"></b-icon></a>
                                                <a href="/#/MaterialsAndDesignKnowledgeBase/Article"><b-icon class="d-inline-flex" style="float:right;" icon="patch-question-fill"></b-icon></a>
                                            </td>
                                        </tr>
                                        <tr align="center" id="披覆材料">
                                            <td>披覆材料</td>

                                            <td align="left">
                                                <div class="d-inline-flex p-2 bd-highlight" v-for="(robust, index) in SimpleCoatingFilms" :key="index">
                                                    <input type="radio" :value="robust.BuildItem" v-model="RobustCoatingFilm" v-on:change="updateRobustRadio('披覆材料',robust)">
                                                    <label>{{robust.BuildItem}}</label>
                                                </div>

                                                <a href="/#/GreenhouseMasterPlan/CostAnalysis/GreenhouseMaterialCostAnalysis"><b-icon class="d-inline-flex" style="float:right;" icon="receipt"></b-icon></a>
                                                <a href="/#/MaterialsAndDesignKnowledgeBase/Article"><b-icon class="d-inline-flex" style="float:right;" icon="patch-question-fill"></b-icon></a>
                                            </td>
                                        </tr>
                                        </table>
                                    </v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col>
                                        <b-card header-tag="header" v-if="greenhouseradio == '簡易溫室'">
                                            <template #header>
                                                <h6 class="mb-0"><b-icon icon="building"></b-icon> 簡 易 型 溫 室 成 本、風 險、工 時、預 估</h6>
                                            </template>
                                            <b-card-text>
                                                <br>
                                                <!-- 標準簡易型溫室成本價格 -->
                                                <v-container>
                                                    <v-row>
                                                        <v-col>
                                                            <table style="border:1px solid black; " border='1'>
                                                                <thead class="table-active">
                                                                    <tr align="center">
                                                                        <td>構建分部</td>
                                                                        <td>標準規格</td>
                                                                        <td>成本性</td>
                                                                        <td>結構風險</td>
                                                                        <td>作業難度</td>
                                                                    </tr>
                                                                </thead>
                                                                <tr align="center">
                                                                    <td> 溫室管材 </td>
                                                                    <td> 標準管材 </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td> 圓頂形式 </td>
                                                                    <td> 單一圓拱 </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td> 圓拱距 </td>
                                                                    <td> 1M-1" </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td> 基礎 </td>
                                                                    <td> 直插40cm </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td> 跨距 </td>
                                                                    <td> 5.4m </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td> 肩高 </td>
                                                                    <td> 2m </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td> 長度 </td>
                                                                    <td> 30m </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td> 連續性	 </td>
                                                                    <td> 獨棟 </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td> 披覆膜	</td>
                                                                    <td> PE獨棟 </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td> 參數分析 </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                </tr>
                                                                
                                                                <tr align="center">
                                                                    <td rowspan="3">成本分析</td>
                                                                    <td>每平方米單價</td>
                                                                    <td colspan="3">NT$ 650</td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td>每坪單價</td>
                                                                    <td colspan="3">NT$ 2149</td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td>總價</td>
                                                                    <td colspan="3">NT$ {{650*area}}</td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td>風險分析</td>
                                                                    <td>風險指數</td>
                                                                    <td colspan="3">1.0</td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td>工時分析</td>
                                                                    <td>工期</td>
                                                                    <td colspan="3">{{Math.round(20+1*40*area/1000*100)/100}}</td>
                                                                </tr>

                                                            </table>
                                                        </v-col>
                                                        <v-col>
                                                            <div class="p-2 bd-highlight">
                                                                <table style="border:1px solid black; font-size: 1.7vmin" border='1'>
                                                                    <thead class="table-active">
                                                                        <tr align="center">
                                                                            <td>構建分部</td>
                                                                            <td>規格選擇</td>
                                                                            <td>成本性</td>
                                                                            <td>結構風險</td>
                                                                            <td>作業難度</td>
                                                                        </tr>
                                                                    </thead>
                                                                
                                                                    <tr align="center" v-for="(select, index) in SelectSimple" :key="index">
                                                                        <td> {{select[0]}}</td>
                                                                        <td> {{select[1].BuildItem}} </td>
                                                                        <td> {{select[1].Cost}} </td>
                                                                        <td> {{select[1].StructuralRisk}} </td>
                                                                        <td> {{select[1].JobDifficulty}} </td>
                                                                    </tr>
                                                                    <tr align="center">
                                                                        <td colspan=""> 參數分析 </td>
                                                                        <td>  </td>
                                                                        <td> {{SimpleCostAdd}} </td>
                                                                        <td> {{SimpleStructuralRiskAdd}} </td>
                                                                        <td> {{SimpleJobDifficultyAdd}} </td>

                                                                    </tr>
                                                                    
                                                                    <tr align="center">
                                                                        <td rowspan="3">成本分析</td>
                                                                        <td>每平方米單價</td>
                                                                        <td colspan="3">NT$ {{Math.floor(SimpleCostAdd*650)}}</td>
                                                                    </tr>
                                                                    <tr align="center">
                                                                        <td>每坪單價</td>
                                                                        <td colspan="3">NT$ {{Math.floor(SimpleCostAdd*650/0.3025)}}</td>
                                                                    </tr>
                                                                    <tr align="center">
                                                                        <td>總價</td>
                                                                        <td colspan="3">NT$ {{Math.floor(SimpleCostAdd*650*area)}}</td>
                                                                    </tr>
                                                                    <tr align="center">
                                                                        <td>風險分析</td>
                                                                        <td>風險指數</td>
                                                                        <td colspan="3">{{SimpleStructuralRiskAdd}}</td>
                                                                    </tr>
                                                                    <tr align="center">
                                                                        <td>工時分析</td>
                                                                        <td>工期</td>
                                                                        <td colspan="3">{{Math.round(20+SimpleJobDifficultyAdd*40*area/1000*100)/100}}</td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </v-col>
                                                    </v-row>
                                                </v-container>
                                            </b-card-text>
                                        </b-card>
                                        <b-card header-tag="header" v-else-if="greenhouseradio == '強固溫室'">
                                            <template #header>
                                                <h6 class="mb-0"><b-icon icon="building"></b-icon> 強 固 型 溫 室 成 本、風 險、工 時、預 估</h6>
                                            </template>
                                            <b-card-text>
                                                <br>
                                                <!-- 標準簡易型溫室成本價格 -->
                                                <v-container>
                                                    <v-row>
                                                        <v-col>
                                                            <table style="border:1px solid black; font-size: 1.7vmin" border='1'>
                                                                <thead class="table-active">
                                                                    <tr align="center">
                                                                        <td>構建分部</td>
                                                                        <td>標準規格</td>
                                                                        <td>成本性</td>
                                                                        <td>結構風險</td>
                                                                        <td>作業難度</td>
                                                                    </tr>
                                                                </thead>
                                                                <tr align="center">
                                                                    <td> 溫室型材 </td>
                                                                    <td> 標準型材 </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td> 屋頂形式 </td>
                                                                    <td> 圓頂UBP </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td> 上拱距 </td>
                                                                    <td> 2M </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td> 基礎 </td>
                                                                    <td> 獨立基礎 </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td> 跨距 </td>
                                                                    <td> 6m </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td> 肩高 </td>
                                                                    <td> 3m </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td> 長度 </td>
                                                                    <td> 30m </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td> 連續性	</td>
                                                                    <td> 獨棟 </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td> 披覆膜 </td>
                                                                    <td> PE </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td> 參數分析 </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                    <td> 1.00 </td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td rowspan="3">成本分析</td>
                                                                    <td>每平方米單價</td>
                                                                    <td colspan="3">NT$ 1300</td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td>每坪單價</td>
                                                                    <td colspan="3">NT$ 4298</td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td>總價</td>
                                                                    <td colspan="3">NT$ 1300</td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td>風險分析</td>
                                                                    <td>風險指數</td>
                                                                    <td colspan="3">1.0</td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td>工時分析</td>
                                                                    <td>工期</td>
                                                                    <td colspan="3">{{Math.round(30+1*60*area/1000*100)/100}}</td>
                                                                </tr>

                                                            </table>
                                                        </v-col>
                                                        <v-col>
                                                            <table style="border:1px solid black; font-size: 1.7vmin" border='1'>
                                                                <thead class="table-active">
                                                                    <tr align="center">
                                                                        <td>構建分部</td>
                                                                        <td>規格選擇</td>
                                                                        <td>成本性</td>
                                                                        <td>結構風險</td>
                                                                        <td>作業難度</td>
                                                                    </tr>
                                                                </thead>
                                                                <tr align="center" v-for="(select, index) in  SelectRobust" :key="index">
                                                                    <td> {{select[0]}}</td>
                                                                    <td> {{select[1].BuildItem}} </td>
                                                                    <td> {{select[1].Cost}} </td>
                                                                    <td> {{select[1].StructuralRisk}} </td>
                                                                    <td> {{select[1].JobDifficulty}} </td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td colspan=""> 參數分析 </td>
                                                                    <td>  </td>
                                                                    <td> {{RobustCostAdd}} </td>
                                                                    <td> {{RobustStructuralRiskAdd}} </td>
                                                                    <td> {{RobustJobDifficultyAdd}} </td>

                                                                </tr>
                                                        
                                                                <tr align="center">
                                                                    <td rowspan="3">成本分析</td>
                                                                    <td>每平方米單價</td>
                                                                    <td colspan="3">NT$ {{Math.floor(RobustCostAdd*1300)}}</td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td>每坪單價</td>
                                                                    <td colspan="3">NT$ {{Math.floor(RobustCostAdd*1300/0.3025)}}</td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td>總價</td>
                                                                    <td colspan="3">NT$ {{Math.floor(RobustCostAdd*1300*area)}}</td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td>風險分析</td>
                                                                    <td>風險指數</td>
                                                                    <td colspan="3">{{RobustStructuralRiskAdd}}</td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td>工時分析</td>
                                                                    <td>工期</td>
                                                                    <td colspan="3">{{Math.round(30+RobustJobDifficultyAdd*60*area/1000*100)/100}}</td>
                                                                </tr>
                                                            </table>
                                                        </v-col>
                                                    </v-row>
                                                </v-container>
                                            </b-card-text>
                                        </b-card>
                                        </v-col>
                                    </v-row>                    
                                </v-container-fluid>
                                </v-form>
                                <br><br><br><br><br><br>

                        </b-card-text>
                    </b-card>
                    <b-card header-tag="header" header-text-variant="white" header-bg-variant="info">
                        <template #header>
                            <h6 class="mb-0"><b-icon icon="flower1"></b-icon> 規劃結果-比較分析</h6>
                        </template>
                        <b-card-text>
                            <h5>
                                請選擇欲察看之知識庫：
                                <b-select v-model="knowledgeIdx" style="width:20vmin" >
                                    <option v-for="(know, index) in knowledge" :value="know">
                                        {{know}}
                                    </option>
                                </b-select>
                            </h5>
                            <div v-if="knowledgeIdx=='溫室管材&型材'">
                                <v-radio-group row v-model="housetype"> 
                                    <v-radio v-for="(type, index) in housetypelist" :value="type" :label="type" :key="index"></v-radio>
                                </v-radio-group>
                                <img src="/image/溫室管材.JPG" v-if="housetype=='溫室管材'">
                                <img src="/image/管材規格(1).JPG" v-if="housetype=='管材規格'">
                                <img src="/image/管材規格(2).JPG" v-if="housetype=='管材規格'">
                                <img src="/image/管材規格(3).JPG" v-if="housetype=='管材規格'">
                                <img src="/image/溫室型材.JPG" v-if="housetype=='溫室型材'">
                                <img src="/image/型材規格(1).JPG" v-if="housetype=='型材規格'">
                                <img src="/image/型材規格(2).JPG" v-if="housetype=='型材規格'">
                                <img src="/image/型材規格(3).JPG" v-if="housetype=='型材規格'">
                            </div>
                            <div v-if="knowledgeIdx=='圓頂形式'">
                                <v-radio-group row v-model="pipetype"> 
                                    <v-radio v-for="(type, index) in pipetypelist" :value="type" :label="type" :key="index"></v-radio>
                                </v-radio-group>
                                <img src="/image/強固溫室.JPG" v-if="pipetype=='強固溫室'">
                                <img src="/image/強固溫室(1).JPG" v-if="pipetype=='強固溫室'">
                                <img src="/image/強固溫室(2).JPG" v-if="pipetype=='強固溫室'">
                                <img src="/image/簡易溫室(1).JPG" v-if="pipetype=='簡易溫室'">
                                <img src="/image/簡易溫室(2).JPG" v-if="pipetype=='簡易溫室'">
                                <img src="/image/使用年限.JPG" v-if="pipetype=='使用年限'">
                                <img src="/image/溫室屋頂強化結構.JPG" v-if="pipetype=='溫室屋頂強化結構'">
                                <img src="/image/強固溫室型式標準圖(1).JPG" v-if="pipetype=='強固溫室型式標準圖'">
                                <img src="/image/強固溫室型式標準圖(2).JPG" v-if="pipetype=='強固溫室型式標準圖'">
                                <img src="/image/強固溫室型式標準圖(3).JPG" v-if="pipetype=='強固溫室型式標準圖'">
                                <img src="/image/強固溫室型式標準圖(4).JPG" v-if="pipetype=='強固溫室型式標準圖'">
                                <img src="/image/強固溫室型式標準圖(5).JPG" v-if="pipetype=='強固溫室型式標準圖'">
                            </div>
                            <div v-if="knowledgeIdx=='圓拱距'">
                                <v-radio-group row v-model="rooftype"> 
                                    <v-radio v-for="(type, index) in rooftypelist" :value="type" :label="type" :key="index"></v-radio>
                                </v-radio-group>
                                <img src="/image/溫室圓拱距(桁距)設計.JPG" v-if="rooftype=='溫室圓拱距(桁距)設計'">
                            </div>
                            <div v-if="knowledgeIdx=='基礎'">
                                <v-radio-group row v-model="basetype"> 
                                    <v-radio v-for="(type, index) in basetypelist" :value="type" :label="type" :key="index"></v-radio>
                                </v-radio-group>
                                <img src="/image/簡易型溫室基礎(1).JPG" v-if="basetype=='簡易型溫室基礎'">
                                <img src="/image/簡易型溫室基礎(2).JPG" v-if="basetype=='簡易型溫室基礎'">
                                <img src="/image/溫室基礎地質分析.JPG" v-if="basetype=='溫室基礎地質分析'">
                                <img src="/image/溫室基礎設計.JPG" v-if="basetype=='溫室基礎設計'">
                                <img src="/image/溫室基礎設計.JPG" v-if="basetype=='溫室基礎設計'">
                                <img src="/image/基礎設計流程圖.JPG" v-if="basetype=='基礎設計流程圖'">
                                <img src="/image/強固基礎(1).JPG" v-if="basetype=='強固基礎'">
                                <img src="/image/強固基礎(2).JPG" v-if="basetype=='強固基礎'">
                                <img src="/image/強固基礎(3).JPG" v-if="basetype=='強固基礎'">
                                <img src="/image/強固基礎(4).JPG" v-if="basetype=='強固基礎'">
                                <img src="/image/地質分析.JPG" v-if="basetype=='地質分析'">
                            </div>
                            <div v-if="knowledgeIdx=='跨距'">
                                <v-radio-group row v-model="housepictype"> 
                                    <v-radio v-for="(type, index) in housepictypelist" :value="type" :label="type" :key="index"></v-radio>
                                </v-radio-group>
                                <img src="/image/簡易溫室跨距設計(1).JPG" v-if="housepictype=='簡易溫室跨距設計'">
                                <img src="/image/簡易溫室跨距設計(2).JPG" v-if="housepictype=='簡易溫室跨距設計'">
                            </div>
                            <div v-if="knowledgeIdx=='肩高'">
                                <v-radio-group row v-model="shorttype"> 
                                    <v-radio v-for="(type, index) in shorttypelist" :value="type" :label="type" :key="index"></v-radio>
                                </v-radio-group>
                                <img src="/image/簡易溫室肩高設計.JPG" v-if="shorttype=='簡易溫室肩高設計'">
                                <img src="/image/簡易溫室肩高設計(2).JPG" v-if="shorttype=='簡易溫室肩高設計'">
                            </div>
                            <div v-if="knowledgeIdx=='長度'">
                                
                            </div>
                            <div v-if="knowledgeIdx=='連續性'">
                                <v-radio-group row v-model="continuoustype"> 
                                    <v-radio v-for="(type, index) in continuoustypelist" :value="type" :label="type" :key="index"></v-radio>
                                </v-radio-group>
                                <img src="/image/溫室型式構造.JPG" v-if="continuoustype=='溫室型式構造'">
                            </div>
                            <div v-if="knowledgeIdx=='披覆材料'">
                                <v-radio-group row v-model="drapetype"> 
                                    <v-radio v-for="(type, index) in drapetypelist" :value="type" :label="type" :key="index"></v-radio>
                                </v-radio-group>
                                <img src="/image/溫室型式構造.JPG" v-if="drapetype=='溫室型式構造'">
                            </div>
                        </b-card-text>
                    </b-card>
                </b-card-group>
                <b-card-group>
                    <b-card header-tag="header" header-text-variant="white" header-bg-variant="info">
                        <template #header>
                            <h6 class="mb-0"><b-icon icon="flower1"></b-icon> 種植植物生長環境需求</h6>
                        </template>
                    
                        <b-card-text>
                            <h5>
                                請選擇欲察看之材料設計：
                                <b-select v-model="materialIdx" style="width:20vmin" >
                                    <option v-for="(mat, index) in material" :value="mat">
                                        {{mat}}
                                    </option>
                                </b-select>
                            </h5>
                            <v-container-fluid v-if="materialIdx == '型管材'">
                                <div class="d-flex justify-content-around">
                                    <v-row>
                                        <v-col md="11">
                                            <div class="p-2 w-100 bd-highlight">
                                                <!-- 管 材 製 程 成 本 分 析 -->

                                                <b-card
                                                    header-tag="header"
                                                    header-text-variant="white"
                                                    header-bg-variant="info"
                                                >
                                                    <template #header>
                                                        <h6 class="mb-0"><b-icon icon="building"></b-icon> 管 材 製 程 成 本 分 析</h6>
                                                    </template>
                                                    <b-card-text>
                                                        <table style="border:1px solid black; font-size: 1.5vmin" border='1'>
                                                            <thead class="table-active">
                                                                <tr align="center">
                                                                    <td style='width:5vmin'> 勾選 </td>
                                                                    <td style='width:23vmin'> 材料<br>名稱 </td>
                                                                    <td style='width:8vmin'> 鋼料 </td>
                                                                    <td style='width:8vmin'> 高強材 </td>
                                                                    <td style='width:8vmin'> 鋼胚 </td>
                                                                    <td style='width:8vmin'> 熱軋<br>鋼板 </td>
                                                                    <td style='width:8vmin'> 冷軋<br>鋼板 </td>
                                                                    <td style='width:8vmin'> 連續<br>熱浸<br>鍍鋅 </td>
                                                                    <td style='width:8vmin'> 連續<br>烤漆 </td>
                                                                    <td style='width:8vmin'> 冷彎<br>成形</td>
                                                                    <td style='width:8vmin'> 銲接</td>
                                                                    <td style='width:8vmin'> 加工 </td>
                                                                    <td style='width:8vmin'> 後熱浸<br>鍍鋅 </td>
                                                                    <td style='width:8vmin'> 鍍鋁鋅 </td>
                                                                    <td style='width:8vmin'> 鍍鎂<br>鋁鋅 </td>
                                                                    <td style='width:8vmin'> 後烤漆 </td>
                                                                    <td style='width:8vmin'> 速度性 </td>
                                                                    <td style='width:8vmin'> 結構<br>風險 </td>
                                                                    <td style='width:8vmin'> 腐蝕性 </td>
                                                                    <td style='width:8vmin'> 重量性 </td>
                                                                    <td style='width:8vmin'> 成本性 </td>
                                                                </tr>
                                                            </thead>
                                                            <tr align="center" v-for="(all, index) in PipeData" :key="index">
                                                                <td>
                                                                    <input type="checkbox" v-model="all.checked" v-on:change="updateSelectPipe(all.id,all.checked)">
                                                                </td>
                                                                <td align="left"> {{all.MaterialName}}</td>
                                                                <td>NT$ {{SteelPrice}}</td>
                                                                <td>{{all.HighStrengthMaterial}}</td>
                                                                <td>{{all.SteelBillet}}</td>
                                                                <td>{{all.HotRolledSteelSheet}}</td>
                                                                <td>{{all.ColdRolledSteelSheet}}</td>
                                                                <td>{{all.ContinuousHotDipGalvanizing}}</td>
                                                                <td>{{all.ContinuousPaint}} </td>
                                                                <td>{{all.ColdForming}}</td>
                                                                <td>{{all.Welding}}</td>
                                                                <td>{{all.Processing}} </td>
                                                                <td>{{all.AfterHotDipGalvanizing}}</td>
                                                                <td>{{all.Galvalume}}</td>
                                                                <td>{{all.MagnesiumAluminumZincPlating}}</td>
                                                                <td>{{all.AfterBaking}}</td>
                                                                <td>{{all.Speed}}</td>
                                                                <td>{{all.StructuralRisk}}</td>
                                                                <td>{{all.Corrosive}}</td>
                                                                <td>{{all.Weight}}</td>
                                                                <td>NT$ {{all.cost}}</td>
                                                            </tr>
                                                        </table>
                                                        <br>

                                                        <!-- 管 材 製 程 比 較 分 析 -->
                                                        <div v-if="checkedPipe.length != 0">
                                                            <h5>管 材 製 程 比 較 分 析</h5>
                                                            <table style="border:1px solid black; font-size: 1.5vmin" border='1'>
                                                                <thead class="table-active">
                                                                    <tr align="center">
                                                                        <td style='width:6.5vmin'> 勾選 </td>
                                                                        <td style='width:23vmin'> 材料<br>名稱 </td>
                                                                        <td style='width:6.5vmin'> 鋼料 </td>
                                                                        <td style='width:6.5vmin'> 高強材 </td>
                                                                        <td style='width:6.5vmin'> 鋼胚 </td>
                                                                        <td style='width:6.5vmin'> 熱軋<br>鋼板 </td>
                                                                        <td style='width:6.5vmin'> 冷軋<br>鋼板 </td>
                                                                        <td style='width:6.5vmin'> 連續<br>熱浸<br>鍍鋅 </td>
                                                                        <td style='width:6.5vmin'> 連續<br>烤漆 </td>
                                                                        <td style='width:6.5vmin'> 冷彎<br>成形</td>
                                                                        <td style='width:6.5vmin'> 銲接</td>
                                                                        <td style='width:6.5vmin'> 加工 </td>
                                                                        <td style='width:6.5vmin'> 後熱浸<br>鍍鋅 </td>
                                                                        <td style='width:6.5vmin'> 鍍鋁鋅 </td>
                                                                        <td style='width:6.5vmin'> 鍍鎂<br>鋁鋅 </td>
                                                                        <td style='width:6.5vmin'> 後烤漆 </td>
                                                                        <td style='width:6.5vmin'> 速度性 </td>
                                                                        <td style='width:6.5vmin'> 結構<br>風險 </td>
                                                                        <td style='width:6.5vmin'> 腐蝕性 </td>
                                                                        <td style='width:6.5vmin'> 重量性 </td>
                                                                        <td style='width:6.5vmin'> 成本性 </td>
                                                                        <td style='width:6.5vmin'> 比較值 </td>
                                                                        <td style='width:6.5vmin'> 排名 </td>
                                                                    </tr>
                                                                </thead>
                                                                <tr align="center" v-for="(select, index) in selectPipe" :key="index">
                                                                    <td>
                                                                        <input type="checkbox" v-model="select.checked" v-on:change="updatesteel(select,select.checked)">
                                                                    </td>
                                                                    <td align="left"> {{select.MaterialName}}</td>
                                                                    <td>NT$ {{SteelPrice}}</td>
                                                                    <td>{{select.HighStrengthMaterial}}</td>
                                                                    <td>{{select.SteelBillet}}</td>
                                                                    <td>{{select.HotRolledSteelSheet}}</td>
                                                                    <td>{{select.ColdRolledSteelSheet}}</td>
                                                                    <td>{{select.ContinuousHotDipGalvanizing}}</td>
                                                                    <td>{{select.ContinuousPaint}} </td>
                                                                    <td>{{select.ColdForming}}</td>
                                                                    <td>{{select.Welding}}</td>
                                                                    <td>{{select.Processing}} </td>
                                                                    <td>{{select.AfterHotDipGalvanizing}}</td>
                                                                    <td>{{select.Galvalume}}</td>
                                                                    <td>{{select.MagnesiumAluminumZincPlating}}</td>
                                                                    <td>{{select.AfterBaking}}</td>
                                                                    <td>{{select.Speed}}</td>
                                                                    <td>{{select.StructuralRisk}}</td>
                                                                    <td>{{select.Corrosive}}</td>
                                                                    <td>{{select.Weight}}</td>
                                                                    <td>NT$ {{select.cost}}</td>
                                                                    <td>{{selectPipeRank[index]}}</td>
                                                                    <td>{{selectPipeRankValue[index]}}</td>
                                                                </tr>
                                                            </table>
                                                            <br>

                                                            <table style="border:1px solid black; font-size: 1.5vmin" border='1'>
                                                                <thead class="table-active">
                                                                    <tr align="center">
                                                                        <td colspan="4"> 請輸入權重比 (分數 1~5 ) </td>
                                                                        <td>
                                                                            <button type="button" class="btn btn-warning" v-on:click="updatePipeCompare" style="font-size:1.5vmin; font-family:Microsoft JhengHei;">計算</button>
                                                                        </td>
                                                                    </tr>
                                                                    <tr align="center">
                                                                        <td> 速度性 </td>
                                                                        <td> 結構風險 </td>
                                                                        <td> 腐蝕性 </td>
                                                                        <td> 重量性 </td>
                                                                        <td> 成本性 </td>
                                                                    </tr>
                                                                </thead>
                                                                <tr align="center">
                                                                    <td>
                                                                        <v-text-field
                                                                            label="請輸入速度性"
                                                                            v-model="PipeSpeed"
                                                                        ></v-text-field>
                                                                    </td>
                                                                    <td>
                                                                        <v-text-field
                                                                            label="請輸入結構風險"
                                                                            v-model="PipeStructuralRisk"
                                                                        ></v-text-field>
                                                                    </td>
                                                                    <td>
                                                                        <v-text-field
                                                                            label="請輸入腐蝕性"
                                                                            v-model="PipeCorrosive"
                                                                        ></v-text-field>
                                                                    </td>
                                                                    <td>
                                                                        <v-text-field
                                                                            label="請輸入重量性"
                                                                            v-model="PipeWeightiness"
                                                                        ></v-text-field>
                                                                    </td>
                                                                    <td>
                                                                        <v-text-field
                                                                            label="請輸入成本性"
                                                                            v-model="PipeCost"
                                                                        ></v-text-field>
                                                                    </td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td>  {{Math.floor(PipeSpeed/(parseFloat(this.PipeSpeed) + parseFloat(this.PipeStructuralRisk) + parseFloat(this.PipeCorrosive) + parseFloat(this.PipeWeightiness) + parseFloat(this.PipeCost))*100)}}% </td>
                                                                    <td>  {{Math.floor(PipeStructuralRisk/(parseFloat(this.PipeSpeed) + parseFloat(this.PipeStructuralRisk) + parseFloat(this.PipeCorrosive) + parseFloat(this.PipeWeightiness) + parseFloat(this.PipeCost))*100)}}% </td>
                                                                    <td>  {{Math.floor(PipeCorrosive/(parseFloat(this.PipeSpeed) + parseFloat(this.PipeStructuralRisk) + parseFloat(this.PipeCorrosive) + parseFloat(this.PipeWeightiness) + parseFloat(this.PipeCost))*100)}}% </td>
                                                                    <td>  {{Math.floor(PipeWeightiness/(parseFloat(this.PipeSpeed) + parseFloat(this.PipeStructuralRisk) + parseFloat(this.PipeCorrosive) + parseFloat(this.PipeWeightiness) + parseFloat(this.PipeCost))*100)}}% </td>
                                                                    <td>  {{Math.floor(PipeCost/(parseFloat(this.PipeSpeed) + parseFloat(this.PipeStructuralRisk) + parseFloat(this.PipeCorrosive) + parseFloat(this.PipeWeightiness) + parseFloat(this.PipeCost))*100)}}% </td>
                                                                </tr>
                                                            </table>
                                                            <br>
    
                                                        </div>
                                                    </b-card-text>
                                                </b-card>

                                                <br>

                                                <!-- 型 材 製 程 成 本 分 析 -->
                                                <b-card header-tag="header"
                                                    header-text-variant="white"
                                                    header-bg-variant="info">
                                                    <template #header>
                                                        <h6 class="mb-0"><b-icon icon="building"></b-icon> 型 材 製 程 成 本 分 析</h6>
                                                    </template>
                                                    <b-card-text>
                                                        <table style="border:1px solid black; font-size: 1.5vmin" border='1'>
                                                            <thead class="table-active">
                                                                <tr align="center">
                                                                    <td style='width:5vmin'> 勾選 </td>
                                                                    <td style='width:23vmin'> 材料<br>名稱 </td>
                                                                    <td style='width:8vmin'> 鋼料 </td>
                                                                    <td style='width:8vmin'> 高強材 </td>
                                                                    <td style='width:8vmin'> 鋼胚 </td>
                                                                    <td style='width:8vmin'> 熱軋<br>鋼板 </td>
                                                                    <td style='width:8vmin'> 冷軋<br>鋼板 </td>
                                                                    <td style='width:8vmin'> 連續<br>熱浸<br>鍍鋅 </td>
                                                                    <td style='width:8vmin'> 連續<br>烤漆 </td>
                                                                    <td style='width:8vmin'> 冷彎<br>成形</td>
                                                                    <td style='width:8vmin'> 銲接</td>
                                                                    <td style='width:8vmin'> 加工 </td>
                                                                    <td style='width:8vmin'> 後熱浸<br>鍍鋅 </td>
                                                                    <td style='width:8vmin'> 鍍鋁鋅 </td>
                                                                    <td style='width:8vmin'> 鍍鎂<br>鋁鋅 </td>
                                                                    <td style='width:8vmin'> 後烤漆 </td>
                                                                    <td style='width:8vmin'> 速度性 </td>
                                                                    <td style='width:8vmin'> 結構<br>風險 </td>
                                                                    <td style='width:8vmin'> 腐蝕性 </td>
                                                                    <td style='width:8vmin'> 重量性 </td>
                                                                    <td style='width:8vmin'> 成本性 </td>
                                                                </tr>
                                                            </thead>
                                                            
                                                            <tr align="center" v-for="(all, index) in ProfileData" :key="index">
                                                                <td>
                                                                    <input type="checkbox" v-model="all.checked" v-on:change="updateSelectProfile(all.id,all.checked)">
                                                                </td>
                                                                <td align="left"> {{all.MaterialName}}</td>
                                                                <td>NT$ {{SteelPrice}}</td>
                                                                <td>{{all.HighStrengthMaterial}}</td>
                                                                <td>{{all.SteelBillet}}</td>
                                                                <td>{{all.HotRolledSteelSheet}}</td>
                                                                <td>{{all.ColdRolledSteelSheet}}</td>
                                                                <td>{{all.ContinuousHotDipGalvanizing}}</td>
                                                                <td>{{all.ContinuousPaint}} </td>
                                                                <td>{{all.ColdForming}}</td>
                                                                <td>{{all.Welding}}</td>
                                                                <td>{{all.Processing}} </td>
                                                                <td>{{all.AfterHotDipGalvanizing}}</td>
                                                                <td>{{all.Galvalume}}</td>
                                                                <td>{{all.MagnesiumAluminumZincPlating}}</td>
                                                                <td>{{all.AfterBaking}}</td>
                                                                <td>{{all.Speed}}</td>
                                                                <td>{{all.StructuralRisk}}</td>
                                                                <td>{{all.Corrosive}}</td>
                                                                <td>{{all.Weight}}</td>
                                                                <td>NT$ {{all.cost}}</td>
                                                            </tr>
                                                        </table>
                                                        <br>

                                                        <!-- 型 材 製 程 比 較 分 析 -->
                                                        <div v-if="checkedProfile.length != 0">
                                                            <h5>型 材 製 程 比 較 分 析</h5>
                                                            <table style="border:1px solid black; font-size: 1.5vmin" border='1'>
                                                                <thead class="table-active">
                                                                    <tr align="center">
                                                                        <td style='width:6.5vmin'> 勾選 </td>
                                                                        <td style='width:23vmin'> 材料<br>名稱 </td>
                                                                        <td style='width:6.5vmin'> 鋼料 </td>
                                                                        <td style='width:6.5vmin'> 高強材 </td>
                                                                        <td style='width:6.5vmin'> 鋼胚 </td>
                                                                        <td style='width:6.5vmin'> 熱軋<br>鋼板 </td>
                                                                        <td style='width:6.5vmin'> 冷軋<br>鋼板 </td>
                                                                        <td style='width:6.5vmin'> 連續<br>熱浸<br>鍍鋅 </td>
                                                                        <td style='width:6.5vmin'> 連續<br>烤漆 </td>
                                                                        <td style='width:6.5vmin'> 冷彎<br>成形</td>
                                                                        <td style='width:6.5vmin'> 銲接</td>
                                                                        <td style='width:6.5vmin'> 加工 </td>
                                                                        <td style='width:6.5vmin'> 後熱浸<br>鍍鋅 </td>
                                                                        <td style='width:6.5vmin'> 鍍鋁鋅 </td>
                                                                        <td style='width:6.5vmin'> 鍍鎂<br>鋁鋅 </td>
                                                                        <td style='width:6.5vmin'> 後烤漆 </td>
                                                                        <td style='width:6.5vmin'> 速度性 </td>
                                                                        <td style='width:6.5vmin'> 結構<br>風險 </td>
                                                                        <td style='width:6.5vmin'> 腐蝕性 </td>
                                                                        <td style='width:6.5vmin'> 重量性 </td>
                                                                        <td style='width:6.5vmin'> 成本性 </td>
                                                                        <td style='width:6.5vmin'> 比較值 </td>
                                                                        <td style='width:6.5vmin'> 排名 </td>
                                                                    </tr>
                                                                </thead>
                                                                <tr align="center" v-for="(select, index) in selectProfile" :key="index">
                                                                    <td>
                                                                        <input type="checkbox" v-model="select.checked" v-on:change="updatesteel(select,select.checked)">
                                                                    </td>
                                                                    <td align="left"> {{select.MaterialName}}</td>
                                                                    <td>NT$ {{SteelPrice}}</td>
                                                                    <td>{{select.HighStrengthMaterial}}</td>
                                                                    <td>{{select.SteelBillet}}</td>
                                                                    <td>{{select.HotRolledSteelSheet}}</td>
                                                                    <td>{{select.ColdRolledSteelSheet}}</td>
                                                                    <td>{{select.ContinuousHotDipGalvanizing}}</td>
                                                                    <td>{{select.ContinuousPaint}} </td>
                                                                    <td>{{select.ColdForming}}</td>
                                                                    <td>{{select.Welding}}</td>
                                                                    <td>{{select.Processing}} </td>
                                                                    <td>{{select.AfterHotDipGalvanizing}}</td>
                                                                    <td>{{select.Galvalume}}</td>
                                                                    <td>{{select.MagnesiumAluminumZincPlating}}</td>
                                                                    <td>{{select.AfterBaking}}</td>
                                                                    <td>{{select.Speed}}</td>
                                                                    <td>{{select.StructuralRisk}}</td>
                                                                    <td>{{select.Corrosive}}</td>
                                                                    <td>{{select.Weight}}</td>
                                                                    <td>NT$ {{select.cost}}</td>
                                                                    <td>{{selectProfileRank[index]}}</td>
                                                                    <td>{{selectProfileRankValue[index]}}</td>
                                                                </tr>
                                                            </table>
                                                            <br>
                                                            <table style="border:1px solid black; font-size: 1.5vmin" border='1'>
                                                                <thead class="table-active">
                                                                    <tr align="center">
                                                                        <td colspan="4"> 請輸入權重比 (分數 1~5 ) </td>
                                                                        <td>
                                                                            <button type="button" class="btn btn-warning" v-on:click="updateProfileCompare" style="font-size:1.5vmin; font-family:Microsoft JhengHei;">計算</button>
                                                                        </td>
                                                                    </tr>
                                                                    <tr align="center">
                                                                        <td> 速度性 </td>
                                                                        <td> 結構風險 </td>
                                                                        <td> 腐蝕性 </td>
                                                                        <td> 重量性 </td>
                                                                        <td> 成本性 </td>
                                                                    </tr>
                                                                </thead>
                                                                <tr align="center">
                                                                    <td>
                                                                        <v-text-field
                                                                            label="請輸入速度性"
                                                                            v-model="ProfileSpeed"
                                                                        ></v-text-field>
                                                                    </td>
                                                                    <td>
                                                                        <v-text-field
                                                                            label="請輸入結構風險"
                                                                            v-model="ProfileStructuralRisk"
                                                                        ></v-text-field>
                                                                    </td>
                                                                    <td>
                                                                        <v-text-field
                                                                            label="請輸入腐蝕性"
                                                                            v-model="ProfileCorrosive"
                                                                        ></v-text-field>
                                                                    </td>
                                                                    <td>
                                                                        <v-text-field
                                                                            label="請輸入重量性"
                                                                            v-model="ProfileWeightiness"
                                                                        ></v-text-field>
                                                                    </td>
                                                                    <td>
                                                                        <v-text-field
                                                                            label="請輸入成本性"
                                                                            v-model="ProfileCost"
                                                                        ></v-text-field>
                                                                    </td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td>  {{Math.floor(ProfileSpeed/(parseFloat(this.ProfileSpeed) + parseFloat(this.ProfileStructuralRisk) + parseFloat(this.ProfileCorrosive) + parseFloat(this.ProfileWeightiness) + parseFloat(this.ProfileCost))*100)}}% </td>
                                                                    <td>  {{Math.floor(ProfileStructuralRisk/(parseFloat(this.ProfileSpeed) + parseFloat(this.ProfileStructuralRisk) + parseFloat(this.ProfileCorrosive) + parseFloat(this.ProfileWeightiness) + parseFloat(this.ProfileCost))*100)}}% </td>
                                                                    <td>  {{Math.floor(ProfileCorrosive/(parseFloat(this.ProfileSpeed) + parseFloat(this.ProfileStructuralRisk) + parseFloat(this.ProfileCorrosive) + parseFloat(this.ProfileWeightiness) + parseFloat(this.ProfileCost))*100)}}% </td>
                                                                    <td>  {{Math.floor(ProfileWeightiness/(parseFloat(this.ProfileSpeed) + parseFloat(this.ProfileStructuralRisk) + parseFloat(this.ProfileCorrosive) + parseFloat(this.ProfileWeightiness) + parseFloat(this.ProfileCost))*100)}}% </td>
                                                                    <td>  {{Math.floor(ProfileCost/(parseFloat(this.ProfileSpeed) + parseFloat(this.ProfileStructuralRisk) + parseFloat(this.ProfileCorrosive) + parseFloat(this.ProfileWeightiness) + parseFloat(this.ProfileCost))*100)}}% </td>
                                                                </tr>
                                                            </table>
                                                            <br>
                                                            
                                                        </div>
                                                    </b-card-text>

                                                </b-card>
                                            </div>
                                        </v-col>
                                    </v-row>
                                </div>
                            </v-container-fluid>
                            <v-container-fluid v-else-if="materialIdx == '披腹膜'"> 
                                <div class="d-flex justify-content-around">
                                    <v-row>
                                        <v-col md="12">
                                            <div class="p-2 w-100 bd-highlight">

                                            <b-card-group>
                                                <b-card
                                                    header-tag="header"
                                                    header-text-variant="white"
                                                    header-bg-variant="info"
                                                >
                                                    <template #header>
                                                        <h6 class="mb-0">
                                                            <b-icon icon="building"></b-icon>
                                                            披 覆 材 料
                                                        </h6>
                                                    </template>
                                                    <b-card-text>
                                                        <table style="border:1px solid black; font-size: 1.5vmin" border='1'>
                                                            <thead class="table-active">
                                                                <tr align="center">
                                                                    <td style='width:5vmin'> 勾選 </td>
                                                                    <td style='width:23vmin'> 材料<br>名稱 </td>
                                                                    <td style='width:8vmin'> 透光<br>損失 </td>
                                                                    <td style='width:8vmin'> 結構<br>風險 </td>
                                                                    <td style='width:8vmin'> 作業<br>難度 </td>
                                                                    <td style='width:8vmin'> 成本性 </td>
                                                                    <td style='width:8vmin'> 副作用 </td>
                                                                </tr>
                                                            </thead>
                                                            <tr align="center" v-for="(all, index) in SimpleCoatingFilmsJSON" :key="index">
                                                                <td><input type="checkbox" v-model="all.checked" v-on:change="updateSelectGlass(all.id,all.checked)"></td>
                                                                <td align="left"> {{all.material}}-{{all.BuildItem}}</td>
                                                                <td>{{all.LightLoss}}</td>
                                                                <td>{{all.StructuralRisk}}</td>
                                                                <td>{{all.JobDifficulty}}</td>
                                                                <td>{{all.Cost}}</td>
                                                                <td>{{all.SideEffect}}</td>
                                                            </tr>
                                                        </table>
                                                        <br>

                                                        <!-- 管 材 製 程 比 較 分 析 -->
                                                        <div v-if="checkedglass.length != 0">
                                                            <h5>披 覆 材 料</h5>
                                                            <table style="border:1px solid black; font-size: 1.5vmin" border='1'>
                                                                <thead class="table-active">
                                                                    <tr align="center">
                                                                        <td style='width:8vmin'> 勾選 </td>
                                                                        <td style='width:23vmin'> 材料<br>名稱 </td>
                                                                        <td style='width:8vmin'> 透光<br>損失 </td>
                                                                        <td style='width:8vmin'> 結構<br>風險 </td>
                                                                        <td style='width:8vmin'> 作業<br>難度 </td>
                                                                        <td style='width:8vmin'> 成本性 </td>
                                                                        <td style='width:8vmin'> 副作用 </td>
                                                                        <td style='width:6.5vmin'> 比較值 </td>
                                                                        <td style='width:6.5vmin'> 排名 </td>
                                                                    </tr>
                                                                </thead>
                                                                <tr align="center" v-for="(all, index) in selectglass" :key="index">
                                                                    <td><input type="checkbox" v-model="all.checked" v-on:change="updatefilm(all,all.checked)"></td>
                                                                    <td align="left">{{all.material}}-{{all.BuildItem}}</td>
                                                                    <td>{{all.LightLoss}}</td>
                                                                    <td>{{all.StructuralRisk}}</td>
                                                                    <td>{{all.JobDifficulty}}</td>
                                                                    <td>{{all.Cost}}</td>
                                                                    <td>{{all.SideEffect}}</td>
                                                                    <td>{{selectPipeRank[index]}}</td>
                                                                    <td>{{selectPipeRankValue[index]}}</td>
                                                                </tr>
                                                            </table>
                                                            <br>

                                                            <table style="border:1px solid black; font-size: 1.5vmin" border='1'>
                                                                <thead class="table-active">
                                                                    <tr align="center">
                                                                        <td colspan="4"> 請輸入權重比 (分數 1~5 ) </td>
                                                                        <td>
                                                                            <button type="button" class="btn btn-warning" v-on:click="updateGlassCompare" style="font-size:1.5vmin; font-family:Microsoft JhengHei;">計算</button>
                                                                        </td>
                                                                    </tr>
                                                                    <tr align="center">
                                                                        <td> 透光損失 </td>
                                                                        <td> 結構風險 </td>
                                                                        <td> 作業難度 </td>
                                                                        <td> 成本性 </td>
                                                                        <td> 副作用 </td>
                                                                    </tr>
                                                                </thead>
                                                                <tr align="center">
                                                                    <td>
                                                                        <v-text-field
                                                                            label="請輸入透光損失"
                                                                            v-model="GlassSpeed"
                                                                        ></v-text-field>
                                                                    </td>
                                                                    <td>
                                                                        <v-text-field
                                                                            label="請輸入結構風險"
                                                                            v-model="GlassStructuralRisk"
                                                                        ></v-text-field>
                                                                    </td>
                                                                    <td>
                                                                        <v-text-field
                                                                            label="請輸入作業難度"
                                                                            v-model="GlassCorrosive"
                                                                        ></v-text-field>
                                                                    </td>
                                                                    <td>
                                                                        <v-text-field
                                                                            label="請輸入成本性"
                                                                            v-model="GlassWeightiness"
                                                                        ></v-text-field>
                                                                    </td>
                                                                    <td>
                                                                        <v-text-field
                                                                            label="請輸入副作用"
                                                                            v-model="GlassCost"
                                                                        ></v-text-field>
                                                                    </td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td>  {{Math.floor(GlassSpeed/(parseFloat(this.GlassSpeed) + parseFloat(this.GlassStructuralRisk) + parseFloat(this.GlassCorrosive) + parseFloat(this.GlassWeightiness) + parseFloat(this.GlassCost))*100)}}% </td>
                                                                    <td>  {{Math.floor(GlassStructuralRisk/(parseFloat(this.GlassSpeed) + parseFloat(this.GlassStructuralRisk) + parseFloat(this.GlassCorrosive) + parseFloat(this.GlassWeightiness) + parseFloat(this.GlassCost))*100)}}% </td>
                                                                    <td>  {{Math.floor(GlassCorrosive/(parseFloat(this.GlassSpeed) + parseFloat(this.GlassStructuralRisk) + parseFloat(this.GlassCorrosive) + parseFloat(this.GlassWeightiness) + parseFloat(this.GlassCost))*100)}}% </td>
                                                                    <td>  {{Math.floor(GlassWeightiness/(parseFloat(this.GlassSpeed) + parseFloat(this.GlassStructuralRisk) + parseFloat(this.GlassCorrosive) + parseFloat(this.GlassWeightiness) + parseFloat(this.GlassCost))*100)}}% </td>
                                                                    <td>  {{Math.floor(GlassCost/(parseFloat(this.GlassSpeed) + parseFloat(this.GlassStructuralRisk) + parseFloat(this.GlassCorrosive) + parseFloat(this.GlassWeightiness) + parseFloat(this.GlassCost))*100)}}% </td>
                                                                </tr>
                                                            </table>
                                                            <br>
                                                            
                                                        </div>
                                                    </b-card-text>
                                                </b-card>
                                            </b-card-group>
                                                <br>
                                            </div>
                                        </v-col>
                                    </v-row>
                                </div>
                            </v-container-fluid>
                        </b-card-text>
                    </b-card>
                </b-card-group>
        </v-container-fluid>
    </div>
</template>

<script>
  import * as SaveOverPlan from '../../services/saveoverplan_service.js';
  import * as Design from '../../services/greenhouse_design.js';
  import * as Steel from '../../services/user_steel.js';
  import * as Film from '../../services/user_film.js';
  export default {
    data: () => ({
        cropIdx: 0,
        plantIdx: 0,
        selectCrop: null,
        vegetablejson:[],
        CropOrder: ["分類","根菜","莖菜","葉菜","花菜","果菜","糧食","水果","花"],
        GrowPlants: ['作物',],
        plantlength: 0,
        plantwidth: 0,
        tabIndex: 0,
        regionalwindspeedjson:[],   // 縣市地區資料
        City:['縣市',],   // 縣市選單的陣列表
        cityIdx: 0, // 所選縣市的id
        selectCity: null, // 所選縣市的名稱
        Region:['地區',], // 地區選單的陣列表
        regionIdx: 0,   // 所選地區的id
        selectRegion: null, // 所選地區的名稱
        SelectTerrain:0, // 選擇地形
        SelectLandform:0, // 選擇地貌
        greenhouseradio: null, //透過radio button選擇要簡易還是強固
        Fluidjson: [],
        checkData:[],
        checkedNames: [],
        
        /* 簡易型溫室 */
        SelectSimple:[['溫室管材'],['圓頂形式'],['圓拱距'],['基礎'],['跨距'],['肩高'],['長度'],['連續性'],['披覆材料']],
        SimpleCostratiosJSON: [],               // 簡易型各建構項目比例
        SimpleCostratios: [],               // 簡易型各建構項目比例
        SimpleCircularArchDistancesJSON: [],    // 簡易型圓拱距
        SimpleCircularArchDistances: [],    // 簡易型圓拱距
        SimpleCoatingFilmsJSON: [],             // 簡易型披覆材料
        SimpleCoatingFilms: [],             // 簡易型披覆材料
        SimpleContinuitysJSON: [],              // 簡易型連續性
        SimpleContinuitys: [],              // 簡易型連續性
        SimpleDomeFormsJSON: [],                // 簡易型圓頂形式
        SimpleDomeForms: [],                // 簡易型圓頂形式
        SimpleFoundationsJSON: [],              // 簡易型基礎
        SimpleFoundations: [],              // 簡易型基礎
        SimpleGreenhousePipesJSON: [],          // 簡易型溫室管材
        SimpleGreenhousePipes: [],          // 簡易型溫室管材
        SimpleLengthsJSON: [],                  // 簡易型長度
        SimpleLengths: [],                  // 簡易型長度
        SimpleShoulderHeightsJSON: [],          // 簡易型肩高
        SimpleShoulderHeights: [],          // 簡易型肩高
        SimpleSpansJSON: [],                    // 簡易型跨距
        SimpleSpans: [],                    // 簡易型跨距
        /* 簡易型溫室 */
        SimpleGreenhouse:[],
        SimpleGreenhouseRatio:[],
        SimpleGreenhousePipe:null,  // 簡易型溫室管材
        SimpleDomeForm:null,  // 簡易型圓頂形式
        SimpleCircularArchDistance:null,  // 簡易型圓拱距
        SimpleFoundation:null,  // 簡易型基礎
        SimpleSpan:null,  // 簡易型跨距
        SimpleShoulderHeight:null,  // 簡易型肩高
        SimpleLength:null,  // 簡易型長度
        SimpleContinuity:null,  // 簡易型連續性
        SimpleCoatingFilm:null,  // 簡易型披覆材料
        SimpleHousrBasePrice:500000, // 簡易型溫室基本價格
        SimpleTotalSimpleCost:0,
        SimpleCostAdd:0,
        SimpleStructuralRiskAdd:0,
        SimpleJobDifficultyAdd:0,
        /* 強固型溫室 */
        SelectRobust:[],
        StrongCostRatiosJSON: [],               // 強固型各建構項目比例
        StrongCostRatios: [],               // 強固型各建構項目比例
        StrongCoatingFilmsJSON: [],             // 強固型披覆材料
        StrongCoatingFilms: [],             // 強固型披覆材料
        StrongContinuitysJSON: [],              // 強固型連續性
        StrongContinuitys: [],              // 強固型連續性
        StrongFoundationsJSON: [],              // 強固型基礎
        StrongFoundations: [],              // 強固型基礎
        StrongGreenhousPprofilesJSON: [],       // 強固型溫室型材
        StrongGreenhousPprofiles: [],       // 強固型溫室型材
        StrongLengthsJSON: [],                  // 強固型長度
        StrongLengths: [],                  // 強固型長度
        StrongRoofFormsJSON: [],                // 強固型屋頂形式
        StrongRoofForms: [],                // 強固型屋頂形式
        StrongShoulderHeightsJSON: [],          // 強固型肩高
        StrongShoulderHeights: [],          // 強固型肩高
        StrongSpansJSON: [],                    // 強固型跨距
        StrongSpans: [],                    // 強固型跨距
        StrongUpperArchDistancesJSON: [],       // 強固型上拱距
        StrongUpperArchDistances: [],       // 強固型上拱距
        /* 強固型溫室 */
        RobustGreenhouse:[],
        RobustGreenhouseRatio:[],
        RobustGreenhouseProfile:null,   // 溫室型材
        RobustRoofForm:null,   // 屋頂形式
        RobustUpperArch:null,   // 上拱距
        RobustFoundation:null,   // 強固型基礎
        RobustSpan:null,   // 強固型跨距
        RobustShoulderHeight:null,   // 強固型肩高
        RobustLength:null,   // 強固型長度
        RobustContinuity:null,   // 強固型連續性
        RobustCoatingFilm:null,   // 強固型披覆材料
        RuggedHousrBasePrice :1500000,  // 強固型溫室基本價格
        RobustTotalCost:0,
        RobustCostAdd:0,
        RobustStructuralRiskAdd:0,
        RobustJobDifficultyAdd:0,
        time: new Date(),
        OverPlanJson: [],
        overplanArray: [],
        showform:true,
        allposition:['方位','東','南','西','北','東南','西南','東北','西北'],
        position:0,
        knowledge:['==溫室設計==','溫室管材&型材','圓頂形式','圓拱距','基礎','跨距','肩高','長度','連續性','披覆材料'],
        material:['==材料設計==','型管材','披腹膜'],
        knowledgeIdx:'==溫室設計==',
        materialIdx:'==材料設計==',
        MaterialCostjson: [],
        LMEjson:[],
        USDjson:[],
        PipeData:[],
        ProfileData:[],
        USD:null,   // 美津
        SteelPrice:null, //鋼料價格
        /* LME 倫敦金屬價格 */
        MetalList:["鋁", "銅", "鋅", "鎳", "鉛", "錫", "鋁合金", "特種鋁合金", "鈷", "金", "銀", "廢鋼", "鋼筋"], // LME金屬排序
        MetalDate:null,
        MetalPrice:[],
        // 管材
        checkedPipe:[],
        selectPipe:[],
        selectPipeRank:[],
        selectPipeRankValue:[],
        selectGlassRank:[],
        selectGlassRankValue:[],
        PipeSpeed:null,
        PipeStructuralRisk:null,
        PipeCorrosive:null,
        PipeWeightiness:null,
        PipeCost:null,
        PipeTotal:null,
        GlassSpeed:null,
        GlassStructuralRisk:null,
        GlassCorrosive:null,
        GlassWeightiness:null,
        GlassCost:null,
        GlassTotal:null,
        // 型材
        checkedProfile:[],
        selectProfile:[],
        selectProfileRank:[],
        selectProfileRankValue:[],
        ProfileSpeed:null,
        ProfileStructuralRisk:null,
        ProfileCorrosive:null,
        ProfileWeightiness:null,
        ProfileCost:null,
        ProfileTotal:null,
        selectglass:[],
        checkedglass:[],
        glass:[],
        SoftFilm:[],
        HardFilm:[],
        decide:['0','0','0','0'],
        housetypelist:['溫室管材','管材規格','溫室型材','型材規格'],
        housetype:null,
        pipetypelist:['強固溫室','簡易溫室','使用年限','溫室屋頂強化結構','強固溫室型式標準圖'],
        pipetype:null,
        rooftypelist:['溫室圓拱距(桁距)設計'],
        rooftype:null,
        housepictypelist:['簡易溫室跨距設計'],
        housepictype:null,
        basetypelist:['簡易型溫室基礎','溫室基礎地質分析','溫室基礎設計','基礎設計流程圖','強固基礎','地質分析'],
        basetype:null,
        shorttypelist:['簡易溫室肩高設計'],
        shorttype:null,
        continuoustypelist:['溫室型式構造'],
        continuoustype:null,
        drapetypelist:['溫室型式構造'],
        drapetype:null,
        area:0,
        overplanArray:[],
        OverPlanJson:[],
        DesignArray:[],
        DesignJson:[],
        filmcheck:[],
        steelcheck:[],
        steelcheck2:[],
        quality:0,
        speed:0,
        risk:0,
        cost:0,
        SteelJson:[],
        steel_name:[],
        FilmJson:[],
        FilmArray:[],
        filmname:[],
        now_user:null,
        now_user_design:null,
        greentype_simple:[],
        greentype_robust:[],
        greeninfo_simple:[],
        greeninfo_robust:[],
    }),
    created:function(){  // 網頁載入時，一開始就載入
        if (this.$auth.check() === false) {
            this.$router.push({ name: '使用者登入' })
        }
        this.getJson();
    },
    methods: {
        async getJson(){

        const J_OverPlan = await fetch('/OverPlanJson',  {
        method: 'GET',
        });
        this.OverPlanJson = await J_OverPlan.json();
            for(var i = 0; i < this.OverPlanJson.length; i++){
                if (this.OverPlanJson[i].uid === this.$auth.user().id){
                    this.overplanArray.push(this.OverPlanJson[i])
                    this.now_user = this.OverPlanJson[i].pid
            }
        }
        this.plantlength = this.overplanArray[0].croplength
        this.plantwidth = this.overplanArray[0].cropwidth
        this.area = this.plantlength*this.plantwidth
        
        const D_OverPlan = await fetch('/DesignJson',  {
            method: 'GET',
            });
        this.DesignJson = await D_OverPlan.json();
        for(var i = 0; i < this.DesignJson.length; i++){
            if (this.DesignJson[i].uid === this.$auth.user().id){
                this.DesignArray.push(this.DesignJson[i])
                this.now_user_design = this.DesignJson[i].id
            } 
        }

        // if (this.DesignArray.length === 0){
        //     let formData = new FormData();
        //     formData.append('pipetype',this.SimpleGreenhousePipe);
        //     const response = await Design.createDesign(formData);
        //     SelectSimple[0].push()
        // }
        

        this.greenhouseradio = this.DesignArray[0].housetype
        if (this.DesignArray[0].housetype == '簡易溫室'){
            this.SimpleGreenhousePipe = this.DesignArray[0].pipetype
            this.SimpleDomeForm = this.DesignArray[0].rooftype
            this.SimpleCircularArchDistance = this.DesignArray[0].circlespan
            this.SimpleFoundation = this.DesignArray[0].base
            this.SimpleSpan = this.DesignArray[0].span
            this.SimpleShoulderHeight = this.DesignArray[0].shoulder
            this.SimpleLength = this.DesignArray[0].length
            this.SimpleContinuity = this.DesignArray[0].continue
            this.SimpleCoatingFilm = this.DesignArray[0].drape
        } else {
            this.RobustGreenhouseProfile = this.DesignArray[0].pipetype
            this.RobustRoofForm = this.DesignArray[0].rooftype
            this.RobustUpperArch = this.DesignArray[0].circlespan
            this.RobustFoundation = this.DesignArray[0].base
            this.RobustSpan = this.DesignArray[0].span
            this.RobustShoulderHeight = this.DesignArray[0].shoulder
            this.RobustLength = this.DesignArray[0].length
            this.RobustContinuity = this.DesignArray[0].continue
            this.RobustCoatingFilm = this.DesignArray[0].drape
        }

        // 簡易型各建構項目比例
        const SimpleCostratios = await fetch('/SimpleCostRatioJSON',  {
            method: 'GET',
        });
        this.SimpleCostratiosJSON = await SimpleCostratios.json();
        for(var i = 0 ; i < this.SimpleCostratiosJSON.length ; i++){
            if(this.SimpleCostratiosJSON[i].Expert == "System"){
                this.SimpleCostratios.push(this.SimpleCostratiosJSON[i]);
            }
        }
        // 簡易型圓拱距
        const SimpleCircularArchDistances = await fetch('/SimpleCircularArchDistanceJSON',  {
            method: 'GET',
        });
        this.SimpleCircularArchDistancesJSON = await SimpleCircularArchDistances.json();
        for(var i = 0 ; i < this.SimpleCircularArchDistancesJSON.length ; i++){

                if (this.SimpleCircularArchDistancesJSON[i].BuildItem === this.DesignArray[0].circlespan){
                    this.SelectSimple[2].push(this.SimpleCircularArchDistancesJSON[i])
                }

            
            if(this.SimpleCircularArchDistancesJSON[i].Expert == "System"){
                this.SimpleCircularArchDistances.push(this.SimpleCircularArchDistancesJSON[i]);
            }
        }
        // 簡易型披覆材料
        const SimpleCoatingFilms = await fetch('/SimpleCoatingFilmJSON',  {
            method: 'GET',
        });
        this.SimpleCoatingFilmsJSON = await SimpleCoatingFilms.json();
        for(var i = 0 ; i < this.SimpleCoatingFilmsJSON.length ; i++){
            if (this.SimpleCoatingFilmsJSON[i].BuildItem === this.DesignArray[0].drape){
                this.SelectSimple[8].push(this.SimpleCoatingFilmsJSON[i])
                this.SelectRobust.push(['披覆材料',this.SimpleCoatingFilmsJSON[i]])
            }
            if(this.SimpleCoatingFilmsJSON[i].Expert == "System"){
                this.SimpleCoatingFilms.push(this.SimpleCoatingFilmsJSON[i]);
            }
            if(this.SimpleCoatingFilmsJSON[i].material){
                this.glass.push(this.SimpleCoatingFilmsJSON[i]);
            }
        }
        // 簡易型連續性
        const SimpleContinuitys = await fetch('/SimpleContinuityJSON',  {
            method: 'GET',
        });
        this.SimpleContinuitysJSON = await SimpleContinuitys.json();
        for(var i = 0 ; i < this.SimpleContinuitysJSON.length ; i++){
            if (this.SimpleContinuitysJSON[i].BuildItem === this.DesignArray[0].continue){
                this.SelectSimple[7].push(this.SimpleContinuitysJSON[i])
            }
            if(this.SimpleContinuitysJSON[i].Expert == "System"){
                this.SimpleContinuitys.push(this.SimpleContinuitysJSON[i]);
            }
        }
        // 簡易型圓頂形式
        const SimpleDomeForms = await fetch('/SimpleDomeFormJSON',  {
            method: 'GET',
        });
        this.SimpleDomeFormsJSON = await SimpleDomeForms.json();
        for(var i = 0 ; i < this.SimpleDomeFormsJSON.length ; i++){
            if (this.SimpleDomeFormsJSON[i].BuildItem === this.DesignArray[0].rooftype){
                this.SelectSimple[1].push(this.SimpleDomeFormsJSON[i])
            }
            if(this.SimpleDomeFormsJSON[i].Expert == "System"){
                this.SimpleDomeForms.push(this.SimpleDomeFormsJSON[i]);
            }
        }
        // 簡易型基礎
        const SimpleFoundations = await fetch('/SimpleFoundationJSON',  {
            method: 'GET',
        });
        this.SimpleFoundationsJSON = await SimpleFoundations.json();
        for(var i = 0 ; i < this.SimpleFoundationsJSON.length ; i++){
            if (this.SimpleFoundationsJSON[i].BuildItem === this.DesignArray[0].base){
                this.SelectSimple[3].push(this.SimpleFoundationsJSON[i])
            }
            if(this.SimpleFoundationsJSON[i].Expert == "System"){
                this.SimpleFoundations.push(this.SimpleFoundationsJSON[i]);
            }
        }
        // 簡易型溫室管材
        const SimpleGreenhousePipes = await fetch('/SimpleGreenhousePipeJSON',  {
            method: 'GET',
        });
        this.SimpleGreenhousePipesJSON = await SimpleGreenhousePipes.json();
        for(var i = 0 ; i < this.SimpleGreenhousePipesJSON.length ; i++){
            if (this.SimpleGreenhousePipesJSON[i].BuildItem === this.DesignArray[0].pipetype){
                this.SelectSimple[0].push(this.SimpleGreenhousePipesJSON[i])
            }
            if(this.SimpleGreenhousePipesJSON[i].Expert == "System"){
                this.SimpleGreenhousePipes.push(this.SimpleGreenhousePipesJSON[i]);
            }
        }
        // 簡易型長度
        const SimpleLengths = await fetch('/SimpleLengthJSON',  {
            method: 'GET',
        });
        this.SimpleLengthsJSON = await SimpleLengths.json();
        for(var i = 0 ; i < this.SimpleLengthsJSON.length ; i++){
            if (this.SimpleLengthsJSON[i].BuildItem === this.DesignArray[0].length){
                this.SelectSimple[6].push(this.SimpleLengthsJSON[i])
            }
            if(this.SimpleLengthsJSON[i].Expert == "System"){
                this.SimpleLengths.push(this.SimpleLengthsJSON[i]);
            }
        }
        // 簡易型肩高
        const SimpleShoulderHeights = await fetch('/SimpleShoulderHeightJSON',  {
            method: 'GET',
        });
        this.SimpleShoulderHeightsJSON = await SimpleShoulderHeights.json();
        for(var i = 0 ; i < this.SimpleShoulderHeightsJSON.length ; i++){
            if (this.SimpleShoulderHeightsJSON[i].BuildItem === this.DesignArray[0].shoulder){
                this.SelectSimple[5].push(this.SimpleShoulderHeightsJSON[i])
            }
            if(this.SimpleShoulderHeightsJSON[i].Expert == "System"){
                this.SimpleShoulderHeights.push(this.SimpleShoulderHeightsJSON[i]);
            }
        }
        // 簡易型跨距
        const SimpleSpans = await fetch('/SimpleSpanJSON',  {
            method: 'GET',
        });
        this.SimpleSpansJSON = await SimpleSpans.json();
        for(var i = 0 ; i < this.SimpleSpansJSON.length ; i++){
            if (this.SimpleSpansJSON[i].BuildItem === this.DesignArray[0].span){
                this.SelectSimple[4].push(this.SimpleSpansJSON[i])
            }
            if(this.SimpleSpansJSON[i].Expert == "System"){
                this.SimpleSpans.push(this.SimpleSpansJSON[i]);
            }
        }
        if(this.SelectSimple.length == 9 ){
            this.SimpleTotalSimpleCost = 0,
            this.SimpleCostAdd = 0,
            this.SimpleStructuralRiskAdd = 0,
            this.SimpleJobDifficultyAdd = 0;
            for (var i = 0; i < this.SelectSimple.length; i++) {
                this.SimpleTotalSimpleCost += this.SimpleHousrBasePrice * this.SelectSimple[i][1].Cost * this.SimpleCostratios[i].Cost / 100;
                this.SimpleCostAdd += this.SelectSimple[i][1].Cost * this.SimpleCostratios[i].Cost / 100;
                this.SimpleStructuralRiskAdd += this.SelectSimple[i][1].StructuralRisk * (this.SimpleCostratios[i].StructuralRisk / 100);
                this.SimpleJobDifficultyAdd += this.SelectSimple[i][1].JobDifficulty * (this.SimpleCostratios[i].JobDifficulty/ 100);
            }
            this.SimpleTotalSimpleCost =  parseInt(this.SimpleTotalSimpleCost);
            this.SimpleCostAdd =  this.SimpleCostAdd.toFixed(2);
            this.SimpleStructuralRiskAdd =  this.SimpleStructuralRiskAdd.toFixed(2);
            this.SimpleJobDifficultyAdd =  this.SimpleJobDifficultyAdd.toFixed(2);
        }
        // 強固型各建構項目比例
        const StrongCostRatios = await fetch('/StrongCostRatioJSON',  {
            method: 'GET',
        });
        this.StrongCostRatiosJSON = await StrongCostRatios.json();
        for(var i = 0 ; i < this.StrongCostRatiosJSON.length ; i++){
            if(this.StrongCostRatiosJSON[i].Expert == "System"){
                this.StrongCostRatios.push(this.StrongCostRatiosJSON[i]);
            }
        }
        // 強固型連續性
        const StrongContinuitys = await fetch('/StrongContinuityJSON',  {
            method: 'GET',
        });
        this.StrongContinuitysJSON = await StrongContinuitys.json();
        for(var i = 0 ; i < this.StrongContinuitysJSON.length ; i++){
            if (this.StrongContinuitysJSON[i].BuildItem === this.DesignArray[0].continue){
                this.SelectRobust.push(['連續性',this.StrongContinuitysJSON[i]])
            }
            if(this.StrongContinuitysJSON[i].Expert == "System"){
                this.StrongContinuitys.push(this.StrongContinuitysJSON[i]);
            }
        }
        // 強固型基礎
        const StrongFoundations = await fetch('/StrongFoundationJSON',  {
            method: 'GET',
        });
        this.StrongFoundationsJSON = await StrongFoundations.json();
        for(var i = 0 ; i < this.StrongFoundationsJSON.length ; i++){
            if (this.StrongFoundationsJSON[i].BuildItem === this.DesignArray[0].base){
                this.SelectRobust.push(['基礎',this.StrongFoundationsJSON[i]])
            }
            if(this.StrongFoundationsJSON[i].Expert == "System"){
                this.StrongFoundations.push(this.StrongFoundationsJSON[i]);
            }
        }
        // 強固型溫室型材
        const StrongGreenhousPprofiles = await fetch('/StrongGreenhouseProfileJSON',  {
            method: 'GET',
        });
        this.StrongGreenhousPprofilesJSON = await StrongGreenhousPprofiles.json();
        for(var i = 0 ; i < this.StrongGreenhousPprofilesJSON.length ; i++){
            if (this.StrongGreenhousPprofilesJSON[i].BuildItem === this.DesignArray[0].pipetype){
                this.SelectRobust.push(['溫室型材',this.StrongGreenhousPprofilesJSON[i]])
            }
            if(this.StrongGreenhousPprofilesJSON[i].Expert == "System"){
                this.StrongGreenhousPprofiles.push(this.StrongGreenhousPprofilesJSON[i]);
            }
        }
        // 強固型長度
        const StrongLengths = await fetch('/StrongLengthJSON',  {
            method: 'GET',
        });
        this.StrongLengthsJSON = await StrongLengths.json();
        for(var i = 0 ; i < this.StrongLengthsJSON.length ; i++){
            if (this.StrongLengthsJSON[i].BuildItem === this.DesignArray[0].length){
                this.SelectRobust.push(['長度',this.StrongLengthsJSON[i]])
            }
            if(this.StrongLengthsJSON[i].Expert == "System"){
                this.StrongLengths.push(this.StrongLengthsJSON[i]);
            }
        }
        // 強固型屋頂形式
        const StrongRoofForms = await fetch('/StrongRoofFormJSON',  {
            method: 'GET',
        });
        this.StrongRoofFormsJSON = await StrongRoofForms.json();
        for(var i = 0 ; i < this.StrongRoofFormsJSON.length ; i++){
            if (this.StrongRoofFormsJSON[i].BuildItem === this.DesignArray[0].rooftype){
                this.SelectRobust.push(['屋頂形式',this.StrongRoofFormsJSON[i]])
            }
            if(this.StrongRoofFormsJSON[i].Expert == "System"){
                this.StrongRoofForms.push(this.StrongRoofFormsJSON[i]);
            }
        }
        // 強固型肩高
        const StrongShoulderHeights = await fetch('/StrongShoulderHeightJSON',  {
            method: 'GET',
        });
        this.StrongShoulderHeightsJSON = await StrongShoulderHeights.json();
        for(var i = 0 ; i < this.StrongShoulderHeightsJSON.length ; i++){
            if (this.StrongShoulderHeightsJSON[i].BuildItem === this.DesignArray[0].shoulder){
                this.SelectRobust.push(['肩高',this.StrongShoulderHeightsJSON[i]])
            }
            if(this.StrongShoulderHeightsJSON[i].Expert == "System"){
                this.StrongShoulderHeights.push(this.StrongShoulderHeightsJSON[i]);
            }
        }
        // 強固型跨距
        const StrongSpans = await fetch('/StrongSpanJSON',  {
            method: 'GET',
        });
        this.StrongSpansJSON = await StrongSpans.json();
        for(var i = 0 ; i < this.StrongSpansJSON.length ; i++){
            if (this.StrongSpansJSON[i].BuildItem === this.DesignArray[0].span){
                this.SelectRobust.push(['跨距',this.StrongSpansJSON[i]])
            }
            if(this.StrongSpansJSON[i].Expert == "System"){
                this.StrongSpans.push(this.StrongSpansJSON[i]);
            }
        }
        // 強固型上拱距
        const StrongUpperArchDistances = await fetch('/StrongUpperArchDistanceJSON',  {
            method: 'GET',
        });
        this.StrongUpperArchDistancesJSON = await StrongUpperArchDistances.json();
        for(var i = 0 ; i < this.StrongUpperArchDistancesJSON.length ; i++){
            if (this.StrongUpperArchDistancesJSON[i].BuildItem === this.DesignArray[0].circlespan){
                this.SelectRobust.push(['上拱距',this.StrongUpperArchDistancesJSON[i]])
            }
            if(this.StrongUpperArchDistancesJSON[i].Expert == "System"){
                this.StrongUpperArchDistances.push(this.StrongUpperArchDistancesJSON[i]);
            }
        }
        if(this.SelectRobust.length === 9 ){
            this.RobustTotalCost = 0,
            this.RobustCostAdd = 0,
            this.RobustStructuralRiskAdd = 0,
            this.RobustJobDifficultyAdd = 0;
            for (var i = 0; i < this.SelectRobust.length; i++) {
                this.RobustTotalCost += this.RuggedHousrBasePrice * this.SelectRobust[i][1].Cost * this.StrongCostRatios[i].Cost / 100;
                this.RobustCostAdd += this.SelectRobust[i][1].Cost * this.StrongCostRatios[i].Cost / 100;
                this.RobustStructuralRiskAdd += this.SelectRobust[i][1].StructuralRisk * this.StrongCostRatios[i].StructuralRisk / 100;
                this.RobustJobDifficultyAdd += this.SelectRobust[i][1].JobDifficulty * this.StrongCostRatios[i].JobDifficulty/ 100;
            }
            this.RobustTotalCost =  parseInt(this.RobustTotalCost);
            this.RobustCostAdd =  this.RobustCostAdd.toFixed(2);
            this.RobustStructuralRiskAdd =  this.RobustStructuralRiskAdd.toFixed(2);
            this.RobustJobDifficultyAdd =  this.RobustJobDifficultyAdd.toFixed(2);
        }
    
        const LMEMetalPrice = await fetch('/LMEMetalPriceJSON',  {
            method: 'GET',
        });
        this.LMEjson = await LMEMetalPrice.json();
        this.MetalDate = this.LMEjson[0][2];
        // 將LME倫敦金屬價格，照MetalList的順序排列
        for (var i = 0; i < this.MetalList.length; i++) {
            for (var j = 0; j < this.LMEjson.length; j++) {
                if (this.MetalList[i] == this.LMEjson[j][0]) {
                    this.MetalPrice.push(this.LMEjson[j]);
                }
            }
        }
        // 溫室構造成本
        const MaterialCostJSON = await fetch('/MaterialCostJSON',  {
            method: 'GET',
        });
        this.MaterialCostjson = await MaterialCostJSON.json();
        // 美金價格
        const USDJSON = await fetch('/USDPriceJSON',  {
            method: 'GET',
        });
        this.USDjson = await USDJSON.json();
        this.USD = this.USDjson[0].USD; // 抓取美金價格
        this.SteelPrice = Math.round(this.LMEjson[0][1]/this.USD)+1; //計算鋼料價格
        const F_OverPlan = await fetch('/UserFilmJson',  {
            method: 'GET',
        });
        this.FilmJson = await F_OverPlan.json();
        for(var i = 0; i < this.FilmJson.length; i++){
            if (this.FilmJson[i].uid === this.$auth.user().id){
                this.filmname.push(this.FilmJson[i].BuildItem)
                this.FilmJson[i].checked = true
                this.FilmArray.push(this.FilmJson[i])
                this.checkedglass.push(this.FilmJson[i].id)
                this.selectglass.push(this.FilmJson[i])
            }
        }
        for (var i = 0; i < this.SimpleCoatingFilmsJSON.length; i++){
            for (var j = 0; j < this.FilmJson.length; j++){
                if (this.filmname.indexOf(this.SimpleCoatingFilmsJSON[i].BuildItem) === -1){
                    this.SimpleCoatingFilmsJSON[i].checked = false 
                } else{
                    this.SimpleCoatingFilmsJSON[i].checked = true
                }
            }
        }
        const S_OverPlan = await fetch('/UserSteelJson',  {
                method: 'GET',
            });
            
        this.SteelJson = await S_OverPlan.json();
        for(var i = 0; i < this.SteelJson.length; i++){
            if (this.SteelJson[i].uid === this.$auth.user().id){
                this.SteelJson[i].cost = 100
                this.SteelJson[i].checked = true
                for (var j = 0; j < this.MaterialCostjson.length; j++) {
                    if (this.MaterialCostjson[j].MaterialName == this.SteelJson[i].MaterialName){
                        if (this.MaterialCostjson[j].Type === '管材'){
                            this.checkedPipe.push(this.MaterialCostjson[j].id)
                            this.selectPipe.push(this.SteelJson[i])
                            this.steel_name.push(this.SteelJson[i].MaterialName)
                        }else{
                            this.checkedProfile.push(this.MaterialCostjson[j].id)
                            this.selectProfile.push(this.SteelJson[i])
                            this.steel_name.push(this.SteelJson[i].MaterialName)
                        }
                    }
                }
            }
        }
        for (var i = 0; i < this.MaterialCostjson.length; i++) {
            var data=[];
            var dataCalculator=[];
            var Cost = this.SteelPrice;
            // dataCalculator 做 成本的計算
            dataCalculator.push(this.MaterialCostjson[i].HighStrengthMaterial);
            dataCalculator.push(this.MaterialCostjson[i].SteelBillet);
            dataCalculator.push(this.MaterialCostjson[i].HotRolledSteelSheet);
            dataCalculator.push(this.MaterialCostjson[i].ColdRolledSteelSheet);
            dataCalculator.push(this.MaterialCostjson[i].ContinuousHotDipGalvanizing);
            dataCalculator.push(this.MaterialCostjson[i].ContinuousPaint);
            dataCalculator.push(this.MaterialCostjson[i].ColdForming);
            dataCalculator.push(this.MaterialCostjson[i].Welding);
            dataCalculator.push(this.MaterialCostjson[i].Processing);
            dataCalculator.push(this.MaterialCostjson[i].AfterHotDipGalvanizing);
            dataCalculator.push(this.MaterialCostjson[i].Galvalume);
            dataCalculator.push(this.MaterialCostjson[i].MagnesiumAluminumZincPlating);
            dataCalculator.push(this.MaterialCostjson[i].AfterBaking);
            for(var j = 0; j < dataCalculator.length; j++) {
                // 確認是否有經過那道製程，有那道製程才能加入成本的計算
                if(dataCalculator[j] != " " && dataCalculator[j] !=""){
                    Cost = Cost + parseFloat(dataCalculator[j]);
                }
            }
            if(this.MaterialCostjson[i].Type == "管材"){
                this.MaterialCostjson[i].cost = Cost
                if (this.steel_name.indexOf(this.MaterialCostjson[i].MaterialName) != -1){
                    this.MaterialCostjson[i].checked = true
                } else {
                    this.MaterialCostjson[i].checked = false
                }
                
                this.PipeData.push(this.MaterialCostjson[i]);
            }else if(this.MaterialCostjson[i].Type == "型材"){
                this.MaterialCostjson[i].cost = Cost
                if (this.steel_name.indexOf(this.MaterialCostjson[i].MaterialName) != -1){
                    this.MaterialCostjson[i].checked = true
                } else {
                    this.MaterialCostjson[i].checked = false
                }
                this.ProfileData.push(this.MaterialCostjson[i]);
            }
            
        }
        for (var i = 0; i < this.SimpleCoatingFilmsJSON.length; i++) {
            if(this.SimpleCoatingFilmsJSON[i].material){
                this.glass.push(this.SimpleCoatingFilmsJSON[i]);
            }
        }
    },
    
    
    updateSimpleRadio: async function(greentype,simple){  // 更新簡易型溫室選擇狀況，判斷是否有選滿9項
        let SelectSimple_name = [];
        if (this.greentype_simple.indexOf(greentype) === -1){
            this.greentype_simple.push(greentype)
            this.greeninfo_simple.push(simple)
        } else{
            this.greeninfo_simple.splice(this.greentype_simple.indexOf(greentype),1,simple)
        }
        for (var i = 0; i < this.SelectSimple.length; i++){
            SelectSimple_name.push(this.SelectSimple[i][0])
        }
        for (var i = 0; i < this.greentype_simple.length; i++){
            if(this.greentype_simple[i] === '溫室管材'){
                if (SelectSimple_name.indexOf('溫室管材') === -1){
                    this.SelectSimple.push(['溫室管材',this.greeninfo_simple[i]])
                } else{
                    this.SelectSimple[SelectSimple_name.indexOf('溫室管材')].splice(1,1,this.greeninfo_simple[i]) 
                }
                let formData = new FormData();
                formData.append('pipetype',this.SimpleGreenhousePipe);
                formData.append('_method','put');
                const response = await Design.UpdateDesign(this.now_user_design, formData);
            }
            if(this.greentype_simple[i] === '圓頂形式'){
                if (SelectSimple_name.indexOf('圓頂形式') === -1){
                    this.SelectSimple.push(['圓頂形式',this.greeninfo_simple[i]])
                } else{
                    this.SelectSimple[SelectSimple_name.indexOf('圓頂形式')].splice(1,1,this.greeninfo_simple[i]) 
                }
                let formData = new FormData();
                formData.append('rooftype',this.SimpleDomeForm);
                formData.append('_method','put');
                const response = await Design.UpdateDesign(this.now_user_design, formData);
            }
            if(this.greentype_simple[i] === '圓拱距'){
                if (SelectSimple_name.indexOf('圓拱距') === -1){
                    this.SelectSimple.push(['圓拱距',this.greeninfo_simple[i]])
                } else{
                    this.SelectSimple[SelectSimple_name.indexOf('圓拱距')].splice(1,1,this.greeninfo_simple[i]) 
                }
                let formData = new FormData();
                formData.append('circlespan',this.SimpleCircularArchDistance);
                formData.append('_method','put');
                const response = await Design.UpdateDesign(this.now_user_design, formData);
            }
            if(this.greentype_simple[i] === '基礎'){
                if (SelectSimple_name.indexOf('基礎') === -1){
                    this.SelectSimple.push(['基礎',this.greeninfo_simple[i]])
                } else{
                    this.SelectSimple[SelectSimple_name.indexOf('基礎')].splice(1,1,this.greeninfo_simple[i]) 
                }
                let formData = new FormData();
                formData.append('base',this.SimpleFoundation);
                formData.append('_method','put');
                const response = await Design.UpdateDesign(this.now_user_design, formData);
            }
            if(this.greentype_simple[i] === '跨距'){
                if (SelectSimple_name.indexOf('跨距') === -1){
                    this.SelectSimple.push(['跨距',this.greeninfo_simple[i]])
                } else{
                    this.SelectSimple[SelectSimple_name.indexOf('跨距')].splice(1,1,this.greeninfo_simple[i]) 
                }
                let formData = new FormData();
                formData.append('span',this.SimpleSpan);
                formData.append('_method','put');
                const response = await Design.UpdateDesign(this.now_user_design, formData);
            }
            if(this.greentype_simple[i] === '肩高'){
                if (SelectSimple_name.indexOf('肩高') === -1){
                    this.SelectSimple.push(['肩高',this.greeninfo_simple[i]])
                } else{
                    this.SelectSimple[SelectSimple_name.indexOf('肩高')].splice(1,1,this.greeninfo_simple[i]) 
                }
                let formData = new FormData();
                formData.append('shoulder',this.SimpleShoulderHeight);
                formData.append('_method','put');
                const response = await Design.UpdateDesign(this.now_user_design, formData);
            }
            if(this.greentype_simple[i] === '長度'){
                if (SelectSimple_name.indexOf('長度') === -1){
                    this.SelectSimple.push(['長度',this.greeninfo_simple[i]])
                } else{
                    this.SelectSimple[SelectSimple_name.indexOf('長度')].splice(1,1,this.greeninfo_simple[i]) 
                }
                let formData = new FormData();
                formData.append('length',this.SimpleLength);
                formData.append('_method','put');
                const response = await Design.UpdateDesign(this.now_user_design, formData);
            }
            if(this.greentype_simple[i] === '連續性'){
                if (SelectSimple_name.indexOf('連續性') === -1){
                    this.SelectSimple.push(['連續性',this.greeninfo_simple[i]])
                } else{
                    this.SelectSimple[SelectSimple_name.indexOf('連續性')].splice(1,1,this.greeninfo_simple[i]) 
                }
                let formData = new FormData();
                formData.append('continue',this.SimpleContinuity);
                formData.append('_method','put');
                const response = await Design.UpdateDesign(this.now_user_design, formData);
            }
            if(this.greentype_simple[i] === '披覆材料'){
                if (SelectSimple_name.indexOf('披覆材料') === -1){
                    this.SelectSimple.push(['披覆材料',this.greeninfo_simple[i]])
                } else{
                    this.SelectSimple[SelectSimple_name.indexOf('披覆材料')].splice(1,1,this.greeninfo_simple[i]) 
                }
                let formData = new FormData();
                formData.append('drape',this.SimpleCoatingFilm);
                formData.append('_method','put');
                const response = await Design.UpdateDesign(this.now_user_design, formData);
            }
        }
        if(this.SelectSimple.length === 9 ){
            this.SimpleTotalSimpleCost = 0,
            this.SimpleCostAdd = 0,
            this.SimpleStructuralRiskAdd = 0,
            this.SimpleJobDifficultyAdd = 0;
            for (var i = 0; i < this.SelectSimple.length; i++) {
                this.SimpleTotalSimpleCost += this.SimpleHousrBasePrice * this.SelectSimple[i][1].Cost * this.SimpleCostratios[i].Cost / 100;
                this.SimpleCostAdd += this.SelectSimple[i][1].Cost * this.SimpleCostratios[i].Cost / 100;
                this.SimpleStructuralRiskAdd += this.SelectSimple[i][1].StructuralRisk * this.SimpleCostratios[i].StructuralRisk / 100;
                this.SimpleJobDifficultyAdd += this.SelectSimple[i][1].JobDifficulty * this.SimpleCostratios[i].JobDifficulty/ 100;
            }
            this.SimpleTotalSimpleCost =  parseInt(this.SimpleTotalSimpleCost);
            this.SimpleCostAdd =  this.SimpleCostAdd.toFixed(2);
            this.SimpleStructuralRiskAdd =  this.SimpleStructuralRiskAdd.toFixed(2);
            this.SimpleJobDifficultyAdd =  this.SimpleJobDifficultyAdd.toFixed(2);
        }
    },
    updateRobustRadio: async function(greentype,robust){  // 更新強固型溫室選擇狀況，判斷是否有選滿9項
        let SelectRobust_name = [];
        if (this.greentype_robust.indexOf(greentype) === -1){
            this.greentype_robust.push(greentype)
            this.greeninfo_robust.push(robust)
        } else{
            this.greeninfo_robust.splice(this.greentype_robust.indexOf(greentype),1,robust)
        }
        for (var i = 0; i < this.SelectRobust.length; i++){
            SelectRobust_name.push(this.SelectRobust[i][0])
        }
        for (var i = 0; i < this.greentype_robust.length; i++){
            var temp = [];
            if(this.greentype_robust[i] === '溫室型材'){
                if (SelectRobust_name.indexOf('溫室型材') === -1){
                    this.SelectRobust.push(['溫室型材',this.greeninfo_robust[i]])
                } else{
                    this.SelectRobust[SelectRobust_name.indexOf('溫室型材')].splice(1,1,this.greeninfo_robust[i]) 
                }
                let formData = new FormData();
                formData.append('pipetype',this.RobustGreenhouseProfile);
                formData.append('_method','put');
                const response = await Design.UpdateDesign(this.now_user_design, formData);
            }
            if(this.greentype_robust[i] === '屋頂形式'){
                if (SelectRobust_name.indexOf('屋頂形式') === -1){
                    this.SelectRobust.push(['屋頂形式',this.greeninfo_robust[i]])
                } else{
                    this.SelectRobust[SelectRobust_name.indexOf('屋頂形式')].splice(1,1,this.greeninfo_robust[i]) 
                }
                let formData = new FormData();
                formData.append('rooftype',this.RobustRoofForm);
                formData.append('_method','put');
                const response = await Design.UpdateDesign(this.now_user_design, formData);
            }
            if(this.greentype_robust[i] === '上拱距'){
                if (SelectRobust_name.indexOf('上拱距') === -1){
                    this.SelectRobust.push(['上拱距',this.greeninfo_robust[i]])
                } else{
                    this.SelectRobust[SelectRobust_name.indexOf('上拱距')].splice(1,1,this.greeninfo_robust[i]) 
                }
                let formData = new FormData();
                formData.append('circlespan',this.RobustUpperArch);
                formData.append('_method','put');
                const response = await Design.UpdateDesign(this.now_user_design, formData);
            }
            if(this.greentype_robust[i] === '基礎'){
                if (SelectRobust_name.indexOf('基礎') === -1){
                    this.SelectRobust.push(['基礎',this.greeninfo_robust[i]])
                } else{
                    this.SelectRobust[SelectRobust_name.indexOf('基礎')].splice(1,1,this.greeninfo_robust[i]) 
                }
                let formData = new FormData();
                formData.append('base',this.RobustFoundation);
                formData.append('_method','put');
                const response = await Design.UpdateDesign(this.now_user_design, formData);
            }
            if(this.greentype_robust[i] === '跨距'){
                if (SelectRobust_name.indexOf('跨距') === -1){
                    this.SelectRobust.push(['跨距',this.greeninfo_robust[i]])
                } else{
                    this.SelectRobust[SelectRobust_name.indexOf('跨距')].splice(1,1,this.greeninfo_robust[i]) 
                }
                let formData = new FormData();
                formData.append('span',this.RobustSpan);
                formData.append('_method','put');
                const response = await Design.UpdateDesign(this.now_user_design, formData);
            }
            if(this.greentype_robust[i] === '肩高'){
                if (SelectRobust_name.indexOf('肩高') === -1){
                    this.SelectRobust.push(['肩高',this.greeninfo_robust[i]])
                } else{
                    this.SelectRobust[SelectRobust_name.indexOf('肩高')].splice(1,1,this.greeninfo_robust[i]) 
                }
                let formData = new FormData();
                formData.append('shoulder',this.RobustShoulderHeight);
                formData.append('_method','put');
                const response = await Design.UpdateDesign(this.now_user_design, formData);
            }
            if(this.greentype_robust[i] === '長度'){
                if (SelectRobust_name.indexOf('長度') === -1){
                    this.SelectRobust.push(['長度',this.greeninfo_robust[i]])
                } else{
                    this.SelectRobust[SelectRobust_name.indexOf('長度')].splice(1,1,this.greeninfo_robust[i]) 
                }
                let formData = new FormData();
                formData.append('length',this.RobustLength);
                formData.append('_method','put');
                const response = await Design.UpdateDesign(this.now_user_design, formData);
            }
            if(this.greentype_robust[i] === '連續性'){
                if (SelectRobust_name.indexOf('連續性') === -1){
                    this.SelectRobust.push(['連續性',this.greeninfo_robust[i]])
                } else{
                    this.SelectRobust[SelectRobust_name.indexOf('連續性')].splice(1,1,this.greeninfo_robust[i]) 
                }
                let formData = new FormData();
                formData.append('continue',this.RobustContinuity);
                formData.append('_method','put');
                const response = await Design.UpdateDesign(this.now_user_design, formData);
            }
            if(this.greentype_robust[i] === '披覆材料'){
                if (SelectRobust_name.indexOf('披覆材料') === -1){
                    this.SelectRobust.push(['披覆材料',this.greeninfo_robust[i]])
                } else{
                    this.SelectRobust[SelectRobust_name.indexOf('披覆材料')].splice(1,1,this.greeninfo_robust[i]) 
                }
                let formData = new FormData();
                formData.append('drape',this.RobustCoatingFilm);
                formData.append('_method','put');
                const response = await Design.UpdateDesign(this.now_user_design, formData);
            }
        }
        if(this.SelectRobust.length === 9 ){
            this.RobustTotalCost = 0,
            this.RobustCostAdd = 0,
            this.RobustStructuralRiskAdd = 0,
            this.RobustJobDifficultyAdd = 0;
            for (var i = 0; i < this.SelectRobust.length; i++) {
                this.RobustTotalCost += this.RuggedHousrBasePrice * this.SelectRobust[i][1].Cost * this.StrongCostRatios[i].Cost / 100;
                this.RobustCostAdd += this.SelectRobust[i][1].Cost * this.StrongCostRatios[i].Cost / 100;
                this.RobustStructuralRiskAdd += this.SelectRobust[i][1].StructuralRisk * this.StrongCostRatios[i].StructuralRisk / 100;
                this.RobustJobDifficultyAdd += this.SelectRobust[i][1].JobDifficulty * this.StrongCostRatios[i].JobDifficulty/ 100;
            }
            this.RobustTotalCost =  parseInt(this.RobustTotalCost);
            this.RobustCostAdd =  this.RobustCostAdd.toFixed(2);
            this.RobustStructuralRiskAdd =  this.RobustStructuralRiskAdd.toFixed(2);
            this.RobustJobDifficultyAdd =  this.RobustJobDifficultyAdd.toFixed(2);
        }
    },
    updateRoofType: async function(){
        let formData = new FormData();
        formData.append('housetype',this.greenhouseradio);
        formData.append('_method','put');
        const response = await Design.UpdateDesign(this.now_user_design, formData);
    },
    updateSelectPipe:async function(checkid,checktype){   // 更新所選擇的管材
        let pipename = null;
        if (checktype === true){
            this.checkedPipe.push(checkid)
            for (var i = 0; i < this.PipeData.length; i++) {
                if(checkid === this.PipeData[i].id){
                    this.PipeData[i].checked = false
                    this.selectPipe.push(this.PipeData[i]);
                } 
            }
        } else{
            this.checkedPipe.splice(this.checkedPipe.indexOf(checkid),1)
            for (var i = 0; i < this.PipeData.length; i++){
                if (this.PipeData[i].id === checkid){
                    pipename = this.PipeData[i].MaterialName
                }
            }
            for(var j = 0; j < this.selectPipe.length; j++){
                if (this.selectPipe[j].MaterialName === pipename && this.selectPipe[j].uid === this.$auth.user().id){
                    await Steel.deleteSteel(this.selectPipe[j].id);
                    this.selectPipe.splice(j,1)
                }
            }
        }
    },
    updateSelectGlass: async function(checkid,checktype){   // 更新所選擇的管材
        let glassname = null;
        if (checktype === true){
            this.checkedglass.push(checkid)
            for (var i = 0; i < this.SimpleCoatingFilmsJSON.length; i++) {
                if(checkid === this.SimpleCoatingFilmsJSON[i].id){
                    this.SimpleCoatingFilmsJSON[i].checked = false
                    this.selectglass.push(this.SimpleCoatingFilmsJSON[i]);
                } 
            }
        } else{
            this.checkedglass.splice(this.checkedglass.indexOf(checkid),1)
            for (var i = 0; i < this.SimpleCoatingFilmsJSON.length; i++){
                if (this.SimpleCoatingFilmsJSON[i].id === checkid){
                    glassname = this.SimpleCoatingFilmsJSON[i].BuildItem
                }
            }
            for(var j = 0; j < this.selectglass.length; j++){
                if (this.selectglass[j].BuildItem === glassname && this.selectglass[j].uid === this.$auth.user().id){
                    await Film.deleteFilm(this.selectglass[j].id);
                    this.selectglass.splice(j,1)
                }
            }
        }
    },
    updatePipeCompare(){  // 更新所選管材的參數比較
        this.PipeTotal = parseFloat(this.PipeSpeed) + parseFloat(this.PipeStructuralRisk) + parseFloat(this.PipeCorrosive) + parseFloat(this.PipeWeightiness) + parseFloat(this.PipeCost);
        var Compare = 0,selectComparelist = [],rank = [];
        // 計算 比較值
        for (var i = 0; i < this.selectPipe.length; i++) {
            Compare = (this.selectPipe[i].Speed * Math.floor(parseFloat(this.PipeSpeed) / this.PipeTotal * 100) / 100) + (this.selectPipe[i].StructuralRisk * Math.floor(parseFloat(this.PipeStructuralRisk) / this.PipeTotal * 100) / 100) + ( this.selectPipe[i].Corrosive * Math.floor(parseFloat(this.PipeCorrosive) / this.PipeTotal * 100) / 100) + ( this.selectPipe[i].Weight * Math.floor(parseFloat(this.PipeWeightiness) / this.PipeTotal * 100) / 100) + ( this.selectPipe[i].cost * Math.floor(parseFloat(this.PipeCost) / this.PipeTotal * 100) / 100);
            Compare = Compare.toFixed(2);
            rank = [];
            rank.push(this.selectPipe[i].id);
            rank.push(Compare);
            rank.push(0);
            selectComparelist.push(rank);
        }
        /* 將所勾選的 管材進行氣泡排序 */
        var temp;
        for (var i = selectComparelist.length - 1; i > 0; i--) {
            for (var j = 0; j <= i - 1; j++) {
                if (selectComparelist[j][1] > selectComparelist[j + 1][1]) {
                    temp = selectComparelist[j];
                    selectComparelist[j] = selectComparelist[j + 1];
                    selectComparelist[j + 1] = temp;
                }
            }
        }
        /* 將所勾選的 管材進行排名 */
        for (var i = 0; i < selectComparelist.length; i++) {
            var a=i;
            selectComparelist[i][2] = ++a;
        }
        /* 將所勾選的 管材進行id序號的氣泡排序，才能使顯示是照順序的 */
        for (var i = selectComparelist.length - 1; i > 0; i--) {
            for (var j = 0; j <= i - 1; j++) {
                if (selectComparelist[j][0] > selectComparelist[j + 1][0]) {
                    temp = selectComparelist[j];
                    selectComparelist[j] = selectComparelist[j + 1];
                    selectComparelist[j + 1] = temp;
                }
            }
        }
        this.selectPipeRank = [],  // 排名
        this.selectPipeRankValue = []; // 排名值
        /* 將所勾選的 管材 比較值與排名 顯示 */
        for (var i = 0; i < selectComparelist.length; i++) {
            this.selectPipeRankValue.push(selectComparelist[i][2]);
            this.selectPipeRank.push(selectComparelist[i][1]);
        }
    },updateGlassCompare(){  // 更新所選管材的參數比較
        this.GlassTotal = parseFloat(this.GlassSpeed) + parseFloat(this.GlassStructuralRisk) + parseFloat(this.GlassCorrosive) + parseFloat(this.GlassWeightiness) + parseFloat(this.GlassCost);
        var Compare = 0,selectComparelist = [],rank = [];
        // 計算 比較值
        for (var i = 0; i < this.selectglass.length; i++) {
            Compare = (this.selectglass[i].LightLoss * Math.floor(parseFloat(this.GlassSpeed) / this.GlassTotal * 100) / 100) + (this.selectglass[i].StructuralRisk * Math.floor(parseFloat(this.GlassStructuralRisk) / this.GlassTotal * 100) / 100) + ( this.selectglass[i].JobDifficulty * Math.floor(parseFloat(this.GlassCorrosive) / this.GlassTotal * 100) / 100) + ( this.selectglass[i].Cost * Math.floor(parseFloat(this.GlassWeightiness) / this.GlassTotal * 100) / 100) + ( this.selectglass[i].SideEffect * Math.floor(parseFloat(this.GlassCost) / this.GlassTotal * 100) / 100);
            Compare = Compare.toFixed(2);
            rank = [];
            rank.push(this.selectglass[i].id);
            rank.push(Compare);
            rank.push(0);
            selectComparelist.push(rank);
        }
        /* 將所勾選的 管材進行氣泡排序 */
        var temp;
        for (var i = selectComparelist.length - 1; i > 0; i--) {
            for (var j = 0; j <= i - 1; j++) {
                if (selectComparelist[j][1] > selectComparelist[j + 1][1]) {
                    temp = selectComparelist[j];
                    selectComparelist[j] = selectComparelist[j + 1];
                    selectComparelist[j + 1] = temp;
                }
            }
        }
        /* 將所勾選的 管材進行排名 */
        for (var i = 0; i < selectComparelist.length; i++) {
            var a=i;
            selectComparelist[i][2] = ++a;
        }
        /* 將所勾選的 管材進行id序號的氣泡排序，才能使顯示是照順序的 */
        for (var i = selectComparelist.length - 1; i > 0; i--) {
            for (var j = 0; j <= i - 1; j++) {
                if (selectComparelist[j][0] > selectComparelist[j + 1][0]) {
                    temp = selectComparelist[j];
                    selectComparelist[j] = selectComparelist[j + 1];
                    selectComparelist[j + 1] = temp;
                }
            }
        }
        this.selectPipeRank = [],  // 排名
        this.selectPipeRankValue = []; // 排名值
        /* 將所勾選的 管材 比較值與排名 顯示 */
        for (var i = 0; i < selectComparelist.length; i++) {
            this.selectGlassRankValue.push(selectComparelist[i][2]);
            this.selectGlassRank.push(selectComparelist[i][1]);
        }
    },updateSelectProfile:async function(checkid,checktype){    // 更新所選擇的型材
            let pipename = null;
            if (checktype === true){
                this.checkedProfile.push(checkid)
                for (var i = 0; i < this.ProfileData.length; i++) {
                    if(checkid === this.ProfileData[i].id){
                        this.ProfileData[i].checked = false
                        this.selectProfile.push(this.ProfileData[i]);
                    } 
                }
            } else{
                this.checkedProfile.splice(this.checkedProfile.indexOf(checkid),1)
                for (var i = 0; i < this.ProfileData.length; i++){
                    if (this.ProfileData[i].id === checkid){
                        pipename = this.ProfileData[i].MaterialName
                    }
                }
                for(var j = 0; j < this.selectProfile.length; j++){
                    if (this.selectProfile[j].MaterialName === pipename && this.selectProfile[j].uid === this.$auth.user().id){
                        await Steel.deleteSteel(this.selectProfile[j].id);
                        this.selectProfile.splice(j,1)
                    }
                }
            }
    },
    updateProfileCompare(){   // 更新所選型材的參數比較
        this.ProfileTotal = parseFloat(this.ProfileSpeed) + parseFloat(this.ProfileStructuralRisk) + parseFloat(this.ProfileCorrosive) + parseFloat(this.ProfileWeightiness) + parseFloat(this.ProfileCost);
        var Compare = 0,selectComparelist = [],rank = [];
        // 計算 比較值
        for (var i = 0; i < this.selectProfile.length; i++) {
            Compare = (this.selectProfile[i].Speed * Math.floor(parseFloat(this.ProfileSpeed) / this.ProfileTotal * 100) / 100) + (this.selectProfile[i].StructuralRisk * Math.floor(parseFloat(this.ProfileStructuralRisk) / this.ProfileTotal * 100) / 100) + ( this.selectProfile[i].Corrosive * Math.floor(parseFloat(this.ProfileCorrosive) / this.ProfileTotal * 100) / 100) + ( this.selectProfile[i].Weight * Math.floor(parseFloat(this.ProfileWeightiness) / this.ProfileTotal * 100) / 100) + ( this.selectProfile[i].cost * Math.floor(parseFloat(this.ProfileCost) / this.ProfileTotal * 100) / 100);
            Compare = Compare.toFixed(2);
            rank = [];
            rank.push(this.selectProfile[i].id);
            rank.push(Compare);
            rank.push(0);
            selectComparelist.push(rank);
        }
        /* 將所勾選的 型材進行氣泡排序 */
        var temp;
        for (var i = selectComparelist.length - 1; i > 0; i--) {
            for (var j = 0; j <= i - 1; j++) {
                if (selectComparelist[j][1] > selectComparelist[j + 1][1]) {
                    temp = selectComparelist[j];
                    selectComparelist[j] = selectComparelist[j + 1];
                    selectComparelist[j + 1] = temp;
                }
            }
        }
        /* 將所勾選的 型材進行排名 */
        for (var i = 0; i < selectComparelist.length; i++) {
            var a=i;
            selectComparelist[i][2] = ++a;
        }
        /* 將所勾選的 型材進行id序號的氣泡排序，才能使顯示是照順序的 */
        for (var i = selectComparelist.length - 1; i > 0; i--) {
            for (var j = 0; j <= i - 1; j++) {
                if (selectComparelist[j][0] > selectComparelist[j + 1][0]) {
                    temp = selectComparelist[j];
                    selectComparelist[j] = selectComparelist[j + 1];
                    selectComparelist[j + 1] = temp;
                }
            }
        }
        this.selectProfileRank = [],  // 排名
        this.selectProfileRankValue = []; // 排名值
        /* 將所勾選的 型材 比較值與排名 顯示 */
        for (var i = 0; i < selectComparelist.length; i++) {
            this.selectProfileRankValue.push(selectComparelist[i][2]);
            this.selectProfileRank.push(selectComparelist[i][1]);
        }
    },
    countdecide(){
        this.decide = []
        this.decide.push(String(Math.floor(this.quality/(parseInt(this.quality)+parseInt(this.risk)+parseInt(this.cost)+parseInt(this.speed))*100)+'%'))
        this.decide.push(String(Math.floor(this.risk/(parseInt(this.quality)+parseInt(this.risk)+parseInt(this.cost)+parseInt(this.speed))*100)+'%'))
        this.decide.push(String(Math.floor(this.speed/(parseInt(this.quality)+parseInt(this.risk)+parseInt(this.cost)+parseInt(this.speed))*100)+'%'))
        this.decide.push(String(Math.floor(this.cost/(parseInt(this.quality)+parseInt(this.risk)+parseInt(this.cost)+parseInt(this.speed))*100)+'%'))
    },
    areacount:async function(){
        this.area = this.plantlength*this.plantwidth
        let formData = new FormData();
        formData.append('croplength',this.plantlength);
        formData.append('cropwidth',this.plantwidth);
        formData.append('croparea',this.area);
        formData.append('_method','put');
        const response = await SaveOverPlan.UpdateOverPlan(this.now_user, formData);
    },
    updatesteel:async function (data,check){
        let steelname = [];
        if (check === true){
            const S_OverPlan = await fetch('/UserSteelJson',  {
                method: 'GET',
            });
            this.SteelJson = await S_OverPlan.json();
            for (var i = 0; i < this.SteelJson.length; i++){
                if (this.SteelJson[i].uid === this.$auth.user().id){
                    steelname.push(this.SteelJson[i].MaterialName)
                }
            }
            if (steelname.indexOf(data.MaterialName) === -1){
                let formData = new FormData();
                formData.append('uid',this.$auth.user().id);
                formData.append('Type',data.Type);
                formData.append('Price',this.SteelPrice);
                formData.append('MaterialName',data.MaterialName);
                formData.append('HighStrengthMaterial',data.HighStrengthMaterial);
                formData.append('SteelBillet',data.SteelBillet);
                formData.append('HotRolledSteelSheet',data.HotRolledSteelSheet);
                formData.append('ColdRolledSteelSheet',data.ColdRolledSteelSheet);
                formData.append('ContinuousHotDipGalvanizing',data.ContinuousHotDipGalvanizing);
                formData.append('ContinuousPaint',data.ContinuousPaint);
                formData.append('ColdForming',data.ColdForming);
                formData.append('Welding',data.Welding);
                formData.append('Processing',data.Processing);
                formData.append('AfterHotDipGalvanizing',data.AfterHotDipGalvanizing);
                formData.append('Galvalume',data.Galvalume);
                formData.append('MagnesiumAluminumZincPlating',data.MagnesiumAluminumZincPlating);
                formData.append('AfterBaking',data.AfterBaking);
                formData.append('Speed',data.Speed);
                formData.append('StructuralRisk',data.StructuralRisk);
                formData.append('Corrosive',data.Corrosive);
                formData.append('Weight',data.Weight);
                const response = await Steel.createSteel(formData);
            }
        } else {
            const S_OverPlan = await fetch('/UserSteelJson',  {
                method: 'GET',
            });
            this.SteelJson = await S_OverPlan.json();
            for (var i = 0; i < this.SteelJson.length; i++){
                if (this.SteelJson[i].MaterialName === data.MaterialName && this.SteelJson[i].uid === this.$auth.user().id){
                    await Steel.deleteSteel(this.SteelJson[i].id);
                }
            }
        }
    },
    updatefilm:async function (data,check){
        let filmname = [];
        if (check === true){
            const F_OverPlan = await fetch('/UserFilmJson',  {
            method: 'GET',
            });
            this.FilmJson = await F_OverPlan.json();
            for (var i = 0; i < this.FilmJson.length; i++){
                if (this.FilmJson[i].uid === this.$auth.user().id){
                    filmname.push(this.FilmJson[i].BuildItem)
                }
            }
            if (filmname.indexOf(data.BuildItem) === -1){
                let formData = new FormData();
                formData.append('uid',this.$auth.user().id);
                formData.append('Expert',data.Expert);
                formData.append('material',data.material);
                formData.append('BuildItem',data.BuildItem);
                formData.append('LightLoss',data.LightLoss);
                formData.append('StructuralRisk',data.StructuralRisk);
                formData.append('JobDifficulty',data.JobDifficulty);
                formData.append('Cost',data.Cost);
                formData.append('SideEffect',data.SideEffect);
                const response = await Film.createFilm(formData);
            }
        } else {
            const F_OverPlan = await fetch('/UserFilmJson',  {
            method: 'GET',
            });
            this.FilmJson = await F_OverPlan.json();
            for (var i = 0; i < this.FilmJson.length; i++){
                if (this.FilmJson[i].BuildItem === data.BuildItem && this.FilmJson[i].uid === this.$auth.user().id){
                    await Film.deleteFilm(this.FilmJson[i].id);
                }
            }
        }
    },
},
}
</script>
© 2021 GitHub, Inc.
Terms
Privacy
Security
Status
Docs
Contact GitHub
Pricing
API
Training
Blog
About
Loading complete