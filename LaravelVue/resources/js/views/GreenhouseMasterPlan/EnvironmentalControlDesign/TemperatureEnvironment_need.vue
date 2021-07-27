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

                    <!-- <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">地 點</span></p>
                    <b-select v-model="cityIdx" v-on:change="updateCity" style="width:20vmin" >
                        <option v-for="(city, index) in City" :value="index">
                            {{city}}
                        </option>
                    </b-select>

                    <b-select v-model="regionIdx" v-on:change="updateRegion" style="width:20vmin" >
                        <option v-for="(region, index) in Region" :value="index">
                            {{region}}
                        </option>
                    </b-select>

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

                    <p style = "font-size: 1.2vmin;"> 備註：風速為臺灣地區各地之基本設計風速</p> -->
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
        </b-card-group>
        <br>
                <b-card-group>
            <b-card
                header-tag="header"
                header-text-variant="white"
                header-bg-variant="info"
            >
                <template #header>
                    <h6 class="mb-0"><b-icon icon="flower1"></b-icon>溫環境-設備控制</h6>
                </template>
                <h5>
                    請勾選欲比較之材料
                    <b-select v-model="Tempidx" v-on:change="updateTempDesign" style="width:20vmin" >
                        <option value="降溫控制">降溫控制</option>
                        <option value="加溫控制">加溫控制</option>
                        <option value="濕度控制">濕度控制</option>
                    </b-select>
                </h5>
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
                    <tr align="center" v-for="(all, index) in TempData" :key="index">
                        <td>
                            <input type="checkbox" :value="all.id" v-model="checkedTemp" v-on:change="updateSelectTemp">
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
                    <h6 class="mb-0"><b-icon icon="flower1"></b-icon>溫環境-設備控制</h6>
                </template>

                <div v-if="checkedTemp.length != 0">
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
                                <td style='width:6.5vmin'> 比較值 </td>
                                <td style='width:6.5vmin'> 排名 </td>
                            </tr>
                        </thead>
                        <tr align="center" v-for="(select, index) in selectTemp" :key="index">
                            <td>
                                <input type="checkbox" :value="select.ControlItem+'-'+select.ControlSystem" v-model="Tempcheck">
                            </td>
                            <td>{{select.ControlItem}}-{{select.ControlSystem}}</td>
                            <td>{{select.QualityControl}}</td>
                            <td>{{select.StructuralRisk}}</td>
                            <td>{{select.JobDifficulty}}</td>
                            <td>{{select.Cost}}</td>
                            <td>{{select.SideEffect}} </td>
                            <td>{{selectTempRank[index]}}</td>
                            <td>{{selectTempRankValue[index]}}</td>
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
                    <br>
                    <div style="width:800px; height:150px; outline:#ADADAD dashed 5px;">
                        <v-chip class="ma-2" close color="orange" label outlined v-for="(select, index) in Tempcheck" :key="index" @click:close="Tempcheck.splice(index,1)">{{ select }}</v-chip>

                    </div>
                    <br>
                    <button type="button" class="btn btn-warning" style="font-size:1.5vmin; font-family:Microsoft JhengHei; bottom:0; float:right;">儲存</button>
                </div>
            </b-card>
        </b-card-group>

    </div>

</template>

<script>

