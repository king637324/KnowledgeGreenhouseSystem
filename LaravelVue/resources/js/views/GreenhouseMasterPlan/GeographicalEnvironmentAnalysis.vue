<template>
    <div>
        <br>
        <h2>地理環境分析</h2>
        <hr>

        <div class="d-flex justify-content-around">
            <div class="p-2 bd-highlight">
                <div class="card">
                    <label class="card-header  bg-info text-white" style="font-size: 2.3vmin">地區選擇</label>
                    <div class="card-body">
                        <v-container-fluid>
                            <v-row>
                                <v-col>
                                    <label for="縣市" style="color:rgba(0,0,0,.6); font-size:8px;">縣市</label>
                                    <b-select v-model="cityIdx" v-on:change="updateCity" style="font-size: 2vmin; width:10vmin" name="縣市">
                                        <option v-for="(data, index) in City" :value="data" :key="index">
                                            {{data}}
                                        </option>
                                    </b-select>
                                </v-col>  
                                <v-col>  
                                    <label for="地區" style="color:rgba(0,0,0,.6); font-size:8px;">地區</label>
                                    <b-select v-model="regionIdx" v-on:change="updateRegion" style="font-size: 2vmin; width:10vmin" name="地區">
                                        <option v-for="(data, index) in Region" :value="data" :key="index">
                                            {{data}}
                                        </option>
                                    </b-select>
                                </v-col> 
                                <v-col>  
                                    <label for="方位" style="color:rgba(0,0,0,.6); font-size:8px;">方位</label>
                                    <b-select v-model="position" name="方位" v-on:change="updateposition()" style="font-size: 2vmin; width:10vmin">
                                        <option v-for="(data, index) in allposition" :value="data" :key="index">
                                            {{data}}
                                        </option>
                                    </b-select>
                                </v-col> 
                            </v-row>
                            <v-row>
                                <v-col>
                                    <label for="地形" style="color:rgba(0,0,0,.6); font-size:8px;">地形</label>
                                    <b-select v-model="SelectTerrain" name="地形" v-on:change="updatewindcorrosion(SelectTerrain,SelectLandform)" style="font-size: 2vmin; width:10vmin">
                                        <option value="0">地形</option>
                                        <option v-for="(data, index) in windcorrosionjson" :value="data.landtype" :key="index" v-if="data.land=='地形'">{{ data.landtype }}</option>
                                    </b-select>
                                </v-col>  
                                <v-col>  
                                    <label for="地貌" style="color:rgba(0,0,0,.6); font-size:8px;">地貌</label>
                                    <b-select v-model="SelectLandform" name="地貌" v-on:change="updatewindcorrosion(SelectTerrain,SelectLandform)" style="font-size: 2vmin; width:10vmin">
                                        <option value="0">地貌</option>
                                        <option v-for="(data, index) in windcorrosionjson" :value="data.landtype" :key="index" v-if="data.land=='地貌'">{{ data.landtype }}</option>
                                    </b-select>
                                </v-col>
                                <v-col>
                                    <label for="地況" style="color:rgba(0,0,0,.6); font-size:8px;">地況</label>
                                    <b-select v-model="SelectLandcondition" name="地況" v-on:change="updatelandcondition()" style="font-size: 2vmin; width:10vmin">
                                        <option value="0">地況</option>
                                        <option value="硬質土">硬質土</option>
                                        <option value="軟質土">軟質土</option>
                                        <option value="下陷區">下陷區</option>
                                    </b-select>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col>
                                    <v-text-field label="長度(m)" v-model="plantlength" v-on:change="areacount" style="font-size: 2vmin; width:10vmin"></v-text-field>
                                </v-col>  
                                <v-col>
                                    <v-text-field label="寬度(m)" v-model="plantwidth" v-on:change="areacount" style="font-size: 2vmin; width:10vmin"></v-text-field>
                                </v-col>    
                                <v-col>
                                    <v-text-field readonly label="面積試算(公頃)" v-model="area" style="font-size: 2vmin; width:10vmin"></v-text-field>
                                </v-col>  
                            </v-row>
                        </v-container-fluid>
                        <br>
                        <h5>縣市：{{selectCity}} </h5>
                        <h5>地區：{{selectRegion}} </h5>
                        <h5>風速(m/sec)：{{SpeedPerSecond}} </h5>
                        <h5>級數：{{Series}} </h5>
                        <h5>風名： {{Wind}} </h5>
                        <h5>風力登陸分析： {{Landing}} </h5>
                        <h5>風力路徑分析： {{Path}} </h5>
                        <h5>颱風登陸總機率： {{LandingProbability}} %</h5>
                        <h5>颱風路徑總機率： {{PathProbability}} %</h5>
                        <h5>風速加級： {{ data_wind }}</h5>
                        <h5>腐蝕加級： {{ data_corrosion }}</h5>
                        <br>
                        <h6>備註：風速為臺灣地區各地之基本設計風速 </h6>

                    </div>
                </div>
            </div>

            <div class="p-2 bd-highlight">
                <!-- 風力登陸分析 圖片 -->
                <div>
                    <p align="center" style="font-size: 3vmin">風力登陸分析</p>
                    <img src = "/images/地理環境分析/風力登陸分析 (1911～2017).png"  style='width:30vmin'>
                </div>
                <br><br>

                <h5>風力登陸分析表 </h5>
                <table style="border:1px solid black;" border='1'>
                    <thead class="table-active">
                        <tr align="center">
                            <td>編號</td>
                            <td>次數</td>
                            <td>百分比 (%)</td>
                        </tr>
                    </thead>
                    <tr align="center"  v-for="(Land, index) in WindLand" :key="index">
                        <td> {{Land.item_Id}} </td>
                        <td> {{Land.frequency}} </td>
                        <td> {{Land.percentage}} % </td>
                    </tr>
                </table>

            </div>

            <div class="p-2 bd-highlight">


                <!-- 風力路徑分析 圖片 -->
                <div>
                    <p align="center" style="font-size: 3vmin">風力路徑分析</p>
                    <img src = "/images/地理環境分析/風力路徑分析 (1911～2017).png" style='width:30vmin'>
                </div>
                <br><br>

                <h5>風力路徑分析表 </h5>
                <table style="border:1px solid black;" border='1'>
                    <thead class="table-active">
                        <tr align="center">
                            <td>編號</td>
                            <td>次數</td>
                            <td>百分比 (%)</td>
                        </tr>
                    </thead>
                    <tr align="center"  v-for="(Path, index) in WindPath" :key="index">
                        <td> {{Path.item_Id}} </td>
                        <td> {{Path.frequency}} </td>
                        <td> {{Path.percentage}} % </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import * as SaveOverPlan from '../../services/saveoverplan_service.js';
