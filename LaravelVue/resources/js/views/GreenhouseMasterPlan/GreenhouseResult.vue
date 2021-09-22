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
            <v-row>
                    <v-col>
                        <div style="border-width:3px;border-style:dashed;border-color:#FFAC55;padding:5px;">
                            <v-row>
                                <v-col cols="12">
                                    <h3>光控分析</h3>
                                </v-col>
                                <v-col cols="12">
                                    <line-chart xtitle="月份" ytitle="日照時數 & 全天空日射量" :data="GloblRadSunShineChartData" height="30vmin" :colors="['Gold', 'DarkTurquoise']" :curve="false"></line-chart>
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
                                </v-col>
                            </v-row>
                        </div>
                    </v-col>
                    <v-col>
                        <div style="border-width:3px;border-style:dashed;border-color:#FFAC55;padding:5px;">
                            <v-row>
                                <v-col cols="12">
                                    <h3>溫控分析</h3>
                                </v-col>
                                <v-col cols="12">
                                    <line-chart xtitle="月份" ytitle="溫度" :discrete="true" :data="CropTemperature" height="30vmin" :colors="['DodgerBlue', 'Red', 'LightSalmon', 'LightSalmon']" :curve="false"></line-chart>
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
                                </v-col>
                            </v-row>
                        </div>
                    </v-col>
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
                        <th> 成本性</th>
                        <td> {{pipe.Cost}} </td>
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
                        <th> 成本性</th>
                        <td> {{profile.Cost}} </td>
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
                        <td> {{ material[0] }}</td>
                        <th> 規格選擇</th>
                        <td> {{ material[1] }} </td>
                        <th> 成本性</th>
                        <td> {{ material[2] }} </td>
                        <th> 結構風險</th>
                        <td> {{ material[3] }} </td>
                        <th> 作業難度</th>
                        <td> {{ material[4] }} </td>
                    </tr>
                    <tr>
                        <th style="color:red"> 每平方米單價</th>
                        <td style="color:red"> {{Math.floor(SimpleCostAdd*650)}} </td>
                        <th style="color:red"> 每坪單價</th>
                        <td style="color:red"> {{Math.floor(SimpleCostAdd*650/0.3025)}} </td>
                        <th style="color:red"> 總價</th>
                        <td style="color:red"> {{Math.floor(SimpleCostAdd*650*overplanArray[0].croparea)}} </td>
                        <th style="color:red"> 風險指數</th>
                        <td style="color:red"> {{SimpleStructuralRiskAdd}} </td>
                        <th style="color:red"> 工期</th>
                        <td style="color:red"> {{Math.round(20+SimpleJobDifficultyAdd*40*overplanArray[0].croparea/1000*100)/100}} </td>
                    </tr>
                </table>
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
                                        <td>{{ wind_speed }}</td>
                                        <td>{{ wind_addspeed }}</td>
                                        <td>{{ wind_speed*wind_addspeed }}</td>
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
                                        <td>{{ WeightArray[0].roof_number }}</td>
                                        <td>{{ Math.round(Math.floor(design_wind-30)/wind_speed*wind_addspeed*100)/100 }}</td>
                                        <td>{{ Math.round(Math.floor(design_span-8)/30*100)/100 }}</td>
                                        <td>{{ Math.round(Math.floor(design_shoulder-3)/6*100)/100 }}</td>
                                        <td>{{ Math.round(Math.floor(1-design_story)/5*100)/100 }}</td>
                                        <td>{{ Math.floor(WeightArray[0].roof_number*
                                            (
                                                1+
                                                Math.round(Math.floor(design_wind-30)/wind_speed*wind_addspeed*100)/100+
                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                            )) }}
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
                                        <td>{{ overplanArray[0].croplength }}</td>
                                        <td>{{ overplanArray[0].cropwidth }}</td>
                                        <td>{{ overplanArray[0].position }}</td>
                                        <td>{{ overplanArray[0].croparea }}</td>
                                        <td>4</td>
                                        <td>{{ Math.floor(overplanArray[0].croplength/4*0.95) }}</td>
                                        <td>{{ design_span }}</td>
                                        <td>{{ Math.floor(overplanArray[0].cropwidth/design_span*0.95) }}</td>
                                        <td>{{ Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span }}</td>
                                        <td>{{ Math.round(Math.floor(Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span)/Math.floor(overplanArray[0].croparea)*100)/100*100 }}%</td>
                                        <td>{{ Math.floor(WeightArray[0].roof_number*
                                            (
                                                1+
                                                Math.round(Math.floor(design_wind-wind_speed*wind_addspeed)/wind_speed*wind_addspeed*100)/100+
                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                            )*Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span) }}
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
                                        <td>{{ Math.floor(WeightArray[0].roof_number*
                                            (
                                                1+
                                                Math.round(Math.floor(design_wind-wind_speed*wind_addspeed)/wind_speed*wind_addspeed*100)/100+
                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                            )*Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*40) }}
                                        </td>
                                        <td>10</td>
                                        <td>{{ Math.floor(WeightArray[0].roof_number*
                                            (
                                                1+
                                                Math.round(Math.floor(design_wind-wind_speed*wind_addspeed)/wind_speed*wind_addspeed*100)/100+
                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                            )*Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*10) }}
                                        </td>
                                        <td>{{ Math.floor(WeightArray[0].roof_number*
                                            (
                                                1+
                                                Math.round(Math.floor(design_wind-wind_speed*wind_addspeed)/wind_speed*wind_addspeed*100)/100+
                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                            )*Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*10+
                                            WeightArray[0].roof_number*
                                            (
                                                1+
                                                Math.round(Math.floor(design_wind-wind_speed*wind_addspeed)/wind_speed*wind_addspeed*100)/100+
                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                            )*Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*40) }}
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
                                        <td>{{ Math.floor(Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*1.2+Math.floor(overplanArray[0].croplength+overplanArray[0].cropwidth)*2*1.5) }}</td>
                                        <td>50</td>
                                        <td>{{ Math.floor(Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*1.2+Math.floor(overplanArray[0].croplength+overplanArray[0].cropwidth)*2*1.5*50) }}</td>
                                        <td>10</td>
                                        <td>{{ Math.floor(Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*1.2+Math.floor(overplanArray[0].croplength+overplanArray[0].cropwidth)*2*1.5*10) }}</td>
                                        <td>{{ Math.floor(Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*1.2+Math.floor(overplanArray[0].croplength+overplanArray[0].cropwidth)*2*1.5*50+Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*1.2+Math.floor(overplanArray[0].croplength+overplanArray[0].cropwidth)*2*1.5*10) }}</td>
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
                                        <td>{{ Math.floor(overplanArray[0].croplength*overplanArray[0].cropwidth) }}</td>
                                        <td>100</td>
                                        <td>{{ Math.floor(overplanArray[0].croplength*overplanArray[0].cropwidth)*100 }}</td>
                                        <td>{{ Math.floor(Math.floor(overplanArray[0].croplength/4*0.95+1)*Math.floor(overplanArray[0].cropwidth/design_span*0.95+1)*1.2) }}</td>
                                        <td>2000</td>
                                        <td>{{ Math.floor(Math.floor(overplanArray[0].croplength/4*0.95+1)*Math.floor(overplanArray[0].cropwidth/design_span*0.95+1)*1.2*2000) }}</td>
                                        <td>{{ Math.floor(Math.floor(overplanArray[0].croplength/4*0.95+1)*Math.floor(overplanArray[0].cropwidth/design_span*0.95+1)*1.2*2000)+Math.floor(overplanArray[0].croplength*overplanArray[0].cropwidth)*100 }}</td>
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
                                        <td>{{ Math.floor(WeightArray[0].roof_number*
                                            (
                                                1+
                                                Math.round(Math.floor(design_wind-wind_speed*wind_addspeed)/wind_speed*wind_addspeed*100)/100+
                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                            )*Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*10+
                                            WeightArray[0].roof_number*
                                            (
                                                1+
                                                Math.round(Math.floor(design_wind-wind_speed*wind_addspeed)/wind_speed*wind_addspeed*100)/100+
                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                            )*Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*40) }}
                                        </td>
                                        <td>{{ Math.floor(Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*1.2+Math.floor(overplanArray[0].croplength+overplanArray[0].cropwidth)*2*1.5*50+Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*1.2+Math.floor(overplanArray[0].croplength+overplanArray[0].cropwidth)*2*1.5*10) }}</td>
                                        <td>{{ Math.floor(Math.floor(overplanArray[0].croplength/4*0.95+1)*Math.floor(overplanArray[0].cropwidth/design_span*0.95+1)*1.2*2000)+Math.floor(overplanArray[0].croplength*overplanArray[0].cropwidth)*100 }}</td>
                                        <td>{{ Math.floor(Math.floor(WeightArray[0].roof_number*
                                            (
                                                1+
                                                Math.round(Math.floor(design_wind-wind_speed*wind_addspeed)/wind_speed*wind_addspeed*100)/100+
                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                            )*Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*10+
                                            WeightArray[0].roof_number*
                                            (
                                                1+
                                                Math.round(Math.floor(design_wind-wind_speed*wind_addspeed)/wind_speed*wind_addspeed*100)/100+
                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                            )*Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*40+
                                            Math.floor(Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*1.2+Math.floor(overplanArray[0].croplength+overplanArray[0].cropwidth)*2*1.5*50+Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*1.2+Math.floor(overplanArray[0].croplength+overplanArray[0].cropwidth)*2*1.5*10)+
                                            Math.floor(Math.floor(overplanArray[0].croplength/4*0.95+1)*Math.floor(overplanArray[0].cropwidth/design_span*0.95+1)*1.2*2000)+Math.floor(overplanArray[0].croplength*overplanArray[0].cropwidth)*100)*0.1) }}
                                        </td>
                                        <td>{{ Math.floor(WeightArray[0].roof_number*
                                            (
                                                1+
                                                Math.round(Math.floor(design_wind-wind_speed*wind_addspeed)/wind_speed*wind_addspeed*100)/100+
                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                            )*Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*10+
                                            WeightArray[0].roof_number*
                                            (
                                                1+
                                                Math.round(Math.floor(design_wind-wind_speed*wind_addspeed)/wind_speed*wind_addspeed*100)/100+
                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                            )*Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*40)+
                                            Math.floor(Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*1.2+Math.floor(overplanArray[0].croplength+overplanArray[0].cropwidth)*2*1.5*50+Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*1.2+Math.floor(overplanArray[0].croplength+overplanArray[0].cropwidth)*2*1.5*10)+
                                            Math.floor(Math.floor(overplanArray[0].croplength/4*0.95+1)*Math.floor(overplanArray[0].cropwidth/design_span*0.95+1)*1.2*2000)+Math.floor(overplanArray[0].croplength*overplanArray[0].cropwidth)*100+
                                            Math.floor(Math.floor(WeightArray[0].roof_number*
                                            (
                                                1+
                                                Math.round(Math.floor(design_wind-wind_speed*wind_addspeed)/wind_speed*wind_addspeed*100)/100+
                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                            )*Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*10+
                                            WeightArray[0].roof_number*
                                            (
                                                1+
                                                Math.round(Math.floor(design_wind-wind_speed*wind_addspeed)/wind_speed*wind_addspeed*100)/100+
                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                            )*Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*40+
                                            Math.floor(Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*1.2+Math.floor(overplanArray[0].croplength+overplanArray[0].cropwidth)*2*1.5*50+Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*1.2+Math.floor(overplanArray[0].croplength+overplanArray[0].cropwidth)*2*1.5*10)+
                                            Math.floor(Math.floor(overplanArray[0].croplength/4*0.95+1)*Math.floor(overplanArray[0].cropwidth/design_span*0.95+1)*1.2*2000)+Math.floor(overplanArray[0].croplength*overplanArray[0].cropwidth)*100)*0.1) }}
                                        </td>
                                        <td>{{ Math.floor(Math.floor(Math.floor(WeightArray[0].roof_number*
                                            (
                                                1+
                                                Math.round(Math.floor(design_wind-wind_speed*wind_addspeed)/wind_speed*wind_addspeed*100)/100+
                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                            )*Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*10+
                                            WeightArray[0].roof_number*
                                            (
                                                1+
                                                Math.round(Math.floor(design_wind-wind_speed*wind_addspeed)/wind_speed*wind_addspeed*100)/100+
                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                            )*Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*40)+
                                            Math.floor(Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*1.2+Math.floor(overplanArray[0].croplength+overplanArray[0].cropwidth)*2*1.5*50+Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*1.2+Math.floor(overplanArray[0].croplength+overplanArray[0].cropwidth)*2*1.5*10)+
                                            Math.floor(Math.floor(overplanArray[0].croplength/4*0.95+1)*Math.floor(overplanArray[0].cropwidth/design_span*0.95+1)*1.2*2000)+Math.floor(overplanArray[0].croplength*overplanArray[0].cropwidth)*100+
                                            Math.floor(Math.floor(WeightArray[0].roof_number*
                                            (
                                                1+
                                                Math.round(Math.floor(design_wind-wind_speed*wind_addspeed)/wind_speed*wind_addspeed*100)/100+
                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                            )*Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*10+
                                            WeightArray[0].roof_number*
                                            (
                                                1+
                                                Math.round(Math.floor(design_wind-wind_speed*wind_addspeed)/wind_speed*wind_addspeed*100)/100+
                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                            )*Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*40+
                                            Math.floor(Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*1.2+Math.floor(overplanArray[0].croplength+overplanArray[0].cropwidth)*2*1.5*50+Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*1.2+Math.floor(overplanArray[0].croplength+overplanArray[0].cropwidth)*2*1.5*10)+
                                            Math.floor(Math.floor(overplanArray[0].croplength/4*0.95+1)*Math.floor(overplanArray[0].cropwidth/design_span*0.95+1)*1.2*2000)+Math.floor(overplanArray[0].croplength*overplanArray[0].cropwidth)*100)*0.1))/Math.floor(Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span)) }}
                                        </td>
                                        <td>{{ Math.floor(Math.floor(Math.floor(Math.floor(WeightArray[0].roof_number*
                                            (
                                                1+
                                                Math.round(Math.floor(design_wind-wind_speed*wind_addspeed)/wind_speed*wind_addspeed*100)/100+
                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                            )*Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*10+
                                            WeightArray[0].roof_number*
                                            (
                                                1+
                                                Math.round(Math.floor(design_wind-wind_speed*wind_addspeed)/wind_speed*wind_addspeed*100)/100+
                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                            )*Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*40)+
                                            Math.floor(Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*1.2+Math.floor(overplanArray[0].croplength+overplanArray[0].cropwidth)*2*1.5*50+Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*1.2+Math.floor(overplanArray[0].croplength+overplanArray[0].cropwidth)*2*1.5*10)+
                                            Math.floor(Math.floor(overplanArray[0].croplength/4*0.95+1)*Math.floor(overplanArray[0].cropwidth/design_span*0.95+1)*1.2*2000)+Math.floor(overplanArray[0].croplength*overplanArray[0].cropwidth)*100+
                                            Math.floor(Math.floor(WeightArray[0].roof_number*
                                            (
                                                1+
                                                Math.round(Math.floor(design_wind-wind_speed*wind_addspeed)/wind_speed*wind_addspeed*100)/100+
                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                            )*Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*10+
                                            WeightArray[0].roof_number*
                                            (
                                                1+
                                                Math.round(Math.floor(design_wind-wind_speed*wind_addspeed)/wind_speed*wind_addspeed*100)/100+
                                                Math.round(Math.floor(design_span-8)/30*100)/100+
                                                Math.round(Math.floor(design_shoulder-3)/6*100)/100+
                                                Math.round(Math.floor(1-design_story)/5*100)/100
                                            )*Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*40+
                                            Math.floor(Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*1.2+Math.floor(overplanArray[0].croplength+overplanArray[0].cropwidth)*2*1.5*50+Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span*1.2+Math.floor(overplanArray[0].croplength+overplanArray[0].cropwidth)*2*1.5*10)+
                                            Math.floor(Math.floor(overplanArray[0].croplength/4*0.95+1)*Math.floor(overplanArray[0].cropwidth/design_span*0.95+1)*1.2*2000)+Math.floor(overplanArray[0].croplength*overplanArray[0].cropwidth)*100)*0.1))/Math.floor(Math.floor(overplanArray[0].croplength/4*0.95)*Math.floor(overplanArray[0].cropwidth/design_span*0.95)*4*design_span))/0.3025) }}
                                        </td>
                                    </tr>
                                </table>
                            </v-col>
                        </v-row>
                    </div>
                </v-col>
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
        greenhouse_material:[],
        SimpleCircularArchDistancesJSON:[],
        WeightArray:[],
        WeightJson:[],
        radio_roof:null,
        design_wind:null,
        design_span:null,
        design_shoulder:null,
        design_story:null,
        roof_type:['WTG','SP','VTP','UTP','VBP','UBP','UP'],
        roof_name:['玻璃溫室','斜頂溫室','山型力霸','圓形力霸','山型塑膠膜','圓型塑膠膜','簡易溫室'],
        GloblRadSunShineChartData:[
            {name: "日照時數(小時)", data: {"1月":null,"2月":null,"3月":null,"4月":null,"5月":null,"6月":null,"7月":null,"8月":null,"9月":null,"10月":null,"11月":null,"12月":null}},
            {name: "全天空日射量(MJ/㎡)", data: {"1月":null,"2月":null,"3月":null,"4月":null,"5月":null,"6月":null,"7月":null,"8月":null,"9月":null,"10月":null,"11月":null,"12月":null}},
        ],
        StrHighTemperature:[0,0,0,0,0,0,0,0,0,0,0,0], // 字串切割  地區最高月均溫
        StrLowTemperature:[0,0,0,0,0,0,0,0,0,0,0,0], // 字串切割  地區最低月均溫
        StrOptimalTemperature:[0,0],
        CropTemperature:[
            {name: "溫室平均月均溫", data: {"1月":null,"2月":null,"3月":null,"4月":null,"5月":null,"6月":null,"7月":null,"8月":null,"9月":null,"10月":null,"11月":null,"12月":null}},
            // {name: "地區最高月均溫", data: {"1月":null,"2月":null,"3月":null,"4月":null,"5月":null,"6月":null,"7月":null,"8月":null,"9月":null,"10月":null,"11月":null,"12月":null}},
            {name: "作物生長最適溫區間", data: {"1月":null,"2月":null,"3月":null,"4月":null,"5月":null,"6月":null,"7月":null,"8月":null,"9月":null,"10月":null,"11月":null,"12月":null}},
            {name: "作物生長最適溫區間", data: {"1月":null,"2月":null,"3月":null,"4月":null,"5月":null,"6月":null,"7月":null,"8月":null,"9月":null,"10月":null,"11月":null,"12月":null}},
        ],  // 所選作物的種植最適溫度 圖表用
        total_temp_high:0,
        total_temp_low:0,
        OptimalGrowthTemperature: '-',
        average_sun:0,
        average_total:0,
        SimpleCostAdd:0,
        SimpleCostratiosJSON:[],
        SimpleCostratios:[],
        SimpleJobDifficultyAdd:0,
        SimpleStructuralRiskAdd:0,
        SimpleTotalSimpleCost:0,
        SimpleHousrBasePrice:500000,
    }),

    created:function(){  // 網頁載入時，一開始就載入
        if (this.$auth.check() === false) {
            this.$router.push({ name: '使用者登入' })
        }
        this.getJson();
    },

    methods: {
        async getJson(){
            const W_Estimation = await fetch('/WeightJson',  {
            method: 'GET',
            });
            this.WeightJson = await W_Estimation.json();
            for(var i = 0; i < this.WeightJson.length; i++){
                if (this.WeightJson[i].uid === this.$auth.user().id){
                    this.WeightArray.push(this.WeightJson[i])
                }      
            }

            this.radio_roof = this.WeightArray[0].roof_type
            this.design_wind = this.WeightArray[0].wind_design
            this.design_span = this.WeightArray[0].span_design
            this.design_shoulder = this.WeightArray[0].shoulder_design
            this.design_story = this.WeightArray[0].continue_design

            const J_OverPlan = await fetch('/OverPlanJson',  {
            method: 'GET',
            });
            this.OverPlanJson = await J_OverPlan.json();
            for(var i = 0; i < this.OverPlanJson.length; i++){
                if (this.OverPlanJson[i].uid === this.$auth.user().id){
                    this.overplanArray.push(this.OverPlanJson[i])
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

            const D_OverPlan = await fetch('/DesignJson',  {
                method: 'GET',
            });
            this.DesignJson = await D_OverPlan.json();
            for(var i = 0; i < this.DesignJson.length; i++){
                if (this.DesignJson[i].uid === this.$auth.user().id){
                    this.DesignArray.push(this.DesignJson[i])
                }
            }

            if (this.DesignArray[0].housetype === '強固溫室'){
                this.greenhouse_material = [['溫室型材'],['圓頂形式'],['圓拱距'],['基礎'],['跨距'],['肩高'],['長度'],['連續性'],['披覆材料']]
            } else{
                this.greenhouse_material = [['溫室管材'],['圓頂形式'],['圓拱距'],['基礎'],['跨距'],['肩高'],['長度'],['連續性'],['披覆材料']]
            }

            const SimpleCostratios = await fetch('/SimpleCostRatioJSON',  {
            method: 'GET',
            });
            this.SimpleCostratiosJSON = await SimpleCostratios.json();
            for(var i = 0 ; i < this.SimpleCostratiosJSON.length ; i++){
                if(this.SimpleCostratiosJSON[i].Expert == "System"){
                    this.SimpleCostratios.push(this.SimpleCostratiosJSON[i]);
                }
            }

            // 簡易型圓拱距
            const SimpleCircularArchDistances = await fetch('/SimpleCircularArchDistanceJSON',  {
                method: 'GET',
            });
            this.SimpleCircularArchDistancesJSON = await SimpleCircularArchDistances.json();
            if (this.DesignArray[0].housetype === '簡易溫室'){
                for(var i = 0; i < this.SimpleCircularArchDistancesJSON.length; i++){
                    if (this.SimpleCircularArchDistancesJSON[i].BuildItem === this.DesignArray[0].circlespan){
                        this.greenhouse_material[2].push(this.SimpleCircularArchDistancesJSON[i].BuildItem)
                        this.greenhouse_material[2].push(this.SimpleCircularArchDistancesJSON[i].Cost)
                        this.greenhouse_material[2].push(this.SimpleCircularArchDistancesJSON[i].StructuralRisk)
                        this.greenhouse_material[2].push(this.SimpleCircularArchDistancesJSON[i].JobDifficulty)
                    }
                }
            }
            
            // 簡易型披覆材料
            const SimpleCoatingFilms = await fetch('/SimpleCoatingFilmJSON',  {
                method: 'GET',
            });
            this.SimpleCoatingFilmsJSON = await SimpleCoatingFilms.json();
            if (this.DesignArray[0].housetype === '簡易溫室'){
                for(var i = 0; i < this.SimpleCoatingFilmsJSON.length; i++){
                    if (this.SimpleCoatingFilmsJSON[i].BuildItem === this.DesignArray[0].drape){
                        this.greenhouse_material[8].push(this.SimpleCoatingFilmsJSON[i].BuildItem)
                        this.greenhouse_material[8].push(this.SimpleCoatingFilmsJSON[i].Cost)
                        this.greenhouse_material[8].push(this.SimpleCoatingFilmsJSON[i].StructuralRisk)
                        this.greenhouse_material[8].push(this.SimpleCoatingFilmsJSON[i].JobDifficulty)
                    }
                }
            }

            // 簡易型連續性
            const SimpleContinuitys = await fetch('/SimpleContinuityJSON',  {
                method: 'GET',
            });
            this.SimpleContinuitysJSON = await SimpleContinuitys.json();
            if (this.DesignArray[0].housetype === '簡易溫室'){
                for(var i = 0; i < this.SimpleContinuitysJSON.length; i++){
                    if (this.SimpleContinuitysJSON[i].BuildItem === this.DesignArray[0].continue){
                        this.greenhouse_material[7].push(this.SimpleContinuitysJSON[i].BuildItem)
                        this.greenhouse_material[7].push(this.SimpleContinuitysJSON[i].Cost)
                        this.greenhouse_material[7].push(this.SimpleContinuitysJSON[i].StructuralRisk)
                        this.greenhouse_material[7].push(this.SimpleContinuitysJSON[i].JobDifficulty)
                    }
                }
            }

            // 簡易型圓頂形式
            const SimpleDomeForms = await fetch('/SimpleDomeFormJSON',  {
                method: 'GET',
            });
            this.SimpleDomeFormsJSON = await SimpleDomeForms.json();
            if (this.DesignArray[0].housetype === '簡易溫室'){
                for(var i = 0; i < this.SimpleDomeFormsJSON.length; i++){
                    if (this.SimpleDomeFormsJSON[i].BuildItem === this.DesignArray[0].rooftype){
                        this.greenhouse_material[1].push(this.SimpleDomeFormsJSON[i].BuildItem)
                        this.greenhouse_material[1].push(this.SimpleDomeFormsJSON[i].Cost)
                        this.greenhouse_material[1].push(this.SimpleDomeFormsJSON[i].StructuralRisk)
                        this.greenhouse_material[1].push(this.SimpleDomeFormsJSON[i].JobDifficulty)
                    }
                }
            }

            // 簡易型基礎
            const SimpleFoundations = await fetch('/SimpleFoundationJSON',  {
                method: 'GET',
            });
            this.SimpleFoundationsJSON = await SimpleFoundations.json();
            if (this.DesignArray[0].housetype === '簡易溫室'){
                for(var i = 0; i < this.SimpleFoundationsJSON.length; i++){
                    if (this.SimpleFoundationsJSON[i].BuildItem === this.DesignArray[0].base){
                        this.greenhouse_material[3].push(this.SimpleFoundationsJSON[i].BuildItem)
                        this.greenhouse_material[3].push(this.SimpleFoundationsJSON[i].Cost)
                        this.greenhouse_material[3].push(this.SimpleFoundationsJSON[i].StructuralRisk)
                        this.greenhouse_material[3].push(this.SimpleFoundationsJSON[i].JobDifficulty)
                    }
                }
            }

            // 簡易型溫室管材
            const SimpleGreenhousePipes = await fetch('/SimpleGreenhousePipeJSON',  {
                method: 'GET',
            });
            this.SimpleGreenhousePipesJSON = await SimpleGreenhousePipes.json();
            if (this.DesignArray[0].housetype === '簡易溫室'){
                for(var i = 0; i < this.SimpleGreenhousePipesJSON.length; i++){
                    if (this.SimpleGreenhousePipesJSON[i].BuildItem === this.DesignArray[0].pipetype){
                        this.greenhouse_material[0].push(this.SimpleGreenhousePipesJSON[i].BuildItem)
                        this.greenhouse_material[0].push(this.SimpleGreenhousePipesJSON[i].Cost)
                        this.greenhouse_material[0].push(this.SimpleGreenhousePipesJSON[i].StructuralRisk)
                        this.greenhouse_material[0].push(this.SimpleGreenhousePipesJSON[i].JobDifficulty)
                    }
                }
            
            }
            // 簡易型長度
            const SimpleLengths = await fetch('/SimpleLengthJSON',  {
                method: 'GET',
            });
            this.SimpleLengthsJSON = await SimpleLengths.json();
            if (this.DesignArray[0].housetype === '簡易溫室'){
                for(var i = 0; i < this.SimpleLengthsJSON.length; i++){
                    if (this.SimpleLengthsJSON[i].BuildItem === this.DesignArray[0].length){
                        this.greenhouse_material[6].push(this.SimpleLengthsJSON[i].BuildItem)
                        this.greenhouse_material[6].push(this.SimpleLengthsJSON[i].Cost)
                        this.greenhouse_material[6].push(this.SimpleLengthsJSON[i].StructuralRisk)
                        this.greenhouse_material[6].push(this.SimpleLengthsJSON[i].JobDifficulty)
                    }
                }
            }

            // 簡易型肩高
            const SimpleShoulderHeights = await fetch('/SimpleShoulderHeightJSON',  {
                method: 'GET',
            });
            this.SimpleShoulderHeightsJSON = await SimpleShoulderHeights.json();
            if (this.DesignArray[0].housetype === '簡易溫室'){
                for(var i = 0; i < this.SimpleShoulderHeightsJSON.length; i++){
                    if (this.SimpleShoulderHeightsJSON[i].BuildItem === this.DesignArray[0].shoulder){
                        this.greenhouse_material[5].push(this.SimpleShoulderHeightsJSON[i].BuildItem)
                        this.greenhouse_material[5].push(this.SimpleShoulderHeightsJSON[i].Cost)
                        this.greenhouse_material[5].push(this.SimpleShoulderHeightsJSON[i].StructuralRisk)
                        this.greenhouse_material[5].push(this.SimpleShoulderHeightsJSON[i].JobDifficulty)
                    }
                }
            }
            
            // 簡易型跨距
            const SimpleSpans = await fetch('/SimpleSpanJSON',  {
                method: 'GET',
            });
            this.SimpleSpansJSON = await SimpleSpans.json();
            if (this.DesignArray[0].housetype === '簡易溫室'){
                for(var i = 0; i < this.SimpleSpansJSON.length; i++){
                    if (this.SimpleSpansJSON[i].BuildItem === this.DesignArray[0].span){
                        this.greenhouse_material[4].push(this.SimpleSpansJSON[i].BuildItem)
                        this.greenhouse_material[4].push(this.SimpleSpansJSON[i].Cost)
                        this.greenhouse_material[4].push(this.SimpleSpansJSON[i].StructuralRisk)
                        this.greenhouse_material[4].push(this.SimpleSpansJSON[i].JobDifficulty)
                    }
                }
            }

            
            // 強固型連續性
            const StrongContinuitys = await fetch('/StrongContinuityJSON',  {
                method: 'GET',
            });
            this.StrongContinuitysJSON = await StrongContinuitys.json();
            if (this.DesignArray[0].housetype === '強固溫室'){
                for(var i = 0; i < this.StrongContinuitysJSON.length; i++){
                    if (this.StrongContinuitysJSON[i].BuildItem === this.DesignArray[0].continue){
                        this.greenhouse_material[7].push(this.StrongContinuitysJSON[i].BuildItem)
                        this.greenhouse_material[7].push(this.StrongContinuitysJSON[i].Cost)
                        this.greenhouse_material[7].push(this.StrongContinuitysJSON[i].StructuralRisk)
                        this.greenhouse_material[7].push(this.StrongContinuitysJSON[i].JobDifficulty)
                    }
                }
            }
            
            // 強固型基礎
            const StrongFoundations = await fetch('/StrongFoundationJSON',  {
                method: 'GET',
            });
            this.StrongFoundationsJSON = await StrongFoundations.json();
            if (this.DesignArray[0].housetype === '強固溫室'){
                for(var i = 0; i < this.StrongFoundationsJSON.length; i++){
                    if (this.StrongFoundationsJSON[i].BuildItem === this.DesignArray[0].base){
                        this.greenhouse_material[3].push(this.StrongFoundationsJSON[i].BuildItem)
                        this.greenhouse_material[3].push(this.StrongFoundationsJSON[i].Cost)
                        this.greenhouse_material[3].push(this.StrongFoundationsJSON[i].StructuralRisk)
                        this.greenhouse_material[3].push(this.StrongFoundationsJSON[i].JobDifficulty)
                    }
                }
            }
            
            // 強固型溫室型材
            const StrongGreenhousPprofiles = await fetch('/StrongGreenhouseProfileJSON',  {
                method: 'GET',
            });
            this.StrongGreenhousPprofilesJSON = await StrongGreenhousPprofiles.json();
            if (this.DesignArray[0].housetype === '強固溫室'){
                for(var i = 0; i < this.StrongGreenhousPprofilesJSON.length; i++){
                    if (this.StrongGreenhousPprofilesJSON[i].BuildItem === this.DesignArray[0].pipetype){
                        this.greenhouse_material[0].push(this.StrongGreenhousPprofilesJSON[i].BuildItem)
                        this.greenhouse_material[0].push(this.StrongGreenhousPprofilesJSON[i].Cost)
                        this.greenhouse_material[0].push(this.StrongGreenhousPprofilesJSON[i].StructuralRisk)
                        this.greenhouse_material[0].push(this.StrongGreenhousPprofilesJSON[i].JobDifficulty)
                    }
                }
            }

            
            // 強固型長度
            const StrongLengths = await fetch('/StrongLengthJSON',  {
                method: 'GET',
            });
            this.StrongLengthsJSON = await StrongLengths.json();
            if (this.DesignArray[0].housetype === '強固溫室'){
                for(var i = 0; i < this.StrongLengthsJSON.length; i++){
                    if (this.StrongLengthsJSON[i].BuildItem === this.DesignArray[0].length){
                        this.greenhouse_material[6].push(this.StrongLengthsJSON[i].BuildItem)
                        this.greenhouse_material[6].push(this.StrongLengthsJSON[i].Cost)
                        this.greenhouse_material[6].push(this.StrongLengthsJSON[i].StructuralRisk)
                        this.greenhouse_material[6].push(this.StrongLengthsJSON[i].JobDifficulty)
                    }
                }
            }
            
            // 強固型屋頂形式
            const StrongRoofForms = await fetch('/StrongRoofFormJSON',  {
                method: 'GET',
            });
            this.StrongRoofFormsJSON = await StrongRoofForms.json();
            if (this.DesignArray[0].housetype === '強固溫室'){
                for(var i = 0; i < this.StrongRoofFormsJSON.length; i++){
                    if (this.StrongRoofFormsJSON[i].BuildItem === this.DesignArray[0].rooftype){
                        this.greenhouse_material[1].push(this.StrongRoofFormsJSON[i].BuildItem)
                        this.greenhouse_material[1].push(this.StrongRoofFormsJSON[i].Cost)
                        this.greenhouse_material[1].push(this.StrongRoofFormsJSON[i].StructuralRisk)
                        this.greenhouse_material[1].push(this.StrongRoofFormsJSON[i].JobDifficulty)
                    }
                }
            }
            
            // 強固型肩高
            const StrongShoulderHeights = await fetch('/StrongShoulderHeightJSON',  {
                method: 'GET',
            });
            this.StrongShoulderHeightsJSON = await StrongShoulderHeights.json();
            if (this.DesignArray[0].housetype === '強固溫室'){
                for(var i = 0; i < this.StrongShoulderHeightsJSON.length; i++){
                    if (this.StrongShoulderHeightsJSON[i].BuildItem === this.DesignArray[0].shoulder){
                        this.greenhouse_material[5].push(this.StrongShoulderHeightsJSON[i].BuildItem)
                        this.greenhouse_material[5].push(this.StrongShoulderHeightsJSON[i].Cost)
                        this.greenhouse_material[5].push(this.StrongShoulderHeightsJSON[i].StructuralRisk)
                        this.greenhouse_material[5].push(this.StrongShoulderHeightsJSON[i].JobDifficulty)
                    }
                }
            }
            
            // 強固型跨距
            const StrongSpans = await fetch('/StrongSpanJSON',  {
                method: 'GET',
            });
            this.StrongSpansJSON = await StrongSpans.json();
            if (this.DesignArray[0].housetype === '強固溫室'){
                for(var i = 0; i < this.StrongSpansJSON.length; i++){
                    if (this.StrongSpansJSON[i].BuildItem === this.DesignArray[0].span){
                        this.greenhouse_material[4].push(this.StrongSpansJSON[i].BuildItem)
                        this.greenhouse_material[4].push(this.StrongSpansJSON[i].Cost)
                        this.greenhouse_material[4].push(this.StrongSpansJSON[i].StructuralRisk)
                        this.greenhouse_material[4].push(this.StrongSpansJSON[i].JobDifficulty)
                    }
                }
            }
            
            // 強固型上拱距
            const StrongUpperArchDistances = await fetch('/StrongUpperArchDistanceJSON',  {
                method: 'GET',
            });
            this.StrongUpperArchDistancesJSON = await StrongUpperArchDistances.json();
            if (this.DesignArray[0].housetype === '強固溫室'){
                for(var i = 0; i < this.StrongUpperArchDistancesJSON.length; i++){
                    if (this.StrongUpperArchDistancesJSON[i].BuildItem === this.DesignArray[0].circlespan){
                        this.greenhouse_material[2].push(this.StrongUpperArchDistancesJSON[i].BuildItem)
                        this.greenhouse_material[2].push(this.StrongUpperArchDistancesJSON[i].Cost)
                        this.greenhouse_material[2].push(this.StrongUpperArchDistancesJSON[i].StructuralRisk)
                        this.greenhouse_material[2].push(this.StrongUpperArchDistancesJSON[i].JobDifficulty)
                    }
                }
            }
            var StrGloblRad,StrSunShine; // 字串切割：全天空日射量、日照量
            // 取得 風速、風力登陸分析、風力路徑分析
            for(var i = 0 ; i < this.regionalwindspeedjson.length ; i++){
                if((this.overplanArray[0].localcity == this.regionalwindspeedjson[i].County ) && (this.overplanArray[0].localarea == this.regionalwindspeedjson[i].Region )){
                    StrGloblRad = this.regionalwindspeedjson[i].monthGloblRad.split(",");
                    StrSunShine = this.regionalwindspeedjson[i].monthSunShine.split(",");
                    break;
                }
            }

            for (var i = 0; i < 12; i++) {
                this.average_total += Math.round(StrGloblRad[i]/30*100)/100
                this.average_sun += Math.round(StrSunShine[i]/30*100)/100
            }

            this.GloblRadSunShineChartData = [
                {name: "全天空日射量(MJ/㎡)", data: {"1月":StrGloblRad[0],"2月":StrGloblRad[1],"3月":StrGloblRad[2],"4月":StrGloblRad[3],"5月":StrGloblRad[4],"6月":StrGloblRad[5],"7月":StrGloblRad[6],"8月":StrGloblRad[7],"9月":StrGloblRad[8],"10月":StrGloblRad[9],"11月":StrGloblRad[10],"12月":StrGloblRad[11]}},
                {name: "日照時數(小時)", data: {"1月":StrSunShine[0],"2月":StrSunShine[1],"3月":StrSunShine[2],"4月":StrSunShine[3],"5月":StrSunShine[4],"6月":StrSunShine[5],"7月":StrSunShine[6],"8月":StrSunShine[7],"9月":StrSunShine[8],"10月":StrSunShine[9],"11月":StrSunShine[10],"12月":StrSunShine[11]}},
            ];

            for(var i = 0 ; i < this.vegetablejson.length ; i++){
                if(this.vegetablejson[i].VegetableTypes === this.overplanArray[0].cropplant){
                    this.OptimalGrowthTemperature = this.vegetablejson[i].OptimalGrowthTemperature;
                    this.StrOptimalTemperature = this.OptimalGrowthTemperature.split("~");
                    break;
                }
            }

            // 更新 作物生長最適溫最高區間 的圖表
            this.CropTemperature[1].data = {"1月":this.StrOptimalTemperature[0],"2月":this.StrOptimalTemperature[0],"3月":this.StrOptimalTemperature[0],"4月":this.StrOptimalTemperature[0],"5月":this.StrOptimalTemperature[0],"6月":this.StrOptimalTemperature[0],"7月":this.StrOptimalTemperature[0],"8月":this.StrOptimalTemperature[0],"9月":this.StrOptimalTemperature[0],"10月":this.StrOptimalTemperature[0],"11月":this.StrOptimalTemperature[0],"12月":this.StrOptimalTemperature[0]};
            // 更新 作物生長最適溫最低區間 的圖表
            this.CropTemperature[2].data = {"1月":this.StrOptimalTemperature[1],"2月":this.StrOptimalTemperature[1],"3月":this.StrOptimalTemperature[1],"4月":this.StrOptimalTemperature[1],"5月":this.StrOptimalTemperature[1],"6月":this.StrOptimalTemperature[1],"7月":this.StrOptimalTemperature[1],"8月":this.StrOptimalTemperature[1],"9月":this.StrOptimalTemperature[1],"10月":this.StrOptimalTemperature[1],"11月":this.StrOptimalTemperature[1],"12月":this.StrOptimalTemperature[1]};
            for(var i = 0 ; i < this.regionalwindspeedjson.length ; i++){
                if((this.overplanArray[0].localcity == this.regionalwindspeedjson[i].County ) && (this.overplanArray[0].localarea == this.regionalwindspeedjson[i].Region )){
                    this.StrHighTemperature = this.regionalwindspeedjson[i].monthHighTemperature.split(",");
                    this.StrLowTemperature = this.regionalwindspeedjson[i].monthLowTemperature.split(",");
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
                    this.total_temp_high += parseFloat(parseFloat((parseFloat(this.StrHighTemperature[i])+parseFloat(this.StrLowTemperature[i]))/2)-this.StrOptimalTemperature[1]+3)
                }
                
                if (parseFloat((parseFloat(this.StrLowTemperature[i])+parseFloat(this.StrHighTemperature[i]))/2)-this.StrOptimalTemperature[0]+3 < 0){  
                    this.total_temp_low += parseFloat(parseFloat((parseFloat(this.StrLowTemperature[i])+parseFloat(this.StrHighTemperature[i]))/2)-this.StrOptimalTemperature[0]+3)
                }
            }

            for (var i = 0; i < this.greenhouse_material.length; i++) {
                this.SimpleTotalSimpleCost += this.SimpleHousrBasePrice * this.greenhouse_material[i][2] * this.SimpleCostratios[i].Cost / 100;
                this.SimpleCostAdd += this.greenhouse_material[i][2] * this.SimpleCostratios[i].Cost / 100;
                this.SimpleStructuralRiskAdd += this.greenhouse_material[i][3] * (this.SimpleCostratios[i].StructuralRisk / 100);
                this.SimpleJobDifficultyAdd += this.greenhouse_material[i][4] * (this.SimpleCostratios[i].JobDifficulty/ 100);
            }
            this.SimpleTotalSimpleCost =  parseInt(this.SimpleTotalSimpleCost);
            this.SimpleCostAdd =  this.SimpleCostAdd.toFixed(2);
            this.SimpleStructuralRiskAdd =  this.SimpleStructuralRiskAdd.toFixed(2);
            this.SimpleJobDifficultyAdd =  this.SimpleJobDifficultyAdd.toFixed(2);
        },
        
    },
}
</script>