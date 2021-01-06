<template>
    <div>
        <br>
        <h2>溫室作物選擇</h2>
        <hr>
        <div class="d-flex justify-content-center">
        <div class="p-1 bd-highlight"></div>
        <div class="p-4 bd-highlight">
            <!-- <select v-model="cityIdx" v-on:change="updateCity">
                <option v-for="(data, index) in City" :value="index">
                    {{data}}
                </option>
            </select> -->
            <table style="border:1px solid black;" border='1'>
                <tr align="center">
                    <td rowspan="2" style='width:13vmin'> 蔬菜分類 </td>
                    <td rowspan="2" style='width:13vmin'> 蔬菜種類 </td>
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
                    <td> 最高溫 </td>
                    <td> 最適溫 </td>
                </tr>
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
                    <td> {{crop.HighestGerminationTemperature}} </td>
                    <td> {{crop.OptimumGerminationTemperature}} </td>
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
            CropSelect:[],
        }
    },
    created:function(){  // 網頁載入時，一開始就載入
        this.getJson();
    },
    methods: {
        async getJson(){
            // 風速對照表
            const Vegetable = await fetch('/VegetableJSON',  {
                method: 'GET',
            });
            this.vegetablejson = await Vegetable.json();

            console.log("-------vegetablejson------");
            console.log(this.vegetablejson);

            this.CropSelect = this.vegetablejson;


        },
    },
}
</script>
