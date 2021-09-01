<template>
    <div>
        <br>
        <h3>
            溫環境控制
        </h3>

        <hr>

        <b-card-group deck>
            <!-- 種植植物生長溫環境種與植地區環境分析 -->
            <b-card
                header-tag="header"
                header-text-variant="white"
                header-bg-variant="info"
            >
                <template #header>
                    <h6 class="mb-0"><b-icon icon="flower1"></b-icon> 溫環境需求</h6>
                </template>
                <b-card-text>
                    <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">作物生長溫環境</span></p>
                    <b-select v-model="cropIdx" v-on:change="updateCrop" style="width:20vmin" >
                        <option v-for="(crop, index) in CropOrder" :value="crop" :key="index">
                            {{crop}}
                        </option>
                    </b-select>

                    <b-select v-model="plantIdx" v-on:change="updatePlant" style="width:20vmin" >
                        <option v-for="(plant, index) in GrowPlants" :value="plant" :key="index">
                            {{plant}}
                        </option>
                    </b-select>

                    <br>
                    <br>
                    <table class="separate" style="border:1px solid black;" border='1' width="100%">
                        <tr align="center" class="table-active">
                            <td colspan="6">溫度適應性</td>
                        </tr>
                        <tr align="center">
                            <td id="Temperatureadaptability" colspan="6"> {{Temperatureadaptability}} </td>
                        </tr>
                        <tr align="center" class="table-active">
                            <td colspan="3">生長溫度</td>
                            <td colspan="3">發芽溫度</td>
                        </tr>
                        <tr align="center" class="table-active">
                            <td>最低溫</td>
                            <td>最適溫</td>
                            <td>最高溫</td>
                            <td>最低溫</td>
                            <td>最適溫</td>
                            <td>最高溫</td>
                        </tr>
                        <tr align="center">
                            <td id="LowestGrowthTemperature"> {{LowestGrowthTemperature}} </td>
                            <td id="OptimalGrowthTemperature"> {{OptimalGrowthTemperature}} </td>
                            <td id="HighestGrowthTemperature"> {{HighestGrowthTemperature}} </td>
                            <td id="LowestGerminationTemperature"> {{LowestGerminationTemperature}} </td>
                            <td id="OptimumGerminationTemperature"> {{OptimumGerminationTemperature}} </td>
                            <td id="HighestGerminationTemperature"> {{HighestGerminationTemperature}} </td>
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
                    <h6 class="mb-0"><b-icon icon="bar-chart-fill"></b-icon> 溫環境分析</h6>
                </template>
                <b-card-text>


                    <p>
                        <span class="badge badge-pill badge-secondary" style="font-size: 2vmin">溫度分析圖</span>
                        <b-select v-model="cityIdx" v-on:change="updateCity" style="width:20vmin" >
                            <option v-for="(city, index) in City" :value="city" :key="index">

                                {{city}}
                            </option>
                        </b-select>

                        <b-select v-model="regionIdx" v-on:change="updateRegion" style="width:20vmin" >

                            <option v-for="(region, index) in Region" :value="region" :key="index">

                                {{region}}
                            </option>
                        </b-select>
                    </p>

                    <line-chart xtitle="月份" ytitle="溫度" :discrete="true" :data="CropTemperature" height="30vmin" :colors="['DodgerBlue', 'Red', 'LightSalmon', 'LightSalmon']" :curve="false"></line-chart>

                    <p><span class="badge badge-pill badge-secondary" style="font-size: 2vmin">各月作物與地區適合種植高低溫差值</span></p>
                    <table style="border:1px solid black;" border='1'>
                        <tr align="center">
                            <td></td>
                            <td>1月份</td>
                            <td>2月份</td>
                            <td>3月份</td>
                            <td>4月份</td>
                            <td>5月份</td>
                            <td>6月份</td>
                            <td>7月份</td>
                            <td>8月份</td>
                            <td>9月份</td>
                            <td>10月份</td>
                            <td>11月份</td>
                            <td>12月份</td>
                            <td>合計</td>
                        </tr>
                        <tr align="center" id="HighTemperatureDifference">
                            <td>高溫差</td>
                            <td v-for="(temperature, index) in StrHighTemperature" :key="index">
                                {{parseFloat((parseFloat(StrLowTemperature[index])+parseFloat(StrHighTemperature[index]))/2)-StrOptimalTemperature[1]+3}}
                            </td>
                            <td rowspan="2">{{ total_temp_high }}</td>
                        </tr>
                        <tr align="center" id="HighApproach">
                            <td>環控</td>
                            <td v-for="(temperature, index) in StrHighTemperature" :key="index" v-if="parseFloat((parseFloat(StrLowTemperature[index])+parseFloat(StrHighTemperature[index]))/2)-StrOptimalTemperature[1]+3 > 0" >
                                需降溫
                            </td>
                            <td v-else>
                                -
                            </td>

                        </tr>
                        <tr align="center">
                            <td>低溫差</td>
                            <td v-for="(temperature, index) in StrLowTemperature" :key="index">
                                {{parseFloat((parseFloat(StrLowTemperature[index])+parseFloat(StrHighTemperature[index]))/2)-StrOptimalTemperature[0]+3}}
                            </td>
                            <td rowspan="2">{{ total_temp_low }}</td>
                        </tr>
                        <tr align="center">
                            <td>環控</td>
                            <td v-for="(temperature, index) in StrLowTemperature" :key="index" v-if="parseFloat((parseFloat(StrLowTemperature[index])+parseFloat(StrHighTemperature[index]))/2)-StrOptimalTemperature[0]+3 < 0">
                                需加溫
                            </td>
                            <td v-else>
                                -
                            </td>
                        </tr>
                    </table>
                    <h6>備註： - 為不須動作</h6>

                </b-card-text>

            </b-card>
            <!-- <b-card
                header-tag="header"ㄢ
                header-text-variant="white"
                header-bg-variant="info"
            >
                <template #header>
                    <h6 class="mb-0"><b-icon icon="flower1"></b-icon> 溫環境需求</h6>
                </template>
                <b-card-text>

                </b-card-text>
            </b-card> -->
        </b-card-group>
    </div>

