<template>
    <div>
        <br>
        <h2>溫室構造成本分析</h2>
        <hr>

        <!-- 簡易型溫室 -->
        <b-card-group deck>
            <!-- 簡 易 型 溫 室 成 本 選 擇 -->
            <b-card header-tag="header">
                <template #header>
                    <h6 class="mb-0"><b-icon icon="building"></b-icon> 簡 易 型 溫 室 成 本 選 擇</h6>
                </template>
                <b-card-text>
                    <b-form-select v-model="SimpleIdx" v-on:change="check" style="font-size: 2vmin; width:30vmin">
                        <option v-for="(data, index) in ExpertParameterSelected_Simple" :value="index">
                            {{data}}
                        </option>
                    </b-form-select>
                    <!-- 簡易型溫室成本參數選擇 -->
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
                                <div class="d-inline-flex p-2 bd-highlight" v-for="(simple, index) in SimpleGreenhousePipesJSON" :key="index">
                                    <input type="radio" :value="simple" v-model="SimpleGreenhousePipe" v-on:change="updateSimpleRadio">
                                    <label>{{simple.BuildItem}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr align="center" id="圓頂形式">
                            <td>圓頂形式</td>
                            <td align="left">
                                <div class="d-inline-flex p-2 bd-highlight" v-for="(simple, index) in SimpleDomeFormsJSON" :key="index">
                                    <input type="radio" :value="simple" v-model="SimpleDomeForm" v-on:change="updateSimpleRadio">
                                    <label>{{simple.BuildItem}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr align="center" id="圓拱距">
                            <td>圓拱距</td>
                            <td align="left">
                                <div class="d-inline-flex p-2 bd-highlight" v-for="(simple, index) in SimpleCircularArchDistancesJSON" :key="index">
                                    <input type="radio" :value="simple" v-model="SimpleCircularArchDistance" v-on:change="updateSimpleRadio">
                                    <label>{{simple.BuildItem}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr align="center" id="簡易基礎">
                            <td>基礎</td>
                            <td align="left">
                                <div class="d-inline-flex p-2 bd-highlight" v-for="(simple, index) in SimpleFoundationsJSON" :key="index">
                                    <input type="radio" :value="simple" v-model="SimpleFoundation" v-on:change="updateSimpleRadio">
                                    <label>{{simple.BuildItem}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr align="center" id="簡易跨距">
                            <td>跨距</td>
                            <td align="left">
                                <div class="d-inline-flex p-2 bd-highlight" v-for="(simple, index) in SimpleSpansJSON" :key="index">
                                    <input type="radio" :value="simple" v-model="SimpleSpan" v-on:change="updateSimpleRadio">
                                    <label>{{simple.BuildItem}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr align="center" id="簡易肩高">
                            <td>肩高</td>
                            <td align="left">
                                <div class="d-inline-flex p-2 bd-highlight" v-for="(simple, index) in SimpleShoulderHeightsJSON" :key="index">
                                    <input type="radio" :value="simple" v-model="SimpleShoulderHeight" v-on:change="updateSimpleRadio">
                                    <label>{{simple.BuildItem}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr align="center" id="簡易長度">
                            <td>長度</td>
                            <td align="left">
                                <div class="d-inline-flex p-2 bd-highlight" v-for="(simple, index) in SimpleLengthsJSON" :key="index">
                                    <input type="radio" :value="simple" v-model="SimpleLength" v-on:change="updateSimpleRadio">
                                    <label>{{simple.BuildItem}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr align="center" id="簡易連續性">
                            <td>連續性</td>
                            <td align="left">
                                <div class="d-inline-flex p-2 bd-highlight" v-for="(simple, index) in SimpleContinuitysJSON" :key="index">
                                    <input type="radio" :value="simple" v-model="SimpleContinuity" v-on:change="updateSimpleRadio">
                                    <label>{{simple.BuildItem}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr align="center" id="簡易披覆膜">
                            <td>披覆膜</td>
                            <td align="left">
                                <div class="d-inline-flex p-2 bd-highlight" v-for="(simple, index) in SimpleCoatingFilmsJSON" :key="index">
                                    <input type="radio" :value="simple" v-model="SimpleCoatingFilm" v-on:change="updateSimpleRadio">
                                    <label>{{simple.BuildItem}}</label>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <h6>備註：請選取欲建置的溫室規格</h6>
                    <!-- <div v-if="$auth.check()">
                        <div v-if="$auth.user().identity === '管理者' || $auth.user().identity === '專家'"> -->
                        <div class="text-right">
                            <a class="btn btn-primary" href = "/#/ConstructionCost/SimpleCostAnalysis/Add"><span class="fa fa-plus"></span> 新 增 簡 易 型 溫 室 參 數</a>
                        </div>
                        <!-- </div>
                    </div> -->
                </b-card-text>
            </b-card>

            <!-- 簡 易 型 溫 室 成 本 分 析 -->
            <b-card header-tag="header">
                <template #header>
                    <h6 class="mb-0"><b-icon icon="building"></b-icon> 簡 易 型 溫 室 成 本 分 析</h6>
                </template>
                <b-card-text>
                    <div v-if="SelectSimple.length != 9">
                        <h5 style="color:red;">請完成簡易型溫室規格選擇 還有 {{9-SelectSimple.length}}個未完成選擇</h5>
                        <br>
                        <!-- 標準簡易型溫室成本價格 -->
                        <h5>標準簡易型溫室成本</h5>
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
                                <td>總價格</td>
                                <td>  </td>
                                <td colspan="3">NT$ 500000</td>
                            </tr>

                        </table>
                        <br><br><br>
                    </div>
                    <div v-else>
                        <div class="d-flex justify-content-around">
                            <!-- 標準簡易型溫室成本價格 -->
                            <div class="p-2 bd-highlight">
                                <h5>標準簡易型溫室成本</h5>
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
                                        <td>總價格</td>
                                        <td>  </td>
                                        <td colspan="3">NT$ 500000</td>
                                    </tr>

                                </table>
                            </div>
                            <div class="p-2 bd-highlight"></div>
                            <!-- 所選擇的簡易型溫室成本價格 -->
                            <div class="p-2 bd-highlight">
                                <h5>所選擇之簡易型溫室成本</h5>
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
                                        <td>總價格</td>
                                        <td>  </td>
                                        <td colspan="3">NT$ {{SimpleTotalSimpleCost}} </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <br><br>
                    </div>
                </b-card-text>

            </b-card>
        </b-card-group>

        <br>

        <!-- 強固型溫室 -->
        <b-card-group deck>
            <!-- 強 固 型 溫 室 成 本 選 擇 -->
            <b-card header-tag="header">
                <template #header>
                    <h6 class="mb-0"><b-icon icon="building"></b-icon> 強 固 型 溫 室 成 本 選 擇</h6>
                </template>
                <b-card-text>
                    <!-- 專家選擇 -->
                    <b-form-select v-model="StrongIdx" v-on:change="check" style="font-size: 2vmin; width:30vmin">
                        <option v-for="(data, index) in ExpertParameterSelected_Strong" :value="index">
                            {{data}}
                        </option>
                    </b-form-select>
                    <!-- 強固型溫室成本選擇 -->
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
                                <div class="d-inline-flex p-2 bd-highlight" v-for="(robust, index) in StrongGreenhousPprofilesJSON" :key="index">
                                    <input type="radio" :value="robust" v-model="RobustGreenhouseProfile" v-on:change="updateRobustRadio">
                                    <label>{{robust.BuildItem}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr align="center" id="屋頂形式">
                            <td>屋頂形式</td>
                            <td align="left">
                                <div class="d-inline-flex p-2 bd-highlight" v-for="(robust, index) in StrongRoofFormsJSON" :key="index">
                                    <input type="radio" :value="robust" v-model="RobustRoofForm" v-on:change="updateRobustRadio">
                                    <label>{{robust.BuildItem}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr align="center" id="上拱距">
                            <td>上拱距</td>
                            <td align="left">
                                <div class="d-inline-flex p-2 bd-highlight" v-for="(robust, index) in StrongUpperArchDistancesJSON" :key="index">
                                    <input type="radio" :value="robust" v-model="RobustUpperArch" v-on:change="updateRobustRadio">
                                    <label>{{robust.BuildItem}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr align="center" id="基礎">
                            <td>基礎</td>
                            <td align="left">
                                <div class="d-inline-flex p-2 bd-highlight" v-for="(robust, index) in StrongFoundationsJSON" :key="index">
                                    <input type="radio" :value="robust" v-model="RobustFoundation" v-on:change="updateRobustRadio">
                                    <label>{{robust.BuildItem}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr align="center" id="跨距">
                            <td>跨距</td>
                            <td align="left">
                                <div class="d-inline-flex p-2 bd-highlight" v-for="(robust, index) in StrongSpansJSON" :key="index">
                                    <input type="radio" :value="robust" v-model="RobustSpan" v-on:change="updateRobustRadio">
                                    <label>{{robust.BuildItem}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr align="center" id="肩高">
                            <td>肩高</td>
                            <td align="left">
                                <div class="d-inline-flex p-2 bd-highlight" v-for="(robust, index) in StrongShoulderHeightsJSON" :key="index">
                                    <input type="radio" :value="robust" v-model="RobustShoulderHeight" v-on:change="updateRobustRadio">
                                    <label>{{robust.BuildItem}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr align="center" id="長度">
                            <td>長度</td>
                            <td align="left">
                                <div class="d-inline-flex p-2 bd-highlight" v-for="(robust, index) in StrongLengthsJSON" :key="index">
                                    <input type="radio" :value="robust" v-model="RobustLength" v-on:change="updateRobustRadio">
                                    <label>{{robust.BuildItem}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr align="center" id="連續性">
                            <td>連續性</td>
                            <td align="left">
                                <div class="d-inline-flex p-2 bd-highlight" v-for="(robust, index) in StrongContinuitysJSON" :key="index">
                                    <input type="radio" :value="robust" v-model="RobustContinuity" v-on:change="updateRobustRadio">
                                    <label>{{robust.BuildItem}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr align="center" id="披覆膜">
                            <td>披覆膜</td>
                            <td align="left">
                                <div class="d-inline-flex p-2 bd-highlight" v-for="(robust, index) in StrongCoatingFilmsJSON" :key="index">
                                    <input type="radio" :value="robust" v-model="RobustCoatingFilm" v-on:change="updateRobustRadio">
                                    <label>{{robust.BuildItem}}</label>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <h6>備註：請選取欲建置的溫室規格</h6>
                    <!-- <div v-if="$auth.check()">
                        <div v-if="$auth.user().identity === '管理者' || $auth.user().identity === '專家'"> -->
                        <div class="text-right">
                            <a class="btn btn-primary" href = "/#/ConstructionCost/RobustCostAnalysis/Add"><span class="fa fa-plus"></span> 新 增 強 固 型 溫 室 參 數</a>
                        </div>
                        <!-- </div>
                    </div> -->
                </b-card-text>
            </b-card>

            <!-- 強 固 型 溫 室 成 本 分 析 -->
            <b-card header-tag="header">
            <template #header>
                <h6 class="mb-0"><b-icon icon="building"></b-icon> 強 固 型 溫 室 成 本 分 析</h6>
            </template>
            <b-card-text>
                <div v-if="SelectRobust.length != 9">
                    <h5 style="color:red;">請完成強固型溫室規格選擇 還有 {{9-SelectRobust.length}}個未完成選擇</h5>
                    <br>
                    <h5>標準強固型溫室成本價格</h5>
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
                            <td>總價格</td>
                            <td>  </td>
                            <td colspan="3">NT$ 1500000</td>
                        </tr>

                    </table>
                    <br><br><br>
                </div>
                <div v-else>
                    <div class="d-flex justify-content-around">
                        <!-- 標準強固型溫室成本價格 -->
                        <div class="p-2 bd-highlight">
                            <h5>標準強固型溫室成本</h5>
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
                                    <td>總價格</td>
                                    <td>  </td>
                                    <td colspan="3">NT$ 1500000</td>
                                </tr>

                            </table>
                        </div>
                        <div class="p-2 bd-highlight"></div>
                        <!-- 所選擇的強固型溫室成本價格 -->
                        <div class="p-2 bd-highlight">
                            <h5>所選擇之強固型溫室成本</h5>
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
                                    <td>總價格</td>
                                    <td>  </td>
                                    <td colspan="3">NT$ {{RobustTotalCost}} </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <br><br>
                </div>
            </b-card-text>

            </b-card>
        </b-card-group>
    </div>
</template>

<script>
export default {
    data(){
        return{
            SimpleCostratiosJSON: [],               // 簡易型各建構項目比例
            SimpleCircularArchDistancesJSON: [],    // 簡易型圓拱距
            SimpleCoatingFilmsJSON: [],             // 簡易型披覆膜
            SimpleContinuitysJSON: [],              // 簡易型連續性
            SimpleDomeFormsJSON: [],                // 簡易型圓頂形式
            SimpleFoundationsJSON: [],              // 簡易型基礎
            SimpleGreenhousePipesJSON: [],          // 簡易型溫室管材
            SimpleLengthsJSON: [],                  // 簡易型長度
            SimpleShoulderHeightsJSON: [],          // 簡易型肩高
            SimpleSpansJSON: [],                    // 簡易型跨距

            StrongCostRatiosJSON: [],               // 強固型各建構項目比例
            StrongCoatingFilmsJSON: [],             // 強固型披覆膜
            StrongContinuitysJSON: [],              // 強固型連續性
            StrongFoundationsJSON: [],              // 強固型基礎
            StrongGreenhousPprofilesJSON: [],       // 強固型溫室型材
            StrongLengthsJSON: [],                  // 強固型長度
            StrongRoofFormsJSON: [],                // 強固型屋頂形式
            StrongShoulderHeightsJSON: [],          // 強固型肩高
            StrongSpansJSON: [],                    // 強固型跨距
            StrongUpperArchDistancesJSON: [],       // 強固型上拱距

            ExpertParameterSelected: null,
            SimpleIdx: 0,
            ExpertParameterSelected_Simple: [    // 簡易型專家參數選擇
                { value: null, text: '請選擇身分' ,disabled:true },
                { value: '農民', text: '農民' },
                { value: '業者', text: '業者' },
                { value: '專家', text: '專家' },
            ],
            StrongIdx: 0,
            ExpertParameterSelected_Strong: [    // 強固型專家參數選擇
                { value: null, text: '請選擇身分' ,disabled:true },
                { value: '農民', text: '農民' },
                { value: '業者', text: '業者' },
                { value: '專家', text: '專家' },
            ],

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
            SimpleCoatingFilm:null,  // 簡易型披覆膜
            SelectSimple:[],
            SimpleHousrBasePrice:500000, // 簡易型溫室基本價格
            SimpleTotalSimpleCost:0,
            SimpleCostAdd:0,
            SimpleStructuralRiskAdd:0,
            SimpleJobDifficultyAdd:0,



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
            RobustCoatingFilm:null,   // 強固型披覆膜
            SelectRobust:[],
            RuggedHousrBasePrice :1500000,  // 強固型溫室基本價格
            RobustTotalCost:0,
            RobustCostAdd:0,
            RobustStructuralRiskAdd:0,
            RobustJobDifficultyAdd:0,

        }
    },
    created:function(){  // 網頁載入時，一開始就載入
        this.getJson();
    },
    methods:{
        async getJson(){
            // 簡易型各建構項目比例
            const SimpleCostratios = await fetch('/SimpleCostRatioJSON',  {
                method: 'GET',
            });
            this.SimpleCostratiosJSON = await SimpleCostratios.json();
            // console.log("------簡易型各建構項目比例------");
            // console.log("------this.SimpleCostratiosJSON-----");
            // console.log(this.SimpleCostratiosJSON);

            // 簡易型圓拱距
            const SimpleCircularArchDistances = await fetch('/SimpleCircularArchDistanceJSON',  {
                method: 'GET',
            });
            this.SimpleCircularArchDistancesJSON = await SimpleCircularArchDistances.json();
            // console.log("------簡易型圓拱距------");
            // console.log("------this.SimpleCircularArchDistancesJSON-----");
            // console.log(this.SimpleCircularArchDistancesJSON);

            // 簡易型披覆膜
            const SimpleCoatingFilms = await fetch('/SimpleCoatingFilmJSON',  {
                method: 'GET',
            });
            this.SimpleCoatingFilmsJSON = await SimpleCoatingFilms.json();
            // console.log("------簡易型披覆膜------");
            // console.log("------this.SimpleCoatingFilmsJSON-----");
            // console.log(this.SimpleCoatingFilmsJSON);

            // 簡易型連續性
            const SimpleContinuitys = await fetch('/SimpleContinuityJSON',  {
                method: 'GET',
            });
            this.SimpleContinuitysJSON = await SimpleContinuitys.json();
            // console.log("------簡易型連續性------");
            // console.log("------this.SimpleContinuitysJSON-----");
            // console.log(this.SimpleContinuitysJSON);

            // 簡易型圓頂形式
            const SimpleDomeForms = await fetch('/SimpleDomeFormJSON',  {
                method: 'GET',
            });
            this.SimpleDomeFormsJSON = await SimpleDomeForms.json();
            // console.log("------簡易型圓頂形式------");
            // console.log("------this.SimpleDomeFormsJSON-----");
            // console.log(this.SimpleDomeFormsJSON);

            // 簡易型基礎
            const SimpleFoundations = await fetch('/SimpleFoundationJSON',  {
                method: 'GET',
            });
            this.SimpleFoundationsJSON = await SimpleFoundations.json();
            // console.log("------簡易型基礎------");
            // console.log("------this.SimpleFoundationsJSON-----");
            // console.log(this.SimpleFoundationsJSON);

            // 簡易型溫室管材
            const SimpleGreenhousePipes = await fetch('/SimpleGreenhousePipeJSON',  {
                method: 'GET',
            });
            this.SimpleGreenhousePipesJSON = await SimpleGreenhousePipes.json();
            // console.log("------簡易型溫室管材------");
            // console.log("------this.SimpleGreenhousePipesJSON-----");
            // console.log(this.SimpleGreenhousePipesJSON);

            // 簡易型長度
            const SimpleLengths = await fetch('/SimpleLengthJSON',  {
                method: 'GET',
            });
            this.SimpleLengthsJSON = await SimpleLengths.json();
            // console.log("------簡易型長度------");
            // console.log("------this.SimpleLengthsJSON-----");
            // console.log(this.SimpleLengthsJSON);

            // 簡易型肩高
            const SimpleShoulderHeights = await fetch('/SimpleShoulderHeightJSON',  {
                method: 'GET',
            });
            this.SimpleShoulderHeightsJSON = await SimpleShoulderHeights.json();
            // console.log("------簡易型肩高------");
            // console.log("------this.SimpleShoulderHeightsJSON-----");
            // console.log(this.SimpleShoulderHeightsJSON);

            // 簡易型跨距
            const SimpleSpans = await fetch('/SimpleSpanJSON',  {
                method: 'GET',
            });
            this.SimpleSpansJSON = await SimpleSpans.json();
            // console.log("------簡易型跨距------");
            // console.log("------this.SimpleSpansJSON-----");
            // console.log(this.SimpleSpansJSON);

            // 強固型各建構項目比例
            const StrongCostRatios = await fetch('/StrongCostRatioJSON',  {
                method: 'GET',
            });
            this.StrongCostRatiosJSON = await StrongCostRatios.json();
            // console.log("------強固型各建構項目比例------");
            // console.log("------this.StrongCostRatiosJSON-----");
            // console.log(this.StrongCostRatiosJSON);

            // 強固型披覆膜
            const StrongCoatingFilms = await fetch('/StrongCoatingFilmJSON',  {
                method: 'GET',
            });
            this.StrongCoatingFilmsJSON = await StrongCoatingFilms.json();
            // console.log("------強固型披覆膜------");
            // console.log("------this.StrongCoatingFilmsJSON-----");
            // console.log(this.StrongCoatingFilmsJSON);

            // 強固型連續性
            const StrongContinuitys = await fetch('/StrongContinuityJSON',  {
                method: 'GET',
            });
            this.StrongContinuitysJSON = await StrongContinuitys.json();
            // console.log("------強固型連續性------");
            // console.log("------this.StrongContinuitysJSON-----");
            // console.log(this.StrongContinuitysJSON);

            // 強固型基礎
            const StrongFoundations = await fetch('/StrongFoundationJSON',  {
                method: 'GET',
            });
            this.StrongFoundationsJSON = await StrongFoundations.json();
            // console.log("------強固型基礎------");
            // console.log("------this.StrongFoundationsJSON-----");
            // console.log(this.StrongFoundationsJSON);

            // 強固型溫室型材
            const StrongGreenhousPprofiles = await fetch('/StrongGreenhouseProfileJSON',  {
                method: 'GET',
            });
            this.StrongGreenhousPprofilesJSON = await StrongGreenhousPprofiles.json();
            // console.log("------強固型溫室型材------");
            // console.log("------this.StrongGreenhousPprofilesJSON-----");
            // console.log(this.StrongGreenhousPprofilesJSON);

            // 強固型長度
            const StrongLengths = await fetch('/StrongLengthJSON',  {
                method: 'GET',
            });
            this.StrongLengthsJSON = await StrongLengths.json();
            // console.log("------強固型長度------");
            // console.log("------this.StrongLengthsJSON-----");
            // console.log(this.StrongLengthsJSON);

            // 強固型屋頂形式
            const StrongRoofForms = await fetch('/StrongRoofFormJSON',  {
                method: 'GET',
            });
            this.StrongRoofFormsJSON = await StrongRoofForms.json();
            // console.log("------強固型屋頂形式------");
            // console.log("------this.StrongRoofFormsJSON-----");
            // console.log(this.StrongRoofFormsJSON);

            // 強固型肩高
            const StrongShoulderHeights = await fetch('/StrongShoulderHeightJSON',  {
                method: 'GET',
            });
            this.StrongShoulderHeightsJSON = await StrongShoulderHeights.json();
            // console.log("------強固型肩高------");
            // console.log("------this.StrongShoulderHeightsJSON-----");
            // console.log(this.StrongShoulderHeightsJSON);

            // 強固型跨距
            const StrongSpans = await fetch('/StrongSpanJSON',  {
                method: 'GET',
            });
            this.StrongSpansJSON = await StrongSpans.json();
            // console.log("------強固型跨距------");
            // console.log("------this.StrongSpansJSON-----");
            // console.log(this.StrongSpansJSON);

            // 強固型上拱距
            const StrongUpperArchDistances = await fetch('/StrongUpperArchDistanceJSON',  {
                method: 'GET',
            });
            this.StrongUpperArchDistancesJSON = await StrongUpperArchDistances.json();
            // console.log("------強固型上拱距------");
            // console.log("------this.StrongUpperArchDistancesJSON-----");
            // console.log(this.StrongUpperArchDistancesJSON);


        },updateSimpleRadio(){
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
                temp.push('披覆膜');
                temp.push(this.SimpleCoatingFilm);
                this.SelectSimple.push(temp);  // 簡易型披覆膜
            }

            if(this.SelectSimple.length == 9 ){
                this.SimpleTotalSimpleCost = 0,
                this.SimpleCostAdd = 0,
                this.SimpleStructuralRiskAdd = 0,
                this.SimpleJobDifficultyAdd = 0;

                for (var i = 0; i < this.SelectSimple.length; i++) {
                    this.SimpleTotalSimpleCost += this.SimpleHousrBasePrice * this.SelectSimple[i][1].Cost * this.SimpleCostratiosJSON[i].Cost / 100;
                    this.SimpleCostAdd += this.SelectSimple[i][1].Cost * this.SimpleCostratiosJSON[i].Cost / 100;
                    this.SimpleStructuralRiskAdd += this.SelectSimple[i][1].StructuralRisk * this.SimpleCostratiosJSON[i].StructuralRisk / 100;
                    this.SimpleJobDifficultyAdd += this.SelectSimple[i][1].JobDifficulty * this.SimpleCostratiosJSON[i].JobDifficulty/ 100;
                }

                this.SimpleTotalSimpleCost =  parseInt(this.SimpleTotalSimpleCost);
                this.SimpleCostAdd =  this.SimpleCostAdd.toFixed(2);
                this.SimpleStructuralRiskAdd =  this.SimpleStructuralRiskAdd.toFixed(2);
                this.SimpleJobDifficultyAdd =  this.SimpleJobDifficultyAdd.toFixed(2);
            }

            

        },updateRobustRadio(){
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
                temp.push('披覆膜');
                temp.push(this.RobustCoatingFilm);
                this.SelectRobust.push(temp); // 強固型披覆膜
            }

            if(this.SelectRobust.length == 9 ){
                this.RobustTotalCost = 0,
                this.RobustCostAdd = 0,
                this.RobustStructuralRiskAdd = 0,
                this.RobustJobDifficultyAdd = 0;

                for (var i = 0; i < this.SelectRobust.length; i++) {
                    this.RobustTotalCost += this.RuggedHousrBasePrice * this.SelectRobust[i][1].Cost * this.StrongCostRatiosJSON[i].Cost / 100;
                    this.RobustCostAdd += this.SelectRobust[i][1].Cost * this.StrongCostRatiosJSON[i].Cost / 100;
                    this.RobustStructuralRiskAdd += this.SelectRobust[i][1].StructuralRisk * this.StrongCostRatiosJSON[i].StructuralRisk / 100;
                    this.RobustJobDifficultyAdd += this.SelectRobust[i][1].JobDifficulty * this.StrongCostRatiosJSON[i].JobDifficulty/ 100;
                }

                this.RobustTotalCost =  parseInt(this.RobustTotalCost);
                this.RobustCostAdd =  this.RobustCostAdd.toFixed(2);
                this.RobustStructuralRiskAdd =  this.RobustStructuralRiskAdd.toFixed(2);
                this.RobustJobDifficultyAdd =  this.RobustJobDifficultyAdd.toFixed(2);
            }

            

        },check(){
            console.log("---------檢查裡-----------");
        }
    }
}
</script>
