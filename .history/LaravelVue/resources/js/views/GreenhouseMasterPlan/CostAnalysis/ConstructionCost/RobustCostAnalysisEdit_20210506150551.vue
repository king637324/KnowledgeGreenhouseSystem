<template>
    <div v-if="$auth.user().id == this.$route.params.id">
        <br>
        <h2>強固型溫室</h2>
        <hr>
        
        <v-form v-on:submit.prevent="UpdateRobust" v-model="valid" lazy-validation v-if="$auth.user().identity === '管理者' || $auth.user().identity === '專家'">
            <div class="d-flex justify-content-around">
                <div class="p-2 bd-highlight">
                    <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">溫室型材</span></p>
                    <table class="table" align="center" style="border:1px solid #dee2e6;" border='1'>
                        <thead align="center" class="table-active">
                            <tr>
                                <td>項目</td>
                                <td>成本性</td>
                                <td>結構風險</td>
                                <td>作業難度</td>
                            </tr>
                        </thead>
                        <tr align="center">
                            <td style="width: 15vmin">標準型材</td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.StandardProfileCost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.StandardProfileCost">{{ errors.StandardProfileCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.StandardProfileStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.StandardProfileStructureRisk">{{ errors.StandardProfileStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.StandardProfileWorkDifficulty"
                                    :rules="StrongRules"
                                    label="請輸入作業難度參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.StandardProfileWorkDifficulty">{{ errors.StandardProfileWorkDifficulty[0] }}</div>
                            </td>
                        </tr>
                        <tr align="center">
                            <td style="width: 15vmin">高強型材</td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.HighStrengthMoldMaterialCost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.HighStrengthMoldMaterialCost">{{ errors.HighStrengthMoldMaterialCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.HighStrengthMoldMaterialStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.HighStrengthMoldMaterialStructureRisk">{{ errors.HighStrengthMoldMaterialStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.HighStrengthMoldMaterialWorkDifficulty"
                                    :rules="StrongRules"
                                    label="請輸入作業難度參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.HighStrengthMoldMaterialWorkDifficulty">{{ errors.HighStrengthMoldMaterialWorkDifficulty[0] }}</div>
                            </td>
                        </tr>
                        <tr align="center">
                            <td style="width: 15vmin">耐蝕型材</td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.CorrosionResistantMoldMaterialCost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.CorrosionResistantMoldMaterialCost">{{ errors.CorrosionResistantMoldMaterialCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.CorrosionResistantMoldMaterialStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.CorrosionResistantMoldMaterialStructureRisk">{{ errors.CorrosionResistantMoldMaterialStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.CorrosionResistantMoldMaterialWorkDifficulty"
                                    :rules="StrongRules"
                                    label="請輸入作業難度參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.CorrosionResistantMoldMaterialWorkDifficulty">{{ errors.CorrosionResistantMoldMaterialWorkDifficulty[0] }}</div>
                            </td>
                        </tr>
                        <tr align="center">
                            <td style="width: 15vmin">高強高耐蝕型材</td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.HighStrengthHighCorrosionResistantMoldMaterialCost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.HighStrengthHighCorrosionResistantMoldMaterialCost">{{ errors.HighStrengthHighCorrosionResistantMoldMaterialCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.HighStrengthHighCorrosionResistantMoldMaterialStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.HighStrengthHighCorrosionResistantMoldMaterialStructureRisk">{{ errors.HighStrengthHighCorrosionResistantMoldMaterialStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.HighStrengthHighCorrosionResistantMoldMaterialWorkDifficulty"
                                    :rules="StrongRules"
                                    label="請輸入作業難度參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.HighStrengthHighCorrosionResistantMoldMaterialWorkDifficulty">{{ errors.HighStrengthHighCorrosionResistantMoldMaterialWorkDifficulty[0] }}</div>
                            </td>
                        </tr>
                    </table>
                    <hr>
                    <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">屋頂形式</span></p>
                    <table class="table" align="center" style="border:1px solid #dee2e6;" border='1'>
                        <thead align="center" class="table-active">
                            <tr>
                                <td>項目</td>
                                <td>成本性</td>
                                <td>結構風險</td>
                                <td>作業難度</td>
                            </tr>
                        </thead>
                        <tr align="center">
                            <td style="width: 15vmin">圓頂UBP</td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.DomeUBPCost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.DomeUBPCost">{{ errors.DomeUBPCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.DomeUBPStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.DomeUBPStructureRisk">{{ errors.DomeUBPStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.DomeUBPWorkDifficulty"
                                    :rules="StrongRules"
                                    label="請輸入作業難度參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.DomeUBPWorkDifficulty">{{ errors.DomeUBPWorkDifficulty[0] }}</div>
                            </td>
                        </tr>
                        <tr align="center">
                            <td style="width: 15vmin">圓力霸UTP</td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.TwistedPairUTPCost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.TwistedPairUTPCost">{{ errors.TwistedPairUTPCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.TwistedPairUTPStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.TwistedPairUTPStructureRisk">{{ errors.TwistedPairUTPStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.TwistedPairUTPWorkDifficulty"
                                    :rules="StrongRules"
                                    label="請輸入作業難度參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.TwistedPairUTPWorkDifficulty">{{ errors.TwistedPairUTPWorkDifficulty[0] }}</div>
                            </td>
                        </tr>
                        <tr align="center">
                            <td style="width: 15vmin">山型VBP</td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.MountainTypeVBPCost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.MountainTypeVBPCost">{{ errors.MountainTypeVBPCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.MountainTypeVBPStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.MountainTypeVBPStructureRisk">{{ errors.MountainTypeVBPStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.MountainTypeVBPWorkDifficulty"
                                    :rules="StrongRules"
                                    label="請輸入作業難度參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.MountainTypeVBPWorkDifficulty">{{ errors.MountainTypeVBPWorkDifficulty[0] }}</div>
                            </td>
                        </tr>
                        <tr align="center">
                            <td style="width: 15vmin">山力霸VTP</td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.YamarikiVTPCost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.YamarikiVTPCost">{{ errors.YamarikiVTPCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.YamarikiVTPStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.YamarikiVTPStructureRisk">{{ errors.YamarikiVTPStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.YamarikiVTPWorkDifficulty"
                                    :rules="StrongRules"
                                    label="請輸入作業難度參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.YamarikiVTPWorkDifficulty">{{ errors.YamarikiVTPWorkDifficulty[0] }}</div>
                            </td>
                        </tr>
                        <tr align="center">
                            <td style="width: 15vmin">W型力霸</td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.WTypeForceCost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.WTypeForceCost">{{ errors.WTypeForceCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.WTypeForceStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.WTypeForceStructureRisk">{{ errors.WTypeForceStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.WTypeForceWorkDifficulty"
                                    :rules="StrongRules"
                                    label="請輸入作業難度參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.WTypeForceWorkDifficulty">{{ errors.WTypeForceWorkDifficulty[0] }}</div>
                            </td>
                        </tr>
                        <tr align="center">
                            <td style="width: 15vmin">單斜SP</td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.MonoclinicSPCost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.MonoclinicSPCost">{{ errors.MonoclinicSPCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.MonoclinicSPStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.MonoclinicSPStructureRisk">{{ errors.MonoclinicSPStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.MonoclinicSPWorkDifficulty"
                                    :rules="StrongRules"
                                    label="請輸入作業難度參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.MonoclinicSPWorkDifficulty">{{ errors.MonoclinicSPWorkDifficulty[0] }}</div>
                            </td>
                        </tr>
                    </table>
                    <hr>
                    <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">上拱距</span></p>
                    <table class="table" align="center" style="border:1px solid #dee2e6;" border='1'>
                        <thead align="center" class="table-active">
                            <tr>
                                <td>項目</td>
                                <td>成本性</td>
                                <td>結構風險</td>
                                <td>作業難度</td>
                            </tr>
                        </thead>
                        <tr align="center">
                            <td style="width: 15vmin">2M</td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.twoMCost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.twoMCost">{{ errors.twoMCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.twoMStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.twoMStructureRisk">{{ errors.twoMStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.twoMWorkDifficulty"
                                    :rules="StrongRules"
                                    label="請輸入作業難度參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.twoMWorkDifficulty">{{ errors.twoMWorkDifficulty[0] }}</div>
                            </td>
                        </tr>
                        <tr align="center">
                            <td style="width: 15vmin">1.33M</td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.oneThreeThreeMCost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.oneThreeThreeMCost">{{ errors.oneThreeThreeMCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.oneThreeThreeMStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.oneThreeThreeMStructureRisk">{{ errors.oneThreeThreeMStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.oneThreeThreeMWorkDifficulty"
                                    :rules="StrongRules"
                                    label="請輸入作業難度參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.oneThreeThreeMWorkDifficulty">{{ errors.oneThreeThreeMWorkDifficulty[0] }}</div>
                            </td>
                        </tr>
                        <tr align="center">
                            <td style="width: 15vmin">1M</td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.oneMCost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.oneMCost">{{ errors.oneMCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.oneMStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.oneMStructureRisk">{{ errors.oneMStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.oneMWorkDifficulty"
                                    :rules="StrongRules"
                                    label="請輸入作業難度參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.oneMWorkDifficulty">{{ errors.oneMWorkDifficulty[0] }}</div>
                            </td>
                        </tr>
                    </table>
                    <hr>
                </div>
                <div class="p-2 bd-highlight">
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
                        <tr align="center">
                            <td style="width: 15vmin">獨立基礎</td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.IndependenceFoundationCost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.IndependenceFoundationCost">{{ errors.IndependenceFoundationCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.IndependenceFoundationStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.IndependenceFoundationStructureRisk">{{ errors.IndependenceFoundationStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.IndependenceFoundationWorkDifficulty"
                                    :rules="StrongRules"
                                    label="請輸入作業難度參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.IndependenceFoundationWorkDifficulty">{{ errors.IndependenceFoundationWorkDifficulty[0] }}</div>
                            </td>
                        </tr>
                        <tr align="center">
                            <td style="width: 15vmin">連續樑</td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.ContinuousBeamCost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.ContinuousBeamCost">{{ errors.ContinuousBeamCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.ContinuousBeamStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.ContinuousBeamStructureRisk">{{ errors.ContinuousBeamStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.ContinuousBeamWorkDifficulty"
                                    :rules="StrongRules"
                                    label="請輸入作業難度參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.ContinuousBeamWorkDifficulty">{{ errors.ContinuousBeamWorkDifficulty[0] }}</div>
                            </td>
                        </tr>
                        <tr align="center">
                            <td style="width: 15vmin">快速基礎</td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.RapidBasicsCost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.RapidBasicsCost">{{ errors.RapidBasicsCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.RapidBasicsStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.RapidBasicsStructureRisk">{{ errors.RapidBasicsStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.RapidBasicsWorkDifficulty"
                                    :rules="StrongRules"
                                    label="請輸入作業難度參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.RapidBasicsWorkDifficulty">{{ errors.RapidBasicsWorkDifficulty[0] }}</div>
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
                        <tr align="center">
                            <td style="width: 15vmin">3m</td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.threeMCost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.threeMCost">{{ errors.threeMCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.threeMStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.threeMStructureRisk">{{ errors.threeMStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.threeMWorkDifficulty"
                                    :rules="StrongRules"
                                    label="請輸入作業難度參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.threeMWorkDifficulty">{{ errors.threeMWorkDifficulty[0] }}</div>
                            </td>
                        </tr>
                        <tr align="center">
                            <td style="width: 15vmin">3.5m</td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.threeFiveMCost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.threeFiveMCost">{{ errors.threeFiveMCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.threeFiveMStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.threeFiveMStructureRisk">{{ errors.threeFiveMStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.threeFiveMWorkDifficulty"
                                    :rules="StrongRules"
                                    label="請輸入作業難度參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.threeFiveMWorkDifficulty">{{ errors.threeFiveMWorkDifficulty[0] }}</div>
                            </td>
                        </tr>
                        <tr align="center">
                            <td style="width: 15vmin">4m</td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.fourMCost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.fourMCost">{{ errors.fourMCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.fourMStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.fourMStructureRisk">{{ errors.fourMStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.fourMWorkDifficulty"
                                    :rules="StrongRules"
                                    label="請輸入作業難度參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.fourMWorkDifficulty">{{ errors.fourMWorkDifficulty[0] }}</div>
                            </td>
                        </tr>
                        <tr align="center">
                            <td style="width: 15vmin">4.5m</td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.fourFiveMCost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.fourFiveMCost">{{ errors.fourFiveMCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.fourFiveMStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.fourFiveMStructureRisk">{{ errors.fourFiveMStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.fourFiveMWorkDifficulty"
                                    :rules="StrongRules"
                                    label="請輸入作業難度參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.fourFiveMWorkDifficulty">{{ errors.fourFiveMWorkDifficulty[0] }}</div>
                            </td>
                        </tr>
                        <tr align="center">
                            <td style="width: 15vmin">5m</td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.fiveMCost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.fiveMCost">{{ errors.fiveMCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.fiveMStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.fiveMStructureRisk">{{ errors.fiveMStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.fiveMWorkDifficulty"
                                    :rules="StrongRules"
                                    label="請輸入作業難度參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.fiveMWorkDifficulty">{{ errors.fiveMWorkDifficulty[0] }}</div>
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
                        <tr align="center">
                            <td style="width: 15vmin">6m</td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.sixMCost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.sixMCost">{{ errors.sixMCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.sixMStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.sixMStructureRisk">{{ errors.sixMStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.sixMWorkDifficulty"
                                    :rules="StrongRules"
                                    label="請輸入作業難度參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.sixMWorkDifficulty">{{ errors.sixMWorkDifficulty[0] }}</div>
                            </td>
                        </tr>
                        <tr align="center">
                            <td style="width: 15vmin">7m</td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.sevenMCost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.sevenMCost">{{ errors.sevenMCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.sevenMStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.sevenMStructureRisk">{{ errors.sevenMStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.sevenMWorkDifficulty"
                                    :rules="StrongRules"
                                    label="請輸入作業難度參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.sevenMWorkDifficulty">{{ errors.sevenMWorkDifficulty[0] }}</div>
                            </td>
                        </tr>
                        <tr align="center">
                            <td style="width: 15vmin">8m</td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.eightMCost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.eightMCost">{{ errors.eightMCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.eightMStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.eightMStructureRisk">{{ errors.eightMStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.eightMWorkDifficulty"
                                    :rules="StrongRules"
                                    label="請輸入作業難度參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.eightMWorkDifficulty">{{ errors.eightMWorkDifficulty[0] }}</div>
                            </td>
                        </tr>
                        <tr align="center">
                            <td style="width: 15vmin">9m</td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.nineMCost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.nineMCost">{{ errors.nineMCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.nineMStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.nineMStructureRisk">{{ errors.nineMStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.nineMWorkDifficulty"
                                    :rules="StrongRules"
                                    label="請輸入作業難度參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.nineMWorkDifficulty">{{ errors.nineMWorkDifficulty[0] }}</div>
                            </td>
                        </tr>
                        <tr align="center">
                            <td style="width: 15vmin">10m</td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.tenMCost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.tenMCost">{{ errors.tenMCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.tenMStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.tenMStructureRisk">{{ errors.tenMStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.tenMWorkDifficulty"
                                    :rules="StrongRules"
                                    label="請輸入作業難度參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.tenMWorkDifficulty">{{ errors.tenMWorkDifficulty[0] }}</div>
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
                        <tr align="center">
                            <td style="width: 15vmin">30m</td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.ThirtymCost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.ThirtymCost">{{ errors.ThirtymCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.ThirtymStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.ThirtymStructureRisk">{{ errors.ThirtymStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.ThirtymWorkDifficulty"
                                    :rules="StrongRules"
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
                                    v-model="StrongData.SixtymCost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.SixtymCost">{{ errors.SixtymCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.SixtymStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.SixtymStructureRisk">{{ errors.SixtymStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.SixtymWorkDifficulty"
                                    :rules="StrongRules"
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
                                    v-model="StrongData.NinetymCost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.NinetymCost">{{ errors.NinetymCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.NinetymStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.NinetymStructureRisk">{{ errors.NinetymStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.NinetymWorkDifficulty"
                                    :rules="StrongRules"
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
                                    v-model="StrongData.OneHundredTwentymCost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.OneHundredTwentymCost">{{ errors.OneHundredTwentymCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.OneHundredTwentymStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.OneHundredTwentymStructureRisk">{{ errors.OneHundredTwentymStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.OneHundredTwentymWorkDifficulty"
                                    :rules="StrongRules"
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
                        <tr align="center">
                            <td style="width: 15vmin">PE</td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.PECost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.PECost">{{ errors.PECost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.PEStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.PEStructureRisk">{{ errors.PEStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.PEWorkDifficulty"
                                    :rules="StrongRules"
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
                                    v-model="StrongData.POCost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.POCost">{{ errors.POCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.POStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.POStructureRisk">{{ errors.POStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.POWorkDifficulty"
                                    :rules="StrongRules"
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
                                    v-model="StrongData.RigidPlasticCost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.RigidPlasticCost">{{ errors.RigidPlasticCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.RigidPlasticStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.RigidPlasticStructureRisk">{{ errors.RigidPlasticStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.RigidPlasticWorkDifficulty"
                                    :rules="StrongRules"
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
                                    v-model="StrongData.ETFECost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.ETFECost">{{ errors.ETFECost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.ETFEStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.ETFEStructureRisk">{{ errors.ETFEStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.ETFEWorkDifficulty"
                                    :rules="StrongRules"
                                    label="請輸入作業難度參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.ETFEWorkDifficulty">{{ errors.ETFEWorkDifficulty[0] }}</div>
                            </td>
                        </tr>
                        <tr align="center">
                            <td>玻璃</td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.GlassCost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.GlassCost">{{ errors.GlassCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.GlassStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.GlassStructureRisk">{{ errors.GlassStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.GlassWorkDifficulty"
                                    :rules="StrongRules"
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
                        <tr align="center">
                            <td style="width: 15vmin">獨棟</td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.DetachedHouseCost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.DetachedHouseCost">{{ errors.DetachedHouseCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.DetachedHouseStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.DetachedHouseStructureRisk">{{ errors.DetachedHouseStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.DetachedHouseWorkDifficulty"
                                    :rules="StrongRules"
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
                                    v-model="StrongData.TwoStoryBuildingCost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.TwoStoryBuildingCost">{{ errors.TwoStoryBuildingCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.TwoStoryBuildingStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.TwoStoryBuildingStructureRisk">{{ errors.TwoStoryBuildingStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.TwoStoryBuildingWorkDifficulty"
                                    :rules="StrongRules"
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
                                    v-model="StrongData.ThreeStoryCost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.ThreeStoryCost">{{ errors.ThreeStoryCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.ThreeStoryStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.ThreeStoryStructureRisk">{{ errors.ThreeStoryStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.ThreeStoryWorkDifficulty"
                                    :rules="StrongRules"
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
                                    v-model="StrongData.FourStoryCost"
                                    :rules="StrongRules"
                                    label="請輸入成本性參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.FourStoryCost">{{ errors.FourStoryCost[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.FourStoryStructureRisk"
                                    :rules="StrongRules"
                                    label="請輸入結構風險參數"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.FourStoryStructureRisk">{{ errors.FourStoryStructureRisk[0] }}</div>
                            </td>
                            <td style="width: 15vmin">
                                <v-text-field
                                    v-model="StrongData.FourStoryWorkDifficulty"
                                    :rules="StrongRules"
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
                    <td style="width: 15vmin">溫室型材</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="StrongData.GreenhouseProfileCost"
                            :rules="StrongRules"
                            label="請輸入成本性參數(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.GreenhouseProfileCost">{{ errors.GreenhouseProfileCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="StrongData.GreenhouseProfileStructuralRisk"
                            :rules="StrongRules"
                            label="請輸入結構風險參數(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.GreenhouseProfileStructuralRisk">{{ errors.GreenhouseProfileStructuralRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="StrongData.GreenhouseProfileJobDifficulty"
                            :rules="StrongRules"
                            label="請輸入作業難度參數(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.GreenhouseProfileJobDifficulty">{{ errors.GreenhouseProfileJobDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">屋頂形式</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="StrongData.RoofFormCost"
                            :rules="StrongRules"
                            label="請輸入成本性參數(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.RoofFormCost">{{ errors.RoofFormCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="StrongData.RoofFormStructuralRisk"
                            :rules="StrongRules"
                            label="請輸入結構風險參數(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.RoofFormStructuralRisk">{{ errors.RoofFormStructuralRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="StrongData.RoofFormJobDifficulty"
                            :rules="StrongRules"
                            label="請輸入作業難度參數(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.RoofFormJobDifficulty">{{ errors.RoofFormJobDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">上拱距</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="StrongData.UpperArchCost"
                            :rules="StrongRules"
                            label="請輸入成本性參數(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.UpperArchCost">{{ errors.UpperArchCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="StrongData.UpperArchStructuralRisk"
                            :rules="StrongRules"
                            label="請輸入結構風險參數(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.UpperArchStructuralRisk">{{ errors.UpperArchStructuralRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="StrongData.UpperArchJobDifficulty"
                            :rules="StrongRules"
                            label="請輸入作業難度參數(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.UpperArchJobDifficulty">{{ errors.UpperArchJobDifficulty[0] }}</div>
                    </td>
                </tr>
                <tr align="center">
                    <td style="width: 15vmin">基礎</td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="StrongData.BasisCost"
                            :rules="StrongRules"
                            label="請輸入成本性參數(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.BasisCost">{{ errors.BasisCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="StrongData.BasisStructuralRisk"
                            :rules="StrongRules"
                            label="請輸入結構風險參數(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.BasisStructuralRisk">{{ errors.BasisStructuralRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="StrongData.BasisJobDifficulty"
                            :rules="StrongRules"
                            label="請輸入作業難度參數(%)"
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
                            v-model="StrongData.SpanCost"
                            :rules="StrongRules"
                            label="請輸入成本性參數(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.SpanCost">{{ errors.SpanCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="StrongData.SpanStructuralRisk"
                            :rules="StrongRules"
                            label="請輸入結構風險參數(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.SpanStructuralRisk">{{ errors.SpanStructuralRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="StrongData.SpanJobDifficulty"
                            :rules="StrongRules"
                            label="請輸入作業難度參數(%)"
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
                            v-model="StrongData.ShoulderHeightCost"
                            :rules="StrongRules"
                            label="請輸入成本性參數(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.ShoulderHeightCost">{{ errors.ShoulderHeightCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="StrongData.ShoulderHeightStructuralRisk"
                            :rules="StrongRules"
                            label="請輸入結構風險參數(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.ShoulderHeightStructuralRisk">{{ errors.ShoulderHeightStructuralRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="StrongData.ShoulderHeightJobDifficulty"
                            :rules="StrongRules"
                            label="請輸入作業難度參數(%)"
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
                            v-model="StrongData.LengthCost"
                            :rules="StrongRules"
                            label="請輸入成本性參數(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.LengthCost">{{ errors.LengthCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="StrongData.LengthStructuralRisk"
                            :rules="StrongRules"
                            label="請輸入結構風險參數(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.LengthStructuralRisk">{{ errors.LengthStructuralRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="StrongData.LengthJobDifficulty"
                            :rules="StrongRules"
                            label="請輸入作業難度參數(%)"
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
                            v-model="StrongData.ContinuityCost"
                            :rules="StrongRules"
                            label="請輸入成本性參數(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.ContinuityCost">{{ errors.ContinuityCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="StrongData.ContinuityStructuralRisk"
                            :rules="StrongRules"
                            label="請輸入結構風險參數(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.ContinuityStructuralRisk">{{ errors.ContinuityStructuralRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="StrongData.ContinuityJobDifficulty"
                            :rules="StrongRules"
                            label="請輸入作業難度參數(%)"
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
                            v-model="StrongData.CoatedFilmCost"
                            :rules="StrongRules"
                            label="請輸入成本性參數(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.CoatedFilmCost">{{ errors.CoatedFilmCost[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="StrongData.CoatedFilmStructuralRisk"
                            :rules="StrongRules"
                            label="請輸入結構風險參數(%)"
                            required
                            v-on:change="calculator"
                        ></v-text-field>
                        <div class="invalid-feedback" v-if="errors.CoatedFilmStructuralRisk">{{ errors.CoatedFilmStructuralRisk[0] }}</div>
                    </td>
                    <td style="width: 15vmin">
                        <v-text-field
                            v-model="StrongData.CoatedFilmJobDifficulty"
                            :rules="StrongRules"
                            label="請輸入作業難度參數(%)"
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
                <button type="button" class="btn btn-secondary" v-on:click="returnCost">返回</button>
                <button type="submit" class="btn btn-primary"><span class="fa fa-check"></span>確認修改</button>
            </div>

        </v-form>
    </div>
    <div v-else>
        <br><br><br><br><br><br>
        <h2 align="center" valign="center">
            {{this.$route.params.id}} 的參數，不是您所建立，因此無法修改!
        </h2>
        <br><br><br><br><br><br>
    </div>

</template>

<script>
import * as StrongCostAddService from '../../../../services/StrongCost_service';

export default {
    data() {
        return {
            StrongRules: [
                v => !!v || '必填',
            ],
            StrongData:{
                id: null,
                Expert: null,
                /******** 溫室型材  ********/
                // 標準型材
                StandardProfileCost: '',
                StandardProfileStructureRisk: '',
                StandardProfileWorkDifficulty: '',
                // 高強型材
                HighStrengthMoldMaterialCost: '',
                HighStrengthMoldMaterialStructureRisk: '',
                HighStrengthMoldMaterialWorkDifficulty: '',
                // 耐蝕型材
                CorrosionResistantMoldMaterialCost: '',
                CorrosionResistantMoldMaterialStructureRisk: '',
                CorrosionResistantMoldMaterialWorkDifficulty: '',
                // 高強高耐蝕型材
                HighStrengthHighCorrosionResistantMoldMaterialCost: '',
                HighStrengthHighCorrosionResistantMoldMaterialStructureRisk: '',
                HighStrengthHighCorrosionResistantMoldMaterialWorkDifficulty: '',

                /******** 屋頂形式  ********/
                // 圓頂UBP
                DomeUBPCost: '',
                DomeUBPStructureRisk: '',
                DomeUBPWorkDifficulty: '',
                // 圓力霸UTP
                TwistedPairUTPCost: '',
                TwistedPairUTPStructureRisk: '',
                TwistedPairUTPWorkDifficulty: '',
                // 山型VBP
                MountainTypeVBPCost: '',
                MountainTypeVBPStructureRisk: '',
                MountainTypeVBPWorkDifficulty: '',
                // 山力霸VTP
                YamarikiVTPCost: '',
                YamarikiVTPStructureRisk: '',
                YamarikiVTPWorkDifficulty: '',
                // W型力霸
                WTypeForceCost: '',
                WTypeForceStructureRisk: '',
                WTypeForceWorkDifficulty: '',
                // 單斜SP
                MonoclinicSPCost: '',
                MonoclinicSPStructureRisk: '',
                MonoclinicSPWorkDifficulty: '',

                /******** 上拱距  ********/
                // 2M
                twoMCost: '',	
                twoMStructureRisk: '',	
                twoMWorkDifficulty: '',
                // 1.33M
                oneThreeThreeMCost: '',	
                oneThreeThreeMStructureRisk: '',	
                oneThreeThreeMWorkDifficulty: '',
                // 1M
                oneMCost: '',
                oneMStructureRisk: '',
                oneMWorkDifficulty: '',

                /******** 基礎  ********/
                // 獨立基礎
                IndependenceFoundationCost: '',	
                IndependenceFoundationStructureRisk: '',
                IndependenceFoundationWorkDifficulty: '',
                // 連續樑
                ContinuousBeamCost: '',	
                ContinuousBeamStructureRisk: '',
                ContinuousBeamWorkDifficulty: '',
                // 快速基礎
                RapidBasicsCost: '',	
                RapidBasicsStructureRisk: '',
                RapidBasicsWorkDifficulty: '',

                /******** 跨距  ********/
                // 6m
                sixMCost: '',
                sixMStructureRisk: '',
                sixMWorkDifficulty: '',
                // 7m
                sevenMCost: '',
                sevenMStructureRisk: '',
                sevenMWorkDifficulty: '',
                // 8m
                eightMCost: '',
                eightMStructureRisk: '',
                eightMWorkDifficulty: '',
                // 9m
                nineMCost: '',
                nineMStructureRisk: '',
                nineMWorkDifficulty: '',
                // 10m
                tenMCost: '',
                tenMStructureRisk: '',
                tenMWorkDifficulty: '',

                /******** 肩高  ********/
                // 3m
                threeMCost: '',	
                threeMStructureRisk: '',
                threeMWorkDifficulty: '',
                // 3.5m
                threeFiveMCost: '',	
                threeFiveMStructureRisk: '',
                threeFiveMWorkDifficulty: '',
                // 4m
                fourMCost: '',	
                fourMStructureRisk: '',
                fourMWorkDifficulty: '',
                // 4.5m
                fourFiveMCost: '',	
                fourFiveMStructureRisk: '',
                fourFiveMWorkDifficulty: '',
                // 5m
                fiveMCost: '',	
                fiveMStructureRisk: '',
                fiveMWorkDifficulty: '',

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
                // 溫室型材
                GreenhouseProfileCost: '',
                GreenhouseProfileStructuralRisk: '',
                GreenhouseProfileJobDifficulty: '',
                // 屋頂形式
                RoofFormCost: '',
                RoofFormStructuralRisk: '', 
                RoofFormJobDifficulty: '',
                // 上拱距
                UpperArchCost: '',
                UpperArchStructuralRisk: '',
                UpperArchJobDifficulty: '',

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
        console.log(this.$auth.user()); // 可以取得使用者資料
        console.log(this.$auth.user().id); // 可以取得使用者資料
        // 如果帳號有登入，才能顯示他的id帳號
        if(this.$auth.check()){
            this.StrongData.Expert = this.$auth.user().id;
        }

        // this.$route.params.id
        console.log("-----this.$route.params.id-----");
        console.log(this.$route.params.id);
        this.getJson();

    },
    methods: {
        async getJson(){    // 取得所有變數的值
            // 強固型各建構項目比例
            const StrongCostRatios = await fetch('/StrongCostRatioJSON',  {
                method: 'GET',
            });
            this.StrongCostRatiosJSON = await StrongCostRatios.json();
            for(var i = 0 ; i < this.StrongCostRatiosJSON.length ; i++){
                if(this.StrongCostRatiosJSON[i].Expert == this.$route.params.id){
                    if(this.StrongCostRatiosJSON[i].BuildItem == '溫室型材'){
                        this.StrongData.GreenhouseProfileCost = this.StrongCostRatiosJSON[i].Cost;
                        this.StrongData.GreenhouseProfileStructuralRisk = this.StrongCostRatiosJSON[i].StructuralRisk;
                        this.StrongData.GreenhouseProfileJobDifficulty = this.StrongCostRatiosJSON[i].JobDifficulty;
                    }else if(this.StrongCostRatiosJSON[i].BuildItem == '屋頂形式'){
                        this.StrongData.RoofFormCost = this.StrongCostRatiosJSON[i].Cost;
                        this.StrongData.RoofFormStructuralRisk = this.StrongCostRatiosJSON[i].StructuralRisk;
                        this.StrongData.RoofFormJobDifficulty = this.StrongCostRatiosJSON[i].JobDifficulty;
                    }else if(this.StrongCostRatiosJSON[i].BuildItem == '上拱距'){
                        this.StrongData.UpperArchCost = this.StrongCostRatiosJSON[i].Cost;
                        this.StrongData.UpperArchStructuralRisk = this.StrongCostRatiosJSON[i].StructuralRisk;
                        this.StrongData.UpperArchJobDifficulty = this.StrongCostRatiosJSON[i].JobDifficulty;
                    }else if(this.StrongCostRatiosJSON[i].BuildItem == '基礎'){
                        this.StrongData.BasisCost = this.StrongCostRatiosJSON[i].Cost;
                        this.StrongData.BasisStructuralRisk = this.StrongCostRatiosJSON[i].StructuralRisk;
                        this.StrongData.BasisJobDifficulty = this.StrongCostRatiosJSON[i].JobDifficulty;
                    }else if(this.StrongCostRatiosJSON[i].BuildItem == '跨距'){
                        this.StrongData.SpanCost = this.StrongCostRatiosJSON[i].Cost;
                        this.StrongData.SpanStructuralRisk = this.StrongCostRatiosJSON[i].StructuralRisk;
                        this.StrongData.SpanJobDifficulty = this.StrongCostRatiosJSON[i].JobDifficulty;
                    }else if(this.StrongCostRatiosJSON[i].BuildItem == '肩高'){
                        this.StrongData.ShoulderHeightCost = this.StrongCostRatiosJSON[i].Cost;
                        this.StrongData.ShoulderHeightStructuralRisk = this.StrongCostRatiosJSON[i].StructuralRisk;
                        this.StrongData.ShoulderHeightJobDifficulty = this.StrongCostRatiosJSON[i].JobDifficulty;
                    }else if(this.StrongCostRatiosJSON[i].BuildItem == '長度'){
                        this.StrongData.LengthCost = this.StrongCostRatiosJSON[i].Cost;
                        this.StrongData.LengthStructuralRisk = this.StrongCostRatiosJSON[i].StructuralRisk;
                        this.StrongData.LengthJobDifficulty = this.StrongCostRatiosJSON[i].JobDifficulty;
                    }else if(this.StrongCostRatiosJSON[i].BuildItem == '連續性'){
                        this.StrongData.ContinuityCost = this.StrongCostRatiosJSON[i].Cost;
                        this.StrongData.ContinuityStructuralRisk = this.StrongCostRatiosJSON[i].StructuralRisk;
                        this.StrongData.ContinuityJobDifficulty = this.StrongCostRatiosJSON[i].JobDifficulty;
                    }else if(this.StrongCostRatiosJSON[i].BuildItem == '披覆膜'){
                        this.StrongData.CoatedFilmCost = this.StrongCostRatiosJSON[i].Cost;
                        this.StrongData.CoatedFilmStructuralRisk = this.StrongCostRatiosJSON[i].StructuralRisk;
                        this.StrongData.CoatedFilmJobDifficulty = this.StrongCostRatiosJSON[i].JobDifficulty;
                    }
                }
            }

            // 強固型披覆膜
            const StrongCoatingFilms = await fetch('/StrongCoatingFilmJSON',  {
                method: 'GET',
            });
            this.StrongCoatingFilmsJSON = await StrongCoatingFilms.json();
            for(var i = 0 ; i < this.StrongCoatingFilmsJSON.length ; i++){
                if(this.StrongCoatingFilmsJSON[i].Expert == this.$route.params.id){
                    if(this.StrongCoatingFilmsJSON[i].BuildItem == 'PE'){
                        this.StrongData.PECost = this.StrongCoatingFilmsJSON[i].Cost;
                        this.StrongData.PEStructureRisk = this.StrongCoatingFilmsJSON[i].StructuralRisk;
                        this.StrongData.PEWorkDifficulty = this.StrongCoatingFilmsJSON[i].JobDifficulty;
                    }else if(this.StrongCoatingFilmsJSON[i].BuildItem == 'PO'){
                        this.StrongData.POCost = this.StrongCoatingFilmsJSON[i].Cost;
                        this.StrongData.POStructureRisk = this.StrongCoatingFilmsJSON[i].StructuralRisk;
                        this.StrongData.POWorkDifficulty = this.StrongCoatingFilmsJSON[i].JobDifficulty;
                    }else if(this.StrongCoatingFilmsJSON[i].BuildItem == '硬質塑材'){
                        this.StrongData.RigidPlasticCost = this.StrongCoatingFilmsJSON[i].Cost;
                        this.StrongData.RigidPlasticStructureRisk = this.StrongCoatingFilmsJSON[i].StructuralRisk;
                        this.StrongData.RigidPlasticWorkDifficulty = this.StrongCoatingFilmsJSON[i].JobDifficulty;
                    }else if(this.StrongCoatingFilmsJSON[i].BuildItem == 'ETFE'){
                        this.StrongData.ETFECost = this.StrongCoatingFilmsJSON[i].Cost;
                        this.StrongData.ETFEStructureRisk = this.StrongCoatingFilmsJSON[i].StructuralRisk;
                        this.StrongData.ETFEWorkDifficulty = this.StrongCoatingFilmsJSON[i].JobDifficulty;
                    }else if(this.StrongCoatingFilmsJSON[i].BuildItem == '玻璃'){
                        this.StrongData.GlassCost = this.StrongCoatingFilmsJSON[i].Cost;
                        this.StrongData.GlassStructureRisk = this.StrongCoatingFilmsJSON[i].StructuralRisk;
                        this.StrongData.GlassWorkDifficulty = this.StrongCoatingFilmsJSON[i].JobDifficulty;
                    }
                }
            }

            // 強固型連續性
            const StrongContinuitys = await fetch('/StrongContinuityJSON',  {
                method: 'GET',
            });
            this.StrongContinuitysJSON = await StrongContinuitys.json();
            for(var i = 0 ; i < this.StrongContinuitysJSON.length ; i++){
                if(this.StrongContinuitysJSON[i].Expert == this.$route.params.id){
                    if(this.StrongContinuitysJSON[i].BuildItem == '獨棟'){
                        this.StrongData.DetachedHouseCost = this.StrongContinuitysJSON[i].Cost;
                        this.StrongData.DetachedHouseStructureRisk = this.StrongContinuitysJSON[i].StructuralRisk;
                        this.StrongData.DetachedHouseWorkDifficulty = this.StrongContinuitysJSON[i].JobDifficulty;
                    }else if(this.StrongContinuitysJSON[i].BuildItem == '二連棟'){
                        this.StrongData.TwoStoryBuildingCost = this.StrongContinuitysJSON[i].Cost;
                        this.StrongData.TwoStoryBuildingStructureRisk = this.StrongContinuitysJSON[i].StructuralRisk;
                        this.StrongData.TwoStoryBuildingWorkDifficulty = this.StrongContinuitysJSON[i].JobDifficulty;
                    }else if(this.StrongContinuitysJSON[i].BuildItem == '三連棟'){
                        this.StrongData.ThreeStoryCost = this.StrongContinuitysJSON[i].Cost;
                        this.StrongData.ThreeStoryStructureRisk = this.StrongContinuitysJSON[i].StructuralRisk;
                        this.StrongData.ThreeStoryWorkDifficulty = this.StrongContinuitysJSON[i].JobDifficulty;
                    }else if(this.StrongContinuitysJSON[i].BuildItem == '四連棟'){
                        this.StrongData.FourStoryCost = this.StrongContinuitysJSON[i].Cost;
                        this.StrongData.FourStoryStructureRisk = this.StrongContinuitysJSON[i].StructuralRisk;
                        this.StrongData.FourStoryWorkDifficulty = this.StrongContinuitysJSON[i].JobDifficulty;
                    }
                }
            }

            // 強固型基礎
            const StrongFoundations = await fetch('/StrongFoundationJSON',  {
                method: 'GET',
            });
            this.StrongFoundationsJSON = await StrongFoundations.json();
            for(var i = 0 ; i < this.StrongFoundationsJSON.length ; i++){
                if(this.StrongFoundationsJSON[i].Expert == this.$route.params.id){
                    if(this.StrongFoundationsJSON[i].BuildItem == '獨立基礎'){
                        this.StrongData.IndependenceFoundationCost = this.StrongFoundationsJSON[i].Cost;
                        this.StrongData.IndependenceFoundationStructureRisk = this.StrongFoundationsJSON[i].StructuralRisk;
                        this.StrongData.IndependenceFoundationWorkDifficulty = this.StrongFoundationsJSON[i].JobDifficulty;
                    }else if(this.StrongFoundationsJSON[i].BuildItem == '連續樑'){
                        this.StrongData.ContinuousBeamCost = this.StrongFoundationsJSON[i].Cost;
                        this.StrongData.ContinuousBeamStructureRisk = this.StrongFoundationsJSON[i].StructuralRisk;
                        this.StrongData.ContinuousBeamWorkDifficulty = this.StrongFoundationsJSON[i].JobDifficulty;
                    }else if(this.StrongFoundationsJSON[i].BuildItem == '快速基礎'){
                        this.StrongData.RapidBasicsCost = this.StrongFoundationsJSON[i].Cost;
                        this.StrongData.RapidBasicsStructureRisk = this.StrongFoundationsJSON[i].StructuralRisk;
                        this.StrongData.RapidBasicsWorkDifficulty = this.StrongFoundationsJSON[i].JobDifficulty;
                    }
                }
            }

            // 強固型溫室型材
            const StrongGreenhousPprofiles = await fetch('/StrongGreenhouseProfileJSON',  {
                method: 'GET',
            });
            this.StrongGreenhousPprofilesJSON = await StrongGreenhousPprofiles.json();
            for(var i = 0 ; i < this.StrongGreenhousPprofilesJSON.length ; i++){
                if(this.StrongGreenhousPprofilesJSON[i].Expert == this.$route.params.id){
                    if(this.StrongGreenhousPprofilesJSON[i].BuildItem == '標準型材'){
                        this.StrongData.StandardProfileCost = this.StrongGreenhousPprofilesJSON[i].Cost;
                        this.StrongData.StandardProfileStructureRisk = this.StrongGreenhousPprofilesJSON[i].StructuralRisk;
                        this.StrongData.StandardProfileWorkDifficulty = this.StrongGreenhousPprofilesJSON[i].JobDifficulty;
                    }else if(this.StrongGreenhousPprofilesJSON[i].BuildItem == '高強型材'){
                        this.StrongData.HighStrengthMoldMaterialCost = this.StrongGreenhousPprofilesJSON[i].Cost;
                        this.StrongData.HighStrengthMoldMaterialStructureRisk = this.StrongGreenhousPprofilesJSON[i].StructuralRisk;
                        this.StrongData.HighStrengthMoldMaterialWorkDifficulty = this.StrongGreenhousPprofilesJSON[i].JobDifficulty;
                    }else if(this.StrongGreenhousPprofilesJSON[i].BuildItem == '耐蝕型材'){
                        this.StrongData.CorrosionResistantMoldMaterialCost = this.StrongGreenhousPprofilesJSON[i].Cost;
                        this.StrongData.CorrosionResistantMoldMaterialStructureRisk = this.StrongGreenhousPprofilesJSON[i].StructuralRisk;
                        this.StrongData.CorrosionResistantMoldMaterialWorkDifficulty = this.StrongGreenhousPprofilesJSON[i].JobDifficulty;
                    }else if(this.StrongGreenhousPprofilesJSON[i].BuildItem == '高強高耐蝕型材'){
                        this.StrongData.HighStrengthHighCorrosionResistantMoldMaterialCost = this.StrongGreenhousPprofilesJSON[i].Cost;
                        this.StrongData.HighStrengthHighCorrosionResistantMoldMaterialStructureRisk = this.StrongGreenhousPprofilesJSON[i].StructuralRisk;
                        this.StrongData.HighStrengthHighCorrosionResistantMoldMaterialWorkDifficulty = this.StrongGreenhousPprofilesJSON[i].JobDifficulty;
                    }
                }
            }

            // 強固型長度
            const StrongLengths = await fetch('/StrongLengthJSON',  {
                method: 'GET',
            });
            this.StrongLengthsJSON = await StrongLengths.json();
            for(var i = 0 ; i < this.StrongLengthsJSON.length ; i++){
                if(this.StrongLengthsJSON[i].Expert == this.$route.params.id){
                    if(this.StrongLengthsJSON[i].BuildItem == '30m'){
                        this.StrongData.ThirtymCost = this.StrongLengthsJSON[i].Cost;
                        this.StrongData.ThirtymStructureRisk = this.StrongLengthsJSON[i].StructuralRisk;
                        this.StrongData.ThirtymWorkDifficulty = this.StrongLengthsJSON[i].JobDifficulty;
                    }else if(this.StrongLengthsJSON[i].BuildItem == '60m'){
                        this.StrongData.SixtymCost = this.StrongLengthsJSON[i].Cost;
                        this.StrongData.SixtymStructureRisk = this.StrongLengthsJSON[i].StructuralRisk;
                        this.StrongData.SixtymWorkDifficulty = this.StrongLengthsJSON[i].JobDifficulty;
                    }else if(this.StrongLengthsJSON[i].BuildItem == '90m'){
                        this.StrongData.NinetymCost = this.StrongLengthsJSON[i].Cost;
                        this.StrongData.NinetymStructureRisk = this.StrongLengthsJSON[i].StructuralRisk;
                        this.StrongData.NinetymWorkDifficulty = this.StrongLengthsJSON[i].JobDifficulty;
                    }else if(this.StrongLengthsJSON[i].BuildItem == '120m'){
                        this.StrongData.OneHundredTwentymCost = this.StrongLengthsJSON[i].Cost;
                        this.StrongData.OneHundredTwentymStructureRisk = this.StrongLengthsJSON[i].StructuralRisk;
                        this.StrongData.OneHundredTwentymWorkDifficulty = this.StrongLengthsJSON[i].JobDifficulty;
                    }
                }
            }

            // 強固型屋頂形式
            const StrongRoofForms = await fetch('/StrongRoofFormJSON',  {
                method: 'GET',
            });
            this.StrongRoofFormsJSON = await StrongRoofForms.json();
            for(var i = 0 ; i < this.StrongRoofFormsJSON.length ; i++){
                if(this.StrongRoofFormsJSON[i].Expert == this.$route.params.id){
                    if(this.StrongRoofFormsJSON[i].BuildItem == '圓頂UBP'){
                        this.StrongData.DomeUBPCost = this.StrongRoofFormsJSON[i].Cost;
                        this.StrongData.DomeUBPStructureRisk = this.StrongRoofFormsJSON[i].StructuralRisk;
                        this.StrongData.DomeUBPWorkDifficulty = this.StrongRoofFormsJSON[i].JobDifficulty;
                    }else if(this.StrongRoofFormsJSON[i].BuildItem == '圓力霸UTP'){
                        this.StrongData.TwistedPairUTPCost = this.StrongRoofFormsJSON[i].Cost;
                        this.StrongData.TwistedPairUTPStructureRisk = this.StrongRoofFormsJSON[i].StructuralRisk;
                        this.StrongData.TwistedPairUTPWorkDifficulty = this.StrongRoofFormsJSON[i].JobDifficulty;
                    }else if(this.StrongRoofFormsJSON[i].BuildItem == '山型VBP'){
                        this.StrongData.MountainTypeVBPCost = this.StrongRoofFormsJSON[i].Cost;
                        this.StrongData.MountainTypeVBPStructureRisk = this.StrongRoofFormsJSON[i].StructuralRisk;
                        this.StrongData.MountainTypeVBPWorkDifficulty = this.StrongRoofFormsJSON[i].JobDifficulty;
                    }else if(this.StrongRoofFormsJSON[i].BuildItem == '山力霸VTP'){
                        this.StrongData.YamarikiVTPCost = this.StrongRoofFormsJSON[i].Cost;
                        this.StrongData.YamarikiVTPStructureRisk = this.StrongRoofFormsJSON[i].StructuralRisk;
                        this.StrongData.YamarikiVTPWorkDifficulty = this.StrongRoofFormsJSON[i].JobDifficulty;
                    }else if(this.StrongRoofFormsJSON[i].BuildItem == 'W型力霸'){
                        this.StrongData.WTypeForceCost = this.StrongRoofFormsJSON[i].Cost;
                        this.StrongData.WTypeForceStructureRisk = this.StrongRoofFormsJSON[i].StructuralRisk;
                        this.StrongData.WTypeForceWorkDifficulty = this.StrongRoofFormsJSON[i].JobDifficulty;
                    }else if(this.StrongRoofFormsJSON[i].BuildItem == '單斜SP'){
                        this.StrongData.MonoclinicSPCost = this.StrongRoofFormsJSON[i].Cost;
                        this.StrongData.MonoclinicSPStructureRisk = this.StrongRoofFormsJSON[i].StructuralRisk;
                        this.StrongData.MonoclinicSPWorkDifficulty = this.StrongRoofFormsJSON[i].JobDifficulty;
                    }
                }
            }

            // 強固型肩高
            const StrongShoulderHeights = await fetch('/StrongShoulderHeightJSON',  {
                method: 'GET',
            });
            this.StrongShoulderHeightsJSON = await StrongShoulderHeights.json();
            for(var i = 0 ; i < this.StrongShoulderHeightsJSON.length ; i++){
                if(this.StrongShoulderHeightsJSON[i].Expert == this.$route.params.id){
                    if(this.StrongShoulderHeightsJSON[i].BuildItem == '3m'){
                        this.StrongData.threeMCost = this.StrongShoulderHeightsJSON[i].Cost;
                        this.StrongData.threeMStructureRisk = this.StrongShoulderHeightsJSON[i].StructuralRisk;
                        this.StrongData.threeMWorkDifficulty = this.StrongShoulderHeightsJSON[i].JobDifficulty;
                    }else if(this.StrongShoulderHeightsJSON[i].BuildItem == '3.5m'){
                        this.StrongData.threeFiveMCost = this.StrongShoulderHeightsJSON[i].Cost;
                        this.StrongData.threeFiveMStructureRisk = this.StrongShoulderHeightsJSON[i].StructuralRisk;
                        this.StrongData.threeFiveMWorkDifficulty = this.StrongShoulderHeightsJSON[i].JobDifficulty;
                    }else if(this.StrongShoulderHeightsJSON[i].BuildItem == '4m'){
                        this.StrongData.fourMCost = this.StrongShoulderHeightsJSON[i].Cost;
                        this.StrongData.fourMStructureRisk = this.StrongShoulderHeightsJSON[i].StructuralRisk;
                        this.StrongData.fourMWorkDifficulty = this.StrongShoulderHeightsJSON[i].JobDifficulty;
                    }else if(this.StrongShoulderHeightsJSON[i].BuildItem == '4.5m'){
                        this.StrongData.fourFiveMCost = this.StrongShoulderHeightsJSON[i].Cost;
                        this.StrongData.fourFiveMStructureRisk = this.StrongShoulderHeightsJSON[i].StructuralRisk;
                        this.StrongData.fourFiveMWorkDifficulty = this.StrongShoulderHeightsJSON[i].JobDifficulty;
                    }else if(this.StrongShoulderHeightsJSON[i].BuildItem == '5m'){
                        this.StrongData.fiveMCost = this.StrongShoulderHeightsJSON[i].Cost;
                        this.StrongData.fiveMStructureRisk = this.StrongShoulderHeightsJSON[i].StructuralRisk;
                        this.StrongData.fiveMWorkDifficulty = this.StrongShoulderHeightsJSON[i].JobDifficulty;
                    }
                }
            }

            // 強固型跨距
            const StrongSpans = await fetch('/StrongSpanJSON',  {
                method: 'GET',
            });
            this.StrongSpansJSON = await StrongSpans.json();
            for(var i = 0 ; i < this.StrongSpansJSON.length ; i++){
                if(this.StrongSpansJSON[i].Expert == this.$route.params.id){
                    if(this.StrongSpansJSON[i].BuildItem == '6m'){
                        this.StrongData.sixMCost = this.StrongSpansJSON[i].Cost;
                        this.StrongData.sixMStructureRisk = this.StrongSpansJSON[i].StructuralRisk;
                        this.StrongData.sixMWorkDifficulty = this.StrongSpansJSON[i].JobDifficulty;
                    }else if(this.StrongSpansJSON[i].BuildItem == '7m'){
                        this.StrongData.sevenMCost = this.StrongSpansJSON[i].Cost;
                        this.StrongData.sevenMStructureRisk = this.StrongSpansJSON[i].StructuralRisk;
                        this.StrongData.sevenMWorkDifficulty = this.StrongSpansJSON[i].JobDifficulty;
                    }else if(this.StrongSpansJSON[i].BuildItem == '8m'){
                        this.StrongData.eightMCost = this.StrongSpansJSON[i].Cost;
                        this.StrongData.eightMStructureRisk = this.StrongSpansJSON[i].StructuralRisk;
                        this.StrongData.eightMWorkDifficulty = this.StrongSpansJSON[i].JobDifficulty;
                    }else if(this.StrongSpansJSON[i].BuildItem == '9m'){
                        this.StrongData.nineMCost = this.StrongSpansJSON[i].Cost;
                        this.StrongData.nineMStructureRisk = this.StrongSpansJSON[i].StructuralRisk;
                        this.StrongData.nineMWorkDifficulty = this.StrongSpansJSON[i].JobDifficulty;
                    }else if(this.StrongSpansJSON[i].BuildItem == '10m'){
                        this.StrongData.tenMCost = this.StrongSpansJSON[i].Cost;
                        this.StrongData.tenMStructureRisk = this.StrongSpansJSON[i].StructuralRisk;
                        this.StrongData.tenMWorkDifficulty = this.StrongSpansJSON[i].JobDifficulty;
                    }
                }
            }

            // 強固型上拱距
            const StrongUpperArchDistances = await fetch('/StrongUpperArchDistanceJSON',  {
                method: 'GET',
            });
            this.StrongUpperArchDistancesJSON = await StrongUpperArchDistances.json();
            for(var i = 0 ; i < this.StrongUpperArchDistancesJSON.length ; i++){
                if(this.StrongUpperArchDistancesJSON[i].Expert == this.$route.params.id){
                    if(this.StrongUpperArchDistancesJSON[i].BuildItem == '2M'){
                        this.StrongData.twoMCost = this.StrongUpperArchDistancesJSON[i].Cost;
                        this.StrongData.twoMStructureRisk = this.StrongUpperArchDistancesJSON[i].StructuralRisk;
                        this.StrongData.twoMWorkDifficulty = this.StrongUpperArchDistancesJSON[i].JobDifficulty;
                    }else if(this.StrongUpperArchDistancesJSON[i].BuildItem == '1.33M'){
                        this.StrongData.oneThreeThreeMCost = this.StrongUpperArchDistancesJSON[i].Cost;
                        this.StrongData.oneThreeThreeMStructureRisk = this.StrongUpperArchDistancesJSON[i].StructuralRisk;
                        this.StrongData.oneThreeThreeMWorkDifficulty = this.StrongUpperArchDistancesJSON[i].JobDifficulty;
                    }else if(this.StrongUpperArchDistancesJSON[i].BuildItem == '1M'){
                        this.StrongData.oneMCost = this.StrongUpperArchDistancesJSON[i].Cost;
                        this.StrongData.oneMStructureRisk = this.StrongUpperArchDistancesJSON[i].StructuralRisk;
                        this.StrongData.oneMWorkDifficulty = this.StrongUpperArchDistancesJSON[i].JobDifficulty;
                    }
                }
            }

            this.calculator();

        },
        calculator(){
            this.proportiontotoalCost = parseInt(this.StrongData.GreenhouseProfileCost) +  parseInt(this.StrongData.RoofFormCost) + parseInt(this.StrongData.UpperArchCost) + parseInt(this.StrongData.BasisCost) + parseInt(this.StrongData.SpanCost) + parseInt(this.StrongData.ShoulderHeightCost) + parseInt(this.StrongData.LengthCost) + parseInt(this.StrongData.ContinuityCost) + parseInt(this.StrongData.CoatedFilmCost);
            this.proportiontotoalStructuralRisk = parseInt(this.StrongData.GreenhouseProfileStructuralRisk) + parseInt(this.StrongData.RoofFormStructuralRisk ) + parseInt(this.StrongData.UpperArchStructuralRisk) + parseInt(this.StrongData.BasisStructuralRisk) + parseInt(this.StrongData.SpanStructuralRisk) + parseInt(this.StrongData.ShoulderHeightStructuralRisk) + parseInt(this.StrongData.LengthStructuralRisk) + parseInt(this.StrongData.ContinuityStructuralRisk) + parseInt(this.StrongData.CoatedFilmStructuralRisk);
            this.proportiontotoalJobDifficulty = parseInt(this.StrongData.GreenhouseProfileJobDifficulty) + parseInt(this.StrongData.RoofFormJobDifficulty) + parseInt(this.StrongData.UpperArchJobDifficulty) + parseInt(this.StrongData.BasisJobDifficulty) + parseInt(this.StrongData.SpanJobDifficulty) + parseInt(this.StrongData.ShoulderHeightJobDifficulty) + parseInt(this.StrongData.LengthJobDifficulty) + parseInt(this.StrongData.ContinuityJobDifficulty) + parseInt(this.StrongData.CoatedFilmJobDifficulty);
        },
        UpdateRobust: async function(){
            let formData = new FormData();
            formData.append('Expert',this.StrongData.Expert);
            /******** 溫室型材  ********/
            // 標準型材
            formData.append('StandardProfileCost',this.StrongData.StandardProfileCost);
            formData.append('StandardProfileStructureRisk',this.StrongData.StandardProfileStructureRisk);
            formData.append('StandardProfileWorkDifficulty',this.StrongData.StandardProfileWorkDifficulty);
            // 高強型材
            formData.append('HighStrengthMoldMaterialCost',this.StrongData.HighStrengthMoldMaterialCost);
            formData.append('HighStrengthMoldMaterialStructureRisk',this.StrongData.HighStrengthMoldMaterialStructureRisk);
            formData.append('HighStrengthMoldMaterialWorkDifficulty',this.StrongData.HighStrengthMoldMaterialWorkDifficulty);
            // 耐蝕型材
            formData.append('CorrosionResistantMoldMaterialCost',this.StrongData.CorrosionResistantMoldMaterialCost);
            formData.append('CorrosionResistantMoldMaterialStructureRisk',this.StrongData.CorrosionResistantMoldMaterialStructureRisk);
            formData.append('CorrosionResistantMoldMaterialWorkDifficulty',this.StrongData.CorrosionResistantMoldMaterialWorkDifficulty);
            // 高強高耐蝕型材
            formData.append('HighStrengthHighCorrosionResistantMoldMaterialCost',this.StrongData.HighStrengthHighCorrosionResistantMoldMaterialCost);
            formData.append('HighStrengthHighCorrosionResistantMoldMaterialStructureRisk',this.StrongData.HighStrengthHighCorrosionResistantMoldMaterialStructureRisk);
            formData.append('HighStrengthHighCorrosionResistantMoldMaterialWorkDifficulty',this.StrongData.HighStrengthHighCorrosionResistantMoldMaterialWorkDifficulty);

            /******** 屋頂形式  ********/
            // 圓頂UBP
            formData.append('DomeUBPCost',this.StrongData.DomeUBPCost);
            formData.append('DomeUBPStructureRisk',this.StrongData.DomeUBPStructureRisk);
            formData.append('DomeUBPWorkDifficulty',this.StrongData.DomeUBPWorkDifficulty);
            // 圓力霸UTP
            formData.append('TwistedPairUTPCost',this.StrongData.TwistedPairUTPCost);
            formData.append('TwistedPairUTPStructureRisk',this.StrongData.TwistedPairUTPStructureRisk);
            formData.append('TwistedPairUTPWorkDifficulty',this.StrongData.TwistedPairUTPWorkDifficulty);
            // 山型VBP
            formData.append('MountainTypeVBPCost',this.StrongData.MountainTypeVBPCost);
            formData.append('MountainTypeVBPStructureRisk',this.StrongData.MountainTypeVBPStructureRisk);
            formData.append('MountainTypeVBPWorkDifficulty',this.StrongData.MountainTypeVBPWorkDifficulty);
            // 山力霸VTP
            formData.append('YamarikiVTPCost',this.StrongData.YamarikiVTPCost);
            formData.append('YamarikiVTPStructureRisk',this.StrongData.YamarikiVTPStructureRisk);
            formData.append('YamarikiVTPWorkDifficulty',this.StrongData.YamarikiVTPWorkDifficulty);
            // W型力霸
            formData.append('WTypeForceCost',this.StrongData.WTypeForceCost);
            formData.append('WTypeForceStructureRisk',this.StrongData.WTypeForceStructureRisk);
            formData.append('WTypeForceWorkDifficulty',this.StrongData.WTypeForceWorkDifficulty);
            // 單斜SP
            formData.append('MonoclinicSPCost',this.StrongData.MonoclinicSPCost);
            formData.append('MonoclinicSPStructureRisk',this.StrongData.MonoclinicSPStructureRisk);
            formData.append('MonoclinicSPWorkDifficulty',this.StrongData.MonoclinicSPWorkDifficulty);

            /******** 上拱距  ********/
            // 2M
            formData.append('twoMCost',this.StrongData.twoMCost);
            formData.append('twoMStructureRisk',this.StrongData.twoMStructureRisk);
            formData.append('twoMWorkDifficulty',this.StrongData.twoMWorkDifficulty);
            // 1.33M
            formData.append('oneThreeThreeMCost',this.StrongData.oneThreeThreeMCost);
            formData.append('oneThreeThreeMStructureRisk',this.StrongData.oneThreeThreeMStructureRisk);
            formData.append('oneThreeThreeMWorkDifficulty',this.StrongData.oneThreeThreeMWorkDifficulty);
            // 1M
            formData.append('oneMCost',this.StrongData.oneMCost);
            formData.append('oneMStructureRisk',this.StrongData.oneMStructureRisk);
            formData.append('oneMWorkDifficulty',this.StrongData.oneMWorkDifficulty);
            
            /******** 基礎  ********/
            // 獨立基礎
            formData.append('IndependenceFoundationCost',this.StrongData.IndependenceFoundationCost);
            formData.append('IndependenceFoundationStructureRisk',this.StrongData.IndependenceFoundationStructureRisk);
            formData.append('IndependenceFoundationWorkDifficulty',this.StrongData.IndependenceFoundationWorkDifficulty);
            // 連續樑
            formData.append('ContinuousBeamCost',this.StrongData.ContinuousBeamCost);
            formData.append('ContinuousBeamStructureRisk',this.StrongData.ContinuousBeamStructureRisk);
            formData.append('ContinuousBeamWorkDifficulty',this.StrongData.ContinuousBeamWorkDifficulty);
            // 快速基礎
            formData.append('RapidBasicsCost',this.StrongData.RapidBasicsCost);
            formData.append('RapidBasicsStructureRisk',this.StrongData.RapidBasicsStructureRisk);
            formData.append('RapidBasicsWorkDifficulty',this.StrongData.RapidBasicsWorkDifficulty);

            /******** 跨距  ********/
            // 6m
            formData.append('sixMCost',this.StrongData.sixMCost);
            formData.append('sixMStructureRisk',this.StrongData.sixMStructureRisk);
            formData.append('sixMWorkDifficulty',this.StrongData.sixMWorkDifficulty);
            // 7m
            formData.append('sevenMCost',this.StrongData.sevenMCost);
            formData.append('sevenMStructureRisk',this.StrongData.sevenMStructureRisk);
            formData.append('sevenMWorkDifficulty',this.StrongData.sevenMWorkDifficulty);
            // 8m
            formData.append('eightMCost',this.StrongData.eightMCost);
            formData.append('eightMStructureRisk',this.StrongData.eightMStructureRisk);
            formData.append('eightMWorkDifficulty',this.StrongData.eightMWorkDifficulty);
            // 9m
            formData.append('nineMCost',this.StrongData.nineMCost);
            formData.append('nineMStructureRisk',this.StrongData.nineMStructureRisk);
            formData.append('nineMWorkDifficulty',this.StrongData.nineMWorkDifficulty);
            // 10m
            formData.append('tenMCost',this.StrongData.tenMCost);
            formData.append('tenMStructureRisk',this.StrongData.tenMStructureRisk);
            formData.append('tenMWorkDifficulty',this.StrongData.tenMWorkDifficulty);

            /******** 肩高  ********/
            // 3m
            formData.append('threeMCost',this.StrongData.threeMCost);
            formData.append('threeMStructureRisk',this.StrongData.threeMStructureRisk);
            formData.append('threeMWorkDifficulty',this.StrongData.threeMWorkDifficulty);
            // 3.5m
            formData.append('threeFiveMCost',this.StrongData.threeFiveMCost);
            formData.append('threeFiveMStructureRisk',this.StrongData.threeFiveMStructureRisk);
            formData.append('threeFiveMWorkDifficulty',this.StrongData.threeFiveMWorkDifficulty);
            // 4m
            formData.append('fourMCost',this.StrongData.fourMCost);
            formData.append('fourMStructureRisk',this.StrongData.fourMStructureRisk);
            formData.append('fourMWorkDifficulty',this.StrongData.fourMWorkDifficulty);
            // 4.5m
            formData.append('fourFiveMCost',this.StrongData.fourFiveMCost);
            formData.append('fourFiveMStructureRisk',this.StrongData.fourFiveMStructureRisk);
            formData.append('fourFiveMWorkDifficulty',this.StrongData.fourFiveMWorkDifficulty);
            // 5m
            formData.append('fiveMCost',this.StrongData.fiveMCost);
            formData.append('fiveMStructureRisk',this.StrongData.fiveMStructureRisk);
            formData.append('fiveMWorkDifficulty',this.StrongData.fiveMWorkDifficulty);

            /******** 長度  ********/
            // 30m
            formData.append('ThirtymCost',this.StrongData.ThirtymCost);
            formData.append('ThirtymStructureRisk',this.StrongData.ThirtymStructureRisk);
            formData.append('ThirtymWorkDifficulty',this.StrongData.ThirtymWorkDifficulty);
            // 60m
            formData.append('SixtymCost',this.StrongData.SixtymCost);
            formData.append('SixtymStructureRisk',this.StrongData.SixtymStructureRisk);
            formData.append('SixtymWorkDifficulty',this.StrongData.SixtymWorkDifficulty);
            // 90m
            formData.append('NinetymCost',this.StrongData.NinetymCost);
            formData.append('NinetymStructureRisk',this.StrongData.NinetymStructureRisk);
            formData.append('NinetymWorkDifficulty',this.StrongData.NinetymWorkDifficulty);
            // 120m
            formData.append('OneHundredTwentymCost',this.StrongData.OneHundredTwentymCost);
            formData.append('OneHundredTwentymStructureRisk',this.StrongData.OneHundredTwentymStructureRisk);
            formData.append('OneHundredTwentymWorkDifficulty',this.StrongData.OneHundredTwentymWorkDifficulty);

            /******** 連續性  ********/
            // 獨棟
            formData.append('DetachedHouseCost',this.StrongData.DetachedHouseCost);
            formData.append('DetachedHouseStructureRisk',this.StrongData.DetachedHouseStructureRisk);
            formData.append('DetachedHouseWorkDifficulty',this.StrongData.DetachedHouseWorkDifficulty);
            // 二連棟
            formData.append('TwoStoryBuildingCost',this.StrongData.TwoStoryBuildingCost);
            formData.append('TwoStoryBuildingStructureRisk',this.StrongData.TwoStoryBuildingStructureRisk);
            formData.append('TwoStoryBuildingWorkDifficulty',this.StrongData.TwoStoryBuildingWorkDifficulty);
            // 三連棟
            formData.append('ThreeStoryCost',this.StrongData.ThreeStoryCost);
            formData.append('ThreeStoryStructureRisk',this.StrongData.ThreeStoryStructureRisk);
            formData.append('ThreeStoryWorkDifficulty',this.StrongData.ThreeStoryWorkDifficulty);
            // 四連棟
            formData.append('FourStoryCost',this.StrongData.FourStoryCost);
            formData.append('FourStoryStructureRisk',this.StrongData.FourStoryStructureRisk);
            formData.append('FourStoryWorkDifficulty',this.StrongData.FourStoryWorkDifficulty);

            /******** 披覆膜  ********/
            // PE
            formData.append('PECost',this.StrongData.PECost);
            formData.append('PEStructureRisk',this.StrongData.PEStructureRisk);
            formData.append('PEWorkDifficulty',this.StrongData.PEWorkDifficulty);
            // PO
            formData.append('POCost',this.StrongData.POCost);
            formData.append('POStructureRisk',this.StrongData.POStructureRisk);
            formData.append('POWorkDifficulty',this.StrongData.POWorkDifficulty);
            // 硬質塑材
            formData.append('RigidPlasticCost',this.StrongData.RigidPlasticCost);
            formData.append('RigidPlasticStructureRisk',this.StrongData.RigidPlasticStructureRisk);
            formData.append('RigidPlasticWorkDifficulty',this.StrongData.RigidPlasticWorkDifficulty);
            // ETFE
            formData.append('ETFECost',this.StrongData.ETFECost);
            formData.append('ETFEStructureRisk',this.StrongData.ETFEStructureRisk);
            formData.append('ETFEWorkDifficulty',this.StrongData.ETFEWorkDifficulty);
            // 玻璃
            formData.append('GlassCost',this.StrongData.GlassCost);
            formData.append('GlassStructureRisk',this.StrongData.GlassStructureRisk);
            formData.append('GlassWorkDifficulty',this.StrongData.GlassWorkDifficulty);

            /******** 各成本比例  ********/
            // 溫室型材
            formData.append('GreenhouseProfileCost',this.StrongData.GreenhouseProfileCost);
            formData.append('GreenhouseProfileStructuralRisk',this.StrongData.GreenhouseProfileStructuralRisk);
            formData.append('GreenhouseProfileJobDifficulty',this.StrongData.GreenhouseProfileJobDifficulty);
            // 屋頂形式
            formData.append('RoofFormCost',this.StrongData.RoofFormCost);
            formData.append('RoofFormStructuralRisk',this.StrongData.RoofFormStructuralRisk);
            formData.append('RoofFormJobDifficulty',this.StrongData.RoofFormJobDifficulty);
            // 上拱距
            formData.append('UpperArchCost',this.StrongData.UpperArchCost);
            formData.append('UpperArchStructuralRisk',this.StrongData.UpperArchStructuralRisk);
            formData.append('UpperArchJobDifficulty',this.StrongData.UpperArchJobDifficulty);
            // 基礎
            formData.append('BasisCost',this.StrongData.BasisCost);
            formData.append('BasisStructuralRisk',this.StrongData.BasisStructuralRisk);
            formData.append('BasisJobDifficulty',this.StrongData.BasisJobDifficulty);
            // 跨距
            formData.append('SpanCost',this.StrongData.SpanCost);
            formData.append('SpanStructuralRisk',this.StrongData.SpanStructuralRisk);
            formData.append('SpanJobDifficulty',this.StrongData.SpanJobDifficulty);
            // 肩高
            formData.append('ShoulderHeightCost',this.StrongData.ShoulderHeightCost);
            formData.append('ShoulderHeightStructuralRisk',this.StrongData.ShoulderHeightStructuralRisk);
            formData.append('ShoulderHeightJobDifficulty',this.StrongData.ShoulderHeightJobDifficulty);
            // 長度
            formData.append('LengthCost',this.StrongData.LengthCost);
            formData.append('LengthStructuralRisk',this.StrongData.LengthStructuralRisk);
            formData.append('LengthJobDifficulty',this.StrongData.LengthJobDifficulty);
            // 連續性
            formData.append('ContinuityCost',this.StrongData.ContinuityCost);
            formData.append('ContinuityStructuralRisk',this.StrongData.ContinuityStructuralRisk);
            formData.append('ContinuityJobDifficulty',this.StrongData.ContinuityJobDifficulty);
            // 披覆膜
            formData.append('CoatedFilmCost',this.StrongData.CoatedFilmCost);
            formData.append('CoatedFilmStructuralRisk',this.StrongData.CoatedFilmStructuralRisk);
            formData.append('CoatedFilmJobDifficulty',this.StrongData.CoatedFilmJobDifficulty);
            formData.append('_method','put');
            

            try{
                const response = await StrongCostAddService.UpdateStrongCost(this.$route.params.id,formData);
                // 創建成功後，頁面跳轉回 溫室構造成本分析
                window.location = '#/GreenhouseMasterPlan/CostAnalysis/GreenhouseConstructionCostAnalysis';
                // 創建成功的提示視窗
                this.flashMessage.success({
                    message: '強固型溫室構造成本參數 資料編輯成功!!',
                    time: 3000
                });

            } catch (error){

                switch (error.response.status) {
                    case 422:
                        this.errors = error.response.data.errors;
                        break;
                    default:
                        this.flashMessage.error({
                            message: '強固型溫室構造成本參數 編輯有錯誤發生!!',
                            time: 5000
                        });
                        break;
                }
            }
        },returnCost(){
            // 返回溫室構造成本分析
            window.location = '#/GreenhouseMasterPlan/CostAnalysis/GreenhouseConstructionCostAnalysis';
        }
    },
}
</script>

