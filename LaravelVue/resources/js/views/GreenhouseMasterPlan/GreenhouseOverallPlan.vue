<template>

    <div>
        <br>
        <h3 id="總體規劃X">
            溫室總體規劃系統
        </h3>
        <hr>

        <v-container-fluid v-if="showform==true">
            <v-row>
                <v-col class="col-md-8 offset-md-2">
                    <v-form v-on:submit.prevent="recordallinfo">
                      <v-container>
                        <v-row>
                          <v-col md="2">
                            <v-subheader>1.使用者</v-subheader> 
                          </v-col>
                          <v-col md="4">
                            <label for="類別" style="color:rgba(0,0,0,.6); font-size:8px;">類別</label>
                            <b-select v-model="classIdx" name="類別">
                              <option v-for="(crop, index) in user_class" :value="index" :key="index">
                                  {{crop}}
                              </option>
                            </b-select>
                          </v-col>
                          <v-col md="4">
                            <v-text-field label="代號" v-model="codename"></v-text-field>
                          </v-col>                  
                        </v-row>
                        <v-row>
                          <v-col md="2">
                            <v-subheader>2.溫室作物</v-subheader>
                          </v-col>
                          <v-col md="4">
                            <label for="分類" style="color:rgba(0,0,0,.6); font-size:8px;">分類</label>
                            <b-select v-model="cropIdx" v-on:change="updateCrop" name="分類">
                              <option v-for="(crop, index) in CropOrder" :value="index" :key="index">
                                  {{crop}}
                              </option>
                            </b-select>
                          </v-col>
                          <v-col md="4">
                            <label for="作物" style="color:rgba(0,0,0,.6); font-size:8px;">作物</label>
                            <b-select v-model="plantIdx" v-on:change="updatePlant" name="作物">
                                <option v-for="(plant, index) in GrowPlants" :value="index" :key="index">
                                    {{plant}}
                                </option>
                            </b-select>     
                          </v-col>                  
                        </v-row>
                        <v-row>
                            <v-col md="2">
                                <v-subheader>3.地點選擇</v-subheader>
                            </v-col>
                            <v-col md="2">
                                <label for="縣市" style="color:rgba(0,0,0,.6); font-size:8px;">縣市</label>
                                <b-select v-model="cityIdx" v-on:change="updateCity" name="縣市">
                                    <option v-for="(data, index) in City" :value="index" :key="index">
                                        {{data}}
                                    </option>
                                </b-select>
                            </v-col>
                            <v-col md="2">
                                <label for="地區" style="color:rgba(0,0,0,.6); font-size:8px;">地區</label>
                                <b-select v-model="regionIdx" v-on:change="updateRegion" name="地區">
                                    <option v-for="(data, index) in Region" :value="index" :key="index">
                                        {{data}}
                                    </option>
                                </b-select>
                            </v-col>
                        </v-row>
                        <v-row>
                            <v-col md="2">
                                <v-subheader>4.地形地貌</v-subheader>
                            </v-col>
                            <v-col md="2">
                                <label for="地形" style="color:rgba(0,0,0,.6); font-size:8px;">地形</label>
                                <b-select v-model="SelectTerrain" name="地形">
                                    <option value="0">地形</option>
                                    <option value="平原">平原</option>
                                    <option value="山區">山區</option>
                                    <option value="海邊">海邊</option>
                                </b-select>
                            </v-col>
                            <v-col md="2">
                                <label for="地貌" style="color:rgba(0,0,0,.6); font-size:8px;">地貌</label>
                                <b-select v-model="SelectLandform" name="地貌">
                                    <option value="0">地貌</option>
                                    <option value="建築物">建築物</option>
                                    <option value="空曠">空曠</option>
                                    <option value="風口">風口</option>
                                </b-select>
                            </v-col>
                            <v-col md="2">
                                <label for="地況" style="color:rgba(0,0,0,.6); font-size:8px;">地況</label>
                                <b-select v-model="SelectLandcondition" name="地況">
                                    <option value="0">地況</option>
                                    <option value="硬質土">硬質土</option>
                                    <option value="軟質土">軟質土</option>
                                    <option value="下陷區">下陷區</option>
                                </b-select>
                            </v-col>
                        </v-row>
                        <v-row>
                          <v-col cols="12" md="2">
                            <v-subheader>5.栽種面積</v-subheader>
                          </v-col>
                          <v-col cols="12" md="2">
                            <v-text-field label="長度(m)" v-model="plantlength" v-on:change="areacount"></v-text-field>
                          </v-col>  
                          <v-col cols="12" md="2">
                            <v-text-field label="寬度(m)" v-model="plantwidth" v-on:change="areacount"></v-text-field>
                          </v-col>    
                          <v-col cols="12" md="2">
                            <v-text-field readonly label="面積試算(公頃)" v-model="area"></v-text-field>
                          </v-col>    
                          <v-col cols="12" md="2">
                            <label for="方位" style="color:rgba(0,0,0,.6); font-size:8px;">方位</label>
                            <b-select v-model="position" name="方位">
                                <option v-for="(data, index) in allposition" :value="index" :key="index">
                                    {{data}}
                                </option>
                            </b-select>
                          </v-col>                      
                        </v-row>
                        <v-row>
                            <v-col md="2">
                                <v-subheader>6.決策權重</v-subheader>
                            </v-col>
                            <v-col md="2">
                                <v-text-field :hint="decide[0]" persistent-hint label="品質性能" v-model="quality" v-on:change="countdecide"></v-text-field>
                            </v-col>
                            <v-col md="2">
                                <v-text-field :hint="decide[1]" persistent-hint label="風險性" v-model="risk" v-on:change="countdecide"></v-text-field>
                            </v-col>
                            <v-col md="2">
                                <v-text-field :hint="decide[2]" persistent-hint label="速度性" v-model="speed" v-on:change="countdecide"></v-text-field>
                            </v-col>
                            <v-col md="2">
                                <v-text-field :hint="decide[3]" persistent-hint label="成本性" v-model="cost" v-on:change="countdecide"></v-text-field>
                            </v-col>
                        </v-row>               
                      </v-container>
                      <button type="submit" class="btn btn-primary" style="float:right;">確定</button>
                      <button type="reset" class="btn btn-primary" style="float:left;">清除</button>
                    </v-form>
                    <br><br><br><br><br><br>
                </v-col>

                <v-btn fab dark style="position:fixed; bottom: 0; right: 0; z-index: 9999;" v-on:click="showform=false">
                  <b-icon icon="arrow-right"></b-icon>
                </v-btn>
            </v-row>
        </v-container-fluid>
        <v-container-fluid v-else-if="showform==false">
            <v-row>
                <v-col>
                    <b-card-group>
                        <!-- 種植植物生長環境需求 -->
                        <b-card header-tag="header" header-text-variant="white" header-bg-variant="info">
                            <template #header>
                                <h6 class="mb-0"><b-icon icon="flower1"></b-icon> 已儲存之規劃結果</h6>
                            </template>
                            <b-card-text>
                                <b-card-group>
                                    <v-container-fluid>
                                        <v-row>
                                            <v-col v-for="(OverPlan, index) in overplanArray" :key="index">
                                                <b-card header-tag="header" header-text-variant="white" header-bg-variant="info">
                                                    <template #header>
                                                        <h6 class="mb-0">
                                                            <b-icon icon="flower1"></b-icon> 
                                                            2021/07/16-{{ OverPlan.cropplant }}-{{ index+1 }}

                                                            <button type="button" style="float:right; width:20px; height:20px;" v-on:click="deleterecord(OverPlan.pid)"><b-icon icon="X"></b-icon></button>
                                                        </h6>
                                                    </template>
                                                    <b-card-text>
                                                        <span>A.使用者：{{ OverPlan.userclass }}-{{ OverPlan.usercodename }}</span><br>
                                                        <span>B.溫室作物：{{ OverPlan.palntclass }}*{{ OverPlan.cropplant }}</span><br>
                                                        <span>C.地點選擇：{{ OverPlan.localcity }}-{{ OverPlan.localarea }}</span><br>
                                                        <span>D.地型地貌：{{ OverPlan.terrain }}-{{ OverPlan.landform }}-{{ OverPlan.landcondition }}</span><br>
                                                        <span>E.栽種面積：{{ OverPlan.croplength }}x{{ OverPlan.cropwidth }}={{ OverPlan.croparea }}&nbsp;&nbsp;方位{{ OverPlan.position }}</span><br>
                                                        <span>
                                                            F.決策權重：品質性能-{{ OverPlan.quality }}<br>
                                                                        風險性-{{ OverPlan.risk }}<br>
                                                                        速度性-{{ OverPlan.speed }}<br>
                                                                        成本性-{{ OverPlan.cost }}<br>
                                                        </span><br>
                                                    </b-card-text>
                                                </b-card>
                                            </v-col>
                                        </v-row>
                                    </v-container-fluid>
                                </b-card-group>
                            </b-card-text>
                        </b-card>
                    </b-card-group>
                </v-col>
            </v-row>
            <v-row>
                <v-col>
                    <b-card-group deck>
                        <!-- 種植植物生長環境需求 -->
                        <b-card header-tag="header" header-text-variant="white" header-bg-variant="info">
                            <template #header>
                                <h6 class="mb-0"><b-icon icon="flower1"></b-icon> 規劃結果-比較分析</h6>
                            </template>
                            <b-card-text>
                                <div>
                                    <h5>管 材 製 程 比 較 分 析</h5>
                                    <v-container-fluid>
                                        <v-row>
                                            <v-col>
                                                <table style="border:1px solid black; font-size: 1.5vmin" border='1'>
                                                    <thead class="table-active">
                                                        <tr align="center">
                                                            <td colspan="4"> 請輸入權重比 (分數 1~5 ) </td>
                                                            <td>
                                                                <button type="button" class="btn btn-warning" style="font-size:1.5vmin; font-family:Microsoft JhengHei;">計算</button>
                                                            </td>
                                                        </tr>
                                                        <tr align="center">
                                                            <td> 速度性 </td>
                                                            <td> 結構風險 </td>
                                                            <td> 腐蝕性 </td>
                                                            <td> 重量性 </td>
                                                            <td> 成本性 </td>
                                                        </tr>
                                                    </thead>
                                                    <tr align="center">
                                                        <td>
                                                            <v-text-field
                                                                label="請輸入速度性"
                                                                
                                                            ></v-text-field>
                                                        </td>
                                                        <td>
                                                            <v-text-field
                                                                label="請輸入結構風險"
                                                                
                                                            ></v-text-field>
                                                        </td>
                                                        <td>
                                                            <v-text-field
                                                                label="請輸入腐蝕性"
                                                                
                                                            ></v-text-field>
                                                        </td>
                                                        <td>
                                                            <v-text-field
                                                                label="請輸入重量性"
                                                                
                                                            ></v-text-field>
                                                        </td>
                                                        <td>
                                                            <v-text-field
                                                                label="請輸入成本性"
                                                                
                                                            ></v-text-field>
                                                        </td>
                                                    </tr>
                                                    
                                                </table>
                                            </v-col>
                                            <v-col>
                                                <table style="border:1px solid black; font-size: 1.5vmin" border='1'>
                                                    <thead class="table-active">
                                                        <tr align="center">
                                                            <td style='width:6.5vmin'> 速度性 </td>
                                                            <td style='width:6.5vmin'> 結構<br>風險 </td>
                                                            <td style='width:6.5vmin'> 腐蝕性 </td>
                                                            <td style='width:6.5vmin'> 重量性 </td>
                                                            <td style='width:6.5vmin'> 成本性 </td>
                                                            <td style='width:6.5vmin'> 比較值 </td>
                                                            <td style='width:6.5vmin'> 排名值 </td>
                                                        </tr>
                                                    </thead>
                                                    <tr align="center">
                                                        <td>test</td>
                                                        <td>test</td>
                                                        <td>test</td>
                                                        <td>test</td>
                                                        <td>test</td>
                                                        <td>test</td>
                                                        <td>test</td>
                                                    </tr>
                                                </table>
                                            </v-col>
                                        </v-row>
                                    </v-container-fluid>
                                </div>
                            </b-card-text>
                        </b-card>
                    </b-card-group>                   
                </v-col> 

                <v-btn fab dark style="position:fixed; bottom: 0; right: 0; z-index: 9999;" v-on:click="showform=true">
                  <b-icon icon="arrow-left"></b-icon>
                </v-btn>
            </v-row>
        </v-container-fluid>
    </div>