export default {
    data(){
        return {
            tabIndex: 0,
            vegetablejson:[],
            regionalwindspeedjson:[],   // 縣市地區資料

            /* 種植植物生長環境需求*/
            CropOrder:["==請選擇作物分類==","根菜","莖菜","葉菜","花菜","果菜","糧食","水果","花"], // 作物分類的選單陣列表
            cropIdx: 0, // 所選作物的id
            cropIdx1: 0, // 所選作物的id
            cropIdx2: 0, // 所選作物的id
            selectCrop: null, // 所選作物的名稱
            GrowPlants:['==請選擇作物==',],
            plantIdx: 0, // 所選作物的id
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
                {name: "溫室平均月均溫", data: {"1月":null,"2月":null,"3月":null,"4月":null,"5月":null,"6月":null,"7月":null,"8月":null,"9月":null,"10月":null,"11月":null,"12月":null}},
                // {name: "地區最高月均溫", data: {"1月":null,"2月":null,"3月":null,"4月":null,"5月":null,"6月":null,"7月":null,"8月":null,"9月":null,"10月":null,"11月":null,"12月":null}},
                {name: "作物生長最適溫區間", data: {"1月":null,"2月":null,"3月":null,"4月":null,"5月":null,"6月":null,"7月":null,"8月":null,"9月":null,"10月":null,"11月":null,"12月":null}},
                {name: "作物生長最適溫區間", data: {"1月":null,"2月":null,"3月":null,"4月":null,"5月":null,"6月":null,"7月":null,"8月":null,"9月":null,"10月":null,"11月":null,"12月":null}},
            ],  // 所選作物的種植最適溫度 圖表用
            StrOptimalTemperature:[0,0], // 字串切割  作物生長最適溫區間

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

            Tempjson:[],
            checkedTemp:[],
            TempData:[],
            selectTemp:[],
            selectTempRank:[],
            selectTempRankValue:[],
            ProfileSpeed:null,
            ProfileStructuralRisk:null,
            ProfileCorrosive:null,
            ProfileWeightiness:null,
            ProfileCost:null,
            ProfileTotal:null,

            Tempidx:'降溫控制',
            Tempcheck:[],

            total_temp_high:0,
            total_temp_low:0,
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

            const Temp = await fetch('/TempJson',  {
                method: 'GET',
            });
            this.Tempjson = await Temp.json();

            var filterfalg = false;
            // 篩選重複出現的縣市
            for(var i = 0 ; i < this.regionalwindspeedjson.length ; i++){
                filterfalg = false;
                for(var j = 0;j < this.City.length ; j++){
                    if(this.regionalwindspeedjson[i].County == this.City[j]) filterfalg = true;
                }
                if(!filterfalg) this.City.push(this.regionalwindspeedjson[i].County);

            }

            for (var i = 0; i < this.Tempjson.length; i++) {
                if (this.Tempjson[i].ControlItem == '降溫控制'){
                    this.TempData.push(this.Tempjson[i]);
                }
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
            // 取得 風速、風力登陸分析、風力路徑分析
            this.StrHighTemperature = [];
            this.StrLowTemperature = [];
            for(var i = 0 ; i < this.regionalwindspeedjson.length ; i++){
                if((this.selectCity == this.regionalwindspeedjson[i].County ) && (this.selectRegion == this.regionalwindspeedjson[i].Region )){
                    this.SpeedPerSecond = this.regionalwindspeedjson[i].SpeedPerSecond;
                    for(var j = 0 ; j < this.regionalwindspeedjson[i].monthHighTemperature.split(",").length ; j++){
                        this.StrHighTemperature.push(parseInt(this.regionalwindspeedjson[i].monthHighTemperature.split(",")[j]))
                        this.StrLowTemperature.push(parseInt(this.regionalwindspeedjson[i].monthLowTemperature.split(",")[j]))
                    }
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
                    this.total_temp_high += parseFloat(parseFloat((parseFloat(this.StrLowTemperature[i])+parseFloat(this.StrHighTemperature[i]))/2)-this.StrOptimalTemperature[1]+3)
                }
                
                if (parseFloat((parseFloat(this.StrLowTemperature[i])+parseFloat(this.StrHighTemperature[i]))/2)-this.StrOptimalTemperature[0]+3 < 0){  
                    this.total_temp_low += parseFloat(parseFloat((parseFloat(this.StrLowTemperature[i])+parseFloat(this.StrHighTemperature[i]))/2)-this.StrOptimalTemperature[0]+3)
                }
            }
            



        },updateSelectTemp(){    // 更新所選擇的型材
            this.selectTemp = [];

            for (var i = 0; i < this.TempData.length; i++) {
                for (var j = 0; j < this.checkedTemp.length; j++) {
                    if(this.checkedTemp[j] == this.TempData[i].id)  this.selectTemp.push(this.TempData[i]);
                }

            }

        },updateProfileCompare(){   // 更新所選型材的參數比較
            this.ProfileTotal = parseFloat(this.ProfileSpeed) + parseFloat(this.ProfileStructuralRisk) + parseFloat(this.ProfileCorrosive) + parseFloat(this.ProfileWeightiness) + parseFloat(this.ProfileCost);

            var Compare = 0,selectComparelist = [],rank = [];
            // 計算 比較值
            for (var i = 0; i < this.selectTemp.length; i++) {
                Compare = (this.selectTemp[i].QualityControl * Math.floor(parseFloat(this.ProfileSpeed) / this.ProfileTotal * 100) / 100) + (this.selectTemp[i].StructuralRisk * Math.floor(parseFloat(this.ProfileStructuralRisk) / this.ProfileTotal * 100) / 100) + ( this.selectTemp[i].JobDifficulty * Math.floor(parseFloat(this.ProfileCorrosive) / this.ProfileTotal * 100) / 100) + ( this.selectTemp[i].Cost * Math.floor(parseFloat(this.ProfileWeightiness) / this.ProfileTotal * 100) / 100) + ( this.selectTemp[i].SideEffect * Math.floor(parseFloat(this.ProfileCost) / this.ProfileTotal * 100) / 100);
                Compare = Compare.toFixed(2);

                rank = [];
                rank.push(this.selectTemp[i].id);
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

            this.selectTempRank = [],  // 排名
            this.selectTempRankValue = []; // 排名值

            /* 將所勾選的 型材 比較值與排名 顯示 */
            for (var i = 0; i < selectComparelist.length; i++) {
                this.selectTempRankValue.push(selectComparelist[i][2]);
                this.selectTempRank.push(selectComparelist[i][1]);
            }
        },updateTempDesign(){
            this.TempData = [];
            for (var i = 0; i < this.Tempjson.length; i++) {
                if (this.Tempidx == this.Tempjson[i].ControlItem){
                    this.TempData.push(this.Tempjson[i])
                }
            }
        },
    }
}

</script>