export default {
    data() {
        return {
            tabIndex: 0,
            windspeedjson:[],  // 風速對照表
            regionalwindspeedjson:[],   // 縣市地區資料
            windlandingandpathjson:[],  // 風力登陸分析、風力路徑分析

            WindLand:[],  // 紀錄颱風登陸的分類
            WindPath:[],  // 紀錄路徑分析的分類

            City:['縣市',],   // 縣市選單的陣列表
            cityIdx: null, // 所選縣市的id
            selectCity: null, // 所選縣市的名稱

            Region:['地區',], // 地區選單的陣列表
            regionIdx: null,   // 所選地區的id
            selectRegion: null, // 所選地區的名稱

            Series: null, // 風力級數
            Wind: null,   // 風的名稱
            SpeedPerSecond: null,    // 風速
            Landing: null,    // 風力登陸分析
            Path: null,   // 風力路徑分析

            LandingProbability: 0, // 進行颱風登陸分析機率加總
            PathProbability: 0, // 進行颱風路徑分析機率加總

            SelectTerrain:'地形',
            SelectLandform:'地貌',
            SelectLandcondition:'地況',
            allposition:['方位','東','南','西','北','東南','西南','東北','西北'],
            position:'方位',

            plantlength:0,
            plantwidth:0,
            area:0,
            windcorrosionjson: [],
            data_wind: 0,
            data_corrosion: 0,
            overplanArray:[],
            OverPlanJson:[],
        }
    },
    created:function(){  // 網頁載入時，一開始就載入
        this.getJson();
    },
    methods: {
        async getJson(){    //取的資料庫資料，將資料轉成JSON
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
            const windcorrosion = await fetch('/WindCorrosionsJSON',  {
                method: 'GET',
            });
            this.windcorrosionjson = await windcorrosion.json();
    
            const WindLandingAndPath = await fetch('/WindLandingAndPathJSON',  {
                method: 'GET',
            });
            this.windlandingandpathjson = await WindLandingAndPath.json();

            const J_OverPlan = await fetch('/OverPlanJson',  {
            method: 'GET',
            });
            this.OverPlanJson = await J_OverPlan.json();
                for(var i = 0; i < this.OverPlanJson.length; i++){
                    this.overplanArray.push(this.OverPlanJson[i])
            }
            this.cityIdx = this.overplanArray[0].localcity
            this.position = this.overplanArray[0].position
            this.SelectTerrain = this.overplanArray[0].terrain
            this.SelectLandform = this.overplanArray[0].landform
            this.SelectLandcondition = this.overplanArray[0].landcondition
            this.plantlength = this.overplanArray[0].croplength
            this.plantwidth = this.overplanArray[0].cropwidth
            this.area = (this.plantlength*this.plantwidth)/10000

            var filterfalg = false;
            // 篩選重複出現的縣市
            for(var i = 0 ; i < this.regionalwindspeedjson.length ; i++){
                filterfalg = false;
                for(var j = 0;j < this.City.length ; j++){
                    if(this.regionalwindspeedjson[i].County == this.City[j]) filterfalg = true;
                }
                if(!filterfalg) this.City.push(this.regionalwindspeedjson[i].County);

            }

            // 將 風力登陸 與 風力路徑 分類
            for(var i = 0 ; i < this.windlandingandpathjson.length  ; i++){
                if(this.windlandingandpathjson[i].analysis == "風力登陸分析"){
                    this.WindLand.push(this.windlandingandpathjson[i]);
                }else{
                    this.WindPath.push(this.windlandingandpathjson[i]);
                }
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
            this.LandingProbability = 0,
            this.PathProbability = 0,
            this.Landing = null,
            this.Path = null,
            this.Region = ['地區'];


            // 篩選所選縣市的地區
            for(var i = 0 ; i < this.regionalwindspeedjson.length ; i++){
                if(this.regionalwindspeedjson[i].County == this.selectCity){
                    this.Region.push(this.regionalwindspeedjson[i].Region);
                }
            }
            this.regionIdx = this.overplanArray[0].localarea

            this.LandingProbability = 0,
            this.PathProbability = 0,
            this.Landing = null,
            this.Path = null;

            // 從所選的地區id 找到 所選的地區名稱
            for(var i = 0 ; i < this.Region.length ; i++){
                if(this.Region[i] == this.regionIdx)    this.selectRegion = this.Region[i];
            }

            var StrLanding,StrPath;  // 字串切割：風力登陸分析、風力路徑分析
            // 取得 風速、風力登陸分析、風力路徑分析
            for(var i = 0 ; i < this.regionalwindspeedjson.length ; i++){
                if((this.selectCity == this.regionalwindspeedjson[i].County ) && (this.selectRegion == this.regionalwindspeedjson[i].Region )){
                    this.SpeedPerSecond = this.regionalwindspeedjson[i].SpeedPerSecond;
                    this.Landing = this.regionalwindspeedjson[i].WindLandingId;
                    this.Path = this.regionalwindspeedjson[i].WindPathId;

                    StrLanding = this.Landing.split(",");
                    StrPath =  this.Path.split(",");

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

            // 進行颱風登陸總機率計算
            for(var i = 0 ; i <  StrLanding.length; i++){
                if(StrLanding[i] == "無") break;
                for(var j = 0 ; j < this.WindLand.length ; j++){
                    if(StrLanding[i] == this.WindLand[j].item_Id){
                        this.LandingProbability += parseFloat(this.WindLand[j].percentage,10);    // parseFloat() 將字串轉成浮點數做計算
                    }
                }
            }
            // 進行颱風路徑總機率計算
            for(var i = 0 ; i <  StrPath.length; i++){
                for(var j = 0 ; j < this.WindPath.length ; j++){
                    if(StrPath[i] == this.WindPath[j].item_Id){
                        this.PathProbability += parseFloat(this.WindPath[j].percentage,10);    // parseFloat() 將字串轉成浮點數做計算
                    }
                }
            }
            // 過濾計算所出現的小數點bug
            this.LandingProbability = this.LandingProbability.toFixed(2);
            this.PathProbability = this.PathProbability.toFixed(2);

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
            this.LandingProbability = 0,
            this.PathProbability = 0,
            this.Landing = null,
            this.Path = null,
            this.Region = ['地區'];


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
            // 將地區資料初始化
            this.LandingProbability = 0,
            this.PathProbability = 0,
            this.Landing = null,
            this.Path = null;

            // 從所選的地區id 找到 所選的地區名稱
            for(var i = 0 ; i < this.Region.length ; i++){
                if(this.Region[i] == this.regionIdx)    this.selectRegion = this.Region[i];
            }

            var StrLanding,StrPath;  // 字串切割：風力登陸分析、風力路徑分析
            // 取得 風速、風力登陸分析、風力路徑分析
            for(var i = 0 ; i < this.regionalwindspeedjson.length ; i++){
                if((this.selectCity == this.regionalwindspeedjson[i].County ) && (this.selectRegion == this.regionalwindspeedjson[i].Region )){
                    this.SpeedPerSecond = this.regionalwindspeedjson[i].SpeedPerSecond;
                    this.Landing = this.regionalwindspeedjson[i].WindLandingId;
                    this.Path = this.regionalwindspeedjson[i].WindPathId;

                    StrLanding = this.Landing.split(",");
                    StrPath =  this.Path.split(",");

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

            // 進行颱風登陸總機率計算
            for(var i = 0 ; i <  StrLanding.length; i++){
                if(StrLanding[i] == "無") break;
                for(var j = 0 ; j < this.WindLand.length ; j++){
                    if(StrLanding[i] == this.WindLand[j].item_Id){
                        this.LandingProbability += parseFloat(this.WindLand[j].percentage,10);    // parseFloat() 將字串轉成浮點數做計算
                    }
                }
            }
            // 進行颱風路徑總機率計算
            for(var i = 0 ; i <  StrPath.length; i++){
                for(var j = 0 ; j < this.WindPath.length ; j++){
                    if(StrPath[i] == this.WindPath[j].item_Id){
                        this.PathProbability += parseFloat(this.WindPath[j].percentage,10);    // parseFloat() 將字串轉成浮點數做計算
                    }
                }
            }
            // 過濾計算所出現的小數點bug
            this.LandingProbability = this.LandingProbability.toFixed(2);
            this.PathProbability = this.PathProbability.toFixed(2);

            let formData = new FormData();
            formData.append('localarea',this.regionIdx);
            formData.append('_method','put');
            const response = await SaveOverPlan.UpdateOverPlan(1, formData);

        },    
        areacount:async function(){
            
            this.area = (this.plantlength*this.plantwidth)/10000
            let formData = new FormData();
            formData.append('croplength',this.plantlength);
            formData.append('cropwidth',this.plantwidth);
            formData.append('croparea',this.area);
            formData.append('_method','put');
            const response = await SaveOverPlan.UpdateOverPlan(1, formData);
        },
        updatewindcorrosion: async function(SelectTerrain,SelectLandform){
            let wind123 = [];
            let corrosion = [];
            for (var i = 0; i < this.windcorrosionjson.length; i++){
                if (this.windcorrosionjson[i].landtype == SelectTerrain){
                    wind123[0] = this.windcorrosionjson[i].wind
                    corrosion[0] = this.windcorrosionjson[i].corrosion
                    let formData = new FormData();
                    formData.append('terrain',SelectTerrain);
                    formData.append('_method','put');
                    const response = await SaveOverPlan.UpdateOverPlan(1, formData);
                } else if (this.windcorrosionjson[i].landtype == SelectLandform){
                    wind123[1] = this.windcorrosionjson[i].wind
                    corrosion[1] = this.windcorrosionjson[i].corrosion              
                    let formData = new FormData();
                    formData.append('landform',SelectLandform);
                    formData.append('_method','put');
                    const response = await SaveOverPlan.UpdateOverPlan(1, formData);      
                }
            }
            this.data_wind = Math.round(wind123[0]*wind123[1]*100)/100
            this.data_corrosion = Math.round(corrosion[0]*corrosion[1]*100)/100
        },
        updateposition: async function(){
            let formData = new FormData();
            formData.append('position',this.position);
            formData.append('_method','put');
            const response = await SaveOverPlan.UpdateOverPlan(1, formData);
        },
        updatelandcondition: async function(){
            let formData = new FormData();
            formData.append('landcondition',this.SelectLandcondition);
            formData.append('_method','put');
            const response = await SaveOverPlan.UpdateOverPlan(1, formData);
        }
    },
}
</script>
