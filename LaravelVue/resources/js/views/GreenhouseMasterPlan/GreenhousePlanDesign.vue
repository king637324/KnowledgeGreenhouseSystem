<template>

    <div>
        <br>
        <h3 id="總體規劃X">
            溫室總體規劃系統
        </h3>
        <hr>

        <v-container-fluid v-if="showform==true">
            <v-row>
                <v-col class="col-md-8 offset-md-2">
                    <v-form v-on:submit.prevent="recordallinfo">
                      <v-container>
                        <v-row>
                            <v-col md="2">
                                <v-subheader>A.決策權重</v-subheader>
                            </v-col>
                            <v-col md="2">
                                <v-text-field :counter="10" label="輸入品質性能" v-model="quality"></v-text-field>
                            </v-col>
                            <v-col md="2">
                                <v-text-field :counter="10" label="輸入風險性" v-model="risk"></v-text-field>
                            </v-col>
                            <v-col md="2">
                                <v-text-field :counter="10" label="輸入速度性" v-model="speed"></v-text-field>
                            </v-col>
                            <v-col md="2">
                                <v-text-field :counter="10" label="輸入成本性" v-model="cost"></v-text-field>
                            </v-col>
                        </v-row>    
                        <v-row>
                          <v-col md="2">
                            <v-subheader>B.光控設計</v-subheader>
                          </v-col>
                          <v-col md="10">
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
                                          <input type="radio" :value="simple" v-model="SimpleGreenhousePipe" v-on:change="updateSimpleRadio">
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
                                          <input type="radio" :value="simple" v-model="SimpleDomeForm" v-on:change="updateSimpleRadio">
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
                                          <input type="radio" :value="simple" v-model="SimpleCircularArchDistance" v-on:change="updateSimpleRadio">
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
                                          <input type="radio" :value="simple" v-model="SimpleFoundation" v-on:change="updateSimpleRadio">
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
                                          <input type="radio" :value="simple" v-model="SimpleSpan" v-on:change="updateSimpleRadio">
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
                                          <input type="radio" :value="simple" v-model="SimpleShoulderHeight" v-on:change="updateSimpleRadio">
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
                                          <input type="radio" :value="simple" v-model="SimpleLength" v-on:change="updateSimpleRadio">
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
                                          <input type="radio" :value="simple" v-model="SimpleContinuity" v-on:change="updateSimpleRadio">
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
                                          <input type="radio" :value="simple" v-model="SimpleCoatingFilm" v-on:change="updateSimpleRadio">
                                          <label>{{simple.BuildItem}}</label>
                                      </div>
                                      <a href="/#/GreenhouseMasterPlan/CostAnalysis/GreenhouseMaterialCostAnalysis"><b-icon class="d-inline-flex" style="float:right;" icon="receipt"></b-icon></a>
                                      <a href="/#/MaterialsAndDesignKnowledgeBase/Article"><b-icon class="d-inline-flex" style="float:right;" icon="patch-question-fill"></b-icon></a>
                                  </td>
                              </tr>
                            </table>
                          </v-col>
                        </v-row>
                        <v-row>
                          <v-col md="2">
                            <v-subheader>C.溫控設計</v-subheader>
                          </v-col>
                          <v-col md="10">
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
                                          <input type="radio" :value="robust" v-model="RobustGreenhouseProfile" v-on:change="updateRobustRadio">
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
                                          <input type="radio" :value="robust" v-model="RobustRoofForm" v-on:change="updateRobustRadio">
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
                                          <input type="radio" :value="robust" v-model="RobustUpperArch" v-on:change="updateRobustRadio">
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
                                          <input type="radio" :value="robust" v-model="RobustFoundation" v-on:change="updateRobustRadio">
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
                                          <input type="radio" :value="robust" v-model="RobustSpan" v-on:change="updateRobustRadio">
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
                                          <input type="radio" :value="robust" v-model="RobustShoulderHeight" v-on:change="updateRobustRadio">
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
                                          <input type="radio" :value="robust" v-model="RobustLength" v-on:change="updateRobustRadio">
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
                                          <input type="radio" :value="robust" v-model="RobustContinuity" v-on:change="updateRobustRadio">
                                          <label>{{robust.BuildItem}}</label>
                                      </div>
                                      <a href="/#/GreenhouseMasterPlan/CostAnalysis/GreenhouseMaterialCostAnalysis"><b-icon class="d-inline-flex" style="float:right;" icon="receipt"></b-icon></a>
                                      <a href="/#/MaterialsAndDesignKnowledgeBase/Article"><b-icon class="d-inline-flex" style="float:right;" icon="patch-question-fill"></b-icon></a>
                                  </td>
                              </tr>
                              <tr align="center" id="披覆材料">
                                  <td>披覆材料</td>

                                  <td align="left">
                                      <div class="d-inline-flex p-2 bd-highlight" v-for="(robust, index) in StrongCoatingFilms" :key="index">
                                          <input type="radio" :value="robust" v-model="RobustCoatingFilm" v-on:change="updateRobustRadio">
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
                          <v-col md="2">
                            <v-subheader>D.溫室選擇</v-subheader>
                          </v-col>
                          <v-col md="4">
                            <v-radio-group row v-model="greenhouseradio">
                              <v-radio label="簡易溫室" id="簡易溫室" value="簡易溫室"></v-radio>
                              <v-radio label="強固溫室" id="強固溫室" value="強固溫室"></v-radio>
                            </v-radio-group>
                          </v-col>
                        </v-row>
                        
                        <v-row>
                          <v-col md="2">
                            <v-subheader>E.溫室設計</v-subheader>
                          </v-col>
                          <v-col md="10" v-if="greenhouseradio == '簡易溫室'">
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
                                          <input type="radio" :value="simple" v-model="SimpleGreenhousePipe" v-on:change="updateSimpleRadio">
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
                                          <input type="radio" :value="simple" v-model="SimpleDomeForm" v-on:change="updateSimpleRadio">
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
                                          <input type="radio" :value="simple" v-model="SimpleCircularArchDistance" v-on:change="updateSimpleRadio">
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
                                          <input type="radio" :value="simple" v-model="SimpleFoundation" v-on:change="updateSimpleRadio">
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
                                          <input type="radio" :value="simple" v-model="SimpleSpan" v-on:change="updateSimpleRadio">
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
                                          <input type="radio" :value="simple" v-model="SimpleShoulderHeight" v-on:change="updateSimpleRadio">
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
                                          <input type="radio" :value="simple" v-model="SimpleLength" v-on:change="updateSimpleRadio">
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
                                          <input type="radio" :value="simple" v-model="SimpleContinuity" v-on:change="updateSimpleRadio">
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
                                          <input type="radio" :value="simple" v-model="SimpleCoatingFilm" v-on:change="updateSimpleRadio">
                                          <label>{{simple.BuildItem}}</label>
                                      </div>
                                      <a href="/#/GreenhouseMasterPlan/CostAnalysis/GreenhouseMaterialCostAnalysis"><b-icon class="d-inline-flex" style="float:right;" icon="receipt"></b-icon></a>
                                      <a href="/#/MaterialsAndDesignKnowledgeBase/Article"><b-icon class="d-inline-flex" style="float:right;" icon="patch-question-fill"></b-icon></a>
                                  </td>
                              </tr>
                            </table>
                          </v-col>
                          <v-col md="10" v-else-if="greenhouseradio == '強固溫室'">
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
                                          <input type="radio" :value="robust" v-model="RobustGreenhouseProfile" v-on:change="updateRobustRadio">
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
                                          <input type="radio" :value="robust" v-model="RobustRoofForm" v-on:change="updateRobustRadio">
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
                                          <input type="radio" :value="robust" v-model="RobustUpperArch" v-on:change="updateRobustRadio">
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
                                          <input type="radio" :value="robust" v-model="RobustFoundation" v-on:change="updateRobustRadio">
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
                                          <input type="radio" :value="robust" v-model="RobustSpan" v-on:change="updateRobustRadio">
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
                                          <input type="radio" :value="robust" v-model="RobustShoulderHeight" v-on:change="updateRobustRadio">
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
                                          <input type="radio" :value="robust" v-model="RobustLength" v-on:change="updateRobustRadio">
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
                                          <input type="radio" :value="robust" v-model="RobustContinuity" v-on:change="updateRobustRadio">
                                          <label>{{robust.BuildItem}}</label>
                                      </div>
                                      <a href="/#/GreenhouseMasterPlan/CostAnalysis/GreenhouseMaterialCostAnalysis"><b-icon class="d-inline-flex" style="float:right;" icon="receipt"></b-icon></a>
                                      <a href="/#/MaterialsAndDesignKnowledgeBase/Article"><b-icon class="d-inline-flex" style="float:right;" icon="patch-question-fill"></b-icon></a>
                                  </td>
                              </tr>
                              <tr align="center" id="披覆材料">
                                  <td>披覆材料</td>

                                  <td align="left">
                                      <div class="d-inline-flex p-2 bd-highlight" v-for="(robust, index) in StrongCoatingFilms" :key="index">
                                          <input type="radio" :value="robust" v-model="RobustCoatingFilm" v-on:change="updateRobustRadio">
                                          <label>{{robust.BuildItem}}</label>
                                      </div>

                                      <a href="/#/GreenhouseMasterPlan/CostAnalysis/GreenhouseMaterialCostAnalysis"><b-icon class="d-inline-flex" style="float:right;" icon="receipt"></b-icon></a>
                                      <a href="/#/MaterialsAndDesignKnowledgeBase/Article"><b-icon class="d-inline-flex" style="float:right;" icon="patch-question-fill"></b-icon></a>
                                  </td>
                              </tr>
                            </table>
                          </v-col>
                        </v-row>                    
                      </v-container>
                      <button type="submit" class="btn btn-primary" style="float:right;">新增</button>
                      <button type="reset" class="btn btn-primary" style="float:right;">清除</button>
                    </v-form>
                    <br><br><br><br><br><br>
                </v-col>

                <v-btn fab dark style="position:fixed; bottom: 0; right: 0; z-index: 9999;" v-on:click="showform=false">
                  <b-icon icon="arrow-right"></b-icon>

                </v-btn>
            </v-row>
        </v-container-fluid>
        <v-container-fluid v-else-if="showform==false">
            <v-row>
                <v-col>
                    <b-card-group>
                        <!-- 種植植物生長環境需求 -->
                        <b-card header-tag="header" header-text-variant="white" header-bg-variant="info">
                            <template #header>
                                <h6 class="mb-0"><b-icon icon="flower1"></b-icon> 已儲存之規劃結果</h6>
                            </template>
                            <b-card-text>
                                <b-card-group>
                                    <v-container-fluid>
                                        <v-row>
                                            <v-col v-for="(OverPlan, index) in overplanArray" :key="index">
                                                <b-card header-tag="header" header-text-variant="white" header-bg-variant="info">
                                                    <template #header>
                                                        <h6 class="mb-0">
                                                            <b-icon icon="flower1"></b-icon> 
                                                            {{ time.getFullYear() }}/{{ time.getMonth()+1 }}/{{ time.getDate() }}-{{ OverPlan.plant }}-{{ index+1 }}

                                                            <button type="button" style="float:right; width:20px; height:20px;" v-on:click="deleterecord(OverPlan.pid)"><b-icon icon="X"></b-icon></button>
                                                        </h6>
                                                    </template>
                                                    <b-card-text>
                                                        <span>A.溫室作物：{{ OverPlan.plantclass }}-{{ OverPlan.plant }}</span><br>
                                                        <span>B.栽種面積：{{ OverPlan.croplength }}*{{ OverPlan.cropwidth }}</span><br>
                                                        <span>C.地點選擇：{{ OverPlan.localcity }}-{{ OverPlan.localarea }}</span><br>
                                                        <span>D.地型選擇：{{ OverPlan.terrain }}-{{ OverPlan.landform }}</span><br>
                                                        <span>E.溫室選擇：{{ OverPlan.greenhouse }}</span><br>
                                                        <span v-if="OverPlan.greenhouse == '簡易溫室'">
                                                            溫室設計：<br>F.溫室管材-{{ OverPlan.greenhousepipe }}<br>G.圓頂形式-{{ OverPlan.domeforms }}<br>
                                                                    H.圓拱距-{{ OverPlan.circulararchdistances }}<br>I.簡易基礎-{{ OverPlan.foundations }}<br>
                                                                    J.簡易跨距-{{ OverPlan.spans }}<br>K.簡易肩高-{{ OverPlan.shoulderheights }}<br>
                                                                    L.簡易長度-{{ OverPlan.lengths }}<br>M.簡易連續性-{{ OverPlan.continuitys }}<br>
                                                                    N.簡易披覆材料-{{ OverPlan.coatingfilms }}<br>
                                                        </span><br>
                                                        <span v-if="OverPlan.greenhouse == '強固溫室'">
                                                            溫室設計：<br>F.溫室型材-{{ OverPlan.greenhousepipe }}<br>G.屋頂形式-{{ OverPlan.domeforms }}<br>
                                                                    H.上拱距-{{ OverPlan.circulararchdistances }}<br>I.基礎-{{ OverPlan.foundations }}<br>
                                                                    J.跨距-{{ OverPlan.spans }}<br>K.肩高-{{ OverPlan.shoulderheights }}<br>
                                                                    L.長度-{{ OverPlan.lengths }}<br>M.連續性-{{ OverPlan.continuitys }}<br>
                                                                    N.披覆材料-{{ OverPlan.coatingfilms }}<br>
                                                        </span>
                                                    </b-card-text>
                                                </b-card>
                                            </v-col>
                                        </v-row>
                                    </v-container-fluid>
                                </b-card-group>
                            </b-card-text>
                        </b-card>
                    </b-card-group>
                </v-col>
            </v-row>
            <v-row>
                <v-col>
                    <b-card-group deck>
                        <!-- 種植植物生長環境需求 -->
                        <b-card header-tag="header" header-text-variant="white" header-bg-variant="info">
                            <template #header>
                                <h6 class="mb-0"><b-icon icon="flower1"></b-icon> 規劃結果-比較分析</h6>
                            </template>
                            <b-card-text>
                                <div>
                                    <h5>管 材 製 程 比 較 分 析</h5>
                                    <v-container-fluid>
                                        <v-row>
                                            <v-col>
                                                <table style="border:1px solid black; font-size: 1.5vmin" border='1'>
                                                    <thead class="table-active">
                                                        <tr align="center">
                                                            <td colspan="4"> 請輸入權重比 (分數 1~5 ) </td>
                                                            <td>
                                                                <button type="button" class="btn btn-warning" style="font-size:1.5vmin; font-family:Microsoft JhengHei;">計算</button>
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
                                                                
                                                            ></v-text-field>
                                                        </td>
                                                        <td>
                                                            <v-text-field
                                                                label="請輸入結構風險"
                                                                
                                                            ></v-text-field>
                                                        </td>
                                                        <td>
                                                            <v-text-field
                                                                label="請輸入腐蝕性"
                                                                
                                                            ></v-text-field>
                                                        </td>
                                                        <td>
                                                            <v-text-field
                                                                label="請輸入重量性"
                                                                
                                                            ></v-text-field>
                                                        </td>
                                                        <td>
                                                            <v-text-field
                                                                label="請輸入成本性"
                                                                
                                                            ></v-text-field>
                                                        </td>
                                                    </tr>
                                                    
                                                </table>
                                            </v-col>
                                            <v-col>
                                                <table style="border:1px solid black; font-size: 1.5vmin" border='1'>
                                                    <thead class="table-active">
                                                        <tr align="center">
                                                            <td style='width:6.5vmin'> 速度性 </td>
                                                            <td style='width:6.5vmin'> 結構<br>風險 </td>
                                                            <td style='width:6.5vmin'> 腐蝕性 </td>
                                                            <td style='width:6.5vmin'> 重量性 </td>
                                                            <td style='width:6.5vmin'> 成本性 </td>
                                                            <td style='width:6.5vmin'> 比較值 </td>
                                                            <td style='width:6.5vmin'> 排名值 </td>
                                                        </tr>
                                                    </thead>
                                                    <tr align="center">
                                                        <td>test</td>
                                                        <td>test</td>
                                                        <td>test</td>
                                                        <td>test</td>
                                                        <td>test</td>
                                                        <td>test</td>
                                                        <td>test</td>
                                                    </tr>
                                                </table>
                                            </v-col>
                                        </v-row>
                                    </v-container-fluid>
                                </div>
                            </b-card-text>
                        </b-card>
                    </b-card-group>                   
                </v-col> 

                <v-btn fab dark style="position:fixed; bottom: 0; right: 0; z-index: 9999;" v-on:click="showform=true">
                  <b-icon icon="arrow-left"></b-icon>
                </v-btn>
            </v-row>
        </v-container-fluid>
    </div>
