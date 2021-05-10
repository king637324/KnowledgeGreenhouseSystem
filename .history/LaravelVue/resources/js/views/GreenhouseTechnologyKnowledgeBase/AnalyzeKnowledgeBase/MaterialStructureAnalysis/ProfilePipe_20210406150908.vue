<template>
    <div>
        <!-- <button type="button" class="btn btn-danger"  v-on:click="check">檢查</button> -->
        <br id="型材">
        <h2>
            型材
            <button  class="btn btn-primary" v-scroll-to="{ el: '#綜合分析' }">
                綜合分析
            </button>
        </h2>
        <hr>

        <table class="table" align="center" style="border:1px solid #dee2e6;" border='1'>
            <thead align="center" class="table-active">
                <tr>
                    <td> 編號 </td>
                    <td> 形狀 </td>
                    <td> 高度(mm) </td>
                    <td> 寬度(mm) </td>
                    <td> 厚度(mm) </td>
                    <td> 截面積 </td>
                    <td> 單位重量(kg/m) </td>
                    <td> 材質 </td>
                    <td> 斷面模數 </td>
                    <td> 轉動慣量 </td>
                    <td> 面慣性矩 </td>
                    <td> 降伏強度(MPa) </td>
                    <td> 抗拉強度(MPa) </td>
                    <td> 最大應力(MPa) </td>
                    <td> 最大變量(mm) </td>
                    <td> 應力/重量 </td>
                    <td> 最大應力圖 </td>
                    <td> 最大變量圖 </td>
                </tr>
            </thead>
            <tbody align="center">
                <tr v-for="(profilepipe, index) in ProfilePipeData" :key="index">
                    <td>{{profilepipe[0][0].Materialid}}</td>
                    <td>
                        <img :src ="profilepipe[0][0].shape" class="table-image" style='width:30px'/>
                    </td>
                    <td>{{profilepipe[7]}}</td>
                    <td>{{profilepipe[2]}} </td>
                    <td>{{profilepipe[9]}} </td>
                    <td>{{profilepipe[10]}} </td>
                    <td>{{profilepipe[11]}} </td>
                    <td>{{profilepipe[12]}} </td>
                    <td>{{profilepipe[13]}} </td>
                    <td>{{profilepipe[14]}} </td>
                    <td>{{profilepipe[15]}} </td>
                    <td>{{profilepipe[16]}} </td>
                    <td>{{profilepipe[17]}} </td>
                    <td>{{profilepipe[18]}} </td>
                    <td>{{profilepipe[19]}} </td>
                    <td>{{(profilepipe[18]/profilepipe[11]).toFixed(2)}} </td>
                    <td>
                        <img :src ="profilepipe[20]" class="table-image"/>
                    </td>
                    <td>
                        <img :src ="profilepipe[21]" class="table-image"/>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <div id="綜合分析"></div>
        <h4>
            &nbsp;&nbsp;綜合分析
            <button  class="btn btn-primary" v-scroll-to="{ el: '#型材' }">
                回頂部
            </button>
        </h4>
        <p>&nbsp;&nbsp; ● 材料型式與材料受力方向之影響性比較</p>
        <p>&nbsp;&nbsp; 1. 非封閉型材，如：C型鋼，最大應力會發生在懸臂端點，宜形成組合結構，以提升其輕量化的貢獻。</p>
        <p>&nbsp;&nbsp; 2. H型鋼，應注意其受力方向，(&rarr;H)為較強的負載方向、(&rarr;工)則為較弱的負載方向。</p>
        <p>&nbsp;&nbsp; 3. 方型鋼之負載方向對稱，矩形鋼則如同H型鋼，有其強弱的方向性。(&rarr;&#9645;)為較強的負載方向、(&rarr;&#9647;)則為較弱的負載方向。</p>

    </div>
</template>

<script>
export default {
    data(){
        return{
            Materialjson: [],
            ProfilePipeData:[],
        }
    },
    created:function(){  // 網頁載入時，一開始就載入
        this.getJson();
    },
    methods:{
        async getJson(){
            const res = await fetch('/MaterialAnalysisJSON',  {
                method: 'GET',
            });

            this.Materialjson = await res.json();

            for(var i=0; i<this.Materialjson.length ; i++){
                if(this.Materialjson[i][0][0].Materialtype == "型管材"){
                    this.ProfilePipeData.push(this.Materialjson[i]);
                }
            }

        },check(){
            console.log("-----------檢查------------");
        }
    }
}
</script>
