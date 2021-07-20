<template>
    <div>
        <br>
        <h3>光環境控制</h3>
        <hr>

        <b-card-group deck>
            <!-- 種植植物生長光環境與種植地區環境分析 -->
            <b-card
                header-tag="header"
                header-text-variant="white"
                header-bg-variant="info"
            >
                <template #header>
                    <h6 class="mb-0"><b-icon icon="flower1"></b-icon> 種植植物生長光環境與種植地區環境分析</h6>
                </template>
                <b-card-text>
                    <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">生長光環境</span></p>
                    <b-select v-model="cropIdx" v-on:change="updateCrop" style="width:20vmin" >
                        <option v-for="(crop, index) in CropOrder" :value="index" :key="index">
                            {{crop}}
                        </option>
                    </b-select>

                    <b-select v-model="plantIdx" v-on:change="updatePlant" style="width:20vmin" >
                        <option v-for="(plant, index) in GrowPlants" :value="index" :key="index">
                            {{plant}}
                        </option>
                    </b-select>
                    <br>
                    <br>
                    <table class="separate" style="border:1px solid black;" border='1' width="100%">
                        <tr align="center" class="table-active">
                            <td colspan="2">好光性</td>
                            <td colspan="2">光週期</td>
                            <td colspan="2">光照度</td>
                        </tr>
                        <tr align="center">
                            <td id="Goodlight" colspan="2"> {{Goodlight}} </td>
                            <td id="Photoperiod" colspan="2"> {{Photoperiod}} </td>
                            <td id="Illuminance" colspan="2"> {{Illuminance}} </td>
                        </tr>
                        <tr align="center" class="table-active">
                            <td colspan="2">光合光子密度</td>
                            <td colspan="2">光飽和點(klx)</td>
                            <td colspan="2">光補償點(klx)</td>
                        </tr>
                        <tr align="center">
                            <td id="PPFD" colspan="2"> {{PPFD}} </td>
                            <td id="LightSaturationPoint" colspan="2"> {{LightSaturationPoint}} </td>
                            <td id="LightCompensationPoint" colspan="2"> {{LightCompensationPoint}} </td>
                        </tr>
                    </table>

                    <br>
                    <br>
                    <h6>備註： - 為尚無資料</h6>

                </b-card-text>
            </b-card>
            <b-card
                header-tag="header"
                header-text-variant="white"
                header-bg-variant="info"
            >
                <template #header>

                    <h6 class="mb-0"><b-icon icon="bar-chart-fill"></b-icon> 種植地區環境分析</h6>
                </template>
                <b-card-text>
                    <v-container-fluid>
                        <v-row>
                            <v-col md="12">
                                <p>
                                    <span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">光資源</span>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <b-select v-model="cityIdx" v-on:change="updateCity" style="width:20vmin" >
                                        <option v-for="(city, index) in City" :value="index" :key="index">
                                            {{city}}
                                        </option>
                                    </b-select>

                                    <b-select v-model="regionIdx" v-on:change="updateRegion" style="width:20vmin" >
                                        <option v-for="(region, index) in Region" :value="index" :key="index">
                                            {{region}}
                                        </option>
                                    </b-select>
                                </p>
                                <line-chart xtitle="月份" ytitle="日照時數 & 全天空日射量" :data="GloblRadSunShineChartData" height="30vmin" :colors="['Gold', 'DarkTurquoise']" :curve="false"></line-chart>
                            </v-col>
                        </v-row>
                    </v-container-fluid>
                </b-card-text>

            </b-card>
        </b-card-group>
        <b-card-group>
            <b-card
                header-tag="header"
                header-text-variant="white"
                header-bg-variant="info"
            >
                <template #header>
                    <h6 class="mb-0"><b-icon icon="flower1"></b-icon>光環境-設備控制</h6>
                </template>
                <table style="border:1px solid black; font-size: 1.5vmin" border='1'>
                    <thead class="table-active">
                        <tr align="center">
                            <td style='width:5vmin'> 勾選 </td>
                            <td style='width:23vmin'> 材料名稱 </td>
                            <td style='width:8vmin'> 品質控制差異 </td>
                            <td style='width:8vmin'> 結構風險 </td>
                            <td style='width:8vmin'> 作業難易 </td>
                            <td style='width:8vmin'> 成本性 </td>
                            <td style='width:8vmin'> 副作用 </td>
                        </tr>
                    </thead>
                    <tr align="center" v-for="(all, index) in LightDesignData" :key="index">
                        <td>
                            <input type="checkbox" :value="all.id" v-model="checkedLight" v-on:change="updateSelectLight">
                        </td>
                        
                        <td>{{all.ControlItem}}-{{all.ControlSystem}}</td>
                        <td>{{all.QualityControl}}</td>
                        <td>{{all.StructuralRisk}}</td>
                        <td>{{all.JobDifficulty}}</td>
                        <td>{{all.Cost}}</td>
                        <td>{{all.SideEffect}} </td>
                    </tr>
                </table>
                
            </b-card>
            <b-card
                header-tag="header"
                header-text-variant="white"
                header-bg-variant="info"
            >
                <template #header>
                    <h6 class="mb-0"><b-icon icon="flower1"></b-icon>光環境-遮光控制</h6>
                </template>

                <div v-if="checkedLight.length != 0">
                    <table style="border:1px solid black; font-size: 1.5vmin" border='1'>
                        <thead class="table-active">
                            <tr align="center">
                                <td style='width:23vmin'> 材料名稱 </td>
                                <td style='width:8vmin'> 品質控制差異 </td>
                                <td style='width:8vmin'> 結構風險 </td>
                                <td style='width:8vmin'> 作業難易 </td>
                                <td style='width:8vmin'> 成本性 </td>
                                <td style='width:8vmin'> 副作用 </td>
                                <td style='width:6.5vmin'> 比較值 </td>
                                <td style='width:6.5vmin'> 排名 </td>
                            </tr>
                        </thead>
                        <tr align="center" v-for="(select, index) in selectLight" :key="index">
                            <td>{{select.ControlItem}}-{{select.ControlSystem}}</td>
                            <td>{{select.QualityControl}}</td>
                            <td>{{select.StructuralRisk}}</td>
                            <td>{{select.JobDifficulty}}</td>
                            <td>{{select.Cost}}</td>
                            <td>{{select.SideEffect}} </td>
                            <td>{{selectLightRank[index]}}</td>
                            <td>{{selectLightRankValue[index]}}</td>
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
                                <td> 品質差異 </td>
                                <td> 結構風險 </td>
                                <td> 作業難度 </td>
                                <td> 成本性 </td>
                                <td> 副作用 </td>
                            </tr>
                        </thead>
                        <tr align="center">
                            <td>
                                <v-text-field
                                    label="品質差異"
                                    v-model="ProfileSpeed"
                                ></v-text-field>
                            </td>
                            <td>
                                <v-text-field
                                    label="結構風險"
                                    v-model="ProfileStructuralRisk"
                                ></v-text-field>
                            </td>
                            <td>
                                <v-text-field
                                    label="作業難度"
                                    v-model="ProfileCorrosive"
                                ></v-text-field>
                            </td>
                            <td>
                                <v-text-field
                                    label="成本性"
                                    v-model="ProfileWeightiness"
                                ></v-text-field>
                            </td>
                            <td>
                                <v-text-field
                                    label="副作用"
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

                </div>
            </b-card>
        </b-card-group>

    </div>

