<template>
    <div>
        <!-- <button type="button" class="btn btn-danger"  v-on:click="check">檢查</button> -->
        <br>
        <h3>
            圓管材
        </h3>
        <hr>

        <table class="table" align="center">
            <thead align="center">
                <tr>
                    <td> 編號 </td>
                    <td> 形狀 </td>
                    <td> 公稱尺寸(") </td>
                    <td> 外徑尺寸(mm) </td>
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
                <tr v-for="(roundpipe, index) in RoundPipeData" :key="index">
                    <td min-width="5%">{{roundpipe[0][0].Materialid}}</td>
                    <td>{{roundpipe[0][0].shape}}</td>
                    <td>{{roundpipe[5]}}</td>
                    <td>{{roundpipe[6]}} </td>
                    <td>{{roundpipe[9]}} </td>
                    <td>{{roundpipe[10]}} </td>
                    <td>{{roundpipe[11]}} </td>
                    <td>{{roundpipe[12]}} </td>
                    <td>{{roundpipe[13]}} </td>
                    <td>{{roundpipe[14]}} </td>
                    <td>{{roundpipe[15]}} </td>
                    <td>{{roundpipe[16]}} </td>
                    <td>{{roundpipe[17]}} </td>
                    <td>{{roundpipe[18]}} </td>
                    <td>{{roundpipe[19]}} </td>
                    <td>{{(roundpipe[18]/roundpipe[11]).toFixed(2)}} </td>
                    <td>
                        <img :src ="roundpipe[20]" class="table-image"/>
                    </td>
                    <td>
                        <img :src ="roundpipe[21]" class="table-image"/>
                    </td>
                </tr>
            </tbody>
        </table>

        <h5>綜合分析</h5>
        <p>1. 較大直徑的圓管，有較大的負載能力，且其單位重量對最大應力的降低貢獻大於小管徑。</p>
        <p>2. 針對負載能力的提升，增加直徑的貢獻，較大於增加厚度的貢獻。</p>

    </div>
</template>

<script>
export default {
    data(){
        return{
            Materialjson: [],
            RoundPipeData:[],
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
                if(this.Materialjson[i][0][0].Materialtype == "圓管材"){
                    this.RoundPipeData.push(this.Materialjson[i]);
                }
            }

        },check(){
            console.log("-----------檢查------------");
        }
    }
}
</script>
