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
                                <v-col><v-subheader>A.屋頂形式</v-subheader></v-col>
                                <v-radio-group row v-model="radio_roof" v-on:change="updaterooftype">
                                    <v-col><v-radio label="玻璃溫室" value="玻璃溫室"></v-radio></v-col>
                                    <v-col><v-radio label="斜頂溫室" value="斜頂溫室"></v-radio></v-col>
                                    <v-col><v-radio label="山型力霸" value="山型力霸"></v-radio></v-col>
                                    <v-col><v-radio label="圓形力霸" value="圓形力霸"></v-radio></v-col>
                                    <v-col><v-radio label="山型塑膠膜" value="山型塑膠膜"></v-radio></v-col>
                                    <v-col><v-radio label="圓形塑膠膜" value="圓形塑膠膜"></v-radio> </v-col>
                                    <v-col><v-radio label="簡易溫室" value="簡易溫室"></v-radio> </v-col>
                                </v-radio-group>
                            </v-row>
                            <v-row>
                                <v-col cols="2"><v-subheader>B.風速評估</v-subheader></v-col>
                                <v-col>
                                    <label for="縣市" style="color:rgba(0,0,0,.6); font-size:8px;">縣市</label>
                                    <b-select v-model="cityIdx" v-on:change="updateCity" name="縣市">
                                        <option v-for="(data, index) in City" :value="data" :key="index">
                                            {{data}}
                                        </option>
                                    </b-select>
                                </v-col>
                                <v-col>
                                    <label for="地區" style="color:rgba(0,0,0,.6); font-size:8px;">地區</label>
                                    <b-select v-model="regionIdx" v-on:change="updateRegion" name="地區">
                                        <option v-for="(data, index) in Region" :value="data" :key="index">
                                            {{data}}
                                        </option>
                                    </b-select>
                                </v-col>
                                <v-col>
                                    <label for="地形" style="color:rgba(0,0,0,.6); font-size:8px;">地形</label>
                                    <b-select v-model="SelectTerrain" name="地形" v-on:change="updatewindcorrosion(SelectTerrain,SelectLandform)">
                                        <option value="0">地形</option>
                                        <option v-for="(data, index) in windcorrosionjson" :value="data.landtype" :key="index" v-if="data.land=='地形'">{{ data.landtype }}</option>
                                    </b-select>
                                </v-col>
                                <v-col>
                                    <label for="地貌" style="color:rgba(0,0,0,.6); font-size:8px;">地貌</label>
                                    <b-select v-model="SelectLandform" name="地貌" v-on:change="updatewindcorrosion(SelectTerrain,SelectLandform)">
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
                                    <v-text-field :label="'設計風速(建議'+design_wind+'m/s)'" v-model="design_wind" v-on:change="updatedesign"></v-text-field>
                                </v-col>
                                <v-col>
                                    <v-text-field label="設計跨距(m)" v-model="design_span" v-on:change="updatedesign"></v-text-field>
                                </v-col>
                                <v-col>
                                    <v-text-field label="設計肩高(m)" v-model="design_shoulder" v-on:change="updatedesign"></v-text-field>
                                </v-col>
                                <v-col>
                                    <v-text-field label="設計連棟" v-model="design_story" v-on:change="updatedesign"></v-text-field>
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
                                    <b-select v-model="position" name="方位"  v-on:change="updateposition()">
                                        <option v-for="(data, index) in allposition" :value="data" :key="index">
                                            {{data}}
                                        </option>
                                    </b-select>
                                </v-col>                      
                            </v-row>
                            <v-row>
                                <v-col>
                                    <div style="border-width:3px;border-style:dashed;border-color:#FFAC55;padding:5px;">
                                        <v-row>
                                            <v-col cols="12">
                                                <h3>重量預估</h3>
                                            </v-col>
                                            <v-col cols="12">
                                                <table style="border:1px solid black; font-size: 1.5vmin" border='1'>
                                                    <thead class="table-active">
                                                        <tr align="center">
                                                            <td>規範風速</td>
                                                            <td>風速加級</td>
                                                            <td>系統建議風速</td>
                                                            <td style="color:red">設計風速</td>
                                                        </tr>
                                                    </thead>
                                                    <tr align="center" id="風速">
                                                        <td>{{ SpeedPerSecond }}</td>
                                                        <td>{{ data_wind }}</td>
                                                        <td>{{ design_wind }}</td>
                                                        <td style="color:red">{{ design_wind }}</td>
                                                    </tr>
                                                </table>
                                            </v-col>
                                            <v-col cols="12">
                                                <table style="border:1px solid black; font-size: 1.5vmin" border='1'>
                                                    <thead class="table-active">
                                                        <tr align="center">
                                                            <td>標準跨距</td>
                                                            <td style="color:red">設計跨距</td>
                                                            <td>標準肩高</td>
                                                            <td style="color:red">設計肩高</td>
                                                            <td>連棟性</td>
                                                            <td style="color:red">設計連棟</td>
                                                        </tr>
                                                    </thead>
                                                    <tr align="center" id="風速">
                                                        <td>8</td>
                                                        <td style="color:red">{{ design_span }}</td>
                                                        <td>3</td>
                                                        <td style="color:red">{{ design_shoulder }}</td>
                                                        <td>1</td>
                                                        <td style="color:red">{{ design_story }}</td>
                                                    </tr>
                                                </table>
                                            </v-col>
                                            <v-col cols="12">
                                                <table style="border:1px solid black; font-size: 1.5vmin" border='1'>
                                                    <thead class="table-active">
                                                        <tr align="center">
                                                            <td>型式</td>
                                                            <td>名稱</td>
                                                            <td>標準單重(kg/m2)</td>
                                                            <td>風速指數</td>
                                                            <td>跨距指數</td>
                                                            <td>肩高指數</td>
                                                            <td>連棟指數</td>
                                                            <td>預估單重</td>
                                                        </tr>
                                                    </thead>
                                                    <tr align="center" id="風速">
                                                        <td>{{ roof_type[roof_name.indexOf(radio_roof)] }}</td>
                                                        <td>{{ radio_roof }}</td>
                                                        <td>{{ roof_number[roof_name.indexOf(radio_roof)] }}</td>
                                                        <td>{{ Math.round(Math.floor(design_wind-30)/design_wind*100)/100 }}</td>
                                                        <td>{{ Math.round(Math.floor(design_span-8)/30*100)/100 }}</td>
                                                        <td>{{ Math.round(Math.floor(design_shoulder-3)/6*100)/100 }}</td>
                                                        <td>{{ Math.round(Math.floor(1-design_story)/(design_story*5)*100)/100 }}</td>
                                                        <td>{{ Math.round(roof_number[roof_name.indexOf(radio_roof)]*
                                                            (
                                                                1+
                                                                (Math.round(Math.floor(design_wind-30)/design_wind*100)/100)+
                                                                (Math.round(Math.floor(design_span-8)/30*100)/100)+
                                                                (Math.round(Math.floor(design_shoulder-3)/6*100)/100)+
                                                                (Math.round(Math.floor(1-design_story)/(design_story*5)*100)/100)
                                                            )*100)/100 }}
                                                        </td>
                                                    </tr>
                                                </table>
                                            </v-col>
                                            <v-col cols="12">
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
                                                        <td>{{ Math.floor(parseFloat(plantlength)/4*0.95) }}</td>
                                                        <td>8</td>
                                                        <td>{{ Math.floor(plantwidth/8*0.95) }}</td>
                                                        <td>{{ Math.floor(plantlength/4*0.95)*Math.floor(plantwidth/8*0.95)*4*8 }}</td>
                                                        <td>{{ Math.round(Math.floor(Math.floor(plantlength/4*0.95)*Math.floor(plantwidth/design_span*0.95)*4*design_span)/Math.floor(plantlength*plantwidth)*100)/100*100 }}%</td>
                                                        <td>{{ Math.floor((Math.round(roof_number[roof_name.indexOf(radio_roof)]*
                                                            (
                                                                1+
                                                                (Math.round(Math.floor(design_wind-30)/design_wind*100)/100)+
                                                                (Math.round(Math.floor(design_span-8)/30*100)/100)+
                                                                (Math.round(Math.floor(design_shoulder-3)/6*100)/100)+
                                                                (Math.round(Math.floor(1-design_story)/(design_story*5)*100)/100)
                                                            )*100)/100)*Math.floor(plantlength/4*0.95)*Math.floor(plantwidth/8*0.95)*4*8) }}
                                                        </td>
                                                    </tr>
                                                </table>
                                            </v-col>
                                        </v-row>
                                    </div>
                                </v-col>
                                <v-col>
                                    <div style="border-width:3px;border-style:dashed;border-color:#FFAC55;padding:5px;">
                                        <v-row>
                                            <v-col cols="12">
                                                <h3>成本分析</h3>
                                            </v-col>
                                            <v-col cols="12">
                                                <table style="border:1px solid black; font-size: 1.5vmin" border='1'>
                                                    <thead class="table-active">
                                                        <tr align="center">
                                                            <td>結構材料單價(kg)</td>
                                                            <td>結構材料總價(kg)</td>
                                                            <td>人工單價(元/kg)</td>
                                                            <td>溫室人工費</td>
                                                            <td>結構工程總價</td>
                                                        </tr>
                                                    </thead>
                                                    <tr align="center">
                                                        <td>40</td>
                                                        <td>{{Math.floor(roof_number[roof_name.indexOf(radio_roof)]*
                                                            (
                                                                1+
                                                                Math.round(Math.floor(design_wind-30)/design_wind*100)/100+
                                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                                            )*Math.floor(plantlength/4*0.95)*Math.floor(plantwidth/design_span*0.95)*4*design_span)*40 }}
                                                        </td>
                                                        <td>10</td>
                                                        <td>{{ Math.floor(roof_number[roof_name.indexOf(radio_roof)]*
                                                            (
                                                                1+
                                                                Math.round(Math.floor(design_wind-30)/design_wind*100)/100+
                                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                                            )*Math.floor(plantlength/4*0.95)*Math.floor(plantwidth/design_span*0.95)*4*design_span)*10 }}
                                                        </td>
                                                        <td>{{ Math.floor(roof_number[roof_name.indexOf(radio_roof)]*
                                                            (
                                                                1+
                                                                Math.round(Math.floor(design_wind-30)/design_wind*100)/100+
                                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                                            )*Math.floor(plantlength/4*0.95)*Math.floor(plantwidth/design_span*0.95)*4*design_span)*10+
                                                            Math.floor(roof_number[roof_name.indexOf(radio_roof)]*
                                                            (
                                                                1+
                                                                Math.round(Math.floor(design_wind-30)/design_wind*100)/100+
                                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                                            )*Math.floor(plantlength/4*0.95)*Math.floor(plantwidth/design_span*0.95)*4*design_span)*40 }}
                                                        </td>
                                                    </tr>
                                                </table>
                                            </v-col>
                                            <v-col cols="12">
                                                <table style="border:1px solid black; font-size: 1.5vmin" border='1'>
                                                    <thead class="table-active">
                                                        <tr align="center">
                                                            <td>披覆材料面積(m2)</td>
                                                            <td>披覆材料單價(元/m2)</td>
                                                            <td>披覆材料價(元)</td>
                                                            <td>披覆人工費(元/m2)</td>
                                                            <td>披覆材料人工費(元)</td>
                                                            <td>披覆工程總價</td>
                                                        </tr>
                                                    </thead>
                                                    <tr align="center">
                                                        <td>{{ Math.floor(Math.floor(plantlength)*Math.floor(plantwidth)*1.3+(Math.floor(plantlength)+Math.floor(plantwidth))*1.2*(1+0.3/design_story)) }}</td>
                                                        <td>{{ 50 }}</td>
                                                        <td>{{ Math.floor(Math.floor(plantlength)*Math.floor(plantwidth)*1.3+(Math.floor(plantlength)+Math.floor(plantwidth))*1.2*(1+0.3/design_story))*50 }}</td>
                                                        <td>{{ 10 }}</td>
                                                        <td>{{ Math.floor(Math.floor(plantlength)*Math.floor(plantwidth)*1.3+(Math.floor(plantlength)+Math.floor(plantwidth))*1.2*(1+0.3/design_story))*10 }}</td>
                                                        <td>{{ Math.floor(Math.floor(plantlength)*Math.floor(plantwidth)*1.3+(Math.floor(plantlength)+Math.floor(plantwidth))*1.2*(1+0.3/design_story))*50+
                                                            Math.floor(Math.floor(plantlength)*Math.floor(plantwidth)*1.3+(Math.floor(plantlength)+Math.floor(plantwidth))*1.2*(1+0.3/design_story))*10 }}</td>
                                                    </tr>
                                                </table>
                                            </v-col>
                                            <v-col cols="12">
                                                <table style="border:1px solid black; font-size: 1.5vmin" border='1'>
                                                    <thead class="table-active">
                                                        <tr align="center">
                                                            <td>整地面積(m2)</td>
                                                            <td>整地單價</td>
                                                            <td>整地費用</td>
                                                            <td>基礎數量</td>
                                                            <td>基礎單價</td>
                                                            <td>基礎費用</td>
                                                            <td>土建工程費用</td>
                                                        </tr>
                                                    </thead>
                                                    <tr align="center">
                                                        <td>{{ Math.floor(plantlength*plantwidth) }}</td>
                                                        <td>{{ 100 }}</td>
                                                        <td>{{ Math.floor(plantlength*plantwidth)*100 }}</td>
                                                        <td>{{ Math.floor(Math.floor(plantlength/4*0.95+1)*Math.floor(plantwidth/8*0.95+1)*1.2) }}</td>
                                                        <td>2000</td>
                                                        <td>{{ Math.floor(Math.floor(plantlength/4*0.95+1)*Math.floor(plantwidth/8*0.95+1)*1.2*2000) }}</td>
                                                        <td>{{ Math.floor(Math.floor(plantlength/4*0.95+1)*Math.floor(plantwidth/8*0.95+1)*1.2*2000)+Math.floor(plantlength*plantwidth)*100 }}</td>
                                                    </tr>
                                                </table>
                                            </v-col>
                                            <v-col cols="12">
                                                <table style="border:1px solid black; font-size: 1.5vmin" border='1'>
                                                    <thead class="table-active">
                                                        <tr align="center">
                                                            <td>A.結構工程</td>
                                                            <td>B.披覆工程</td>
                                                            <td>C.土建工程</td>
                                                            <td>D.設計管理</td>
                                                            <td>合計</td>
                                                            <td>平方米單價</td>
                                                            <td>坪單價</td>
                                                        </tr>
                                                    </thead>
                                                    <tr align="center">
                                                        <td>{{ Math.floor(roof_number[roof_name.indexOf(radio_roof)]*
                                                            (
                                                                1+
                                                                Math.round(Math.floor(design_wind-30)/design_wind*100)/100+
                                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                                            )*Math.floor(plantlength/4*0.95)*Math.floor(plantwidth/design_span*0.95)*4*design_span)*10+
                                                            Math.floor(roof_number[roof_name.indexOf(radio_roof)]*
                                                            (
                                                                1+
                                                                Math.round(Math.floor(design_wind-30)/design_wind*100)/100+
                                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                                            )*Math.floor(plantlength/4*0.95)*Math.floor(plantwidth/design_span*0.95)*4*design_span)*40 }}
                                                        </td>
                                                        <td>{{  Math.floor(Math.floor(plantlength)*Math.floor(plantwidth)*1.3+(Math.floor(plantlength)+Math.floor(plantwidth))*1.2*(1+0.3/design_story))*50+
                                                            Math.floor(Math.floor(plantlength)*Math.floor(plantwidth)*1.3+(Math.floor(plantlength)+Math.floor(plantwidth))*1.2*(1+0.3/design_story))*10 }}</td>
                                                        <td>{{ Math.floor(Math.floor(plantlength/4*0.95+1)*Math.floor(plantwidth/8*0.95+1)*1.2*2000)+Math.floor(plantlength*plantwidth)*100 }}</td>
                                                        <td>{{ (Math.floor(roof_number[roof_name.indexOf(radio_roof)]*
                                                            (
                                                                1+
                                                                Math.round(Math.floor(design_wind-30)/design_wind*100)/100+
                                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                                            )*Math.floor(plantlength/4*0.95)*Math.floor(plantwidth/design_span*0.95)*4*design_span)*10+
                                                            Math.floor(roof_number[roof_name.indexOf(radio_roof)]*
                                                            (
                                                                1+
                                                                Math.round(Math.floor(design_wind-30)/design_wind*100)/100+
                                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                                            )*Math.floor(plantlength/4*0.95)*Math.floor(plantwidth/design_span*0.95)*4*design_span)*40+
                                                             Math.floor(Math.floor(plantlength)*Math.floor(plantwidth)*1.3+(Math.floor(plantlength)+Math.floor(plantwidth))*1.2*(1+0.3/design_story))*50+
                                                            Math.floor(Math.floor(plantlength)*Math.floor(plantwidth)*1.3+(Math.floor(plantlength)+Math.floor(plantwidth))*1.2*(1+0.3/design_story))*10+
                                                            Math.floor(Math.floor(plantlength/4*0.95+1)*Math.floor(plantwidth/8*0.95+1)*1.2*2000)+Math.floor(plantlength*plantwidth)*100)*0.1 }}
                                                        </td>
                                                        <td>{{ (Math.floor(roof_number[roof_name.indexOf(radio_roof)]*
                                                            (
                                                                1+
                                                                Math.round(Math.floor(design_wind-30)/design_wind*100)/100+
                                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                                            )*Math.floor(plantlength/4*0.95)*Math.floor(plantwidth/design_span*0.95)*4*design_span)*10+
                                                            Math.floor(roof_number[roof_name.indexOf(radio_roof)]*
                                                            (
                                                                1+
                                                                Math.round(Math.floor(design_wind-30)/design_wind*100)/100+
                                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                                            )*Math.floor(plantlength/4*0.95)*Math.floor(plantwidth/design_span*0.95)*4*design_span)*40+
                                                             Math.floor(Math.floor(plantlength)*Math.floor(plantwidth)*1.3+(Math.floor(plantlength)+Math.floor(plantwidth))*1.2*(1+0.3/design_story))*50+
                                                            Math.floor(Math.floor(plantlength)*Math.floor(plantwidth)*1.3+(Math.floor(plantlength)+Math.floor(plantwidth))*1.2*(1+0.3/design_story))*10+
                                                            Math.floor(Math.floor(plantlength/4*0.95+1)*Math.floor(plantwidth/8*0.95+1)*1.2*2000)+Math.floor(plantlength*plantwidth)*100)+((Math.floor(roof_number[roof_name.indexOf(radio_roof)]*
                                                            (
                                                                1+
                                                                Math.round(Math.floor(design_wind-30)/design_wind*100)/100+
                                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                                            )*Math.floor(plantlength/4*0.95)*Math.floor(plantwidth/design_span*0.95)*4*design_span)*10+
                                                            Math.floor(roof_number[roof_name.indexOf(radio_roof)]*
                                                            (
                                                                1+
                                                                Math.round(Math.floor(design_wind-30)/design_wind*100)/100+
                                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                                            )*Math.floor(plantlength/4*0.95)*Math.floor(plantwidth/design_span*0.95)*4*design_span)*40+
                                                             Math.floor(Math.floor(plantlength)*Math.floor(plantwidth)*1.3+(Math.floor(plantlength)+Math.floor(plantwidth))*1.2*(1+0.3/design_story))*50+
                                                            Math.floor(Math.floor(plantlength)*Math.floor(plantwidth)*1.3+(Math.floor(plantlength)+Math.floor(plantwidth))*1.2*(1+0.3/design_story))*10+
                                                            Math.floor(Math.floor(plantlength/4*0.95+1)*Math.floor(plantwidth/8*0.95+1)*1.2*2000)+Math.floor(plantlength*plantwidth)*100)*0.1) }}
                                                        </td>
                                                        <td>{{ Math.round(((Math.floor(roof_number[roof_name.indexOf(radio_roof)]*
                                                            (
                                                                1+
                                                                Math.round(Math.floor(design_wind-30)/design_wind*100)/100+
                                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                                            )*Math.floor(plantlength/4*0.95)*Math.floor(plantwidth/design_span*0.95)*4*design_span)*10+
                                                            Math.floor(roof_number[roof_name.indexOf(radio_roof)]*
                                                            (
                                                                1+
                                                                Math.round(Math.floor(design_wind-30)/design_wind*100)/100+
                                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                                            )*Math.floor(plantlength/4*0.95)*Math.floor(plantwidth/design_span*0.95)*4*design_span)*40+
                                                             Math.floor(Math.floor(plantlength)*Math.floor(plantwidth)*1.3+(Math.floor(plantlength)+Math.floor(plantwidth))*1.2*(1+0.3/design_story))*50+
                                                            Math.floor(Math.floor(plantlength)*Math.floor(plantwidth)*1.3+(Math.floor(plantlength)+Math.floor(plantwidth))*1.2*(1+0.3/design_story))*10+
                                                            Math.floor(Math.floor(plantlength/4*0.95+1)*Math.floor(plantwidth/8*0.95+1)*1.2*2000)+Math.floor(plantlength*plantwidth)*100)+((Math.floor(roof_number[roof_name.indexOf(radio_roof)]*
                                                            (
                                                                1+
                                                                Math.round(Math.floor(design_wind-30)/design_wind*100)/100+
                                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                                            )*Math.floor(plantlength/4*0.95)*Math.floor(plantwidth/design_span*0.95)*4*design_span)*10+
                                                            Math.floor(roof_number[roof_name.indexOf(radio_roof)]*
                                                            (
                                                                1+
                                                                Math.round(Math.floor(design_wind-30)/design_wind*100)/100+
                                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                                            )*Math.floor(plantlength/4*0.95)*Math.floor(plantwidth/design_span*0.95)*4*design_span)*40+
                                                             Math.floor(Math.floor(plantlength)*Math.floor(plantwidth)*1.3+(Math.floor(plantlength)+Math.floor(plantwidth))*1.2*(1+0.3/design_story))*50+
                                                            Math.floor(Math.floor(plantlength)*Math.floor(plantwidth)*1.3+(Math.floor(plantlength)+Math.floor(plantwidth))*1.2*(1+0.3/design_story))*10+
                                                            Math.floor(Math.floor(plantlength/4*0.95+1)*Math.floor(plantwidth/8*0.95+1)*1.2*2000)+Math.floor(plantlength*plantwidth)*100)*0.1))/(Math.floor(plantlength/4*0.95)*Math.floor(plantwidth/8*0.95)*4*8)) }}
                                                        </td>
                                                        <td>{{ Math.round(((Math.floor(roof_number[roof_name.indexOf(radio_roof)]*
                                                            (
                                                                1+
                                                                Math.round(Math.floor(design_wind-30)/design_wind*100)/100+
                                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                                            )*Math.floor(plantlength/4*0.95)*Math.floor(plantwidth/design_span*0.95)*4*design_span)*10+
                                                            Math.floor(roof_number[roof_name.indexOf(radio_roof)]*
                                                            (
                                                                1+
                                                                Math.round(Math.floor(design_wind-30)/design_wind*100)/100+
                                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                                            )*Math.floor(plantlength/4*0.95)*Math.floor(plantwidth/design_span*0.95)*4*design_span)*40+
                                                             Math.floor(Math.floor(plantlength)*Math.floor(plantwidth)*1.3+(Math.floor(plantlength)+Math.floor(plantwidth))*1.2*(1+0.3/design_story))*50+
                                                            Math.floor(Math.floor(plantlength)*Math.floor(plantwidth)*1.3+(Math.floor(plantlength)+Math.floor(plantwidth))*1.2*(1+0.3/design_story))*10+
                                                            Math.floor(Math.floor(plantlength/4*0.95+1)*Math.floor(plantwidth/8*0.95+1)*1.2*2000)+Math.floor(plantlength*plantwidth)*100)+((Math.floor(roof_number[roof_name.indexOf(radio_roof)]*
                                                            (
                                                                1+
                                                                Math.round(Math.floor(design_wind-30)/design_wind*100)/100+
                                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                                            )*Math.floor(plantlength/4*0.95)*Math.floor(plantwidth/design_span*0.95)*4*design_span)*10+
                                                            Math.floor(roof_number[roof_name.indexOf(radio_roof)]*
                                                            (
                                                                1+
                                                                Math.round(Math.floor(design_wind-30)/design_wind*100)/100+
                                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                                            )*Math.floor(plantlength/4*0.95)*Math.floor(plantwidth/design_span*0.95)*4*design_span)*40+
                                                             Math.floor(Math.floor(plantlength)*Math.floor(plantwidth)*1.3+(Math.floor(plantlength)+Math.floor(plantwidth))*1.2*(1+0.3/design_story))*50+
                                                            Math.floor(Math.floor(plantlength)*Math.floor(plantwidth)*1.3+(Math.floor(plantlength)+Math.floor(plantwidth))*1.2*(1+0.3/design_story))*10+
                                                            Math.floor(Math.floor(plantlength/4*0.95+1)*Math.floor(plantwidth/8*0.95+1)*1.2*2000)+Math.floor(plantlength*plantwidth)*100)*0.1))/(Math.floor(plantlength/4*0.95)*Math.floor(plantwidth/8*0.95)*4*8)/0.3025) }}
                                                        </td>
                                                    </tr>
                                                </table>
                                            </v-col>
                                        </v-row>
                                    </div>
                                </v-col>
                            </v-row>
                        </v-container>
                </v-form>
                </v-col>
            </v-row>
        </v-container-fluid>
        <div style="position:fixed;top:15%; right:0; z-index:999;">
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
        </div>
    </div>
