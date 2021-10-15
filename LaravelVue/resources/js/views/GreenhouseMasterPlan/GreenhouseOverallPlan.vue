<template>

    <div>
        <br>
        <h3 id="總體規劃X">
            溫室總體規劃系統
        </h3>
        <hr>

        <v-container-fluid>
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
                              <option v-for="(crop, index) in user_class" :value="crop" :key="index">
                                  {{crop}}
                              </option>
                            </b-select>
                          </v-col>
                          <v-col md="4">
                            <v-text-field label="代號" v-model="codename" disabled></v-text-field>
                          </v-col>                  
                        </v-row>
                        <v-row>
                          <v-col md="2">
                            <v-subheader>2.溫室作物</v-subheader>
                          </v-col>
                          <v-col md="4">
                            <label for="分類" style="color:rgba(0,0,0,.6); font-size:8px;">分類</label>
                            <b-select v-model="cropIdx" v-on:change="updateCrop" name="分類">
                              <option v-for="(crop, index) in CropOrder" :value="crop" :key="index">
                                  {{crop}}
                              </option>
                            </b-select>
                          </v-col>
                          <v-col md="4">
                            <label for="作物" style="color:rgba(0,0,0,.6); font-size:8px;">作物</label>
                            <b-select v-model="plantIdx" v-on:change="updatePlant" name="作物">
                                <option v-for="(plant, index) in GrowPlants" :value="plant" :key="index">
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
                                    <option v-for="(data, index) in City" :value="data" :key="index">
                                        {{data}}
                                    </option>
                                </b-select>
                            </v-col>
                            <v-col md="2">
                                <label for="地區" style="color:rgba(0,0,0,.6); font-size:8px;">地區</label>
                                <b-select v-model="regionIdx" v-on:change="updateRegion" name="地區">
                                    <option v-for="(data, index) in Region" :value="data" :key="index">
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
                            <v-text-field label="南北長度(m)" v-model="plantlength" v-on:change="areacount"></v-text-field>
                          </v-col>  
                          <v-col cols="12" md="2">
                            <v-text-field label="東西長度(m)" v-model="plantwidth" v-on:change="areacount"></v-text-field>
                          </v-col>    
                          <v-col cols="12" md="2">
                            <v-text-field readonly label="面積試算(平方公尺)" v-model="area"></v-text-field>
                          </v-col>    
                          <v-col cols="12" md="2">
                            <label for="方位" style="color:rgba(0,0,0,.6); font-size:8px;">方位</label>
                            <b-select v-model="position" name="方位">
                                <option v-for="(data, index) in allposition" :value="data" :key="index">
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
            </v-row>
        </v-container-fluid>
    </div>
</template>

