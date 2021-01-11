<template>
    <div>
        <br>
        <h2>溫室材料成本分析</h2>
        <button type="button" class="btn btn-danger" v-on:click="check">檢查</button>
        <hr>

        <div class="row">
            <div class="col-xl-12">
                <!-- 管 材 製 程 成 本 分 析 -->
                <div class="card mb-4">
                    <div class="card-header">
                        <b-icon icon="building"></b-icon>
                        管 材 製 程 成 本 分 析
                    </div>
                    <table style="border:1px solid black; font-size: 1.5vmin" border='1'>
                        <thead class="table-active">
                            <tr align="center">
                                <td> 勾選 </td>
                                <td> 材料名稱 </td>
                                <td> 鋼料 </td>
                                <td> 高強材 </td>
                                <td> 鋼胚 </td>
                                <td> 熱軋鋼板 </td>
                                <td> 冷軋鋼板 </td>
                                <td> 連續熱浸鍍鋅 </td>
                                <td> 連續烤漆 </td>
                                <td> 冷彎成形</td>
                                <td> 銲接</td>
                                <td> 加工 </td>
                                <td> 後熱浸鍍鋅 </td>
                                <td> 鍍鋁鋅 </td>
                                <td> 鍍鎂鋁鋅 </td>
                                <td> 後烤漆 </td>
                                <td> 速度性 </td>
                                <td> 結構風險 </td>
                                <td> 腐蝕性 </td>
                                <td> 重量性 </td>
                                <td> 成本性 </td>
                            </tr>
                        </thead>
                        <tr align="center" v-for="(all, index) in PipeData" :key="index">
                            <td>
                                <input type="checkbox" :value="all.id" v-model="checkedPipe" v-on:change="updateSelectPipe">
                            </td>
                            <td align="left"> {{all.MaterialName}}</td>
                            <td>NT$ {{all.Steel}}</td>
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
                            <td>NT$ {{all.Cost}}</td>
                        </tr>
                    </table>
                    <br>
                    <h6>備註：請將欲比較的勾選</h6>

                    <!-- 管 材 製 程 比 較 分 析 -->
                    <div v-if="checkedPipe.length != 0">
                        <h5>管 材 製 程 比 較 分 析</h5>
                        <table style="border:1px solid black; font-size: 1.5vmin" border='1'>
                            <thead class="table-active">
                                <tr align="center">
                                    <td> 材料名稱 </td>
                                    <td> 鋼料 </td>
                                    <td> 高強材 </td>
                                    <td> 鋼胚 </td>
                                    <td> 熱軋鋼板 </td>
                                    <td> 冷軋鋼板 </td>
                                    <td> 連續熱浸鍍鋅 </td>
                                    <td> 連續烤漆 </td>
                                    <td> 冷彎成形</td>
                                    <td> 銲接</td>
                                    <td> 加工 </td>
                                    <td> 後熱浸鍍鋅 </td>
                                    <td> 鍍鋁鋅 </td>
                                    <td> 鍍鎂鋁鋅 </td>
                                    <td> 後烤漆 </td>
                                    <td> 速度性 </td>
                                    <td> 結構風險 </td>
                                    <td> 腐蝕性 </td>
                                    <td> 重量性 </td>
                                    <td> 成本性 </td>
                                    <td> 比較值 </td>
                                    <td> 排名 </td>
                                </tr>
                            </thead>
                            <tr align="center" v-for="(select, index) in selectPipe" :key="index">
                                <td align="left"> {{select.MaterialName}}</td>
                                <td>NT$ {{select.Steel}}</td>
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
                                <td>NT$ {{select.Cost}}</td>
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
                                    <input type="text" value="" v-model="PipeSpeed" placeholder="請輸入速度性">
                                </td>
                                <td>
                                    <input type="text" value="" v-model="PipeStructuralRisk" placeholder="請輸入結構風險">
                                </td>
                                <td>
                                    <input type="text" value="" v-model="PipeCorrosive" placeholder="請輸入腐蝕性">
                                </td>
                                <td>
                                    <input type="text" value="" v-model="PipeWeightiness" placeholder="請輸入重量性">
                                </td>
                                <td>
                                    <input type="text" value="" v-model="PipeCost" placeholder="請輸入成本性">
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

                    </div>

                </div>
            </div>
            <div class="col-xl-12">
                <!-- 型 材 製 程 成 本 分 析 -->
                <div class="card mb-4">
                    <div class="card-header">
                        <b-icon icon="building"></b-icon>
                        型 材 製 程 成 本 分 析
                    </div>

                    <table style="border:1px solid black; font-size: 1.5vmin" border='1'>
                        <thead class="table-active">
                            <tr align="center">
                                <td> 勾選 </td>
                                <td> 材料名稱 </td>
                                <td> 鋼料 </td>
                                <td> 高強材 </td>
                                <td> 鋼胚 </td>
                                <td> 熱軋鋼板 </td>
                                <td> 冷軋鋼板 </td>
                                <td> 連續熱浸鍍鋅 </td>
                                <td> 連續烤漆 </td>
                                <td> 冷彎成形</td>
                                <td> 銲接</td>
                                <td> 加工 </td>
                                <td> 後熱浸鍍鋅 </td>
                                <td> 鍍鋁鋅 </td>
                                <td> 鍍鎂鋁鋅 </td>
                                <td> 後烤漆 </td>
                                <td> 速度性 </td>
                                <td> 結構風險 </td>
                                <td> 腐蝕性 </td>
                                <td> 重量性 </td>
                                <td> 成本性 </td>
                            </tr>
                        </thead>
                        <tr align="center" v-for="(all, index) in ProfileData" :key="index">
                            <td>
                                <input type="checkbox" :value="all.id" v-model="checkedProfile" v-on:change="updateSelectProfile">
                            </td>
                            <td align="left"> {{all.MaterialName}}</td>
                            <td>NT$ {{all.Steel}}</td>
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
                            <td>NT$ {{all.Cost}}</td>
                        </tr>
                    </table>
                    <br>
                    <h6>備註：請將欲比較的勾選</h6>

                    <!-- 型 材 製 程 比 較 分 析 -->
                    <div v-if="checkedProfile.length != 0">
                        <h5>型 材 製 程 比 較 分 析</h5>
                        <table style="border:1px solid black; font-size: 1.5vmin" border='1'>
                            <thead class="table-active">
                                <tr align="center">
                                    <td> 材料名稱 </td>
                                    <td> 鋼料 </td>
                                    <td> 高強材 </td>
                                    <td> 鋼胚 </td>
                                    <td> 熱軋鋼板 </td>
                                    <td> 冷軋鋼板 </td>
                                    <td> 連續熱浸鍍鋅 </td>
                                    <td> 連續烤漆 </td>
                                    <td> 冷彎成形</td>
                                    <td> 銲接</td>
                                    <td> 加工 </td>
                                    <td> 後熱浸鍍鋅 </td>
                                    <td> 鍍鋁鋅 </td>
                                    <td> 鍍鎂鋁鋅 </td>
                                    <td> 後烤漆 </td>
                                    <td> 速度性 </td>
                                    <td> 結構風險 </td>
                                    <td> 腐蝕性 </td>
                                    <td> 重量性 </td>
                                    <td> 成本性 </td>
                                    <td> 比較值 </td>
                                    <td> 排名 </td>
                                </tr>
                            </thead>
                            <tr align="center" v-for="(select, index) in selectProfile" :key="index">
                                <td align="left"> {{select.MaterialName}}</td>
                                <td>NT$ {{select.Steel}}</td>
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
                                <td>NT$ {{select.Cost}}</td>
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
                                    <input type="text" value="" v-model="ProfileSpeed" placeholder="請輸入速度性">
                                </td>
                                <td>
                                    <input type="text" value="" v-model="ProfileStructuralRisk" placeholder="請輸入結構風險">
                                </td>
                                <td>
                                    <input type="text" value="" v-model="ProfileCorrosive" placeholder="請輸入腐蝕性">
                                </td>
                                <td>
                                    <input type="text" value="" v-model="ProfileWeightiness" placeholder="請輸入重量性">
                                </td>
                                <td>
                                    <input type="text" value="" v-model="ProfileCost" placeholder="請輸入成本性">
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
            MaterialCostjson: [],
            PipeData:[],
            ProfileData:[],

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

        }
    },
    created:function(){  // 網頁載入時，一開始就載入
        this.getJson();
    },
    methods:{
        async getJson(){
            // 溫室構造成本
            const MaterialCostJSON = await fetch('/MaterialCostJSON',  {
                method: 'GET',
            });
            this.MaterialCostjson = await MaterialCostJSON.json();

            for (var i = 0; i < this.MaterialCostjson.length; i++) {
                if(this.MaterialCostjson[i].Type == "管材"){
                    this.PipeData.push(this.MaterialCostjson[i]);
                }else if(this.MaterialCostjson[i].Type == "型材"){
                    this.ProfileData.push(this.MaterialCostjson[i]);
                }
            }

        },updateSelectPipe(){

            this.selectPipe = [];

            for (var i = 0; i < this.PipeData.length; i++) {
                for (var j = 0; j < this.checkedPipe.length; j++) {
                    if(this.checkedPipe[j] == this.PipeData[i].id)  this.selectPipe.push(this.PipeData[i]);
                }
            }

        },updatePipeCompare(){
            this.PipeTotal = parseFloat(this.PipeSpeed) + parseFloat(this.PipeStructuralRisk) + parseFloat(this.PipeCorrosive) + parseFloat(this.PipeWeightiness) + parseFloat(this.PipeCost);

            var Compare = 0,selectComparelist = [],rank = [];
            // 計算 比較值
            for (var i = 0; i < this.selectPipe.length; i++) {
                Compare = (this.selectPipe[i].Speed * Math.floor(parseFloat(this.PipeSpeed) / this.PipeTotal * 100) / 100) + (this.selectPipe[i].StructuralRisk * Math.floor(parseFloat(this.PipeStructuralRisk) / this.PipeTotal * 100) / 100) + ( this.selectPipe[i].Corrosive * Math.floor(parseFloat(this.PipeCorrosive) / this.PipeTotal * 100) / 100) + ( this.selectPipe[i].Weight * Math.floor(parseFloat(this.PipeWeightiness) / this.PipeTotal * 100) / 100) + ( this.selectPipe[i].Cost * Math.floor(parseFloat(this.PipeCost) / this.PipeTotal * 100) / 100);
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

        },updateSelectProfile(){
            this.selectProfile = [];

            for (var i = 0; i < this.ProfileData.length; i++) {
                for (var j = 0; j < this.checkedProfile.length; j++) {
                    if(this.checkedProfile[j] == this.ProfileData[i].id)  this.selectProfile.push(this.ProfileData[i]);
                }
            }

        },updateProfileCompare(){
            this.ProfileTotal = parseFloat(this.ProfileSpeed) + parseFloat(this.ProfileStructuralRisk) + parseFloat(this.ProfileCorrosive) + parseFloat(this.ProfileWeightiness) + parseFloat(this.ProfileCost);

            var Compare = 0,selectComparelist = [],rank = [];
            // 計算 比較值
            for (var i = 0; i < this.selectProfile.length; i++) {
                Compare = (this.selectProfile[i].Speed * Math.floor(parseFloat(this.ProfileSpeed) / this.ProfileTotal * 100) / 100) + (this.selectProfile[i].StructuralRisk * Math.floor(parseFloat(this.ProfileStructuralRisk) / this.ProfileTotal * 100) / 100) + ( this.selectProfile[i].Corrosive * Math.floor(parseFloat(this.ProfileCorrosive) / this.ProfileTotal * 100) / 100) + ( this.selectProfile[i].Weight * Math.floor(parseFloat(this.ProfileWeightiness) / this.ProfileTotal * 100) / 100) + ( this.selectProfile[i].Cost * Math.floor(parseFloat(this.ProfileCost) / this.ProfileTotal * 100) / 100);
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

        },check(){

        }
    }
}
</script>