</template>

<script>
  import * as SaveOverPlan from '../../services/saveoverplan_service.js';
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
        SelectSimple:[],
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
    }),
    created:function(){  // 網頁載入時，一開始就載入
        this.getJson();
    },
    methods: {
        async getJson(){
        const Vegetable = await fetch('/VegetableJSON',  {
            method: 'GET',
        });
        this.vegetablejson = await Vegetable.json();
        // 縣市地區資料
        const RegionalWindSpeed = await fetch('/RegionalWindSpeedJSON',  {
            method: 'GET',
        });
        this.regionalwindspeedjson = await RegionalWindSpeed.json();
        var filterfalg = false;
        // 篩選重複出現的縣市
        for(var i = 0 ; i < this.regionalwindspeedjson.length ; i++){
            filterfalg = false;
            for(var j = 0;j < this.City.length ; j++){
                if(this.regionalwindspeedjson[i].County == this.City[j]) filterfalg = true;
            }
            if(!filterfalg) this.City.push(this.regionalwindspeedjson[i].County);
        }
        const res = await fetch('/FluidAnalysisJSON',  {
            method: 'GET',
        });
        this.Fluidjson = await res.json();
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
            if(this.SimpleCoatingFilmsJSON[i].Expert == "System"){
                this.SimpleCoatingFilms.push(this.SimpleCoatingFilmsJSON[i]);
            }
        }
        // 簡易型連續性
        const SimpleContinuitys = await fetch('/SimpleContinuityJSON',  {
            method: 'GET',
        });
        this.SimpleContinuitysJSON = await SimpleContinuitys.json();
        for(var i = 0 ; i < this.SimpleContinuitysJSON.length ; i++){
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
            if(this.SimpleSpansJSON[i].Expert == "System"){
                this.SimpleSpans.push(this.SimpleSpansJSON[i]);
            }
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

        // 強固型披覆材料
        const StrongCoatingFilms = await fetch('/SimpleCoatingFilmJSON',  {
            method: 'GET',
        });
        this.StrongCoatingFilmsJSON = await StrongCoatingFilms.json();
        for(var i = 0 ; i < this.StrongCoatingFilmsJSON.length ; i++){
            if(this.StrongCoatingFilmsJSON[i].Expert == "System"){
                this.StrongCoatingFilms.push(this.StrongCoatingFilmsJSON[i]);
            }
        }
        // 強固型連續性
        const StrongContinuitys = await fetch('/StrongContinuityJSON',  {
            method: 'GET',
        });
        this.StrongContinuitysJSON = await StrongContinuitys.json();
        for(var i = 0 ; i < this.StrongContinuitysJSON.length ; i++){
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
            if(this.StrongUpperArchDistancesJSON[i].Expert == "System"){
                this.StrongUpperArchDistances.push(this.StrongUpperArchDistancesJSON[i]);
            }
        }
        const J_OverPlan = await fetch('/OverPlanJson',  {
            method: 'GET',
        });
        this.OverPlanJson = await J_OverPlan.json();
        for(var i = 0; i < this.OverPlanJson.length; i++){
            this.overplanArray.push(this.OverPlanJson[i])
        }
        
    },
    
    updateCrop(){     // 更新所選擇的作物分類
        // 從所選的作物id 找到 所選作物分類
        for(var i = 0 ; i < this.CropOrder.length ; i++){
            if(i == this.cropIdx)    this.selectCrop = this.CropOrder[i];
        }
        this.GrowPlants = ['==請選擇作物==',];  // 作物資料初始化
        this.plantIdx = 0;
        for(var i = 0 ; i < this.vegetablejson.length ; i++){
            if(this.selectCrop == "==請選擇作物分類==") this.CropSelect = this.vegetablejson;
            if(this.vegetablejson[i].classification == this.selectCrop)    this.GrowPlants.push(this.vegetablejson[i].VegetableTypes);
        }
    },
    updatePlant(){    // 更新所選擇的作物
        // 從所選的作物id 找到 所選作物分類
        for(var i = 0 ; i < this.GrowPlants.length ; i++){
            if(i == this.plantIdx)    this.selectplant = this.GrowPlants[i];
        }
        // 找出所選資料的data
        for(var i = 0 ; i < this.vegetablejson.length ; i++){
            if(this.vegetablejson[i].VegetableTypes == this.selectplant){
                this.Goodlight = this.vegetablejson[i].Goodlight;
                this.Photoperiod = this.vegetablejson[i].Photoperiod;
                this.Illuminance = this.vegetablejson[i].Illuminance;
                this.PPFD = this.vegetablejson[i].PPFD;
                this.LightSaturationPoint = this.vegetablejson[i].LightSaturationPoint;
                this.LightCompensationPoint = this.vegetablejson[i].LightCompensationPoint;
                break;
            }
        }
    },
    updateCity(){     // 更新所選擇的縣市
        // 從所選的縣市id 找到 所選的縣市名稱
        for(var i = 0 ; i < this.City.length ; i++){
            if(i == this.cityIdx)    this.selectCity = this.City[i];
        }
        // 將地區資料初始化
        this.selectRegion = null;
        this.regionIdx = 0;
        this.Region = ['==請選擇地區=='];
        // 篩選所選縣市的地區
        for(var i = 0 ; i < this.regionalwindspeedjson.length ; i++){
            if(this.regionalwindspeedjson[i].County == this.selectCity){
                this.Region.push(this.regionalwindspeedjson[i].Region);
            }
        }
    },
    updateRegion(){   // 更新所選擇的地區
        // 將地區資料初始化
        this.LandingProbability = 0,
        this.PathProbability = 0,
        this.Landing = null,
        this.Path = null;
        // 從所選的地區id 找到 所選的地區名稱
        for(var i = 0 ; i < this.Region.length ; i++){
            if(i == this.regionIdx)    this.selectRegion = this.Region[i];
        }
    },
    updateSimpleRadio(){  // 更新簡易型溫室選擇狀況，判斷是否有選滿9項
        this.SelectSimple = [];
        var temp = [];
        if(this.SimpleGreenhousePipe){
            temp = [];
            temp.push('溫室管材');
            temp.push(this.SimpleGreenhousePipe);
            this.SelectSimple.push(temp); // 簡易型溫室管材
        }
        if(this.SimpleDomeForm){
            temp = [];
            temp.push('圓頂形式');
            temp.push(this.SimpleDomeForm);
            this.SelectSimple.push(temp);    // 簡易型圓頂形式
        }
        if(this.SimpleCircularArchDistance){
            temp = [];
            temp.push('圓拱距');
            temp.push(this.SimpleCircularArchDistance);
            this.SelectSimple.push(temp);    // 簡易型圓拱距
        }
        if(this.SimpleFoundation){
            temp = [];
            temp.push('基礎');
            temp.push(this.SimpleFoundation);
            this.SelectSimple.push(temp);    // 簡易型基礎
        }
        if(this.SimpleSpan){
            temp = [];
            temp.push('跨距');
            temp.push(this.SimpleSpan);
            this.SelectSimple.push(temp);    // 簡易型跨距
        }
        if(this.SimpleShoulderHeight){
            temp = [];
            temp.push('肩高');
            temp.push(this.SimpleShoulderHeight);
            this.SelectSimple.push(temp);    // 簡易型肩高
        }
        if(this.SimpleLength){
            temp = [];
            temp.push('長度');
            temp.push(this.SimpleLength);
            this.SelectSimple.push(temp);    // 簡易型長度
        }
        if(this.SimpleContinuity){
            temp = [];
            temp.push('連續性');
            temp.push(this.SimpleContinuity);
            this.SelectSimple.push(temp);    // 簡易型連續性
        }
        if(this.SimpleCoatingFilm){
            temp = [];

            temp.push('披覆材料');
            temp.push(this.SimpleCoatingFilm);
            this.SelectSimple.push(temp);  // 簡易型披覆材料
        }
        if(this.SelectSimple.length == 9 ){
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
    updateRobustRadio(){  // 更新強固型溫室選擇狀況，判斷是否有選滿9項
        this.SelectRobust = [];
        var temp = [];
        if(this.RobustGreenhouseProfile){
            temp = [];
            temp.push('溫室型材');
            temp.push(this.RobustGreenhouseProfile);
            this.SelectRobust.push(temp); // 溫室型材
        }
        if(this.RobustRoofForm){
            temp = [];
            temp.push('屋頂形式');
            temp.push(this.RobustRoofForm);
            this.SelectRobust.push(temp); // 屋頂形式
        }
        if(this.RobustUpperArch){
            temp = [];
            temp.push('上拱距');
            temp.push(this.RobustUpperArch);
            this.SelectRobust.push(temp); // 上拱距
        }
        if(this.RobustFoundation){
            temp = [];
            temp.push('基礎');
            temp.push(this.RobustFoundation);
            this.SelectRobust.push(temp); // 強固型基礎
        }
        if(this.RobustSpan){
            temp = [];
            temp.push('跨距');
            temp.push(this.RobustSpan);
            this.SelectRobust.push(temp); // 強固型跨距
        }
        if(this.RobustShoulderHeight){
            temp = [];
            temp.push('肩高');
            temp.push(this.RobustShoulderHeight);
            this.SelectRobust.push(temp); // 強固型肩高
        }
        if(this.RobustLength){
            temp = [];
            temp.push('長度');
            temp.push(this.RobustLength);
            this.SelectRobust.push(temp); // 強固型長度
        }
        if(this.RobustContinuity){
            temp = [];
            temp.push('連續性');
            temp.push(this.RobustContinuity);
            this.SelectRobust.push(temp); // 強固型連續性
        }
        if(this.RobustCoatingFilm){
            temp = [];
            temp.push('披覆材料');
            temp.push(this.RobustCoatingFilm);
            this.SelectRobust.push(temp); // 披覆材料
        }
        if(this.SelectRobust.length == 9 ){
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
    recordallinfo: async function() {
        this.recordinfos = []
        this.recordinfos.push(2) //作物分類
        this.recordinfos.push(this.CropOrder[this.cropIdx]) //作物分類
        this.recordinfos.push(this.GrowPlants [this.plantIdx]) //作物選擇
        this.recordinfos.push(this.plantlength) //長度
        this.recordinfos.push(this.plantwidth) //寬度
        this.recordinfos.push(this.selectCity) //選擇城市
        this.recordinfos.push(this.selectRegion) //選擇地區
        this.recordinfos.push(this.SelectTerrain) //選擇地形
        this.recordinfos.push(this.SelectLandform) //選擇地貌
        this.recordinfos.push(this.greenhouseradio) //簡易or強固
        if (this.greenhouseradio == '簡易溫室'){
            for(var i = 0; i < this.SelectSimple.length; i++){
                this.recordinfos.push(this.SelectSimple[i][1].BuildItem) 
            }
        } else if(this.greenhouseradio == '強固溫室'){
            for(var i = 0; i < this.SelectRobust.length; i++){
                this.recordinfos.push(this.SelectRobust[i][1].BuildItem) 
            }            
        }

        let formData = new FormData();
        let formarray = [
            'uid',
            'plantclass',
            'plant',
            'croplength',
            'cropwidth',
            'localcity',
            'localarea',
            'terrain',
            'landform',
            'greenhouse',
            'greenhousepipe',
            'domeforms',
            'circulararchdistances',
            'foundations',
            'spans',
            'shoulderheights',
            'lengths',
            'continuitys',
            'coatingfilms',
            ]
        for (var i = 0; i < formarray.length; i++){
            formData.append(formarray[i],this.recordinfos[i]) 
        }
        const response = await SaveOverPlan.createOverPlan(formData)
        this.overplanArray.push(response.data)
        this.showform = false;
    },
    deleterecord: async function(DeleteId){ 
        await SaveOverPlan.deleteOverPlan(DeleteId);
        this.overplanArray = this.overplanArray.filter(obj =>{
            return obj.pid != DeleteId;
        });
    },
},
}
</script>