<script>
  import * as SaveOverPlan from '../../services/saveoverplan_service.js';
  export default {
    data: () => ({
        cropIdx: null,
        plantIdx: null,
        selectCrop: null,
        vegetablejson:[],
        CropOrder: ["分類","根菜","莖菜","葉菜","花菜","果菜","糧食","水果","花"],
        GrowPlants: ['作物',],
        plantlength: 0,
        plantwidth: 0,
        tabIndex: 0,
        regionalwindspeedjson:[],   // 縣市地區資料
        City:['縣市',],   // 縣市選單的陣列表
        cityIdx: null, // 所選縣市的id
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

        //showform:true,

        classIdx:'類別',

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

        now_user: null,
    }),
    created:function(){  // 網頁載入時，一開始就載入
        if (this.$auth.check() === false) {
            this.$router.push({ name: '使用者登入' })
        }
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
            if (this.OverPlanJson[i].uid === this.$auth.user().id){
                this.overplanArray.push(this.OverPlanJson[i])
                this.now_user = this.OverPlanJson[i].pid
            }
        }
        this.codename = this.$auth.user().name
        this.cropIdx = this.overplanArray[0].palntclass
        this.cityIdx = this.overplanArray[0].localcity
        this.SelectTerrain = this.overplanArray[0].terrain
        this.SelectLandform = this.overplanArray[0].landform
        this.SelectLandcondition = this.overplanArray[0].landcondition
        this.plantlength = this.overplanArray[0].croplength
        this.plantwidth = this.overplanArray[0].cropwidth
        this.area = this.overplanArray[0].croparea
        this.position = this.overplanArray[0].position
        for(var i = 0 ; i < this.CropOrder.length ; i++){
            if(this.CropOrder[i] == this.cropIdx)    this.selectCrop = this.CropOrder[i];
        }
        this.GrowPlants = ['作物',];  // 作物資料初始化
        this.plantIdx = 0;
        for(var i = 0 ; i < this.vegetablejson.length ; i++){
            if(this.selectCrop == "分類") this.CropSelect = this.vegetablejson;
            if(this.vegetablejson[i].classification == this.selectCrop)    this.GrowPlants.push(this.vegetablejson[i].VegetableTypes);
        }
        for(var i = 0 ; i < this.City.length ; i++){
            if(this.City[i] == this.cityIdx)    this.selectCity = this.City[i];
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
        this.plantIdx = this.overplanArray[0].cropplant
        this.regionIdx = this.overplanArray[0].localarea
    },
    
    updateCrop(){     // 更新所選擇的作物分類
        // 從所選的作物id 找到 所選作物分類
        for(var i = 0 ; i < this.CropOrder.length ; i++){
            if(this.CropOrder[i] == this.cropIdx)    this.selectCrop = this.CropOrder[i];
        }
        this.GrowPlants = ['作物',];  // 作物資料初始化
        
        for(var i = 0 ; i < this.vegetablejson.length ; i++){
            if(this.selectCrop == "分類") this.CropSelect = this.vegetablejson;
            if(this.vegetablejson[i].classification == this.selectCrop)    this.GrowPlants.push(this.vegetablejson[i].VegetableTypes);
        }
    },
    updatePlant(){    // 更新所選擇的作物
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
    },
    updateCity(){     // 更新所選擇的縣市
        // 從所選的縣市id 找到 所選的縣市名稱
        for(var i = 0 ; i < this.City.length ; i++){
            if(this.City[i] == this.cityIdx)    this.selectCity = this.City[i];
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
            if(this.Region[i] == this.regionIdx)    this.selectRegion = this.Region[i];
        }
    },
    recordallinfo: async function() {
        let get_id = [];
        let formData = new FormData();
        formData.append('userclass',this.classIdx) 
        formData.append('uid',this.$auth.user().id) 
        formData.append('usercodename',this.codename) 
        formData.append('palntclass',this.cropIdx) 
        formData.append('cropplant',this.plantIdx) 
        formData.append('localcity',this.cityIdx) 
        formData.append('localarea',this.regionIdx) 
        formData.append('terrain',this.SelectTerrain) 
        formData.append('landform',this.SelectLandform) 
        formData.append('landcondition',this.SelectLandcondition) 
        formData.append('croplength',this.plantlength) 
        formData.append('cropwidth',this.plantwidth) 
        formData.append('croparea',this.area) 
        formData.append('position',this.position) 
        formData.append('quality',this.quality) 
        formData.append('risk',this.risk) 
        formData.append('speed',this.speed) 
        formData.append('cost',this.cost) 
        const J_OverPlan = await fetch('/OverPlanJson',  {
            method: 'GET',
        });
        this.OverPlanJson = await J_OverPlan.json();
        for(var i = 0; i < this.OverPlanJson.length; i++){
            if (this.OverPlanJson[i].uid === this.$auth.user().id){
                this.now_user = this.OverPlanJson[i].pid
            }
            get_id.push(this.OverPlanJson[i].uid)
        }
        
        if (get_id.indexOf(this.$auth.user().id) === -1){
            const response = await SaveOverPlan.createOverPlan(formData)
            this.overplanArray = []
            this.overplanArray = response.data
            window.alert('新增完畢')
        } else{
            formData.append('_method','patch');
            const response = await SaveOverPlan.UpdateOverPlan(this.now_user,formData)
            this.overplanArray = []
            this.overplanArray = response.data
            window.alert('修改完畢')
        }
    },
    deleterecord: async function(DeleteId){ 
        await SaveOverPlan.deleteOverPlan(DeleteId);
        this.overplanArray = this.overplanArray.filter(obj =>{
            return obj.pid != DeleteId;
        });
    },

    areacount(){
        this.area = this.plantlength*this.plantwidth
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