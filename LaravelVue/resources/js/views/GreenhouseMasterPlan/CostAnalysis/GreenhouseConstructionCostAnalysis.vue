<template>
    <div>
        <br>
        <h2>溫室構造成本分析</h2>
        <hr>

        <!-- 簡易型溫室 -->
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <b-icon icon="building"></b-icon>
                        簡 易 型 溫 室 成 本 選 擇
                    </div>
                    <br><br>

                    <table style="border:1px solid black; font-size: 1.5vmin" border='1'>
                        <thead class="table-active">
                            <tr align="center">
                                <td>構建分部</td>
                                <td>規格</td>
                            </tr>
                        </thead>
                        <tr align="center" id="溫室管材">
                            <td>溫室管材</td>
                            <td align="left">
                                <div class="d-inline-flex p-2 bd-highlight" v-for="(simple, index) in SimpleGreenhouse" :key="index" v-if="simple.BuildBranch == '溫室管材'">
                                    <input type="radio" :value="simple" v-model="SimpleGreenhousePipe" v-on:change="updateSimpleRadio">
                                    <label>{{simple.BuildItem}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr align="center" id="圓頂形式">
                            <td>圓頂形式</td>
                            <td align="left">
                                <div class="d-inline-flex p-2 bd-highlight" v-for="(simple, index) in SimpleGreenhouse" :key="index" v-if="simple.BuildBranch == '圓頂形式'">
                                    <input type="radio" :value="simple" v-model="SimpleDomeForm" v-on:change="updateSimpleRadio">
                                    <label>{{simple.BuildItem}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr align="center" id="圓拱距">
                            <td>圓拱距</td>
                            <td align="left">
                                <div class="d-inline-flex p-2 bd-highlight" v-for="(simple, index) in SimpleGreenhouse" :key="index" v-if="simple.BuildBranch == '圓拱距'">
                                    <input type="radio" :value="simple" v-model="SimpleCircularArchDistance" v-on:change="updateSimpleRadio">
                                    <label>{{simple.BuildItem}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr align="center" id="簡易基礎">
                            <td>基礎</td>
                            <td align="left">
                                <div class="d-inline-flex p-2 bd-highlight" v-for="(simple, index) in SimpleGreenhouse" :key="index" v-if="simple.BuildBranch == '基礎'">
                                    <input type="radio" :value="simple" v-model="SimpleFoundation" v-on:change="updateSimpleRadio">
                                    <label>{{simple.BuildItem}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr align="center" id="簡易跨距">
                            <td>跨距</td>
                            <td align="left">
                                <div class="d-inline-flex p-2 bd-highlight" v-for="(simple, index) in SimpleGreenhouse" :key="index" v-if="simple.BuildBranch == '跨距'">
                                    <input type="radio" :value="simple" v-model="SimpleSpan" v-on:change="updateSimpleRadio">
                                    <label>{{simple.BuildItem}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr align="center" id="簡易肩高">
                            <td>肩高</td>
                            <td align="left">
                                <div class="d-inline-flex p-2 bd-highlight" v-for="(simple, index) in SimpleGreenhouse" :key="index" v-if="simple.BuildBranch == '肩高'">
                                    <input type="radio" :value="simple" v-model="SimpleShoulderHeight" v-on:change="updateSimpleRadio">
                                    <label>{{simple.BuildItem}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr align="center" id="簡易長度">
                            <td>長度</td>
                            <td align="left">
                                <div class="d-inline-flex p-2 bd-highlight" v-for="(simple, index) in SimpleGreenhouse" :key="index" v-if="simple.BuildBranch == '長度'">
                                    <input type="radio" :value="simple" v-model="SimpleLength" v-on:change="updateSimpleRadio">
                                    <label>{{simple.BuildItem}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr align="center" id="簡易連續性">
                            <td>連續性</td>
                            <td align="left">
                                <div class="d-inline-flex p-2 bd-highlight" v-for="(simple, index) in SimpleGreenhouse" :key="index" v-if="simple.BuildBranch == '連續性'">
                                    <input type="radio" :value="simple" v-model="SimpleContinuity" v-on:change="updateSimpleRadio">
                                    <label>{{simple.BuildItem}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr align="center" id="簡易披覆膜">
                            <td>披覆膜</td>
                            <td align="left">
                                <div class="d-inline-flex p-2 bd-highlight" v-for="(simple, index) in SimpleGreenhouse" :key="index" v-if="simple.BuildBranch == '披覆膜'">
                                    <input type="radio" :value="simple" v-model="SimpleCoatingFilm" v-on:change="updateSimpleRadio">
                                    <label>{{simple.BuildItem}}</label>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <h6>備註：請選取欲建置的溫室規格</h6>

                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <b-icon icon="building"></b-icon>
                        簡 易 型 溫 室 成 本 分 析
                    </div>
                    <br><br>
                    <div v-if="SelectSimple.length != 9">
                        <h5 style="color:red;">請完成簡易型溫室規格選擇</h5>
                        <br>
                        <!-- 標準簡易型溫室成本價格 -->
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
                                    <td> {{select.BuildBranch}}</td>
                                    <td> {{select.BuildItem}} </td>
                                    <td> {{select.Cost}} </td>
                                    <td> {{select.StructuralRisk}} </td>
                                    <td> {{select.JobDifficulty}} </td>
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

                </div>
            </div>
        </div>

        <!-- 強固型溫室 -->
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <b-icon icon="building"></b-icon>
                        強 固 型 溫 室 成 本 選 擇
                    </div>
                    <br><br>

                    <table style="border:1px solid black; font-size: 1.5vmin" border='1'>
                        <thead class="table-active">
                            <tr align="center">
                                <td>構建分部</td>
                                <td>規格</td>
                            </tr>
                        </thead>
                        <tr align="center" id="溫室型材">
                            <td>溫室型材</td>
                            <td align="left">
                                <div class="d-inline-flex p-2 bd-highlight" v-for="(robust, index) in RobustGreenhouse" :key="index" v-if="robust.BuildBranch == '溫室型材'">
                                    <input type="radio" :value="robust" v-model="RobustGreenhouseProfile" v-on:change="updateRobustRadio">
                                    <label>{{robust.BuildItem}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr align="center" id="屋頂形式">
                            <td>屋頂形式</td>
                            <td align="left">
                                <div class="d-inline-flex p-2 bd-highlight" v-for="(robust, index) in RobustGreenhouse" :key="index" v-if="robust.BuildBranch == '屋頂形式'">
                                    <input type="radio" :value="robust" v-model="RobustRoofForm" v-on:change="updateRobustRadio">
                                    <label>{{robust.BuildItem}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr align="center" id="上拱距">
                            <td>上拱距</td>
                            <td align="left">
                                <div class="d-inline-flex p-2 bd-highlight" v-for="(robust, index) in RobustGreenhouse" :key="index" v-if="robust.BuildBranch == '上拱距'">
                                    <input type="radio" :value="robust" v-model="RobustUpperArch" v-on:change="updateRobustRadio">
                                    <label>{{robust.BuildItem}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr align="center" id="基礎">
                            <td>基礎</td>
                            <td align="left">
                                <div class="d-inline-flex p-2 bd-highlight" v-for="(robust, index) in RobustGreenhouse" :key="index" v-if="robust.BuildBranch == '基礎'">
                                    <input type="radio" :value="robust" v-model="RobustFoundation" v-on:change="updateRobustRadio">
                                    <label>{{robust.BuildItem}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr align="center" id="跨距">
                            <td>跨距</td>
                            <td align="left">
                                <div class="d-inline-flex p-2 bd-highlight" v-for="(robust, index) in RobustGreenhouse" :key="index" v-if="robust.BuildBranch == '跨距'">
                                    <input type="radio" :value="robust" v-model="RobustSpan" v-on:change="updateRobustRadio">
                                    <label>{{robust.BuildItem}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr align="center" id="肩高">
                            <td>肩高</td>
                            <td align="left">
                                <div class="d-inline-flex p-2 bd-highlight" v-for="(robust, index) in RobustGreenhouse" :key="index" v-if="robust.BuildBranch == '肩高'">
                                    <input type="radio" :value="robust" v-model="RobustShoulderHeight" v-on:change="updateRobustRadio">
                                    <label>{{robust.BuildItem}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr align="center" id="長度">
                            <td>長度</td>
                            <td align="left">
                                <div class="d-inline-flex p-2 bd-highlight" v-for="(robust, index) in RobustGreenhouse" :key="index" v-if="robust.BuildBranch == '長度'">
                                    <input type="radio" :value="robust" v-model="RobustLength" v-on:change="updateRobustRadio">
                                    <label>{{robust.BuildItem}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr align="center" id="連續性">
                            <td>溫室型材</td>
                            <td align="left">
                                <div class="d-inline-flex p-2 bd-highlight" v-for="(robust, index) in RobustGreenhouse" :key="index" v-if="robust.BuildBranch == '連續性'">
                                    <input type="radio" :value="robust" v-model="RobustContinuity" v-on:change="updateRobustRadio">
                                    <label>{{robust.BuildItem}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr align="center" id="披覆膜">
                            <td>披覆膜</td>
                            <td align="left">
                                <div class="d-inline-flex p-2 bd-highlight" v-for="(robust, index) in RobustGreenhouse" :key="index" v-if="robust.BuildBranch == '披覆膜'">
                                    <input type="radio" :value="robust" v-model="RobustCoatingFilm" v-on:change="updateRobustRadio">
                                    <label>{{robust.BuildItem}}</label>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <h6>備註：請選取欲建置的溫室規格</h6>

                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <b-icon icon="building"></b-icon>
                        強 固 型 溫 室 成 本 分 析
                    </div>
                    <br><br>
                    <div v-if="SelectRobust.length != 9">
                        <h5 style="color:red;">請完成強固型溫室規格選擇</h5>
                        <br>
                        標準強固型溫室成本價格
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
                                    <td> {{select.BuildBranch}}</td>
                                    <td> {{select.BuildItem}} </td>
                                    <td> {{select.Cost}} </td>
                                    <td> {{select.StructuralRisk}} </td>
                                    <td> {{select.JobDifficulty}} </td>
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

                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            greenhouseCostjson: [],
            greenhouseCostRatiojson: [],

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
            // 溫室構造成本
            const GreenhouseCost = await fetch('/GreenhouseCostJSON',  {
                method: 'GET',
            });
            this.greenhouseCostjson = await GreenhouseCost.json();

            // 溫室構造成本占比%數
            const GreenhouseCostRatio = await fetch('/GreenhouseCostRatioJSON',  {
                method: 'GET',
            });
            this.greenhouseCostRatiojson = await GreenhouseCostRatio.json();

            for (var i = 0; i < this.greenhouseCostjson.length; i++) {
                if(this.greenhouseCostjson[i].GreenhouseType == "簡易型溫室"){
                    this.SimpleGreenhouse.push(this.greenhouseCostjson[i]);
                }else if(this.greenhouseCostjson[i].GreenhouseType == "強固型溫室"){
                    this.RobustGreenhouse.push(this.greenhouseCostjson[i]);
                }
            }

            for (var i = 0; i < this.greenhouseCostRatiojson.length; i++) {
                if(this.greenhouseCostRatiojson[i].GreenhouseType == "簡易型溫室"){
                    this.SimpleGreenhouseRatio.push(this.greenhouseCostRatiojson[i]);
                }else if(this.greenhouseCostRatiojson[i].GreenhouseType == "強固型溫室"){
                    this.RobustGreenhouseRatio.push(this.greenhouseCostRatiojson[i]);
                }
            }

        },updateSimpleRadio(){
            this.SelectSimple = [];
            if(this.SimpleGreenhousePipe) this.SelectSimple.push(this.SimpleGreenhousePipe); // 簡易型溫室管材
            if(this.SimpleDomeForm) this.SelectSimple.push(this.SimpleDomeForm);    // 簡易型圓頂形式
            if(this.SimpleCircularArchDistance) this.SelectSimple.push(this.SimpleCircularArchDistance);    // 簡易型圓拱距
            if(this.SimpleFoundation) this.SelectSimple.push(this.SimpleFoundation);    // 簡易型基礎
            if(this.SimpleSpan) this.SelectSimple.push(this.SimpleSpan);    // 簡易型跨距
            if(this.SimpleShoulderHeight) this.SelectSimple.push(this.SimpleShoulderHeight);    // 簡易型肩高
            if(this.SimpleLength) this.SelectSimple.push(this.SimpleLength);    // 簡易型長度
            if(this.SimpleContinuity) this.SelectSimple.push(this.SimpleContinuity);    // 簡易型連續性
            if(this.SimpleCoatingFilm) this.SelectSimple.push(this.SimpleCoatingFilm);  // 簡易型披覆膜

            this.SimpleTotalSimpleCost = 0,
            this.SimpleCostAdd = 0,
            this.SimpleStructuralRiskAdd = 0,
            this.SimpleJobDifficultyAdd = 0;

            for (var i = 0; i < this.SelectSimple.length; i++) {
                this.SimpleTotalSimpleCost += this.SimpleHousrBasePrice * this.SelectSimple[i].Cost * this.SimpleGreenhouseRatio[i].Cost / 100;
                this.SimpleCostAdd += this.SelectSimple[i].Cost * this.SimpleGreenhouseRatio[i].Cost / 100;
                this.SimpleStructuralRiskAdd += this.SelectSimple[i].StructuralRisk * this.SimpleGreenhouseRatio[i].StructuralRisk / 100;
                this.SimpleJobDifficultyAdd += this.SelectSimple[i].JobDifficulty * this.SimpleGreenhouseRatio[i].JobDifficulty/ 100;
            }

            this.SimpleTotalSimpleCost =  parseInt(this.SimpleTotalSimpleCost);
            this.SimpleCostAdd =  this.SimpleCostAdd.toFixed(2);
            this.SimpleStructuralRiskAdd =  this.SimpleStructuralRiskAdd.toFixed(2);
            this.SimpleJobDifficultyAdd =  this.SimpleJobDifficultyAdd.toFixed(2);

        },updateRobustRadio(){
            this.SelectRobust = [];
            if(this.RobustGreenhouseProfile) this.SelectRobust.push(this.RobustGreenhouseProfile); // 溫室型材
            if(this.RobustRoofForm) this.SelectRobust.push(this.RobustRoofForm); // 屋頂形式
            if(this.RobustUpperArch) this.SelectRobust.push(this.RobustUpperArch); // 上拱距
            if(this.RobustFoundation) this.SelectRobust.push(this.RobustFoundation); // 強固型基礎
            if(this.RobustSpan) this.SelectRobust.push(this.RobustSpan); // 強固型跨距
            if(this.RobustShoulderHeight) this.SelectRobust.push(this.RobustShoulderHeight); // 強固型肩高
            if(this.RobustLength) this.SelectRobust.push(this.RobustLength); // 強固型長度
            if(this.RobustContinuity) this.SelectRobust.push(this.RobustContinuity); // 強固型連續性
            if(this.RobustCoatingFilm) this.SelectRobust.push(this.RobustCoatingFilm); // 強固型披覆膜

            this.RobustTotalCost = 0,
            this.RobustCostAdd = 0,
            this.RobustStructuralRiskAdd = 0,
            this.RobustJobDifficultyAdd = 0;

            for (var i = 0; i < this.SelectRobust.length; i++) {
                this.RobustTotalCost += this.RuggedHousrBasePrice * this.SelectRobust[i].Cost * this.RobustGreenhouseRatio[i].Cost / 100;
                this.RobustCostAdd += this.SelectRobust[i].Cost * this.RobustGreenhouseRatio[i].Cost / 100;
                this.RobustStructuralRiskAdd += this.SelectRobust[i].StructuralRisk * this.RobustGreenhouseRatio[i].StructuralRisk / 100;
                this.RobustJobDifficultyAdd += this.SelectRobust[i].JobDifficulty * this.RobustGreenhouseRatio[i].JobDifficulty/ 100;
            }

            this.RobustTotalCost =  parseInt(this.RobustTotalCost);
            this.RobustCostAdd =  this.RobustCostAdd.toFixed(2);
            this.RobustStructuralRiskAdd =  this.RobustStructuralRiskAdd.toFixed(2);
            this.RobustJobDifficultyAdd =  this.RobustJobDifficultyAdd.toFixed(2);

        }
    }
}
</script>
