<template>
    <div>
        <br>
        <h2>溫室作物選擇</h2>
        <hr>
        <div class="d-flex justify-content-center">
        <div class="p-1 bd-highlight"></div>
        <div class="p-4 bd-highlight">
            <div v-if="$auth.check()">
                <h4 style="color:red; font-weight:bold;" v-if="$auth.user().identity === '管理者' || $auth.user().identity === '專家'">
                    新增農業作物資料請新增在此
                </h4>
                <v-form v-on:submit.prevent="createCrop" v-model="valid" lazy-validation v-if="$auth.user().identity === '管理者' || $auth.user().identity === '專家'">
                    <v-container-fluid>
                        <v-row>
                            <v-col>
                                <v-text-field
                                    v-model="CropData.Expert"
                                    :rules="CropRules"
                                    label="您的編號"
                                    disabled
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.Expert">{{ errors.Expert[0] }}</div>
                            </v-col>
                            <v-col></v-col>
                            <v-col></v-col>
                            <v-col></v-col>
                            <v-col></v-col>
                            <v-col></v-col>
                            <v-col></v-col>
                        </v-row>
                        <v-row>
                            <v-col>
                                <b-form-select v-model="CropData.classification" :options="classificationOptions" >

                                </b-form-select>
                                <div class="invalid-feedback" v-if="errors.classification">{{ errors.classification[0] }}</div>
                            </v-col>
                            <v-col>
                                <v-text-field
                                    v-model="CropData.VegetableTypes"
                                    :rules="CropRules"
                                    label="作物種類"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.VegetableTypes">{{ errors.VegetableTypes[0] }}</div>
                            </v-col>
                            <v-col>
                                <b-form-select v-model="CropData.Goodlight" :options="GoodlightOptions" >

                                </b-form-select>
                                <div class="invalid-feedback" v-if="errors.Goodlight">{{ errors.Goodlight[0] }}</div>
                            </v-col>
                            <v-col>
                                <b-form-select v-model="CropData.Photoperiod" :options="PhotoperiodOptions" >

                                </b-form-select>
                                <div class="invalid-feedback" v-if="errors.Photoperiod">{{ errors.Photoperiod[0] }}</div>
                            </v-col>
                            <v-col>
                                <b-form-select v-model="CropData.Illuminance" :options="IlluminanceOptions" >

                                </b-form-select>
                                <div class="invalid-feedback" v-if="errors.Illuminance">{{ errors.Illuminance[0] }}</div>
                            </v-col>
                            <v-col>
                                <b-form-select v-model="CropData.PPFD" :options="PPFDOptions" >

                                </b-form-select>
                                <div class="invalid-feedback" v-if="errors.PPFD">{{ errors.PPFD[0] }}</div>
                            </v-col>
                            <v-col>
                                <v-text-field
                                    v-model="CropData.LightSaturationPoint"
                                    :rules="CropRules"
                                    label="光飽和點(klx)"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.LightSaturationPoint">{{ errors.LightSaturationPoint[0] }}</div>
                            </v-col>
                            <v-col>
                                <v-text-field
                                    v-model="CropData.LightCompensationPoint"
                                    :rules="CropRules"
                                    label="光補償點(klx)"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.LightCompensationPoint">{{ errors.LightCompensationPoint[0] }}</div>
                            </v-col>
                        </v-row>
                        <v-row>
                            <v-col>
                                <b-form-select v-model="CropData.Temperatureadaptability" :options="TemperatureadaptabilityOptions" >

                                </b-form-select>
                                <div class="invalid-feedback" v-if="errors.Temperatureadaptability">{{ errors.Temperatureadaptability[0] }}</div>
                            </v-col>
                            <v-col>
                                <v-text-field
                                    v-model="CropData.LowestGrowthTemperature"
                                    :rules="CropRules"
                                    label="生長溫度最低溫"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.LowestGrowthTemperature">{{ errors.LowestGrowthTemperature[0] }}</div>
                            </v-col>
                            <v-col>
                                <v-text-field
                                    v-model="CropData.OptimalGrowthTemperature"
                                    :rules="CropRules"
                                    label="生長溫度最適溫"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.OptimalGrowthTemperature">{{ errors.OptimalGrowthTemperature[0] }}</div>
                            </v-col>
                            <v-col>
                                <v-text-field
                                    v-model="CropData.HighestGrowthTemperature"
                                    :rules="CropRules"
                                    label="生長溫度最高溫"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.HighestGrowthTemperature">{{ errors.HighestGrowthTemperature[0] }}</div>
                            </v-col>
                            <v-col>
                                <v-text-field
                                    v-model="CropData.LowestGerminationTemperature"
                                    :rules="CropRules"
                                    label="發芽溫度最低溫"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.LowestGerminationTemperature">{{ errors.LowestGerminationTemperature[0] }}</div>
                            </v-col>
                            <v-col>
                                <v-text-field
                                    v-model="CropData.OptimumGerminationTemperature"
                                    :rules="CropRules"
                                    label="發芽溫度最適溫"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.OptimumGerminationTemperature">{{ errors.OptimumGerminationTemperature[0] }}</div>
                            </v-col>
                            <v-col>
                                <v-text-field
                                    v-model="CropData.HighestGerminationTemperature"
                                    :rules="CropRules"
                                    label="發芽溫度最高溫"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.HighestGerminationTemperature">{{ errors.HighestGerminationTemperature[0] }}</div>
                            </v-col>
                            <v-col>
                                <v-text-field
                                    v-model="CropData.CO2IncreasedProductionRate"
                                    :rules="CropRules"
                                    label="CO₂增產率"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.CO2IncreasedProductionRate">{{ errors.CO2IncreasedProductionRate[0] }}</div>
                            </v-col>
                        </v-row>
                    </v-container-fluid>
                    <hr>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary"><span class="fa fa-check" :disabled="!valid"></span>新增</button>
                    </div>
                </v-form>

                <br>
            </div>



            <b-select v-model="ExpertIdx" v-on:change="updateExpertTable" style="font-size: 2vmin; width:25vmin" >
                <option v-for="(data, index) in ExpertOrder" :value="index">
                    {{data}}
                </option>
            </b-select>
            <b-select v-model="cropIdx" v-on:change="updateCropTable" style="font-size: 2vmin; width:25vmin" >
                <option v-for="(data, index) in CropOrder" :value="index">
                    {{data}}
                </option>
            </b-select>
            <a class="btn btn-success mr-auto p-2 bd-highlight text-white" href = "/#/GreenhouseMasterPlan/CropEnvironmentalDemandAnalysis" target="_blank" style="font-size:1.8vmin; font-family:Microsoft JhengHei;">作 物 環 境 需 求 分 析</a>

            <br>

            <table style="border:1px solid black; font-size: 2vmin" border='1'>
                <thead class="table-active">
                    <tr align="center">
                        <td rowspan="2" style='width:13vmin'> 作物分類 </td>
                        <td rowspan="2" style='width:13vmin'> 作物種類 </td>
                        <td rowspan="2" style='width:13vmin'> 好光性 </td>
                        <td rowspan="2" style='width:13vmin'> 光週期 </td>
                        <td rowspan="2" style='width:13vmin'> 光照度 </td>
                        <td rowspan="2" style='width:13vmin'> PPFD </td>
                        <td rowspan="2" style='width:13vmin'> 光飽和點(klx) </td>
                        <td rowspan="2" style='width:13vmin'> 光補償點(klx) </td>
                        <td rowspan="2" style='width:13vmin'> 溫度適應性</td>
                        <td colspan="3" style='width:16vmin'> 生長溫度</td>
                        <td colspan="3" style='width:16vmin'> 發芽溫度 </td>
                        <td rowspan="2" style='width:13vmin'> CO₂增產率 </td>
                        <td rowspan="2" style='width:13vmin' v-if="$auth.check()"> <div v-if="$auth.user().identity === '管理者' || $auth.user().identity === '專家'">編輯 </div></td>
                        <td rowspan="2" style='width:13vmin' v-if="$auth.check()"> <div v-if="$auth.user().identity === '管理者' || $auth.user().identity === '專家'">刪除 </div> </td>
                    </tr>
                    <tr align="center">
                        <td> 最低溫 </td>
                        <td> 最適溫 </td>
                        <td> 最高溫 </td>
                        <td> 最低溫 </td>
                        <td> 最適溫 </td>
                        <td> 最高溫 </td>

                    </tr>
                </thead>

                <tr align="center" v-for="(crop, index) in CropSelect" :key="index">
                    <td> {{crop.classification}} </td>
                    <td> {{crop.VegetableTypes}} </td>
                    <td> {{crop.Goodlight}} </td>
                    <td> {{crop.Photoperiod}} </td>
                    <td> {{crop.Illuminance}} </td>
                    <td> {{crop.PPFD}} </td>
                    <td> {{crop.LightSaturationPoint}} </td>
                    <td> {{crop.LightCompensationPoint}} </td>
                    <td> {{crop.Temperatureadaptability}} </td>
                    <td> {{crop.LowestGrowthTemperature}} </td>
                    <td> {{crop.OptimalGrowthTemperature}} </td>
                    <td> {{crop.HighestGrowthTemperature}} </td>
                    <td> {{crop.LowestGerminationTemperature}} </td>
                    <td> {{crop.OptimumGerminationTemperature}} </td>
                    <td> {{crop.HighestGerminationTemperature}} </td>
                    <td> {{crop.CO2IncreasedProductionRate}} </td>
                    <td v-if="$auth.check()">
                        <div v-if="$auth.user().identity === '管理者' || $auth.user().identity === '專家'">
                            <!-- 修改 -->
                            <button class="btn btn-primary btn-sm" v-on:click="EditCrop(crop)"><span class="fa fa-edit"></span></button>
                        </div>
                    </td>
                    <td v-if="$auth.check()">
                        <div v-if="$auth.user().identity === '管理者' || $auth.user().identity === '專家'">
                            <!-- 刪除 -->
                            <button class="btn btn-danger btn-sm"  v-on:click="deleteCrop(crop.id)"><span class="fa fa-trash"></span></button>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="p-1 bd-highlight"></div>

        <b-modal ref="EditCropModal" hide-footer title="編輯資料" centered size="xl">
            <div class="d-block">
                <v-form v-on:submit.prevent="UpdateCrop">
                    <v-container-fluid>
                        <v-row>
                            <v-col>
                                <v-text-field
                                    v-model="EditCropData.Expert"
                                    :rules="CropRules"
                                    label="您的編號"
                                    disabled
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.Expert">{{ errors.Expert[0] }}</div>
                            </v-col>
                            <v-col>

                            </v-col>
                            <v-col>

                            </v-col>
                        </v-row>
                        <v-row>
                            <v-col>
                                <b-form-select v-model="EditCropData.classification" :options="classificationOptions" >

                                </b-form-select>
                                <div class="invalid-feedback" v-if="errors.classification">{{ errors.classification[0] }}</div>
                            </v-col>
                            <v-col>
                                <v-text-field
                                    v-model="EditCropData.VegetableTypes"
                                    :rules="CropRules"
                                    label="作物種類"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.VegetableTypes">{{ errors.VegetableTypes[0] }}</div>
                            </v-col>
                            <v-col>
                                <b-form-select v-model="EditCropData.Goodlight" :options="GoodlightOptions" >

                                </b-form-select>
                                <div class="invalid-feedback" v-if="errors.Goodlight">{{ errors.Goodlight[0] }}</div>
                            </v-col>
                        </v-row>
                        <v-row>
                            <v-col>
                                <b-form-select v-model="EditCropData.Photoperiod" :options="PhotoperiodOptions" >

                                </b-form-select>
                                <div class="invalid-feedback" v-if="errors.Photoperiod">{{ errors.Photoperiod[0] }}</div>
                            </v-col>
                            <v-col>
                                <b-form-select v-model="EditCropData.Illuminance" :options="IlluminanceOptions" >

                                </b-form-select>
                                <div class="invalid-feedback" v-if="errors.Illuminance">{{ errors.Illuminance[0] }}</div>
                            </v-col>
                            <v-col>
                                <b-form-select v-model="EditCropData.PPFD" :options="PPFDOptions" >

                                </b-form-select>
                                <div class="invalid-feedback" v-if="errors.PPFD">{{ errors.PPFD[0] }}</div>
                            </v-col>
                        </v-row>
                        <v-row>
                            <v-col>
                                <v-text-field
                                    v-model="EditCropData.LightSaturationPoint"
                                    :rules="CropRules"
                                    label="光飽和點(klx)"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.LightSaturationPoint">{{ errors.LightSaturationPoint[0] }}</div>
                            </v-col>
                            <v-col>
                                <v-text-field
                                    v-model="EditCropData.LightCompensationPoint"
                                    :rules="CropRules"
                                    label="光補償點(klx)"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.LightCompensationPoint">{{ errors.LightCompensationPoint[0] }}</div>
                            </v-col>
                            <v-col>
                                <b-form-select v-model="EditCropData.Temperatureadaptability" :options="TemperatureadaptabilityOptions" >

                                </b-form-select>
                                <div class="invalid-feedback" v-if="errors.Temperatureadaptability">{{ errors.Temperatureadaptability[0] }}</div>
                            </v-col>
                        </v-row>
                        <v-row>
                            <v-col>
                                <v-text-field
                                    v-model="EditCropData.LowestGrowthTemperature"
                                    :rules="CropRules"
                                    label="生長溫度最低溫"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.LowestGrowthTemperature">{{ errors.LowestGrowthTemperature[0] }}</div>
                            </v-col>
                            <v-col>
                                <v-text-field
                                    v-model="EditCropData.OptimalGrowthTemperature"
                                    :rules="CropRules"
                                    label="生長溫度最適溫"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.OptimalGrowthTemperature">{{ errors.OptimalGrowthTemperature[0] }}</div>
                            </v-col>
                            <v-col>
                                <v-text-field
                                    v-model="EditCropData.HighestGrowthTemperature"
                                    :rules="CropRules"
                                    label="生長溫度最高溫"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.HighestGrowthTemperature">{{ errors.HighestGrowthTemperature[0] }}</div>
                            </v-col>
                        </v-row>
                        <v-row>
                            <v-col>
                                <v-text-field
                                    v-model="EditCropData.LowestGerminationTemperature"
                                    :rules="CropRules"
                                    label="發芽溫度最低溫"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.LowestGerminationTemperature">{{ errors.LowestGerminationTemperature[0] }}</div>
                            </v-col>
                            <v-col>
                                <v-text-field
                                    v-model="EditCropData.OptimumGerminationTemperature"
                                    :rules="CropRules"
                                    label="發芽溫度最適溫"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.OptimumGerminationTemperature">{{ errors.OptimumGerminationTemperature[0] }}</div>
                            </v-col>
                            <v-col>
                                <v-text-field
                                    v-model="EditCropData.HighestGerminationTemperature"
                                    :rules="CropRules"
                                    label="發芽溫度最高溫"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.HighestGerminationTemperature">{{ errors.HighestGerminationTemperature[0] }}</div>
                            </v-col>
                        </v-row>
                        <v-row>
                            <v-col>
                                <v-text-field
                                    v-model="EditCropData.CO2IncreasedProductionRate"
                                    :rules="CropRules"
                                    label="CO₂增產率"
                                    required
                                ></v-text-field>
                                <div class="invalid-feedback" v-if="errors.CO2IncreasedProductionRate">{{ errors.CO2IncreasedProductionRate[0] }}</div>
                            </v-col>
                            <v-col>

                            </v-col>
                            <v-col>

                            </v-col>
                        </v-row>
                    </v-container-fluid>
                    <hr>
                    <div class="text-right">
                        <button type="button" class="btn btn-default" v-on:click="hideEditCropModal">取消</button>
                        <button type="submit" class="btn btn-primary"><span class="fa fa-check" :disabled="!valid"></span>儲存</button>
                    </div>
                </v-form>
                <hr>
            </div>
        </b-modal>
    </div>


    </div>
