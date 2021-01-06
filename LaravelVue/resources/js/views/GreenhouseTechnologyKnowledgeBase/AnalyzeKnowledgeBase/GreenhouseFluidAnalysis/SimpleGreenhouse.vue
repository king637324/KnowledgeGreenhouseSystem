<template>
    <div>
        <br>
        <h3>
            <img src ="/images/GreenhouseDesigner/簡易溫室.png" class="table-image"/>
            簡易溫室(UP)
        </h3>
        <table class="table" align="center">
            <thead align="center">
                <tr>
                    <td>溫室代號</td>
                    <td>風向</td>
                    <td>風速(m/s)</td>
                    <td>寬度w(m)</td>
                    <td>棟高h(m)</td>
                    <td>平均風壓a(Pa)</td>
                    <td>平均風壓b(Pa)</td>
                    <td>平均風壓c(Pa)</td>
                    <td>平均風壓d(Pa)</td>
                    <td>最大風速(m/s)</td>
                    <td>風壓圖a</td>
                    <td>風壓圖b</td>
                    <td>風壓圖c</td>
                    <td>風壓圖d</td>
                    <td>風場圖</td>
                </tr>
            </thead>
            <tbody align="center">
                <tr v-for="(simple, index) in SimpleData" :key="index">
                    <td>{{simple[1][0].GreenhouseId}}</td>
                    <td>{{simple[1][0].WindDirection}}</td>
                    <td>{{simple[1][0].WindSpeed}}</td>
                    <td> {{simple[2]}} </td>
                    <td> {{simple[5]}} </td>
                    <td> {{simple[3]}} </td>
                    <td> {{simple[1][0].AverageWindPressure_a}} </td>
                    <td> {{simple[1][0].AverageWindPressure_b}} </td>
                    <td> {{simple[1][0].AverageWindPressure_c}} </td>
                    <td> {{simple[1][0].AverageWindPressure_d}} </td>
                    <td> {{simple[1][0].MaxWindSpeed}} </td>
                    <td>
                        <img :src ="simple[1][0].WindPressureChart_1 " class="table-image"/>
                    </td>
                    <td>
                        <img :src ="simple[1][0].WindPressureChart_2 " class="table-image"/>
                    </td>
                    <td>
                        <img :src ="simple[1][0].WindPressureChart_3 " class="table-image"/>
                    </td>
                    <td>
                        <img :src ="simple[1][0].WindFieldMap " class="table-image"/>
                    </td>
                </tr>
            </tbody>
        </table>


    </div>

</template>

<script>
export default {
    data(){
        return{
            Fluidjson: [],
            SimpleData:[],
        }
    },
    created:function(){  // 網頁載入時，一開始就載入
        this.getJson();
    },
    methods:{
        async getJson(){
            const res = await fetch('/FluidAnalysisJSON',  {
                method: 'GET',
            });

            this.Fluidjson = await res.json();

            for(var i=0; i<this.Fluidjson.length ; i++){
                if(this.Fluidjson[i][0][0].GreenhouseType == "簡易溫室"){
                    this.SimpleData.push(this.Fluidjson[i]);
                }
            }

        }
    }
}

</script>
