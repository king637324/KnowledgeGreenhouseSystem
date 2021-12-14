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
                    <p>備註： - 為尚無資料</p>
                    <p>作物生理： <span style="color:red;">{{ plantIdx }}</span>為<span style="color:red;">{{ Goodlight }}</span>,光週期為<span style="color:red;">{{ Photoperiod }}</span></p>
                    <p>場域光環境： 
                        <span style="color:red;">{{ String(Math.round(average_sun/12*100)/100) }}</span>
                        為
                        <span style="color:red;" >{{ LightSun }}</span>
                    </p>
                    <p>光環境差異分析：<span style="color:red;">{{ LightSun }}</span>下,需適時<span style="color:red;">{{ NeedLight }}</span></p>

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
                        <table style="border:1px solid black;" border='1' id="daylight">
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
                            <tr id="HighTemperatureDifference">
                                <td>全天空日射量</td>
                                <td v-for="n in 12">{{String(Math.round(GloblRadSunShineChartData[0].data[String(n)+'月']/30*100)/100)}}</td>
                                <td>{{ String(Math.round(average_total/12*100)/100) }}</td>
                            </tr>
                            <tr id="HighTemperatureDifference">
                                <td>光控</td>
                                <td v-for="n in 12">{{LightValue[n]}}</td>
                            </tr>
                            <tr id="HighApproach">
                                <td>日照時數</td>
                                <td v-for="n in 12">{{String(Math.round(GloblRadSunShineChartData[1].data[String(n)+'月']/30*100)/100)}}</td>
                                <td>{{ String(Math.round(average_sun/12*100)/100) }}</td>
                            </tr>
                            <tr id="HighApproach">
                                <td>光控</td>
                                <td v-for="n in 12">{{LightTime[n]}}</td>
                            </tr>
                        </table>
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
                    <h6 class="mb-0"><b-icon icon="flower1"></b-icon>光環境-設備選擇</h6>
                </template>
                <h5>
                    請勾選欲比較之材料
                    <b-select v-model="lightidx" v-on:change="updateLightDesign" style="width:20vmin" >
                        <option value="遮光控制">遮光控制</option>
                        <option value="補光控制">補光控制</option>
                        <option value="光質控制">光質控制</option>
                        <option value="光週期控制">光週期控制</option>
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
                    <tr align="center" v-for="(all, index) in LightData" :key="index">
                        <td>
                            <input type="checkbox" v-model="all.checked" v-on:change="updateSelectLight(all.id,all.checked)">
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
                    <h6 class="mb-0"><b-icon icon="flower1"></b-icon>光環境-設備比較</h6>
                </template>

                <div v-if="checkedLight.length != 0">
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
                        <tr align="center" v-for="(select, index) in selectLight" :key="index">
                            <td>
                                <input type="checkbox" v-model="select.checked" v-on:change="updateLight(select,select.checked)">
                            </td>
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
                    <br>
                    <!-- <div style="width:800px; height:150px; outline:#ADADAD dashed 5px;">
                        <v-chip class="ma-2" close color="orange" label outlined v-for="(select, index) in selectLight_copy" :key="index" @click:close="select.ControlSystem">{{ select.ControlItem+'-'+select.ControlSystem }}</v-chip>

                    </div>
                    <br>
                    <button type="button" class="btn btn-warning" style="font-size:1.5vmin; font-family:Microsoft JhengHei; bottom:0; float:right;" v-on:click="updatelightcontrol">儲存</button> -->
                </div>
            </b-card>
        </b-card-group>

    </div>

</template>