</template>

<script>
import * as SaveOverPlan from '../../../services/saveoverplan_service.js';
export default {
    data(){
        return {
            tabIndex: 0,
            vegetablejson:[],
            windspeedjson:[],  // 風速對照表
            regionalwindspeedjson:[],   // 縣市地區資料

            /* 種植植物生長環境需求*/
            CropOrder:["==請選擇作物分類==","根菜","莖菜","葉菜","花菜","果菜","糧食","水果","花"], // 作物分類的選單陣列表
            cropIdx: null, // 所選作物的id
            selectCrop: null, // 所選作物的名稱
            GrowPlants:['==請選擇作物==',],
            plantIdx: null, // 所選作物的id
            selectplant: null, // 所選作物的名稱
            PPFD: '-',
            Temperatureadaptability: '-',
            LowestGrowthTemperature: '-',
            OptimalGrowthTemperature: '-',
            HighestGrowthTemperature: '-',
            LowestGerminationTemperature: '-',
            OptimumGerminationTemperature: '-',
            HighestGerminationTemperature: '-',
            CropTemperature:[
                {name: "地區平均月均溫", data: {"1月":null,"2月":null,"3月":null,"4月":null,"5月":null,"6月":null,"7月":null,"8月":null,"9月":null,"10月":null,"11月":null,"12月":null}},
                //{name: "地區最高月均溫", data: {"1月":null,"2月":null,"3月":null,"4月":null,"5月":null,"6月":null,"7月":null,"8月":null,"9月":null,"10月":null,"11月":null,"12月":null}},
                {name: "作物生長最適溫區間", data: {"1月":null,"2月":null,"3月":null,"4月":null,"5月":null,"6月":null,"7月":null,"8月":null,"9月":null,"10月":null,"11月":null,"12月":null}},
                {name: "作物生長最適溫區間", data: {"1月":null,"2月":null,"3月":null,"4月":null,"5月":null,"6月":null,"7月":null,"8月":null,"9月":null,"10月":null,"11月":null,"12月":null}},
            ],  // 所選作物的種植最適溫度 圖表用
            StrOptimalTemperature:[0,0], // 字串切割  作物生長最適溫區間

            /* 種植地區環境分析 */
            City:['==請選擇縣市==',],   // 縣市選單的陣列表
            cityIdx: null, // 所選縣市的id
            selectCity: '-', // 所選縣市的名稱

            Region:['==請選擇地區==',], // 地區選單的陣列表
            regionIdx: null,   // 所選地區的id
            selectRegion: '-', // 所選地區的名稱
            StrHighTemperature:[0,0,0,0,0,0,0,0,0,0,0,0], // 字串切割  地區最高月均溫
            StrLowTemperature:[0,0,0,0,0,0,0,0,0,0,0,0], // 字串切割  地區最低月均溫

            SelectTerrain:0, // 選擇地形
            SelectLandform:0, // 選擇地貌

            Series: '-', // 風力級數
            Wind: '-',   // 風的名稱
            SpeedPerSecond: '-',    // 風速
            overplanArray:[],
            OverPlanJson:[],
            now_user:null,
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

            // 風速對照表
            const WindSpeed = await fetch('/WindSpeedControlJSON',  {
                method: 'GET',
            });
            this.windspeedjson = await WindSpeed.json();

            // 縣市地區資料
            const RegionalWindSpeed = await fetch('/RegionalWindSpeedJSON',  {
                method: 'GET',
            });
            this.regionalwindspeedjson = await RegionalWindSpeed.json();

            // 風力登陸分析、風力路徑分析
            const WindLandingAndPath = await fetch('/WindLandingAndPathJSON',  {
                method: 'GET',
            });
            this.windlandingandpathjson = await WindLandingAndPath.json();

            const J_OverPlan = await fetch('/OverPlanJson',  {
            method: 'GET',
            });
            this.OverPlanJson = await J_OverPlan.json();
                for(var i = 0; i < this.OverPlanJson.length; i++){
                    if (this.OverPlanJson[i].uid === this.$auth.user().id){
                        this.overplanArray.push(this.OverPlanJson[i])
                        this.now_user = this.OverPlanJson[i].pid
                    }
            }
            this.cropIdx = this.overplanArray[0].palntclass
            this.cityIdx = this.overplanArray[0].localcity

            for(var i = 0 ; i < this.CropOrder.length ; i++){
                if(this.CropOrder[i] == this.cropIdx)    this.selectCrop = this.CropOrder[i];
            }
            this.GrowPlants = ['==請選擇作物==',];  // 作物資料初始化
            for(var i = 0 ; i < this.vegetablejson.length ; i++){
                if(this.selectCrop == "==請選擇作物分類==") this.CropSelect = this.vegetablejson;
                if(this.vegetablejson[i].classification == this.selectCrop)    this.GrowPlants.push(this.vegetablejson[i].VegetableTypes);
            }
            this.plantIdx = this.overplanArray[0].cropplant

            // 從所選的作物id 找到 所選作物分類
            for(var i = 0 ; i < this.GrowPlants.length ; i++){
                if(this.GrowPlants[i] == this.plantIdx)    this.selectplant = this.GrowPlants[i];
            }

            // 找出所選資料的data
            for(var i = 0 ; i < this.vegetablejson.length ; i++){
                if(this.vegetablejson[i].VegetableTypes == this.selectplant){
                    this.PPFD = this.vegetablejson[i].PPFD;
                    this.Temperatureadaptability = this.vegetablejson[i].Temperatureadaptability;
                    this.LowestGrowthTemperature = this.vegetablejson[i].LowestGrowthTemperature;
                    this.OptimalGrowthTemperature = this.vegetablejson[i].OptimalGrowthTemperature;
                    this.HighestGrowthTemperature = this.vegetablejson[i].HighestGrowthTemperature;
                    this.LowestGerminationTemperature = this.vegetablejson[i].LowestGerminationTemperature;
                    this.OptimumGerminationTemperature = this.vegetablejson[i].OptimumGerminationTemperature;
                    this.HighestGerminationTemperature = this.vegetablejson[i].HighestGerminationTemperature;
                    this.StrOptimalTemperature = this.OptimalGrowthTemperature.split("~");
                    break;
                }
            }

            // 更新 作物生長最適溫最高區間 的圖表
            this.CropTemperature[1].data = {"1月":this.StrOptimalTemperature[0],"2月":this.StrOptimalTemperature[0],"3月":this.StrOptimalTemperature[0],"4月":this.StrOptimalTemperature[0],"5月":this.StrOptimalTemperature[0],"6月":this.StrOptimalTemperature[0],"7月":this.StrOptimalTemperature[0],"8月":this.StrOptimalTemperature[0],"9月":this.StrOptimalTemperature[0],"10月":this.StrOptimalTemperature[0],"11月":this.StrOptimalTemperature[0],"12月":this.StrOptimalTemperature[0]};
            // 更新 作物生長最適溫最低區間 的圖表
            this.CropTemperature[2].data = {"1月":this.StrOptimalTemperature[1],"2月":this.StrOptimalTemperature[1],"3月":this.StrOptimalTemperature[1],"4月":this.StrOptimalTemperature[1],"5月":this.StrOptimalTemperature[1],"6月":this.StrOptimalTemperature[1],"7月":this.StrOptimalTemperature[1],"8月":this.StrOptimalTemperature[1],"9月":this.StrOptimalTemperature[1],"10月":this.StrOptimalTemperature[1],"11月":this.StrOptimalTemperature[1],"12月":this.StrOptimalTemperature[1]};

            var filterfalg = false;
            // 篩選重複出現的縣市
            for(var i = 0 ; i < this.regionalwindspeedjson.length ; i++){
                filterfalg = false;
                for(var j = 0;j < this.City.length ; j++){
                    if(this.regionalwindspeedjson[i].County == this.City[j]) filterfalg = true;
                }
                if(!filterfalg) this.City.push(this.regionalwindspeedjson[i].County);

            }

            for(var i = 0 ; i < this.City.length ; i++){
                if(this.City[i] == this.cityIdx)    this.selectCity = this.City[i];
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
            this.regionIdx = this.overplanArray[0].localarea


            // 從所選的地區id 找到 所選的地區名稱
            for(var i = 0 ; i < this.Region.length ; i++){
                if(this.Region[i] == this.regionIdx)    this.selectRegion = this.Region[i];
            }

            // 取得 風速、風力登陸分析、風力路徑分析
            for(var i = 0 ; i < this.regionalwindspeedjson.length ; i++){
                if((this.selectCity == this.regionalwindspeedjson[i].County ) && (this.selectRegion == this.regionalwindspeedjson[i].Region )){
                    this.SpeedPerSecond = this.regionalwindspeedjson[i].SpeedPerSecond;

                    this.StrHighTemperature = this.regionalwindspeedjson[i].monthHighTemperature.split(",");
                    this.StrLowTemperature = this.regionalwindspeedjson[i].monthLowTemperature.split(",");
                    break;
                }
            }

            // 更新 地區最低月均溫 的圖表
            this.CropTemperature[0].data = {
                "1月":parseFloat((parseInt(this.StrLowTemperature[0])+parseInt(this.StrHighTemperature[0]))/2)+3,
                "2月":parseFloat((parseInt(this.StrLowTemperature[1])+parseInt(this.StrHighTemperature[1]))/2)+3,
                "3月":parseFloat((parseInt(this.StrLowTemperature[2])+parseInt(this.StrHighTemperature[2]))/2)+3,
                "4月":parseFloat((parseInt(this.StrLowTemperature[3])+parseInt(this.StrHighTemperature[3]))/2)+3,
                "5月":parseFloat((parseInt(this.StrLowTemperature[4])+parseInt(this.StrHighTemperature[4]))/2)+3,
                "6月":parseFloat((parseInt(this.StrLowTemperature[5])+parseInt(this.StrHighTemperature[5]))/2)+3,
                "7月":parseFloat((parseInt(this.StrLowTemperature[6])+parseInt(this.StrHighTemperature[6]))/2)+3,
                "8月":parseFloat((parseInt(this.StrLowTemperature[7])+parseInt(this.StrHighTemperature[7]))/2)+3,
                "9月":parseFloat((parseInt(this.StrLowTemperature[8])+parseInt(this.StrHighTemperature[8]))/2)+3,
                "10月":parseFloat((parseInt(this.StrLowTemperature[9])+parseInt(this.StrHighTemperature[9]))/2)+3,
                "11月":parseFloat((parseInt(this.StrLowTemperature[10])+parseInt(this.StrHighTemperature[10]))/2)+3,
                "12月":parseFloat((parseInt(this.StrLowTemperature[11])+parseInt(this.StrHighTemperature[11]))/2)+3,
            };
            this.total_temp_high = 0;
            this.total_temp_low = 0;
            for(var i = 0 ; i < 12 ; i++){
                if (parseFloat((parseFloat(this.StrLowTemperature[i])+parseFloat(this.StrHighTemperature[i]))/2)-this.StrOptimalTemperature[1]+3 > 0){
                    this.total_temp_high += parseFloat(parseFloat((parseFloat(this.StrHighTemperature[i])+parseFloat(this.StrLowTemperature[i]))/2)-this.StrOptimalTemperature[1]+3)
                }
                
                if (parseFloat((parseFloat(this.StrLowTemperature[i])+parseFloat(this.StrHighTemperature[i]))/2)-this.StrOptimalTemperature[0]+3 < 0){  
                    this.total_temp_low += parseFloat(parseFloat((parseFloat(this.StrLowTemperature[i])+parseFloat(this.StrHighTemperature[i]))/2)-this.StrOptimalTemperature[0]+3)
                }
            }


            // 取得 級數 & 風名
            for(var i = 0 ; i < this.windspeedjson.length ; i++){
                if((this.SpeedPerSecond < this.windspeedjson[i].SpeedMax) && (this.SpeedPerSecond > this.windspeedjson[i].SpeedMin)){
                    this.Series = this.windspeedjson[i].Series;
                    this.Wind = this.windspeedjson[i].Wind;
                }else if(this.SpeedPerSecond > this.windspeedjson[i].SpeedMax){
                    this.Series = this.windspeedjson[i].Series;
                    this.Wind = this.windspeedjson[i].Wind;
                }
            }

        },updateCrop: async function(){     // 更新所選擇的作物分類
            // 從所選的作物id 找到 所選作物分類
            for(var i = 0 ; i < this.CropOrder.length ; i++){
                if(this.CropOrder[i] == this.cropIdx)    this.selectCrop = this.CropOrder[i];
            }

            this.GrowPlants = ['==請選擇作物==',];  // 作物資料初始化
            this.plantIdx = 0;
            for(var i = 0 ; i < this.vegetablejson.length ; i++){
                if(this.selectCrop == "==請選擇作物分類==") this.CropSelect = this.vegetablejson;
                if(this.vegetablejson[i].classification == this.selectCrop)    this.GrowPlants.push(this.vegetablejson[i].VegetableTypes);
            }
            let formData = new FormData();
            formData.append('palntclass',this.cropIdx);
            formData.append('_method','put');
            const response = await SaveOverPlan.UpdateOverPlan(1, formData);

        },updatePlant: async function(){    // 更新所選擇的作物
            // 從所選的作物id 找到 所選作物分類
            for(var i = 0 ; i < this.GrowPlants.length ; i++){
                if(this.GrowPlants[i] == this.plantIdx)    this.selectplant = this.GrowPlants[i];
            }

            // 找出所選資料的data
            for(var i = 0 ; i < this.vegetablejson.length ; i++){
                if(this.vegetablejson[i].VegetableTypes == this.selectplant){
                    this.PPFD = this.vegetablejson[i].PPFD;
                    this.Temperatureadaptability = this.vegetablejson[i].Temperatureadaptability;
                    this.LowestGrowthTemperature = this.vegetablejson[i].LowestGrowthTemperature;
                    this.OptimalGrowthTemperature = this.vegetablejson[i].OptimalGrowthTemperature;
                    this.HighestGrowthTemperature = this.vegetablejson[i].HighestGrowthTemperature;
                    this.LowestGerminationTemperature = this.vegetablejson[i].LowestGerminationTemperature;
                    this.OptimumGerminationTemperature = this.vegetablejson[i].OptimumGerminationTemperature;
                    this.HighestGerminationTemperature = this.vegetablejson[i].HighestGerminationTemperature;
                    this.StrOptimalTemperature = this.OptimalGrowthTemperature.split("~");
                    break;
                }
            }

            // 更新 作物生長最適溫最高區間 的圖表
            this.CropTemperature[1].data = {"1月":this.StrOptimalTemperature[0],"2月":this.StrOptimalTemperature[0],"3月":this.StrOptimalTemperature[0],"4月":this.StrOptimalTemperature[0],"5月":this.StrOptimalTemperature[0],"6月":this.StrOptimalTemperature[0],"7月":this.StrOptimalTemperature[0],"8月":this.StrOptimalTemperature[0],"9月":this.StrOptimalTemperature[0],"10月":this.StrOptimalTemperature[0],"11月":this.StrOptimalTemperature[0],"12月":this.StrOptimalTemperature[0]};
            // 更新 作物生長最適溫最低區間 的圖表
            this.CropTemperature[2].data = {"1月":this.StrOptimalTemperature[1],"2月":this.StrOptimalTemperature[1],"3月":this.StrOptimalTemperature[1],"4月":this.StrOptimalTemperature[1],"5月":this.StrOptimalTemperature[1],"6月":this.StrOptimalTemperature[1],"7月":this.StrOptimalTemperature[1],"8月":this.StrOptimalTemperature[1],"9月":this.StrOptimalTemperature[1],"10月":this.StrOptimalTemperature[1],"11月":this.StrOptimalTemperature[1],"12月":this.StrOptimalTemperature[1]};

            let formData = new FormData();
            formData.append('cropplant',this.plantIdx);
            formData.append('_method','put');
            const response = await SaveOverPlan.UpdateOverPlan(1, formData);
        },updateCity: async function(){     // 更新所選擇的縣市
            // 從所選的縣市id 找到 所選的縣市名稱
            for(var i = 0 ; i < this.City.length ; i++){
                if(this.City[i] == this.cityIdx)    this.selectCity = this.City[i];
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
            let formData = new FormData();
            formData.append('localcity',this.cityIdx);
            formData.append('_method','put');
            const response = await SaveOverPlan.UpdateOverPlan(1, formData);

        },updateRegion: async function(){   // 更新所選擇的地區
            // 從所選的地區id 找到 所選的地區名稱
            for(var i = 0 ; i < this.Region.length ; i++){
                if(this.Region[i] == this.regionIdx)    this.selectRegion = this.Region[i];
            }

            // 取得 風速、風力登陸分析、風力路徑分析
            for(var i = 0 ; i < this.regionalwindspeedjson.length ; i++){
                if((this.selectCity == this.regionalwindspeedjson[i].County ) && (this.selectRegion == this.regionalwindspeedjson[i].Region )){
                    this.SpeedPerSecond = this.regionalwindspeedjson[i].SpeedPerSecond;

                    this.StrHighTemperature = this.regionalwindspeedjson[i].monthHighTemperature.split(",");
                    this.StrLowTemperature = this.regionalwindspeedjson[i].monthLowTemperature.split(",");
                    break;
                }
            }

            // 更新 地區最低月均溫 的圖表
            this.CropTemperature[0].data = {
                "1月":parseFloat((parseInt(this.StrLowTemperature[0])+parseInt(this.StrHighTemperature[0]))/2)+3,
                "2月":parseFloat((parseInt(this.StrLowTemperature[1])+parseInt(this.StrHighTemperature[1]))/2)+3,
                "3月":parseFloat((parseInt(this.StrLowTemperature[2])+parseInt(this.StrHighTemperature[2]))/2)+3,
                "4月":parseFloat((parseInt(this.StrLowTemperature[3])+parseInt(this.StrHighTemperature[3]))/2)+3,
                "5月":parseFloat((parseInt(this.StrLowTemperature[4])+parseInt(this.StrHighTemperature[4]))/2)+3,
                "6月":parseFloat((parseInt(this.StrLowTemperature[5])+parseInt(this.StrHighTemperature[5]))/2)+3,
                "7月":parseFloat((parseInt(this.StrLowTemperature[6])+parseInt(this.StrHighTemperature[6]))/2)+3,
                "8月":parseFloat((parseInt(this.StrLowTemperature[7])+parseInt(this.StrHighTemperature[7]))/2)+3,
                "9月":parseFloat((parseInt(this.StrLowTemperature[8])+parseInt(this.StrHighTemperature[8]))/2)+3,
                "10月":parseFloat((parseInt(this.StrLowTemperature[9])+parseInt(this.StrHighTemperature[9]))/2)+3,
                "11月":parseFloat((parseInt(this.StrLowTemperature[10])+parseInt(this.StrHighTemperature[10]))/2)+3,
                "12月":parseFloat((parseInt(this.StrLowTemperature[11])+parseInt(this.StrHighTemperature[11]))/2)+3,
            };
            this.total_temp_high = 0;
            this.total_temp_low = 0;
            for(var i = 0 ; i < 12 ; i++){
                if (parseFloat((parseFloat(this.StrLowTemperature[i])+parseFloat(this.StrHighTemperature[i]))/2)-this.StrOptimalTemperature[1]+3 > 0){
                    this.total_temp_high += parseFloat(parseFloat((parseFloat(this.StrHighTemperature[i])+parseFloat(this.StrLowTemperature[i]))/2)-this.StrOptimalTemperature[1]+3)
                }
                
                if (parseFloat((parseFloat(this.StrLowTemperature[i])+parseFloat(this.StrHighTemperature[i]))/2)-this.StrOptimalTemperature[0]+3 < 0){  
                    this.total_temp_low += parseFloat(parseFloat((parseFloat(this.StrLowTemperature[i])+parseFloat(this.StrHighTemperature[i]))/2)-this.StrOptimalTemperature[0]+3)
                }
            }


            // 取得 級數 & 風名
            for(var i = 0 ; i < this.windspeedjson.length ; i++){
                if((this.SpeedPerSecond < this.windspeedjson[i].SpeedMax) && (this.SpeedPerSecond > this.windspeedjson[i].SpeedMin)){
                    this.Series = this.windspeedjson[i].Series;
                    this.Wind = this.windspeedjson[i].Wind;
                }else if(this.SpeedPerSecond > this.windspeedjson[i].SpeedMax){
                    this.Series = this.windspeedjson[i].Series;
                    this.Wind = this.windspeedjson[i].Wind;
                }
            }
            let formData = new FormData();
            formData.append('localarea',this.regionIdx);
            formData.append('_method','put');
            const response = await SaveOverPlan.UpdateOverPlan(1, formData);

        }
    }
}

</script>
