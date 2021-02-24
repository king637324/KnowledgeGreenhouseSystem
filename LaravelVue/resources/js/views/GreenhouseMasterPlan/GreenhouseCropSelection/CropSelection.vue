<template>
    <div>
        <br>
        <h2>溫室作物選擇</h2>
        <hr>
        <div class="d-flex justify-content-center">
        <div class="p-1 bd-highlight"></div>
        <div class="p-4 bd-highlight">
            <h6>新增農業作物資料請新增在此</h6>
            <v-form v-on:submit.prevent="createCrop" v-model="valid">
                <v-container
                    fluid
                >
                    <v-row>
                        <v-col>
                            <v-text-field
                                v-model="CropData.classification"
                                :rules="CropRules"
                                label="作物分類"
                                required
                            ></v-text-field>
                        </v-col>
                        <v-col>
                            <v-text-field
                                v-model="CropData.VegetableTypes"
                                :rules="CropRules"
                                label="作物種類"
                                required
                            ></v-text-field>
                        </v-col>
                        <v-col>
                            <v-text-field
                                v-model="CropData.Goodlight"
                                :rules="CropRules"
                                label="好光性"
                                required
                            ></v-text-field>
                        </v-col>
                        <v-col>
                            <v-text-field
                                v-model="CropData.Photoperiod"
                                :rules="CropRules"
                                label="光週期"
                                required
                            ></v-text-field>
                        </v-col>
                        <v-col>
                            <v-text-field
                                v-model="CropData.Illuminance"
                                :rules="CropRules"
                                label="光照度"
                                required
                            ></v-text-field>
                        </v-col>
                        <v-col>
                            <v-text-field
                                v-model="CropData.PPFD"
                                :rules="CropRules"
                                label="PPFD"
                                required
                            ></v-text-field>
                        </v-col>
                        <v-col>
                            <v-text-field
                                v-model="CropData.LightSaturationPoint"
                                :rules="CropRules"
                                label="光飽和點(klx)"
                                required
                            ></v-text-field>
                        </v-col>
                        <v-col>
                            <v-text-field
                                v-model="CropData.LightCompensationPoint"
                                :rules="CropRules"
                                label="光補償點(klx)"
                                required
                            ></v-text-field>
                        </v-col>
                        <v-col>
                            <v-text-field
                                v-model="CropData.Temperatureadaptability"
                                :rules="CropRules"
                                label="溫度適應性"
                                required
                            ></v-text-field>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col>
                            <v-text-field
                                v-model="CropData.LowestGrowthTemperature"
                                :rules="CropRules"
                                label="生長溫度最低溫"
                                required
                            ></v-text-field>
                        </v-col>
                        <v-col>
                            <v-text-field
                                v-model="CropData.OptimalGrowthTemperature"
                                :rules="CropRules"
                                label="生長溫度最適溫"
                                required
                            ></v-text-field>
                        </v-col>
                        <v-col>
                            <v-text-field
                                v-model="CropData.HighestGrowthTemperature"
                                :rules="CropRules"
                                label="生長溫度最高溫"
                                required
                            ></v-text-field>
                        </v-col>
                        <v-col>
                            <v-text-field
                                v-model="CropData.LowestGerminationTemperature"
                                :rules="CropRules"
                                label="發芽溫度最低溫"
                                required
                            ></v-text-field>
                        </v-col>
                        <v-col>
                            <v-text-field
                                v-model="CropData.OptimumGerminationTemperature"
                                :rules="CropRules"
                                label="發芽溫度最適溫"
                                required
                            ></v-text-field>
                        </v-col>
                        <v-col>
                            <v-text-field
                                v-model="CropData.HighestGerminationTemperature"
                                :rules="CropRules"
                                label="發芽溫度最高溫"
                                required
                            ></v-text-field>
                        </v-col>
                        <v-col>
                            <v-text-field
                                v-model="CropData.CO2IncreasedProductionRate"
                                :rules="CropRules"
                                label="CO₂增產率"
                                required
                            ></v-text-field>
                        </v-col>
                        <v-col>
                        </v-col>
                        <v-col>
                            <button type="submit" class="btn btn-primary"><span class="fa fa-check"></span>新增 </button>
                        </v-col>
                    </v-row>
                </v-container>
            </v-form>

            <br>


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
                </tr>
            </table>
        </div>
        <div class="p-1 bd-highlight"></div>
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
                classification: '',
                VegetableTypes: '',
                Goodlight: '',
                Photoperiod: '',
                Illuminance: '',
                PPFD: '',
                LightSaturationPoint: '',
                LightCompensationPoint: '',
                Temperatureadaptability: '',
                LowestGrowthTemperature: '',
                OptimalGrowthTemperature: '',
                HighestGrowthTemperature: '',
                LowestGerminationTemperature: '',
                OptimumGerminationTemperature: '',
                HighestGerminationTemperature: '',
                CO2IncreasedProductionRate: '',
            },

        }
    },
    created:function(){  // 網頁載入時，一開始就載入
        this.getJson();
    },
    methods: {
        async getJson(){
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
        createCrop(){
            console.log("在createCrop裡面");
            // let formData = new FormData();
            // formData.append('name',this.categoryData.name);
            // formData.append('mail',this.categoryData.mail);
            // formData.append('password',this.categoryData.password);
            // formData.append('abc',this.categoryData.abc);
            // formData.append('image',this.categoryData.image);
            // try{
            //     const response = await categoryService.createCategory(formData);
            //     this.categories.unshift(response.data); // 將新增的資料馬上顯示
            //     this.hideNewCategoryModal(); // 讓按下儲存時，隱藏表單
            //     this.flashMessage.success({
            //         message: 'test 資料寫入成功!!',
            //         time: 3000
            //     });
            //     this.categoryData = {
            //         name:'',
            //         mail:'',
            //         password:'',
            //         abc:'',
            //         image:''
            //     };
            // } catch (error){

            //     switch (error.response.status) {
            //         case 422:
            //             this.errors = error.response.data.errors;
            //             break;
            //         default:
            //             this.flashMessage.error({
            //                 message: 'test 資料寫入有錯誤發生!!',
            //                 time: 5000
            //             });
            //             break;
            //     }
            // }
        },
    },
}
</script>
