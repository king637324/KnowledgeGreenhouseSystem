<template>
    <div class="container-fluid">
        <br>
        <h2>作物環境需求分析</h2>
        <button type="button" class="btn btn-danger" v-on:click="check">檢查</button>
        <hr>

        <!-- <div class="card-header bg-info text-white"> -->
        <div class="row">
            <!-- LME倫敦金屬價格 -->
            <div class="col-xl-2">
                <div class="d-flex justify-content-center mb-3">
                    <div class="p-2"></div>
                    <div class="p-2">
                        <br><br>
                        <h4 align="center">金屬價格</h4>
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

                        <p style = "font-size: 1.5vmin;"><br>備註：<br>金屬價格走勢圖請點選金屬材料</p>
                        <p style = "font-size: 1.5vmin;">資料來源：<a href="https://www.lme.com/" target="_blank" style="color:gray;">倫敦金屬交易所</a></p>
                    </div>
                    <div class="p-2"></div>
                </div>
            </div>

            <!-- 作物環境需求分析 -->
            <div class="col-xl-10">
                <div class="row">
                    <!-- 種植植物生長環境需求 -->
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <b-icon icon="flower1"></b-icon>
                                種植植物生長環境需求
                            </div>
                            <div class="card-body">
                                <select v-model="cropIdx" v-on:change="updateCrop">
                                    <option v-for="(crop, index) in CropOrder" :value="index">
                                        {{crop}}
                                    </option>
                                </select>

                                <select v-model="plantIdx" v-on:change="updatePlant">
                                    <option v-for="(plant, index) in GrowPlants" :value="index">
                                        {{plant}}
                                    </option>
                                </select>


                                <table class="separate" style="border:1px solid black;" border='1'>
                                    <tr align="center" class="table-active">
                                        <td rowspan="4">光環境</td>
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
                                    <tr align="center" class="table-active">
                                        <td rowspan="5">溫環境</td>
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
                                    <tr align="center" class="table-active">
                                        <td rowspan="5">氣環境</td>
                                        <td colspan="6">CO₂增產率</td>
                                    </tr>
                                    <tr align="center">
                                        <td id="CO2IncreasedProductionRate" colspan="6"> {{CO2IncreasedProductionRate}} </td>
                                    </tr>
                                </table>


                            </div>
                        </div>
                    </div>
                    <!-- 栽種面積 -->
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <b-icon icon="brightness-alt-high"></b-icon>
                                栽種面積(單位：公尺)
                            </div>
                            <div class="card-body">
                                <div>
                                    <label>長 = </label>
                                    <input type="text" value="" v-model="AreaLong" placeholder="請輸入長度">
                                    <br>
                                    <label>寬 = </label>
                                    <input type="text" value="" v-model="AreaWidth" placeholder="請輸入寬度">
                                    <br>
                                </div>
                                <label>面積 =  {{AreaLong*AreaWidth}} 平方公尺</label>
                                <br>
                                <label>溫室走向 = </label>
                                <input type="text" value="" v-model="GreenhouseTrend" placeholder="請輸入角度">
                                <p style = "font-size: 1.2vmin;"> 備註：屋脊走向：東西為 0度、南北為90度</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <!-- 種植地區環境分析 -->
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <b-icon icon="bar-chart-fill"></b-icon>
                                種植地區環境分析
                            </div>
                            <div class="card-body">

                                <div class="d-flex justify-content-between">
                                    <div class="p-2 bd-highlight">
                                        <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">地 點</span></p>
                                        <select v-model="cityIdx" v-on:change="updateCity" style="font-size: 2vmin">
                                            <option v-for="(city, index) in City" :value="index">
                                                {{city}}
                                            </option>
                                        </select>

                                        <select v-model="regionIdx" v-on:change="updateRegion" style="font-size: 2vmin">
                                            <option v-for="(region, index) in Region" :value="index">
                                                {{region}}
                                            </option>
                                        </select>
                                    </div>

                                    <div class="p-2 bd-highlight">
                                        <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">地  形</span></p>
                                        <select id="SelectTerrain" onchange="SelectTerrain()" >
                                            <option value="">==請選擇地形==</option>
                                            <option value="平原">平原</option>
                                            <option value="山區">山區</option>
                                            <option value="海邊">海邊</option>
                                        </select>
                                        <br><br>
                                    </div>

                                    <div class="p-2 bd-highlight">

                                    </div>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <div class="p-2 bd-highlight">
                                        <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">設 計 風 速</span></p>
                                        <table class="separate" style="border:1px solid black;" border='1'>
                                            <thead>
                                                <tr align="center" class="table-active">
                                                    <td style='width:7vmin'>縣市</td>
                                                    <td style='width:7vmin'>地區</td>
                                                    <td style='width:7vmin'>風速(m/sec)</td>
                                                    <td style='width:7vmin'>級數</td>
                                                    <td style='width:7vmin'>風名</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr align="center">
                                                    <td id="County"> {{selectCity}} </td>
                                                    <td id="Region"> {{selectRegion}} </td>
                                                    <td id="SpeedPerSecond"> {{SpeedPerSecond}} </td>
                                                    <td id="Series"> {{Series}} </td>
                                                    <td id="Wind"> {{Wind}} </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <p style = "font-size: 1.2vmin;"> 備註：風速為臺灣地區各地之基本設計風速</p>
                                    </div>

                                    <div class="p-2 bd-highlight">
                                        <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">地  貌</span></p>
                                        <select id="SelectLandform" onchange="SelectLandform()" >
                                            <option value="">==請選擇地貌==</option>
                                            <option value="建築物">建築物</option>
                                            <option value="空曠">空曠</option>
                                            <option value="風口">風口</option>
                                        </select>
                                        <br><br>
                                    </div>
                                    <div class="p-2 bd-highlight">

                                    </div>
                                </div>



                                <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">日照時數與全天空日射量</span></p>
                                <line-chart :data="data" height="45vmin" :colors="['Gold', 'DarkGreen']" :curve="false"></line-chart>
                                <!-- <div class="canvasDiv">
                                    <canvas id="SunshineChart" style="display: block;"></canvas>
                                </div> -->


                            </div>
                        </div>
                    </div>
                    <!-- 作物與地區溫度比較 -->
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area"></i>
                                作物與地區溫度比較
                            </div>
                            <div class="card-body">
                                <p><span class="badge badge-pill badge-secondary" style="font-size: 2vmin">溫度分析圖</span></p>
                                <line-chart :data="data" height="45vmin" :colors="['DodgerBlue', 'Red', 'LightSalmon', 'LightSalmon']" :curve="false"></line-chart>
                                <!-- <div class="canvasDiv">
                                    <canvas id="TemperatureChart" style="display: block;"></canvas>
                                </div> -->
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
                                    </tr>
                                    <tr align="center" id="HighTemperatureDifference">
                                        <td>高溫差</td>
                                        <td v-for="(i, n) in 12"></td>
                                    </tr>
                                    <tr align="center" id="HighApproach">
                                        <td>環控</td>
                                        <td v-for="(i, n) in 12"></td>
                                    </tr>
                                    <tr align="center" id="LowTemperatureDifference">
                                        <td>低溫差</td>
                                        <td v-for="(i, n) in 12"></td>
                                    </tr>
                                    <tr align="center" id="LowApproach">
                                        <td>環控</td>
                                        <td v-for="(i, n) in 12"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- <div class="row">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area mr-1"></i>
                                Area Chart Example
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar mr-1"></i>
                                Bar Chart Example
                            </div>
                            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            tabIndex: 0,
            LMEjson:[],
            vegetablejson:[],
            windspeedjson:[],  // 風速對照表
            regionalwindspeedjson:[],   // 縣市地區資料

            /* LME 倫敦金屬價格 */
            MetalList:["鋁", "銅", "鋅", "鎳", "鉛", "錫", "鋁合金", "特種鋁合金", "鈷", "金", "銀", "廢鋼", "鋼筋"], // LME金屬排序
            MetalDate:null,
            MetalPrice:[],

            /* 種植植物生長環境需求*/
            CropOrder:["==請選擇作物分類==","根菜","莖菜","葉菜","花菜","果菜","糧食","水果","花"], // 作物分類的選單陣列表
            cropIdx: 0, // 所選作物的id
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
            Temperatureadaptability: '-',
            LowestGrowthTemperature: '-',
            OptimalGrowthTemperature: '-',
            HighestGrowthTemperature: '-',
            LowestGerminationTemperature: '-',
            OptimumGerminationTemperature: '-',
            HighestGerminationTemperature: '-',
            CO2IncreasedProductionRate: '-',

            /* 種植地區環境分析 */
            City:['==請選擇縣市==',],   // 縣市選單的陣列表
            cityIdx: 0, // 所選縣市的id
            selectCity: '-', // 所選縣市的名稱

            Region:['==請選擇地區==',], // 地區選單的陣列表
            regionIdx: 0,   // 所選地區的id
            selectRegion: '-', // 所選地區的名稱

            Series: '-', // 風力級數
            Wind: '-',   // 風的名稱
            SpeedPerSecond: '-',    // 風速


            /* 栽種面積 */
            AreaLong:null,
            AreaWidth:null,
            GreenhouseTrend: null,
        }
    },
    created:function(){  // 網頁載入時，一開始就載入
        this.getJson();
    },
    methods: {
        async getJson(){
            // LME 倫敦金屬交易所
            const LMEMetalPrice = await fetch('/LMEMetalPriceJSON',  {
                method: 'GET',
            });
            this.LMEjson = await LMEMetalPrice.json();

            // 作物資訊資料表
            const Vegetable = await fetch('/VegetableJSON',  {
                method: 'GET',
            });
            this.vegetablejson = await Vegetable.json();

            // 建立LME金屬價格表
            // console.log(LMEMetal[0][0]); // 金屬名稱
            // console.log(LMEMetal[0][1]); // 金屬價格
            // console.log(LMEMetal[0][2]); // 金屬交易日期
            // console.log(LMEMetal[0][3]); // 金屬走勢圖網址

            this.MetalDate = this.LMEjson[0][2];

            for (var i = 0; i < this.MetalList.length; i++) {
                for (var j = 0; j < this.LMEjson.length; j++) {
                    if (this.MetalList[i] == this.LMEjson[j][0]) {
                        this.MetalPrice.push(this.LMEjson[j]);
                    }
                }
            }


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

            var filterfalg = false;
            // 篩選重複出現的縣市
            for(var i = 0 ; i < this.regionalwindspeedjson.length ; i++){
                filterfalg = false;
                for(var j = 0;j < this.City.length ; j++){
                    if(this.regionalwindspeedjson[i].County == this.City[j]) filterfalg = true;
                }
                if(!filterfalg) this.City.push(this.regionalwindspeedjson[i].County);

            }


        },updateCrop(){
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

        },updatePlant(){
            // 從所選的作物id 找到 所選作物分類
            for(var i = 0 ; i < this.GrowPlants.length ; i++){
                if(i == this.plantIdx)    this.selectplant = this.GrowPlants[i];
            }

            this.CropData = [];  // 作物資料初始化
            // 找出所選資料的data
            for(var i = 0 ; i < this.vegetablejson.length ; i++){
                if(this.vegetablejson[i].VegetableTypes == this.selectplant){
                    // this.CropData = this.vegetablejson[i];
                    this.Goodlight = this.vegetablejson[i].Goodlight;
                    this.Photoperiod = this.vegetablejson[i].Photoperiod;
                    this.Illuminance = this.vegetablejson[i].Illuminance;
                    this.PPFD = this.vegetablejson[i].PPFD;
                    this.LightSaturationPoint = this.vegetablejson[i].LightSaturationPoint;
                    this.LightCompensationPoint = this.vegetablejson[i].LightCompensationPoint;
                    this.Temperatureadaptability = this.vegetablejson[i].Temperatureadaptability;
                    this.LowestGrowthTemperature = this.vegetablejson[i].LowestGrowthTemperature;
                    this.OptimalGrowthTemperature = this.vegetablejson[i].OptimalGrowthTemperature;
                    this.HighestGrowthTemperature = this.vegetablejson[i].HighestGrowthTemperature;
                    this.LowestGerminationTemperature = this.vegetablejson[i].LowestGerminationTemperature;
                    this.OptimumGerminationTemperature = this.vegetablejson[i].OptimumGerminationTemperature;
                    this.HighestGerminationTemperature = this.vegetablejson[i].HighestGerminationTemperature;
                    this.CO2IncreasedProductionRate = this.vegetablejson[i].CO2IncreasedProductionRate;
                    break;
                }
            }

        },updateCity(){
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
            this.Region = ['==請選擇地區=='];

            // 篩選所選縣市的地區
            for(var i = 0 ; i < this.regionalwindspeedjson.length ; i++){
                if(this.regionalwindspeedjson[i].County == this.selectCity){
                    this.Region.push(this.regionalwindspeedjson[i].Region);
                }
            }

        },updateRegion(){
            // 從所選的地區id 找到 所選的地區名稱
            for(var i = 0 ; i < this.Region.length ; i++){
                if(i == this.regionIdx)    this.selectRegion = this.Region[i];
            }

            // 取得 風速、風力登陸分析、風力路徑分析
            for(var i = 0 ; i < this.regionalwindspeedjson.length ; i++){
                if((this.selectCity == this.regionalwindspeedjson[i].County ) && (this.selectRegion == this.regionalwindspeedjson[i].Region )){
                    this.SpeedPerSecond = this.regionalwindspeedjson[i].SpeedPerSecond;
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

        },check(){

        }
    },
}
</script>
