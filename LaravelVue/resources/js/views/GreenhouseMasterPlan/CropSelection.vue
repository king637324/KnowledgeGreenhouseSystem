<template>
    <div>
        <br>
        <h2>溫室作物選擇</h2>
        <hr>
        <div class="d-flex justify-content-center">
        <div class="p-1 bd-highlight"></div>
        <div class="p-4 bd-highlight">
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

export default {
    data() {
        return {
            tabIndex: 0,
            vegetablejson:[],
            CropSelect:[], // 顯示 作物的資料

            CropOrder:["==請選擇作物分類==","根菜","莖菜","葉菜","花菜","果菜","糧食","水果","花"], // 作物分類的選單陣列表
            cropIdx: 0, // 所選作物的id
            selectCrop: null, // 所選作物的名稱
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

            this.CropSelect = this.vegetablejson;

        },
        updateCropTable(){
            // 從所選的作物id 找到 所選作物分類
            for(var i = 0 ; i < this.CropOrder.length ; i++){
                if(i == this.cropIdx)    this.selectCrop = this.CropOrder[i];
            }

            this.CropSelect = [];  // 作物資料初始化
            for(var i = 0 ; i < this.vegetablejson.length ; i++){
                if(this.selectCrop == "==請選擇作物分類==") this.CropSelect = this.vegetablejson;
                if(this.vegetablejson[i].classification == this.selectCrop)    this.CropSelect.push(this.vegetablejson[i]);
            }

        }
    },
}
</script>
