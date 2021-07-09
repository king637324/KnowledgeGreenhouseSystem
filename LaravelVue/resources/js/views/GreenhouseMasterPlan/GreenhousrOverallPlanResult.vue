<template>

    <div>
        <br>
        <h3 id="總體規劃">
            總體規劃
        </h3>
        <hr>

        <v-container-fluid>
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
                                            <v-col v-for="(OverPlan, index) in OverPlanJson" :key="index">
                                                <b-card header-tag="header" header-text-variant="white" header-bg-variant="info">
                                                    <template #header>
                                                        <h6 class="mb-0">
                                                            <b-icon icon="flower1"></b-icon> 
                                                            {{ time.getFullYear() }}/{{ time.getMonth()+1 }}/{{ time.getDate() }}-{{ OverPlan.plant }}-{{ index+1 }}
                                                            <button type="button" style="float:right; width:20px; height:20px;" v-on:click="deleterecord(OverPlan.pid)"><v-icon>fas fa-times</v-icon></button>
                                                        </h6>
                                                    </template>
                                                    <b-card-text>
                                                        <span>溫室作物：{{ OverPlan.plantclass }}-{{ OverPlan.plant }}</span><br>
                                                        <span>栽種面積：{{ OverPlan.croplength }}*{{ OverPlan.cropwidth }}</span><br>
                                                        <span>地點選擇：{{ OverPlan.localcity }}-{{ OverPlan.localarea }}</span><br>
                                                        <span>地型選擇：{{ OverPlan.terrain }}-{{ OverPlan.landform }}</span><br>
                                                        <span>溫室選擇：{{ OverPlan.greenhouse }}</span><br>
                                                        <span v-if="OverPlan.greenhouse == '簡易溫室'">
                                                            溫室設計：<br>溫室管材-{{ OverPlan.greenhousepipe }}&nbsp;圓頂形式-{{ OverPlan.domeforms }}<br>
                                                                    圓拱距-{{ OverPlan.circulararchdistances }}&nbsp;簡易基礎-{{ OverPlan.foundations }}<br>
                                                                    簡易跨距-{{ OverPlan.spans }}&nbsp;簡易肩高-{{ OverPlan.shoulderheights }}<br>
                                                                    簡易長度-{{ OverPlan.lengths }}&nbsp;簡易連續性-{{ OverPlan.continuitys }}<br>
                                                                    簡易披覆膜-{{ OverPlan.coatingfilms }}<br>
                                                        </span><br>
                                                        <span v-if="OverPlan.greenhouse == '強固溫室'">
                                                            溫室設計：<br>溫室型材-{{ OverPlan.greenhousepipe }}&nbsp;屋頂形式-{{ OverPlan.domeforms }}<br>
                                                                    上拱距-{{ OverPlan.circulararchdistances }}&nbsp;基礎-{{ OverPlan.foundations }}<br>
                                                                    跨距-{{ OverPlan.spans }}&nbsp;肩高-{{ OverPlan.shoulderheights }}<br>
                                                                    長度-{{ OverPlan.lengths }}&nbsp;連續性-{{ OverPlan.continuitys }}<br>
                                                                    披覆膜-{{ OverPlan.coatingfilms }}<br>
                                                        </span>
                                                    </b-card-text>
                                                </b-card>
                                            </v-col>
                                            <!-- <v-col v-for="(OverPlan, index) in vegetablejson" :key="index">
                                                <b-card header-tag="header" header-text-variant="white" header-bg-variant="info">
                                                    <template #header>
                                                        <h6 class="mb-0">
                                                            {{OverPlan.VegetableTypes}}
                                                        </h6>
                                                    </template>
                                                    <b-card-text>
                                                        <span>{{OverPlan.VegetableTypes}}</span><br>
                                                        
                                                    </b-card-text>
                                                </b-card>
                                            </v-col> -->
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
            </v-row>
        </v-container-fluid>
    </div>
</template>

<script>
  import * as SaveOverPlan from '../../services/saveoverplan_service.js';
  export default {
    data: () => ({
        time: new Date(),
        OverPlanJson: [],
        overplanArray: [],
    }),

    created:function(){  // 網頁載入時，一開始就載入
        this.getJson();
    },

    methods: {
        async getJson(){
            const J_OverPlan = await fetch('/OverPlanJson',  {
                method: 'GET',
            });
            this.OverPlanJson = await J_OverPlan.json();

        },
        deleterecord: async function(DeleteId){ 
            await SaveOverPlan.deleteOverPlan(DeleteId);
            window.location.reload();
        },
    },
}
</script>