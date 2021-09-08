<template>
    <div>
        <br>
        <h2>溫室材料成本分析</h2>
        <!-- <button type="button" class="btn btn-danger" v-on:click="check">檢查</button> -->
        <hr>

        <v-container-fluid>
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
                                            </v-row>
                                        </v-container-fluid>
                                        
                                        
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
                                        <v-container-fluid>
                                            <v-row>
                                                <v-col>
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
                                                </v-col>
                                            </v-row>
                                        </v-container-fluid>
                                    </div>
                                </b-card-text>

                            </b-card>
                        </div>
                    </v-col>
                    <v-col md="1">
                        <!-- LME倫敦金屬價格 -->
                        <div style="position:fixed;">
                            <!-- <h4 align="center">金屬價格</h4> -->
                            <br>
                            <table align="center" style="border:1px solid black;" border='1' >
                                <thead>
                                    <tr>
                                        <td colspan="2" class="table-dark"> {{MetalDate}} </td>
                                    </tr>
                                </thead>
                                <tbody v-for="(metal, index) in MetalPrice" :key="index">
                                    <tr>
                                        <td align="center">
                                            <a :href="metal[3]" target="_blank" style="color:gray;"> {{metal[0]}} </a>
                                        </td>
                                        <td align="right">
                                            {{metal[1]}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <p style = "font-size: 1.5vmin;">
                                資料來源：
                                <a href="https://www.lme.com/" target="_blank" style="color:gray;">倫敦金屬交易所</a>
                            </p>
                        </div>
                    </v-col>
                </v-row>
            </div>
        </v-container-fluid>



    </div>
</template>

<script>
import * as Steel from '../../../services/user_steel.js';
export default {
    data(){
        return{
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
            PipeSpeed:null,
            PipeStructuralRisk:null,
            PipeCorrosive:null,
            PipeWeightiness:null,
            PipeCost:null,
            PipeTotal:null,

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

            steelcheck:[],
            steelcheck2:[],
            SteelJson:[],
            steel_name:[],

        }
    },
    created:function(){  // 網頁載入時，一開始就載入
        this.getJson();
    },
    methods:{
        async getJson(){    //取的資料庫資料，將資料轉成JSON
            // LME 倫敦金屬交易所
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

            const S_OverPlan = await fetch('/UserSteelJson',  {
                method: 'GET',
            });
            
            this.SteelJson = await S_OverPlan.json();
            for(var i = 0; i < this.SteelJson.length; i++){
                if (this.SteelJson[i].uid === this.$auth.user().id){
                    this.SteelJson[i].cost = 
                        Math.floor(Number(this.SteelPrice)+
                        Number(this.SteelJson[i].HighStrengthMaterial)+
                        Number(this.SteelJson[i].SteelBillet)+
                        Number(this.SteelJson[i].HotRolledSteelSheet)+
                        Number(this.SteelJson[i].ColdRolledSteelSheet)+
                        Number(this.SteelJson[i].ContinuousHotDipGalvanizing)+
                        Number(this.SteelJson[i].ContinuousPaint)+
                        Number(this.SteelJson[i].ColdForming)+
                        Number(this.SteelJson[i].Welding)+
                        Number(this.SteelJson[i].Processing)+
                        Number(this.SteelJson[i].AfterHotDipGalvanizing)+
                        Number(this.SteelJson[i].Galvalume)+
                        Number(this.SteelJson[i].MagnesiumAluminumZincPlating)+
                        Number(this.SteelJson[i].AfterBaking))
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

            
            

        },updateSelectPipe:async function(checkid,checktype){   // 更新所選擇的管材
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
                    if (this.selectPipe[j].MaterialName === pipename  && this.selectPipe[j].uid === this.$auth.user().id){
                        await Steel.deleteSteel(this.selectPipe[j].id);
                        this.selectPipe.splice(j,1)
                    }
                }
            }

        },updatePipeCompare(){  // 更新所選管材的參數比較
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

        },updateProfileCompare(){   // 更新所選型材的參數比較
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
    }
}
</script>

