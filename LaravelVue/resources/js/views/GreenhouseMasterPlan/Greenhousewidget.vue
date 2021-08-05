<template>

    <div>
        <br>
        <h3 id="溫室結構重量估算">
            溫室結構重量估算系統
        </h3>
        <hr>
        <v-container-fluid>
            <v-row>
                <v-col class="col-md-8 offset-md-2">
                    <v-form>
                        <v-container>
                            <v-row>
                                <v-col cols="2"><v-subheader>A.屋頂形式</v-subheader></v-col>
                                <v-radio-group row v-model="radio_roof">
                                    <v-col><v-radio label="玻璃溫室" value="玻璃溫室"></v-radio></v-col>
                                    <v-col><v-radio label="斜頂溫室" value="斜頂溫室"></v-radio></v-col>
                                    <v-col><v-radio label="山型力霸" value="山型力霸"></v-radio></v-col>
                                    <v-col><v-radio label="圓形力霸" value="圓形力霸"></v-radio></v-col>
                                    <v-col><v-radio label="山型塑膠膜" value="山型塑膠膜"></v-radio></v-col>
                                    <v-col><v-radio label="圓形塑膠膜" value="圓形塑膠膜"></v-radio> </v-col>
                                </v-radio-group>
                            </v-row>
                            <v-row>
                                <v-col cols="2"><v-subheader>B.風速評估</v-subheader></v-col>
                                <v-col>
                                    <label for="縣市" style="color:rgba(0,0,0,.6); font-size:8px;">縣市</label>
                                    <b-select v-model="cityIdx" v-on:change="updateCity" name="縣市">
                                        <option v-for="(data, index) in City" :value="index" :key="index">
                                            {{data}}
                                        </option>
                                    </b-select>
                                </v-col>
                                <v-col>
                                    <label for="地區" style="color:rgba(0,0,0,.6); font-size:8px;">地區</label>
                                    <b-select v-model="regionIdx" v-on:change="updateRegion" name="地區">
                                        <option v-for="(data, index) in Region" :value="index" :key="index">
                                            {{data}}
                                        </option>
                                    </b-select>
                                </v-col>
                                <v-col>
                                    <label for="地貌" style="color:rgba(0,0,0,.6); font-size:8px;">地貌</label>
                                    <b-select v-model="SelectLandform" name="地貌">
                                        <option value="0">地貌</option>
                                        <option value="建築物">建築物</option>
                                        <option value="空曠">空曠</option>
                                        <option value="風口">風口</option>
                                    </b-select>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col cols="2"><v-subheader>C.設計數據</v-subheader></v-col>
                                <v-col>
                                    <v-text-field label="目標風速" v-model="design_wind"></v-text-field>
                                </v-col>
                                <v-col>
                                    <v-text-field label="設計跨距" v-model="design_span"></v-text-field>
                                </v-col>
                                <v-col>
                                    <v-text-field label="設計肩高" v-model="design_shoulder"></v-text-field>
                                </v-col>
                                <v-col>
                                    <v-text-field label="設計連棟" v-model="design_story"></v-text-field>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col cols="2"><v-subheader>D.栽種面積</v-subheader></v-col>
                                <v-col>
                                    <v-text-field label="南北長度(m)" v-model="plantlength" v-on:change="areacount"></v-text-field>
                                </v-col>  
                                <v-col>
                                    <v-text-field label="東西長度(m)" v-model="plantwidth" v-on:change="areacount"></v-text-field>
                                </v-col>        
                                <v-col>
                                    <label for="方位" style="color:rgba(0,0,0,.6); font-size:8px;">方位</label>
                                    <b-select v-model="position" name="方位">
                                        <option v-for="(data, index) in allposition" :value="data" :key="index">
                                            {{data}}
                                        </option>
                                    </b-select>
                                </v-col>                      
                            </v-row>
                            <v-row>
                                <v-col>
                                    <div style="border-width:3px;border-style:dashed;border-color:#FFAC55;padding:5px;">
                                        <table style="border:1px solid black; font-size: 1.5vmin" border='1'>
                                            <thead class="table-active">
                                                <tr align="center">
                                                    <td>型式</td>
                                                    <td>名稱</td>
                                                    <td>kg/m2</td>
                                                </tr>
                                            </thead>
                                            <tr align="center" v-for="(data, index) in roof_type" :key="index">
                                                <td>{{ roof_type[index] }}</td>
                                                <td>{{ roof_name[index] }}</td>
                                                <td>{{ roof_number[index] }}</td>
                                            </tr>
                                            
                                        </table>
                                        <br>
                                        <table style="border:1px solid black; font-size: 1.5vmin" border='1'>
                                            <thead class="table-active">
                                                <tr align="center">
                                                    <td>標準風速</td>
                                                    <td>規範風速</td>
                                                    <td>風速加級</td>
                                                    <td>系統建議風速</td>
                                                    <td>標準跨距</td>
                                                    <td>標準肩高</td>
                                                    <td>連棟性</td>
                                                </tr>
                                            </thead>
                                            <tr align="center" id="風速">
                                                <td>None</td>
                                                <td>None</td>
                                                <td>None</td>
                                                <td>None</td>
                                                <td>8</td>
                                                <td>3</td>
                                                <td>1</td>
                                            </tr>
                                        </table>
                                        <br>
                                        <table style="border:1px solid black; font-size: 1.5vmin" border='1'>
                                            <thead class="table-active">
                                                <tr align="center">
                                                    <td>型式</td>
                                                    <td>名稱</td>
                                                    <td>kg/m2</td>
                                                    <td>風速指數</td>
                                                    <td>跨距指數</td>
                                                    <td>肩高指數</td>
                                                    <td>連棟指數</td>
                                                    <td>預估單量</td>
                                                </tr>
                                            </thead>
                                            <tr align="center" id="風速">
                                                <td>{{ roof_type[roof_name.indexOf(radio_roof)] }}</td>
                                                <td>{{ radio_roof }}</td>
                                                <td>{{ roof_number[roof_name.indexOf(radio_roof)] }}</td>
                                                <td>{{ Math.round(Math.floor(design_span-8)/30*100)/100 }}</td>
                                                <td>{{ Math.round(Math.floor(design_span-8)/30*100)/100 }}</td>
                                                <td>{{ Math.round(Math.floor(design_shoulder-3)/6*100)/100 }}</td>
                                                <td>{{ Math.round(Math.floor(1-design_story)/5*100)/100 }}</td>
                                                <td>None</td>
                                            </tr>
                                        </table>
                                        <br>
                                        <table style="border:1px solid black; font-size: 1.5vmin" border='1'>
                                            <thead class="table-active">
                                                <tr align="center">
                                                    <td>農地南北長度</td>
                                                    <td>農地東西長度</td>
                                                    <td>方位(長邊)</td>
                                                    <td>農地面積(m2)</td>
                                                    <td>拱跨距</td>
                                                    <td>拱數</td>
                                                    <td>寬跨距</td>
                                                    <td>跨數</td>
                                                    <td>溫室面積(m2)</td>
                                                    <td>土地使用率</td>
                                                    <td>溫室結構總重</td>
                                                </tr>
                                            </thead>
                                            <tr align="center" id="風速">
                                                <td>{{ plantlength }}</td>
                                                <td>{{ plantwidth }}</td>
                                                <td>{{ position }}</td>
                                                <td>{{ Math.floor(plantlength*plantwidth) }}</td>
                                                <td>4</td>
                                                <td>{{ Math.floor(plantlength/4*0.95) }}</td>
                                                <td>{{ design_span }}</td>
                                                <td>{{ Math.floor(plantwidth/design_span*0.95) }}</td>
                                                <td>{{ Math.floor(plantlength/4*0.95)*Math.floor(plantwidth/design_span*0.95)*4*design_span }}</td>
                                                <td>{{ Math.round(Math.floor(Math.floor(plantlength/4*0.95)*Math.floor(plantwidth/design_span*0.95)*4*design_span)/Math.floor(plantlength*plantwidth)*100)/100*100 }}%</td>
                                                <td>None</td>
                                            </tr>
                                        </table>
                                    </div>
                                </v-col>
                            </v-row>
                        </v-container>
                </v-form>
                </v-col>
            </v-row>
        </v-container-fluid>
    </div>
