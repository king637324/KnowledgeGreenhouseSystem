<template>

    <div>
        <br>
        <h3 id="溫室規劃結果">
            溫室規劃結果
        </h3>
        <hr>
        <div style="display:flex">
            <div style="padding:10px">
                <table style="border:1px solid black; width:600px; height:300px" border='1'>
                    <thead class="table-active">
                        <tr align="center">
                            <td colspan="10">A.基本資料</td>
                        </tr>
                    </thead>
                    <tr align="center">
                        <th> 使用者</th>
                        <td> {{overplanArray[0].userclass}} </td>
                        <th> 溫室作物</th>
                        <td> {{overplanArray[0].palntclass}}-{{overplanArray[0].cropplant}} </td>
                    </tr>
                    <tr align="center">
                        <th> 地點</th>
                        <td> {{overplanArray[0].localcity}}-{{overplanArray[0].localarea}} </td>
                        <th> 地形</th>
                        <td> {{overplanArray[0].terrain}}-{{overplanArray[0].landform}} </td>
                    </tr>
                    <tr align="center">
                        <th> 栽種面積</th>
                        <td colspan="3"> {{overplanArray[0].croplength}} * {{overplanArray[0].cropwidth}} =  {{overplanArray[0].croparea}} 方位：{{overplanArray[0].position}}</td>
                    </tr>
                </table>
                <br>
                <table style="border:1px solid black; width:600px; height:500px; border-collapse: collapse;" border='1'>
                    <thead class="table-active">
                        <tr align="center">
                            <td colspan="10">B.作物需求環境分析</td>
                        </tr>
                    </thead>
                    <tr align="center">
                        <th> 好光姓</th>
                        <td>{{ result_plant.Goodlight }}</td>
                        <th> 光合光子密度</th>
                        <td>{{ result_plant.PPFD }}</td>

                    </tr>
                    <tr align="center">
                        <th> 光週期</th>
                        <td>{{ result_plant.Photoperiod }}</td>
                        <th> 光補償點</th>
                        <td>{{ result_plant.LightCompensationPoint }}</td>
                    </tr>
                    <tr align="center" style="border-bottom: 3pt solid black;">
                        <th> 光照度</th>
                        <td>{{ result_plant.Illuminance }}</td>
                        <th> 光飽和點</th>
                        <td>{{ result_plant.LightSaturationPoint }}</td>
                    </tr>
                    <tr align="center">
                        <th> 溫度適應性</th>
                        <td>{{ result_plant.Temperatureadaptability }}</td>
                    </tr>
                    <tr align="center">
                        <th> 生長最適溫</th>
                        <td>{{ result_plant.OptimalGrowthTemperature }}</td>
                        <th> 發芽最適溫</th>
                        <td>{{ result_plant.OptimumGerminationTemperature }}</td>
                    </tr>
                    <tr align="center">
                        <th> 生長最高溫</th>
                        <td>{{ result_plant.HighestGrowthTemperature }}</td>
                        <th> 發芽最高溫</th>
                        <td>{{ result_plant.HighestGerminationTemperature }}</td>
                    </tr>
                    <tr align="center" style="border-bottom: 3pt solid black;">
                        <th> 生長最低溫</th>
                        <td>{{ result_plant.LowestGrowthTemperature }}</td>
                        <th> 發芽最低溫</th>
                        <td>{{ result_plant.LowestGerminationTemperature }}</td>
                    </tr>
                    <tr align="center">
                        <th> 風速</th>
                        <td>{{ wind_speed }}</td>
                        <th> 颱風登陸</th>
                        <td>{{ result_plant.HighestGerminationTemperature }}</td>
                    </tr>
                    <tr align="center">
                        <th> 級數</th>
                        <td>{{ wind_rank }}</td>
                        <th> 颱風路徑</th>
                        <td>{{ result_plant.HighestGerminationTemperature }}</td>
                    </tr>
                    <tr align="center">
                        <th> 風名</th>
                        <td>{{ wind_name }}</td>
                        <th> 風速加級</th>
                        <td>{{ wind_addspeed }}</td>
                    </tr>
                    <tr align="center">
                        <th> 腐蝕加級</th>
                        <td>{{ corrosion_add }}</td>
                    </tr>
                </table>
            </div>
            <br>
            <div style="padding:10px">
                <table style="border:1px solid black; width:600px; height:300px" border='1'>
                    <thead class="table-active">
                        <tr align="center">
                            <td colspan="10">C.溫室規劃設計</td>
                        </tr>
                    </thead>
                    <tr align="center">
                        <th> 使用者</th>
                        <td> {{overplanArray[0].userclass}} </td>
                        <th> 溫室作物</th>
                        <td> {{overplanArray[0].palntclass}}-{{overplanArray[0].cropplant}} </td>
                    </tr>
                    <tr align="center">
                        <th> 地點</th>
                        <td> {{overplanArray[0].localcity}}-{{overplanArray[0].localarea}} </td>
                        <th> 地形</th>
                        <td> {{overplanArray[0].terrain}}-{{overplanArray[0].landform}} </td>
                    </tr>
                    <tr align="center">
                        <th> 栽種面積</th>
                        <td colspan="3"> {{overplanArray[0].croplength}} * {{overplanArray[0].cropwidth}} =  {{overplanArray[0].croparea}} 方位：{{overplanArray[0].position}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
        
</template>

<script>
    export default {
    data: () => ({
        overplanArray:[],
        OverPlanJson:[],
        vegetablejson:[],
        result_plant:[],
        windspeedjson:[],
        windlandingandpathjson:[],
        wind_speed:null,
        wind_name:null,
        wind_rank:null,
        wind_addspeed:null,
        corrosion_add:null,
    }),

    created:function(){  // 網頁載入時，一開始就載入
        this.getJson();
    },

    methods: {
        async getJson(){
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
            const Vegetable = await fetch('/VegetableJSON',  {
                method: 'GET',
            });
            this.vegetablejson = await Vegetable.json();
            for (var i = 0; i < this.vegetablejson.length; i++){
                if (this.vegetablejson[i].VegetableTypes === this.overplanArray[0].cropplant){
                    this.result_plant = JSON.parse(JSON.stringify(this.vegetablejson[i]));
                }
            }
            const RegionalWindSpeed = await fetch('/RegionalWindSpeedJSON',  {
                method: 'GET',
            });
            this.regionalwindspeedjson = await RegionalWindSpeed.json();
            for (var i = 0; i < this.regionalwindspeedjson.length; i++){
                if (this.regionalwindspeedjson[i].County === this.overplanArray[0].localcity && this.regionalwindspeedjson[i].Region === this.overplanArray[0].localarea ){
                    this.wind_speed = this.regionalwindspeedjson[i].SpeedPerSecond
                }
            }

            const WindSpeed = await fetch('/WindSpeedControlJSON',  {
                method: 'GET',
            });
            this.windspeedjson = await WindSpeed.json();
            for (var i = 0; i < this.windspeedjson.length; i++){
                if (Number(this.wind_speed) > Number(this.windspeedjson[i].SpeedMin) && Number(this.wind_speed) < Number(this.windspeedjson[i].SpeedMax)){
                    this.wind_rank = this.windspeedjson[i].Series
                    this.wind_name = this.windspeedjson[i].Wind
                }
            }

            const WindLandingAndPath = await fetch('/WindLandingAndPathJSON',  {
                method: 'GET',
            });
            this.windlandingandpathjson = await WindLandingAndPath.json();

            const windcorrosion = await fetch('/WindCorrosionsJSON',  {
                method: 'GET',
            });
            this.windcorrosionjson = await windcorrosion.json();
        },
        
    },
}
</script>