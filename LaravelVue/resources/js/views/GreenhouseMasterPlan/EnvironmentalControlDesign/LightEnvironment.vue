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
            <!-- 環境控制-光設計 -->

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
                                <line-chart xtitle="月份" ytitle="日照時數 & 全天空日射量" :data="GloblRadSunShineChartData" height="30vmin" :colors="['Gold', 'DarkTurquoise']" :curve="false"></line-chart>
                            </v-col>
                        </v-row>
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
                            <td>平均</td>
                        </tr>
                        <tr align="center" id="HighTemperatureDifference">
                            <td>全天空日射量</td>
                            <td v-for="n in 12">{{Math.round(GloblRadSunShineChartData[0].data[String(n)+'月']/30*100)/100}}</td>
                            <td>{{ Math.round(average_total/12*100)/100 }}</td>
                        </tr>
                        <tr align="center" id="HighApproach">
                            <td>日照時數</td>
                            <td v-for="n in 12">{{Math.round(GloblRadSunShineChartData[1].data[String(n)+'月']/30*100)/100}}</td>
                            <td>{{ Math.round(average_sun/12*100)/100 }}</td>
                        </tr>
                        
                    </table>
                    </v-container-fluid>
                </b-card-text>

            </b-card>
            <br>
        </b-card-group>

    </div>

</template>

