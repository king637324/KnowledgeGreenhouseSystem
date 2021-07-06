<template>
    <div>
        <br>
        <h3>
            各種溫室型式的各受風面之風壓比較
        </h3>
        <hr>

        <div class="d-flex flex-row bd-highlight mb-3">
            <div class="p-2 bd-highlight" style='border-right:1px solid LightGray'>
                <h2>
                    <img src ="/images/GreenhouseDesigner/簡易溫室.png" class="table-image"/>
                    簡易溫室(UP)
                </h2>
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

                <h2>
                    <img src ="/images/GreenhouseDesigner/圓頂溫室.png" class="table-image"/>
                    圓頂溫室(UBP)
                </h2>
                <input type="checkbox" id="UBP520_300" value="UBP520_300" v-model="checkedNames" v-on:change="updateChart">
                <label>UBP520_300</label>
                <input type="checkbox" id="UBP620_300" value="UBP620_300" v-model="checkedNames" v-on:change="updateChart">
                <label>UBP620_300</label>
                <input type="checkbox" id="UBP680_300" value="UBP680_300" v-model="checkedNames" v-on:change="updateChart">
                <label>UBP680_300</label>
                <input type="checkbox" id="UBP680_350" value="UBP680_350" v-model="checkedNames" v-on:change="updateChart">
                <label>UBP680_350</label>

                <h2>
                    <img src ="/images/GreenhouseDesigner/圓頂溫室.png" class="table-image"/>
                    圓頂力霸溫室(UTP)
                </h2>
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
                <h2>
                    <img src ="/images/GreenhouseDesigner/斜頂溫室.png" class="table-image"/>
                    斜頂溫室(SP)
                </h2>
                <input type="checkbox" id="SP1100_12" value="SP1100_12" v-model="checkedNames" v-on:change="updateChart">
                <label>SP1100_12</label>
                <input type="checkbox" id="SP1100_20" value="SP1100_20" v-model="checkedNames" v-on:change="updateChart">
                <label>SP1100_20</label>
                <input type="checkbox" id="SP1100_23" value="SP1100_23" v-model="checkedNames" v-on:change="updateChart">
                <label>SP1100_23</label>
                <input type="checkbox" id="SP1100_30" value="SP1100_30" v-model="checkedNames" v-on:change="updateChart">
                <label>SP1100_30</label>

                <h2>
                    <img src ="/images/GreenhouseDesigner/2連棟山型溫室.png" class="table-image"/>
                    Velno溫室(WTG-640系列)
                </h2>
                <input type="checkbox" id="WTG640_300" value="WTG640_300" v-model="checkedNames" v-on:change="updateChart">
                <label>WTG640_300</label>
                <input type="checkbox" id="WTG640_350" value="WTG640_350" v-model="checkedNames" v-on:change="updateChart">
                <label>WTG640_350</label>
                <input type="checkbox" id="WTG640_400" value="WTG640_400" v-model="checkedNames" v-on:change="updateChart">
                <label>WTG640_400</label>

                <h2>
                    <img src ="/images/GreenhouseDesigner/3連棟山型溫室.png" class="table-image"/>
                    Velno溫室(WTG-960系列)
                </h2>
                <input type="checkbox" id="WTG960_300" value="WTG960_300" v-model="checkedNames" v-on:change="updateChart">
                <label>WTG960_300</label>
                <input type="checkbox" id="WTG960_350" value="WTG960_350" v-model="checkedNames" v-on:change="updateChart">
                <label>WTG960_350</label>
                <input type="checkbox" id="WTG960_400" value="WTG960_400" v-model="checkedNames" v-on:change="updateChart">
                <label>WTG960_400</label>
            </div>

            <div class="p-2 bd-highlight">
                <h2>
                    <img src ="/images/GreenhouseDesigner/2連棟山型溫室.png" class="table-image"/>
                    山型溫室(VBP)
                </h2>
                <input type="checkbox" id="VBP820_300" value="VBP820_300" v-model="checkedNames" v-on:change="updateChart">
                <label>VBP820_300</label>
                <input type="checkbox" id="VBP860_300" value="VBP860_300" v-model="checkedNames" v-on:change="updateChart">
                <label>VBP860_300</label>
                <input type="checkbox" id="VBP860_350" value="VBP860_350" v-model="checkedNames" v-on:change="updateChart">
                <label>VBP860_350</label>

                <h2>
                    <img src ="/images/GreenhouseDesigner/3連棟山型溫室.png" class="table-image"/>
                    山型力霸溫室(VTP)
                </h2>
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
        <!-- <span>Checked names: {{ checkedNames }}</span> -->
        <line-chart xtitle="區域(平均風壓)" ytitle="風壓值 (Pa)" :data="data" height="45vmin" download="型式風壓比較" :colors="['#3e95cd', '#8e5ea2', '#3cba9f', 'tomato', '#c45850', '#74AFA9', '#009FC7', '#668600', '#C08900', '#C96986', '#DE6948', '#9370DB', '#FF8C00', '#008080', '#1E90FF', '#40E0D0', 'hotpink', 'orchid', 'LightSalmon', 'SaddleBrown', 'GoldenRod', 'Gold', 'DarkKhaki', 'YellowGreen', 'DarkSeaGreen', 'LightSeaGreen', 'DeepSkyBlue', 'SteelBlue', 'CornflowerBlue', 'Khaki']" :curve="false"></line-chart>
    </div>
</template>
<script>



export default {
    data () {
        return {
            Fluidjson: [],
            checkedNames: [],
            data :[],
        }
    },
    created:function(){  // 網頁載入時，一開始就載入
        this.getJson();
    },
    methods:{
        async getJson(){    //取的資料庫資料，將資料轉成JSON
            const res = await fetch('/FluidAnalysisChartData',  {
                method: 'GET',
            });

            this.Fluidjson = await res.json();

        },updateChart(){    // 根據所勾選的資料，更新圖表的資料顯示
            var DataChart=[];
            for(var i=0; i<this.Fluidjson.length ; i++){
                for(var j=0;j<this.checkedNames.length;j++){
                    if(this.checkedNames[j]==this.Fluidjson[i].name){
                        DataChart.push(this.Fluidjson[i]);
                    }
                }
            }
            this.data = DataChart;

        },selectAll(){  // 全部勾選
            if(this.checkedNames.length != 30){
                this.checkedNames = [];
                for(var i=0; i<this.Fluidjson.length ; i++){
                    this.checkedNames.push(this.Fluidjson[i].name);
                    this.data.push(this.Fluidjson[i]);
                }
            }
        }, ChartClear(){    // 清除勾選
            this.checkedNames = [];
            this.data = [];

        }
    }
}

</script>
