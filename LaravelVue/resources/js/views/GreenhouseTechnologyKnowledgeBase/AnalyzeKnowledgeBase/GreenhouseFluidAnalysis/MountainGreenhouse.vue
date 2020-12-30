<template>
    <div>
        <br>
        <h3>
            <img src ="/images/GreenhouseDesigner/2連棟山型溫室.png" class="table-image" width="150"/>
            山型溫室(VBP)、Velno溫室(WTG-640系列)
            <img src ="/images/GreenhouseDesigner/3連棟山型溫室.png" class="table-image" width="150"/>
            Velno溫室(WTG-960系列)、山型力霸溫室(VTP)
        </h3>

        <table class="table" align="center">
            <thead align="center">
                <tr>
                    <td>溫室代號</td>
                    <td>風向</td>
                    <td>風速(m/s)</td>
                    <td>寬度w(m)</td>
                    <td>棟高h(m)</td>
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
                    <td>風壓圖b</td>
                    <td>風壓圖c</td>
                    <td>風場圖</td>
                </tr>
            </thead>
            <tbody align="center">
                <tr v-for="(mountain, index) in MountainData" :key="index">
                    <td>{{mountain[1][0].GreenhouseId}}</td>
                    <td>{{mountain[1][0].WindDirection}}</td>
                    <td>{{mountain[1][0].WindSpeed}}</td>
                    <td> {{mountain[2]}} </td>
                    <td> {{mountain[5]}} </td>
                    <td> {{mountain[3]}} </td>
                    <td> {{mountain[1][0].AverageWindPressure_a}} </td>
                    <td> {{mountain[1][0].AverageWindPressure_b}} </td>
                    <td> {{mountain[1][0].AverageWindPressure_c}} </td>
                    <td> {{mountain[1][0].AverageWindPressure_d}} </td>
                    <td> {{mountain[1][0].AverageWindPressure_e}} </td>
                    <td> {{mountain[1][0].AverageWindPressure_f}} </td>
                    <td> {{mountain[1][0].AverageWindPressure_g}} </td>
                    <td> {{mountain[1][0].AverageWindPressure_h}} </td>
                    <td> {{mountain[1][0].MaxWindSpeed}} </td>
                    <td>
                        <img :src ="mountain[1][0].WindPressureChart_1 " class="table-image" width="150"/>
                    </td>
                    <td>
                        <img :src ="mountain[1][0].WindPressureChart_2 " class="table-image" width="230"/>
                    </td>
                    <td>
                        <img :src ="mountain[1][0].WindPressureChart_3 " class="table-image" width="150"/>
                    </td>
                    <td>
                        <img :src ="mountain[1][0].WindFieldMap " class="table-image" width="150"/>
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
            MountainData:[],
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
            // axios
            // .get('/FluidAnalysisJSON')
            // .then(response => (this.Fluidjson = response));

            var mountain=[];
            for(var i=0; i<this.Fluidjson.length ; i++){
                if(this.Fluidjson[i][0][0].GreenhouseType == "2連棟山型溫室" || this.Fluidjson[i][0][0].GreenhouseType == "3連棟山型溫室"){
                    mountain.push(this.Fluidjson[i]);
                }
            }
            this.MountainData = mountain;
        }
    }
}

</script>