</template>

<script>

export default {
    data(){
        return{
            tabIndex: 0,
            vegetablejson:[],
            regionalwindspeedjson:[],   // 縣市地區資料

            LightDesignData: [],    //光設計


            /* 種植植物生長環境需求*/
            CropOrder:["==請選擇作物分類==","根菜","莖菜","葉菜","花菜","果菜","糧食","水果","花"], // 作物分類的選單陣列表
            cropIdx: 0, // 所選作物的id
            cropIdx1: 0, // 所選作物的id
            cropIdx2: 0, // 所選作物的id
            cropIdx3: 0, // 所選作物的id
            cropIdx4: 0, // 所選作物的id

            selectCrop: null, // 所選作物的名稱
            GrowPlants:['==請選擇作物==',],
            plantIdx: 0, // 所選作物的id
            selectplant: null, // 所選作物的名稱
            Goodlight: '-',
            Photoperiod: '-',
            Illuminance: '-',
            PPFD: '-',
            LightSaturationPoint: '-',
            LightCompensationPoint: '-',
            
            /* 種植地區環境分析 */
            City:['==請選擇縣市==',],   // 縣市選單的陣列表
            cityIdx: 0, // 所選縣市的id
            selectCity: '-', // 所選縣市的名稱

            Region:['==請選擇地區==',], // 地區選單的陣列表
            regionIdx: 0,   // 所選地區的id
            selectRegion: '-', // 所選地區的名稱
            StrHighTemperature:[0,0,0,0,0,0,0,0,0,0,0,0], // 字串切割  地區最高月均溫
            StrLowTemperature:[0,0,0,0,0,0,0,0,0,0,0,0], // 字串切割  地區最低月均溫

            SelectTerrain:0, // 選擇地形
            SelectLandform:0, // 選擇地貌

            GloblRad:null, // 全天空日射量
            SunShine:null, // 日照量
            GloblRadSunShineChartData:[
                {name: "日照時數(小時)", data: {"1月":null,"2月":null,"3月":null,"4月":null,"5月":null,"6月":null,"7月":null,"8月":null,"9月":null,"10月":null,"11月":null,"12月":null}},
                {name: "全天空日射量(MJ/㎡)", data: {"1月":null,"2月":null,"3月":null,"4月":null,"5月":null,"6月":null,"7月":null,"8月":null,"9月":null,"10月":null,"11月":null,"12月":null}},
            ],  // 日照時數與全天空日射量 圖表用

            checkedLight:[],
            LightData:[],
            selectLight:[],
            selectLightRank:[],
            selectLightRankValue:[],
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
        async getJson(){    //取的資料庫資料，將資料轉成JSON
            // 作物資訊資料表
            const Vegetable = await fetch('/VegetableJSON',  {
                method: 'GET',
            });
            this.vegetablejson = await Vegetable.json();

            // 縣市地區資料
            const RegionalWindSpeed = await fetch('/RegionalWindSpeedJSON',  {
                method: 'GET',
            });
            this.regionalwindspeedjson = await RegionalWindSpeed.json();

            // 光環境
            const Light_info = await fetch('/LightJson',  {
                method: 'GET',
            });
            this.LightDesignData = await Light_info.json();

            var filterfalg = false;
            // 篩選重複出現的縣市
            for(var i = 0 ; i < this.regionalwindspeedjson.length ; i++){
                filterfalg = false;
                for(var j = 0;j < this.City.length ; j++){
                    if(this.regionalwindspeedjson[i].County == this.City[j]) filterfalg = true;
                }
                if(!filterfalg) this.City.push(this.regionalwindspeedjson[i].County);

            }
            for (var i = 0; i < this.LightDesignData.length; i++) {
                
                this.LightData.push(this.LightDesignData[i]);
            }

        },updateCrop(){     // 更新所選擇的作物分類
            // 從所選的作物id 找到 所選作物分類
            for(var i = 0 ; i < this.CropOrder.length ; i++){
                if(i == this.cropIdx)    this.selectCrop = this.CropOrder[i];
            }

            this.GrowPlants = ['==請選擇作物==',];  // 作物資料初始化
            this.plantIdx = 0;
            for(var i = 0 ; i < this.vegetablejson.length ; i++){
                if(this.selectCrop == "==請選擇作物分類==") this.CropSelect = this.vegetablejson;
                if(this.vegetablejson[i].classification == this.selectCrop)    this.GrowPlants.push(this.vegetablejson[i].VegetableTypes);
            }

        },updatePlant(){    // 更新所選擇的作物
            // 從所選的作物id 找到 所選作物分類
            for(var i = 0 ; i < this.GrowPlants.length ; i++){
                if(i == this.plantIdx)    this.selectplant = this.GrowPlants[i];
            }

            // 找出所選資料的data
            for(var i = 0 ; i < this.vegetablejson.length ; i++){
                if(this.vegetablejson[i].VegetableTypes == this.selectplant){
                    this.Goodlight = this.vegetablejson[i].Goodlight;
                    this.Photoperiod = this.vegetablejson[i].Photoperiod;
                    this.Illuminance = this.vegetablejson[i].Illuminance;
                    this.PPFD = this.vegetablejson[i].PPFD;
                    this.LightSaturationPoint = this.vegetablejson[i].LightSaturationPoint;
                    this.LightCompensationPoint = this.vegetablejson[i].LightCompensationPoint;
                    break;
                }
            }

        },updateCity(){     // 更新所選擇的縣市
            // 從所選的縣市id 找到 所選的縣市名稱
            for(var i = 0 ; i < this.City.length ; i++){
                if(i == this.cityIdx)    this.selectCity = this.City[i];
            }

            // 將地區資料初始化
            this.selectRegion = null;
            this.SpeedPerSecond = null;
            this.Series = null;
            this.Wind = null;
            this.regionIdx = 0;
            this.LandingProbability = null,
            this.PathProbability = null,
            this.Landing = null,
            this.Path = null,
            this.Region = ['==請選擇地區=='],
            this.GloblRad = null,
            this.SunShine = null;

            // 篩選所選縣市的地區
            for(var i = 0 ; i < this.regionalwindspeedjson.length ; i++){
                if(this.regionalwindspeedjson[i].County == this.selectCity){
                    this.Region.push(this.regionalwindspeedjson[i].Region);
                }
            }

        },updateRegion(){   // 更新所選擇的地區
            // 從所選的地區id 找到 所選的地區名稱
            for(var i = 0 ; i < this.Region.length ; i++){
                if(i == this.regionIdx)    this.selectRegion = this.Region[i];
            }

            var StrGloblRad,StrSunShine; // 字串切割：全天空日射量、日照量
            // 取得 風速、風力登陸分析、風力路徑分析
            for(var i = 0 ; i < this.regionalwindspeedjson.length ; i++){
                if((this.selectCity == this.regionalwindspeedjson[i].County ) && (this.selectRegion == this.regionalwindspeedjson[i].Region )){
                    this.SpeedPerSecond = this.regionalwindspeedjson[i].SpeedPerSecond;
                    StrGloblRad = this.regionalwindspeedjson[i].monthGloblRad.split(",");
                    StrSunShine = this.regionalwindspeedjson[i].monthSunShine.split(",");

                    this.StrHighTemperature = this.regionalwindspeedjson[i].monthHighTemperature.split(",");
                    this.StrLowTemperature = this.regionalwindspeedjson[i].monthLowTemperature.split(",");
                    break;
                }
            }

            // 更新 日照時數與全天空日射量 的圖表
            this.GloblRadSunShineChartData = [
                {name: "日照時數(小時)", data: {"1月":StrGloblRad[0],"2月":StrGloblRad[1],"3月":StrGloblRad[2],"4月":StrGloblRad[3],"5月":StrGloblRad[4],"6月":StrGloblRad[5],"7月":StrGloblRad[6],"8月":StrGloblRad[7],"9月":StrGloblRad[8],"10月":StrGloblRad[9],"11月":StrGloblRad[10],"12月":StrGloblRad[11]}},
                {name: "全天空日射量(MJ/㎡)", data: {"1月":StrSunShine[0],"2月":StrSunShine[1],"3月":StrSunShine[2],"4月":StrSunShine[3],"5月":StrSunShine[4],"6月":StrSunShine[5],"7月":StrSunShine[6],"8月":StrSunShine[7],"9月":StrSunShine[8],"10月":StrSunShine[9],"11月":StrSunShine[10],"12月":StrSunShine[11]}},
            ];

        },updateSelectLight(){    // 更新所選擇的型材
            this.selectLight = [];

            for (var i = 0; i < this.LightData.length; i++) {
                for (var j = 0; j < this.checkedLight.length; j++) {
                    if(this.checkedLight[j] == this.LightData[i].id)  this.selectLight.push(this.LightData[i]);
                }

            }

        },updateProfileCompare(){   // 更新所選型材的參數比較
            this.ProfileTotal = parseFloat(this.ProfileSpeed) + parseFloat(this.ProfileStructuralRisk) + parseFloat(this.ProfileCorrosive) + parseFloat(this.ProfileWeightiness) + parseFloat(this.ProfileCost);

            var Compare = 0,selectComparelist = [],rank = [];
            // 計算 比較值
            for (var i = 0; i < this.selectLight.length; i++) {
                Compare = (this.selectLight[i].QualityControl * Math.floor(parseFloat(this.ProfileSpeed) / this.ProfileTotal * 100) / 100) + (this.selectLight[i].StructuralRisk * Math.floor(parseFloat(this.ProfileStructuralRisk) / this.ProfileTotal * 100) / 100) + ( this.selectLight[i].JobDifficulty * Math.floor(parseFloat(this.ProfileCorrosive) / this.ProfileTotal * 100) / 100) + ( this.selectLight[i].Cost * Math.floor(parseFloat(this.ProfileWeightiness) / this.ProfileTotal * 100) / 100) + ( this.selectLight[i].SideEffect * Math.floor(parseFloat(this.ProfileCost) / this.ProfileTotal * 100) / 100);
                Compare = Compare.toFixed(2);

                rank = [];
                rank.push(this.selectLight[i].id);
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

            this.selectLightRank = [],  // 排名
            this.selectLightRankValue = []; // 排名值

            /* 將所勾選的 型材 比較值與排名 顯示 */
            for (var i = 0; i < selectComparelist.length; i++) {
                this.selectLightRankValue.push(selectComparelist[i][2]);
                this.selectLightRank.push(selectComparelist[i][1]);
            }

        }
    }
}

</script>