<script>
import * as SaveOverPlan from '../../../services/saveoverplan_service.js';
export default {
    data(){
        return{
            tabIndex: 0,
            vegetablejson:[],
            windspeedjson:[],  // 風速對照表
            regionalwindspeedjson:[],   // 縣市地區資料

            LightSensingData: [],    //光感測
            LightSensing: null,    //光感測的選擇
            LightSensingIntroduction: null,    //光感測選擇的介紹
            LightDesignData: [],    //光設計
            LightDesign: null,    //光設計的選擇
            LightDesignIntroduction: null,    //光設計選擇的介紹
            LightControlData: [],    //光控制
            LightControl: null,    //光控制的選擇
            LightControlIntroduction: null,    //光控制選擇的介紹

            /* 種植植物生長環境需求*/
            CropOrder:["==請選擇作物分類==","根菜","莖菜","葉菜","花菜","果菜","糧食","水果","花"], // 作物分類的選單陣列表
            cropIdx: null, // 所選作物的id
            selectCrop: null, // 所選作物的名稱
            GrowPlants:['==請選擇作物==',],
            plantIdx: null, // 所選作物的id
            selectplant: null, // 所選作物的名稱
            Goodlight: '-',
            Photoperiod: '-',
            Illuminance: '-',
            PPFD: '-',
            LightSaturationPoint: '-',
            LightCompensationPoint: '-',
            
            /* 種植地區環境分析 */
            City:['==請選擇縣市==',],   // 縣市選單的陣列表
            cityIdx: null, // 所選縣市的id
            selectCity: '-', // 所選縣市的名稱

            Region:['==請選擇地區==',], // 地區選單的陣列表
            regionIdx:null ,   // 所選地區的id
            selectRegion: '-', // 所選地區的名稱
            StrHighTemperature:[0,0,0,0,0,0,0,0,0,0,0,0], // 字串切割  地區最高月均溫
            StrLowTemperature:[0,0,0,0,0,0,0,0,0,0,0,0], // 字串切割  地區最低月均溫

            SelectTerrain:null, // 選擇地形
            SelectLandform:null, // 選擇地貌

            Series: '-', // 風力級數
            Wind: '-',   // 風的名稱
            SpeedPerSecond: '-',    // 風速
            GloblRad:null, // 全天空日射量
            SunShine:null, // 日照量
            GloblRadSunShineChartData:[
                {name: "日照時數(小時)", data: {"1月":null,"2月":null,"3月":null,"4月":null,"5月":null,"6月":null,"7月":null,"8月":null,"9月":null,"10月":null,"11月":null,"12月":null}},
                {name: "全天空日射量(MJ/㎡)", data: {"1月":null,"2月":null,"3月":null,"4月":null,"5月":null,"6月":null,"7月":null,"8月":null,"9月":null,"10月":null,"11月":null,"12月":null}},
            ],  // 日照時數與全天空日射量 圖表用
            average_sun:0,
            average_total:0,
            overplanArray:[],
            OverPlanJson:[],
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

            // 光環境
            const Light_info = await fetch('/LightJson',  {
                method: 'GET',
            });
            this.LightDesignData = await Light_info.json();

            const J_OverPlan = await fetch('/OverPlanJson',  {
            method: 'GET',
            });
            this.OverPlanJson = await J_OverPlan.json();
                for(var i = 0; i < this.OverPlanJson.length; i++){
                    this.overplanArray.push(this.OverPlanJson[i])
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

            for(var i = 0 ; i < this.GrowPlants.length ; i++){
                if(this.GrowPlants[i] == this.plantIdx)    this.selectplant = this.GrowPlants[i];
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

            // 從所選的地區id 找到 所選的地區名稱
            for(var i = 0 ; i < this.Region.length ; i++){
                if(this.Region[i] == this.regionIdx)    this.selectRegion = this.Region[i];
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
                {name: "全天空日射量(MJ/㎡)", data: {"1月":StrGloblRad[0],"2月":StrGloblRad[1],"3月":StrGloblRad[2],"4月":StrGloblRad[3],"5月":StrGloblRad[4],"6月":StrGloblRad[5],"7月":StrGloblRad[6],"8月":StrGloblRad[7],"9月":StrGloblRad[8],"10月":StrGloblRad[9],"11月":StrGloblRad[10],"12月":StrGloblRad[11]}},
                {name: "日照時數(小時)", data: {"1月":StrSunShine[0],"2月":StrSunShine[1],"3月":StrSunShine[2],"4月":StrSunShine[3],"5月":StrSunShine[4],"6月":StrSunShine[5],"7月":StrSunShine[6],"8月":StrSunShine[7],"9月":StrSunShine[8],"10月":StrSunShine[9],"11月":StrSunShine[10],"12月":StrSunShine[11]}},
            ];

            for (var i = 0; i < 12; i++) {
                this.average_total += Math.round(StrGloblRad[i]/30*100)/100
                this.average_sun += Math.round(StrSunShine[i]/30*100)/100
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
                    this.Goodlight = this.vegetablejson[i].Goodlight;
                    this.Photoperiod = this.vegetablejson[i].Photoperiod;
                    this.Illuminance = this.vegetablejson[i].Illuminance;
                    this.PPFD = this.vegetablejson[i].PPFD;
                    this.LightSaturationPoint = this.vegetablejson[i].LightSaturationPoint;
                    this.LightCompensationPoint = this.vegetablejson[i].LightCompensationPoint;
                    break;
                }
            }
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
                {name: "全天空日射量(MJ/㎡)", data: {"1月":StrGloblRad[0],"2月":StrGloblRad[1],"3月":StrGloblRad[2],"4月":StrGloblRad[3],"5月":StrGloblRad[4],"6月":StrGloblRad[5],"7月":StrGloblRad[6],"8月":StrGloblRad[7],"9月":StrGloblRad[8],"10月":StrGloblRad[9],"11月":StrGloblRad[10],"12月":StrGloblRad[11]}},
                {name: "日照時數(小時)", data: {"1月":StrSunShine[0],"2月":StrSunShine[1],"3月":StrSunShine[2],"4月":StrSunShine[3],"5月":StrSunShine[4],"6月":StrSunShine[5],"7月":StrSunShine[6],"8月":StrSunShine[7],"9月":StrSunShine[8],"10月":StrSunShine[9],"11月":StrSunShine[10],"12月":StrSunShine[11]}},
            ];

            for (var i = 0; i < 12; i++) {
                this.average_total += Math.round(StrGloblRad[i]/30*100)/100
                this.average_sun += Math.round(StrSunShine[i]/30*100)/100
            }
            let formData = new FormData();
            formData.append('localarea',this.regionIdx);
            formData.append('_method','put');
            const response = await SaveOverPlan.UpdateOverPlan(1, formData);

        },updateLightSensingRadio(){    // 光感測選擇
            console.log("---updateLightSensingRadio---");
            console.log("LightSensing:",this.LightSensing);
            this.LightSensingIntroduction = this.LightSensing[1];
        },updateLightDesignRadio(){     // 光設計選擇
            console.log("---updateLightDesignRadio---");
            console.log("LightDesign:",this.LightDesign);
            this.LightDesignIntroduction = this.LightDesign[1];
        },updateLightControlRadio(){    // 光控制選擇
            console.log("---updateLightControlRadio---");
            console.log("LightControl:",this.LightControl);
            this.LightControlIntroduction = this.LightControl[1];
        }
    }
}

</script>
