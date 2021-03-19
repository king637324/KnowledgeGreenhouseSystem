<template>
    <div>
        <br>
        <h2>簡易型溫室</h2>
        <hr>

        <!-- <v-form v-on:submit.prevent="createSimple" v-model="valid" lazy-validation v-if="$auth.user().identity === '管理者' || $auth.user().identity === '專家'"> -->
        <v-form v-on:submit.prevent="createSimple">
            <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">溫室管材</span></p>
            <table class="table" align="center" style="border:1px solid #dee2e6;" border='1'>
                <thead align="center" class="table-active">
                    <tr>
                        <td>項目</td>
                        <td>成本性</td>
                        <td>結構風險</td>
                        <td>作業難度</td>
                    </tr>
                </thead>
                <!-- <tr v-for="(simple, index) in SimpleData" :key="index">
                    <td>{{simple[1][0].GreenhouseId}}</td>
                    <td>{{simple[1][0].WindDirection}}</td>
                </tr> -->
                <tr align="center">
                    <td style="width: 20vmin">標準管材</td>
                    <td style="width: 20vmin">
                        <v-text-field
                            v-model="SimpleData.StandardPipeCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.StandardPipeCost">{{ errors.StandardPipeCost[0] }}</div>
                    </td>
                    <td style="width: 20vmin">
                        <v-text-field
                            v-model="SimpleData.StandardPipeStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.StandardPipeStructureRisk">{{ errors.StandardPipeStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 20vmin">
                        <v-text-field
                            v-model="SimpleData.StandardPipeWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.StandardPipeWorkDifficulty">{{ errors.StandardPipeWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td>高強管材</td>
                    <td style="width: 20vmin">
                        <v-text-field
                            v-model="SimpleData.HighStrengthPipeCostCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.HighStrengthPipeCostCost">{{ errors.HighStrengthPipeCostCost[0] }}</div>
                    </td>
                    <td style="width: 20vmin">
                        <v-text-field
                            v-model="SimpleData.HighStrengthPipeStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.HighStrengthPipeStructureRisk">{{ errors.HighStrengthPipeStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 20vmin">
                        <v-text-field
                            v-model="SimpleData.HighStrengthPipeWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.HighStrengthPipeWorkDifficulty">{{ errors.HighStrengthPipeWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td>耐蝕管材</td>
                    <td style="width: 20vmin">
                        <v-text-field
                            v-model="SimpleData.CorrosionResistantPipeCostCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.CorrosionResistantPipeCostCost">{{ errors.CorrosionResistantPipeCostCost[0] }}</div>
                    </td>
                    <td style="width: 20vmin">
                        <v-text-field
                            v-model="SimpleData.CorrosionResistantPipeStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.CorrosionResistantPipeStructureRisk">{{ errors.CorrosionResistantPipeStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 20vmin">
                        <v-text-field
                            v-model="SimpleData.CorrosionResistantPipeWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.CorrosionResistantPipeWorkDifficulty">{{ errors.CorrosionResistantPipeWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td>高強高耐蝕管材</td>
                    <td style="width: 20vmin">
                        <v-text-field
                            v-model="SimpleData.HighStrengthCorrosionResistantPipeCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.HighStrengthCorrosionResistantPipeCost">{{ errors.HighStrengthCorrosionResistantPipeCost[0] }}</div>
                    </td>
                    <td style="width: 20vmin">
                        <v-text-field
                            v-model="SimpleData.HighStrengthCorrosionResistantPipeStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.HighStrengthCorrosionResistantPipeStructureRisk">{{ errors.HighStrengthCorrosionResistantPipeStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 20vmin">
                        <v-text-field
                            v-model="SimpleData.HighStrengthCorrosionResistantPipeWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.HighStrengthCorrosionResistantPipeWorkDifficulty">{{ errors.HighStrengthCorrosionResistantPipeWorkDifficulty[0] }}</div>
                    </td>
                </tr>
            </table>
            <hr>
            <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">圓頂形式</span></p>
            <table class="table" align="center" style="border:1px solid #dee2e6;" border='1'>
                <thead align="center" class="table-active">
                    <tr>
                        <td>項目</td>
                        <td>成本性</td>
                        <td>結構風險</td>
                        <td>作業難度</td>
                    </tr>
                </thead>
                <!-- <tr v-for="(simple, index) in SimpleData" :key="index">
                    <td>{{simple[1][0].GreenhouseId}}</td>
                    <td>{{simple[1][0].WindDirection}}</td>
                </tr> -->
                <tr align="center">
                    <td>單一圓拱</td>
                    <td style="width: 20vmin">
                        <v-text-field
                            v-model="SimpleData.SingleRoundArchCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.SingleRoundArchCost">{{ errors.SingleRoundArchCost[0] }}</div>
                    </td>
                    <td style="width: 20vmin">
                        <v-text-field
                            v-model="SimpleData.SingleRoundArchStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.SingleRoundArchStructureRisk">{{ errors.SingleRoundArchStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 20vmin">
                        <v-text-field
                            v-model="SimpleData.SingleRoundArchWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.SingleRoundArchWorkDifficulty">{{ errors.SingleRoundArchWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td>下橫樑</td>
                    <td style="width: 20vmin">
                        <v-text-field
                            v-model="SimpleData.LowerBeamCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.LowerBeamCost">{{ errors.LowerBeamCost[0] }}</div>
                    </td>
                    <td style="width: 20vmin">
                        <v-text-field
                            v-model="SimpleData.LowerBeamStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.LowerBeamStructureRisk">{{ errors.LowerBeamStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 20vmin">
                        <v-text-field
                            v-model="SimpleData.LowerBeamWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.LowerBeamWorkDifficulty">{{ errors.LowerBeamWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td>上1/3橫梁</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>上二橫梁</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>T型樑</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>三支集中樑</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>三支垂支梁</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>V型樑</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>W型樑</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <hr>
            <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">圓拱距</span></p>
            <table class="table" align="center" style="border:1px solid #dee2e6;" border='1'>
                <thead align="center" class="table-active">
                    <tr>
                        <td>項目</td>
                        <td>成本性</td>
                        <td>結構風險</td>
                        <td>作業難度</td>
                    </tr>
                </thead>
                <!-- <tr v-for="(simple, index) in SimpleData" :key="index">
                    <td>{{simple[1][0].GreenhouseId}}</td>
                    <td>{{simple[1][0].WindDirection}}</td>
                </tr> -->
                <tr align="center">
                    <td>1M-1"</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>1M-1-1/4"</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>1M-1-1/2"</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>1.5M-1-1/2"</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>2M-2"</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>0.5M-1"</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>0.5-3/4"</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>0.5-1/2"</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <hr>
            <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">基礎</span></p>
            <table class="table" align="center" style="border:1px solid #dee2e6;" border='1'>
                <thead align="center" class="table-active">
                    <tr>
                        <td>項目</td>
                        <td>成本性</td>
                        <td>結構風險</td>
                        <td>作業難度</td>
                    </tr>
                </thead>
                <!-- <tr v-for="(simple, index) in SimpleData" :key="index">
                    <td>{{simple[1][0].GreenhouseId}}</td>
                    <td>{{simple[1][0].WindDirection}}</td>
                </tr> -->
                <tr align="center">
                    <td>直插40cm</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>直插50cm</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>直插30cm</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>直插40cm+地錨</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>直插50cm+地錨</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>直插30cm+地錨</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <hr>
            <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">跨距</span></p>
            <table class="table" align="center" style="border:1px solid #dee2e6;" border='1'>
                <thead align="center" class="table-active">
                    <tr>
                        <td>項目</td>
                        <td>成本性</td>
                        <td>結構風險</td>
                        <td>作業難度</td>
                    </tr>
                </thead>
                <!-- <tr v-for="(simple, index) in SimpleData" :key="index">
                    <td>{{simple[1][0].GreenhouseId}}</td>
                    <td>{{simple[1][0].WindDirection}}</td>
                </tr> -->
                <tr align="center">
                    <td>5.4m</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>6m</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>7.2m</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>8m</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <hr>
            <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">肩高</span></p>
            <table class="table" align="center" style="border:1px solid #dee2e6;" border='1'>
                <thead align="center" class="table-active">
                    <tr>
                        <td>項目</td>
                        <td>成本性</td>
                        <td>結構風險</td>
                        <td>作業難度</td>
                    </tr>
                </thead>
                <!-- <tr v-for="(simple, index) in SimpleData" :key="index">
                    <td>{{simple[1][0].GreenhouseId}}</td>
                    <td>{{simple[1][0].WindDirection}}</td>
                </tr> -->
                <tr align="center">
                    <td>2m</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>2.5m</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>3m</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>3.5m</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>4m</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <hr>
            <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">長度</span></p>
            <table class="table" align="center" style="border:1px solid #dee2e6;" border='1'>
                <thead align="center" class="table-active">
                    <tr>
                        <td>項目</td>
                        <td>成本性</td>
                        <td>結構風險</td>
                        <td>作業難度</td>
                    </tr>
                </thead>
                <!-- <tr v-for="(simple, index) in SimpleData" :key="index">
                    <td>{{simple[1][0].GreenhouseId}}</td>
                    <td>{{simple[1][0].WindDirection}}</td>
                </tr> -->
                <tr align="center">
                    <td>30m</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>60m</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>90m</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>120m</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <hr>
            <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">連續性</span></p>
            <table class="table" align="center" style="border:1px solid #dee2e6;" border='1'>
                <thead align="center" class="table-active">
                    <tr>
                        <td>項目</td>
                        <td>成本性</td>
                        <td>結構風險</td>
                        <td>作業難度</td>
                    </tr>
                </thead>
                <!-- <tr v-for="(simple, index) in SimpleData" :key="index">
                    <td>{{simple[1][0].GreenhouseId}}</td>
                    <td>{{simple[1][0].WindDirection}}</td>
                </tr> -->
                <tr align="center">
                    <td>獨棟</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>二連棟</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>三連棟</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>四連棟</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <hr>
            <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">披覆膜</span></p>
            <table class="table" align="center" style="border:1px solid #dee2e6;" border='1'>
                <thead align="center" class="table-active">
                    <tr>
                        <td>項目</td>
                        <td>成本性</td>
                        <td>結構風險</td>
                        <td>作業難度</td>
                    </tr>
                </thead>
                <!-- <tr v-for="(simple, index) in SimpleData" :key="index">
                    <td>{{simple[1][0].GreenhouseId}}</td>
                    <td>{{simple[1][0].WindDirection}}</td>
                </tr> -->
                <tr align="center">
                    <td>PE</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>PO</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>硬質塑材</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>ETFE</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>玻璃</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <hr>

            <div class="text-right">
                <button type="submit" class="btn btn-primary"><span class="fa fa-check"></span>創建</button>
            </div>

        </v-form>
    </div>

</template>

<script>

export default {
    data() {
        return {
            SimpleData:{
                /******** 溫室管材  ********/
                // 標準管材
                StandardPipeCost: 0,
                StandardPipeStructureRisk: 0,
                StandardPipeWorkDifficulty: 0,
                // 高強管材
                HighStrengthPipeCostCost: 0,
                HighStrengthPipeStructureRisk: 0,
                HighStrengthPipeWorkDifficulty: 0,
                // 耐蝕管材
                CorrosionResistantPipeCostCost: 0,
                CorrosionResistantPipeStructureRisk: 0,
                CorrosionResistantPipeWorkDifficulty: 0,
                // 高強高耐蝕管材
                HighStrengthCorrosionResistantPipeCost: 0,
                HighStrengthCorrosionResistantPipeStructureRisk: 0,
                HighStrengthCorrosionResistantPipeWorkDifficulty: 0,

                /******** 圓頂形式  ********/
                // 單一圓拱
                SingleRoundArchCost: 0,
                SingleRoundArchStructureRisk: 0,
                SingleRoundArchWorkDifficulty: 0,
                // 下橫樑
                LowerBeamCost: 0,
                LowerBeamStructureRisk: 0,
                LowerBeamWorkDifficulty: 0,
                // 上1/3橫梁
                UpperOneThreeBeamCost: 0,
                UpperOneThreeBeamStructureRisk: 0,
                UpperOneThreeBeamWorkDifficulty: 0,
                // 上二橫梁
                UpperSecondBeamCost: 0,
                UpperSecondBeamStructureRisk: 0,
                UpperSecondBeamWorkDifficulty: 0,
                // T型樑
                TBeamCost: 0,
                TBeamStructureRisk: 0,
                TBeamWorkDifficulty: 0,
                // 三支集中樑
                ThreeConcentratedBeamsCost: 0,
                ThreeConcentratedBeamsStructureRisk: 0,
                ThreeConcentratedBeamsWorkDifficulty: 0,
                // 三支垂支梁
                ThreeVerticalBeamsCost: 0,
                ThreeVerticalBeamsStructureRisk: 0,
                ThreeVerticalBeamsWorkDifficulty: 0,
                // V型樑
                VBeamCost: 0,
                VBeamStructureRisk: 0,
                VBeamWorkDifficulty: 0,
                // W型樑
                WBeamCost: 0,
                WBeamStructureRisk: 0,
                WBeamWorkDifficulty: 0,

                /******** 圓拱距  ********/
                // 1M-1"
                oneMoneCost: 0,
                oneMoneStructureRisk: 0,
                oneMoneWorkDifficulty: 0,
                // 1M-1-1/4"
                oneMone_OneFourCost: 0,
                oneMone_OneFourStructureRisk: 0,
                oneMone_OneFourWorkDifficulty: 0,
                // 1M-1-1/2"
                oneMone_OneTwoCost: 0,
                oneMone_OneTwoStructureRisk: 0,
                oneMone_OneTwoWorkDifficulty: 0,
                // 1.5M-1-1/2"
                onefiveMone_OneTwoCost: 0,
                onefiveMone_OneTwoStructureRisk: 0,
                onefiveMone_OneTwoWorkDifficulty: 0,
                // 2M-2"
                twoMtwoCost: 0,
                twoMtwoStructureRisk: 0,
                twoMtwoWorkDifficulty: 0,
                // 0.5M-1"
                zerofiveMoneCost: 0,
                zerofiveMoneStructureRisk: 0,
                zerofiveMoneWorkDifficulty: 0,
                // 0.5-3/4"
                zerofiveMthreefourCost: 0,
                zerofiveMthreefourStructureRisk: 0,
                zerofiveMthreefourWorkDifficulty: 0,
                // 0.5-1/2"
                zerofiveMonetwoCost: 0,
                zerofiveMonetwoStructureRisk: 0,
                zerofiveMonetwoWorkDifficulty: 0,

                /******** 基礎  ********/
                // 直插30cm
                thirtycmCost: 0,
                thirtycmStructureRisk: 0,
                thirtycmWorkDifficulty: 0,
                // 直插40cm
                fourtycmCost: 0,
                fourtycmStructureRisk: 0,
                fourtycmWorkDifficulty: 0,
                // 直插50cm
                fiftycmCost: 0,
                fiftycmStructureRisk: 0,
                fiftycmWorkDifficulty: 0,
                // 直插30cm+地錨
                thirtycmPlusCost: 0,
                thirtycmPlusStructureRisk: 0,
                thirtycmPlusWorkDifficulty: 0,
                // 直插40cm+地錨
                fourtycmPlusCost: 0,
                fourtycmPlusStructureRisk: 0,
                fourtycmPlusWorkDifficulty: 0,
                // 直插50cm+地錨
                fiftycmPlusCost: 0,
                fiftycmPlusStructureRisk: 0,
                fiftycmPlusWorkDifficulty: 0,

                /******** 跨距  ********/
                // 5.4m
                FiveFourmCost: 0,
                FiveFourmStructureRisk: 0,
                FiveFourmWorkDifficulty: 0,
                // 6m
                SixmCost: 0,
                SixmStructureRisk: 0,
                SixmWorkDifficulty: 0,
                // 7.2m
                SevenmCost: 0,
                SevenmStructureRisk: 0,
                SevenmWorkDifficulty: 0,
                // 8m
                eightmCost: 0,
                eightmStructureRisk: 0,
                eightmWorkDifficulty: 0,

                /******** 肩高  ********/
                // 2m
                TwomCost: 0,
                TwomStructureRisk: 0,
                TwomWorkDifficulty: 0,
                // 2.5m
                TwoFivemCost: 0,
                TwoFivemStructureRisk: 0,
                TwoFivemWorkDifficulty: 0,
                // 3m
                ThreemCost: 0,
                ThreemStructureRisk: 0,
                ThreemWorkDifficulty: 0,
                // 3.5m
                ThreeFivemCost: 0,
                ThreeFivemStructureRisk: 0,
                ThreeFivemWorkDifficulty: 0,
                // 4m
                FourmCost: 0,
                FourmStructureRisk: 0,
                FourmWorkDifficulty: 0,

                /******** 長度  ********/
                // 30m
                ThirtymCost: 0,
                ThirtymStructureRisk: 0,
                ThirtymWorkDifficulty: 0,
                // 60m
                SixtymCost: 0,
                SixtymStructureRisk: 0,
                SixtymWorkDifficulty: 0,
                // 90m
                NinetymCost: 0,
                NinetymStructureRisk: 0,
                NinetymWorkDifficulty: 0,
                // 120m
                OneHundredTwentymCost: 0,
                OneHundredTwentymStructureRisk: 0,
                OneHundredTwentymWorkDifficulty: 0,

                /******** 連續性  ********/
                // 獨棟
                DetachedHouseCost: 0,
                DetachedHouseStructureRisk: 0,
                DetachedHouseWorkDifficulty: 0,
                // 二連棟
                TwoStoryBuildingCost: 0,
                TwoStoryBuildingStructureRisk: 0,
                TwoStoryBuildingWorkDifficulty: 0,
                // 三連棟
                ThreeStoryCost: 0,
                ThreeStoryStructureRisk: 0,
                ThreeStoryWorkDifficulty: 0,
                // 四連棟
                FourStoryCost: 0,
                FourStoryStructureRisk: 0,
                FourStoryWorkDifficulty: 0,

                /******** 披覆膜  ********/
                // PE
                PECost: 0,
                PEStructureRisk: 0,
                PEWorkDifficulty: 0,
                // PO
                POCost: 0,
                POStructureRisk: 0,
                POWorkDifficulty: 0,
                // 硬質塑材
                RigidPlasticCost: 0,
                RigidPlasticStructureRisk: 0,
                RigidPlasticWorkDifficulty: 0,
                // ETFE
                ETFECost: 0,
                ETFEStructureRisk: 0,
                ETFEWorkDifficulty: 0,
                // 玻璃
                GlassCost: 0,
                GlassStructureRisk: 0,
                GlassWorkDifficulty: 0,


            },
            errors:{

            },

        }
    },
    created:function(){  // 網頁載入時，一開始就載入
        // this.$auth.user();
        // console.log(this.$auth.user()); // 可以取得使用者資料
    },
    methods: {
    },
}
</script>

