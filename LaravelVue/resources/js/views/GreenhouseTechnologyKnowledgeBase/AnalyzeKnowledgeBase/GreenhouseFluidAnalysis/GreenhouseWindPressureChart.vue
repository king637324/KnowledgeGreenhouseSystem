<template>
    <div>
        <br>
        <h3>
            各種溫室型式的各受風面之風壓比較
        </h3>
        <hr>
        <input type="checkbox" id="UBP520_300" value="UBP520_300" v-model="checkedNames" v-on:change="updateChart">
        <label>UP520_300</label>
        <input type="checkbox" id="UBP620_300" value="UBP620_300" v-model="checkedNames" v-on:change="updateChart">
        <label>UBP620_300</label>
        <br>

        <!-- <span>Checked names: {{ checkedNames }}</span> -->

        <button type="button" class="btn btn-secondary" @click="selectAll">全部勾選</button>
        <button type="button" class="btn btn-danger"  @click="ChartClear">清除</button>

        <line-chart :data="data" download="型式風壓比較" :colors="['#3e95cd', '#8e5ea2', '#3cba9f', 'tomato', '#c45850', '#74AFA9', '#009FC7', '#668600', '#C08900', '#C96986', '#DE6948', '#9370DB', '#FF8C00', '#008080', '#1E90FF', '#40E0D0', 'hotpink', 'orchid', 'LightSalmon', 'SaddleBrown', 'GoldenRod', 'Gold', 'DarkKhaki', 'YellowGreen', 'DarkSeaGreen', 'LightSeaGreen', 'DeepSkyBlue', 'SteelBlue', 'CornflowerBlue', 'Khaki']" :curve="false"></line-chart>
    </div>
</template>
<script>
export default {
    data () {
        return {
            Fluidjson: [],
            checkedNames: [],
            data :[
                // UBP520_300
                // UBP620_300
                // UBP680_300
                // UBP680_350
                // UTP960_350
                // UTP1040_350
                // UTP1140_350
                // UTP1140_400
                // UP540_185
                // UP600_205
                // UP720_180
                // UP720_400
                // UP800_400
                // UP800_500
                // SP1100_12
                // SP1100_20
                // SP1100_23
                // SP1100_30
                // WTG640_300
                // WTG640_350
                // WTG640_400
                // VBP820_300
                // VBP860_300
                // VBP860_350
                // WTG960_300
                // WTG960_350
                // WTG960_400
                // VTP2400_400
                // VTP2400_450
                // VTP2400_500
            ],
        }
    },
    created:function(){  // 網頁載入時，一開始就載入
        this.getJson();
    },
    methods:{
        async getJson(){
            const res = await fetch('/FluidAnalysisChartData',  {
                method: 'GET',
            });

            this.Fluidjson = await res.json();

        },check(){

        }, updateChart(){
            var DataChart=[];
            for(var i=0; i<this.Fluidjson.length ; i++){
                for(var j=0;j<this.checkedNames.length;j++){
                    if(this.checkedNames[j]==this.Fluidjson[i].name){
                        DataChart.push(this.Fluidjson[i]);
                    }
                }
            }
            this.data = DataChart;

        },selectAll(){
            this.checkedNames = [];
            for(var i=0; i<this.Fluidjson.length ; i++){
                this.checkedNames.push(this.Fluidjson[i].name);
                this.data.push(this.Fluidjson[i]);
            }

        }, ChartClear(){
            this.checkedNames = [];
            this.data = [];

        }
    }
}

</script>