</template>

<script>
  import * as SaveOverPlan from '../../services/saveoverplan_service.js';
  import * as Weight from '../../services/weight_estimation.js';
  export default {
    data: () => ({
        radio_roof:null,
        cityIdx:null,
        regionIdx:null,
        City:['縣市',],
        Region:['地區',],
        regionalwindspeedjson:[],
        SelectLandform:null, // 選擇地貌
        SelectTerrain:0,
        SelectLandcondition:0, // 選擇地況
        design_wind:0,
        design_span:0,
        design_shoulder:0,
        design_story:0,
        plantlength:0,
        plantwidth:0,
        allposition:['方位','東','南','西','北','東南','東北','西南','西北'],
        position:'方位',
        roof_type:['WTG','SP','VTP','UTP','VBP','UBP','UP'],
        roof_name:['玻璃溫室','斜頂溫室','山型力霸','圓形力霸','山型塑膠膜','圓形塑膠膜','簡易溫室'],
        roof_number:[16,16,15,14,13,12,6],
        SpeedPerSecond: null, 
        data_wind: 0,
        WeightArray:[],
        WeightJson:[],
        overplanArray:[],
        OverPlanJson:[],
        area:0,
        now_user: null,
        now_user_two:null,
    }),

    created:function(){  // 網頁載入時，一開始就載入
        if (this.$auth.check() === false) {
            this.$router.push({ name: '使用者登入' })
        }
        this.getJson();
    },
    
    methods: {
        async getJson(){
            const windcorrosion = await fetch('/WindCorrosionsJSON',  {
                method: 'GET',
            });
            this.windcorrosionjson = await windcorrosion.json();
            const RegionalWindSpeed = await fetch('/RegionalWindSpeedJSON',  {
                method: 'GET',
            });
            this.regionalwindspeedjson = await RegionalWindSpeed.json();

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
            this.cityIdx = this.overplanArray[0].localcity
            this.SelectTerrain = this.overplanArray[0].terrain
            this.SelectLandform = this.overplanArray[0].landform
            this.position = this.overplanArray[0].position
            this.plantlength = this.overplanArray[0].croplength
            this.plantwidth = this.overplanArray[0].cropwidth

            const W_Estimation = await fetch('/WeightJson',  {
            method: 'GET',
            });
            this.WeightJson = await W_Estimation.json();
            for(var i = 0; i < this.WeightJson.length; i++){
                if (this.WeightJson[i].uid === this.$auth.user().id){
                    this.WeightArray.push(this.WeightJson[i])
                    this.now_user_two = this.WeightJson[i].id
                    this.radio_roof = this.WeightArray[0].roof_type
                    this.design_wind = this.WeightArray[0].wind_design
                    this.design_span = this.WeightArray[0].span_design
                    this.design_shoulder = this.WeightArray[0].shoulder_design
                    this.design_story = this.WeightArray[0].continue_design
                }      
            }

            

            var filterfalg = false;
            // 篩選重複出現的縣市
            for(var i = 0 ; i < this.regionalwindspeedjson.length ; i++){
                filterfalg = false;
                for(var j = 0;j < this.City.length ; j++){
                    if(this.regionalwindspeedjson[i].County == this.City[j]) filterfalg = true;
                }
                if(!filterfalg) this.City.push(this.regionalwindspeedjson[i].County);
            }

            this.SpeedPerSecond = null;
            for(var i = 0 ; i < this.City.length ; i++){
                if(this.City[i] == this.cityIdx)    this.selectCity = this.City[i];
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
            this.regionIdx = this.overplanArray[0].localarea

            this.LandingProbability = 0,
            this.PathProbability = 0,
            this.Landing = null,
            this.Path = null;
            // 從所選的地區id 找到 所選的地區名稱
            for(var i = 0 ; i < this.Region.length ; i++){
                if(this.Region[i] == this.regionIdx)    this.selectRegion = this.Region[i];
            }
            for(var i = 0 ; i < this.regionalwindspeedjson.length ; i++){
                if((this.selectCity == this.regionalwindspeedjson[i].County ) && (this.selectRegion == this.regionalwindspeedjson[i].Region )){
                    this.SpeedPerSecond = this.regionalwindspeedjson[i].SpeedPerSecond;
                }
            }
            let wind123 = [];
            let corrosion = [];
            for (var i = 0; i < this.windcorrosionjson.length; i++){
                if (this.windcorrosionjson[i].landtype == this.SelectTerrain){
                    wind123[0] = this.windcorrosionjson[i].wind
                    corrosion[0] = this.windcorrosionjson[i].corrosion
                } else if (this.windcorrosionjson[i].landtype == this.SelectLandform){
                    wind123[1] = this.windcorrosionjson[i].wind
                    corrosion[1] = this.windcorrosionjson[i].corrosion                  
                }
            }
            this.data_wind = Math.round(wind123[0]*wind123[1]*100)/100
            this.data_corrosion = Math.round(corrosion[0]*corrosion[1]*100)/100
        },
        updateCity: async function(){     // 更新所選擇的縣市
            this.SpeedPerSecond = null;
            for(var i = 0 ; i < this.City.length ; i++){
                if(this.City[i] == this.cityIdx)    this.selectCity = this.City[i];
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
            let formData = new FormData();
            formData.append('localcity',this.cityIdx);
            formData.append('_method','put');
            const response = await SaveOverPlan.UpdateOverPlan(this.now_user, formData);
        },
        updateRegion: async function(){   // 更新所選擇的地區
            // 將地區資料初始化
            this.LandingProbability = 0,
            this.PathProbability = 0,
            this.Landing = null,
            this.Path = null;
            // 從所選的地區id 找到 所選的地區名稱
            for(var i = 0 ; i < this.Region.length ; i++){
                if(this.Region[i] == this.regionIdx)    this.selectRegion = this.Region[i];
            }
            for(var i = 0 ; i < this.regionalwindspeedjson.length ; i++){
                if((this.selectCity == this.regionalwindspeedjson[i].County ) && (this.selectRegion == this.regionalwindspeedjson[i].Region )){
                    this.SpeedPerSecond = this.regionalwindspeedjson[i].SpeedPerSecond;
                }
            }
            let formData = new FormData();
            formData.append('localarea',this.regionIdx);
            formData.append('_method','put');
            const response = await SaveOverPlan.UpdateOverPlan(this.now_user, formData);
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
                    const response = await SaveOverPlan.UpdateOverPlan(this.now_user, formData);
                } else if (this.windcorrosionjson[i].landtype == SelectLandform){
                    wind123[1] = this.windcorrosionjson[i].wind
                    corrosion[1] = this.windcorrosionjson[i].corrosion     
                    let formData = new FormData();
                    formData.append('landform',SelectLandform);
                    formData.append('_method','put');
                    const response = await SaveOverPlan.UpdateOverPlan(this.now_user, formData);                
                }
            }
            this.data_wind = Math.round(wind123[0]*wind123[1]*100)/100
            this.data_corrosion = Math.round(corrosion[0]*corrosion[1]*100)/100
        },
        updaterooftype: async function(){
            let formData = new FormData();
            formData.append('roof_type',this.radio_roof);
            formData.append('roof_number',this.roof_number[this.roof_name.indexOf(this.radio_roof)]); 
            formData.append('_method','put');
            const response = await Weight.UpdateWidget(this.now_user_two, formData);
        },
        updatedesign: async function(){
            let get_id = [];
            let formData = new FormData();
            formData.append('wind_design',this.design_wind);
            formData.append('span_design',this.design_span); 
            formData.append('shoulder_design',this.design_shoulder);
            formData.append('continue_design',this.design_story);
            const W_Estimation = await fetch('/WeightJson',  {
            method: 'GET',
            });
            this.WeightJson = await W_Estimation.json();
            for(var i = 0; i < this.WeightJson.length; i++){
                get_id.push(this.WeightJson[i].uid)
                if (this.WeightJson[i].uid === this.$auth.user().id){
                    this.now_user_two = this.WeightJson[i].id
                }
            }
            if (get_id.indexOf(this.$auth.user().id) === -1){
                formData.append('uid',this.$auth.user().id);
                const response = await Weight.createWidget(formData)
                this.WeightArray = []
                this.WeightArray = response.data
            } else{
                formData.append('_method','patch');
                const response = await Weight.UpdateWidget(this.now_user_two,formData)
                this.WeightArray = []
                this.WeightArray = response.data
            }
        },
        areacount:async function(){
            
            this.area = (this.plantlength*this.plantwidth)/10000
            let formData = new FormData();
            formData.append('croplength',this.plantlength);
            formData.append('cropwidth',this.plantwidth);
            formData.append('croparea',this.area);
            formData.append('_method','put');
            const response = await SaveOverPlan.UpdateOverPlan(this.now_user, formData);
        },
        updateposition: async function(){
            let formData = new FormData();
            formData.append('position',this.position);
            formData.append('_method','put');
            const response = await SaveOverPlan.UpdateOverPlan(this.now_user, formData);
        },
    },
}
</script>