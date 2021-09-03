<template>
    <div>
        <br>
        <h2>溫室材料成本分析</h2>
        <hr>

        <v-container-fluid>
            <div class="d-flex justify-content-around">
                <v-row>
                    <v-col md="12">
                        <div class="p-2 w-100 bd-highlight">
                            <!-- 管 材 製 程 成 本 分 析 -->
                        <b-card-group>
                            <b-card
                                header-tag="header"
                                header-text-variant="white"
                                header-bg-variant="info"
                            >
                                <template #header>
                                    <h6 class="mb-0">
                                        <b-icon icon="building"></b-icon>
                                        披 覆 材 料
                                    </h6>
                                </template>
                                <b-card-text>
                                    <table style="border:1px solid black; font-size: 1.5vmin" border='1'>
                                        <thead class="table-active">
                                            <tr align="center">
                                                <td style='width:5vmin'> 勾選 </td>
                                                <td style='width:23vmin'> 材料<br>名稱 </td>
                                                <td style='width:8vmin'> 透光<br>損失 </td>
                                                <td style='width:8vmin'> 結構<br>風險 </td>
                                                <td style='width:8vmin'> 作業<br>難度 </td>
                                                <td style='width:8vmin'> 成本性 </td>
                                                <td style='width:8vmin'> 副作用 </td>
                                            </tr>
                                        </thead>
                                        <tr align="center" v-for="(all, index) in CoatingFilmJSON" :key="index">
                                            <td><input type="checkbox" v-model="all.checked" v-on:change="updateSelectPipe(all.id,all.checked)"></td>
                                            <td align="left"> {{all.material}}-{{all.BuildItem}}</td>
                                            <td>{{all.LightLoss}}</td>
                                            <td>{{all.StructuralRisk}}</td>
                                            <td>{{all.JobDifficulty}}</td>
                                            <td>{{all.Cost}}</td>
                                            <td>{{all.SideEffect}}</td>
                                        </tr>
                                    </table>
                                    <br>

                                    <!-- 管 材 製 程 比 較 分 析 -->
                                    <div v-if="checkedglass.length != 0">
                                        <h5>披 覆 材 料</h5>
                                        <table style="border:1px solid black; font-size: 1.5vmin" border='1'>
                                            <thead class="table-active">
                                                <tr align="center">
                                                    <td style='width:8vmin'> 勾選 </td>
                                                    <td style='width:23vmin'> 材料<br>名稱 </td>
                                                    <td style='width:8vmin'> 透光<br>損失 </td>
                                                    <td style='width:8vmin'> 結構<br>風險 </td>
                                                    <td style='width:8vmin'> 作業<br>難度 </td>
                                                    <td style='width:8vmin'> 成本性 </td>
                                                    <td style='width:8vmin'> 副作用 </td>
                                                    <td style='width:6.5vmin'> 比較值 </td>
                                                    <td style='width:6.5vmin'> 排名 </td>
                                                </tr>
                                            </thead>
                                            <tr align="center" v-for="(all, index) in selectglass" :key="index">
                                                <td><input type="checkbox" v-model="all.checked" v-on:change="updatefilm(all,all.checked)"></td>
                                                <td align="left">{{all.material}}-{{all.BuildItem}}</td>
                                                <td>{{all.LightLoss}}</td>
                                                <td>{{all.StructuralRisk}}</td>
                                                <td>{{all.JobDifficulty}}</td>
                                                <td>{{all.Cost}}</td>
                                                <td>{{all.SideEffect}}</td>
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
                                                    <td> 透光損失 </td>
                                                    <td> 結構風險 </td>
                                                    <td> 作業難度 </td>
                                                    <td> 成本性 </td>
                                                    <td> 副作用 </td>
                                                </tr>
                                            </thead>
                                            <tr align="center">
                                                <td>
                                                    <v-text-field
                                                        label="請輸入透光損失"
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
                                                        label="請輸入作業難度"
                                                        v-model="PipeCorrosive"
                                                    ></v-text-field>
                                                </td>
                                                <td>
                                                    <v-text-field
                                                        label="請輸入成本性"
                                                        v-model="PipeWeightiness"
                                                    ></v-text-field>
                                                </td>
                                                <td>
                                                    <v-text-field
                                                        label="請輸入副作用"
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
                                        <br>
                                    </div>
                                </b-card-text>
                            </b-card>
                            <b-card
                                header-tag="header"
                                header-text-variant="white"
                                header-bg-variant="info"
                            >
                                <template #header>
                                    <h6 class="mb-0">
                                        <b-icon icon="building"></b-icon>
                                        科 普 披 覆 材 料
                                        <button class="btn btn-primary" v-on:click="glassshow = true,softshow = false,hardshow = false">玻璃</button>
                                        <button class="btn btn-primary" v-on:click="glassshow = false,softshow = true,hardshow = false">柔性膜</button>
                                        <button class="btn btn-primary" v-on:click="glassshow = false,softshow = false,hardshow = true">硬質板</button>
                                    </h6>
                                </template>
                                <b-card-text>
                                  <div v-html="glasscontent[0]" v-show="glassshow"></div>
                                  <div v-html="softcontent[0]" v-show="softshow"></div>
                                  <div v-html="hardcontent[0]" v-show="hardshow"></div>
                                </b-card-text>
                            </b-card>
                        </b-card-group>
                            <br>
                        </div>
                    </v-col>
                </v-row>
            </div>
        </v-container-fluid>



    </div>