</template>

<script>
import * as CropService from '../../../services/crop_service';

export default {
    data() {
        return {
            valid: false,
            tabIndex: 0,
            vegetablejson:[],
            ExpertSelect:[], // 顯示 此專家的資料
            CropSelect:[], // 顯示 作物的資料

            ExpertOrder :["==請選擇專家=="],    // 專家清單
            ExpertIdx: 0, // 所選專家的id
            selectExpert: 0, // 所選專家

            CropOrder:["==請選擇作物分類==","根菜","莖菜","葉菜","花菜","果菜","糧食","水果","花"], // 作物分類的選單陣列表
            cropIdx: 0, // 所選作物的id
            selectCrop: null, // 所選作物的名稱
            

            CropRules: [
                v => !!v || '必填',
            ],

            CropData:{
                id: null,
                Expert:this.$auth.user().id,
                classification: null,
                VegetableTypes: '',
                Goodlight: null,
                Photoperiod: null,
                Illuminance: null,
                PPFD: null,
                LightSaturationPoint: '',
                LightCompensationPoint: '',
                Temperatureadaptability: null,
                LowestGrowthTemperature: '',
                OptimalGrowthTemperature: '',
                HighestGrowthTemperature: '',
                LowestGerminationTemperature: '',
                OptimumGerminationTemperature: '',
                HighestGerminationTemperature: '',
                CO2IncreasedProductionRate: '',
            },
            EditCropData:{

            },
            errors:{

            },
            classificationOptions: [
                { value: null, text: '作物分類選擇' ,disabled:true },
                { value: '根菜', text: '根菜' },
                { value: '莖菜', text: '莖菜' },
                { value: '葉菜', text: '葉菜' },
                { value: '花菜', text: '花菜' },
                { value: '果菜', text: '果菜' },
                { value: '糧食', text: '糧食' },
                { value: '水果', text: '水果' },
                { value: '花', text: '花' },
            ],
            GoodlightOptions: [
                { value: null, text: '好光性選擇' ,disabled:true },
                { value: '好光型作物', text: '好光型作物' },
                { value: '中間型作物', text: '中間型作物' },
                { value: '弱光型作物', text: '弱光型作物' },
            ],
            PhotoperiodOptions: [
                { value: null, text: '光週期選擇' ,disabled:true },
                { value: '長日植物', text: '長日植物' },
                { value: '中日植物', text: '中日植物' },
                { value: '短日植物', text: '短日植物' },
            ],
            IlluminanceOptions: [
                { value: null, text: '光照度選擇' ,disabled:true },
                { value: '25000~40000', text: '25000~40000' },
                { value: '40000~60000', text: '40000~60000' },
                { value: '60000~90000', text: '60000~90000' },
            ],
            PPFDOptions: [
                { value: null, text: 'PPFD選擇' ,disabled:true },
                { value: '450~725以下', text: '450~725以下' },
                { value: '725~1090之間', text: '725~1090之間' },
                { value: '1090~1650以上', text: '1090~1650以上' },
            ],
            TemperatureadaptabilityOptions: [
                { value: null, text: '溫度適應性選擇' ,disabled:true },
                { value: '涼季蔬菜', text: '涼季蔬菜' },
                { value: '中間型蔬菜', text: '中間型蔬菜' },
                { value: '暖季蔬菜', text: '暖季蔬菜' },
            ],
        }
    },
    created:function(){  // 網頁載入時，一開始就載入
        this.getJson();
    },
    methods: {
        async getJson(){

            // console.log(this.$auth.user()); // 可以取得使用者資料
            // console.log(this.$auth.user().id); // 可以取得使用者資料

            // 作物資訊資料表
            const Vegetable = await fetch('/VegetableJSON',  {
                method: 'GET',
            });
            this.vegetablejson = await Vegetable.json();

            var filterfalg = false;
            for(var i = 0 ; i < this.vegetablejson.length ; i++){
                if(this.vegetablejson[i].Expert == "System"){
                    this.ExpertSelect.push(this.vegetablejson[i]);
                }

                filterfalg = false;
                // 篩選重複出現的專家
                for(var j = 0 ; j < this.ExpertOrder.length ; j++){
                    if(this.ExpertOrder[j] == this.vegetablejson[i].Expert){
                        filterfalg = true;
                        break;
                    }
                }
                if(!filterfalg) this.ExpertOrder.push(this.vegetablejson[i].Expert);
            }

            this.CropSelect = this.ExpertSelect;   // 之後選擇分類會使用到

        },
        updateCropTable(){
            // 從所選的作物id 找到 所選作物分類
            for(var i = 0 ; i < this.CropOrder.length ; i++){
                if(i == this.cropIdx)    this.selectCrop = this.CropOrder[i];
            }
            this.CropSelect = [];  // 作物資料初始化
            for(var i = 0 ; i < this.ExpertSelect.length ; i++){
                if(this.selectCrop == "==請選擇作物分類==") this.CropSelect = this.ExpertSelect;
                if(this.ExpertSelect[i].classification == this.selectCrop)  this.CropSelect.push(this.ExpertSelect[i]);
            }

        },
        updateExpertTable(){
            // 從所選的專家id 找到 所選 專家
            for(var i = 0 ; i < this.ExpertOrder.length ; i++){
                if(i == this.ExpertIdx)    this.selectExpert = this.ExpertOrder[i];
            }

            this.CropSelect = [];  // 作物資料初始化
            for(var i = 0 ; i < this.vegetablejson.length ; i++){
                if(this.selectExpert == "==請選擇專家==") this.CropSelect = this.ExpertSelect;
                if(this.vegetablejson[i].Expert == this.selectExpert)    this.CropSelect.push(this.vegetablejson[i]);
            }

            this.ExpertSelect = this.CropSelect;
        },
        createCrop: async function(){
            let formData = new FormData();

            formData.append('Expert',this.CropData.Expert);
            formData.append('classification',this.CropData.classification);
            formData.append('VegetableTypes',this.CropData.VegetableTypes);
            formData.append('Goodlight',this.CropData.Goodlight);
            formData.append('Photoperiod',this.CropData.Photoperiod);
            formData.append('Illuminance',this.CropData.Illuminance);
            formData.append('PPFD',this.CropData.PPFD);
            formData.append('LightSaturationPoint',this.CropData.LightSaturationPoint);
            formData.append('LightCompensationPoint',this.CropData.LightCompensationPoint);
            formData.append('Temperatureadaptability',this.CropData.Temperatureadaptability);
            formData.append('LowestGrowthTemperature',this.CropData.LowestGrowthTemperature);
            formData.append('OptimalGrowthTemperature',this.CropData.OptimalGrowthTemperature);
            formData.append('HighestGrowthTemperature',this.CropData.HighestGrowthTemperature);
            formData.append('LowestGerminationTemperature',this.CropData.LowestGerminationTemperature);
            formData.append('OptimumGerminationTemperature',this.CropData.OptimumGerminationTemperature);
            formData.append('HighestGerminationTemperature',this.CropData.HighestGerminationTemperature);
            formData.append('CO2IncreasedProductionRate',this.CropData.CO2IncreasedProductionRate);

            try{
                const response = await CropService.createCrop(formData);
                this.CropSelect.unshift(response.data); // 將新增的資料馬上顯示
                this.flashMessage.success({
                    message: '作物資訊 寫入成功!!',
                    time: 3000
                });
                this.CropData = {
                    id: null,
                    Expert:this.$auth.user().id,
                    classification: null,
                    VegetableTypes: '',
                    Goodlight: null,
                    Photoperiod: null,
                    Illuminance: null,
                    PPFD: null,
                    LightSaturationPoint: '',
                    LightCompensationPoint: '',
                    Temperatureadaptability: null,
                    LowestGrowthTemperature: '',
                    OptimalGrowthTemperature: '',
                    HighestGrowthTemperature: '',
                    LowestGerminationTemperature: '',
                    OptimumGerminationTemperature: '',
                    HighestGerminationTemperature: '',
                    CO2IncreasedProductionRate: '',
                };

                const Vegetable = await fetch('/VegetableJSON',  {
                    method: 'GET',
                });
                this.vegetablejson = await Vegetable.json();

            } catch (error){

                switch (error.response.status) {
                    case 422:
                        this.errors = error.response.data.errors;
                        break;
                    default:
                        this.flashMessage.error({
                            message: '作物資訊 寫入有錯誤發生!!',
                            time: 5000
                        });
                        break;
                }
            }
        },
        deleteCrop: async function(DeleteId){    // 刪除作物資料 函式呼叫
            var DeleteData = [];

            for(var i = 0 ; i < this.vegetablejson.length ; i++){
                if(this.vegetablejson[i].id == DeleteId){
                    DeleteData = this.vegetablejson[i];
                }
            }

            if(!window.confirm(`你確定要刪除 ${DeleteData.Expert} 的 ${DeleteData.VegetableTypes} 嗎?`)){
                return;
            }

            try {
                // 呼叫 crop_service.js 的 deleteCrop
                await CropService.deleteCrop(DeleteId);
                // this.getJson(); // 刪除資料後，馬上更新顯示的資料
                // 刪除資料後，馬上更新顯示的資料
                this.CropSelect = this.CropSelect.filter(obj =>{
                    return obj.id != DeleteData.id;
                });

                // 作物資訊資料表
                const Vegetable = await fetch('/VegetableJSON',  {
                    method: 'GET',
                });
                this.vegetablejson = await Vegetable.json();

                // 刪除成功的提示視窗
                this.flashMessage.success({
                    message: '作物 資料刪除成功!!',
                    time: 3000
                });

            } catch (error) {
                // 刪除失敗的提示視窗
                this.flashMessage.error({
                    message: error.response.data.message,
                    time: 5000
                });
            }
        },
        hideEditCropModal(){    // 隱藏編輯表單
            this.$refs.EditCropModal.hide();
        },
        showEditCropModal(){    // 顯示編輯表單
            this.$refs.EditCropModal.show();
        },
        EditCrop(CropData){     // 複製所選要編輯的作物資料
            this.EditCropData = {...CropData};
            this.showEditCropModal();
        },
        UpdateCrop:async function(){    // 編輯作物資料 函式呼叫
            try {
                let formData = new FormData();
                // console.log("this.EditCropData");
                // console.log(this.EditCropData);

                formData.append('id',this.EditCropData.id);
                formData.append('Expert',this.EditCropData.Expert);
                formData.append('classification',this.EditCropData.classification);
                formData.append('VegetableTypes',this.EditCropData.VegetableTypes);
                formData.append('Goodlight',this.EditCropData.Goodlight);
                formData.append('Photoperiod',this.EditCropData.Photoperiod);
                formData.append('Illuminance',this.EditCropData.Illuminance);
                formData.append('PPFD',this.EditCropData.PPFD);
                formData.append('LightSaturationPoint',this.EditCropData.LightSaturationPoint);
                formData.append('LightCompensationPoint',this.EditCropData.LightCompensationPoint);
                formData.append('Temperatureadaptability',this.EditCropData.Temperatureadaptability);
                formData.append('LowestGrowthTemperature',this.EditCropData.LowestGrowthTemperature);
                formData.append('OptimalGrowthTemperature',this.EditCropData.OptimalGrowthTemperature);
                formData.append('HighestGrowthTemperature',this.EditCropData.HighestGrowthTemperature);
                formData.append('LowestGerminationTemperature',this.EditCropData.LowestGerminationTemperature);
                formData.append('OptimumGerminationTemperature',this.EditCropData.OptimumGerminationTemperature);
                formData.append('HighestGerminationTemperature',this.EditCropData.HighestGerminationTemperature);
                formData.append('CO2IncreasedProductionRate',this.EditCropData.CO2IncreasedProductionRate);
                formData.append('_method','put');
                // 呼叫 crop_service.js 的 UpdateCrop
                const response = await CropService.UpdateCrop(this.EditCropData, formData);

                // 讓在完成更新後，可以即時更改顯示
                this.CropSelect.map(Cropdata => {
                    // console.log("-----Cropdata-----");
                    // console.log(Cropdata);
                    // console.log("-----response.data-----");
                    // console.log(response.data);

                    if(Cropdata.id == response.data.id){
                        Cropdata.Expert = response.data.Expert;
                        Cropdata.classification = response.data.classification;
                        Cropdata.VegetableTypes = response.data.VegetableTypes;
                        Cropdata.Goodlight = response.data.Goodlight;
                        Cropdata.Photoperiod = response.data.Photoperiod;
                        Cropdata.Illuminance = response.data.Illuminance;
                        Cropdata.PPFD = response.data.PPFD;
                        Cropdata.LightSaturationPoint = response.data.LightSaturationPoint;
                        Cropdata.LightCompensationPoint = response.data.LightCompensationPoint;
                        Cropdata.Temperatureadaptability = response.data.Temperatureadaptability;
                        Cropdata.LowestGrowthTemperature = response.data.LowestGrowthTemperature;
                        Cropdata.OptimalGrowthTemperature = response.data.OptimalGrowthTemperature;
                        Cropdata.HighestGrowthTemperature = response.data.HighestGrowthTemperature;
                        Cropdata.LowestGerminationTemperature = response.data.LowestGerminationTemperature;
                        Cropdata.OptimumGerminationTemperature = response.data.OptimumGerminationTemperature;
                        Cropdata.HighestGerminationTemperature = response.data.HighestGerminationTemperature;
                        Cropdata.CO2IncreasedProductionRate = response.data.CO2IncreasedProductionRate;
                    }
                });
                this.hideEditCropModal(); // 讓按下儲存時，隱藏表單


                this.flashMessage.success({
                    message: '作物 資料更新成功!!',
                    time: 3000
                });

                const Vegetable = await fetch('/VegetableJSON',  {
                    method: 'GET',
                });
                this.vegetablejson = await Vegetable.json();

            } catch (error) {
                this.flashMessage.error({
                    message: error.response.data.message,
                    time: 5000
                });
            }
        },
    },
}
</script>
