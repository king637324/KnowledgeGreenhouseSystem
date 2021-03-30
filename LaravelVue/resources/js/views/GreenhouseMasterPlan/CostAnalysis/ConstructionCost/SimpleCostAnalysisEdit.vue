<template>
    <div>
        <br>
        <h2>簡易型溫室</h2>
        <hr>
        

        <!-- <v-form v-on:submit.prevent="UpdateSimple" v-model="valid" lazy-validation v-if="$auth.user().identity === '管理者' || $auth.user().identity === '專家'"> -->
        <v-form v-on:submit.prevent="UpdateSimple">
            <div class="d-flex justify-content-around">
                <div class="p-2 bd-highlight">
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.StandardPipeCost">{{ errors.StandardPipeCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.StandardPipeStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.StandardPipeStructureRisk">{{ errors.StandardPipeStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.StandardPipeWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.HighStrengthPipeCostCost">{{ errors.HighStrengthPipeCostCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.HighStrengthPipeStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.HighStrengthPipeStructureRisk">{{ errors.HighStrengthPipeStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.HighStrengthPipeWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.CorrosionResistantPipeCostCost">{{ errors.CorrosionResistantPipeCostCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.CorrosionResistantPipeStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.CorrosionResistantPipeStructureRisk">{{ errors.CorrosionResistantPipeStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.CorrosionResistantPipeWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.HighStrengthCorrosionResistantPipeCost">{{ errors.HighStrengthCorrosionResistantPipeCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.HighStrengthCorrosionResistantPipeStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.HighStrengthCorrosionResistantPipeStructureRisk">{{ errors.HighStrengthCorrosionResistantPipeStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.HighStrengthCorrosionResistantPipeWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.SingleRoundArchCost">{{ errors.SingleRoundArchCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.SingleRoundArchStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.SingleRoundArchStructureRisk">{{ errors.SingleRoundArchStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.SingleRoundArchWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.LowerBeamCost">{{ errors.LowerBeamCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.LowerBeamStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.LowerBeamStructureRisk">{{ errors.LowerBeamStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.LowerBeamWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.UpperOneThreeBeamCost">{{ errors.UpperOneThreeBeamCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.UpperOneThreeBeamStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.UpperOneThreeBeamStructureRisk">{{ errors.UpperOneThreeBeamStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.UpperOneThreeBeamWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.UpperSecondBeamCost">{{ errors.UpperSecondBeamCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.UpperSecondBeamStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.UpperSecondBeamStructureRisk">{{ errors.UpperSecondBeamStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.UpperSecondBeamWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.TBeamCost">{{ errors.TBeamCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.TBeamStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.TBeamStructureRisk">{{ errors.TBeamStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.TBeamWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.ThreeConcentratedBeamsCost">{{ errors.ThreeConcentratedBeamsCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.ThreeConcentratedBeamsStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.ThreeConcentratedBeamsStructureRisk">{{ errors.ThreeConcentratedBeamsStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.ThreeConcentratedBeamsWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.ThreeVerticalBeamsCost">{{ errors.ThreeVerticalBeamsCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.ThreeVerticalBeamsStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.ThreeVerticalBeamsStructureRisk">{{ errors.ThreeVerticalBeamsStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.ThreeVerticalBeamsWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.VBeamCost">{{ errors.VBeamCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.VBeamStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.VBeamStructureRisk">{{ errors.VBeamStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.VBeamWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.WBeamCost">{{ errors.WBeamCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.WBeamStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.WBeamStructureRisk">{{ errors.WBeamStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.WBeamWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.oneMoneCost">{{ errors.oneMoneCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.oneMoneStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.oneMoneStructureRisk">{{ errors.oneMoneStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.oneMoneWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.oneMone_OneFourCost">{{ errors.oneMone_OneFourCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.oneMone_OneFourStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.oneMone_OneFourStructureRisk">{{ errors.oneMone_OneFourStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.oneMone_OneFourWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.oneMone_OneTwoCost">{{ errors.oneMone_OneTwoCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.oneMone_OneTwoStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.oneMone_OneTwoStructureRisk">{{ errors.oneMone_OneTwoStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.oneMone_OneTwoWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.onefiveMone_OneTwoCost">{{ errors.onefiveMone_OneTwoCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.onefiveMone_OneTwoStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.onefiveMone_OneTwoStructureRisk">{{ errors.onefiveMone_OneTwoStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.onefiveMone_OneTwoWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.twoMtwoCost">{{ errors.twoMtwoCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.twoMtwoStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.twoMtwoStructureRisk">{{ errors.twoMtwoStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.twoMtwoWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.zerofiveMoneCost">{{ errors.zerofiveMoneCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.zerofiveMoneStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.zerofiveMoneStructureRisk">{{ errors.zerofiveMoneStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.zerofiveMoneWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.zerofiveMthreefourCost">{{ errors.zerofiveMthreefourCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.zerofiveMthreefourStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.zerofiveMthreefourStructureRisk">{{ errors.zerofiveMthreefourStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.zerofiveMthreefourWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.zerofiveMonetwoCost">{{ errors.zerofiveMonetwoCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.zerofiveMonetwoStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.zerofiveMonetwoStructureRisk">{{ errors.zerofiveMonetwoStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.zerofiveMonetwoWorkDifficulty"
                                    :rules="SimpleRules"
                                    label="請輸入作業難度參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.zerofiveMonetwoWorkDifficulty">{{ errors.zerofiveMonetwoWorkDifficulty[0] }}</div>
                            </td>
                        </tr>
                    </table>
                    <hr>
                </div>
                <div class="p-2 bd-highlight">
                    
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.FiveFourmCost">{{ errors.FiveFourmCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.FiveFourmStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.FiveFourmStructureRisk">{{ errors.FiveFourmStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.FiveFourmWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.SixmCost">{{ errors.SixmCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.SixmStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.SixmStructureRisk">{{ errors.SixmStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.SixmWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.SevenmCost">{{ errors.SevenmCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.SevenmStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.SevenmStructureRisk">{{ errors.SevenmStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.SevenmWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.eightmCost">{{ errors.eightmCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.eightmStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.eightmStructureRisk">{{ errors.eightmStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.eightmWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.TwomCost">{{ errors.TwomCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.TwomStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.TwomStructureRisk">{{ errors.TwomStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.TwomWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.TwoFivemCost">{{ errors.TwoFivemCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.TwoFivemStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.TwoFivemStructureRisk">{{ errors.TwoFivemStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.TwoFivemWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.ThreemCost">{{ errors.ThreemCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.ThreemStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.ThreemStructureRisk">{{ errors.ThreemStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.ThreemWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.ThreeFivemCost">{{ errors.ThreeFivemCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.ThreeFivemStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.ThreeFivemStructureRisk">{{ errors.ThreeFivemStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.ThreeFivemWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.FourmCost">{{ errors.FourmCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.FourmStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.FourmStructureRisk">{{ errors.FourmStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.FourmWorkDifficulty"
                                    :rules="SimpleRules"
                                    label="請輸入作業難度參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.FourmWorkDifficulty">{{ errors.FourmWorkDifficulty[0] }}</div>
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.thirtycmCost">{{ errors.thirtycmCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.thirtycmStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.thirtycmStructureRisk">{{ errors.thirtycmStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.thirtycmWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.fourtycmCost">{{ errors.fourtycmCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.fourtycmStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.fourtycmStructureRisk">{{ errors.fourtycmStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.fourtycmWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.fiftycmCost">{{ errors.fiftycmCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.fiftycmStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.fiftycmStructureRisk">{{ errors.fiftycmStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.fiftycmWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.thirtycmPlusCost">{{ errors.thirtycmPlusCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.thirtycmPlusStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.thirtycmPlusStructureRisk">{{ errors.thirtycmPlusStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.thirtycmPlusWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.fourtycmPlusCost">{{ errors.fourtycmPlusCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.fourtycmPlusStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.fourtycmPlusStructureRisk">{{ errors.fourtycmPlusStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.fourtycmPlusWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.fiftycmPlusCost">{{ errors.fiftycmPlusCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.fiftycmPlusStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.fiftycmPlusStructureRisk">{{ errors.fiftycmPlusStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.fiftycmPlusWorkDifficulty"
                                    :rules="SimpleRules"
                                    label="請輸入作業難度參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.fiftycmPlusWorkDifficulty">{{ errors.fiftycmPlusWorkDifficulty[0] }}</div>
                            </td>
                        </tr>
                    </table>
                    <hr>
                    
                </div>
                <div class="p-2 bd-highlight">
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.ThirtymCost">{{ errors.ThirtymCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.ThirtymStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.ThirtymStructureRisk">{{ errors.ThirtymStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.ThirtymWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.SixtymCost">{{ errors.SixtymCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.SixtymStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.SixtymStructureRisk">{{ errors.SixtymStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.SixtymWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.NinetymCost">{{ errors.NinetymCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.NinetymStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.NinetymStructureRisk">{{ errors.NinetymStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.NinetymWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.OneHundredTwentymCost">{{ errors.OneHundredTwentymCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.OneHundredTwentymStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.OneHundredTwentymStructureRisk">{{ errors.OneHundredTwentymStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.OneHundredTwentymWorkDifficulty"
                                    :rules="SimpleRules"
                                    label="請輸入作業難度參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.OneHundredTwentymWorkDifficulty">{{ errors.OneHundredTwentymWorkDifficulty[0] }}</div>
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.PECost">{{ errors.PECost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.PEStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.PEStructureRisk">{{ errors.PEStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.PEWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.POCost">{{ errors.POCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.POStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.POStructureRisk">{{ errors.POStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.POWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.RigidPlasticCost">{{ errors.RigidPlasticCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.RigidPlasticStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.RigidPlasticStructureRisk">{{ errors.RigidPlasticStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.RigidPlasticWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.ETFECost">{{ errors.ETFECost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.ETFEStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.ETFEStructureRisk">{{ errors.ETFEStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.ETFEWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.GlassCost">{{ errors.GlassCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.GlassStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.GlassStructureRisk">{{ errors.GlassStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.GlassWorkDifficulty"
                                    :rules="SimpleRules"
                                    label="請輸入作業難度參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.GlassWorkDifficulty">{{ errors.GlassWorkDifficulty[0] }}</div>
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.DetachedHouseCost">{{ errors.DetachedHouseCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.DetachedHouseStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.DetachedHouseStructureRisk">{{ errors.DetachedHouseStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.DetachedHouseWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.TwoStoryBuildingCost">{{ errors.TwoStoryBuildingCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.TwoStoryBuildingStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.TwoStoryBuildingStructureRisk">{{ errors.TwoStoryBuildingStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.TwoStoryBuildingWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.ThreeStoryCost">{{ errors.ThreeStoryCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.ThreeStoryStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.ThreeStoryStructureRisk">{{ errors.ThreeStoryStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.ThreeStoryWorkDifficulty"
                                    :rules="SimpleRules"
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
                                    :rules="SimpleRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.FourStoryCost">{{ errors.FourStoryCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.FourStoryStructureRisk"
                                    :rules="SimpleRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.FourStoryStructureRisk">{{ errors.FourStoryStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="SimpleData.FourStoryWorkDifficulty"
                                    :rules="SimpleRules"
                                    label="請輸入作業難度參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.FourStoryWorkDifficulty">{{ errors.FourStoryWorkDifficulty[0] }}</div>
                            </td>
                        </tr>
                    </table>
                    <hr>
                    
                </div>
            </div>
            
            <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">各結構材料成本比例</span></p>
            <table class="table" align="center" style="border:1px solid #dee2e6;" border='1'>
                <thead align="center" class="table-active">
                    <tr>
                        <td style="width: 15vmin">項目</td>
                        <td style="width: 15vmin">成本比例(%)</td>
                        <td style="width: 15vmin">結構風險比例(%)</td>
                        <td style="width: 15vmin">作業難度比例(%)</td>
                    </tr>
                </thead>
                <tr align="center">
                    <td style="width: 15vmin">溫室管材</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.GreenhousePipeCost"
                            :rules="SimpleRules"
                            label="請輸入成本比例(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.GreenhousePipeCost">{{ errors.GreenhousePipeCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.GreenhousePipeStructuralRisk"
                            :rules="SimpleRules"
                            label="請輸入結構風險比例(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.GreenhousePipeStructuralRisk">{{ errors.GreenhousePipeStructuralRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.GreenhousePipeJobDifficulty"
                            :rules="SimpleRules"
                            label="請輸入作業難度比例(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.GreenhousePipeJobDifficulty">{{ errors.GreenhousePipeJobDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">圓頂形式</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.DomeFormCost"
                            :rules="SimpleRules"
                            label="請輸入成本比例(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.DomeFormCost">{{ errors.DomeFormCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.DomeFormStructuralRisk"
                            :rules="SimpleRules"
                            label="請輸入結構風險比例(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.DomeFormStructuralRisk">{{ errors.DomeFormStructuralRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.DomeFormJobDifficulty"
                            :rules="SimpleRules"
                            label="請輸入作業難度比例(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.DomeFormJobDifficulty">{{ errors.DomeFormJobDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">圓拱距</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.ArcDistanceCost"
                            :rules="SimpleRules"
                            label="請輸入成本比例(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.ArcDistanceCost">{{ errors.ArcDistanceCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.ArcDistanceStructuralRisk"
                            :rules="SimpleRules"
                            label="請輸入結構風險比例(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.ArcDistanceStructuralRisk">{{ errors.ArcDistanceStructuralRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.ArcDistanceJobDifficulty"
                            :rules="SimpleRules"
                            label="請輸入作業難度比例(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.ArcDistanceJobDifficulty">{{ errors.ArcDistanceJobDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">基礎</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.BasisCost"
                            :rules="SimpleRules"
                            label="請輸入成本比例(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.BasisCost">{{ errors.BasisCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.BasisStructuralRisk"
                            :rules="SimpleRules"
                            label="請輸入結構風險比例(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.BasisStructuralRisk">{{ errors.BasisStructuralRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.BasisJobDifficulty"
                            :rules="SimpleRules"
                            label="請輸入作業難度比例(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.BasisJobDifficulty">{{ errors.BasisJobDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">跨距</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.SpanCost"
                            :rules="SimpleRules"
                            label="請輸入成本比例(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.SpanCost">{{ errors.SpanCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.SpanStructuralRisk"
                            :rules="SimpleRules"
                            label="請輸入結構風險比例(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.SpanStructuralRisk">{{ errors.SpanStructuralRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.SpanJobDifficulty"
                            :rules="SimpleRules"
                            label="請輸入作業難度比例(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.SpanJobDifficulty">{{ errors.SpanJobDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">肩高</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.ShoulderHeightCost"
                            :rules="SimpleRules"
                            label="請輸入成本比例(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.ShoulderHeightCost">{{ errors.ShoulderHeightCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.ShoulderHeightStructuralRisk"
                            :rules="SimpleRules"
                            label="請輸入結構風險比例(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.ShoulderHeightStructuralRisk">{{ errors.ShoulderHeightStructuralRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.ShoulderHeightJobDifficulty"
                            :rules="SimpleRules"
                            label="請輸入作業難度比例(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.ShoulderHeightJobDifficulty">{{ errors.ShoulderHeightJobDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">長度</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.LengthCost"
                            :rules="SimpleRules"
                            label="請輸入成本比例(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.LengthCost">{{ errors.LengthCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.LengthStructuralRisk"
                            :rules="SimpleRules"
                            label="請輸入結構風險比例(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.LengthStructuralRisk">{{ errors.LengthStructuralRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.LengthJobDifficulty"
                            :rules="SimpleRules"
                            label="請輸入作業難度比例(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.LengthJobDifficulty">{{ errors.LengthJobDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">連續性</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.ContinuityCost"
                            :rules="SimpleRules"
                            label="請輸入成本比例(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.ContinuityCost">{{ errors.ContinuityCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.ContinuityStructuralRisk"
                            :rules="SimpleRules"
                            label="請輸入結構風險比例(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.ContinuityStructuralRisk">{{ errors.ContinuityStructuralRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.ContinuityJobDifficulty"
                            :rules="SimpleRules"
                            label="請輸入作業難度比例(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.ContinuityJobDifficulty">{{ errors.ContinuityJobDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">披覆膜</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.CoatedFilmCost"
                            :rules="SimpleRules"
                            label="請輸入成本比例(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.CoatedFilmCost">{{ errors.CoatedFilmCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.CoatedFilmStructuralRisk"
                            :rules="SimpleRules"
                            label="請輸入結構風險比例(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.CoatedFilmStructuralRisk">{{ errors.CoatedFilmStructuralRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="SimpleData.CoatedFilmJobDifficulty"
                            :rules="SimpleRules"
                            label="請輸入作業難度比例(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.CoatedFilmJobDifficulty">{{ errors.CoatedFilmJobDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin"></td>
                    <td style="width: 15vmin">{{proportiontotoalCost}} %</td>
                    <td style="width: 15vmin">{{proportiontotoalStructuralRisk}} %</td>
                    <td style="width: 15vmin">{{proportiontotoalJobDifficulty}} %</td>
                </tr>
            </table>
            <hr>

            <div class="text-right">
                <button type="submit" class="btn btn-primary"><span class="fa fa-check"></span>確認修改</button>
            </div>

        </v-form>
    </div>

</template>

<script>
import * as SimpleCostAddService from '../../../../services/SimpleCost_service';

export default {
    data() {
        return {
            SimpleRules: [
                v => !!v || '必填',
            ],
            EditSimpleData:{

            },
            SimpleData:{
                id: null,
                Expert: null,
                /******** 溫室管材  ********/
                // 標準管材
                StandardPipeCost: '',
                StandardPipeStructureRisk: '',
                StandardPipeWorkDifficulty: '',
                // 高強管材
                HighStrengthPipeCostCost: '',
                HighStrengthPipeStructureRisk: '',
                HighStrengthPipeWorkDifficulty: '',
                // 耐蝕管材
                CorrosionResistantPipeCostCost: '',
                CorrosionResistantPipeStructureRisk: '',
                CorrosionResistantPipeWorkDifficulty: '',
                // 高強高耐蝕管材
                HighStrengthCorrosionResistantPipeCost: '',
                HighStrengthCorrosionResistantPipeStructureRisk: '',
                HighStrengthCorrosionResistantPipeWorkDifficulty: '',

                /******** 圓頂形式  ********/
                // 單一圓拱
                SingleRoundArchCost: '',
                SingleRoundArchStructureRisk: '',
                SingleRoundArchWorkDifficulty: '',
                // 下橫樑
                LowerBeamCost: '',
                LowerBeamStructureRisk: '',
                LowerBeamWorkDifficulty: '',
                // 上1/3橫梁
                UpperOneThreeBeamCost: '',
                UpperOneThreeBeamStructureRisk: '',
                UpperOneThreeBeamWorkDifficulty: '',
                // 上二橫梁
                UpperSecondBeamCost: '',
                UpperSecondBeamStructureRisk: '',
                UpperSecondBeamWorkDifficulty: '',
                // T型樑
                TBeamCost: '',
                TBeamStructureRisk: '',
                TBeamWorkDifficulty: '',
                // 三支集中樑
                ThreeConcentratedBeamsCost: '',
                ThreeConcentratedBeamsStructureRisk: '',
                ThreeConcentratedBeamsWorkDifficulty: '',
                // 三支垂支梁
                ThreeVerticalBeamsCost: '',
                ThreeVerticalBeamsStructureRisk: '',
                ThreeVerticalBeamsWorkDifficulty: '',
                // V型樑
                VBeamCost: '',
                VBeamStructureRisk: '',
                VBeamWorkDifficulty: '',
                // W型樑
                WBeamCost: '',
                WBeamStructureRisk: '',
                WBeamWorkDifficulty: '',

                /******** 圓拱距  ********/
                // 1M-1"
                oneMoneCost: '',
                oneMoneStructureRisk: '',
                oneMoneWorkDifficulty: '',
                // 1M-1-1/4"
                oneMone_OneFourCost: '',
                oneMone_OneFourStructureRisk: '',
                oneMone_OneFourWorkDifficulty: '',
                // 1M-1-1/2"
                oneMone_OneTwoCost: '',
                oneMone_OneTwoStructureRisk: '',
                oneMone_OneTwoWorkDifficulty: '',
                // 1.5M-1-1/2"
                onefiveMone_OneTwoCost: '',
                onefiveMone_OneTwoStructureRisk: '',
                onefiveMone_OneTwoWorkDifficulty: '',
                // 2M-2"
                twoMtwoCost: '',
                twoMtwoStructureRisk: '',
                twoMtwoWorkDifficulty: '',
                // 0.5M-1"
                zerofiveMoneCost: '',
                zerofiveMoneStructureRisk: '',
                zerofiveMoneWorkDifficulty: '',
                // 0.5-3/4"
                zerofiveMthreefourCost: '',
                zerofiveMthreefourStructureRisk: '',
                zerofiveMthreefourWorkDifficulty: '',
                // 0.5-1/2"
                zerofiveMonetwoCost: '',
                zerofiveMonetwoStructureRisk: '',
                zerofiveMonetwoWorkDifficulty: '',

                /******** 基礎  ********/
                // 直插30cm
                thirtycmCost: '',
                thirtycmStructureRisk: '',
                thirtycmWorkDifficulty: '',
                // 直插40cm
                fourtycmCost: '',
                fourtycmStructureRisk: '',
                fourtycmWorkDifficulty: '',
                // 直插50cm
                fiftycmCost: '',
                fiftycmStructureRisk: '',
                fiftycmWorkDifficulty: '',
                // 直插30cm+地錨
                thirtycmPlusCost: '',
                thirtycmPlusStructureRisk: '',
                thirtycmPlusWorkDifficulty: '',
                // 直插40cm+地錨
                fourtycmPlusCost: '',
                fourtycmPlusStructureRisk: '',
                fourtycmPlusWorkDifficulty: '',
                // 直插50cm+地錨
                fiftycmPlusCost: '',
                fiftycmPlusStructureRisk: '',
                fiftycmPlusWorkDifficulty: '',

                /******** 跨距  ********/
                // 5.4m
                FiveFourmCost: '',
                FiveFourmStructureRisk: '',
                FiveFourmWorkDifficulty: '',
                // 6m
                SixmCost: '',
                SixmStructureRisk: '',
                SixmWorkDifficulty: '',
                // 7.2m
                SevenmCost: '',
                SevenmStructureRisk: '',
                SevenmWorkDifficulty: '',
                // 8m
                eightmCost: '',
                eightmStructureRisk: '',
                eightmWorkDifficulty: '',

                /******** 肩高  ********/
                // 2m
                TwomCost: '',
                TwomStructureRisk: '',
                TwomWorkDifficulty: '',
                // 2.5m
                TwoFivemCost: '',
                TwoFivemStructureRisk: '',
                TwoFivemWorkDifficulty: '',
                // 3m
                ThreemCost: '',
                ThreemStructureRisk: '',
                ThreemWorkDifficulty: '',
                // 3.5m
                ThreeFivemCost: '',
                ThreeFivemStructureRisk: '',
                ThreeFivemWorkDifficulty: '',
                // 4m
                FourmCost: '',
                FourmStructureRisk: '',
                FourmWorkDifficulty: '',

                /******** 長度  ********/
                // 30m
                ThirtymCost: '',
                ThirtymStructureRisk: '',
                ThirtymWorkDifficulty: '',
                // 60m
                SixtymCost: '',
                SixtymStructureRisk: '',
                SixtymWorkDifficulty: '',
                // 90m
                NinetymCost: '',
                NinetymStructureRisk: '',
                NinetymWorkDifficulty: '',
                // 120m
                OneHundredTwentymCost: '',
                OneHundredTwentymStructureRisk: '',
                OneHundredTwentymWorkDifficulty: '',

                /******** 連續性  ********/
                // 獨棟
                DetachedHouseCost: '',
                DetachedHouseStructureRisk: '',
                DetachedHouseWorkDifficulty: '',
                // 二連棟
                TwoStoryBuildingCost: '',
                TwoStoryBuildingStructureRisk: '',
                TwoStoryBuildingWorkDifficulty: '',
                // 三連棟
                ThreeStoryCost: '',
                ThreeStoryStructureRisk: '',
                ThreeStoryWorkDifficulty: '',
                // 四連棟
                FourStoryCost: '',
                FourStoryStructureRisk: '',
                FourStoryWorkDifficulty: '',

                /******** 披覆膜  ********/
                // PE
                PECost: '',
                PEStructureRisk: '',
                PEWorkDifficulty: '',
                // PO
                POCost: '',
                POStructureRisk: '',
                POWorkDifficulty: '',
                // 硬質塑材
                RigidPlasticCost: '',
                RigidPlasticStructureRisk: '',
                RigidPlasticWorkDifficulty: '',
                // ETFE
                ETFECost: '',
                ETFEStructureRisk: '',
                ETFEWorkDifficulty: '',
                // 玻璃
                GlassCost: '',
                GlassStructureRisk: '',
                GlassWorkDifficulty: '',
                
                /******** 各成本比例  ********/
                // 溫室管材
                GreenhousePipeCost: '',
                GreenhousePipeStructuralRisk: '',
                GreenhousePipeJobDifficulty: '',
                // 圓頂形式
                DomeFormCost: '',
                DomeFormStructuralRisk: '',
                DomeFormJobDifficulty: '',
                // 圓拱距
                ArcDistanceCost: '',
                ArcDistanceStructuralRisk: '',
                ArcDistanceJobDifficulty: '',
                // 基礎
                BasisCost: '',
                BasisStructuralRisk: '',
                BasisJobDifficulty: '',
                // 跨距
                SpanCost: '',
                SpanStructuralRisk: '',
                SpanJobDifficulty: '',
                // 肩高
                ShoulderHeightCost: '',
                ShoulderHeightStructuralRisk: '',
                ShoulderHeightJobDifficulty: '',
                // 長度
                LengthCost: '',
                LengthStructuralRisk: '',
                LengthJobDifficulty: '',
                // 連續性
                ContinuityCost: '',
                ContinuityStructuralRisk: '',
                ContinuityJobDifficulty: '',
                // 披覆膜
                CoatedFilmCost: '',
                CoatedFilmStructuralRisk: '',
                CoatedFilmJobDifficulty: '',
            },
            errors:{

            },
            proportiontotoalCost: '',
            proportiontotoalStructuralRisk: '',
            proportiontotoalJobDifficulty: '',
        }
    },
    created:function(){  // 網頁載入時，一開始就載入
        // this.$auth.user();
        // console.log(this.$auth.user()); // 可以取得使用者資料
        // 如果帳號有登入，才能顯示他的id帳號
        if(this.$auth.check()){
            this.SimpleData.Expert = this.$auth.user().id;
        }

        // this.$route.params.id
        // console.log("-----this.$route.params.id-----");
        // console.log(this.$route.params.id);
        this.getJson();

    },
    methods: {
        async getJson(){    // 取得所有變數的值
            // 簡易型各建構項目比例
            const SimpleCostratios = await fetch('/SimpleCostRatioJSON',  {
                method: 'GET',
            });
            this.SimpleCostratiosJSON = await SimpleCostratios.json();
            for(var i = 0 ; i < this.SimpleCostratiosJSON.length ; i++){
                if(this.SimpleCostratiosJSON[i].Expert == this.$route.params.id){
                    if(this.SimpleCostratiosJSON[i].BuildItem == '溫室管材'){
                        this.SimpleData.GreenhousePipeCost = this.SimpleCostratiosJSON[i].Cost;
                        this.SimpleData.GreenhousePipeStructuralRisk = this.SimpleCostratiosJSON[i].StructuralRisk;
                        this.SimpleData.GreenhousePipeJobDifficulty = this.SimpleCostratiosJSON[i].JobDifficulty;
                    }else if(this.SimpleCostratiosJSON[i].BuildItem == '圓頂形式'){
                        this.SimpleData.DomeFormCost = this.SimpleCostratiosJSON[i].Cost;
                        this.SimpleData.DomeFormStructuralRisk = this.SimpleCostratiosJSON[i].StructuralRisk;
                        this.SimpleData.DomeFormJobDifficulty = this.SimpleCostratiosJSON[i].JobDifficulty;
                    }else if(this.SimpleCostratiosJSON[i].BuildItem == '圓拱距'){
                        this.SimpleData.ArcDistanceCost = this.SimpleCostratiosJSON[i].Cost;
                        this.SimpleData.ArcDistanceStructuralRisk = this.SimpleCostratiosJSON[i].StructuralRisk;
                        this.SimpleData.ArcDistanceJobDifficulty = this.SimpleCostratiosJSON[i].JobDifficulty;
                    }else if(this.SimpleCostratiosJSON[i].BuildItem == '基礎'){
                        this.SimpleData.BasisCost = this.SimpleCostratiosJSON[i].Cost;
                        this.SimpleData.BasisStructuralRisk = this.SimpleCostratiosJSON[i].StructuralRisk;
                        this.SimpleData.BasisJobDifficulty = this.SimpleCostratiosJSON[i].JobDifficulty;
                    }else if(this.SimpleCostratiosJSON[i].BuildItem == '跨距'){
                        this.SimpleData.SpanCost = this.SimpleCostratiosJSON[i].Cost;
                        this.SimpleData.SpanStructuralRisk = this.SimpleCostratiosJSON[i].StructuralRisk;
                        this.SimpleData.SpanJobDifficulty = this.SimpleCostratiosJSON[i].JobDifficulty;
                    }else if(this.SimpleCostratiosJSON[i].BuildItem == '肩高'){
                        this.SimpleData.ShoulderHeightCost = this.SimpleCostratiosJSON[i].Cost;
                        this.SimpleData.ShoulderHeightStructuralRisk = this.SimpleCostratiosJSON[i].StructuralRisk;
                        this.SimpleData.ShoulderHeightJobDifficulty = this.SimpleCostratiosJSON[i].JobDifficulty;
                    }else if(this.SimpleCostratiosJSON[i].BuildItem == '長度'){
                        this.SimpleData.LengthCost = this.SimpleCostratiosJSON[i].Cost;
                        this.SimpleData.LengthStructuralRisk = this.SimpleCostratiosJSON[i].StructuralRisk;
                        this.SimpleData.LengthJobDifficulty = this.SimpleCostratiosJSON[i].JobDifficulty;
                    }else if(this.SimpleCostratiosJSON[i].BuildItem == '連續性'){
                        this.SimpleData.ContinuityCost = this.SimpleCostratiosJSON[i].Cost;
                        this.SimpleData.ContinuityStructuralRisk = this.SimpleCostratiosJSON[i].StructuralRisk;
                        this.SimpleData.ContinuityJobDifficulty = this.SimpleCostratiosJSON[i].JobDifficulty;
                    }else if(this.SimpleCostratiosJSON[i].BuildItem == '披覆膜'){
                        this.SimpleData.CoatedFilmCost = this.SimpleCostratiosJSON[i].Cost;
                        this.SimpleData.CoatedFilmStructuralRisk = this.SimpleCostratiosJSON[i].StructuralRisk;
                        this.SimpleData.CoatedFilmJobDifficulty = this.SimpleCostratiosJSON[i].JobDifficulty;
                    }
                }
            }

            // 簡易型圓拱距
            const SimpleCircularArchDistances = await fetch('/SimpleCircularArchDistanceJSON',  {
                method: 'GET',
            });
            this.SimpleCircularArchDistancesJSON = await SimpleCircularArchDistances.json();
            for(var i = 0 ; i < this.SimpleCircularArchDistancesJSON.length ; i++){
                if(this.SimpleCircularArchDistancesJSON[i].Expert == this.$route.params.id){
                    if(this.SimpleCircularArchDistancesJSON[i].BuildItem == '1M-1"'){
                        this.SimpleData.oneMoneCost = this.SimpleCircularArchDistancesJSON[i].Cost;
                        this.SimpleData.oneMoneStructureRisk = this.SimpleCircularArchDistancesJSON[i].StructuralRisk;
                        this.SimpleData.oneMoneWorkDifficulty = this.SimpleCircularArchDistancesJSON[i].JobDifficulty;
                    }else if(this.SimpleCircularArchDistancesJSON[i].BuildItem == '1M-1-1/4"'){
                        this.SimpleData.oneMone_OneFourCost = this.SimpleCircularArchDistancesJSON[i].Cost;
                        this.SimpleData.oneMone_OneFourStructureRisk = this.SimpleCircularArchDistancesJSON[i].StructuralRisk;
                        this.SimpleData.oneMone_OneFourWorkDifficulty = this.SimpleCircularArchDistancesJSON[i].JobDifficulty;
                    }else if(this.SimpleCircularArchDistancesJSON[i].BuildItem == '1M-1-1/2"'){
                        this.SimpleData.oneMone_OneTwoCost = this.SimpleCircularArchDistancesJSON[i].Cost;
                        this.SimpleData.oneMone_OneTwoStructureRisk = this.SimpleCircularArchDistancesJSON[i].StructuralRisk;
                        this.SimpleData.oneMone_OneTwoWorkDifficulty = this.SimpleCircularArchDistancesJSON[i].JobDifficulty;
                    }else if(this.SimpleCircularArchDistancesJSON[i].BuildItem == '1.5M-1-1/2"'){
                        this.SimpleData.onefiveMone_OneTwoCost = this.SimpleCircularArchDistancesJSON[i].Cost;
                        this.SimpleData.onefiveMone_OneTwoStructureRisk = this.SimpleCircularArchDistancesJSON[i].StructuralRisk;
                        this.SimpleData.onefiveMone_OneTwoWorkDifficulty = this.SimpleCircularArchDistancesJSON[i].JobDifficulty;
                    }else if(this.SimpleCircularArchDistancesJSON[i].BuildItem == '2M-2"'){
                        this.SimpleData.twoMtwoCost = this.SimpleCircularArchDistancesJSON[i].Cost;
                        this.SimpleData.twoMtwoStructureRisk = this.SimpleCircularArchDistancesJSON[i].StructuralRisk;
                        this.SimpleData.twoMtwoWorkDifficulty = this.SimpleCircularArchDistancesJSON[i].JobDifficulty;
                    }else if(this.SimpleCircularArchDistancesJSON[i].BuildItem == '0.5M-1"'){
                        this.SimpleData.zerofiveMoneCost = this.SimpleCircularArchDistancesJSON[i].Cost;
                        this.SimpleData.zerofiveMoneStructureRisk = this.SimpleCircularArchDistancesJSON[i].StructuralRisk;
                        this.SimpleData.zerofiveMoneWorkDifficulty = this.SimpleCircularArchDistancesJSON[i].JobDifficulty;
                    }else if(this.SimpleCircularArchDistancesJSON[i].BuildItem == '0.5-3/4"'){
                        this.SimpleData.zerofiveMthreefourCost = this.SimpleCircularArchDistancesJSON[i].Cost;
                        this.SimpleData.zerofiveMthreefourStructureRisk = this.SimpleCircularArchDistancesJSON[i].StructuralRisk;
                        this.SimpleData.zerofiveMthreefourWorkDifficulty = this.SimpleCircularArchDistancesJSON[i].JobDifficulty;
                    }else if(this.SimpleCircularArchDistancesJSON[i].BuildItem == '0.5-1/2"'){
                        this.SimpleData.zerofiveMonetwoCost = this.SimpleCircularArchDistancesJSON[i].Cost;
                        this.SimpleData.zerofiveMonetwoStructureRisk = this.SimpleCircularArchDistancesJSON[i].StructuralRisk;
                        this.SimpleData.zerofiveMonetwoWorkDifficulty = this.SimpleCircularArchDistancesJSON[i].JobDifficulty;
                    }
                }
            }
            
            // 簡易型披覆膜
            const SimpleCoatingFilms = await fetch('/SimpleCoatingFilmJSON',  {
                method: 'GET',
            });
            this.SimpleCoatingFilmsJSON = await SimpleCoatingFilms.json();
            for(var i = 0 ; i < this.SimpleCoatingFilmsJSON.length ; i++){
                if(this.SimpleCoatingFilmsJSON[i].Expert == this.$route.params.id){
                    if(this.SimpleCoatingFilmsJSON[i].BuildItem == 'PE'){
                        this.SimpleData.PECost = this.SimpleCoatingFilmsJSON[i].Cost;
                        this.SimpleData.PEStructureRisk = this.SimpleCoatingFilmsJSON[i].StructuralRisk;
                        this.SimpleData.PEWorkDifficulty = this.SimpleCoatingFilmsJSON[i].JobDifficulty;
                    }else if(this.SimpleCoatingFilmsJSON[i].BuildItem == 'PO'){
                        this.SimpleData.POCost = this.SimpleCoatingFilmsJSON[i].Cost;
                        this.SimpleData.POStructureRisk = this.SimpleCoatingFilmsJSON[i].StructuralRisk;
                        this.SimpleData.POWorkDifficulty = this.SimpleCoatingFilmsJSON[i].JobDifficulty;
                    }else if(this.SimpleCoatingFilmsJSON[i].BuildItem == '硬質塑材'){
                        this.SimpleData.RigidPlasticCost = this.SimpleCoatingFilmsJSON[i].Cost;
                        this.SimpleData.RigidPlasticStructureRisk = this.SimpleCoatingFilmsJSON[i].StructuralRisk;
                        this.SimpleData.RigidPlasticWorkDifficulty = this.SimpleCoatingFilmsJSON[i].JobDifficulty;
                    }else if(this.SimpleCoatingFilmsJSON[i].BuildItem == 'ETFE'){
                        this.SimpleData.ETFECost = this.SimpleCoatingFilmsJSON[i].Cost;
                        this.SimpleData.ETFEStructureRisk = this.SimpleCoatingFilmsJSON[i].StructuralRisk;
                        this.SimpleData.ETFEWorkDifficulty = this.SimpleCoatingFilmsJSON[i].JobDifficulty;
                    }else if(this.SimpleCoatingFilmsJSON[i].BuildItem == '玻璃'){
                        this.SimpleData.GlassCost = this.SimpleCoatingFilmsJSON[i].Cost;
                        this.SimpleData.GlassStructureRisk = this.SimpleCoatingFilmsJSON[i].StructuralRisk;
                        this.SimpleData.GlassWorkDifficulty = this.SimpleCoatingFilmsJSON[i].JobDifficulty;
                    }
                }
            }

            // 簡易型連續性
            const SimpleContinuitys = await fetch('/SimpleContinuityJSON',  {
                method: 'GET',
            });
            this.SimpleContinuitysJSON = await SimpleContinuitys.json();
            for(var i = 0 ; i < this.SimpleContinuitysJSON.length ; i++){
                if(this.SimpleContinuitysJSON[i].Expert == this.$route.params.id){
                    if(this.SimpleContinuitysJSON[i].BuildItem == '獨棟'){
                        this.SimpleData.DetachedHouseCost = this.SimpleContinuitysJSON[i].Cost;
                        this.SimpleData.DetachedHouseStructureRisk = this.SimpleContinuitysJSON[i].StructuralRisk;
                        this.SimpleData.DetachedHouseWorkDifficulty = this.SimpleContinuitysJSON[i].JobDifficulty;
                    }else if(this.SimpleContinuitysJSON[i].BuildItem == '二連棟'){
                        this.SimpleData.TwoStoryBuildingCost = this.SimpleContinuitysJSON[i].Cost;
                        this.SimpleData.TwoStoryBuildingStructureRisk = this.SimpleContinuitysJSON[i].StructuralRisk;
                        this.SimpleData.TwoStoryBuildingWorkDifficulty = this.SimpleContinuitysJSON[i].JobDifficulty;
                    }else if(this.SimpleContinuitysJSON[i].BuildItem == '三連棟'){
                        this.SimpleData.ThreeStoryCost = this.SimpleContinuitysJSON[i].Cost;
                        this.SimpleData.ThreeStoryStructureRisk = this.SimpleContinuitysJSON[i].StructuralRisk;
                        this.SimpleData.ThreeStoryWorkDifficulty = this.SimpleContinuitysJSON[i].JobDifficulty;
                    }else if(this.SimpleContinuitysJSON[i].BuildItem == '四連棟'){
                        this.SimpleData.FourStoryCost = this.SimpleContinuitysJSON[i].Cost;
                        this.SimpleData.FourStoryStructureRisk = this.SimpleContinuitysJSON[i].StructuralRisk;
                        this.SimpleData.FourStoryWorkDifficulty = this.SimpleContinuitysJSON[i].JobDifficulty;
                    }
                }
            }

            // 簡易型圓頂形式
            const SimpleDomeForms = await fetch('/SimpleDomeFormJSON',  {
                method: 'GET',
            });
            this.SimpleDomeFormsJSON = await SimpleDomeForms.json();
            for(var i = 0 ; i < this.SimpleDomeFormsJSON.length ; i++){
                if(this.SimpleDomeFormsJSON[i].Expert == this.$route.params.id){
                    if(this.SimpleDomeFormsJSON[i].BuildItem == '單一圓拱'){
                        this.SimpleData.SingleRoundArchCost = this.SimpleDomeFormsJSON[i].Cost;
                        this.SimpleData.SingleRoundArchStructureRisk = this.SimpleDomeFormsJSON[i].StructuralRisk;
                        this.SimpleData.SingleRoundArchWorkDifficulty = this.SimpleDomeFormsJSON[i].JobDifficulty;
                    }else if(this.SimpleDomeFormsJSON[i].BuildItem == '下橫樑'){
                        this.SimpleData.LowerBeamCost = this.SimpleDomeFormsJSON[i].Cost;
                        this.SimpleData.LowerBeamStructureRisk = this.SimpleDomeFormsJSON[i].StructuralRisk;
                        this.SimpleData.LowerBeamWorkDifficulty = this.SimpleDomeFormsJSON[i].JobDifficulty;
                    }else if(this.SimpleDomeFormsJSON[i].BuildItem == '上1/3橫梁'){
                        this.SimpleData.UpperOneThreeBeamCost = this.SimpleDomeFormsJSON[i].Cost;
                        this.SimpleData.UpperOneThreeBeamStructureRisk = this.SimpleDomeFormsJSON[i].StructuralRisk;
                        this.SimpleData.UpperOneThreeBeamWorkDifficulty = this.SimpleDomeFormsJSON[i].JobDifficulty;
                    }else if(this.SimpleDomeFormsJSON[i].BuildItem == '上二橫梁'){
                        this.SimpleData.UpperSecondBeamCost = this.SimpleDomeFormsJSON[i].Cost;
                        this.SimpleData.UpperSecondBeamStructureRisk = this.SimpleDomeFormsJSON[i].StructuralRisk;
                        this.SimpleData.UpperSecondBeamWorkDifficulty = this.SimpleDomeFormsJSON[i].JobDifficulty;
                    }else if(this.SimpleDomeFormsJSON[i].BuildItem == 'T型樑'){
                        this.SimpleData.TBeamCost = this.SimpleDomeFormsJSON[i].Cost;
                        this.SimpleData.TBeamStructureRisk = this.SimpleDomeFormsJSON[i].StructuralRisk;
                        this.SimpleData.TBeamWorkDifficulty = this.SimpleDomeFormsJSON[i].JobDifficulty;
                    }else if(this.SimpleDomeFormsJSON[i].BuildItem == '三支集中樑'){
                        this.SimpleData.ThreeConcentratedBeamsCost = this.SimpleDomeFormsJSON[i].Cost;
                        this.SimpleData.ThreeConcentratedBeamsStructureRisk = this.SimpleDomeFormsJSON[i].StructuralRisk;
                        this.SimpleData.ThreeConcentratedBeamsWorkDifficulty = this.SimpleDomeFormsJSON[i].JobDifficulty;
                    }else if(this.SimpleDomeFormsJSON[i].BuildItem == '三支垂支梁'){
                        this.SimpleData.ThreeVerticalBeamsCost = this.SimpleDomeFormsJSON[i].Cost;
                        this.SimpleData.ThreeVerticalBeamsStructureRisk = this.SimpleDomeFormsJSON[i].StructuralRisk;
                        this.SimpleData.ThreeVerticalBeamsWorkDifficulty = this.SimpleDomeFormsJSON[i].JobDifficulty;
                    }else if(this.SimpleDomeFormsJSON[i].BuildItem == 'V型樑'){
                        this.SimpleData.VBeamCost = this.SimpleDomeFormsJSON[i].Cost;
                        this.SimpleData.VBeamStructureRisk = this.SimpleDomeFormsJSON[i].StructuralRisk;
                        this.SimpleData.VBeamWorkDifficulty = this.SimpleDomeFormsJSON[i].JobDifficulty;
                    }else if(this.SimpleDomeFormsJSON[i].BuildItem == 'W型樑'){
                        this.SimpleData.WBeamCost = this.SimpleDomeFormsJSON[i].Cost;
                        this.SimpleData.WBeamStructureRisk = this.SimpleDomeFormsJSON[i].StructuralRisk;
                        this.SimpleData.WBeamWorkDifficulty = this.SimpleDomeFormsJSON[i].JobDifficulty;
                    }
                }
            }

            // 簡易型基礎
            const SimpleFoundations = await fetch('/SimpleFoundationJSON',  {
                method: 'GET',
            });
            this.SimpleFoundationsJSON = await SimpleFoundations.json();
            for(var i = 0 ; i < this.SimpleFoundationsJSON.length ; i++){
                if(this.SimpleFoundationsJSON[i].Expert == this.$route.params.id){
                    if(this.SimpleFoundationsJSON[i].BuildItem == '直插30cm'){
                        this.SimpleData.thirtycmCost = this.SimpleFoundationsJSON[i].Cost;
                        this.SimpleData.thirtycmStructureRisk = this.SimpleFoundationsJSON[i].StructuralRisk;
                        this.SimpleData.thirtycmWorkDifficulty = this.SimpleFoundationsJSON[i].JobDifficulty;
                    }else if(this.SimpleFoundationsJSON[i].BuildItem == '直插40cm'){
                        this.SimpleData.fourtycmCost = this.SimpleFoundationsJSON[i].Cost;
                        this.SimpleData.fourtycmStructureRisk = this.SimpleFoundationsJSON[i].StructuralRisk;
                        this.SimpleData.fourtycmWorkDifficulty = this.SimpleFoundationsJSON[i].JobDifficulty;
                    }else if(this.SimpleFoundationsJSON[i].BuildItem == '直插50cm'){
                        this.SimpleData.fiftycmCost = this.SimpleFoundationsJSON[i].Cost;
                        this.SimpleData.fiftycmStructureRisk = this.SimpleFoundationsJSON[i].StructuralRisk;
                        this.SimpleData.fiftycmWorkDifficulty = this.SimpleFoundationsJSON[i].JobDifficulty;
                    }else if(this.SimpleFoundationsJSON[i].BuildItem == '直插30cm+地錨'){
                        this.SimpleData.thirtycmPlusCost = this.SimpleFoundationsJSON[i].Cost;
                        this.SimpleData.thirtycmPlusStructureRisk = this.SimpleFoundationsJSON[i].StructuralRisk;
                        this.SimpleData.thirtycmPlusWorkDifficulty = this.SimpleFoundationsJSON[i].JobDifficulty;
                    }else if(this.SimpleFoundationsJSON[i].BuildItem == '直插40cm+地錨'){
                        this.SimpleData.fourtycmPlusCost = this.SimpleFoundationsJSON[i].Cost;
                        this.SimpleData.fourtycmPlusStructureRisk = this.SimpleFoundationsJSON[i].StructuralRisk;
                        this.SimpleData.fourtycmPlusWorkDifficulty = this.SimpleFoundationsJSON[i].JobDifficulty;
                    }else if(this.SimpleFoundationsJSON[i].BuildItem == '直插50cm+地錨'){
                        this.SimpleData.fiftycmPlusCost = this.SimpleFoundationsJSON[i].Cost;
                        this.SimpleData.fiftycmPlusStructureRisk = this.SimpleFoundationsJSON[i].StructuralRisk;
                        this.SimpleData.fiftycmPlusWorkDifficulty = this.SimpleFoundationsJSON[i].JobDifficulty;
                    }
                }
            }

            // 簡易型溫室管材
            const SimpleGreenhousePipes = await fetch('/SimpleGreenhousePipeJSON',  {
                method: 'GET',
            });
            this.SimpleGreenhousePipesJSON = await SimpleGreenhousePipes.json();
            for(var i = 0 ; i < this.SimpleGreenhousePipesJSON.length ; i++){
                if(this.SimpleGreenhousePipesJSON[i].Expert == this.$route.params.id){
                    if(this.SimpleGreenhousePipesJSON[i].BuildItem == '標準管材'){
                        this.SimpleData.StandardPipeCost = this.SimpleGreenhousePipesJSON[i].Cost;
                        this.SimpleData.StandardPipeStructureRisk = this.SimpleGreenhousePipesJSON[i].StructuralRisk;
                        this.SimpleData.StandardPipeWorkDifficulty = this.SimpleGreenhousePipesJSON[i].JobDifficulty;
                    }else if(this.SimpleGreenhousePipesJSON[i].BuildItem == '高強管材'){
                        this.SimpleData.HighStrengthPipeCostCost = this.SimpleGreenhousePipesJSON[i].Cost;
                        this.SimpleData.HighStrengthPipeStructureRisk = this.SimpleGreenhousePipesJSON[i].StructuralRisk;
                        this.SimpleData.HighStrengthPipeWorkDifficulty = this.SimpleGreenhousePipesJSON[i].JobDifficulty;
                    }else if(this.SimpleGreenhousePipesJSON[i].BuildItem == '耐蝕管材'){
                        this.SimpleData.CorrosionResistantPipeCostCost = this.SimpleGreenhousePipesJSON[i].Cost;
                        this.SimpleData.CorrosionResistantPipeStructureRisk = this.SimpleGreenhousePipesJSON[i].StructuralRisk;
                        this.SimpleData.CorrosionResistantPipeWorkDifficulty = this.SimpleGreenhousePipesJSON[i].JobDifficulty;
                    }else if(this.SimpleGreenhousePipesJSON[i].BuildItem == '高強高耐蝕管材'){
                        this.SimpleData.HighStrengthCorrosionResistantPipeCost = this.SimpleGreenhousePipesJSON[i].Cost;
                        this.SimpleData.HighStrengthCorrosionResistantPipeStructureRisk = this.SimpleGreenhousePipesJSON[i].StructuralRisk;
                        this.SimpleData.HighStrengthCorrosionResistantPipeWorkDifficulty = this.SimpleGreenhousePipesJSON[i].JobDifficulty;
                    }
                }
            }

            // 簡易型長度
            const SimpleLengths = await fetch('/SimpleLengthJSON',  {
                method: 'GET',
            });
            this.SimpleLengthsJSON = await SimpleLengths.json();
            for(var i = 0 ; i < this.SimpleLengthsJSON.length ; i++){
                if(this.SimpleLengthsJSON[i].Expert == this.$route.params.id){
                    if(this.SimpleLengthsJSON[i].BuildItem == '30m'){
                        this.SimpleData.ThirtymCost = this.SimpleLengthsJSON[i].Cost;
                        this.SimpleData.ThirtymStructureRisk = this.SimpleLengthsJSON[i].StructuralRisk;
                        this.SimpleData.ThirtymWorkDifficulty = this.SimpleLengthsJSON[i].JobDifficulty;
                    }else if(this.SimpleLengthsJSON[i].BuildItem == '60m'){
                        this.SimpleData.SixtymCost = this.SimpleLengthsJSON[i].Cost;
                        this.SimpleData.SixtymStructureRisk = this.SimpleLengthsJSON[i].StructuralRisk;
                        this.SimpleData.SixtymWorkDifficulty = this.SimpleLengthsJSON[i].JobDifficulty;
                    }else if(this.SimpleLengthsJSON[i].BuildItem == '90m'){
                        this.SimpleData.NinetymCost = this.SimpleLengthsJSON[i].Cost;
                        this.SimpleData.NinetymStructureRisk = this.SimpleLengthsJSON[i].StructuralRisk;
                        this.SimpleData.NinetymWorkDifficulty = this.SimpleLengthsJSON[i].JobDifficulty;
                    }else if(this.SimpleLengthsJSON[i].BuildItem == '120m'){
                        this.SimpleData.OneHundredTwentymCost = this.SimpleLengthsJSON[i].Cost;
                        this.SimpleData.OneHundredTwentymStructureRisk = this.SimpleLengthsJSON[i].StructuralRisk;
                        this.SimpleData.OneHundredTwentymWorkDifficulty = this.SimpleLengthsJSON[i].JobDifficulty;
                    }
                }
            }

            // 簡易型肩高
            const SimpleShoulderHeights = await fetch('/SimpleShoulderHeightJSON',  {
                method: 'GET',
            });
            this.SimpleShoulderHeightsJSON = await SimpleShoulderHeights.json();
            for(var i = 0 ; i < this.SimpleShoulderHeightsJSON.length ; i++){
                if(this.SimpleShoulderHeightsJSON[i].Expert == this.$route.params.id){
                    if(this.SimpleShoulderHeightsJSON[i].BuildItem == '2m'){
                        this.SimpleData.TwomCost = this.SimpleShoulderHeightsJSON[i].Cost;
                        this.SimpleData.TwomStructureRisk = this.SimpleShoulderHeightsJSON[i].StructuralRisk;
                        this.SimpleData.TwomWorkDifficulty = this.SimpleShoulderHeightsJSON[i].JobDifficulty;
                    }else if(this.SimpleShoulderHeightsJSON[i].BuildItem == '2.5m'){
                        this.SimpleData.TwoFivemCost = this.SimpleShoulderHeightsJSON[i].Cost;
                        this.SimpleData.TwoFivemStructureRisk = this.SimpleShoulderHeightsJSON[i].StructuralRisk;
                        this.SimpleData.TwoFivemWorkDifficulty = this.SimpleShoulderHeightsJSON[i].JobDifficulty;
                    }else if(this.SimpleShoulderHeightsJSON[i].BuildItem == '3m'){
                        this.SimpleData.ThreemCost = this.SimpleShoulderHeightsJSON[i].Cost;
                        this.SimpleData.ThreemStructureRisk = this.SimpleShoulderHeightsJSON[i].StructuralRisk;
                        this.SimpleData.ThreemWorkDifficulty = this.SimpleShoulderHeightsJSON[i].JobDifficulty;
                    }else if(this.SimpleShoulderHeightsJSON[i].BuildItem == '3.5m'){
                        this.SimpleData.ThreeFivemCost = this.SimpleShoulderHeightsJSON[i].Cost;
                        this.SimpleData.ThreeFivemStructureRisk = this.SimpleShoulderHeightsJSON[i].StructuralRisk;
                        this.SimpleData.ThreeFivemWorkDifficulty = this.SimpleShoulderHeightsJSON[i].JobDifficulty;
                    }else if(this.SimpleShoulderHeightsJSON[i].BuildItem == '4m'){
                        this.SimpleData.FourmCost = this.SimpleShoulderHeightsJSON[i].Cost;
                        this.SimpleData.FourmStructureRisk = this.SimpleShoulderHeightsJSON[i].StructuralRisk;
                        this.SimpleData.FourmWorkDifficulty = this.SimpleShoulderHeightsJSON[i].JobDifficulty;
                    }
                }
            }

            // 簡易型跨距
            const SimpleSpans = await fetch('/SimpleSpanJSON',  {
                method: 'GET',
            });
            this.SimpleSpansJSON = await SimpleSpans.json();
            for(var i = 0 ; i < this.SimpleSpansJSON.length ; i++){
                if(this.SimpleSpansJSON[i].Expert == this.$route.params.id){
                    if(this.SimpleSpansJSON[i].BuildItem == '5.4m'){
                        this.SimpleData.FiveFourmCost = this.SimpleSpansJSON[i].Cost;
                        this.SimpleData.FiveFourmStructureRisk = this.SimpleSpansJSON[i].StructuralRisk;
                        this.SimpleData.FiveFourmWorkDifficulty = this.SimpleSpansJSON[i].JobDifficulty;
                    }else if(this.SimpleSpansJSON[i].BuildItem == '6m'){
                        this.SimpleData.SixmCost = this.SimpleSpansJSON[i].Cost;
                        this.SimpleData.SixmStructureRisk = this.SimpleSpansJSON[i].StructuralRisk;
                        this.SimpleData.SixmWorkDifficulty = this.SimpleSpansJSON[i].JobDifficulty;
                    }else if(this.SimpleSpansJSON[i].BuildItem == '7.2m'){
                        this.SimpleData.SevenmCost = this.SimpleSpansJSON[i].Cost;
                        this.SimpleData.SevenmStructureRisk = this.SimpleSpansJSON[i].StructuralRisk;
                        this.SimpleData.SevenmWorkDifficulty = this.SimpleSpansJSON[i].JobDifficulty;
                    }else if(this.SimpleSpansJSON[i].BuildItem == '8m'){
                        this.SimpleData.eightmCost = this.SimpleSpansJSON[i].Cost;
                        this.SimpleData.eightmStructureRisk = this.SimpleSpansJSON[i].StructuralRisk;
                        this.SimpleData.eightmWorkDifficulty = this.SimpleSpansJSON[i].JobDifficulty;
                    }
                }
            }

            this.calculator();
        },
        calculator(){
            this.proportiontotoalCost = parseInt(this.SimpleData.GreenhousePipeCost) + parseInt(this.SimpleData.DomeFormCost) + parseInt(this.SimpleData.ArcDistanceCost) + parseInt(this.SimpleData.BasisCost) + parseInt(this.SimpleData.SpanCost) + parseInt(this.SimpleData.ShoulderHeightCost) + parseInt(this.SimpleData.LengthCost) + parseInt(this.SimpleData.ContinuityCost) + parseInt(this.SimpleData.CoatedFilmCost);
            this.proportiontotoalStructuralRisk = parseInt(this.SimpleData.GreenhousePipeStructuralRisk) + parseInt(this.SimpleData.DomeFormStructuralRisk) + parseInt(this.SimpleData.ArcDistanceStructuralRisk) + parseInt(this.SimpleData.BasisStructuralRisk) + parseInt(this.SimpleData.SpanStructuralRisk) + parseInt(this.SimpleData.ShoulderHeightStructuralRisk) + parseInt(this.SimpleData.LengthStructuralRisk) + parseInt(this.SimpleData.ContinuityStructuralRisk) + parseInt(this.SimpleData.CoatedFilmStructuralRisk);
            this.proportiontotoalJobDifficulty = parseInt(this.SimpleData.GreenhousePipeJobDifficulty) + parseInt(this.SimpleData.DomeFormJobDifficulty) + parseInt(this.SimpleData.ArcDistanceJobDifficulty) + parseInt(this.SimpleData.BasisJobDifficulty) + parseInt(this.SimpleData.SpanJobDifficulty) + parseInt(this.SimpleData.ShoulderHeightJobDifficulty) + parseInt(this.SimpleData.LengthJobDifficulty) + parseInt(this.SimpleData.ContinuityJobDifficulty) + parseInt(this.SimpleData.CoatedFilmJobDifficulty);
        },
        UpdateSimple: async function(){
            let formData = new FormData();
            formData.append('Expert',this.SimpleData.Expert);
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
            // 溫室管材
            formData.append('GreenhousePipeCost',this.SimpleData.GreenhousePipeCost);
            formData.append('GreenhousePipeStructuralRisk',this.SimpleData.GreenhousePipeStructuralRisk);
            formData.append('GreenhousePipeJobDifficulty',this.SimpleData.GreenhousePipeJobDifficulty);
            // 圓頂形式
            formData.append('DomeFormCost',this.SimpleData.DomeFormCost);
            formData.append('DomeFormStructuralRisk',this.SimpleData.DomeFormStructuralRisk);
            formData.append('DomeFormJobDifficulty',this.SimpleData.DomeFormJobDifficulty);
            // 圓拱距
            formData.append('ArcDistanceCost',this.SimpleData.ArcDistanceCost);
            formData.append('ArcDistanceStructuralRisk',this.SimpleData.ArcDistanceStructuralRisk);
            formData.append('ArcDistanceJobDifficulty',this.SimpleData.ArcDistanceJobDifficulty);
            // 基礎
            formData.append('BasisCost',this.SimpleData.BasisCost);
            formData.append('BasisStructuralRisk',this.SimpleData.BasisStructuralRisk);
            formData.append('BasisJobDifficulty',this.SimpleData.BasisJobDifficulty);
            // 跨距
            formData.append('SpanCost',this.SimpleData.SpanCost);
            formData.append('SpanStructuralRisk',this.SimpleData.SpanStructuralRisk);
            formData.append('SpanJobDifficulty',this.SimpleData.SpanJobDifficulty);
            // 肩高
            formData.append('ShoulderHeightCost',this.SimpleData.ShoulderHeightCost);
            formData.append('ShoulderHeightStructuralRisk',this.SimpleData.ShoulderHeightStructuralRisk);
            formData.append('ShoulderHeightJobDifficulty',this.SimpleData.ShoulderHeightJobDifficulty);
            // 長度
            formData.append('LengthCost',this.SimpleData.LengthCost);
            formData.append('LengthStructuralRisk',this.SimpleData.LengthStructuralRisk);
            formData.append('LengthJobDifficulty',this.SimpleData.LengthJobDifficulty);
            // 連續性
            formData.append('ContinuityCost',this.SimpleData.ContinuityCost);
            formData.append('ContinuityStructuralRisk',this.SimpleData.ContinuityStructuralRisk);
            formData.append('ContinuityJobDifficulty',this.SimpleData.ContinuityJobDifficulty);
            // 披覆膜
            formData.append('CoatedFilmCost',this.SimpleData.CoatedFilmCost);
            formData.append('CoatedFilmStructuralRisk',this.SimpleData.CoatedFilmStructuralRisk);
            formData.append('CoatedFilmJobDifficulty',this.SimpleData.CoatedFilmJobDifficulty);
            formData.append('_method','put');

            try{
                const response = await SimpleCostAddService.UpdateSimpleCost(this.$route.params.id,formData);
                // 創建成功後，頁面跳轉回 文章知識頁面
                // window.location = '/#/DevelopConstructionCostAnalysisTestment';
                // 創建成功的提示視窗
                this.flashMessage.success({
                    message: '簡易型溫室構造成本參數 資料編輯成功!!',
                    time: 3000
                });

            } catch (error){

                switch (error.response.status) {
                    case 422:
                        this.errors = error.response.data.errors;
                        break;
                    default:
                        this.flashMessage.error({
                            message: '簡易型溫室構造成本參數 編輯有錯誤發生!!',
                            time: 5000
                        });
                        break;
                }
            }
        }
    },
}
</script>