</template>

<script>
  import * as SaveOverPlan from '../../services/saveoverplan_service.js';
  export default {
    data: () => ({
        radio_roof:null,
        cityIdx:0,
        regionIdx:0,
        City:['縣市',],
        Region:['地區',],
        regionalwindspeedjson:[],
        SelectLandform:0, // 選擇地貌
        SelectLandcondition:0, // 選擇地況
        design_wind:0,
        design_span:0,
        design_shoulder:0,
        design_story:0,
        plantlength:0,
        plantwidth:0,
        allposition:['方位','東','南','西','北','東南','西北'],
        position:'方位',
        roof_type:['WTG','SP','VTP','UTP','VBP','UBP'],
        roof_name:['玻璃溫室','斜頂溫室','山型力霸','圓型力霸','山型塑膠膜','圓型塑膠膜'],
        roof_number:[16,16,15,14,13,12],
    }),

    created:function(){  // 網頁載入時，一開始就載入
        this.getJson();
    },
    
    methods: {
        async getJson(){
        // 簡易型各建構項目比例
            const RegionalWindSpeed = await fetch('/RegionalWindSpeedJSON',  {
                method: 'GET',
            });
            this.regionalwindspeedjson = await RegionalWindSpeed.json();
            var filterfalg = false;
            // 篩選重複出現的縣市
            for(var i = 0 ; i < this.regionalwindspeedjson.length ; i++){
                filterfalg = false;
                for(var j = 0;j < this.City.length ; j++){
                    if(this.regionalwindspeedjson[i].County == this.City[j]) filterfalg = true;
                }
                if(!filterfalg) this.City.push(this.regionalwindspeedjson[i].County);
            }
        },
        updateCity(){     // 更新所選擇的縣市
            // 從所選的縣市id 找到 所選的縣市名稱
            for(var i = 0 ; i < this.City.length ; i++){
                if(i == this.cityIdx)    this.selectCity = this.City[i];
            }
            // 將地區資料初始化
            this.selectRegion = null;
            this.regionIdx = 0;
            this.Region = ['==請選擇地區=='];
            // 篩選所選縣市的地區
            for(var i = 0 ; i < this.regionalwindspeedjson.length ; i++){
                if(this.regionalwindspeedjson[i].County == this.selectCity){
                    this.Region.push(this.regionalwindspeedjson[i].Region);
                }
            }
        },
        updateRegion(){   // 更新所選擇的地區
            // 將地區資料初始化
            this.LandingProbability = 0,
            this.PathProbability = 0,
            this.Landing = null,
            this.Path = null;
            // 從所選的地區id 找到 所選的地區名稱
            for(var i = 0 ; i < this.Region.length ; i++){
                if(i == this.regionIdx)    this.selectRegion = this.Region[i];
            }
        },
    },
}
</script>