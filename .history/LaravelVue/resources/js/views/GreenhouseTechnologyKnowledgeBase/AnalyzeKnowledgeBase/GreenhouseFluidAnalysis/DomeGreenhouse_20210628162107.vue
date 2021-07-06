<template>
    <div>
        <br>
        <h3>
            <img src ="/images/GreenhouseDesigner/圓頂溫室.png" class="table-image"/>
            圓頂溫室(UBP) 、 圓頂力霸溫室(UTP)
        </h3>
        <div style="min-width: 135vmin; max-width: 100%; overflow-x: scroll;">
            <table class="table" align="center" style="border:1px solid #dee2e6;" border='1'>
                <thead align="center" class="table-active">
                    <tr>
                        <td>溫室代號</td>
                        <td>風向</td>
                        <td>風速(m/s)</td>
                        <td>寬度w(m)</td>
                        <td>弦高s(m)</td>
                        <td>柱高t(m)</td>
                        <td>平均風壓a(Pa)</td>
                        <td>平均風壓b(Pa)</td>
                        <td>平均風壓c(Pa)</td>
                        <td>平均風壓d(Pa)</td>
                        <td>平均風壓e(Pa)</td>
                        <td>平均風壓f(Pa)</td>
                        <td>平均風壓g(Pa)</td>
                        <td>平均風壓h(Pa)</td>
                        <td>最大風速(m/s)</td>
                        <td>風壓圖a</td>
                        <td>風壓圖b~g</td>
                        <td>風壓圖h</td>
                        <td>風場圖</td>
                    </tr>
                </thead>
                <tbody align="center">
                    <tr v-for="(dome, index) in DomeData" :key="index">
                        <td>{{dome[1][0].GreenhouseId}}</td>
                        <td>{{dome[1][0].WindDirection}}</td>
                        <td>{{dome[1][0].WindSpeed}}</td>
                        <td> {{dome[2]}} </td>
                        <td> {{dome[4]}} </td>
                        <td> {{dome[3]}} </td>
                        <td> {{dome[1][0].AverageWindPressure_a}} </td>
                        <td> {{dome[1][0].AverageWindPressure_b}} </td>
                        <td> {{dome[1][0].AverageWindPressure_c}} </td>
                        <td> {{dome[1][0].AverageWindPressure_d}} </td>
                        <td> {{dome[1][0].AverageWindPressure_e}} </td>
                        <td> {{dome[1][0].AverageWindPressure_f}} </td>
                        <td> {{dome[1][0].AverageWindPressure_g}} </td>
                        <td> {{dome[1][0].AverageWindPressure_h}} </td>
                        <td> {{dome[1][0].MaxWindSpeed}} </td>
                        <td>
                            <img :src ="dome[1][0].WindPressureChart_1 " class="table-image"/>
                        </td>
                        <td>
                            <img :src ="dome[1][0].WindPressureChart_2 " class="table-image"/>
                        </td>
                        <td>
                            <img :src ="dome[1][0].WindPressureChart_3 " class="table-image"/>
                        </td>
                        <td>
                            <img :src ="dome[1][0].WindFieldMap " class="table-image"/>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


    </div>

</template>

<script>
export default {
    data(){
        return{
            Fluidjson: [],
            DomeData:[],
        }
    },
    created:function(){  // 網頁載入時，一開始就載入
        this.getJson();
    },
    methods:{
        async getJson(){    //取的資料庫資料，將資料轉成JSON
            const res = await fetch('/FluidAnalysisJSON',  {
                method: 'GET',
            });

            this.Fluidjson = await res.json();

            for(var i=0; i<this.Fluidjson.length ; i++){
                if(this.Fluidjson[i][0][0].GreenhouseType == "圓頂溫室"){
                    this.DomeData.push(this.Fluidjson[i]);
                }
            }
        }
    }
}

</script>
