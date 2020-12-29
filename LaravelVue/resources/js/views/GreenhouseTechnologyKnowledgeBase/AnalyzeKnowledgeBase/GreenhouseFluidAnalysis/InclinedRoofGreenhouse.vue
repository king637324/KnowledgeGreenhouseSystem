<template>
    <div>
        <br>
        <h3>
            <img src ="/images/GreenhouseDesigner/斜頂溫室.png" class="table-image" width="150"/>
            斜頂溫室(SP)
        </h3>

        <table class="table" align="center">
            <thead align="center">
                <tr>
                    <td>溫室代號</td>
                    <td>風向</td>
                    <td>風速(m/s)</td>
                    <td>屋斜角α</td>
                    <td>肩高h(m)</td>
                    <td>跨距w(m)</td>
                    <td>平均風壓a(Pa)</td>
                    <td>平均風壓b(Pa)</td>
                    <td>平均風壓c(Pa)</td>
                    <td>最大風速(m/s)</td>
                    <td>風壓圖a</td>
                    <td>風壓圖b</td>
                    <td>風壓圖c</td>
                    <td>風場圖</td>
                </tr>
            </thead>
            <tbody align="center">
                <tr v-for="(InclinedRoof, index) in InclinedRoofData" :key="index">
                    <td>{{InclinedRoof[1][0].GreenhouseId}}</td>
                    <td>{{InclinedRoof[1][0].WindDirection}}</td>
                    <td>{{InclinedRoof[1][0].WindSpeed}}</td>
                    <td> {{InclinedRoof[6]}} </td>
                    <td> {{InclinedRoof[7]}} </td>
                    <td> {{InclinedRoof[8]}} </td>
                    <td> {{InclinedRoof[1][0].AverageWindPressure_a}} </td>
                    <td> {{InclinedRoof[1][0].AverageWindPressure_b}} </td>
                    <td> {{InclinedRoof[1][0].AverageWindPressure_c}} </td>
                    <td> {{InclinedRoof[1][0].MaxWindSpeed}} </td>
                    <td>
                        <img :src ="InclinedRoof[1][0].WindPressureChart_1 " class="table-image" width="150"/>
                    </td>
                    <td>
                        <img :src ="InclinedRoof[1][0].WindPressureChart_2 " class="table-image" width="230"/>
                    </td>
                    <td>
                        <img :src ="InclinedRoof[1][0].WindPressureChart_3 " class="table-image" width="150"/>
                    </td>
                    <td>
                        <img :src ="InclinedRoof[1][0].WindFieldMap " class="table-image" width="150"/>
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
            InclinedRoofData:[],
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
            var InclinedRoof=[];
            for(var i=0; i<this.Fluidjson.length ; i++){
                if(this.Fluidjson[i][0][0].GreenhouseType == "斜頂溫室"){
                    InclinedRoof.push(this.Fluidjson[i]);
                }
            }
            this.InclinedRoofData = InclinedRoof;
        }
    }
}

</script>
