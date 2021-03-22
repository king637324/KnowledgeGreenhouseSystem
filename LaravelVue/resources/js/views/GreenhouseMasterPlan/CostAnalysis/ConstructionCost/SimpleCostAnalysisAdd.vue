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
                    <td style="width: 15vmin">標準管材</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.StandardPipeCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.StandardPipeCost">{{ errors.StandardPipeCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.StandardPipeStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.StandardPipeStructureRisk">{{ errors.StandardPipeStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
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
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.HighStrengthPipeCostCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.HighStrengthPipeCostCost">{{ errors.HighStrengthPipeCostCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.HighStrengthPipeStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.HighStrengthPipeStructureRisk">{{ errors.HighStrengthPipeStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
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
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.CorrosionResistantPipeCostCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.CorrosionResistantPipeCostCost">{{ errors.CorrosionResistantPipeCostCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.CorrosionResistantPipeStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.CorrosionResistantPipeStructureRisk">{{ errors.CorrosionResistantPipeStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
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
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.HighStrengthCorrosionResistantPipeCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.HighStrengthCorrosionResistantPipeCost">{{ errors.HighStrengthCorrosionResistantPipeCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.HighStrengthCorrosionResistantPipeStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.HighStrengthCorrosionResistantPipeStructureRisk">{{ errors.HighStrengthCorrosionResistantPipeStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
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
                    <td  style="width: 15vmin">單一圓拱</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.SingleRoundArchCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.SingleRoundArchCost">{{ errors.SingleRoundArchCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.SingleRoundArchStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.SingleRoundArchStructureRisk">{{ errors.SingleRoundArchStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.SingleRoundArchWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.SingleRoundArchWorkDifficulty">{{ errors.SingleRoundArchWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td  style="width: 15vmin">下橫樑</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.LowerBeamCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.LowerBeamCost">{{ errors.LowerBeamCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.LowerBeamStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.LowerBeamStructureRisk">{{ errors.LowerBeamStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.LowerBeamWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.LowerBeamWorkDifficulty">{{ errors.LowerBeamWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">上1/3橫梁</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.UpperOneThreeBeamCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.UpperOneThreeBeamCost">{{ errors.UpperOneThreeBeamCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.UpperOneThreeBeamStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.UpperOneThreeBeamStructureRisk">{{ errors.UpperOneThreeBeamStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.UpperOneThreeBeamWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.UpperOneThreeBeamWorkDifficulty">{{ errors.UpperOneThreeBeamWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">上二橫梁</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.UpperSecondBeamCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.UpperSecondBeamCost">{{ errors.UpperSecondBeamCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.UpperSecondBeamStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.UpperSecondBeamStructureRisk">{{ errors.UpperSecondBeamStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.UpperSecondBeamWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.UpperSecondBeamWorkDifficulty">{{ errors.UpperSecondBeamWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">T型樑</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.TBeamCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.TBeamCost">{{ errors.TBeamCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.TBeamStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.TBeamStructureRisk">{{ errors.TBeamStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.TBeamWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.TBeamWorkDifficulty">{{ errors.TBeamWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">三支集中樑</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.ThreeConcentratedBeamsCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.ThreeConcentratedBeamsCost">{{ errors.ThreeConcentratedBeamsCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.ThreeConcentratedBeamsStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.ThreeConcentratedBeamsStructureRisk">{{ errors.ThreeConcentratedBeamsStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.ThreeConcentratedBeamsWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.ThreeConcentratedBeamsWorkDifficulty">{{ errors.ThreeConcentratedBeamsWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">三支垂支梁</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.ThreeVerticalBeamsCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.ThreeVerticalBeamsCost">{{ errors.ThreeVerticalBeamsCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.ThreeVerticalBeamsStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.ThreeVerticalBeamsStructureRisk">{{ errors.ThreeVerticalBeamsStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.ThreeVerticalBeamsWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.ThreeVerticalBeamsWorkDifficulty">{{ errors.ThreeVerticalBeamsWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">V型樑</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.VBeamCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.VBeamCost">{{ errors.VBeamCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.VBeamStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.VBeamStructureRisk">{{ errors.VBeamStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.VBeamWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.VBeamWorkDifficulty">{{ errors.VBeamWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">W型樑</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.WBeamCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.WBeamCost">{{ errors.WBeamCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.WBeamStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.WBeamStructureRisk">{{ errors.WBeamStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.WBeamWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.WBeamWorkDifficulty">{{ errors.WBeamWorkDifficulty[0] }}</div>
                    </td>
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
                    <td style="width: 15vmin">1M-1"</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.oneMoneCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.oneMoneCost">{{ errors.oneMoneCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.oneMoneStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.oneMoneStructureRisk">{{ errors.oneMoneStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.oneMoneWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.oneMoneWorkDifficulty">{{ errors.oneMoneWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">1M-1-1/4"</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.oneMone_OneFourCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.oneMone_OneFourCost">{{ errors.oneMone_OneFourCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.oneMone_OneFourStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.oneMone_OneFourStructureRisk">{{ errors.oneMone_OneFourStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.oneMone_OneFourWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.oneMone_OneFourWorkDifficulty">{{ errors.oneMone_OneFourWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">1M-1-1/2"</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.oneMone_OneTwoCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.oneMone_OneTwoCost">{{ errors.oneMone_OneTwoCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.oneMone_OneTwoStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.oneMone_OneTwoStructureRisk">{{ errors.oneMone_OneTwoStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.oneMone_OneTwoWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.oneMone_OneTwoWorkDifficulty">{{ errors.oneMone_OneTwoWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">1.5M-1-1/2"</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.onefiveMone_OneTwoCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.onefiveMone_OneTwoCost">{{ errors.onefiveMone_OneTwoCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.onefiveMone_OneTwoStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.onefiveMone_OneTwoStructureRisk">{{ errors.onefiveMone_OneTwoStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.onefiveMone_OneTwoWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.onefiveMone_OneTwoWorkDifficulty">{{ errors.onefiveMone_OneTwoWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">2M-2"</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.twoMtwoCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.twoMtwoCost">{{ errors.twoMtwoCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.twoMtwoStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.twoMtwoStructureRisk">{{ errors.twoMtwoStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.twoMtwoWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.twoMtwoWorkDifficulty">{{ errors.twoMtwoWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">0.5M-1"</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.zerofiveMoneCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.zerofiveMoneCost">{{ errors.zerofiveMoneCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.zerofiveMoneStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.zerofiveMoneStructureRisk">{{ errors.zerofiveMoneStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.zerofiveMoneWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.zerofiveMoneWorkDifficulty">{{ errors.zerofiveMoneWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">0.5-3/4"</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.zerofiveMthreefourCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.zerofiveMthreefourCost">{{ errors.zerofiveMthreefourCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.zerofiveMthreefourStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.zerofiveMthreefourStructureRisk">{{ errors.zerofiveMthreefourStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.zerofiveMthreefourWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.zerofiveMthreefourWorkDifficulty">{{ errors.zerofiveMthreefourWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">0.5-1/2"</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.zerofiveMonetwoCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.zerofiveMonetwoCost">{{ errors.zerofiveMonetwoCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.zerofiveMonetwoStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.zerofiveMonetwoStructureRisk">{{ errors.zerofiveMonetwoStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.zerofiveMonetwoWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.zerofiveMonetwoWorkDifficulty">{{ errors.zerofiveMonetwoWorkDifficulty[0] }}</div>
                    </td>
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
                    <td style="width: 15vmin">直插30cm</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.thirtycmCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.thirtycmCost">{{ errors.thirtycmCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.thirtycmStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.thirtycmStructureRisk">{{ errors.thirtycmStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.thirtycmWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.thirtycmWorkDifficulty">{{ errors.thirtycmWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">直插40cm</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.fourtycmCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.fourtycmCost">{{ errors.fourtycmCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.fourtycmStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.fourtycmStructureRisk">{{ errors.fourtycmStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.fourtycmWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.fourtycmWorkDifficulty">{{ errors.fourtycmWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">直插50cm</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.fiftycmCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.fiftycmCost">{{ errors.fiftycmCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.fiftycmStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.fiftycmStructureRisk">{{ errors.fiftycmStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.fiftycmWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.fiftycmWorkDifficulty">{{ errors.fiftycmWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">直插30cm+地錨</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.thirtycmPlusCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.thirtycmPlusCost">{{ errors.thirtycmPlusCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.thirtycmPlusStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.thirtycmPlusStructureRisk">{{ errors.thirtycmPlusStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.thirtycmPlusWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.thirtycmPlusWorkDifficulty">{{ errors.thirtycmPlusWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">直插40cm+地錨</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.fourtycmPlusCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.fourtycmPlusCost">{{ errors.fourtycmPlusCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.fourtycmPlusStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.fourtycmPlusStructureRisk">{{ errors.fourtycmPlusStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.fourtycmPlusWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.fourtycmPlusWorkDifficulty">{{ errors.fourtycmPlusWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">直插50cm+地錨</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.fiftycmPlusCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.fiftycmPlusCost">{{ errors.fiftycmPlusCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.fiftycmPlusStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.fiftycmPlusStructureRisk">{{ errors.fiftycmPlusStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.fiftycmPlusWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.fiftycmPlusWorkDifficulty">{{ errors.fiftycmPlusWorkDifficulty[0] }}</div>
                    </td>
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
                    <td style="width: 15vmin">5.4m</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.FiveFourmCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.FiveFourmCost">{{ errors.FiveFourmCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.FiveFourmStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.FiveFourmStructureRisk">{{ errors.FiveFourmStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.FiveFourmWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.FiveFourmWorkDifficulty">{{ errors.FiveFourmWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">6m</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.SixmCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.SixmCost">{{ errors.SixmCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.SixmStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.SixmStructureRisk">{{ errors.SixmStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.SixmWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.SixmWorkDifficulty">{{ errors.SixmWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">7.2m</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.SevenmCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.SevenmCost">{{ errors.SevenmCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.SevenmStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.SevenmStructureRisk">{{ errors.SevenmStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.SevenmWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.SevenmWorkDifficulty">{{ errors.SevenmWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">8m</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.eightmCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.eightmCost">{{ errors.eightmCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.eightmStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.eightmStructureRisk">{{ errors.eightmStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.eightmWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.eightmWorkDifficulty">{{ errors.eightmWorkDifficulty[0] }}</div>
                    </td>
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
                    <td style="width: 15vmin">2m</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.TwomCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.TwomCost">{{ errors.TwomCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.TwomStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.TwomStructureRisk">{{ errors.TwomStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.TwomWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.TwomWorkDifficulty">{{ errors.TwomWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">2.5m</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.TwoFivemCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.TwoFivemCost">{{ errors.TwoFivemCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.TwoFivemStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.TwoFivemStructureRisk">{{ errors.TwoFivemStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.TwoFivemWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.TwoFivemWorkDifficulty">{{ errors.TwoFivemWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">3m</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.ThreemCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.ThreemCost">{{ errors.ThreemCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.ThreemStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.ThreemStructureRisk">{{ errors.ThreemStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.ThreemWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.ThreemWorkDifficulty">{{ errors.ThreemWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">3.5m</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.ThreeFivemCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.ThreeFivemCost">{{ errors.ThreeFivemCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.ThreeFivemStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.ThreeFivemStructureRisk">{{ errors.ThreeFivemStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.ThreeFivemWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.ThreeFivemWorkDifficulty">{{ errors.ThreeFivemWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">4m</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.FourmCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.FourmCost">{{ errors.FourmCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.FourmStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.FourmStructureRisk">{{ errors.FourmStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.FourmWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.FourmWorkDifficulty">{{ errors.FourmWorkDifficulty[0] }}</div>
                    </td>
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
                    <td style="width: 15vmin">30m</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.ThirtymCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.ThirtymCost">{{ errors.ThirtymCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.ThirtymStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.ThirtymStructureRisk">{{ errors.ThirtymStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.ThirtymWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.ThirtymWorkDifficulty">{{ errors.ThirtymWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">60m</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.SixtymCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.SixtymCost">{{ errors.SixtymCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.SixtymStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.SixtymStructureRisk">{{ errors.SixtymStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.SixtymWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.SixtymWorkDifficulty">{{ errors.SixtymWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">90m</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.NinetymCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.NinetymCost">{{ errors.NinetymCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.NinetymStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.NinetymStructureRisk">{{ errors.NinetymStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.NinetymWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.NinetymWorkDifficulty">{{ errors.NinetymWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">120m</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.OneHundredTwentymCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.OneHundredTwentymCost">{{ errors.OneHundredTwentymCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.OneHundredTwentymStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.OneHundredTwentymStructureRisk">{{ errors.OneHundredTwentymStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.OneHundredTwentymWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.OneHundredTwentymWorkDifficulty">{{ errors.OneHundredTwentymWorkDifficulty[0] }}</div>
                    </td>
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
                    <td style="width: 15vmin">獨棟</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.DetachedHouseCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.DetachedHouseCost">{{ errors.DetachedHouseCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.DetachedHouseStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.DetachedHouseStructureRisk">{{ errors.DetachedHouseStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.DetachedHouseWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.DetachedHouseWorkDifficulty">{{ errors.DetachedHouseWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">二連棟</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.TwoStoryBuildingCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.TwoStoryBuildingCost">{{ errors.TwoStoryBuildingCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.TwoStoryBuildingStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.TwoStoryBuildingStructureRisk">{{ errors.TwoStoryBuildingStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.TwoStoryBuildingWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.TwoStoryBuildingWorkDifficulty">{{ errors.TwoStoryBuildingWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">三連棟</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.ThreeStoryCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.ThreeStoryCost">{{ errors.ThreeStoryCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.ThreeStoryStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.ThreeStoryStructureRisk">{{ errors.ThreeStoryStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.ThreeStoryWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.ThreeStoryWorkDifficulty">{{ errors.ThreeStoryWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">四連棟</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.FourStoryCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.FourStoryCost">{{ errors.FourStoryCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.FourStoryStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.FourStoryStructureRisk">{{ errors.FourStoryStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.FourStoryWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.FourStoryWorkDifficulty">{{ errors.FourStoryWorkDifficulty[0] }}</div>
                    </td>
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
                    <td style="width: 15vmin">PE</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.PECost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.PECost">{{ errors.PECost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.PEStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.PEStructureRisk">{{ errors.PEStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.PEWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.PEWorkDifficulty">{{ errors.PEWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">PO</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.POCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.POCost">{{ errors.POCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.POStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.POStructureRisk">{{ errors.POStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.POWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.POWorkDifficulty">{{ errors.POWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">硬質塑材</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.RigidPlasticCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.RigidPlasticCost">{{ errors.RigidPlasticCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.RigidPlasticStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.RigidPlasticStructureRisk">{{ errors.RigidPlasticStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.RigidPlasticWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.RigidPlasticWorkDifficulty">{{ errors.RigidPlasticWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">ETFE</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.ETFECost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.ETFECost">{{ errors.ETFECost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.ETFEStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.ETFEStructureRisk">{{ errors.ETFEStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.ETFEWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.ETFEWorkDifficulty">{{ errors.ETFEWorkDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">玻璃</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.GlassCost"
                            label="請輸入成本性參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.GlassCost">{{ errors.GlassCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.GlassStructureRisk"
                            label="請輸入結構風險參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.GlassStructureRisk">{{ errors.GlassStructureRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.GlassWorkDifficulty"
                            label="請輸入作業難度參數"
                            required
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.GlassWorkDifficulty">{{ errors.GlassWorkDifficulty[0] }}</div>
                    </td>
                </tr>
            </table>
            <hr>

            <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">各結構材料成本比例</span></p>
            <table class="table" align="center" style="border:1px solid #dee2e6;" border='1'>
                <thead align="center" class="table-active">
                    <tr>
                        <td style="width: 15vmin">溫室管材</td>
                        <td style="width: 15vmin">圓頂形式</td>
                        <td style="width: 15vmin">圓拱距</td>
                        <td style="width: 15vmin">基礎</td>
                        <td style="width: 15vmin">跨距</td>
                    </tr>
                </thead>
                <tr align="center">
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.GreenhousePipe"
                            label="請輸入溫室管材的比例 %數"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.GreenhousePipe">{{ errors.GreenhousePipe[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.DomeForm"
                            label="請輸入圓頂形式的比例 %數"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.DomeForm">{{ errors.DomeForm[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.ArcDistance"
                            label="請輸入圓拱距的比例 %數"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.ArcDistance">{{ errors.ArcDistance[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.Basis"
                            label="請輸入基礎的比例 %數"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.Basis">{{ errors.Basis[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.Span"
                            label="請輸入跨距的比例 %數"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.Span">{{ errors.Span[0] }}</div>
                    </td>
                </tr>
                <thead align="center" class="table-active">
                    <tr>
                        <td style="width: 15vmin">肩高</td>
                        <td style="width: 15vmin">長度</td>
                        <td style="width: 15vmin">連續性</td>
                        <td style="width: 15vmin">披覆膜</td>
                        <td style="width: 15vmin">比例總和</td>
                    </tr>
                </thead>
                <tr align="center">
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.ShoulderHeight"
                            label="請輸入肩高的比例 %數"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.ShoulderHeight">{{ errors.ShoulderHeight[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.Length"
                            label="請輸入長度的比例 %數"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.Length">{{ errors.Length[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.Continuity"
                            label="請輸入連續性的比例 %數"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.Continuity">{{ errors.Continuity[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.CoatedFilm"
                            label="請輸入披覆膜的比例 %數"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.CoatedFilm">{{ errors.CoatedFilm[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <h5>{{proportiontotoal}}</h5>
                    </td>
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
import * as SimpleCostAddService from '../../../../services/SimpleCost_service';

export default {
    data() {
        return {
            SimpleData:{
                /******** 溫室管材  ********/
                // 標準管材
                StandardPipeCost: null,
                StandardPipeStructureRisk: null,
                StandardPipeWorkDifficulty: null,
                // 高強管材
                HighStrengthPipeCostCost: null,
                HighStrengthPipeStructureRisk: null,
                HighStrengthPipeWorkDifficulty: null,
                // 耐蝕管材
                CorrosionResistantPipeCostCost: null,
                CorrosionResistantPipeStructureRisk: null,
                CorrosionResistantPipeWorkDifficulty: null,
                // 高強高耐蝕管材
                HighStrengthCorrosionResistantPipeCost: null,
                HighStrengthCorrosionResistantPipeStructureRisk: null,
                HighStrengthCorrosionResistantPipeWorkDifficulty: null,

                /******** 圓頂形式  ********/
                // 單一圓拱
                SingleRoundArchCost: null,
                SingleRoundArchStructureRisk: null,
                SingleRoundArchWorkDifficulty: null,
                // 下橫樑
                LowerBeamCost: null,
                LowerBeamStructureRisk: null,
                LowerBeamWorkDifficulty: null,
                // 上1/3橫梁
                UpperOneThreeBeamCost: null,
                UpperOneThreeBeamStructureRisk: null,
                UpperOneThreeBeamWorkDifficulty: null,
                // 上二橫梁
                UpperSecondBeamCost: null,
                UpperSecondBeamStructureRisk: null,
                UpperSecondBeamWorkDifficulty: null,
                // T型樑
                TBeamCost: null,
                TBeamStructureRisk: null,
                TBeamWorkDifficulty: null,
                // 三支集中樑
                ThreeConcentratedBeamsCost: null,
                ThreeConcentratedBeamsStructureRisk: null,
                ThreeConcentratedBeamsWorkDifficulty: null,
                // 三支垂支梁
                ThreeVerticalBeamsCost: null,
                ThreeVerticalBeamsStructureRisk: null,
                ThreeVerticalBeamsWorkDifficulty: null,
                // V型樑
                VBeamCost: null,
                VBeamStructureRisk: null,
                VBeamWorkDifficulty: null,
                // W型樑
                WBeamCost: null,
                WBeamStructureRisk: null,
                WBeamWorkDifficulty: null,

                /******** 圓拱距  ********/
                // 1M-1"
                oneMoneCost: null,
                oneMoneStructureRisk: null,
                oneMoneWorkDifficulty: null,
                // 1M-1-1/4"
                oneMone_OneFourCost: null,
                oneMone_OneFourStructureRisk: null,
                oneMone_OneFourWorkDifficulty: null,
                // 1M-1-1/2"
                oneMone_OneTwoCost: null,
                oneMone_OneTwoStructureRisk: null,
                oneMone_OneTwoWorkDifficulty: null,
                // 1.5M-1-1/2"
                onefiveMone_OneTwoCost: null,
                onefiveMone_OneTwoStructureRisk: null,
                onefiveMone_OneTwoWorkDifficulty: null,
                // 2M-2"
                twoMtwoCost: null,
                twoMtwoStructureRisk: null,
                twoMtwoWorkDifficulty: null,
                // 0.5M-1"
                zerofiveMoneCost: null,
                zerofiveMoneStructureRisk: null,
                zerofiveMoneWorkDifficulty: null,
                // 0.5-3/4"
                zerofiveMthreefourCost: null,
                zerofiveMthreefourStructureRisk: null,
                zerofiveMthreefourWorkDifficulty: null,
                // 0.5-1/2"
                zerofiveMonetwoCost: null,
                zerofiveMonetwoStructureRisk: null,
                zerofiveMonetwoWorkDifficulty: null,

                /******** 基礎  ********/
                // 直插30cm
                thirtycmCost: null,
                thirtycmStructureRisk: null,
                thirtycmWorkDifficulty: null,
                // 直插40cm
                fourtycmCost: null,
                fourtycmStructureRisk: null,
                fourtycmWorkDifficulty: null,
                // 直插50cm
                fiftycmCost: null,
                fiftycmStructureRisk: null,
                fiftycmWorkDifficulty: null,
                // 直插30cm+地錨
                thirtycmPlusCost: null,
                thirtycmPlusStructureRisk: null,
                thirtycmPlusWorkDifficulty: null,
                // 直插40cm+地錨
                fourtycmPlusCost: null,
                fourtycmPlusStructureRisk: null,
                fourtycmPlusWorkDifficulty: null,
                // 直插50cm+地錨
                fiftycmPlusCost: null,
                fiftycmPlusStructureRisk: null,
                fiftycmPlusWorkDifficulty: null,

                /******** 跨距  ********/
                // 5.4m
                FiveFourmCost: null,
                FiveFourmStructureRisk: null,
                FiveFourmWorkDifficulty: null,
                // 6m
                SixmCost: null,
                SixmStructureRisk: null,
                SixmWorkDifficulty: null,
                // 7.2m
                SevenmCost: null,
                SevenmStructureRisk: null,
                SevenmWorkDifficulty: null,
                // 8m
                eightmCost: null,
                eightmStructureRisk: null,
                eightmWorkDifficulty: null,

                /******** 肩高  ********/
                // 2m
                TwomCost: null,
                TwomStructureRisk: null,
                TwomWorkDifficulty: null,
                // 2.5m
                TwoFivemCost: null,
                TwoFivemStructureRisk: null,
                TwoFivemWorkDifficulty: null,
                // 3m
                ThreemCost: null,
                ThreemStructureRisk: null,
                ThreemWorkDifficulty: null,
                // 3.5m
                ThreeFivemCost: null,
                ThreeFivemStructureRisk: null,
                ThreeFivemWorkDifficulty: null,
                // 4m
                FourmCost: null,
                FourmStructureRisk: null,
                FourmWorkDifficulty: null,

                /******** 長度  ********/
                // 30m
                ThirtymCost: null,
                ThirtymStructureRisk: null,
                ThirtymWorkDifficulty: null,
                // 60m
                SixtymCost: null,
                SixtymStructureRisk: null,
                SixtymWorkDifficulty: null,
                // 90m
                NinetymCost: null,
                NinetymStructureRisk: null,
                NinetymWorkDifficulty: null,
                // 120m
                OneHundredTwentymCost: null,
                OneHundredTwentymStructureRisk: null,
                OneHundredTwentymWorkDifficulty: null,

                /******** 連續性  ********/
                // 獨棟
                DetachedHouseCost: null,
                DetachedHouseStructureRisk: null,
                DetachedHouseWorkDifficulty: null,
                // 二連棟
                TwoStoryBuildingCost: null,
                TwoStoryBuildingStructureRisk: null,
                TwoStoryBuildingWorkDifficulty: null,
                // 三連棟
                ThreeStoryCost: null,
                ThreeStoryStructureRisk: null,
                ThreeStoryWorkDifficulty: null,
                // 四連棟
                FourStoryCost: null,
                FourStoryStructureRisk: null,
                FourStoryWorkDifficulty: null,

                /******** 披覆膜  ********/
                // PE
                PECost: null,
                PEStructureRisk: null,
                PEWorkDifficulty: null,
                // PO
                POCost: null,
                POStructureRisk: null,
                POWorkDifficulty: null,
                // 硬質塑材
                RigidPlasticCost: null,
                RigidPlasticStructureRisk: null,
                RigidPlasticWorkDifficulty: null,
                // ETFE
                ETFECost: null,
                ETFEStructureRisk: null,
                ETFEWorkDifficulty: null,
                // 玻璃
                GlassCost: null,
                GlassStructureRisk: null,
                GlassWorkDifficulty: null,
                
                /******** 各成本比例  ********/
                GreenhousePipe: 20, // 溫室管材
                DomeForm: 10,       // 圓頂形式
                ArcDistance: 10,    // 圓拱距
                Basis: 10,          // 基礎
                Span: 10,           // 跨距
                ShoulderHeight: 10, // 肩高
                Length: 10,         // 長度
                Continuity: 10,     // 連續性
                CoatedFilm: 10,     // 披覆膜
            },
            errors:{

            },
            proportiontotoal: 100,
            // proportiontotoal: this.SimpleData.GreenhousePipe + this.SimpleData.DomeForm + this.SimpleData.ArcDistance + this.SimpleData.Basis + this.SimpleData.Span + this.SimpleData.ShoulderHeight + this.SimpleData.Length + this.SimpleData.Continuity + this.SimpleData.CoatedFilm;


        }
    },
    created:function(){  // 網頁載入時，一開始就載入
        // this.$auth.user();
        // console.log(this.$auth.user()); // 可以取得使用者資料
    },
    methods: {
        calculator(){
            this.proportiontotoal = parseInt(this.SimpleData.GreenhousePipe) + parseInt(this.SimpleData.DomeForm) + parseInt(this.SimpleData.ArcDistance) + parseInt(this.SimpleData.Basis) + parseInt(this.SimpleData.Span) + parseInt(this.SimpleData.ShoulderHeight) + parseInt(this.SimpleData.Length) + parseInt(this.SimpleData.Continuity) + parseInt(this.SimpleData.CoatedFilm);
        },
        createSimple: async function(){
            console.log("------createSimple裡--------");
            console.log("------this.SimpleData--------");
            console.log(this.SimpleData);

            let formData = new FormData();
            /******** 溫室管材  ********/
            // 標準管材
            formData.append('StandardPipeCost',this.SimpleData.StandardPipeCost);
            formData.append('StandardPipeStructureRisk',this.SimpleData.StandardPipeStructureRisk);
            formData.append('StandardPipeWorkDifficulty',this.SimpleData.StandardPipeWorkDifficulty);
            // 高強管材
            formData.append('HighStrengthPipeCostCost',this.SimpleData.HighStrengthPipeCostCost);
            formData.append('HighStrengthPipeStructureRisk',this.SimpleData.HighStrengthPipeStructureRisk);
            formData.append('HighStrengthPipeWorkDifficulty',this.SimpleData.HighStrengthPipeWorkDifficulty);
            // 耐蝕管材
            formData.append('CorrosionResistantPipeCostCost',this.SimpleData.CorrosionResistantPipeCostCost);
            formData.append('CorrosionResistantPipeStructureRisk',this.SimpleData.CorrosionResistantPipeStructureRisk);
            formData.append('CorrosionResistantPipeWorkDifficulty',this.SimpleData.CorrosionResistantPipeWorkDifficulty);
            // 高強高耐蝕管材
            formData.append('HighStrengthCorrosionResistantPipeCost',this.SimpleData.HighStrengthCorrosionResistantPipeCost);
            formData.append('HighStrengthCorrosionResistantPipeStructureRisk',this.SimpleData.HighStrengthCorrosionResistantPipeStructureRisk);
            formData.append('HighStrengthCorrosionResistantPipeWorkDifficulty',this.SimpleData.HighStrengthCorrosionResistantPipeWorkDifficulty);
            /******** 圓頂形式  ********/
            // 單一圓拱
            formData.append('SingleRoundArchCost',this.SimpleData.SingleRoundArchCost);
            formData.append('SingleRoundArchStructureRisk',this.SimpleData.SingleRoundArchStructureRisk);
            formData.append('SingleRoundArchWorkDifficulty',this.SimpleData.SingleRoundArchWorkDifficulty);
            // 下橫樑
            formData.append('LowerBeamCost',this.SimpleData.LowerBeamCost);
            formData.append('LowerBeamStructureRisk',this.SimpleData.LowerBeamStructureRisk);
            formData.append('LowerBeamWorkDifficulty',this.SimpleData.LowerBeamWorkDifficulty);
            // 上1/3橫梁
            formData.append('UpperOneThreeBeamCost',this.SimpleData.UpperOneThreeBeamCost);
            formData.append('UpperOneThreeBeamStructureRisk',this.SimpleData.UpperOneThreeBeamStructureRisk);
            formData.append('UpperOneThreeBeamWorkDifficulty',this.SimpleData.UpperOneThreeBeamWorkDifficulty);
            // 上二橫梁
            formData.append('UpperSecondBeamCost',this.SimpleData.UpperSecondBeamCost);
            formData.append('UpperSecondBeamStructureRisk',this.SimpleData.UpperSecondBeamStructureRisk);
            formData.append('UpperSecondBeamWorkDifficulty',this.SimpleData.UpperSecondBeamWorkDifficulty);
            // T型樑
            formData.append('TBeamCost',this.SimpleData.TBeamCost);
            formData.append('TBeamStructureRisk',this.SimpleData.TBeamStructureRisk);
            formData.append('TBeamWorkDifficulty',this.SimpleData.TBeamWorkDifficulty);
            // 三支集中樑
            formData.append('ThreeConcentratedBeamsCost',this.SimpleData.ThreeConcentratedBeamsCost);
            formData.append('ThreeConcentratedBeamsStructureRisk',this.SimpleData.ThreeConcentratedBeamsStructureRisk);
            formData.append('ThreeConcentratedBeamsWorkDifficulty',this.SimpleData.ThreeConcentratedBeamsWorkDifficulty);
            // 三支垂支梁
            formData.append('ThreeVerticalBeamsCost',this.SimpleData.ThreeVerticalBeamsCost);
            formData.append('ThreeVerticalBeamsStructureRisk',this.SimpleData.ThreeVerticalBeamsStructureRisk);
            formData.append('ThreeVerticalBeamsWorkDifficulty',this.SimpleData.ThreeVerticalBeamsWorkDifficulty);
            // V型樑
            formData.append('VBeamCost',this.SimpleData.VBeamCost);
            formData.append('VBeamStructureRisk',this.SimpleData.VBeamStructureRisk);
            formData.append('VBeamWorkDifficulty',this.SimpleData.VBeamWorkDifficulty);
            // W型樑
            formData.append('WBeamCost',this.SimpleData.WBeamCost);
            formData.append('WBeamStructureRisk',this.SimpleData.WBeamStructureRisk);
            formData.append('WBeamWorkDifficulty',this.SimpleData.WBeamWorkDifficulty);
            /******** 圓拱距  ********/
            // 1M-1"
            formData.append('oneMoneCost',this.SimpleData.oneMoneCost);
            formData.append('oneMoneStructureRisk',this.SimpleData.oneMoneStructureRisk);
            formData.append('oneMoneWorkDifficulty',this.SimpleData.oneMoneWorkDifficulty);
            // 1M-1-1/4"
            formData.append('oneMone_OneFourCost',this.SimpleData.oneMone_OneFourCost);
            formData.append('oneMone_OneFourStructureRisk',this.SimpleData.oneMone_OneFourStructureRisk);
            formData.append('oneMone_OneFourWorkDifficulty',this.SimpleData.oneMone_OneFourWorkDifficulty);
            // 1M-1-1/2"
            formData.append('oneMone_OneTwoCost',this.SimpleData.oneMone_OneTwoCost);
            formData.append('oneMone_OneTwoStructureRisk',this.SimpleData.oneMone_OneTwoStructureRisk);
            formData.append('oneMone_OneTwoWorkDifficulty',this.SimpleData.oneMone_OneTwoWorkDifficulty);
            // 1.5M-1-1/2"
            formData.append('onefiveMone_OneTwoCost',this.SimpleData.onefiveMone_OneTwoCost);
            formData.append('onefiveMone_OneTwoStructureRisk',this.SimpleData.onefiveMone_OneTwoStructureRisk);
            formData.append('onefiveMone_OneTwoWorkDifficulty',this.SimpleData.onefiveMone_OneTwoWorkDifficulty);
            // 2M-2"
            formData.append('twoMtwoCost',this.SimpleData.twoMtwoCost);
            formData.append('twoMtwoStructureRisk',this.SimpleData.twoMtwoStructureRisk);
            formData.append('twoMtwoWorkDifficulty',this.SimpleData.twoMtwoWorkDifficulty);
            // 0.5M-1"
            formData.append('zerofiveMoneCost',this.SimpleData.zerofiveMoneCost);
            formData.append('zerofiveMoneStructureRisk',this.SimpleData.zerofiveMoneStructureRisk);
            formData.append('zerofiveMoneWorkDifficulty',this.SimpleData.zerofiveMoneWorkDifficulty);
            // 0.5-3/4"
            formData.append('zerofiveMthreefourCost',this.SimpleData.zerofiveMthreefourCost);
            formData.append('zerofiveMthreefourStructureRisk',this.SimpleData.zerofiveMthreefourStructureRisk);
            formData.append('zerofiveMthreefourWorkDifficulty',this.SimpleData.zerofiveMthreefourWorkDifficulty);
            // 0.5-1/2"
            formData.append('zerofiveMonetwoCost',this.SimpleData.zerofiveMonetwoCost);
            formData.append('zerofiveMonetwoStructureRisk',this.SimpleData.zerofiveMonetwoStructureRisk);
            formData.append('zerofiveMonetwoWorkDifficulty',this.SimpleData.zerofiveMonetwoWorkDifficulty);
            /******** 基礎  ********/
            // 直插30cm
            formData.append('thirtycmCost',this.SimpleData.thirtycmCost);
            formData.append('thirtycmStructureRisk',this.SimpleData.thirtycmStructureRisk);
            formData.append('thirtycmWorkDifficulty',this.SimpleData.thirtycmWorkDifficulty);
            // 直插40cm
            formData.append('fourtycmCost',this.SimpleData.fourtycmCost);
            formData.append('fourtycmStructureRisk',this.SimpleData.fourtycmStructureRisk);
            formData.append('fourtycmWorkDifficulty',this.SimpleData.fourtycmWorkDifficulty);
            // 直插50cm
            formData.append('fiftycmCost',this.SimpleData.fiftycmCost);
            formData.append('fiftycmStructureRisk',this.SimpleData.fiftycmStructureRisk);
            formData.append('fiftycmWorkDifficulty',this.SimpleData.fiftycmWorkDifficulty);
            // 直插30cm+地錨
            formData.append('thirtycmPlusCost',this.SimpleData.thirtycmPlusCost);
            formData.append('thirtycmPlusStructureRisk',this.SimpleData.thirtycmPlusStructureRisk);
            formData.append('thirtycmPlusWorkDifficulty',this.SimpleData.thirtycmPlusWorkDifficulty);
            // 直插40cm+地錨
            formData.append('fourtycmPlusCost',this.SimpleData.fourtycmPlusCost);
            formData.append('fourtycmPlusStructureRisk',this.SimpleData.fourtycmPlusStructureRisk);
            formData.append('fourtycmPlusWorkDifficulty',this.SimpleData.fourtycmPlusWorkDifficulty);
            // 直插50cm+地錨
            formData.append('fiftycmPlusCost',this.SimpleData.fiftycmPlusCost);
            formData.append('fiftycmPlusStructureRisk',this.SimpleData.fiftycmPlusStructureRisk);
            formData.append('fiftycmPlusWorkDifficulty',this.SimpleData.fiftycmPlusWorkDifficulty);
            /******** 跨距  ********/
            // 5.4m
            formData.append('FiveFourmCost',this.SimpleData.FiveFourmCost);
            formData.append('FiveFourmStructureRisk',this.SimpleData.FiveFourmStructureRisk);
            formData.append('FiveFourmWorkDifficulty',this.SimpleData.FiveFourmWorkDifficulty);
            // 6m
            formData.append('SixmCost',this.SimpleData.SixmCost);
            formData.append('SixmStructureRisk',this.SimpleData.SixmStructureRisk);
            formData.append('SixmWorkDifficulty',this.SimpleData.SixmWorkDifficulty);
            // 7.2m
            formData.append('SevenmCost',this.SimpleData.SevenmCost);
            formData.append('SevenmStructureRisk',this.SimpleData.SevenmStructureRisk);
            formData.append('SevenmWorkDifficulty',this.SimpleData.SevenmWorkDifficulty);
            // 8m
            formData.append('eightmCost',this.SimpleData.eightmCost);
            formData.append('eightmStructureRisk',this.SimpleData.eightmStructureRisk);
            formData.append('eightmWorkDifficulty',this.SimpleData.eightmWorkDifficulty);
            /******** 肩高  ********/
            // 2m
            formData.append('TwomCost',this.SimpleData.TwomCost);
            formData.append('TwomStructureRisk',this.SimpleData.TwomStructureRisk);
            formData.append('TwomWorkDifficulty',this.SimpleData.TwomWorkDifficulty);
            // 2.5m
            formData.append('TwoFivemCost',this.SimpleData.TwoFivemCost);
            formData.append('TwoFivemStructureRisk',this.SimpleData.TwoFivemStructureRisk);
            formData.append('TwoFivemWorkDifficulty',this.SimpleData.TwoFivemWorkDifficulty);
            // 3m
            formData.append('ThreemCost',this.SimpleData.ThreemCost);
            formData.append('ThreemStructureRisk',this.SimpleData.ThreemStructureRisk);
            formData.append('ThreemWorkDifficulty',this.SimpleData.ThreemWorkDifficulty);
            // 3.5m
            formData.append('ThreeFivemCost',this.SimpleData.ThreeFivemCost);
            formData.append('ThreeFivemStructureRisk',this.SimpleData.ThreeFivemStructureRisk);
            formData.append('ThreeFivemWorkDifficulty',this.SimpleData.ThreeFivemWorkDifficulty);
            // 4m
            formData.append('FourmCost',this.SimpleData.FourmCost);
            formData.append('FourmStructureRisk',this.SimpleData.FourmStructureRisk);
            formData.append('FourmWorkDifficulty',this.SimpleData.FourmWorkDifficulty);
            /******** 長度  ********/
            // 30m
            formData.append('ThirtymCost',this.SimpleData.ThirtymCost);
            formData.append('ThirtymStructureRisk',this.SimpleData.ThirtymStructureRisk);
            formData.append('ThirtymWorkDifficulty',this.SimpleData.ThirtymWorkDifficulty);
            // 60m
            formData.append('SixtymCost',this.SimpleData.SixtymCost);
            formData.append('SixtymStructureRisk',this.SimpleData.SixtymStructureRisk);
            formData.append('SixtymWorkDifficulty',this.SimpleData.SixtymWorkDifficulty);
            // 90m
            formData.append('NinetymCost',this.SimpleData.NinetymCost);
            formData.append('NinetymStructureRisk',this.SimpleData.NinetymStructureRisk);
            formData.append('NinetymWorkDifficulty',this.SimpleData.NinetymWorkDifficulty);
            // 120m
            formData.append('OneHundredTwentymCost',this.SimpleData.OneHundredTwentymCost);
            formData.append('OneHundredTwentymStructureRisk',this.SimpleData.OneHundredTwentymStructureRisk);
            formData.append('OneHundredTwentymWorkDifficulty',this.SimpleData.OneHundredTwentymWorkDifficulty);
            /******** 連續性  ********/
            // 獨棟
            formData.append('DetachedHouseCost',this.SimpleData.DetachedHouseCost);
            formData.append('DetachedHouseStructureRisk',this.SimpleData.DetachedHouseStructureRisk);
            formData.append('DetachedHouseWorkDifficulty',this.SimpleData.DetachedHouseWorkDifficulty);
            // 二連棟
            formData.append('TwoStoryBuildingCost',this.SimpleData.TwoStoryBuildingCost);
            formData.append('TwoStoryBuildingStructureRisk',this.SimpleData.TwoStoryBuildingStructureRisk);
            formData.append('TwoStoryBuildingWorkDifficulty',this.SimpleData.TwoStoryBuildingWorkDifficulty);
            // 三連棟
            formData.append('ThreeStoryCost',this.SimpleData.ThreeStoryCost);
            formData.append('ThreeStoryStructureRisk',this.SimpleData.ThreeStoryStructureRisk);
            formData.append('ThreeStoryWorkDifficulty',this.SimpleData.ThreeStoryWorkDifficulty);
            // 四連棟
            formData.append('FourStoryCost',this.SimpleData.FourStoryCost);
            formData.append('FourStoryStructureRisk',this.SimpleData.FourStoryStructureRisk);
            formData.append('FourStoryWorkDifficulty',this.SimpleData.FourStoryWorkDifficulty);
            /******** 披覆膜  ********/
            // PE
            formData.append('PECost',this.SimpleData.PECost);
            formData.append('PEStructureRisk',this.SimpleData.PEStructureRisk);
            formData.append('PEWorkDifficulty',this.SimpleData.PEWorkDifficulty);
            // PO
            formData.append('POCost',this.SimpleData.POCost);
            formData.append('POStructureRisk',this.SimpleData.POStructureRisk);
            formData.append('POWorkDifficulty',this.SimpleData.POWorkDifficulty);
            // 硬質塑材
            formData.append('RigidPlasticCost',this.SimpleData.RigidPlasticCost);
            formData.append('RigidPlasticStructureRisk',this.SimpleData.RigidPlasticStructureRisk);
            formData.append('RigidPlasticWorkDifficulty',this.SimpleData.RigidPlasticWorkDifficulty);
            // ETFE
            formData.append('ETFECost',this.SimpleData.ETFECost);
            formData.append('ETFEStructureRisk',this.SimpleData.ETFEStructureRisk);
            formData.append('ETFEWorkDifficulty',this.SimpleData.ETFEWorkDifficulty);
            // 玻璃
            formData.append('GlassCost',this.SimpleData.GlassCost);
            formData.append('GlassStructureRisk',this.SimpleData.GlassStructureRisk);
            formData.append('GlassWorkDifficulty',this.SimpleData.GlassWorkDifficulty);
            /******** 各成本比例  ********/
            formData.append('GreenhousePipe',this.SimpleData.GreenhousePipe);   // 溫室管材
            formData.append('DomeForm',this.SimpleData.DomeForm);   // 圓頂形式
            formData.append('ArcDistance',this.SimpleData.ArcDistance);   // 圓拱距
            formData.append('Basis',this.SimpleData.Basis);   // 基礎
            formData.append('Span',this.SimpleData.Span);   // 跨距
            formData.append('ShoulderHeight',this.SimpleData.ShoulderHeight);   // 肩高
            formData.append('Length',this.SimpleData.Length);   // 長度
            formData.append('Continuity',this.SimpleData.Continuity);   // 連續性
            formData.append('CoatedFilm',this.SimpleData.CoatedFilm);   // 披覆膜

            try{
                const response = await SimpleCostAddService.createSimpleCost(formData);
                // 創建成功後，頁面跳轉回 文章知識頁面
                // window.location = '/#/DevelopConstructionCostAnalysisTestment';
                // 創建成功的提示視窗
                this.flashMessage.success({
                    message: '簡易型溫室構造成本參數 資料寫入成功!!',
                    time: 3000
                });

                this.SimpleData = {
                    /******** 溫室管材  ********/
                    // 標準管材
                    StandardPipeCost: null,
                    StandardPipeStructureRisk: null,
                    StandardPipeWorkDifficulty: null,
                    // 高強管材
                    HighStrengthPipeCostCost: null,
                    HighStrengthPipeStructureRisk: null,
                    HighStrengthPipeWorkDifficulty: null,
                    // 耐蝕管材
                    CorrosionResistantPipeCostCost: null,
                    CorrosionResistantPipeStructureRisk: null,
                    CorrosionResistantPipeWorkDifficulty: null,
                    // 高強高耐蝕管材
                    HighStrengthCorrosionResistantPipeCost: null,
                    HighStrengthCorrosionResistantPipeStructureRisk: null,
                    HighStrengthCorrosionResistantPipeWorkDifficulty: null,

                    /******** 圓頂形式  ********/
                    // 單一圓拱
                    SingleRoundArchCost: null,
                    SingleRoundArchStructureRisk: null,
                    SingleRoundArchWorkDifficulty: null,
                    // 下橫樑
                    LowerBeamCost: null,
                    LowerBeamStructureRisk: null,
                    LowerBeamWorkDifficulty: null,
                    // 上1/3橫梁
                    UpperOneThreeBeamCost: null,
                    UpperOneThreeBeamStructureRisk: null,
                    UpperOneThreeBeamWorkDifficulty: null,
                    // 上二橫梁
                    UpperSecondBeamCost: null,
                    UpperSecondBeamStructureRisk: null,
                    UpperSecondBeamWorkDifficulty: null,
                    // T型樑
                    TBeamCost: null,
                    TBeamStructureRisk: null,
                    TBeamWorkDifficulty: null,
                    // 三支集中樑
                    ThreeConcentratedBeamsCost: null,
                    ThreeConcentratedBeamsStructureRisk: null,
                    ThreeConcentratedBeamsWorkDifficulty: null,
                    // 三支垂支梁
                    ThreeVerticalBeamsCost: null,
                    ThreeVerticalBeamsStructureRisk: null,
                    ThreeVerticalBeamsWorkDifficulty: null,
                    // V型樑
                    VBeamCost: null,
                    VBeamStructureRisk: null,
                    VBeamWorkDifficulty: null,
                    // W型樑
                    WBeamCost: null,
                    WBeamStructureRisk: null,
                    WBeamWorkDifficulty: null,

                    /******** 圓拱距  ********/
                    // 1M-1"
                    oneMoneCost: null,
                    oneMoneStructureRisk: null,
                    oneMoneWorkDifficulty: null,
                    // 1M-1-1/4"
                    oneMone_OneFourCost: null,
                    oneMone_OneFourStructureRisk: null,
                    oneMone_OneFourWorkDifficulty: null,
                    // 1M-1-1/2"
                    oneMone_OneTwoCost: null,
                    oneMone_OneTwoStructureRisk: null,
                    oneMone_OneTwoWorkDifficulty: null,
                    // 1.5M-1-1/2"
                    onefiveMone_OneTwoCost: null,
                    onefiveMone_OneTwoStructureRisk: null,
                    onefiveMone_OneTwoWorkDifficulty: null,
                    // 2M-2"
                    twoMtwoCost: null,
                    twoMtwoStructureRisk: null,
                    twoMtwoWorkDifficulty: null,
                    // 0.5M-1"
                    zerofiveMoneCost: null,
                    zerofiveMoneStructureRisk: null,
                    zerofiveMoneWorkDifficulty: null,
                    // 0.5-3/4"
                    zerofiveMthreefourCost: null,
                    zerofiveMthreefourStructureRisk: null,
                    zerofiveMthreefourWorkDifficulty: null,
                    // 0.5-1/2"
                    zerofiveMonetwoCost: null,
                    zerofiveMonetwoStructureRisk: null,
                    zerofiveMonetwoWorkDifficulty: null,

                    /******** 基礎  ********/
                    // 直插30cm
                    thirtycmCost: null,
                    thirtycmStructureRisk: null,
                    thirtycmWorkDifficulty: null,
                    // 直插40cm
                    fourtycmCost: null,
                    fourtycmStructureRisk: null,
                    fourtycmWorkDifficulty: null,
                    // 直插50cm
                    fiftycmCost: null,
                    fiftycmStructureRisk: null,
                    fiftycmWorkDifficulty: null,
                    // 直插30cm+地錨
                    thirtycmPlusCost: null,
                    thirtycmPlusStructureRisk: null,
                    thirtycmPlusWorkDifficulty: null,
                    // 直插40cm+地錨
                    fourtycmPlusCost: null,
                    fourtycmPlusStructureRisk: null,
                    fourtycmPlusWorkDifficulty: null,
                    // 直插50cm+地錨
                    fiftycmPlusCost: null,
                    fiftycmPlusStructureRisk: null,
                    fiftycmPlusWorkDifficulty: null,

                    /******** 跨距  ********/
                    // 5.4m
                    FiveFourmCost: null,
                    FiveFourmStructureRisk: null,
                    FiveFourmWorkDifficulty: null,
                    // 6m
                    SixmCost: null,
                    SixmStructureRisk: null,
                    SixmWorkDifficulty: null,
                    // 7.2m
                    SevenmCost: null,
                    SevenmStructureRisk: null,
                    SevenmWorkDifficulty: null,
                    // 8m
                    eightmCost: null,
                    eightmStructureRisk: null,
                    eightmWorkDifficulty: null,

                    /******** 肩高  ********/
                    // 2m
                    TwomCost: null,
                    TwomStructureRisk: null,
                    TwomWorkDifficulty: null,
                    // 2.5m
                    TwoFivemCost: null,
                    TwoFivemStructureRisk: null,
                    TwoFivemWorkDifficulty: null,
                    // 3m
                    ThreemCost: null,
                    ThreemStructureRisk: null,
                    ThreemWorkDifficulty: null,
                    // 3.5m
                    ThreeFivemCost: null,
                    ThreeFivemStructureRisk: null,
                    ThreeFivemWorkDifficulty: null,
                    // 4m
                    FourmCost: null,
                    FourmStructureRisk: null,
                    FourmWorkDifficulty: null,

                    /******** 長度  ********/
                    // 30m
                    ThirtymCost: null,
                    ThirtymStructureRisk: null,
                    ThirtymWorkDifficulty: null,
                    // 60m
                    SixtymCost: null,
                    SixtymStructureRisk: null,
                    SixtymWorkDifficulty: null,
                    // 90m
                    NinetymCost: null,
                    NinetymStructureRisk: null,
                    NinetymWorkDifficulty: null,
                    // 120m
                    OneHundredTwentymCost: null,
                    OneHundredTwentymStructureRisk: null,
                    OneHundredTwentymWorkDifficulty: null,

                    /******** 連續性  ********/
                    // 獨棟
                    DetachedHouseCost: null,
                    DetachedHouseStructureRisk: null,
                    DetachedHouseWorkDifficulty: null,
                    // 二連棟
                    TwoStoryBuildingCost: null,
                    TwoStoryBuildingStructureRisk: null,
                    TwoStoryBuildingWorkDifficulty: null,
                    // 三連棟
                    ThreeStoryCost: null,
                    ThreeStoryStructureRisk: null,
                    ThreeStoryWorkDifficulty: null,
                    // 四連棟
                    FourStoryCost: null,
                    FourStoryStructureRisk: null,
                    FourStoryWorkDifficulty: null,

                    /******** 披覆膜  ********/
                    // PE
                    PECost: null,
                    PEStructureRisk: null,
                    PEWorkDifficulty: null,
                    // PO
                    POCost: null,
                    POStructureRisk: null,
                    POWorkDifficulty: null,
                    // 硬質塑材
                    RigidPlasticCost: null,
                    RigidPlasticStructureRisk: null,
                    RigidPlasticWorkDifficulty: null,
                    // ETFE
                    ETFECost: null,
                    ETFEStructureRisk: null,
                    ETFEWorkDifficulty: null,
                    // 玻璃
                    GlassCost: null,
                    GlassStructureRisk: null,
                    GlassWorkDifficulty: null,

                    /******** 各成本比例  ********/
                    GreenhousePipe: 20, // 溫室管材
                    DomeForm: 10,       // 圓頂形式
                    ArcDistance: 10,    // 圓拱距
                    Basis: 10,          // 基礎
                    Span: 10,           // 跨距
                    ShoulderHeight: 10, // 肩高
                    Length: 10,         // 長度
                    Continuity: 10,     // 連續性
                    CoatedFilm: 10,     // 披覆膜
                };


            } catch (error){

                switch (error.response.status) {
                    case 422:
                        this.errors = error.response.data.errors;
                        break;
                    default:
                        this.flashMessage.error({
                            message: '簡易型溫室構造成本參數 寫入有錯誤發生!!',
                            time: 5000
                        });
                        break;
                }
            }
        }
    },
}
</script>