</template>

<script>
  import * as SaveOverPlan from '../../services/saveoverplan_service.js';
  export default {
    data: () => ({
        cropIdx: 0,
        plantIdx: 0,
        selectCrop: null,
        vegetablejson:[],
        CropOrder: ["分類","根菜","莖菜","葉菜","花菜","果菜","糧食","水果","花"],
        GrowPlants: ['作物',],
        plantlength: 0,
        plantwidth: 0,
        tabIndex: 0,
        regionalwindspeedjson:[],   // 縣市地區資料
        City:['縣市',],   // 縣市選單的陣列表
        cityIdx: 0, // 所選縣市的id
        selectCity: null, // 所選縣市的名稱
        Region:['地區',], // 地區選單的陣列表
        regionIdx: 0,   // 所選地區的id
        selectRegion: null, // 所選地區的名稱
        SelectTerrain:0, // 選擇地形
        SelectLandform:0, // 選擇地貌
        SelectLandcondition:0, // 選擇地況
        greenhouseradio: null, //透過radio button選擇要簡易還是強固
        Fluidjson: [],
        checkData:[],
        checkedNames: [],


        time: new Date(),
        OverPlanJson: [],
        overplanArray: [],

        showform:true,

        classIdx:0,

        allposition:['方位','東','南','西','北','東南','西南','東北','西北'],
        position:0,
        quality:0,
        risk:0,
        speed:0,
        cost:0,
        decide:['0','0','0','0'],
        area:0,

        user_class: ['類別','農民','專家','設計者'],
        codename:'None',
        user_index: 0,
    }),
    created:function(){  // 網頁載入時，一開始就載入
        this.getJson();
    },
    methods: {
        async getJson(){
        const Vegetable = await fetch('/VegetableJSON',  {
            method: 'GET',
        });
        this.vegetablejson = await Vegetable.json();
        // 縣市地區資料
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

        const res = await fetch('/FluidAnalysisJSON',  {
            method: 'GET',
        });
        this.Fluidjson = await res.json();
        
        const J_OverPlan = await fetch('/OverPlanJson',  {
            method: 'GET',
        });
        this.OverPlanJson = await J_OverPlan.json();
        for(var i = 0; i < this.OverPlanJson.length; i++){
            this.overplanArray.push(this.OverPlanJson[i])
        }
        
    },
    
    updateCrop(){     // 更新所選擇的作物分類
        // 從所選的作物id 找到 所選作物分類
        for(var i = 0 ; i < this.CropOrder.length ; i++){
            if(i == this.cropIdx)    this.selectCrop = this.CropOrder[i];
        }
        this.GrowPlants = ['作物',];  // 作物資料初始化
        this.plantIdx = 0;
        for(var i = 0 ; i < this.vegetablejson.length ; i++){
            if(this.selectCrop == "分類") this.CropSelect = this.vegetablejson;
            if(this.vegetablejson[i].classification == this.selectCrop)    this.GrowPlants.push(this.vegetablejson[i].VegetableTypes);
        }
    },
    updatePlant(){    // 更新所選擇的作物
        // 從所選的作物id 找到 所選作物分類
        for(var i = 0 ; i < this.GrowPlants.length ; i++){
            if(i == this.plantIdx)    this.selectplant = this.GrowPlants[i];
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
    },
    updateCity(){     // 更新所選擇的縣市
        // 從所選的縣市id 找到 所選的縣市名稱
        for(var i = 0 ; i < this.City.length ; i++){
            if(i == this.cityIdx)    this.selectCity = this.City[i];
        }
        // 將地區資料初始化
        this.selectRegion = null;
        this.regionIdx = 0;
        this.Region = ['地區'];
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
    recordallinfo: async function() {
        
        this.recordinfos = []
        this.recordinfos.push(this.user_class[this.classIdx]) //作物分類
        this.recordinfos.push(this.codename) //作物選擇
        this.recordinfos.push(this.CropOrder[this.cropIdx])
        this.recordinfos.push(this.GrowPlants[this.plantIdx])
        this.recordinfos.push(this.selectCity)
        this.recordinfos.push(this.selectRegion)
        this.recordinfos.push(this.SelectTerrain)
        this.recordinfos.push(this.SelectLandform)
        this.recordinfos.push(this.SelectLandcondition)
        this.recordinfos.push(this.plantlength)
        this.recordinfos.push(this.plantwidth)
        this.recordinfos.push(this.area)
        this.recordinfos.push(this.allposition[this.position])
        this.recordinfos.push(this.quality)
        this.recordinfos.push(this.risk)
        this.recordinfos.push(this.speed)
        this.recordinfos.push(this.cost)
        
        let formData = new FormData();
        let formarray = [
            'userclass',
            'usercodename',
            'palntclass',
            'cropplant',
            'localcity',
            'localarea',
            'terrain',
            'landform',
            'landcondition',
            'croplength',
            'cropwidth',
            'croparea',
            'position',
            'quality',
            'risk',
            'speed',
            'cost',
            ]
        for (var i = 0; i < formarray.length; i++){
            formData.append(formarray[i],this.recordinfos[i]) 
        }
        const response = await SaveOverPlan.createOverPlan(formData)
        this.overplanArray.push(response.data)
        this.showform = false;
    },
    deleterecord: async function(DeleteId){ 
        await SaveOverPlan.deleteOverPlan(DeleteId);
        this.overplanArray = this.overplanArray.filter(obj =>{
            return obj.pid != DeleteId;
        });
    },

    areacount(){
        this.area = this.plantlength*this.plantwidth/10000
    },

    countdecide(){
        this.decide = []
        this.decide.push(String(Math.floor(this.quality/(parseInt(this.quality)+parseInt(this.risk)+parseInt(this.cost)+parseInt(this.speed))*100)+'%'))
        this.decide.push(String(Math.floor(this.risk/(parseInt(this.quality)+parseInt(this.risk)+parseInt(this.cost)+parseInt(this.speed))*100)+'%'))
        this.decide.push(String(Math.floor(this.speed/(parseInt(this.quality)+parseInt(this.risk)+parseInt(this.cost)+parseInt(this.speed))*100)+'%'))
        this.decide.push(String(Math.floor(this.cost/(parseInt(this.quality)+parseInt(this.risk)+parseInt(this.cost)+parseInt(this.speed))*100)+'%'))
    }
},
}
</script>