<template>
    <div>
        <b-tabs content-class="mt-3">
            <b-tab title="First" active >

            </b-tab>
            <b-tab title="簡易溫室">
                <!-- <table class="table" align="center">
                    <thead align="center">
                        <tr>
                            <td>溫室代號</td>
                            <td>風向</td>
                            <td>風速(m/s)</td>
                            <td>圖示</td>
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
                            <td>
                                <img :src ="simple[0][0].Icon " class="table-image" width="150"/>
                            </td>
                            <td> {{simple[2]}} </td>
                            <td> {{simple[5]}} </td>
                            <td> {{simple[3]}} </td>
                            <td> {{simple[1][0].AverageWindPressure_a}} </td>
                            <td> {{simple[1][0].AverageWindPressure_b}} </td>
                            <td> {{simple[1][0].AverageWindPressure_c}} </td>
                            <td> {{simple[1][0].AverageWindPressure_d}} </td>
                            <td> {{simple[1][0].MaxWindSpeed}} </td>
                            <td>
                                <img :src ="simple[1][0].WindPressureChart_1 " class="table-image" width="150"/>
                            </td>
                            <td>
                                <img :src ="simple[1][0].WindPressureChart_2 " class="table-image" width="230"/>
                            </td>
                            <td>
                                <img :src ="simple[1][0].WindPressureChart_3 " class="table-image" width="150"/>
                            </td>
                            <td>
                                <img :src ="simple[1][0].WindFieldMap " class="table-image" width="150"/>
                            </td>
                        </tr>
                    </tbody>
                </table> -->
            </b-tab>
        </b-tabs>

        <button type="submit" class="btn btn-primary" v-on:click="callSimpleTable"><span class="fa fa-check"></span>查詢</button>
        <!-- <b-table striped hover :items="SimpleData" :fields="fields"></b-table> -->

        <table class="table" align="center">
            <thead align="center">
                <tr>
                    <td>溫室代號</td>
                    <td>風向</td>
                    <td>風速(m/s)</td>
                    <td>圖示</td>
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
                    <td>
                        <img :src ="simple[0][0].Icon " class="table-image" width="150"/>
                    </td>
                    <td> {{simple[2]}} </td>
                    <td> {{simple[5]}} </td>
                    <td> {{simple[3]}} </td>
                    <td> {{simple[1][0].AverageWindPressure_a}} </td>
                    <td> {{simple[1][0].AverageWindPressure_b}} </td>
                    <td> {{simple[1][0].AverageWindPressure_c}} </td>
                    <td> {{simple[1][0].AverageWindPressure_d}} </td>
                    <td> {{simple[1][0].MaxWindSpeed}} </td>
                    <td>
                        <img :src ="simple[1][0].WindPressureChart_1 " class="table-image" width="150"/>
                    </td>
                    <td>
                        <img :src ="simple[1][0].WindPressureChart_2 " class="table-image" width="230"/>
                    </td>
                    <td>
                        <img :src ="simple[1][0].WindPressureChart_3 " class="table-image" width="150"/>
                    </td>
                    <td>
                        <img :src ="simple[1][0].WindFieldMap " class="table-image" width="150"/>
                    </td>
                </tr>
            </tbody>
        </table>


    </div>

</template>

<script>
import axios from 'axios'


export default {
    data(){
        return{
            Fluidjson: [],
            SimpleData:[],
            // count:"500",
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

            var simple=[];
            console.log(this.Fluidjson);
            for(var i=0; i<this.Fluidjson.length ; i++){
                if(this.Fluidjson[i][0][0].GreenhouseType == "簡易溫室"){
                    simple.push(this.Fluidjson[i]);
                }
            }
            this.SimpleData = simple;

        },
        callSimpleTable(){

            var simple=[];
            console.log(this.Fluidjson);
            for(var i=0; i<this.Fluidjson.length ; i++){
                if(this.Fluidjson[i][0][0].GreenhouseType == "簡易溫室"){
                    simple.push(this.Fluidjson[i]);
                }
            }
            this.SimpleData = simple;
        },
    }
}

</script>
