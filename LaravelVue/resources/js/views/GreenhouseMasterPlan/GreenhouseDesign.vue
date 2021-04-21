<template>
    <div>
        <br>
        <h3 id="溫室設計">
            溫室設計
            <!-- <button  class="btn btn-primary" v-scroll-to="{ el: '#綜合分析' }">
                綜合分析
            </button> -->
        </h3>
        <hr>

        <div class="d-flex flex-row bd-highlight mb-3">
            <div class="p-2 bd-highlight" style='border-right:1px solid LightGray'>
                <h3>
                    <img src ="/images/GreenhouseDesigner/簡易溫室.png" class="table-image"/>
                    簡易溫室(UP)
                </h3>
                <input type="checkbox" id="UP540_185" value="UP540_185" v-model="checkedNames" v-on:change="updateChart">
                <label>UP540_185</label>
                <input type="checkbox" id="UP600_205" value="UP600_205" v-model="checkedNames" v-on:change="updateChart">
                <label>UP600_205</label>
                <input type="checkbox" id="UP720_180" value="UP720_180" v-model="checkedNames" v-on:change="updateChart">
                <label>UP720_180</label>
                <br>
                <input type="checkbox" id="UP720_400" value="UP720_400" v-model="checkedNames" v-on:change="updateChart">
                <label>UP720_400</label>
                <input type="checkbox" id="UP800_400" value="UP800_400" v-model="checkedNames" v-on:change="updateChart">
                <label>UP800_400</label>
                <input type="checkbox" id="UP800_500" value="UP800_500" v-model="checkedNames" v-on:change="updateChart">
                <label>UP800_500</label>

                <h3>
                    <img src ="/images/GreenhouseDesigner/圓頂溫室.png" class="table-image"/>
                    圓頂溫室(UBP)
                </h3>
                <input type="checkbox" id="UBP520_300" value="UBP520_300" v-model="checkedNames" v-on:change="updateChart">
                <label>UBP520_300</label>
                <input type="checkbox" id="UBP620_300" value="UBP620_300" v-model="checkedNames" v-on:change="updateChart">
                <label>UBP620_300</label>
                <input type="checkbox" id="UBP680_300" value="UBP680_300" v-model="checkedNames" v-on:change="updateChart">
                <label>UBP680_300</label>
                <input type="checkbox" id="UBP680_350" value="UBP680_350" v-model="checkedNames" v-on:change="updateChart">
                <label>UBP680_350</label>

                <h3>
                    <img src ="/images/GreenhouseDesigner/圓頂溫室.png" class="table-image"/>
                    圓頂力霸溫室(UTP)
                </h3>
                <input type="checkbox" id="UTP960_350" value="UTP960_350" v-model="checkedNames" v-on:change="updateChart">
                <label>UTP960_350</label>
                <input type="checkbox" id="UTP1040_350" value="UTP1040_350" v-model="checkedNames" v-on:change="updateChart">
                <label>UTP1040_350</label>
                <input type="checkbox" id="UTP1140_350" value="UTP1140_350" v-model="checkedNames" v-on:change="updateChart">
                <label>UTP1140_350</label>
                <input type="checkbox" id="UTP1140_400" value="UTP1140_400" v-model="checkedNames" v-on:change="updateChart">
                <label>UTP1140_400</label>
            </div>
            <div class="p-2 bd-highlight" style='border-right:1px solid LightGray'>
                <h3>
                    <img src ="/images/GreenhouseDesigner/斜頂溫室.png" class="table-image"/>
                    斜頂溫室(SP)
                </h3>
                <input type="checkbox" id="SP1100_12" value="SP1100_12" v-model="checkedNames" v-on:change="updateChart">
                <label>SP1100_12</label>
                <input type="checkbox" id="SP1100_20" value="SP1100_20" v-model="checkedNames" v-on:change="updateChart">
                <label>SP1100_20</label>
                <input type="checkbox" id="SP1100_23" value="SP1100_23" v-model="checkedNames" v-on:change="updateChart">
                <label>SP1100_23</label>
                <input type="checkbox" id="SP1100_30" value="SP1100_30" v-model="checkedNames" v-on:change="updateChart">
                <label>SP1100_30</label>

                <h3>
                    <img src ="/images/GreenhouseDesigner/2連棟山型溫室.png" class="table-image"/>
                    Velno溫室(WTG-640系列)
                </h3>
                <input type="checkbox" id="WTG640_300" value="WTG640_300" v-model="checkedNames" v-on:change="updateChart">
                <label>WTG640_300</label>
                <input type="checkbox" id="WTG640_350" value="WTG640_350" v-model="checkedNames" v-on:change="updateChart">
                <label>WTG640_350</label>
                <input type="checkbox" id="WTG640_400" value="WTG640_400" v-model="checkedNames" v-on:change="updateChart">
                <label>WTG640_400</label>

                <h3>
                    <img src ="/images/GreenhouseDesigner/3連棟山型溫室.png" class="table-image"/>
                    Velno溫室(WTG-960系列)
                </h3>
                <input type="checkbox" id="WTG960_300" value="WTG960_300" v-model="checkedNames" v-on:change="updateChart">
                <label>WTG960_300</label>
                <input type="checkbox" id="WTG960_350" value="WTG960_350" v-model="checkedNames" v-on:change="updateChart">
                <label>WTG960_350</label>
                <input type="checkbox" id="WTG960_400" value="WTG960_400" v-model="checkedNames" v-on:change="updateChart">
                <label>WTG960_400</label>
            </div>

            <div class="p-2 bd-highlight">
                <h3>
                    <img src ="/images/GreenhouseDesigner/2連棟山型溫室.png" class="table-image"/>
                    山型溫室(VBP)
                </h3>
                <input type="checkbox" id="VBP820_300" value="VBP820_300" v-model="checkedNames" v-on:change="updateChart">
                <label>VBP820_300</label>
                <input type="checkbox" id="VBP860_300" value="VBP860_300" v-model="checkedNames" v-on:change="updateChart">
                <label>VBP860_300</label>
                <input type="checkbox" id="VBP860_350" value="VBP860_350" v-model="checkedNames" v-on:change="updateChart">
                <label>VBP860_350</label>

                <h3>
                    <img src ="/images/GreenhouseDesigner/3連棟山型溫室.png" class="table-image"/>
                    山型力霸溫室(VTP)
                </h3>
                <input type="checkbox" id="VTP800_400" value="VTP800_400" v-model="checkedNames" v-on:change="updateChart">
                <label>VTP800_400</label>
                <input type="checkbox" id="VTP800_450" value="VTP800_450" v-model="checkedNames" v-on:change="updateChart">
                <label>VTP800_450</label>
                <input type="checkbox" id="VTP800_500" value="VTP800_500" v-model="checkedNames" v-on:change="updateChart">
                <label>VTP800_500</label>

                <br><br><br><br><br>
                <button type="button" class="btn btn-secondary" @click="selectAll">全部勾選</button>
                <button type="button" class="btn btn-danger"  @click="ChartClear">清空勾選</button>
            </div>

        </div>

        <div style="min-width: 135vmin; max-width: 100%; overflow-x: scroll;">
            <table class="table" align="center" style="border:1px solid #dee2e6;" border='1' >
                <thead align="center" class="table-active">
                    <tr>
                        <td>溫室代號</td>
                        <td>風向</td>
                        <td>風速(m/s)</td>
                        <td>屋斜角α</td>
                        <td>肩高h(m)</td>
                        <td>跨距w(m)</td>
                        <td>寬度w(m)</td>
                        <td>棟高h(m)</td>
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
                        <td>風壓圖1</td>
                        <td>風壓圖2</td>
                        <td>風壓圖3</td>
                        <td>風場圖</td>
                    </tr>
                </thead>
                <tbody align="center">
                    <tr v-for="(data, index) in checkData" :key="index">
                        <td>{{data[1][0].GreenhouseId}}</td>
                        <td>{{data[1][0].WindDirection}}</td>
                        <td>{{data[1][0].WindSpeed}}</td>
                        <td> {{data[6]}} </td>
                        <td> {{data[7]}} </td>
                        <td> {{data[8]}} </td>
                        <td> {{data[2]}} </td>
                        <td> {{data[5]}} </td>
                        <td> {{data[4]}} </td>
                        <td> {{data[3]}} </td>
                        <td> {{data[1][0].AverageWindPressure_a}} </td>
                        <td> {{data[1][0].AverageWindPressure_b}} </td>
                        <td> {{data[1][0].AverageWindPressure_c}} </td>
                        <td> {{data[1][0].AverageWindPressure_d}} </td>
                        <td> {{data[1][0].AverageWindPressure_e}} </td>
                        <td> {{data[1][0].AverageWindPressure_f}} </td>
                        <td> {{data[1][0].AverageWindPressure_g}} </td>
                        <td> {{data[1][0].AverageWindPressure_h}} </td>
                        <td> {{data[1][0].MaxWindSpeed}} </td>
                        <td>
                            <img :src ="data[1][0].WindPressureChart_1 " class="table-image"/>
                        </td>
                        <td>
                            <img :src ="data[1][0].WindPressureChart_2 " class="table-image"/>
                        </td>
                        <td>
                            <img :src ="data[1][0].WindPressureChart_3 " class="table-image"/>
                        </td>
                        <td>
                            <img :src ="data[1][0].WindFieldMap " class="table-image"/>
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
            checkData:[],
            checkedNames: [],
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

        },updateChart(){
            var DataChart=[];
            for(var i=0; i<this.Fluidjson.length ; i++){
                for(var j=0;j<this.checkedNames.length;j++){
                    if(this.checkedNames[j]==this.Fluidjson[i][1][0].GreenhouseId){
                        DataChart.push(this.Fluidjson[i]);
                    }
                }
            }
            this.checkData = DataChart;
        },selectAll(){  // 全部勾選
            if(this.checkedNames.length != 30){
                this.checkedNames = [];
                for(var i=0; i<this.Fluidjson.length ; i++){
                    this.checkedNames.push(this.Fluidjson[i][1][0].GreenhouseId);
                    this.checkData.push(this.Fluidjson[i]);
                }
            }
        }, ChartClear(){    // 清除勾選
            this.checkedNames = [];
            this.checkData = [];

        }
    }
}

</script>