</template>

<script>
import * as Film from '../../../services/user_film.js';
export default {
    data(){
        return{
            MaterialCostjson: [],
            LMEjson:[],
            USDjson:[],
            PipeData:[],
            ProfileData:[],

            USD:null,   // 美金
            SteelPrice:null, //鋼料價格

            /* LME 倫敦金屬價格 */
            MetalList:["鋁", "銅", "鋅", "鎳", "鉛", "錫", "鋁合金", "特種鋁合金", "鈷", "金", "銀", "廢鋼", "鋼筋"], // LME金屬排序
            MetalDate:null,
            MetalPrice:[],

            // 管材
            selectglass:[],
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
            CoatingFilmJSON:[],
            checkedglass:[],
            glass:[],
            SoftFilm:[],
            HardFilm:[],

            Knowledgejson:[],

            glasscontent:[],
            softcontent:[],
            hardcontent:[],

            glassshow:true,
            softshow:false,
            hardshow:false,
            FilmJson:[],
            FilmArray:[],
            filmname:[],
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

            // 溫室構造成本
            const CoatingFilmJSON = await fetch('/SimpleCoatingFilmJSON',  {
                method: 'GET',
            });
            this.CoatingFilmJSON = await CoatingFilmJSON.json();

            const Knowledge = await fetch('/KnowledgeJSON',  {
                method: 'GET',
            });
            this.Knowledgejson = await Knowledge.json();
            for(var i = 0; i < this.Knowledgejson.length; i++){
                if(this.Knowledgejson[i].name == '玻璃'){
                    this.glasscontent.push(this.Knowledgejson[i].content)
                } else if (this.Knowledgejson[i].name == '軟性薄膜'){
                    this.softcontent.push(this.Knowledgejson[i].content)
                } else if (this.Knowledgejson[i].name == '硬質塑膠'){
                    this.hardcontent.push(this.Knowledgejson[i].content)
                }
            }

            // 美金價格
            const USDJSON = await fetch('/USDPriceJSON',  {
                method: 'GET',
            });
            this.USDjson = await USDJSON.json();
            this.USD = this.USDjson[0].USD; // 抓取美金價格

            this.SteelPrice = Math.round(this.LMEjson[0][1]/this.USD)+1; //計算鋼料價格

            for (var i = 0; i < this.CoatingFilmJSON.length; i++) {

                if(this.CoatingFilmJSON[i].material){
                    this.glass.push(this.CoatingFilmJSON[i]);
                }
            }

            const F_OverPlan = await fetch('/UserFilmJson',  {
                method: 'GET',
            });
            this.FilmJson = await F_OverPlan.json();
            for(var i = 0; i < this.FilmJson.length; i++){
                if (this.FilmJson[i].uid === this.$auth.user().id){
                    this.filmname.push(this.FilmJson[i].BuildItem)
                    this.FilmJson[i].checked = true
                    this.FilmArray.push(this.FilmJson[i])
                    this.checkedglass.push(this.FilmJson[i].id)
                    this.selectglass.push(this.FilmJson[i])
                }
            }
            for (var i = 0; i < this.CoatingFilmJSON.length; i++){
                for (var j = 0; j < this.FilmJson.length; j++){
                    if (this.filmname.indexOf(this.CoatingFilmJSON[i].BuildItem) === -1){
                        this.CoatingFilmJSON[i].checked = false 
                    } else{
                        this.CoatingFilmJSON[i].checked = true
                    }
                }
            }
            

        },updateSelectPipe: async function(checkid,checktype){   // 更新所選擇的管材

            let glassname = null;
            if (checktype === true){
                this.checkedglass.push(checkid)
                for (var i = 0; i < this.CoatingFilmJSON.length; i++) {
                    if(checkid === this.CoatingFilmJSON[i].id){
                        this.CoatingFilmJSON[i].checked = false
                        this.selectglass.push(this.CoatingFilmJSON[i]);
                    } 
                }
            } else{
                this.checkedglass.splice(this.checkedglass.indexOf(checkid),1)
                for (var i = 0; i < this.CoatingFilmJSON.length; i++){
                    if (this.CoatingFilmJSON[i].id === checkid){
                        glassname = this.CoatingFilmJSON[i].BuildItem
                    }
                }
                for(var j = 0; j < this.selectglass.length; j++){
                    if (this.selectglass[j].BuildItem === glassname && this.selectglass[j].uid === this.$auth.user().id){
                        await Film.deleteFilm(this.selectglass[j].id);
                        this.selectglass.splice(j,1)
                    }
                }
            }
        },updatePipeCompare(){  // 更新所選管材的參數比較
            this.PipeTotal = parseFloat(this.PipeSpeed) + parseFloat(this.PipeStructuralRisk) + parseFloat(this.PipeCorrosive) + parseFloat(this.PipeWeightiness) + parseFloat(this.PipeCost);

            var Compare = 0,selectComparelist = [],rank = [];
            // 計算 比較值
            for (var i = 0; i < this.selectglass.length; i++) {
                Compare = (this.selectglass[i].LightLoss * Math.floor(parseFloat(this.PipeSpeed) / this.PipeTotal * 100) / 100) + (this.selectglass[i].StructuralRisk * Math.floor(parseFloat(this.PipeStructuralRisk) / this.PipeTotal * 100) / 100) + ( this.selectglass[i].JobDifficulty * Math.floor(parseFloat(this.PipeCorrosive) / this.PipeTotal * 100) / 100) + ( this.selectglass[i].Cost * Math.floor(parseFloat(this.PipeWeightiness) / this.PipeTotal * 100) / 100) + ( this.selectglass[i].SideEffect * Math.floor(parseFloat(this.PipeCost) / this.PipeTotal * 100) / 100);
                Compare = Compare.toFixed(2);
                
                rank = [];
                rank.push(this.selectglass[i].id);
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

        },
        updatefilm:async function (data,check){
            let filmname = [];
            if (check === true){
                const F_OverPlan = await fetch('/UserFilmJson',  {
                method: 'GET',
                });
                this.FilmJson = await F_OverPlan.json();
                for (var i = 0; i < this.FilmJson.length; i++){
                    if (this.FilmJson[i].uid === this.$auth.user().id){
                        filmname.push(this.FilmJson[i].BuildItem)
                    }
                }
                if (filmname.indexOf(data.BuildItem) === -1){
                    let formData = new FormData();
                    formData.append('uid',this.$auth.user().id);
                    formData.append('Expert',data.Expert);
                    formData.append('material',data.material);
                    formData.append('BuildItem',data.BuildItem);
                    formData.append('LightLoss',data.LightLoss);
                    formData.append('StructuralRisk',data.StructuralRisk);
                    formData.append('JobDifficulty',data.JobDifficulty);
                    formData.append('Cost',data.Cost);
                    formData.append('SideEffect',data.SideEffect);
                    const response = await Film.createFilm(formData);
                }
            } else {
                const F_OverPlan = await fetch('/UserFilmJson',  {
                method: 'GET',
                });
                this.FilmJson = await F_OverPlan.json();
                for (var i = 0; i < this.FilmJson.length; i++){
                    if (this.FilmJson[i].BuildItem === data.BuildItem && this.FilmJson[i].uid === this.auth.user().id){
                        await Film.deleteFilm(this.FilmJson[i].id);
                    }
                }
            }
        },
    }
}
</script>

