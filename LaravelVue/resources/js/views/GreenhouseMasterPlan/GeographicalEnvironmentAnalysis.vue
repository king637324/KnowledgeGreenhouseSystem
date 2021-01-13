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
                        <b-select v-model="cityIdx" v-on:change="updateCity" style="font-size: 2vmin; width:20vmin" >
                            <option v-for="(data, index) in City" :value="index">
                                {{data}}
                            </option>
                        </b-select>

                        <b-select v-model="regionIdx" v-on:change="updateRegion" style="font-size: 2vmin; width:20vmin" >
                            <option v-for="(data, index) in Region" :value="index">
                                {{data}}
                            </option>
                        </b-select>

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

export default {
    data() {
        return {
            tabIndex: 0,
            windspeedjson:[],  // 風速對照表
            regionalwindspeedjson:[],   // 縣市地區資料
            windlandingandpathjson:[],  // 風力登陸分析、風力路徑分析

            WindLand:[],  // 紀錄颱風登陸的分類
            WindPath:[],  // 紀錄路徑分析的分類

            City:['==請選擇縣市==',],   // 縣市選單的陣列表
            cityIdx: 0, // 所選縣市的id
            selectCity: null, // 所選縣市的名稱

            Region:['==請選擇地區==',], // 地區選單的陣列表
            regionIdx: 0,   // 所選地區的id
            selectRegion: null, // 所選地區的名稱

            Series: null, // 風力級數
            Wind: null,   // 風的名稱
            SpeedPerSecond: null,    // 風速
            Landing: null,    // 風力登陸分析
            Path: null,   // 風力路徑分析

            LandingProbability: null, // 進行颱風登陸分析機率加總
            PathProbability: null, // 進行颱風路徑分析機率加總
        }
    },
    created:function(){  // 網頁載入時，一開始就載入
        this.getJson();
    },
    methods: {
        async getJson(){
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

            // 將 風力登陸 與 風力路徑 分類
            for(var i = 0 ; i < this.windlandingandpathjson.length  ; i++){
                if(this.windlandingandpathjson[i].analysis == "風力登陸分析"){
                    this.WindLand.push(this.windlandingandpathjson[i]);
                }else{
                    this.WindPath.push(this.windlandingandpathjson[i]);
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

        }
    },
}
</script>