<script>
import * as SaveOverPlan from '../../../services/saveoverplan_service.js';
import * as Light from '../../../services/user_light.js';
export default {
    data(){
        return{
            tabIndex: 0,
            vegetablejson:[],
            regionalwindspeedjson:[],   // 縣市地區資料
            LightDesignData: [],    //光設計

            LightSun: '',
            NeedLight: '',
            LightValue: [],
            LightTime: [],


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
            regionIdx: null,   // 所選地區的id
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
            selectLight_copy:[],
            selectLightRank:[],
            selectLightRankValue:[],
            ProfileSpeed:null,
            ProfileStructuralRisk:null,
            ProfileCorrosive:null,
            ProfileWeightiness:null,
            ProfileCost:null,
            ProfileTotal:null,

            lightidx:"遮光控制",
            lightcheck:[],

            average_sun:0,
            average_total:0,
            overplanArray:[],
            OverPlanJson:[],
            LightJson:[],
            Lightname:[],
            now_user:null,
        }
    },
    created:function(){  // 網頁載入時，一開始就載入
        if (this.$auth.check() === false) {
            this.$router.push({ name: '使用者登入' })
        }
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

            const lightjson = await fetch('/UserLightJson',  {
                method: 'GET',
            });
            this.LightJson = await lightjson.json();
            for (var i = 0; i < this.LightJson.length; i++){
                if (this.LightJson[i].uid === this.$auth.user().id){
                    this.LightJson[i].checked = true
                    this.selectLight.push(this.LightJson[i])
                    // this.selectLight_copy.push(this.LightJson[i])
                    this.checkedLight.push(this.LightJson[i].id)
                    this.Lightname.push(this.LightJson[i].ControlItem+'-'+this.LightJson[i].ControlSystem)
                }
            }

            for (var i = 0; i < this.LightDesignData.length; i++) {
                if (this.LightDesignData[i].ControlItem == '遮光控制'){
                    if (this.Lightname.indexOf(this.LightDesignData[i].ControlItem+'-'+this.LightDesignData[i].ControlSystem) === -1){
                        this.LightDesignData[i].checked = false
                    } else{
                        this.LightDesignData[i].checked = true
                    }
                    
                    this.LightData.push(this.LightDesignData[i]);
                }
            }
            if ( String(Math.round(this.average_sun/12*100)/100) >= 6 ){ 
                this.LightSun = '長日照氣候'
                if ( this.Photoperiod === '中日植物' || this.Photoperiod === '短日植物' ) {
                    this.NeedLight = '遮光'
                }else {
                    this.NeedLight = '很合適'
                }
            } else if( String(Math.round(this.average_sun/12*100)/100) < 6 && String(Math.round(this.average_sun/12*100)/100) >= 4 ){ 
                this.LightSun='中日照氣候' 
                if ( this.Photoperiod === '長日植物' ) {
                    this.NeedLight = '遮光'
                }else if ( this.Photoperiod === '短日植物' ) {
                    this.NeedLight = '補光'
                } else {
                    this.NeedLight = '很合適'
                }
            } else { 
                this.LightSun='短日照氣候' 
                if ( this.Photoperiod === '中日植物' || this.Photoperiod === '長日植物' ) {
                    this.NeedLight = '補光'
                }else {
                    this.NeedLight = '很合適'
                }
            }
            for (var i = 1; i < 13; i++){
                if ( this.Goodlight === '好光型作物' ) {
                    if ( Math.round(this.GloblRadSunShineChartData[0].data[String(i)+'月']/30*100)/100 < 15 ){
                        this.LightValue.push('需補光')
                    }else {
                        this.LightValue.push('')
                    }
                } else if ( this.Goodlight === '中間型作物' ) {
                    if ( Math.round(this.GloblRadSunShineChartData[0].data[String(i)+'月']/30*100)/100 > 15 ){
                        this.LightValue.push('需遮光')
                    } else if ( Math.round(this.GloblRadSunShineChartData[0].data[String(i)+'月']/30*100)/100 < 12 ) {
                        this.LightValue.push('需補光')
                    } else {
                        this.LightValue.push('')
                    }
                } else if ( this.Goodlight === '弱光型作物' ) {
                    if ( Math.round(this.GloblRadSunShineChartData[0].data[String(i)+'月']/30*100)/100 > 12 ){
                        this.LightValue.push('需遮光')
                    } else {
                        this.LightValue.push('')
                    }
                }
            }
            for (var i = 1; i < 13; i++){
                if ( this.Photoperiod === '長日植物' ) {
                    if ( Math.round(this.GloblRadSunShineChartData[1].data[String(i)+'月']/30*100)/100 < 6 ){
                        this.LightTime.push('需補光')
                    }else {
                        this.LightTime.push('')
                    }
                } else if ( this.Photoperiod === '中日植物' ) {
                    if ( Math.round(this.GloblRadSunShineChartData[1].data[String(i)+'月']/30*100)/100 > 6 ){
                        this.LightTime.push('需遮光')
                    } else if ( Math.round(this.GloblRadSunShineChartData[1].data[String(i)+'月']/30*100)/100 < 4 ) {
                        this.LightTime.push('需補光')
                    } else {
                        this.LightTime.push('')
                    }
                } else if ( this.Photoperiod === '短日植物' ) {
                    if ( Math.round(this.GloblRadSunShineChartData[1].data[String(i)+'月']/30*100)/100 > 4 ){
                        this.LightTime.push('需遮光')
                    } else {
                        this.LightTime.push('')
                    }
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
            const response = await SaveOverPlan.UpdateOverPlan(this.now_user, formData);

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
            const response = await SaveOverPlan.UpdateOverPlan(this.now_user, formData);
            if ( String(Math.round(this.average_sun/12*100)/100) >= 6 ){ 
                this.LightSun = '長日照氣候'
                if ( this.Photoperiod === '中日植物' || this.Photoperiod === '短日植物' ) {
                    this.NeedLight = '遮光'
                }else {
                    this.NeedLight = '很合適'
                }
            } else if( String(Math.round(this.average_sun/12*100)/100) < 6 && String(Math.round(this.average_sun/12*100)/100) >= 4 ){ 
                this.LightSun='中日照氣候' 
                if ( this.Photoperiod === '長日植物' ) {
                    this.NeedLight = '遮光'
                }else if ( this.Photoperiod === '短日植物' ) {
                    this.NeedLight = '補光'
                } else {
                    this.NeedLight = '很合適'
                }
            } else { 
                this.LightSun='短日照氣候' 
                if ( this.Photoperiod === '中日植物' || this.Photoperiod === '長日植物' ) {
                    this.NeedLight = '補光'
                }else {
                    this.NeedLight = '很合適'
                }
            }
            if ( Goodlight === '好光型作物' ) {
                if ( String(Math.round(average_total/12*100)/100) < 15 ){
                    this.LightValue = '需補光'
                }
            } else if ( Goodlight === '中間型作物' ) {
                if ( String(Math.round(average_total/12*100)/100) > 15 ){
                    this.LightValue = '需遮光'
                } else if ( String(Math.round(average_total/12*100)/100) < 12 ) {
                    this.LightValue = '需補光'
                }
            } else if ( Goodlight === '弱光型作物' ) {
                if ( String(Math.round(average_total/12*100)/100) > 12 ){
                    this.LightValue = '需遮光'
                }
            }

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
            const response = await SaveOverPlan.UpdateOverPlan(this.now_user, formData);

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
            this.average_total = 0
            this.average_sun = 0
            for (var i = 0; i < 12; i++) {
                this.average_total += Math.round(StrGloblRad[i]/30*100)/100
                this.average_sun += Math.round(StrSunShine[i]/30*100)/100
            }
            let formData = new FormData();
            formData.append('localarea',this.regionIdx);
            formData.append('_method','put');
            const response = await SaveOverPlan.UpdateOverPlan(this.now_user, formData);
            if ( String(Math.round(this.average_sun/12*100)/100) >= 6 ){ 
                this.LightSun = '長日照氣候'
                if ( this.Photoperiod === '中日植物' || this.Photoperiod === '短日植物' ) {
                    this.NeedLight = '遮光'
                }else {
                    this.NeedLight = '很合適'
                }
            } else if( String(Math.round(this.average_sun/12*100)/100) < 6 && String(Math.round(this.average_sun/12*100)/100) >= 4 ){ 
                this.LightSun='中日照氣候' 
                if ( this.Photoperiod === '長日植物' ) {
                    this.NeedLight = '遮光'
                }else if ( this.Photoperiod === '短日植物' ) {
                    this.NeedLight = '補光'
                } else {
                    this.NeedLight = '很合適'
                }
            } else { 
                this.LightSun='短日照氣候' 
                if ( this.Photoperiod === '中日植物' || this.Photoperiod === '長日植物' ) {
                    this.NeedLight = '補光'
                }else {
                    this.NeedLight = '很合適'
                }
            }


        },updateSelectLight: async function(checkid,checktype){    // 更新所選擇的型材
           
            let lightname = null;
            if (checktype === true){
                this.checkedLight.push(checkid)
                for (var i = 0; i < this.LightDesignData.length; i++) {
                    if(checkid === this.LightDesignData[i].id){
                        this.LightDesignData[i].checked = false
                        this.selectLight.push(this.LightDesignData[i]);
                    } 
                }
            } else{
                this.checkedLight.splice(this.checkedLight.indexOf(checkid),1)
                for (var i = 0; i < this.LightDesignData.length; i++){
                    if (this.LightDesignData[i].id === checkid){
                        lightname = this.LightDesignData[i].ControlSystem
                    }
                }
                for(var j = 0; j < this.selectLight.length; j++){
                    if (this.selectLight[j].ControlSystem === lightname){
                        await Light.deleteLight(this.selectLight[j].id);
                        this.selectLight.splice(j,1)
                    }
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

        },updateLightDesign: async function(){
            let light_copy_name = [];
            this.LightData = [];
            let light_info_copy = []

            light_info_copy = JSON.stringify(this.LightDesignData)
            light_info_copy = JSON.parse(light_info_copy);
            
            for (var i = 0; i < this.selectLight.length; i++) {
                light_copy_name.push(this.selectLight[i].ControlItem+'-'+this.selectLight[i].ControlSystem)
            }
            
            for (var i = 0; i < light_info_copy.length; i++) {
                if (this.lightidx === light_info_copy[i].ControlItem){
                    if (light_copy_name.indexOf(light_info_copy[i].ControlItem+'-'+light_info_copy[i].ControlSystem) === -1){
                        light_info_copy[i].checked = false
                    } else{
                        light_info_copy[i].checked = true
                    }
                    this.LightData.push(light_info_copy[i])
                }
            }
        },
        updateLight: async function(data,check){
            let lightname = [];
            if (check === true){
                const lightjson = await fetch('/UserLightJson',  {
                method: 'GET',
                });
                this.LightJson = await lightjson.json();
                for (var i = 0; i < this.LightJson.length; i++){
                    if (this.LightJson[i].uid === this.$auth.user().id){
                        lightname.push(this.LightJson[i].ControlSystem)
                    }
                }
                if (lightname.indexOf(data.ControlSystem) === -1){
                    let formData = new FormData();
                    formData.append('uid',this.$auth.user().id);
                    formData.append('ControlItem',data.ControlItem);
                    formData.append('ControlSystem',data.ControlSystem);
                    formData.append('QualityControl',data.QualityControl);
                    formData.append('StructuralRisk',data.StructuralRisk);
                    formData.append('JobDifficulty',data.JobDifficulty);
                    formData.append('Cost',data.Cost);
                    formData.append('SideEffect',data.SideEffect);
                    const response = await Light.createLight(formData);
                }
                // this.selectLight_copy.push(data)
            } else {
                const lightjson = await fetch('/UserLightJson',  {
                method: 'GET',
                });
                this.LightJson = await lightjson.json();
                for (var i = 0; i < this.LightJson.length; i++){
                    if (this.LightJson[i].ControlSystem === data.ControlSystem && this.LightJson[i].uid === this.$auth.user().id){
                        await Light.deleteLight(this.LightJson[i].id);
                    }
                }
                // for (var i = 0; i < this.selectLight_copy.length; i++){
                //     if (this.selectLight_copy[i].ControlSystem === data.ControlSystem){
                //         this.selectLight_copy.splice(i,1)
                //     }
                // }
            }
        },
        // updatelightcontrol(){
        //     const lightjson = await fetch('/UserLightJson',  {
        //     method: 'GET',
        //     });
        //     this.LightJson = await lightjson.json();
        //     for (var i = 0; i < this.selectLight_copy.length; i++){

        //     }
        // }
    }
}

</script>
<style scoped>
    @media screen and (max-width: 768px) {
        #daylight {
            font-size: 1px;
        }
    }
</style>