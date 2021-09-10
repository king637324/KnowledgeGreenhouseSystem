<template>

    <div>
        <br>
        <h3 id="溫室規劃結果">
            溫室規劃結果
        </h3>
        <hr>
        <v-container>
            <v-row>
                <table style="border:1px solid black; width:80vw; height:300px" border='1'>
                    <thead class="table-active">
                        <tr align="center">
                            <td colspan="10">A.基本資料</td>
                        </tr>
                    </thead>
                    <tr align="center">
                        <th> 使用者</th>
                        <td> {{overplanArray[0].userclass}}-{{overplanArray[0].usercodename}} </td>
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
            </v-row>
            <br/>
            <v-row>
                <table style="border:1px solid black; width:80vw; height:300px;" border='1'>
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
                        <td colspan="3">{{ result_plant.Temperatureadaptability }}</td>
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
                        <th> 颱風登陸總機率</th>
                        <td>{{ LandingProbability }}</td>
                    </tr>
                    <tr align="center">
                        <th> 級數</th>
                        <td>{{ wind_rank }}</td>
                        <th> 颱風路徑總機率</th>
                        <td>{{ PathProbability }}</td>
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
            </v-row>
            <br/>
            <v-row>
                <table style="border:1px solid black; width:80vw; height:300px" border='1'>
                    <thead class="table-active">
                        <tr align="center">
                            <td colspan="50">C.溫室規劃設計-披覆材料</td>
                        </tr>
                    </thead>
                    <tr align="center" v-for="(film, index) in FilmArray" :key="index">
                        <th> 材料名稱</th>
                        <td> {{film.material}}-{{film.BuildItem}} </td>
                        <th> 透光損失</th>
                        <td> {{film.LightLoss}} </td>
                        <th> 結構風險</th>
                        <td> {{film.StructuralRisk}} </td>
                        <th> 作業難度</th>
                        <td> {{film.JobDifficulty}} </td>
                        <th> 成本性</th>
                        <td> {{film.Cost}} </td>
                        <th> 副作用</th>
                        <td> {{film.SideEffect}} </td>
                    </tr>

                    <thead class="table-active">
                        <tr align="center">
                            <td colspan="50">C.溫室規劃設計-光控材料</td>
                        </tr>
                    </thead>
                    <tr align="center" v-for="(light, index) in selectlight" :key="index">
                        <th> 材料名稱</th>
                        <td> {{light.ControlItem}}-{{light.ControlSystem}} </td>
                        <th> 品質控制差異</th>
                        <td> {{light.QualityControl}} </td>
                        <th> 結構風險</th>
                        <td> {{light.StructuralRisk}} </td>
                        <th> 作業難度</th>
                        <td> {{light.JobDifficulty}} </td>
                        <th> 成本性</th>
                        <td> {{light.Cost}} </td>
                        <th> 副作用</th>
                        <td> {{light.SideEffect}} </td>
                    </tr>
                    <thead class="table-active">
                        <tr align="center">
                            <td colspan="50">C.溫室規劃設計-溫控材料</td>
                        </tr>
                    </thead>
                    <tr align="center" v-for="(temp, index) in selecttemp" :key="index">
                        <th> 材料名稱</th>
                        <td> {{temp.ControlItem}}-{{temp.ControlSystem}} </td>
                        <th> 品質控制差異</th>
                        <td> {{temp.QualityControl}} </td>
                        <th> 結構風險</th>
                        <td> {{temp.StructuralRisk}} </td>
                        <th> 作業難度</th>
                        <td> {{temp.JobDifficulty}} </td>
                        <th> 成本性</th>
                        <td> {{temp.Cost}} </td>
                        <th> 副作用</th>
                        <td> {{temp.SideEffect}} </td>
                    </tr>
                </table>
            </v-row>
            <br/>
            <v-row>
                <table style="border:1px solid black; width:80vw; height:300px" border='1'>
                    <thead class="table-active">
                        <tr align="center">
                            <td colspan="50">C.溫室規劃設計-結構材料(管材)</td>
                        </tr>
                    </thead>
                    <tr align="center" v-for="(pipe, index) in selectpipe" :key="index">
                        <th> 材料名稱</th>
                        <td> {{pipe.MaterialName}}</td>
                        <th> 鋼料</th>
                        <td> {{pipe.Price}} </td>
                        <th> 高強材</th>
                        <td> {{pipe.HighStrengthMaterial}} </td>
                        <th> 鋼胚</th>
                        <td> {{pipe.SteelBillet}} </td>
                        <th> 熱軋鋼板</th>
                        <td> {{pipe.HotRolledSteelSheet}} </td>
                        <th> 冷軋鋼板</th>
                        <td> {{pipe.ColdRolledSteelSheet}} </td>
                        <th> 連續熱浸鍍鋅</th>
                        <td> {{pipe.ContinuousHotDipGalvanizing}} </td>
                        <th> 連續烤漆</th>
                        <td> {{pipe.ContinuousPaint}} </td>
                        <th> 冷灣形成</th>
                        <td> {{pipe.ColdForming}} </td>
                        <th> 焊接</th>
                        <td> {{pipe.Welding}} </td>
                        <th> 加工</th>
                        <td> {{pipe.Processing}} </td>
                        <th> 後熱浸鍍鋅</th>
                        <td> {{pipe.AfterHotDipGalvanizing}} </td>
                        <th> 鍍鋁鋅</th>
                        <td> {{pipe.Galvalume}} </td>
                        <th> 鍍鎂鋁鋅</th>
                        <td> {{pipe.MagnesiumAluminumZincPlating}} </td>
                        <th> 後烤漆</th>
                        <td> {{pipe.AfterBaking}} </td>
                        <th> 速度性</th>
                        <td> {{pipe.Speed}} </td>
                        <th> 結構風險</th>
                        <td> {{pipe.StructuralRisk}} </td>
                        <th> 腐蝕性</th>
                        <td> {{pipe.Corrosive}} </td>
                        <th> 重量性</th>
                        <td> {{pipe.Weight}} </td>
                    </tr>
                    <thead class="table-active">
                        <tr align="center">
                            <td colspan="50">C.溫室規劃設計-結構材料(型材)</td>
                        </tr>
                    </thead>
                    <tr align="center" v-for="(profile, index) in selectprofile" :key="index">
                        <th> 材料名稱</th>
                        <td> {{profile.MaterialName}}</td>
                        <th> 鋼料</th>
                        <td> {{profile.Price}} </td>
                        <th> 高強材</th>
                        <td> {{profile.HighStrengthMaterial}} </td>
                        <th> 鋼胚</th>
                        <td> {{profile.SteelBillet}} </td>
                        <th> 熱軋鋼板</th>
                        <td> {{profile.HotRolledSteelSheet}} </td>
                        <th> 冷軋鋼板</th>
                        <td> {{profile.ColdRolledSteelSheet}} </td>
                        <th> 連續熱浸鍍鋅</th>
                        <td> {{profile.ContinuousHotDipGalvanizing}} </td>
                        <th> 連續烤漆</th>
                        <td> {{profile.ContinuousPaint}} </td>
                        <th> 冷灣形成</th>
                        <td> {{profile.ColdForming}} </td>
                        <th> 焊接</th>
                        <td> {{profile.Welding}} </td>
                        <th> 加工</th>
                        <td> {{profile.Processing}} </td>
                        <th> 後熱浸鍍鋅</th>
                        <td> {{profile.AfterHotDipGalvanizing}} </td>
                        <th> 鍍鋁鋅</th>
                        <td> {{profile.Galvalume}} </td>
                        <th> 鍍鎂鋁鋅</th>
                        <td> {{profile.MagnesiumAluminumZincPlating}} </td>
                        <th> 後烤漆</th>
                        <td> {{profile.AfterBaking}} </td>
                        <th> 速度性</th>
                        <td> {{profile.Speed}} </td>
                        <th> 結構風險</th>
                        <td> {{profile.StructuralRisk}} </td>
                        <th> 腐蝕性</th>
                        <td> {{profile.Corrosive}} </td>
                        <th> 重量性</th>
                        <td> {{profile.Weight}} </td>
                    </tr>
                </table>
            </v-row>
            <v-row>
                <table style="border:1px solid black; width:80vw; height:300px" border='1'>
                    <thead class="table-active">
                        <tr align="center">
                            <td colspan="50">C.溫室規劃設計-溫室型式設計</td>
                        </tr>
                    </thead>
                    <tr v-for="(material, index) in greenhouse_material" :key="index">
                        <th> 構建分布</th>
                        <td> {{ material }}</td>
                        <th> 規格選擇</th>
                        <td> 123 </td>
                        <th> 成本性</th>
                        <td> 123 </td>
                        <th> 結構風險</th>
                        <td> 123 </td>
                        <th> 作業難度</th>
                        <td> 123 </td>
                    </tr>

                </table>
            </v-row>
            <v-row>
                <table style="border:1px solid black; width:80vw; height:300px" border='1'>
                    <thead class="table-active">
                        <tr align="center">
                            <td colspan="50">D.載重設計-重量預估</td>
                        </tr>
                    </thead>
                    <tr v-for="(material, index) in greenhouse_material" :key="index">
                        <th> 構建分布</th>
                        <td> {{ material }}</td>
                        <th> 規格選擇</th>
                        <td> 123 </td>
                        <th> 成本性</th>
                        <td> 123 </td>
                        <th> 結構風險</th>
                        <td> 123 </td>
                        <th> 作業難度</th>
                        <td> 123 </td>
                    </tr>
                </table>
            </v-row>
            <v-row>
                <table style="border:1px solid black; width:80vw; height:300px" border='1'>
                    <thead class="table-active">
                        <tr align="center">
                            <td colspan="50">D.載重設計-成本分析</td>
                        </tr>
                    </thead>
                    <tr v-for="(material, index) in greenhouse_material" :key="index">
                        <th> 構建分布</th>
                        <td> {{ material }}</td>
                        <th> 規格選擇</th>
                        <td> 123 </td>
                        <th> 成本性</th>
                        <td> 123 </td>
                        <th> 結構風險</th>
                        <td> 123 </td>
                        <th> 作業難度</th>
                        <td> 123 </td>
                    </tr>
                </table>
            </v-row>
        </v-container>
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
        Landing:[],
        Path:[],
        LandingProbability:0,
        PathProbability:0,
        windlandingandpathjson:[],
        WindLand:[],
        WindPath:[],
        FilmJson:[],
        FilmArray:[],
        selectpipe:[],
        selectprofile:[],
        selectlight:[],
        selecttemp:[],
        DesignJson:[],
        DesignArray:[],
        greenhouse_material:['溫室管材','圓頂形式','圓拱距','基礎','跨距','肩高','長度','連續性','披覆材料']
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

            const WindLandingAndPath = await fetch('/WindLandingAndPathJSON',  {
                method: 'GET',
            });
            this.windlandingandpathjson = await WindLandingAndPath.json();

            const windcorrosion = await fetch('/WindCorrosionsJSON',  {
                method: 'GET',
            });
            this.windcorrosionjson = await windcorrosion.json();

            const WindSpeed = await fetch('/WindSpeedControlJSON',  {
                method: 'GET',
            });
            this.windspeedjson = await WindSpeed.json();

            const F_OverPlan = await fetch('/UserFilmJson',  {
                method: 'GET',
            });
            this.FilmJson = await F_OverPlan.json();
            for(var i = 0; i < this.FilmJson.length; i++){
                if (this.FilmJson[i].uid === this.$auth.user().id){
                    this.FilmArray.push(this.FilmJson[i])
                }
            }

            const S_OverPlan = await fetch('/UserSteelJson',  {
                method: 'GET',
            });
            this.SteelJson = await S_OverPlan.json();
            for(var i = 0; i < this.SteelJson.length; i++){
                if (this.SteelJson[i].uid === this.$auth.user().id){
                    if (this.SteelJson[i].Type === '管材'){
                        this.selectpipe.push(this.SteelJson[i])
                    } else{
                        this.selectprofile.push(this.SteelJson[i])
                    }
                }
            }

            const lightjson = await fetch('/UserLightJson',  {
                method: 'GET',
            });
            this.LightJson = await lightjson.json();
            for (var i = 0; i < this.LightJson.length; i++){
                if (this.LightJson[i].uid === this.$auth.user().id){
                    this.selectlight.push(this.LightJson[i])
                }
            }

            const tempjson = await fetch('/UserTempJson',  {
                method: 'GET',
            });
            this.UserTempJson = await tempjson.json();
            for (var i = 0; i < this.UserTempJson.length; i++){
                if (this.UserTempJson[i].uid === this.$auth.user().id){
                    this.selecttemp.push(this.UserTempJson[i])
                }
            }

            const D_OverPlan = await fetch('/DesignJson',  {
                method: 'GET',
            });
            this.DesignJson = await D_OverPlan.json();
            for(var i = 0; i < this.DesignJson.length; i++){
                if (this.DesignJson[i].uid === this.$auth.user().id){
                    this.DesignArray.push(this.DesignJson[i])
                }
            }

            var StrLanding,StrPath; 
            for (var i = 0; i < this.regionalwindspeedjson.length; i++){
                if (this.regionalwindspeedjson[i].County === this.overplanArray[0].localcity && this.regionalwindspeedjson[i].Region === this.overplanArray[0].localarea ){
                    this.wind_speed = this.regionalwindspeedjson[i].SpeedPerSecond
                    this.Landing = this.regionalwindspeedjson[i].WindLandingId;
                    this.Path = this.regionalwindspeedjson[i].WindPathId;

                    StrLanding = this.Landing.split(",");
                    StrPath =  this.Path.split(",");
                }
            }

            for(var i = 0 ; i < this.windlandingandpathjson.length  ; i++){
                if(this.windlandingandpathjson[i].analysis == "風力登陸分析"){
                    this.WindLand.push(this.windlandingandpathjson[i]);
                }else{
                    this.WindPath.push(this.windlandingandpathjson[i]);
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

            for (var i = 0; i < this.windspeedjson.length; i++){
                if (Number(this.wind_speed) > Number(this.windspeedjson[i].SpeedMin) && Number(this.wind_speed) < Number(this.windspeedjson[i].SpeedMax)){
                    this.wind_rank = this.windspeedjson[i].Series
                    this.wind_name = this.windspeedjson[i].Wind
                }
            }

            let wind123 = [];
            let corrosion = [];
            for (var i = 0; i < this.windcorrosionjson.length; i++){
                if (this.windcorrosionjson[i].landtype == this.overplanArray[0].terrain){
                    wind123[0] = this.windcorrosionjson[i].wind
                    corrosion[0] = this.windcorrosionjson[i].corrosion
                } else if (this.windcorrosionjson[i].landtype == this.overplanArray[0].landform){
                    wind123[1] = this.windcorrosionjson[i].wind
                    corrosion[1] = this.windcorrosionjson[i].corrosion                  
                }
            }
            this.wind_addspeed = Math.round(wind123[0]*wind123[1]*100)/100
            this.corrosion_add = Math.round(corrosion[0]*corrosion[1]*100)/100
        },
        
    },
}
</script>